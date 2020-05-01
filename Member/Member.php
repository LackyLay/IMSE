<?php

// Include DatabaseHelper.php file
require_once('../DatabaseHelper.php');

// Instantiate DatabaseHelper class
$database = new DatabaseHelper();

// Get parameter 'person_id', 'surname' and 'name' from GET Request
// Btw. you can see the parameters in the URL if they are set
$mem_id = '';
if (isset($_GET['mem_id'])) {
    $mem_id = $_GET['mem_id'];
}

$nickname = '';
if (isset($_GET['nickname'])) {
    $nickname = $_GET['nickname'];
}

$country = '';
if (isset($_GET['country'])) {
    $country = $_GET['country'];
}

//Fetch data from database
$member_array = $database->selectFromMemberWhere($mem_id, $nickname, $country);
?>



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    
    
    
    
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
<h1>Member panel</h1>
</div>
<!-- Add Member -->
<h2>Add Member: </h2>
<form method="post" action="addMember.php">


    <!-- Nickname textbox -->
    <div>
        <label for="new_nickname">Nickname:</label>
        <input id="new_nickname"   name="nickname" type="text" maxlength="20">
    </div>
    <br>

    <!-- Country textbox -->
    <div>
        <label for="new_country">Country:</label>
        <input id="new_country"  name="country" type="text" maxlength="20">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Add Member
        </button>
    </div>
</form>
<br>
<hr>

<!-- Delete Person -->
<h2>Delete Member: </h2>
<form method="post" action="delMember.php">
    <!-- ID textbox -->
    <div>
        <label for="del_name">ID:</label>
        <input id="del_name" name="id" type="number" min="0">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Delete Member
        </button>
    </div>
</form>
<br>
<hr>


<!-- Update Person -->
<h2>Update Member: </h2>
<form method="post" action="updMember.php">
    <!-- ID textbox -->
    <div>
        <label for="upd_name">ID:</label>
        <input id="upd_name" name="id" type="number" min="0">
    </div>
    <br>

    <div>
        <label for="upd_name">Update to country:</label>
        <input id="upd_name" name="country" type="text" maxlength="20">
    </div>
    <br>

    <!-- Submit button -->
    <div>
        <button type="submit">
            Update Member
        </button>
    </div>
</form>
<br>
<hr>


<!-- Search form -->
<h2>Member Search:</h2>
<form method="get">
    <!-- ID textbox:-->
    <div>
        <label for="mem_id">ID:</label>
        <input id="mem_id" name="mem_id" type="number" value='<?php echo $mem_id; ?>' min="0">
    </div>
    <br>

    <!-- Name textbox:-->
    <div>
        <label for="nickname">Nickname:</label>
        <input id="nickname"  name="nickname" type="text"  value='<?php echo $nickname; ?>'
               maxlength="20">  <!--  todo -->
    </div>
    <br>

    <!-- Surname textbox:-->
    <div>
        <label for="country">Coutry:</label>
        <input id="country" name="country" type="text"
               value='<?php echo $country ?>' maxlength="20"> <!--  todo -->
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
<h2>Member Search Result:</h2>
<table class="table table-bordered">
    <tr>
        <th>Mem_id</th>
        <th>Nickname</th>
        <th>Country</th>
    </tr>
    <?php foreach ($member_array as $member) : ?>
        <tr>
            <td><?php echo $member['mem_id']; ?>  </td>
            <td><?php echo $member['nickname']; ?>  </td>
            <td><?php echo $member['country']; ?>  </td>
            
            
            
            <!-- Desplaying detail button -->
            <td> 
            	<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target ="#myModal">
            	
            	Details
            	
            	
            	</button>
            </td>
             <td> 
            	<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target ="#myModal">
            	
            	Follow
            	
            	
            	</button>
            </td>
            
        </tr>
    <?php endforeach; ?>
</table>

<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <h4 class = "modal-title">
               Customer Detail
            </h4>

            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
               ×
            </button>
         </div>
         
         <div id = "modal-body">
            Press ESC button to exit.
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               OK
            </button>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   
</div><!-- /.modal -->

Live Demo
<h2>Example of creating Modals with Twitter Bootstrap</h2>

<!-- Button trigger modal -->
<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target = "#myModal">
   Launch demo modal
</button>

<!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               This Modal title
            </h4>
         </div>
         
         <div class = "modal-body">
            Add some text here
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-default" data-dismiss = "modal">
               Close
            </button>
            
            <button type = "button" class = "btn btn-primary">
               Submit changes
            </button>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->



</body>
</html>
