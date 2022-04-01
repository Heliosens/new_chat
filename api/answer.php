<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/DB.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/Manager/DialogueManager.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Manager/UserManager.php";


$answer = json_decode(file_get_contents('php://input'), true);
if(isset($answer)){
    var_dump($answer);
    $content = $answer['sentence'];
    $user = UserManager::getUserById($answer['user_fk']);

    $result = [
        'content' => $content,
        'author' => $user->getPseudo()
    ];

    $ref = DialogueManager::addSentence($content);
    if(!$ref){
        $result = ['content' => 'error'];
    }
}
else {
    $result = ['content' => 'error json decode'];
}

echo json_encode($result);
exit;
