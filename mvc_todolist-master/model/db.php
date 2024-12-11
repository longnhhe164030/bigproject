<?php
$dbInfo = 'mysql:host=localhost;dbname=todolistdb';
$username='root';
$pass= '';
try {
    $db = new PDO($dbInfo, $username, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    $err_msg = $e->getMessage();
//    include('./dberror.php');
    exit();
}