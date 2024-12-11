<?php
require_once('db.php');

// Thêm công việc mới
function add_task($userID, $title, $status, $content) {
    global $db;
    $query = "INSERT INTO tasks (title, status, content, userID) VALUES (:title, :status, :content, :userID)";
    $stmt = $db->prepare($query);
    $stmt->execute(['title' => $title, 'status' => $status, 'content' => $content, 'userID' => $userID]);
}

// Lấy danh sách công việc của người dùng
function get_tasks_by_user($userID) {
    global $db;
    $query = "SELECT * FROM tasks WHERE userID = :userID";
    $stmt = $db->prepare($query);
    $stmt->execute(['userID' => $userID]);
    return $stmt->fetchAll();
}

function get_task_by_id($taskID) {
    global $db;
    $query = "SELECT * FROM tasks WHERE taskID = :taskID";
    $stmt = $db->prepare($query);
    $stmt->execute(['taskID' => $taskID]);
    return $stmt->fetch();  
}

// Sửa công việc
function update_task($taskID, $title, $status, $content) {
    global $db;
    $query = "UPDATE tasks SET title = :title, status = :status, content = :content WHERE taskID = :taskID";
    $stmt = $db->prepare($query);
    $stmt->execute(['title' => $title, 'status' => $status, 'content' => $content, 'taskID' => $taskID]);
}

// Xóa công việc
function delete_task($taskID) {
    global $db;
    $query = "DELETE FROM tasks WHERE taskID = :taskID";
    $stmt = $db->prepare($query);
    $stmt->execute(['taskID' => $taskID]);
}
?>
