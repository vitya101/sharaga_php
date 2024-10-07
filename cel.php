<?php 
    require_once "./bd.php";
    $conn = conn();

    $stmt = $conn->prepare('INSERT INTO comments(name, comment) VALUE(?, ?)');
    $stmt->execute([$_POST['name'], $_POST['comment']]);

    header("Location: /");

?>