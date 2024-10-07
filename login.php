<?php 
    session_start();
    require_once "./bd.php";

    $login = $_POST["login"] ?? "";
    $pass = $_POST["pass"] ?? "";
    $error = false;

    if ($login != "") {
        $conn = conn();
        $user = $conn->prepare("SELECT password FROM users WHERE login=? LIMIT 1");
        $user->execute([$login]);
        $passDB = $user->fetchColumn();
    
        if ($passDB == "" || $pass != $passDB) {
            $error = !$error;
        } else {
            $_SESSION['login'] = $login;
            header("Location: /");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="h-screen flex items-center">
    <button id="back" class="absolute bg-sky-700 top-10 left-10 px-7 py-3 text-white">Назад</button>
    <form action="" method="POST" class="m-auto grid gap-5 w-1/2 border p-10">
        <?php echo $error ? "<p class='text-red-600'>Неверный логин или пароль!</p>" : ""; ?>
        <input name="login" class="border p-3" type="text" placeholder="Логин">
        <input name="pass" class="border p-3" type="password" placeholder="Пароль">
        <input class="bg-sky-400 p-3 text-white" type="submit" value="Войти">
    </form>
    <script>
        document.querySelector('#back').addEventListener("click", () => {
            window.history.back()
        })
    </script>
</body>
</html>