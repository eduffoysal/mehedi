<?php
session_start();
$_SESSION['current_page'] = 'checkout_product';
if(!isset($_SESSION['user']) && !isset($_SESSION['b_id'])){
   if(!isset($_SESSION['logged_in'])){
      header('location:../../login');
   }
}


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Responsive Checkout Form</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../checkout.css">


         <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

         <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../../jquery-3.4.1.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="../icon/bootstrap-icons.css">

    <!-- <script src="ck/ckeditor.js"></script> -->
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <!-- <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script> -->
    <script src="../../jquery-3.5.1.min.js"></script>

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

    <script src="../../bootstrap.min.js"></script>
    <script src="../../bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</head>
<body>
<h2>Checkout Order Cart</h2>
<div class="row">
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

            <label for="city"><i class="fa fa-institution"></i> Shipping Address</label>
            <input type="text" id="city" name="city" placeholder="Shipping Address">

          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="button" value="Continue to checkout" id='checkout_btn' class="btn btn-warning checkout_btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>4</b></span></h4>
      <p><a href="#">Item 1</a> <span class="price">$105</span></p>
      <p><a href="#">Item 2</a> <span class="price">$95</span></p>
      <p><a href="#">Item 3</a> <span class="price">$100</span></p>
      <p><a href="#">Item 4</a> <span class="price">$50</span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>$350</b></span></p>
    </div>
  </div>
</div>
</body>
</html>