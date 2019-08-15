<?php
    try {
        require_once('connectDB.php');
        $sql =
        "UPDATE account_info
        SET name = :name, gender = :gender, birth = :birth, email = :email, note = :note
        WHERE account = :account
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