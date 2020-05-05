<?php

$conn = mysqli_connect("localhost", "root",  'root', "wineapp");

$mem_id= $_GET["mem_id"];
$result = mysqli_query($conn, "SELECT * FROM follow WHERE member_id1 = '$mem_id'");



$customer = mysqli_fetch_object($result);


echo json_encode($customer);

?>