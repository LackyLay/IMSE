<?php


require_once('../DatabaseHelper.php');

$database = new DatabaseHelper();

$wine_id = '';
if (isset($_GET['wine_id'])) {
    $wine_id = $_GET['wine_id'];
}
$color = '';
if (isset($_GET['color'])) {
    $color = $_GET['color'];
}

$vintage = '';
if (isset($_GET['vintage'])) {
    $vintage = $_GET['vintage'];
}

$winery_name = '';
if (isset($_GET['winery_name'])) {
    $winery_name = $_GET['winery_name'];
}

$grape_name = '';
if (isset($_GET['grape_name'])) {
    $grape_name = $_GET['grape_name'];
}



//Fetch data from database
$wine_array = $database->selectFromWineWhere($wine_id, $color, $vintage, $winery_name, $grape_name);
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
    <h1>Wine panel</h1>
</div>

<!-- Add Wine -->
<h2>Add Wine: </h2>
<form method="post" action="addWine.php">

    <div>
        <label for="new_color">Color:</label>
        <input id="new_color" name="color" type="text" maxlength="1000">
    </div>
    <br>

    <div>
        <label for="new_vintage">Vintage:</label>
        <input id="new_vintage" name="vintage" type="number" min="0">
    </div>
    <br>

    <div>
        <label for="new_winery">Winery name:</label>
        <input id="new_winery" name="winery_name" type="text" maxlength="100">
    </div>
    <br>

    <div>
        <label for="new_grape">Grape name:</label>
        <input id="new_grape" name="grape_name" type="text" maxlength="100">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Add Wine
        </button>
    </div>
</form>
<br>
<hr>

<!-- Delete Wine -->
<h2>Delete Wine: </h2>
<form method="post" action="delWine.php">

    <div>
        <label for="del_name">Wine ID:</label>
        <input id="del_name" name="wine_id" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Delete Wine
        </button>
    </div>
</form>
<br>
<hr>

<!-- Update Wine -->
<h2>Update Wine: </h2>
<form method="post" action="updWine.php">

    <div>
        <label for="upd_name">Wine ID:</label>
        <input id="upd_name" name="wine_id" type="number" min="0">
    </div>
    <br>

    <div>
        <label for="upd_vintage">Update to Vintage:</label>
        <input id="upd_vintage" name="vintage" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Update Wine
        </button>
    </div>
</form>
<br>
<hr>


<!-- Search form -->
<h2>Wine Search:</h2>
<form method="get">

    <div>
        <label for="wine_id">Wine ID:</label>
        <input id="wine_id" name="wine_id" type="number" value='<?php echo $wine_id; ?>' min="0">
    </div>
    <br>


    <div>
        <label for="color">Color:</label>
        <input id="color" name="color" type="text" value='<?php echo $color; ?>' >
    </div>
    <br>

    <div>
        <label for="vintage">Vintage:</label>
        <input id="vintage" name="vintage" type="number" value='<?php echo $vintage; ?>' min="0">
    </div>
    <br>

    <div>
        <label for="winery_name">Winery Name:</label>
        <input id="winery_name" name="winery_name" type="text" value='<?php echo $winery_name; ?>' >
    </div>
    <br>

    <div>
        <label for="grape_name">Grape Name:</label>
        <input id="grape_name" name="grape_name" type="text" value='<?php echo $grape_name; ?>' >
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
<h2>Review Search Result:</h2>
<table class="table table-bordered">
    <tr>
        <th>Wine ID</th>
        <th>Color</th>
        <th>Vintage</th>
        <th>Winery Name</th>
        <th>Grape Name</th>
    </tr>
    <?php foreach ($wine_array as $wine) : ?>
        <tr>
            <td><?php echo $wine['wine_id']; ?>  </td>
            <td><?php echo $wine['color']; ?>  </td>
            <td><?php echo $wine['vintage']; ?>  </td>
            <td><?php echo $wine['winery_name']; ?>  </td>
            <td><?php echo $wine['grape_name']; ?>  </td>
        </tr>
    <?php endforeach; ?>
</table>



</body>
</html>
