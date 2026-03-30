<?php
session_start();
include "config.php";

if(!isset($_SESSION['user'])){
    header("Location:index.php");
}

$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $data = mysqli_query($conn,"SELECT * FROM events WHERE title LIKE '%$search%'");
} else {
    $user_id = $_SESSION['user_id'];
$data = mysqli_query($conn,"SELECT * FROM events WHERE user_id='$user_id'");
}
?>

<link rel="stylesheet" href="style.css">

<!-- Icons CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="navbar">
    <span><i class="fa-solid fa-calendar-check"></i> eventeve</span>
    <span>
        Welcome, <?php echo $_SESSION['user']; ?> |
        <a href="logout.php" style="color:white;">Logout</a>
    </span>
</div>

<div class="search-box fade-in">
    <form method="GET">
        <input type="text" name="search" placeholder="Search events..." value="<?php echo $search; ?>">
        <button>Search</button>
    </form>
</div>

<div style="text-align:center;">
    <a href="create_event.php">
        <button><i class="fa-solid fa-plus"></i> Add Event</button>
    </a>
</div>
<?php
$count = mysqli_query($conn,"SELECT COUNT(*) as total FROM events WHERE user_id='$user_id'");
$c = mysqli_fetch_assoc($count);
?>

<div style="text-align:center; font-size:20px; margin:20px;">
    Total Events: <?php echo $c['total']; ?>
</div>
<table class="fade-in">
<tr>
<th>Title</th>
<th>Date</th>
<th>Description</th>
<th>Actions</th>
</tr>

<?php while($row=mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['event_date']; ?></td>
<td><?php echo $row['description']; ?></td>
<td>
<a href="edit_event.php?id=<?php echo $row['id']; ?>">
<i class="fa-solid fa-pen"></i></a>

<a href="delete_event.php?id=<?php echo $row['id']; ?>">
<i class="fa-solid fa-trash"></i></a>
</td>
</tr>
<?php } ?>

</table>