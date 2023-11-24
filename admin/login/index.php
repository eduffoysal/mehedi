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
   </head>
   <body onload="myFunction()">

   <div id="loader">
      <?php include('.../../preload/pre.php');?>
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
               <form action="#" class="login">
                  <div class="field">
                     <input type="text" placeholder="Email Address" required>
                  </div>                                    
                  <div class="field">
                     <input type="password" placeholder="Password" required>
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
                     <input type="submit" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <form action="#" class="signup">
                <div class="field">
                    <input type="number" placeholder="Phone Number" required>
                 </div>
                  <div class="field">
                     <input type="text" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                    <input type="text" placeholder="User Name" required>
                 </div>
                  <div class="field">
                     <input type="password" placeholder="Password" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Confirm password" required>
                  </div>
                  
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Signup">
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