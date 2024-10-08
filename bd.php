<?php 
    function conn(): PDO
    {
        return new PDO("mysql:host=localhost;dbname=iv", 'root', '');
    }
?>