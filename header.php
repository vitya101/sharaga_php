<?php 

    session_start();
    $isLoggedIn = isset($_SESSION["user"]);
?>

<header class="flex m-10 gap-5 justify-between">
    <div class="flex gap-5">
        <a href="/">комментарии</a>
        <a href="/jokes.php">анекдоты</a>
        <?php if ($isLoggedIn) echo "<a href='/bulletin_board/board.php'>доска объявлений</a>" ?>
    </div>
    <form class="flex gap-3" action="">
    <?php
    echo $isLoggedIn && $_SESSION["user"]["role"] == 'ADMIN'
        ? '<a href="/admin.php" class="bg-sky-700 p-3 text-white">ADMIN PANEL</a>'
        : '';
    echo $isLoggedIn
        ? '<a href="/auth/logout.php" class="bg-sky-700 p-3 text-white">LOGOUT</a>'
        : '<a href="/auth/login.php" class="bg-sky-700 p-3 text-white">LOGIN</a>';
    ?>
    </form>
</header>