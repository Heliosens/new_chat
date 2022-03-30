<?php

require $_SERVER['DOCUMENT_ROOT'] . "/DB.php";
require $_SERVER['DOCUMENT_ROOT'] . "/Manager/DialogueManager.php";

$answer = json_decode(file_get_contents('php://input'), true);
if(isset($answer)){
    var_dump($answer);
//    $dialogue = DialogueManager::addSentence();
}

