<?php
require_once('../model/tasks.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $status = $_POST['status'];
    $content = $_POST['content'];

    if (empty($title) || empty($content)) {
        $error = "Vui lòng điền đầy đủ thông tin!";
    } else {
        $userID = $_SESSION['userID'];
        add_task($userID, $title, $status, $content);
        header("Location: ../index.php?action=show_tasks");
    }
}

include('../view/add_task.php');
?>
