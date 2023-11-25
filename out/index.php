<?php
include('../db/db.php');
session_start();
if(isset($_SESSION['phone'])){
    $status = "Offline now";
    $sql = mysqli_query($con, "UPDATE users SET a_status = '{$status}' WHERE phone={$_SESSION['phone']}");
    if($sql){
        session_unset();
        session_destroy();
        header("location:../");
    }
}else{
    if(session_destroy()){
        header("location:../");
    }
}

?>
