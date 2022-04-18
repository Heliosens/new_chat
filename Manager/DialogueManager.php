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
     * @param $author_fk
     * @return bool
     */
    public static function addSentence($text, $author_fk)
    {
        $stm = DB::conn()->prepare("
            INSERT INTO dialogue (sentence, user_fk) VALUES (:content, :userId)
        ");

        $stm->bindValue(':content', $text);
        $stm->bindValue(':userId', $author_fk);

        return $stm->execute();
    }

}