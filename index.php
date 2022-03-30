<?php
session_start();
include 'DB.php';
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
                <input type="text" id="user-name" name="user-name" placeholder="Pseudo">
                <input type="submit" value="ok">
            </div>
        </header>
        <section>
            <div>
                <div id="screen" class="round">
                    <p>
                        <span>Pseudo 1 : </span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    </p>
                    <p>
                        <span>Pseudo 2 : </span>Aspernatur at consequuntur doloremque eaque eos exercitationem facere fuga.
                    </p>
                </div>
                <footer class="round">
                    <input id="user-say" type="text" class="round">
                    <input type="submit" id="send" value="send" class="round">
                </footer>
            </div>
            <aside></aside>
        </section>
    </main>
<script src="app.js"></script>
</body>
</html>
