<?php 

    session_start();

?>

<header class="flex m-10 gap-5 justify-between">
    <div class="flex gap-5">
        <a href="/">комментарии</a>
        <a href="/jokes.php">анекдоты</a>
    </div>
    <form action="">
    <?php 
        isset($_SESSION['login']) ? ($_SESSION["login"] == '0_0' ? print'<a href="/admin.php" class="bg-sky-700 p-3 text-white">ADMIN PANEL</a>' : print'<button type="submit">Выйти</button>') : print'<a href="/login.php" class="bg-sky-700 p-3 text-white">Войти</a>'
    ?>
    </form>
</header>
<?php 

?>