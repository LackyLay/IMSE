<?php
//include DatabaseHelper.php file
require_once('../DatabaseHelper.php');

//instantiate DatabaseHelper class
$database = new DatabaseHelper();

//Grab variables from POST request
$nickname = '';
if(isset($_POST['nickname'])){
    $nickname = $_POST['nickname'];
}

$country = '';
if(isset($_POST['country'])){
    $country = $_POST['country'];
}

// Insert method
$success = $database->insertIntoMember($nickname, $country);

// Check result
if ($success){
    echo "Member '{$nickname} {$country}' successfully added!'";
}
else{
    echo "Error can't insert Member '{$nickname} {$country}'!";
}
?>

<!-- link back to index page-->
<<br>
<a href="Member.php">
    <button>
        go back
    </button>
</a>