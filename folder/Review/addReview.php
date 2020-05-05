<?php
require_once('../DatabaseHelper.php');

$database = new DatabaseHelper();


$points = '';
if (isset($_POST['points'])) {
    $points = $_POST['points'];
}

$date_rev = '';
if (isset($_POST['date'])) {
    $date_rev = $_POST['date'];
}

$mem_id = '';
if (isset($_POST['mem_id'])) {
    $mem_id = $_POST['mem_id'];
}

$wine_id = '';
if (isset($_POST['wine_id'])) {
    $wine_id = $_POST['wine_id'];
}

// Insert method
$success = $database->insertIntoReview($points, $date_rev, $mem_id, $wine_id);

// Check result
if ($success){
    echo "Review '{$points} {$date_rev}' successfully added!'";
}
else{
    echo "Error can't insert Review '{$points} {$date_rev}' !";
}
?>

<!-- link back to index page-->
<<br>
<a href="Review.php">
    <button>
        go back
    </button>
</a>