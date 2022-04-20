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
                <?php
                if(isset($_SESSION['user'])){
                    ?>
                    <span>On air : <strong><?= $_SESSION['user'] ?></strong></span>
                    <a href="function.php?a=end">Déconnexion</a>
                    <?php
                }
                else {
                    ?>
                    <form action="function.php?a=start" method="post">
                        <input type="text" id="user-name" name="user-name" placeholder="Pseudo">
                        <input type="submit" id="go" name="goChat" value="ok">
                    </form>
                    <?php
                }
                ?>
            </div>
        </header>
        <section>
            <div>
                <div id="screen" class="round"></div>
                <footer class="round">
                    <?php
                    if(isset($_SESSION['user'])){
                    ?>
                        <input id="user-say" type="text" class="round">
                        <input type="submit" id="send" value="send" class="round">
                    <?php
                        }
                    ?>
                </footer>
            </div>
        </section>
    </main>
<script src="app.js"></script>
</body>
</html>
