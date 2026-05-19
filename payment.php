<?php
session_start();

$movie = $_GET['movie'];
$seats = $_GET['seats'];
$total = $_GET['total'];
?>

<!DOCTYPE html>
<html>
<head>

<title>Payment</title>

<style>

body{
    background:black;
    color:white;
    font-family:Arial;
    text-align:center;
    padding-top:50px;
}

.payment-box{
    width:400px;
    margin:auto;
    background:#222;
    padding:30px;
    border-radius:10px;
}

img{
    width:250px;
    height:250px;
    margin:20px 0;
}

button{
    padding:12px 20px;
    background:limegreen;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

</style>

</head>

<body>

<div class="payment-box">

<h1>💳 Payment Page</h1>

<h2>
Movie: <?php echo $movie; ?>
</h2>

<h3>
Seats: <?php echo $seats; ?>
</h3>

<h2>
Pay ₹1 Demo Amount
</h2>

<img src="images/qr.png">

<br>

<p>
Scan QR using:
<br><br>
Google Pay / PhonePe / Paytm
</p>

<br>

<a href="success.php?movie=<?php echo $movie; ?>&seats=<?php echo $seats; ?>&total=<?php echo $total; ?>">

<button>
Payment Done
</button>

</a>

</div>

</body>
</html>