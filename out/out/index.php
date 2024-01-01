<?php
include('../db/db.php');
session_start();
if(isset($_SESSION['phone'])){
    $status = "Offline now";
    $sql = mysqli_query($con, "UPDATE users SET a_status = '{$status}' WHERE phone={$_SESSION['phone']}");
    if($sql){
         session_unset();
         session_destroy();

        unset($_SESSION['user']);
        unset($_SESSION['user_id']);
        unset($_SESSION['unique_id']);
        unset($_SESSION['user_phone']);
        unset($_SESSION['b_id']);
        unset($_SESSION['role']);
        unset($_SESSION['logged_in']);
        unset($_SESSION['row']);

        header("location:../");
    }
}else{
    unset($_SESSION['user']);
    unset($_SESSION['user_id']);
    unset($_SESSION['unique_id']);
    unset($_SESSION['user_phone']);
    unset($_SESSION['b_id']);
    unset($_SESSION['role']);
    unset($_SESSION['logged_in']);
    unset($_SESSION['row']);

    header("location:../");
     if(session_destroy()){
         header("location:../");
     }
}

?>
