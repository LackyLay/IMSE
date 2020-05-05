<?php
require_once('DatabaseHelper.php');
$database = new DatabaseHelper();

$wine_id= '';
if(isset($_POST['wine_id'])){
    $wine_id = $_POST['wine_id'];
}

// Delete method
$error_code = $database->deleteWine( $wine_id );

// Check result
if ($error_code == 1){
    echo "Wine with ID: '{$wine_id}' successfully deleted!'";
}
else{
    echo "Error can't delete Wine with ID: '{$wine_id}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="Wine.php">
    <button>
        go back
    </button>
</a>