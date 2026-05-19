<?php
session_start();

include("db.php");

$movie = $_GET['movie'];

$seats = $_GET['seats'];

$total = $_GET['total'];

?>

<!DOCTYPE html>
<html>
<head>

<title>Booking Success</title>

<style>

body{
    background:black;
    color:white;
    font-family:Arial;
    text-align:center;
    padding-top:100px;
}

.ticket{
    width:400px;
    margin:auto;
    background:#222;
    padding:30px;
    border-radius:10px;
}

h1{
    color:lime;
}

</style>

</head>

<body>

<div class="ticket">

<h1>
🎉 Booking Successful
</h1>

<h2>
Movie:
<?php echo $movie; ?>
</h2>

<h3>
User:
<?php echo $_SESSION['user']; ?>
</h3>

<h3>
Seats:
<?php echo $seats; ?>
</h3>

<h3>
Total Amount:
₹<?php echo $total; ?>
</h3>

<br>

<a href="movies.php"
   style="color:white;
          background:red;
          padding:10px 20px;
          text-decoration:none;
          border-radius:5px;">
Back to Movies
</a>

</div>

</body>
</html>