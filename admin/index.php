<?php
include('../db/db.php');
session_start();

if(isset($_SESSION['user'])){
    $_SESSION['visitor_id']=$_SESSION['user'];
    $_SESSION['unique_id']=$_SESSION['user'];
    if($_SESSION['role']=='customer'){
        header("location:../user");
    }elseif($_SESSION['role']=='user'){
        header("location:../user");
    }
    if($_SESSION['b_id']==''){
        header("location:create");
    }else{
        $b_id = $_SESSION['b_id'];
    }

}else{
    header("location:login");
}


if(!isset($_SESSION['user'])){
    header('location:login');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../../output/./output.css">
</head>
<body>

    <a href="../../out">Admin Logout</a>
    
    

</body>
</html>