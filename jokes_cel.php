<?php 
    require_once "./bd.php";
    $conn = conn();

    $stmt = $conn->prepare('INSERT INTO jokes(author, joke, category_id) VALUE(?, ?, ?)');
    $stmt->execute([$_POST['author'], $_POST['joke'], $_POST['category']]);

    header("Location: /");

?>