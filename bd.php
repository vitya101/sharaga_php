<?php 
    function conn() {
        $pdo = new PDO("mysql:host=localhost;dbname=iv", 'root', '');
        return $pdo;
    }
?>