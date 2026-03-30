<?php
session_start();
include "config.php";

$id = $_GET['id'];

$user_id = $_SESSION['user_id'];
$data = mysqli_query($conn,"SELECT * FROM events WHERE id=$id AND user_id=$user_id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){
    mysqli_query($conn,"UPDATE events SET 
    title='$_POST[title]',
    event_date='$_POST[date]',
    description='$_POST[desc]'
    WHERE id=$id AND user_id=$user_id");

    header("Location:dashboard.php");
}
?>

<link rel="stylesheet" href="style.css">

<div class="navbar">eventeve</div>

<div class="container fade-in">
<h2>Edit Event</h2>

<form method="POST">
<input type="text" name="title" value="<?php echo $row['title']; ?>">
<input type="date" name="date" value="<?php echo $row['event_date']; ?>">
<textarea name="desc"><?php echo $row['description']; ?></textarea>

<button name="update">Update</button>
</form>
</div>