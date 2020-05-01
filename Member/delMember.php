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

// Delete method
$error_code = $database->deleteMember( $mem_id);

// Check result
if ($error_code == 1){
    echo "Person with ID: '{$mem_id}' successfully deleted!'";
}
else{
    echo "Error can't delete Person with ID: '{$mem_id}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="Member.php">
    <button>
        go back
    </button>
</a>