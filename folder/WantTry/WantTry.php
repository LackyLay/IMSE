<?php


require_once('../DatabaseHelper.php');

$database = new DatabaseHelper();


$mem_id = '';
if (isset($_GET['mem_id'])) {
    $mem_id = $_GET['mem_id'];
}

$wine_id = '';
if (isset($_GET['wine_id'])) {
    $wine_id = $_GET['wine_id'];
}

//Fetch data from database
$wanttry_array = $database->selectFromWantTryWhere($mem_id, $wine_id);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Baloo Bhaina' rel='stylesheet'>
    <style>
        h1 {
            font-family: 'Baloo Bhaina';font-size: 45px;
        }
    </style>
    <title>WineApp</title>
</head>

<body>
<a href="../MainSite.php">
    <h1 style="color:hsl(0, 100%, 25%);">
        WineApp
    </h1>
</a>
<br>
<div class="text-center">
    <h1>Want Try panel</h1>
</div>
<!-- Add WantTry -->
<h2>Add WantTry: </h2>
<form method="post" action="addWantTry.php">

    <div>
        <label for="new_mem">MemberID:</label>
        <input id="new_mem" name="mem_id" type="number" min="0">
    </div>
    <br>

    <div>
        <label for="new_wine">Wine ID:</label>
        <input id="new_wine" name="wine_id" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Add WantTry
        </button>
    </div>
</form>
<br>
<hr>

<!-- Delete Review -->
<h2>Delete WantTry: </h2>
<form method="post" action="delWantTry.php">

    <div>
        <label for="new_mem">MemberID:</label>
        <input id="new_mem" name="mem_id" type="number" min="0">
    </div>
    <br>

    <div>
        <label for="new_wine">Wine ID:</label>
        <input id="new_wine" name="wine_id" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Delete WantTry
        </button>
    </div>
</form>
<br>
<hr>

<!-- Update WantTry -->
<h2>Update WantTry: </h2>
<form method="post" action="updWantTry.php">

    <div>
        <label for="new_mem">MemberID:</label>
        <input id="new_mem" name="mem_id" type="number" min="0">
    </div>
    <br>

    <div>
        <label for="new_wine">Wine ID:</label>
        <input id="new_wine" name="wine_id" type="number" min="0">
    </div>
    <br>


    <div>
        <label for="new_wine">New Wine ID:</label>
        <input id="new_wine" name="wine_id_new" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Update WantTry
        </button>
    </div>
</form>
<br>
<hr>


<!-- Search form -->
<h2>WantTry Search:</h2>
<form method="get">

    <div>
        <label for="new_mem">MemberID:</label>
        <input id="new_mem" name="mem_id" type="number" value='<?php echo $mem_id; ?>' min="0">
    </div>
    <br>

    <div>
        <label for="new_wine">Wine ID:</label>
        <input id="new_wine" name="wine_id" type="number" value='<?php echo $wine_id; ?>' min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button id='submit' type='submit'>
            Search
        </button>
    </div>
</form>
<br>
<hr>


<!-- Search result -->
<h2>WantTry Search Result:</h2>
<table class="table table-bordered">
    <tr>
        <th>Member ID</th>
        <th>Wine ID</th>
    </tr>
    <?php foreach ($wanttry_array as $wanttry) : ?>
        <tr>
            <td><?php echo $wanttry['member_id']; ?>  </td>
            <td><?php echo $wanttry['wine_id']; ?>  </td>
        </tr>
    <?php endforeach; ?>
</table>



</body>
</html>
