<?php
include("db.php");

if(isset($_POST['signup']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(name,email,password)
            VALUES('$name','$email','$password')";

    if(mysqli_query($conn,$sql))
    {
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Signup</title>

<style>

body{
    margin:0;
    padding:0;
    background:black;
    font-family:Arial;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.signup-box{
    background:#222;
    padding:40px;
    width:350px;
    border-radius:10px;
    text-align:center;
    box-shadow:0 0 20px rgba(255,0,0,0.5);
}

h1{
    color:white;
    margin-bottom:30px;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:none;
    border-radius:5px;
    font-size:16px;
}

button{
    width:100%;
    padding:12px;
    background:red;
    color:white;
    border:none;
    border-radius:5px;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:darkred;
}

a{
    color:white;
    text-decoration:none;
}

p{
    color:white;
}

</style>

</head>

<body>

<div class="signup-box">

<h1>🎬 Movie Signup</h1>

<form method="POST">

<input type="text"
       name="name"
       placeholder="Enter Name"
       required>

<input type="email"
       name="email"
       placeholder="Enter Email"
       required>

<input type="password"
       name="password"
       placeholder="Enter Password"
       required>

<button type="submit" name="signup">
Signup
</button>

</form>

<p>
Already have an account?
<a href="login.php">Login</a>
</p>

</div>

</body>
</html>