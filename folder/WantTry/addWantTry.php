<?php
require_once('../DatabaseHelper.php');

$database = new DatabaseHelper();

$mem_id = '';
if (isset($_POST['mem_id'])) {
    $mem_id = $_POST['mem_id'];
}

$wine_id = '';
if (isset($_POST['wine_id'])) {
    $wine_id = $_POST['wine_id'];
}

// Insert method
$success = $database->insertIntoWantTry($mem_id, $wine_id);

// Check result
if ($success){
    echo "WantTry '{$mem_id} {$wine_id}' successfully added!'";
}
else{
    echo "Error can't insert WantTry '{$mem_id} {$wine_id}' !";
}
?>

<!-- link back to index page-->
<<br>
<a href="WantTry.php">
    <button>
        go back
    </button>
</a>