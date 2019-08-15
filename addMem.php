<?php
    try {
        require_once('connectDB.php');
        $sql =
        "INSERT INTO account_info
        VALUES (:account, :name, :gender, :birth, :email, :note)
        ";
        $members = $pdo->prepare($sql);
        $members->bindValue(':account', $_REQUEST["account"]);
        $members->bindValue(':name', $_REQUEST["name"]);
        $members->bindValue(':gender', $_REQUEST["gender"]);
        $members->bindValue(':birth', $_REQUEST["birth"]);
        $members->bindValue(':email', $_REQUEST["email"]);
        $members->bindValue(':note', $_REQUEST["note"]);
        $members->execute();
        $data = array("account"=>$_REQUEST["account"], "name"=>$_REQUEST["name"]);
        echo json_encode($data);
    } catch(PDOException $e) {
        echo $e->getMessage()."<br>";
        echo $e->getLine()."<br>";
    }
?>