<?php
include("../db/db.php");
session_start();
$_SESSION['current_page'] = 'checkout_design';
if(!isset($_SESSION['user']) && !isset($_SESSION['b_id'])){
   if(!isset($_SESSION['logged_in'])){
      header('location:../login');
   }
}

function my_autoloader($class) {
    require $class . '.php';
}
spl_autoload_register(function ($class) {
    include $class . '.php';
});
my_autoloader('../Modals/OrderList');



if (isset($_SESSION["super_b_id"])) {
    $b_id = $_SESSION['super_b_id'];
}else{
    $super_sql = "SELECT super_b_id as b_id FROM super_admin WHERE unique_id='1'";
    $super_query=mysqli_query($con, $super_sql);
    $super_query_num=mysqli_num_rows($super_query);
    if ($super_query_num ==1 || $super_query_num > 0) {
        $super = mysqli_fetch_assoc($super_query);

        $b_id = $super['b_id'];

        $_SESSION['super_b_id'] = $b_id;
    }else{
        $b_id = 0;
    }
}

if(isset($_SESSION["user"]) && isset($_SESSION['b_id'])){
    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]==true){
        $user = $_SESSION['user'];
        $user_id = $_SESSION['user_id'];
        $user_u_id = $_SESSION['unique_id'];
        $user_phone = $_SESSION['user_phone'];
        $user_b_id = $_SESSION['b_id'];
        $user_role = $_SESSION['role'];
        $user_logged_in = $_SESSION['logged_in'];
    }else{
        $user = "";
        $user_id = "";
        $user_u_id = "";
        $user_phone = "";
        $user_b_id = "";
        $user_role = "";
        $user_logged_in = false;
    }


}else{
    $user = "";
    $user_id = "";
    $user_u_id = "";
    $user_phone = "";
    $user_b_id = "";
    $user_role = "";
    $user_logged_in = false;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Design Added Cart Checkout</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="checkout.css">


         <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

         <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../jquery-3.4.1.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="../icon/bootstrap-icons.css">

    <!-- <script src="ck/ckeditor.js"></script> -->
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <!-- <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script> -->
    <script src="../jquery-3.5.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- swap -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- swap -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/jquery-3.5.1.min.js"></script>

    <script src="../bootstrap.min.js"></script>
    <script src="../bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</head>
<body>
<div class="container-fluid">
  <h2>Checkout Design Cart</h2>
  </div>
<div class="row container-fluid">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Customer Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Full Name">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="email@gmail.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Full Address</label>
            <input type="text" id="adr" name="address" placeholder="islampur, coxsbazar, N1 Road">
            <label for="city"><i class="fa fa-institution"></i> City/Thana</label>
            <input type="text" id="city" name="city" placeholder="CoxsBazar/sadar">


            <div class="row">
              <div class="col-50">
                <label for="postoffice">Post Office</label>
                <input type="text" id="postoffice" name="postoffice" placeholder="NAPITKHALI Bodtol">
              </div>
              <div class="col-50">
                <label for="zip">Post Code</label>
                <input type="text" id="zip" name="zip" placeholder="400001">
              </div>
            </div>
            <div class="row">
              <div class="col-50">
                <label for="fname"><i class="fa fa-user"></i> Referral or Coupon</label>
                <input type="text" id="fname" name="firstname" placeholder="EDU10">
              </div>
              <div class="col-50">
              <label for="coupon_apply_btn"></label>
              <input type="button" value="Apply" class="btn btn-outline-warning coupon_apply_btn" id="coupon_apply_btn">
              </div>
            </div>

          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Payment Method</label>
            <div class="input-field form-control form-floating w-full">
                <select name="pay_method" id="pay_method" required>
                <option value='cash'>Cash</option>    
                <option value='bkash'>Bkash</option>
                    <option value='nagad'>Nagad</option>
                    <option value='dbbl'>DBBL</option>
                    <option value='islami'>Islami Bank</option>
                    <option value='asia'>Bank Asia</option>
                    <option value='bank'>Others Bank</option>
                </select>
            </div>
            <label for="cname">Phone Number or A/N</label>
            <input type="text" id="cname" name="payPhone" placeholder="Bkash/Nagad/A?N Number">
            <label for="ccnum">Customer Contact Phone</label>
            <input type="text" id="ccnum" name="phone" placeholder="01585855075">
          </div>

        </div>

        <input type="button" value="Continue to checkout" id='checkout_btn' class="btn btn-warning checkout_btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>




      <?php

if(empty($_SESSION['design_cart'])){
    $total = 0;
    $qntotal = 0;
}?>
<?php if(isset($_SESSION['design_cart'])){
    $total = 0;
    $qntotal = 0;
    foreach($_SESSION['design_cart'] as $k=> $item){
        $total = $total + ($item['quantity'] * $item['price']);
        $qntotal = $qntotal +$item['quantity'];
        
    }


    $orderList = convertSessionToObjects('design_cart');

    foreach ($orderList as $index => $list) {
        ?>


          <p><a href="#"><?=$list->getProName()?> 1</a> <span class="price">BDT <?=$list->getTotalPrice()?></span></p>

        <?php
    }

}

?>      



      <!-- <p><a href="#">Item 2</a> <span class="price">$95</span></p>
      <p><a href="#">Item 3</a> <span class="price">$100</span></p>
      <p><a href="#">Item 4</a> <span class="price">$50</span></p> -->
      <hr>
      <p>Total <span class="price" style="color:black"><b><?=calculateTotalPrice('design_cart')?> BDT</b></span></p>
    </div>
  </div>
</div>
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
          url:'../product/design_product.php',
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
          url:'../product/design_product.php',
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


$(document).on('click','.minus_p_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            minus_p: true
          },
          success: function(response){
              // alert(response);

              orderCart();


          }
        });
});


$(document).on('click','.plus_p_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            plus_p: true
          },
          success: function(response){
              // alert(response);

              orderCart();


          }
        });
});


$(document).on('click','.minus_d_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            minus_d: true
          },
          success: function(response){
              // alert(response);

              bookingCart();

          }
        });
});


$(document).on('click','.plus_d_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            plus_d: true
          },
          success: function(response){
              // alert(response);

              bookingCart();

          }
        });
});

$('#order_cart_row_data').ready(function(){

  $.ajax({
    url:'../product/design_product.php',
    type:'post',
    data: {
      order_cart: true
    },
    success: function(response){
      $('#order_cart_row_data').html(response);

    }
  });

  $.ajax({
    url:'../product/design_product.php',
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
    url:'../product/design_product.php',
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
    url:'../product/design_product.php',
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
    url:'../product/design_product.php',
    type:'post',
    data: {
      order_cart: true
    },
    success: function(response){
      $('#order_cart_row_data').html(response);

    }
  });

  $.ajax({
    url:'../product/design_product.php',
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
				url: '../product/design_product.php',
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
  url: '../product/design_product.php',
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
				url: 'user/login.php',
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
					url: 'user/login.php',
					data: logform,
					success:function(data){
						if(data==1){
							$('#myalert').slideDown();
							$('#alerttext').text('Login Successful. User Verified!');
							$('#loginbutton').val('Thank You!');
							$('#logform')[0].reset();
							setTimeout(function(){
								// location.reload();
                window.location.href = 'user/';
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
  <script src="dist/js/scriptp.js"></script>
  <script type="text/javascript" src="../dist/js/script_p_c.js"></script>
  <script src="../dist/js/service_c.js"></script>
  <script src="../js/sweetalert.min.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>