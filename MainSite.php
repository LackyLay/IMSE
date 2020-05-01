

<!doctype html>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Baloo Bhaina' rel='stylesheet'>
    <style>
        body {
            font-family: 'Baloo Bhaina';font-size: 22px;
        }
    </style>
    <title>WineApp</title>
</head>

<body style="color:hsl(0, 100%, 25%);">
<br>
<div class="text-center">
<a href="index.php">
    <h2 style="color:hsl(0, 100%, 25%);">
    
        Loged in as 
        <?php session_start();  echo $_SESSION['username']?>
        Status: <?php   echo $_SESSION['status']?>
    </h2>
</a>
    </div>
  <div class="text-center">
<h1>Welcome to WineApp</h1>
  </div>

<br>
  <img class="img-responsive" src="img.png" alt="Dicover the Right Wine" width="100%" height="auto">
  <br>
<br>
<div class="text-center">
<div class="row">
    <div class="col-sm-3">
<a href="Member/Member.php">
    <h2 style="color:hsl(0, 100%, 25%);">
        Member
    </h2>
</a>
    </div>

    <div class="col-sm-3">
<a href="Review/Review.php">
    <h2 style="color:hsl(0, 100%, 25%);">
        Review
    </h2>
</a>
    </div>

    <div class="col-sm-3">
<a href="WantTry/WantTry.php">
    <h2 style="color:hsl(0, 100%, 25%);">
        Want Try
    </h2>
</a>
    </div>

    <div class="col-sm-3">
<a href="Wine/Wine.php">
    <h2 style="color:hsl(0, 100%, 25%);">
        Wine
    </h2>
</a>
    </div>

</div>
</div>


</body>
</html>