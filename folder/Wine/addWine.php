<?php
require_once('../DatabaseHelper.php');
session_start(); 
$database = new DatabaseHelper();


$color = '';
if (isset($_POST['color'])) {
    $color = $_POST['color'];
}

$vintage = '';
if (isset($_POST['vintage'])) {
    $vintage = $_POST['vintage'];
}

$winery_name = '';
if (isset($_POST['winery_name'])) {
    $winery_name = $_POST['winery_name'];
}

$grape_name = '';
if (isset($_POST['grape_name'])) {
    $grape_name = $_POST['grape_name'];
}


$success = $database->insertIntoWine($color, $vintage, $winery_name, $grape_name);





if($_SESSION['status']=="admin"){
    
    $success = $database->insertIntoWine($color, $vintage, $winery_name, $grape_name);
    
    // Check result
    if ($success){
        echo "Wine successfully added!'";
    }
    else{
        echo "Error can't insert Wine!";
    }
    
    
}else{
    
    echo "You cant add new Wines, you are guest, sorry :(";
   
}

?>

<!-- link back to index page-->
<<br>
<a href="Wine.php">
    <button>
        go back
    </button>
</a>