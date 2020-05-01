<?php
//include DatabaseHelper.php file
require_once('../DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$review_id = '';
if(isset($_POST['id'])){
    $review_id = $_POST['id'];
}

$points = '';
if(isset($_POST['points'])){
    $points = $_POST['points'];
}

// update method
$success = $database->updateReview( $review_id, $points);

// Check result
if ($success){
    echo "Review '{$review_id}' successfully update to Points: '{$points}'!";
}
else{
    echo "Error can't update Review '{$review_id}'  to Points: '{$points}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="Review.php">
    <button>
        go back
    </button>
</a>
