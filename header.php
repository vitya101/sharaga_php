<?php 

    session_start();
//    echo $_SESSION["user"]["role"] ?? "не вошел";
//    echo
?>

<header class="flex m-10 gap-5 justify-between">
    <div class="flex gap-5">
        <a href="/">комментарии</a>
        <a href="/jokes.php">анекдоты</a>
    </div>
    <form class="flex gap-3" action="">
    <?php
    echo isset($_SESSION["user"]) && $_SESSION["user"]["role"] == 'ADMIN'
        ? '<a href="/admin.php" class="bg-sky-700 p-3 text-white">ADMIN PANEL</a>'
        : '';
    echo isset($_SESSION["user"])
        ? '<a href="/auth/logout.php" class="bg-sky-700 p-3 text-white">LOGOUT</a>'
        : '';
    ?>
    </form>
</header>