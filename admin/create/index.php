<?php
include('../../db/db.php');
 session_start();

if(isset($_SESSION['user'])){
    $_SESSION['visitor_id']=$_SESSION['user'];
    $_SESSION['unique_id']=$_SESSION['user'];
    $_SESSION['role']='admin';

    $b_id = $_SESSION['b_id'];

    if($b_id !=''){
        header("location:../");
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
	<title>Fill up full Form to Create Your Business Here</title>
    
              <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

              <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../../jquery-3.4.1.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="../../icon/bootstrap-icons.css">

    <!-- <script src="ck/ckeditor.js"></script> -->
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <!-- <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script> -->
    <script src="../../jquery-3.5.1.min.js"></script>
    <!-- swap -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- swap -->


    <!-- <link rel="stylesheet" href="../../bootstrap.min.css">
    <script src="../../bootstrap.budle.min.js"></script> -->

    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">




        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
 -->






	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->




	<link rel="stylesheet" type="text/css" href="../../css/create_style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
	<div id="svg_wrap"></div>

 <h1>CMAByRaisa Application Form</h1>
<section>
  <p><i class="bi bi-person"></i> Buisness's information</p>
  <input type="text" id="bname" placeholder="Business Name" />
  <input type="text" id="babout" placeholder="About/Description" />
  <input type="url" id="fb" placeholder="Facebook URL" />
  <input type="url" id="youtube" placeholder="Youtube URL" />
</section>

<section>
  <p><i class="bi bi-building"></i> Address</p>
  <input type="text" id="upazila" placeholder="Street/Word, Union, Upazila" />
  <input type="text" id="zila" placeholder="City/Zila" />
  <input type="text" id="pcode" placeholder="Postcode" />
  <input type="text" id="division" placeholder="Division" />
  <input type="url" id="map" placeholder="Map/Location URL" />
</section>

<section>
  <p><i class="bi bi-telephone"></i> Contact information</p>
  <input type="text" id="email" placeholder="Email address" />
  <input type="phone" id="phone" placeholder="Phone" />
  <input type="phone" id="mobile" placeholder="Mobile" />
  <input type="url" id="insta" placeholder="Instagram URL" />
</section>

<section>
  <p><i class="bi bi-file-text"></i> Application</p>
  <input type="date" id="date" placeholder="Preferred entrance date" />
  <input type="number" id="empl" placeholder="Number of people/employee" />
</section>

<section>
  <p><i class="bi bi-journal-text"></i> Terms and Conditions</p>
  <hr>
  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero ullam optio quis voluptas ipsam illum beatae nisi autem blanditiis possimus quidem, qui accusantium necessitatibus provident earum nihil, saepe animi, similique vero, inventore corrupti amet!</p>
</section>

  <div class="button" id="prev">&larr; Previous</div>
<div class="button" id="next">Next &rarr;</div>
<div class="button" class="b_data_send_btn" id="submit">Agree and send application</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/platform/1.3.6/platform.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>

<script src="../../jsnav/bootstrap.bundle.js"></script>
    <script src="../../jquery-3.4.1.min.js"></script>
    <script src="../../sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/create_script.js"></script>
</body>
</html>


<script>
  $(document).ready(function(){
    $('#submit').click(function(){

      var bname = $('#bname').val();
      var babout = $('#babout').val();
      var fb = $('#fb').val();
      var youtube = $('#youtube').val();
      var upazila = $('#upazila').val();
      var zila = $('#zila').val();
      var postCode = $('#pcode').val();
      var map = $('#map').val();
      var division = $('#division').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var mobile = $('#mobile').val();
      var insta = $('#insta').val();
      var date = $('#date').val();
      var empl = $('#empl').val();


      if($.trim(bname).length == 0){
        error_msg = "অনুগ্রহ করে বিষয়ের নাম দিন!";
        $('#status_add').text(error_msg);
      }else{
        error_msg = "";
        $('#status_add').text(error_msg);
      }
      if(error_msg != ''){
        return false;
      }else{
        $.ajax({
              url:'b_application.php',
              type:'post',
              data: {
                name: bname,
                about: babout,
                empl:empl,
                date:date,
                insta:insta,
                mobile:mobile,
                phone:phone,
                email:email,
                division:division,
                upazila:upazila,
                zila:zila,
                postCode:postCode,
                map:map,
                youtube:youtube,
                fb:fb,
                b_application: true,
              },
              success: function(response){
                $('#status_add').html(response);
                // alert(response);
            Swal.fire({
              type: 'success',
              title: "Business Form Successfully added!",
              text: "THank you admin saheb!",
              icon: "success",
              button: false,
              dangerMode: true,
              timer: 3000,
              
            });

                setTimeout(function(){
					location.reload();
				}, 3000);

              }
            });
      }

    });
  });
</script>