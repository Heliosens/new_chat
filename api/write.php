<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . "/DB.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/Entity/User.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/Manager/DialogueManager.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Manager/UserManager.php";


$write = json_decode(file_get_contents('php://input'), true);
$result = [];
//die(var_dump($_SESSION));
if($_SESSION['user']){
    if(isset($write)){
        $result[] = [
            'content' => $write,
            'userId' => $_SESSION['id']
        ];

        $ref = DialogueManager::addSentence($write, $_SESSION['id']);
        if(!$ref){
            $result = ['content' => 'error'];
        }
    }
    else {
        $result = ['content' => 'error json decode'];
    }
}
else {
    $result = ["vous n'ètes pas connecté"];
}

echo json_encode($result);
exit;
