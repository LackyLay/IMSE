<?php


session_start();

if (isset($_POST['username'])){
    
    $username=$_POST['username'];
    
    $username = stripcslashes($username);
    
    
    $conn = mysqli_connect("localhost", "root",  'root', "wineapp");
    
    $sql = "SELECT * FROM member WHERE nickname = '$username'";
    
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)){
        
        
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $username;
        $_SESSION['status'] =$row[status];
        $_SESSION['mem_id'] =$row[mem_id];
        header('location:../../MainSite.php');
        
    }else{

        header('location:../../index.php');
    }
    
    
    
  
  
}else{
    echo "Fail ent";
}

    
  
    
    
    
    


?>