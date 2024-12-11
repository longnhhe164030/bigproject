<?php
require_once('db.php');
function register_user($username, $password) {
    global $db;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $db->prepare($query);
    $stmt->execute(['username' => $username, 'password' => $passwordHash]);
}

function login_user($username, $password) {
    global $db;
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return null;
}
function get_user_by_id($userID) {
    global $db;
    $query = "SELECT * FROM users WHERE userID = :userID";
    $stmt = $db->prepare($query);
    $stmt->execute(['userID' => $userID]);
    return $stmt->fetch();
}

function get_user_by_username($username) {
    global $db;
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->execute(['username' => $username]);
    return $stmt->fetch(); 
}
function add_user($username, $password) {
    global $db;
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $db->prepare($query);
    $stmt->execute(['username' => $username, 'password' => $password]);
}
?>

