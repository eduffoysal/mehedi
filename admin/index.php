<?php
session_start();
include('../db/db.php');
require '../Router/Router.php';
$router = new Router();

$rootUrl = getRootUrl();

if(isset($_SESSION['user'])){
    $_SESSION['visitor_id']=$_SESSION['user'];
    $_SESSION['unique_id']=$_SESSION['user'];
    if($_SESSION['role']=='customer'){
        header("location:../user");
    }elseif($_SESSION['role']=='user'){
        header("location:../user");
    }
    if($_SESSION['b_id']==''){
        header("location:create");
    }else{
        $b_id = $_SESSION['b_id'];
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
    <title>Admin Dashboard</title>
    <!-- <link rel="stylesheet" href="../output/./output.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../page.css"> -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		
		
		<!--google fonts -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: flex-start;
            height: 100vh;
        }

        #left-container {
            width: 20%;
            padding: 20px;
        }

        #right-container {
            width: 80%;
            padding: 20px;
        }

        #customer-image {
            max-width: 100%;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        #buttons-container {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .profile-button {
            padding: 10px;
            margin: 5px;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        #profile-content {
            margin-top: 20px;
            text-align: center;
        }

        .input-field {
            margin: 10px;
            padding: 10px; /* Increased height */
            width: 80%;
        }

        #update-btn, #confirm-btn {
            margin-top: 10px;
            padding: 10px;
            background-color: #2ecc71;
            color: white;
            border: none;
            cursor: pointer;
            width: 40%; /* Decreased width */
        }

        #bio-division {
            margin-top: 20px;
        }
    .logout_btn{
        text-decoration: none;
       color:white;

}
        

    </style>
</head>
<body>


<?php
// require('top.inc.php');
?>


<div class="wrapper">
     
	  <div class="body-overlay"></div>
	 
	 <!-------sidebar--design------------>
	 
	 <div id="sidebar">
	    <div class="sidebar-header">
		   <h3><img src="img/logo.png" class="img-fluid"/><span>CMAByRaisa</span></h3>
		</div>
		<ul class="list-unstyled component m-0">
		  <li class="active">
		  <a href="<?php echo $router->url('/'); ?>" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
		  </li>
		  
		  <li class="dropdown">
		  <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">aspect_ratio</i>Category
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu1">
		  	<li><a href="<?php echo $router->url('/', ['route' => 'design']); ?>">Design Category</a></li>
			<li><a href="<?php echo $router->url('/', ['route' => 'product']); ?>">Product Category</a></li>
			<li><a href="<?php echo $router->url('/', ['route' => 'service']); ?>">Service Category</a></li>

		  </ul>
		  </li>
		  
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">apps</i>Design&Product
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu2">
		  <li><a href="<?php echo $router->url('/', ['route' => 'designs']); ?>">Design</a></li>
			<li><a href="<?php echo $router->url('/', ['route' => 'products']); ?>">Product</a></li>
			<li><a href="<?php echo $router->url('/', ['route' => 'services']); ?>">Service</a></li>
		  </ul>
		  </li>
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">equalizer</i>charts
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu3">
		     <li><a href="#">Pages 1</a></li>
			 <li><a href="#">Pages 2</a></li>
			 <li><a href="#">Pages 3</a></li>
		  </ul>
		  </li>
		  
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">extension</i>Coupons
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu4">
		     <li><a href="#">Pages 1</a></li>
			 <li><a href="#">Pages 2</a></li>
			 <li><a href="#">Pages 3</a></li>
		  </ul>
		  </li>
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">border_color</i>forms
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu5">
		     <li><a href="#">Pages 1</a></li>
			 <li><a href="#">Pages 2</a></li>
			 <li><a href="#">Pages 3</a></li>
		  </ul>
		  </li>
		  
		  <li class="dropdown">
		  <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">grid_on</i>tables
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu6">
		     <li><a href="#">table 1</a></li>
			 <li><a href="#">table 2</a></li>
			 <li><a href="#">table 3</a></li>
		  </ul>
		  </li>
		  
		  
		  <li class="dropdown">
		  <a href="#homeSubmenu7" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">content_copy</i>Pages
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu7">
		     <li><a href="#">Pages 1</a></li>
			 <li><a href="#">Pages 2</a></li>
			 <li><a href="#">Pages 3</a></li>
		  </ul>
		  </li>
		  
		   
		  <li class="">
		  <a href="#" class=""><i class="material-icons">date_range</i>copy </a>
		  </li>
		  <li class="">
		  <a href="#" class=""><i class="material-icons">library_books</i>calender </a>
		  </li>
		
		</ul>
	 </div>
	 
   <!-------sidebar--design- close----------->
   
   
   
      <!-------page-content start----------->
   
      <div id="content">
	     
		  <!------top-navbar-start-----------> 
		     
		  <div class="top-navbar">
		     <div class="xd-topbar">
			     <div class="row">
				     <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
					    <div class="xp-menubar">
						    <span class="material-icons text-white">signal_cellular_alt</span>
						</div>
					 </div>
					 
					 <div class="col-md-5 col-lg-3 order-3 order-md-2">
					     <div class="xp-searchbar">
						     <form>
							    <div class="input-group">
								  <input type="search" class="form-control"
								  placeholder="Search">
								  <div class="input-group-append">
								     <button class="btn" type="submit" id="button-addon2">Go
									 </button>
								  </div>
								</div>
							 </form>
						 </div>
					 </div>
					 
					 
					 <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
					     <div class="xp-profilebar text-right">
						    <nav class="navbar p-0">
							   <ul class="nav navbar-nav flex-row ml-auto">
							   <li class="dropdown nav-item active">
							     <a class="nav-link" href="#" data-toggle="dropdown">
								  <span class="material-icons">notifications</span>
								  <span class="notification">4</span>
								 </a>
								  <ul class="dropdown-menu">
								     <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
									 <li><a href="#">You Have 4 New Messages</a></li>
								  </ul>
							   </li>
							   
							   <li class="nav-item">
							     <a class="nav-link" href="#">
								   <span class="material-icons">question_answer</span>
								 </a>
							   </li>
							   
							   <li class="dropdown nav-item">
							     <a class="nav-link" href="#" data-toggle="dropdown">
								  <img src="img/user.jpg" style="width:40px; border-radius:50%;"/>
								  <span class="xp-user-live"></span>
								 </a>
								  <ul class="dropdown-menu small-menu">
								     <li><a href="#">
									 <span class="material-icons">person_outline</span>
									 Profile
									 </a></li>
									 <li><a href="#">
									 <span class="material-icons">settings</span>
									 Settings
									 </a></li>
									 <li><a href="../out">
									 <span class="material-icons">logout</span>
									 Logout
									 </a></li>
									 
								  </ul>
							   </li>
							   
							   
							   </ul>
							</nav>
						 </div>
					 </div>
					 
				 </div>
				 
				 <div class="xp-breadcrumbbar text-center">
				    <h4 class="page-title">Dashboard</h4>
					<ol class="breadcrumb">
					  <li class="breadcrumb-item"><a href="#">CMAByRaisa</a></li>
					  <li class="breadcrumb-item active" aria-curent="page">Dashboard</li>
					</ol>
				 </div>
				 
				 
			 </div>
		  </div>
		  <!------top-navbar-end-----------> 
		  
		  
<?php

$route = isset($_GET['route']) ? $_GET['route'] : 'home';

$routes = [
    'home' => 'homeAction',
    'design' => 'designAction',
    'product' => 'productAction',
	'designs' => 'designs',
    'products' => 'products',

];

$action = isset($routes[$route]) ? $routes[$route] : 'notFoundAction';

if ($action == 'homeAction') {
    echo 'Welcome to the Home Page!';
}else if ($action == 'designAction') {
    include('design_category.php');
}else if ($action == 'productAction') {
    include('product_category.php');
}else if ($action == 'designs') {
    include('designs.php');
}else if ($action == 'products') {
    include('products.php');
} else {
    echo '404 Not Found';
}

?>

	  
		 
		 
		 <!----footer-design------------->
		 
		 <footer class="footer">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2021 Creative Mehedi Art By Raisa . All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
		 
		 
		 
		 
	  </div>
   
</div>



<?php
// require('footer.inc.php');
?>



    <!-- <div id="left-container">
    <img id="customer-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdizAfib6M2QSUpFechCxvCGIOWpRriMKJkrKh3OUCrw&s" alt="Customer Image">
    <h2 id="customer-name">ABCDEFG</h2>
    <h5 id="profile-Bio">@bio</h5>

    <div id="buttons-container">
        <button class="profile-button" onclick="showContent('account')">Account</button>
        <button class="profile-button" onclick="showContent('password')">Password</button>
        <button class="profile-button">Security</button>
        <button class="profile-button">Application</button>
        <button class="profile-button">Notification</button>
        <button class="profile-button">
            <a href="../out" class="logout_btn">Log Out</a>
        </button>
    </div>
</div>

<div id="right-container">
    <div id="profile-content">

    </div>
</div> -->

<script>
    function showContent(type) {
        // Hide all content
        document.getElementById('profile-content').innerHTML = '';

        // Reset button styles
        document.querySelectorAll('.profile-button').forEach(button => {
            button.style.backgroundColor = '#3498db';
        });

        // Highlight the selected button
        document.querySelector(`.profile-button[onclick="showContent('${type}')"]`).style.backgroundColor = '#2980b9';

        // Display content based on the selected button
        if (type === 'account') {
            document.getElementById('profile-content').innerHTML = `
                <h3>Account Setting</h3>
                <input class="input-field" type="text" id="first-name-input" placeholder="First Name">
                <input class="input-field" type="text" placeholder="Last Name">
                <input class="input-field" type="email" placeholder="Email">
                <input class="input-field" type="tel" placeholder="Phone">
                <input class="input-field" type="text" placeholder="Company">
                <input class="input-field" type="text" placeholder="Designation">
                <textarea class="input-field" id="bio-input" placeholder="Bio (max 100 words)"></textarea>
                <button id="update-btn" onclick="updateAccount()">Update</button>
            `;
        } else if (type === 'password') {
            document.getElementById('profile-content').innerHTML = `
                <h3>Change Password</h3>
                <input class="input-field" type="password" placeholder="Recent Password">
                <input class="input-field" type="password" placeholder="New Password">
                <input class="input-field" type="password" placeholder="Confirm Password">
                <button id="confirm-btn" onclick="confirmPassword()">Confirm</button>
            `;
        }
    }

    function updateAccount() {
        // Implement logic to update account information
        const firstNameInput = document.getElementById('first-name-input');
        const newFirstName = firstNameInput.value;

        if (newFirstName !== "") {
            // Update customer name dynamically
            document.getElementById('customer-name').innerText = newFirstName;
            alert('Account information updated!');
        } else {
            alert('Please enter a valid first name.');
            //return;
        }

        // Update Bio division
        const bioInput = document.getElementById('bio-input');
        const newBio = bioInput.value;

        if (newBio !== "") {
            document.getElementById('profile-Bio').innerText = newBio;
            alert('Account information updated!');
        } else {
            alert('Please enter a valid Bio.');
        }
    }

    function confirmPassword() {
        // Implement logic to update password
        const newPassword = document.querySelector('.input-field[placeholder="New Password"]').value;
        const confirmPassword = document.querySelector('.input-field[placeholder="Confirm Password"]').value;

        if (newPassword === confirmPassword) {
            alert('Password changed successfully!');
        } else {
            alert('New Password and Confirm Password do not match.');
        }
    }
</script>

<script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
       $(document).ready(function(){
	      $(".xp-menubar").on('click',function(){
		    $("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		  });
		  
		  $('.xp-menubar,.body-overlay').on('click',function(){
		     $("#sidebar,.body-overlay").toggleClass('show-nav');
		  });
		  
	   });
  </script>
  

</body>
    


</html>