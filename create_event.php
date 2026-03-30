<?php
session_start();
include "config.php";

if(isset($_POST['add'])){
    $user_id = $_SESSION['user_id'];

    $title = $_POST['title'];
    $date = $_POST['date'];
    $desc = $_POST['desc'];

    mysqli_query($conn,"INSERT INTO events(title,event_date,description,user_id)
    VALUES('$title','$date','$desc','$user_id')");

    header("Location:dashboard.php");
}
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">eventeve</div>

<div class="container fade-in">
<h2>Add Event</h2>

<form method="POST">
<input type="text" name="title" placeholder="Event Title" required>
<input type="date" name="date" required>
<textarea name="desc" placeholder="Description"></textarea>
<button name="add">Add Event</button>
</form>
</div>