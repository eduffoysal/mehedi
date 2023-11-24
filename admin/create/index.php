<?php
include('../../db/db.php');
 session_start();

if(isset($_SESSION['user'])){
    $_SESSION['visitor_id']=$_SESSION['user'];
    $_SESSION['unique_id']=$_SESSION['user'];
    $_SESSION['role']='admin';
    // if($_SESSION['b_id']==''){
    //     header("location:create");
    // }else{
    //     $b_id = $_SESSION['b_id'];
    // }

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
	<title>Fill up full Form to Create Your Business Here</title>

	<link rel="stylesheet" type="text/css" href="../../css/create_style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
	<div id="svg_wrap"></div>

 <h1>CMAByRaisa Application Form</h1>
<section>
  <p><i class="bi bi-person"></i> Personal information</p>
  <input type="text" placeholder="Firstname" />
  <input type="text" placeholder="Surname" />
  <input type="date" placeholder="Birthdate" />
  <input type="number" placeholder="Insurance number" />
</section>

<section>
  <p><i class="bi bi-building"></i> Address</p>
  <input type="text" placeholder="Street, nbr" />
  <input type="text" placeholder="City" />
  <input type="text" placeholder="Postcode" />
  <input type="text" placeholder="Country" />
</section>

<section>
  <p><i class="bi bi-telephone"></i> Contact information</p>
  <input type="text" placeholder="Email address" />
  <input type="number" placeholder="Phone" />
  <input type="number" placeholder="Mobile" />
</section>

<section>
  <p><i class="bi bi-file-text"></i> Application</p>
  <input type="date" placeholder="Preferred entrance date" />
  <input type="number" placeholder="Number of people" />
</section>

<section>
  <p><i class="bi bi-journal-text"></i> Terms and Conditions</p>
  <hr>
  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero ullam optio quis voluptas ipsam illum beatae nisi autem blanditiis possimus quidem, qui accusantium necessitatibus provident earum nihil, saepe animi, similique vero, inventore corrupti amet!</p>
</section>

  <div class="button" id="prev">&larr; Previous</div>
<div class="button" id="next">Next &rarr;</div>
<div class="button" id="submit">Agree and send application</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/create_script.js"></script>
</body>
</html>