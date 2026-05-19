<?php
include("db.php");

$sql = "SELECT * FROM movies";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Movies</title>

    <style>

        body{
            font-family: Arial;
            background:black;
            color:white;
        }

        .container{
            display:flex;
            gap:20px;
            flex-wrap:wrap;
        }

        .card{
            width:250px;
            background:#222;
            padding:15px;
            border-radius:10px;
        }

        .card img{
            width:100%;
            height:300px;
            object-fit:cover;
        }

        button{
            background:red;
            color:white;
            border:none;
            padding:10px;
            width:100%;
            cursor:pointer;
        }

    </style>

</head>
<body>

<h1>🎬 Movies</h1>

<div class="container">

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<div class="card">

<img src="<?php echo $row['poster']; ?>">

<h2>
<?php echo $row['movie_name']; ?>
</h2>

<p>
<?php echo $row['description']; ?>
</p>

<h3>
₹<?php echo $row['price']; ?>
</h3>

<a href="seats.php?id=<?php echo $row['id']; ?>">

<button>
Book Now
</button>

</a>

</div>

<?php
}
?>

</div>

</body>
</html>