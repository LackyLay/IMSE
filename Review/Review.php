<?php


require_once('../DatabaseHelper.php');

$database = new DatabaseHelper();

$review_id = '';
if (isset($_GET['review_id'])) {
    $review_id = $_GET['review_id'];
}

$points = '';
if (isset($_GET['points'])) {
    $points = $_GET['points'];
}

$date_rev = '';
if (isset($_GET['date_rev'])) {
    $date_rev = $_GET['date_rev'];
}

$mem_id = '';
if (isset($_GET['mem_id'])) {
    $mem_id = $_GET['mem_id'];
}

$wine_id = '';
if (isset($_GET['wine_id'])) {
    $wine_id = $_GET['wine_id'];
}

//Fetch data from database
$review_array = $database->selectFromReviewWhere($review_id, $points, $date_rev, $mem_id, $wine_id);
?>

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
        h1 {
            font-family: 'Baloo Bhaina';font-size: 45px;
        }
    </style>
    <title>WineApp</title>
</head>

<body>
<a href="../MainSite.php">
    <h1 style="color:hsl(0, 100%, 25%);">
        WineApp
    </h1>
</a>
<br>
<div class="text-center">
    <h1>Review panel</h1>
</div>

<!-- Add Review -->
<h2>Add Review: </h2>
<form method="post" action="addReview.php">

    <div>
        <label for="new_points">Points(1-100):</label>
        <input id="new_points" name="points" type="number" min="1">
    </div>
    <br>

    <div>
        <label for="new_date">Date(YYYY-MM-DD):</label>
        <input id="new_date" name="date" type="text" maxlength="20">
    </div>
    <br>

    <div>
        <label for="new_mem">MemberID:</label>
        <input id="new_mem" name="mem_id" type="number" min="0">
    </div>
    <br>

    <div>
        <label for="new_wine">Wine ID:</label>
        <input id="new_wine" name="wine_id" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Add Review
        </button>
    </div>
</form>
<br>
<hr>

<!-- Delete Review -->
<h2>Delete Review: </h2>
<form method="post" action="delReview.php">

    <div>
        <label for="del_name">ID:</label>
        <input id="del_name" name="id" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Delete Review
        </button>
    </div>
</form>
<br>
<hr>

<!-- Update Review -->
<h2>Update Review: </h2>
<form method="post" action="updReview.php">

    <div>
        <label for="upd_name">ID:</label>
        <input id="upd_name" name="id" type="number" min="0">
    </div>
    <br>

    <div>
        <label for="upd_points">Update to Points:</label>
        <input id="upd_points" name="points" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Update Review
        </button>
    </div>
</form>
<br>
<hr>


<!-- Search form -->
<h2>Review Search:</h2>
<form method="get">

    <div>
        <label for="review_id">ID:</label>
        <input id="review_id" name="review_id" type="number" value='<?php echo $review_id; ?>' min="0">
    </div>
    <br>


    <div>
        <label for="points">Points:</label>
        <input id="points" name="points" type="number" value='<?php echo $points; ?>' min="0">
    </div>
    <br>

    <div>
        <label for="date">Date:</label>
        <input id="date" name="date_rev" type="number" value='<?php echo $date_rev; ?>' min="0">
    </div>
    <br>

    <div>
        <label for="mem">Member ID:</label>
        <input id="mem" name="mem_id" type="number" value='<?php echo $mem_id; ?>' min="0">
    </div>
    <br>

    <div>
        <label for="wine">Wine ID:</label>
        <input id="wine" name="wine_id" type="number" value='<?php echo $wine_id; ?>' min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button id='submit' type='submit'>
            Search
        </button>
    </div>
</form>
<br>
<hr>


<!-- Search result -->
<h2>Review Search Result:</h2>
<table class="table table-bordered">
    <tr>
        <th>Review ID</th>
        <th>Points</th>
        <th>Date</th>
        <th>Member ID</th>
        <th>Wine ID</th>
    </tr>
    <?php foreach ($review_array as $review) : ?>
        <tr>
            <td><?php echo $review['review_id']; ?>  </td>
            <td><?php echo $review['points']; ?>  </td>
            <td><?php echo $review['date_rev']; ?>  </td>
            <td><?php echo $review['member_id']; ?>  </td>
            <td><?php echo $review['wine_id']; ?>  </td>
        </tr>
    <?php endforeach; ?>
</table>



</body>
</html>
