<?php
require_once('DatabaseHelper.php');

$database = new DatabaseHelper();

$mem_id = '';
if (isset($_POST['mem_id'])) {
    $mem_id = $_POST['mem_id'];
}

$wine_id = '';
if (isset($_POST['wine_id'])) {
    $wine_id = $_POST['wine_id'];
}

// Delete method
$error_code = $database->deleteWantTry($mem_id, $wine_id);

// Check result
if ($error_code == 1){
    echo "WantTry with ID: '{$mem_id} {$wine_id}' successfully deleted!'";
}
else{
    echo "Error can't delete WantTry with ID: '{$mem_id} {$wine_id}'. Errorcode: {$error_code}";
}
?>

<!-- link back to index page-->
<br>
<a href="WantTry.php">
    <button>
        go back
    </button>
</a>