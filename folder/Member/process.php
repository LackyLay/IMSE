<?php
session_start(); 

$mysqli = new mysqli("localhost", "root",  'root', "wineapp");

$l = $_SESSION['mem_id'];

if(isset($_GET['follow'])){
    $follow_id = $_GET['follow'];
    $mysqli->query("INSERT INTO `follow`(`member_id1`, `member_id2`) VALUES ('$l','$follow_id')");
    
    header("location: Member.php");
    
}

