<?php

$conn = mysqli_connect("localhost", "root",  'root', "wineapp");

$mem_id= $_GET["mem_id"];
$result = mysqli_query($conn, "SELECT * FROM want_try WHERE member_id = '$mem_id'");



$customer2 = mysqli_fetch_object($result);


echo json_encode($customer2);

?>