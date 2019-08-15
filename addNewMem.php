<?php
    $errMsg = '';
    try {
        require_once('connectDB.php');
        echo "連線成功";
    } catch(PDOException $e) {
        $errMsg .= $e->getMessage()."<br>";
        $errMsg .= $e->getLine()."<br>";
        echo $errMsg;
    }
?>