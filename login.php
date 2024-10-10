<?php
session_start();
include 'db.php';

$error_message = ""; 

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $username;
        header('Location: list_pajak.php');
        exit();
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>

<form method="post" action="">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <div style="display: flex; gap: 10px;">
        <input type="submit" name="login" value="Login">
        <a href="register.php" style="text-decoration: none;">
            <button type="button">Register</button>
        </a>
    </div>
    <?php
    if (!empty($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
</form>
