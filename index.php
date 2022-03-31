<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/DB.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Entity/User.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Entity/Dialogue.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Manager/UserManager.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Manager/DialogueManager.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>new chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <header>
            <div id="title">
                <span>Chat</span>
            </div>
            <div id="connect">
                <form action="index.php" method="post">
                    <input type="text" id="user-name" name="user-name" placeholder="Pseudo">
                    <input type="submit" id="go" name="goChat" value="ok">
                </form>
            </div>
        </header>
        <section>
            <div>
                <div id="screen" class="round"></div>
                <footer class="round">
                    <form action="index.php" method="post">
                        <input id="user-say" type="text" class="round">
                        <input type="submit" id="send" value="send" class="round">
                    </form>
                </footer>
            </div>
            <aside></aside>
        </section>
    </main>
<script src="app.js"></script>
</body>
</html>

<?php

if(isset($_POST['goChat']) && $_POST['user-name'] !== ""){
    $pseudo = trim(strip_tags($_POST['user-name']));
    $user = new User();
    $user->setPseudo($pseudo);
    UserManager::addUser($user);
    $_SESSION['user'] = $user;
}
