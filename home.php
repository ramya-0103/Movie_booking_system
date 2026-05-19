<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Home</title>

<style>

body{
    background:black;
    color:white;
    font-family:Arial;
    text-align:center;
}

a{
    color:white;
    text-decoration:none;
    background:red;
    padding:10px 20px;
    border-radius:5px;
}

.container{
    margin-top:100px;
}

</style>

</head>

<body>

<div class="container">

<h1>
🎬 Welcome to Movie Booking System
</h1>

<h2>
Logged in User:
<?php echo $_SESSION['user']; ?>
</h2>

<br><br>

<a href="movies.php">
View Movies
</a>

<br><br><br>

<a href="logout.php">
Logout
</a>

</div>

</body>
</html>