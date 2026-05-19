<?php
session_start();

include("db.php");

$movie_id = $_GET['id'];

$sql = "SELECT * FROM movies WHERE id='$movie_id'";
$result = mysqli_query($conn, $sql);
$movie = mysqli_fetch_assoc($result);

if(isset($_POST['book']))
{
    $selectedSeats = $_POST['seats'] ?? [];

    if(count($selectedSeats) > 0)
    {
        foreach($selectedSeats as $seat)
        {
            $check = "SELECT * FROM bookings
                      WHERE movie_id='$movie_id'
                      AND seat_no='$seat'";

            $checkResult = mysqli_query($conn, $check);

            if(mysqli_num_rows($checkResult) == 0)
            {
                $insert = "INSERT INTO bookings(movie_id,seat_no,user_email)
                           VALUES('$movie_id','$seat','".$_SESSION['user']."')";

                mysqli_query($conn, $insert);
            }
        }

        $seatList = implode(",", $selectedSeats);

$total = 0;

foreach($selectedSeats as $seat)
{
    if(substr($seat,0,1) == "B")
    {
        $total += 200;
    }
    else
    {
        $total += 120;
    }
}

header("Location: payment.php?movie=".$movie['movie_name']."&seats=".$seatList."&total=".$total);
    }
    else
    {
        echo "<script>alert('Please Select Seats')</script>";
    }
}

$booked = [];

$getBooked = "SELECT seat_no FROM bookings WHERE movie_id='$movie_id'";

$bookedResult = mysqli_query($conn, $getBooked);

while($row = mysqli_fetch_assoc($bookedResult))
{
    $booked[] = $row['seat_no'];
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Seat Booking</title>

<style>

body{
    background:black;
    color:white;
    font-family:Arial;
    text-align:center;
}

.screen{
    background:white;
    color:black;
    padding:10px;
    margin:20px auto;
    width:300px;
    border-radius:10px;
}

.section-title{
    margin-top:30px;
}

.seats{
    display:grid;
    grid-template-columns:repeat(8,50px);
    gap:10px;
    justify-content:center;
    margin-bottom:30px;
}

.seat{
    width:50px;
    height:50px;
    background:green;
    color:white;
    cursor:pointer;
    border-radius:5px;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:12px;
}

.booked{
    background:red;
    cursor:not-allowed;
}

.seat-check{
    display:none;
}

.seat-check:checked + .seat{
    background:blue;
}

.main-btn{
    padding:12px 20px;
    background:red;
    color:white;
    border:none;
    margin-top:20px;
    cursor:pointer;
    border-radius:5px;
    font-size:16px;
}

</style>

</head>

<body>

<h1>🎟 Seat Selection</h1>

<h2>
Movie: <?php echo $movie['movie_name']; ?>
</h2>

<div class="screen">
SCREEN
</div>

<form method="POST">

<h2 class="section-title">Balcony Seats</h2>

<div class="seats">

<?php

for($i=1; $i<=64; $i++)
{
    $seat = "B".$i;

    $isBooked = in_array($seat, $booked);
?>

<div class="seat-box">

<input type="checkbox"
       class="seat-check"
       name="seats[]"
       value="<?php echo $seat; ?>"
       id="<?php echo $seat; ?>"
       <?php if($isBooked) echo "disabled"; ?>>

<label for="<?php echo $seat; ?>"
       class="seat <?php if($isBooked) echo 'booked'; ?>">
       <?php echo $seat; ?>
</label>

</div>

<?php
}
?>

</div>

<h2 class="section-title">Nela Seats</h2>

<div class="seats">

<?php

for($i=1; $i<=120; $i++)
{
    $seat = "N".$i;

    $isBooked = in_array($seat, $booked);
?>

<div class="seat-box">

<input type="checkbox"
       class="seat-check"
       name="seats[]"
       value="<?php echo $seat; ?>"
       id="<?php echo $seat; ?>"
       <?php if($isBooked) echo "disabled"; ?>>

<label for="<?php echo $seat; ?>"
       class="seat <?php if($isBooked) echo 'booked'; ?>">
       <?php echo $seat; ?>
</label>

</div>

<?php
}
?>

</div>

<button type="submit" name="book" class="main-btn">
Book Selected Seats
</button>

</form>

</body>
</html>