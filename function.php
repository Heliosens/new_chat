<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/DB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Entity/Dialogue.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Entity/user.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Manager/UserManager.php';

$param = isset($_GET['a']) ? strtolower(trim(strip_tags($_GET['a']))) : null;

switch ($param){
    case 'start':
        if(isset($_POST['goChat']) && $_POST['user-name'] !== ""){
            $pseudo = trim(strip_tags($_POST['user-name']));
            $user = new User();
            if(!UserManager::userExist($pseudo)){
                $user->setPseudo($pseudo);
//  user not exist create
                UserManager::addUser($user);
//  die(var_dump($user));
            }
            else{   // user exist update onAir to 1
                $user = UserManager::getUserByPseudo($pseudo);
            }

            $_SESSION['user'] = $user->getPseudo();
            $_SESSION['id'] = $user->getId();
//  die(var_dump($_SESSION));
            header('Location: /index.php');
        }
        break;
    case 'end':
        $_SESSION['user'] = "";
        $_SESSION['id'] = "";
        session_destroy();
        header('Location: /index.php');
        break;

}
