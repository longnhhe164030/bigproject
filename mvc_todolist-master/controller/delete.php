<?php
require_once('../model/tasks.php');

if (isset($_GET['taskID'])) {
    $taskID = $_GET['taskID'];
    delete_task($taskID); 
    header("Location: ../index.php?action=show_tasks"); 
    exit();
}
?>
