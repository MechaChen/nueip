<?php
    $dsn = "mysql:host=localhost;port=3306;dbname=nueip;charset=utf8";
    $user = "tumlivein";
    $password = "YueGp60208";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE => PDO::CASE_NATURAL);
    $pdo = new PDO($dsn, $user, $password, $options);
?>