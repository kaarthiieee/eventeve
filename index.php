<?php
session_start();
include "config.php";

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $q = mysqli_query($conn,"SELECT * FROM users WHERE username='$u' AND password='$p'");

    if (mysqli_num_rows($q)) {
    $row = mysqli_fetch_assoc($q);
    $_SESSION['user'] = $row['username'];
    $_SESSION['user_id'] = $row['id'];
    header("Location: dashboard.php");
} else {
        $error = "Invalid login";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">eventeve</div>

<div class="container fade-in">
    <h2>Login</h2>

    <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Login</button>
    </form>

    <p>New user? <a href="register.php">Register</a></p>
</div>