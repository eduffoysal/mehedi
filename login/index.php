<?php
session_start();
if(isset($_SESSION['user']) && isset($_SESSION['b_id'])){
   if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){

      if(isset($_SESSION['current_page'])){
         $go_back = $_SESSION['current_page'];
         $_SESSION['current_page'] = 'user_login';

         if($go_back=='checkout_design'){
            header('location:../checkout');
         }elseif($go_back=='checkout_product'){
            header('location:../checkout/p');
         }elseif($go_back=='home_index'){
            header('location:../');
         }else{
            header('location:../');
         }

      }else{
         $_SESSION['current_page'] = 'user_login';
         header('location:../');
      }


   }
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>User Login and Registration | CMAByRaisa</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <script src="script.js" defer></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="node_modules/tw-elements/dist/css/index.min.css" />
    <!-- <script src="node_modules/tw-elements/dist/js/index.min.js"></script> -->
    <script src="node_modules/flowbite/dist/flowbite.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script src="../jquery-3.5.1.min.js"></script>

    <link rel="shortcut icon" href="image/<?=$iiim?>" type="image/x-icon" />

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>


<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="icon/bootstrap-icons.css">


<link rel="stylesheet" href="../css/tailwindcss-colors.css">



<link rel="stylesheet" href="../bootstrap.min.css">
    <!-- <script src="bootstrap.budle.min.js"></script> -->
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">



   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               User Login
            </div>
            <div class="title signup">
               User Signup
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
            <form action="#" class="login loginf" role="form" id="logform">
                  <div class="field">
                      <input placeholder="Phone Number" name="username" id="username" type="phone" autofocus required>
                      <input class="form-control" placeholder="Phone/User ID" name="melogin" id="melogin" type="hidden">
                  </div>                                    
                  <div class="field">
                    <input type="password" placeholder="Password" name="password" id="password" required>
                  </div>                                 
                 <div class="form-group">
                    <label for="userType">Login As :</label>
                        <select id="userType" name="userType">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
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
      <div class="container-fluid text-center m-auto">
      <div id="myalert" style="display:none;">
            <div class="col-md col-md-offset-4">
               <div class="alert alert-info text-center">
                  <center><span id="alerttext">Hlw</span></center>
               </div>
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




  $(document).on('click','.remove_product_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            remove_p: true
          },
          success: function(response){
              // alert(response);

              orderCart();


          }
        });
});


$(document).on('click','.remove_design_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            remove_d: true
          },
          success: function(response){
              // alert(response);

              bookingCart();

          }
        });
});




$('#order_cart_row_data').ready(function(){

  $.ajax({
    url:'product/design_product.php',
    type:'post',
    data: {
      order_cart: true
    },
    success: function(response){
      $('#order_cart_row_data').html(response);

    }
  });

  $.ajax({
    url:'product/design_product.php',
    type:'post',
    data: {
      booking_cart: true
    },
    success: function(response){
      $('#booking_cart_row_data').html(response);

    }
  });

});  

function orderCart(){
  $.ajax({
    url:'product/design_product.php',
    type:'post',
    data: {
      order_cart: true
    },
    success: function(response){
      $('#order_cart_row_data').html(response);

    }
  });
};

function bookingCart(){
  $.ajax({
    url:'product/design_product.php',
    type:'post',
    data: {
      booking_cart: true
    },
    success: function(response){
      $('#booking_cart_row_data').html(response);

    }
  });
};

function book_order_cart(){
  $.ajax({
    url:'product/design_product.php',
    type:'post',
    data: {
      order_cart: true
    },
    success: function(response){
      $('#order_cart_row_data').html(response);

    }
  });

  $.ajax({
    url:'product/design_product.php',
    type:'post',
    data: {
      booking_cart: true
    },
    success: function(response){
      $('#booking_cart_row_data').html(response);

    }
  });
};

  $(document).on('click', '.add_to_design_cart_btn', function(){


      var did = $(this).attr('id');
      // alert("fhia"+did);
			$('#myalert').slideUp();
			var design_form = $('#design_'+did).serialize();
			$.ajax({
				method: 'POST',
				url: 'product/design_product.php',
				data: design_form,

				success:function(data){
                    if(data==1){
                        Swal.fire({
                                type: 'success',
                                title: "Design Successfully Added to Cart!",
                                text: "Thank you ",
                                icon: "success",
                                button: false,
                                dangerMode: true,
                                timer: 3000,
                            
                            });
                        setTimeout(function(){
                        $('#myalert').slideDown();
                        $('#alerttext').html("Design Successfully Added to Cart!");
                        $('#class_add_btn').val('Save Class');
                        $('#class_form_data')[0].reset();
                        }, 2000);
                        setTimeout(function(){
                          book_order_cart();
                        }, 3000);
                    }else{
                        Swal.fire({
                                type: 'warning',
                                title: "Please Try Again!",
                                text: "Thanks"+data,
                                icon: "warning",
                                button: false,
                                dangerMode: true,
                                timer: 3000,
                            
                            });
                        setTimeout(function(){
                        $('#myalert').slideDown();
                        $('#alerttext').html(data);
                        }, 2000);
                        setTimeout(function(){
                        // location.reload();
                        }, 3000);
                    }
                   
				}
			});
		

	});        


  $(document).on('click', '.add_to_product_cart_btn', function(){


var did = $(this).attr('id');
// alert("fhia"+did);
$('#myalert').slideUp();
var product_form = $('#product_'+did).serialize();
$.ajax({
  method: 'POST',
  url: 'product/design_product.php',
  data: product_form,

  success:function(data){
              if(data==1){
                  Swal.fire({
                          type: 'success',
                          title: "Design Successfully Added to Cart!",
                          text: "Thank you ",
                          icon: "success",
                          button: false,
                          dangerMode: true,
                          timer: 3000,
                      
                      });
                  setTimeout(function(){
                  $('#myalert').slideDown();
                  $('#alerttext').html("Design Successfully Added to Cart!");
                  }, 2000);
                  setTimeout(function(){
                    book_order_cart()
                  }, 3000);
              }else{
                  Swal.fire({
                          type: 'warning',
                          title: "Please Try Again!",
                          text: "Thanks"+data,
                          icon: "warning",
                          button: false,
                          dangerMode: true,
                          timer: 3000,
                      
                      });
                  setTimeout(function(){
                  $('#myalert').slideDown();
                  $('#alerttext').html(data);
                  }, 2000);
                  setTimeout(function(){
                  // location.reload();
                  }, 3000);
              }
             
  }
});


});

	$(document).on('click', '#signupbutton', function(){
		if($('#susername').val()!='' && $('#spassword').val()!=''){
			$('#signupbutton').val('Signing up...');
			$('#myalert').slideUp();
			var signform = $('#signform').serialize();
			$.ajax({
				method: 'POST',
				url: '../user/login.php',
				data: signform,

				success:function(data){
					setTimeout(function(){
					$('#myalert').slideDown();
					$('#alerttext').html(data);
					$('#signupbutton').val('Sign up');
					$('#signform')[0].reset();
              //  alert(data);
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
					url: '../user/login.php',
					data: logform,
					success:function(data){
						if(data==1){
							$('#myalert').slideDown();
							$('#alerttext').text('Login Successful. User Verified!');
							$('#loginbutton').val('Thank You!');
							$('#logform')[0].reset();
							setTimeout(function(){
								location.reload();
               //  window.location.href = 'user/';
							}, 2000);
						}
						else{
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
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>
  <script src="../dist/js/scriptc.js"></script>
  <script src="../page.js"></script>
  <script src="../dist/js/scriptp.js"></script>
  <script type="text/javascript" src="../dist/js/script_p_c.js"></script>
  <script src="../dist/js/service_c.js"></script>
  <script src="../js/sweetalert.min.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>