<?php
require $_SERVER['DOCUMENT_ROOT'] . '/DB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Entity/Dialogue.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Entity/user.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Manager/UserManager.php';

if(isset($_POST['goChat']) && $_POST['user-name'] !== ""){
    $pseudo = trim(strip_tags($_POST['user-name']));
    $user = new User();
    $user->setPseudo($pseudo);
    UserManager::addUser($user);
    $_SESSION['user'] = $user;
}
