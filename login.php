<?php
session_start();

include("db.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['user'] = $email;

        header("Location: home.php");
    }
    else
    {
        echo "<script>alert('Invalid Email or Password')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

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

.login-box{
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

<div class="login-box">

<h1>🎬 Movie Login</h1>

<form method="POST">

<input type="email"
       name="email"
       placeholder="Enter Email"
       required>

<input type="password"
       name="password"
       placeholder="Enter Password"
       required>

<button type="submit" name="login">
Login
</button>

</form>

<p>
Don't have an account?
<a href="signup.php">Signup</a>
</p>

</div>

</body>
</html>