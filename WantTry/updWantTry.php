<?php
//include DatabaseHelper.php file
require_once('../DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$mem_id = '';
if (isset($_POST['mem_id'])) {
    $mem_id = $_POST['mem_id'];
}

$wine_id = '';
if (isset($_POST['wine_id'])) {
    $wine_id = $_POST['wine_id'];
}

$wine_id_new= '';
if (isset($_POST['wine_id_new'])) {
    $wine_id_new = $_POST['wine_id_new'];
}

// update method
$success = $database->updateWantTry($mem_id, $wine_id, $wine_id_new);

// Check result
if ($success){
    echo "WantTry '{$mem_id} {$wine_id}' successfully update to Wine ID: '{$wine_id_new}'!";
}
else{
    echo "Error can't update WantTry '{$mem_id} {$wine_id}'  to Wine ID: '{$wine_id_new}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="WantTry.php">
    <button>
        go back
    </button>
</a>
