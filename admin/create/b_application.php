<?php
session_start();
require_once '../../db/db.php';

$admin_id = $_SESSION['user'];
$admin_phone = $_SESSION['user_phone'];

$uniqueId= time().'-'.mt_rand();

$unique = strtoupper(bin2hex(random_bytes(3)));
$ran_id = rand(time(), 100000000);

$unique.' - '.$uniqueId.' - '.$ran_id;

if(isset($_POST['b_application'])){

    if($_POST['name']!=""){
      $name =$_POST['name'];
      $about =$_POST['about'];
      $empl =$_POST['empl'];
      $date =$_POST['date'];
      $insta =$_POST['insta'];
      $mobile =$_POST['mobile'];
      $phone =$_POST['phone'];
      $email =$_POST['email'];
      $division =$_POST['division'];
      $upazila =$_POST['upazila'];
      $zila =$_POST['zila'];
      $postCode =$_POST['postCode'];
      $map =$_POST['map'];
      $youtube =$_POST['youtube'];
      $fb =$_POST['fb'];

      $address = $upazila.', '.$zila.', '.$postCode.', '.$division;

      $uniqueId= time().'-'.mt_rand();

      $unique = strtoupper(bin2hex(random_bytes(3)));
      $ran_id = rand(time(), 100000000);
  

      $unique_id = $unique.'-'.$uniqueId.'-'.$ran_id;

      $b_id = $unique_id;
      
    
      $sql = "INSERT INTO business_profile(unique_id, b_name, b_desc, email, phone_one, phone_two, fb, insta, youtube, location, address, date_time, admin_id, admin_phone, num_employee, otp) VALUES('$unique_id','$name','$about','$email','$phone', '$mobile', '$fb', '$insta', '$youtube', '$map', '$address', '$date', '$admin_id', '$admin_phone', '$empl', '$unique')";

      if ($con->query($sql)) {

        $u_sql = "UPDATE users SET b_id = '$b_id' WHERE unique_id = '$admin_id' AND phone = '$admin_phone' ";
        if($con->query($u_sql)){
            echo "Business added Successfully!";
            $_SESSION['b_id'] = $b_id;
        }else{
            echo "Business added but Admin id not updated!";
        }


    } else {
        echo "Sorry, Something Went Wrong! Try Again Please! Error: " . $con->error;

        // error_log("MySQL Error: " . $con->error);
    }
  
  
    }else{
  
      echo "Sorry, Something Went Wrong! Try Again Please!";
  
    }
  
  
  }

?>