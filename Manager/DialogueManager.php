<?php


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
                    ->setAuthor(UserManager::getUserById($sentence['author']))
                    ;
            }
        }
        return $dialogue;
    }

    /**
     * @param Dialogue $sentence
     * @return bool
     */
    public static function addSentence(Dialogue &$sentence)
    {
        $stm = DB::conn()->prepare("INSERT INTO dialogue (sentence, user_fk) VALUES (:sentence, :author)");
        $stm->bindValue(':sentence', $sentence->getSentence());
        $stm->bindValue(':author', $sentence->getAuthor()->getId());

        $result = $stm->execute();
        $sentence->setId(DB::conn()->lastInsertId());
        return $result;
    }

}