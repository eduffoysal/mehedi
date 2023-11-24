<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:../');
}



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Admin Login and Registration | CMAByRaisa</title>
      <link rel="stylesheet" href="../../css/login_style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

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


    <link rel="stylesheet" href="../../bootstrap.min.css">
    <script src="../../bootstrap.budle.min.js"></script>
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">




        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
 -->






	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">






   </head>
   <body onload="myFunction()">

   <div id="loader">
      <?php include('.../../preload/pre.php');?>
   </div>
      <div class="container m-auto text-center">
         <!-- <div id="myalert" style="display:block;">
            <div class="col-md-4 col-md-offset-4">
               <div class="alert alert-info">
                  <center><span id="alerttext">Hlw</span></center>
               </div>
               </div>
         </div> -->
      </div>
      <div class="wrapper">
         
         <div class="title-text">
            
            <div class="title login">
               Admin Login
            </div>
            <div class="title signup">
               Admin Signup
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="#" class="login"  role="form" id="logform">
                  <div class="field">
                     <input placeholder="Phone Number" name="username" id="username" type="phone" autofocus required>
                     <input class="form-control" placeholder="Phone/User ID" name="melogin" id="melogin" type="hidden">

                  </div>                                    
                  <div class="field">
                     <input type="password" placeholder="Password" name="password" id="password" required>
                  </div>                                 
                 <div class="form-group">
                    <label for="userType">Login As :</label>
                        <select id="userType" name="userType" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>                 
                  
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">remember me</label>
                  </div>
                  
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="button" id="loginbutton" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <form action="#" class="signup" role="form" id="signform">
                <div class="field">
                    <input placeholder="Phone Number" name="phone" id="sphone" type="phone" required>
                 </div>
                  <div class="field">
                     <input type="text" placeholder="Email Address" name="semail" id="semail">
                  </div>
                  <div class="field">
                    <input type="text" placeholder="User Name" name="susername" id="susername" type="text" required>
                 </div>
                  <div class="field">
                     <input placeholder="Password" name="spassword" id="spassword" type="number" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Confirm password" name="scpassword" id="scpassword" required>
                  </div>
                  
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input class="form-control" placeholder="Phone/Student ID" name="mesignup" id="mesignup" type="hidden">
                     <input type="button" id="signupbutton" value="Signup">
                     <!-- <button type="button" id="signupbutton" class="btn btn-block"><span class="glyphicon glyphicon-check"></span> <span id="signtext">Sign Up</span></button> -->


                  </div>
                  
               </form>
            </div>
         </div>



      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>
<script>
    var preloader = document.getElementById('loader');
    function myFunction(){
        preloader.style.display = 'none';
    }
</script>

<script>
    var preload = document.getElementById('loader');
    var content = document.getElementById('content');
    window.onload=function() {
            
            preload.style.display = 'none';
            content.style.display = 'block';
    }
</script>

<script>
    $(window).on('load',function(){
        $('#loader').fadeOut(1000);
        $('#content').fadeIn(1000);
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/platform/1.3.6/platform.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>

<script src="../jsnav/bootstrap.bundle.js"></script>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
	//bind enter key to click button
	$(document).keypress(function(e){
    	if (e.which == 13){
    		if($('#loginform').is(":visible")){
    			$("#loginbutton").click();
    		}
        	else if($('#signupform').is(":visible")){
        		$("#signupbutton").click();
        	}
    	}
	});

	$('#signup').click(function(){
		$('#loginform').slideUp();
		$('#signupform').slideDown();
		$('#myalert').slideUp();
		$('#signform')[0].reset();
	});

	$('#login').click(function(){
		$('#loginform').slideDown();
		$('#signupform').slideUp();
		$('#myalert').slideUp();
		$('#logform')[0].reset();
	});

	$(document).on('click', '#signupbutton', function(){
		if($('#susername').val()!='' && $('#spassword').val()!=''){
			$('#signupbutton').val('Signing up...');
			$('#myalert').slideUp();
			var signform = $('#signform').serialize();
			$.ajax({
				method: 'POST',
				url: 'login.php',
				data: signform,

				success:function(data){
					setTimeout(function(){
					$('#myalert').slideDown();
					$('#alerttext').html(data);
					$('#signupbutton').val('Sign up');
					$('#signform')[0].reset();
               alert(data);
					}, 2000);
				}
			});
		}
		else{
			alert('Please input all fields to Sign Up');
		}
	});

	$(document).on('click', '#loginbutton', function(){
		if($('#username').val()!=''){
			$('#loginbutton').val('Logging in...');
			$('#myalert').slideUp();
			var logform = $('#logform').serialize();
			setTimeout(function(){
				$.ajax({
					method: 'POST',
					url: './login.php',
					data: logform,
					success:function(data){
						if(data==1){
							$('#myalert').slideDown();
							$('#alerttext').text('Login Successful. User Verified!');
							$('#loginbutton').val('Thank You!');
							$('#logform')[0].reset();
							setTimeout(function(){
								location.reload();
							}, 2000);
						}
						else{
                     alert(data);
							$('#myalert').slideDown();
							$('#alerttext').html(data);
							$('#loginbutton').val('Try Again!');
							$('#logform')[0].reset();
						}
					}
				});
			}, 2000);
		}
		else{
			alert('Please input Phone fields to Login');
		}
	});
});
</script>