<?php
require_once('model/users.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        if (get_user_by_username($username)) {
            $error = "Tên người dùng đã tồn tại!";
        } else {
            add_user($username, $password); 
            header("Location: login.php");
            exit();
        }
    } else {
        $error = "Mật khẩu và xác nhận mật khẩu không khớp!";
    }
}
?>

<form method="POST">
    <label for="username">Tên người dùng:</label>
    <input type="text" name="username" required>

    <label for="password">Mật khẩu:</label>
    <input type="password" name="password" required>

    <label for="confirm_password">Xác nhận mật khẩu:</label>
    <input type="password" name="confirm_password" required>

    <button type="submit">Đăng ký</button>
</form>

<?php if (isset($error)) { echo "<p>$error</p>"; } ?>
