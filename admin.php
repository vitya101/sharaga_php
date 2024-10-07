<?php
require_once("getFile.php");
$header = getFile("header.php");
require_once "./bd.php";
$conn = conn();
$id = intval($_POST['id'] ?? 0);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Гостевая книга</title>
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php echo $header; ?>
    <div id="wrapper">
        <h1>Новые анекдоты</h1>
        <?php

        require_once "./bd.php";
        $conn = conn();
        $new_jokes = $conn->prepare('SELECT * FROM jokes WHERE isHidden=true');
        $new_jokes->execute();
        $row = $new_jokes->fetchAll();
        foreach ($row as $item) {
            echo 
            "<form action='' method='POST' class='note p-10 border rounded-2xl'>
                <p>
                    <span class='date'>$item[author]</span>
                </p>
                <p>$item[joke]</p>
                <div class='flex gap-5 mt-10'>
                    <input type='hidden' name='id' value='$item[id]'>
                    <input name='button' type='submit' class='bg-sky-500 px-10 py-5 rounded text-white font-bold' value='add'>
                    <input name='button' type='submit' class='bg-red-500 px-10 py-5 rounded text-white font-bold' value='del'>
                </div>
            </form>";
        }
        ?>
    </div>
</body>

</html>

<?php 

    $button = $_POST['button'] ?? '';

    if ($button != '') {

        if ($button == 'add') {
            $conn->prepare("UPDATE jokes SET isHidden=false WHERE id=$id")->execute();
        } else {
            $conn->prepare("DELETE FROM jokes WHERE id=$id")->execute();
        }
        
        header("Location: /admin.php");
    }

?>