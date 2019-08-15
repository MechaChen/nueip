<?php
    try {
        require_once('connectDB.php');
        $sql =
        "DELETE FROM account_info
        WHERE account = :account
        ";
        $members = $pdo->prepare($sql);
        $members->bindValue(':account', $_REQUEST["account"]);
        $members->execute();
    } catch (PDOException $e) {
        echo $e->getMessage()."<br>";
        echo $e->getLine()."<br>";
    }
?>