<?php
session_start();
include "config.php";

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

mysqli_query($conn,"DELETE FROM events WHERE id=$id AND user_id=$user_id");

header("Location:dashboard.php");