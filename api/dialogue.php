<?php

require $_SERVER['DOCUMENT_ROOT'] . "/DB.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Manager/DialogueManager.php";

$dialogue = DialogueManager::getDialogue();

$result = [];

foreach ($dialogue as $sentence){
    $result[] = [
        "id" => $sentence->getId(),
        "sentence" => $sentence->getSentence(),
        "author" => $sentence->getAuthor()->getPseudo(),
    ];
}

echo json_encode($result);

exit;