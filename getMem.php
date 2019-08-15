<?php
    try {
        require_once('connectDB.php');
        $sql = 
        "SELECT *
        FROM account_info
        WHERE account = :account";
        $members = $pdo->prepare($sql);
        $members->bindValue(':account', $_REQUEST["account"]);
        $members->execute();
        $memRow = $members->fetch(PDO::FETCH_ASSOC);
        echo json_encode($memRow);
    } catch(PDOException $e) {
        echo $e->getMessage."<br>";
        echo $e->getLine."<br>";
    }

?>