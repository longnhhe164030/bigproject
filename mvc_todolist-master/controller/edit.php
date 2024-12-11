<?php
require_once('../model/tasks.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskID = $_POST['taskID'];
    $title = $_POST['title'];
    $status = $_POST['status'];
    $content = $_POST['content'];

    if (empty($title) || empty($content)) {
        $error = "Vui lòng điền đầy đủ thông tin!";
    } else {
        update_task($taskID, $title, $status, $content);
        header("Location: ../index.php?action=show_tasks");
    }
}

$taskID = $_GET['taskID'];
$task = get_task_by_id($taskID);
include('../view/edit_task.php');
?>
