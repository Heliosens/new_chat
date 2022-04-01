<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Manager/UserManager.php';

class DialogueManager
{
    /**
     * @return array
     */
    public static function getDialogue() : array
    {
        $dialogue = [];
        $query = DB::conn()->query("SELECT * FROM dialogue");
        if($query){
            foreach ($query->fetchAll() as $sentence){
                $dialogue[] = (new Dialogue())
                    ->setId($sentence['id'])
                    ->setSentence($sentence['sentence'])
                    ->setAuthor(UserManager::getUserById($sentence['user_fk']))
                    ;
            }
        }
        return $dialogue;
    }

    /**
     * @param $text
     * @return bool
     */
    public static function addSentence(&$text)
    {
        $stm = DB::conn()->prepare("
            INSERT INTO dialogue (sentence, user_fk) VALUES (:sentence, :author)
        ");

        $stm->bindValue(':sentence', strip_tags($text));
        $stm->bindValue(':author', 1);

        return $stm->execute();
    }

}