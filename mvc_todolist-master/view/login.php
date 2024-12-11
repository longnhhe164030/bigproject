<?php
require_once('model/users.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = get_user_by_username($username); 

    if ($user && $user['password'] === $password) { 
        $_SESSION['userID'] = $user['userID'];
        header("Location: index.php?action=show_tasks");
        exit();
    } else {
        $error = "Tên người dùng hoặc mật khẩu không chính xác.";
    }
}
?>

<form method="POST">
    <label for="username">Tên người dùng:</label>
    <input type="text" name="username" required>

    <label for="password">Mật khẩu:</label>
    <input type="password" name="password" required>

    <button type="submit">Đăng nhập</button>
</form>

<?php if (isset($error)) { echo "<p>$error</p>"; } ?>
<p>Chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
