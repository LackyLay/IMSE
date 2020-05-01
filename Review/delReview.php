<?php
//include DatabaseHelper.php file
require_once('DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$review_id= '';
if(isset($_POST['id'])){
    $review_id = $_POST['id'];
}

// Delete method
$error_code = $database->deleteReview( $review_id );

// Check result
if ($error_code == 1){
    echo "Review with ID: '{$review_id}' successfully deleted!'";
}
else{
    echo "Error can't delete Review with ID: '{$review_id}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="Review.php">
    <button>
        go back
    </button>
</a>