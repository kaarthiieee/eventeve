<?php
include "config.php";

if(isset($_POST['reg'])){
    mysqli_query($conn,"INSERT INTO users(username,password)
    VALUES('$_POST[username]','$_POST[password]')");
    header("Location:index.php");
}
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">eventeve</div>

<div class="container fade-in">
    <h2>Register</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="reg">Register</button>
    </form>
</div>