<?php
session_start();
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
                <form action="function.php" method="post">
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
