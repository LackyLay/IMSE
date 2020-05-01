<?php
//include DatabaseHelper.php file
require_once('../DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variable id from POST request
$mem_id = '';
if(isset($_POST['id'])){
    $mem_id = $_POST['id'];
}

$country = '';
if(isset($_POST['country'])){
    $country = $_POST['country'];
}

// update method
$success = $database->updateMember( $mem_id, $country);

// Check result
if ($success){
    echo "Member '{$mem_id}' successfully update to Country: '{$country}'!";
}
else{
    echo "Error can't update Member '{$mem_id}'  to Country: '{$country}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="Member.php">
<button>
    go back
</button>
</a>