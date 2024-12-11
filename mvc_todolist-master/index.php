<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('model/tasks.php');
require_once('model/users.php');

$action = $_GET['action'] ?? 'show_tasks'; 

if (!isset($_SESSION['userID']) && $action !== 'login') {
    
    header("Location: index.php?action=login");
    exit();
}

if ($action == 'show_tasks') {
    $userID = $_SESSION['userID'];  
    $tasks = get_tasks_by_user($userID); 
    include('view/show_tasks.php'); 
} elseif ($action == 'login') {
    include('view/login.php'); 
} elseif ($action == 'register') {
    include('view/register.php'); 
} elseif ($action == 'show_add_form') {
    include('view/add_task.php');  
} elseif ($action == 'edit_task') {
    $taskID = $_GET['taskID'];
    $task = get_task_by_id($taskID); 
    include('view/edit_form.php');  
} elseif ($action == 'delete_task') {
    $taskID = $_POST['taskID'];
    delete_task($taskID);  
    header("Location: index.php?action=show_tasks"); 
    exit();
} elseif ($action == 'logout') {
    session_destroy(); 
    header("Location: index.php?action=login");  
}
?>
