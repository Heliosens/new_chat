<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Entity/Dialogue.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Manager/UserManager.php';


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
     * @param Dialogue $text
     * @return bool
     */
    public static function addSentence(Dialogue &$text)
    {
        $stm = DB::conn()->prepare("INSERT INTO dialogue (sentence, user_fk) VALUES (:sentence, :author)");
        $stm->bindValue(':sentence', $text->getSentence());
        $stm->bindValue(':author', $text->getAuthor()->getId());

        $result = $stm->execute();
        $text->setId(DB::conn()->lastInsertId());
        return $result;
    }

}