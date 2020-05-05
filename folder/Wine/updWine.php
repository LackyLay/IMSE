<?php
require_once('../DatabaseHelper.php');

$database = new DatabaseHelper();

$wine_id = '';
if(isset($_POST['wine_id'])){
    $wine_id = $_POST['wine_id'];
}

$vintage = '';
if(isset($_POST['vintage'])){
    $vintage = $_POST['vintage'];
}

$success = $database->updateWine( $wine_id, $vintage);

if ($success){
    echo "Wine '{$wine_id}' successfully update to Vintage: '{$vintage}'!";
}
else{
    echo "Error can't update Wine '{$wine_id}'  to Vintage: '{$vintage}'!";
}
?>

<!-- link back to index page-->
<br>
<a href="Wine.php">
    <button>
        go back
    </button>
</a>
