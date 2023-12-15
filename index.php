<?php
    include('db/db.php');
    // include('database/data.php');
    session_start();
    function my_autoloader($class) {
      require $class . '.php';
  }
    spl_autoload_register(function ($class) {
        include $class . '.php';
        // echo $class;
    }); 
    // print_r($_SERVER);

    $router = new Router();

    // $router->get('/edu_mehedi/:id',function($params){
    //     echo $params['id'];
    // });
    // $router->get('/edu_mehedi/id/:id/:me',function($params){
    //     echo $params['me'];
    // });

    // $router->get('/edu_mehedi/id/:id/:me',function($params){
    //     echo $params['me'];
    // });

    // $router->get('/edu_mehedi/profile/:phone',function($params){
    //     echo $params['phone'];
    // });

    // $router->listen();

$b_id = "7AABE1-1700896475-1188728145-806933517";

if (!isset($_SESSION["super_b_id"])) {
    $super_sql = "SELECT super_b_id as b_id FROM super_admin WHERE unique_id='1'";
    $super_query=mysqli_query($con, $super_sql);
    $super_query_num=mysqli_num_rows($super_query);
    if ($super_query_num ==1 || $super_query_num > 0) {
      $super = mysqli_fetch_assoc($super_query);

      $b_id = $super['b_id'];

      $_SESSION['super_b_id'] = $b_id;

    }
}else{
  $b_id = $_SESSION['super_b_id'];
}




    my_autoloader("product/product_fetch");
    my_autoloader("product/design_fetch");
    $product = new Product_fetch($con, $b_id);
    $design = new Design_fetch($con, $b_id);



    $jsonProduct = json_encode($product);
    $jsonDesign = json_encode($design);

    if (isset($_SESSION['product']) && $_SESSION['product']==true) {

    }else{

    }

    if (isset($_SESSION['design']) && $_SESSION['design']==true) {

    }else{

    }

    if (isset($_SESSION['product_cart']) && $_SESSION['product_cart']==true) {

    }

    if (isset($_SESSION['design_cart']) && $_SESSION['design_cart']==true) {

    }



    function product_pagination($pagi,$current_page,$cat){
        for($i=1;$i<=$pagi;$i++){
            $class='';
            if($current_page==$i){
              ?>
                <li class="page-item active"><a href="javascript:void(0)" class="page-link"><?php echo $i?></a></li>
              <?php
            }else{
            ?>
                <li class="page-item product_pagi_btn" id="<?=$i?>"><a href="?start_p=<?php echo $i ?>&cat=<?=$cat?>" class="page-link" id="<?=$i?>"><?php echo $i?></a></li>
            <?php }
        }
    }

    function design_pagination($pagi,$current_page,$cat){
      
        for($i=1;$i<=$pagi;$i++){
            $class='';
            if($current_page==$i){
              ?>
                <li class="page-item active"><a href="javascript:void(0)" class="page-link"><?php echo $i?></a></li>
              <?php
            }else{
            ?>
                <li class="page-item design_pagi_btn" id="<?=$i?>"><a href="?start_d=<?php echo $i ?>&cat=<?=$cat?>" id="<?=$i?>" class="page-link"><?php echo $i?></a></li>
            <?php }
        }

    }

// $start_d = 0;
// $start_p = 0;
$dp = 1;
$dn = 2;
$pp = 1;
$pn = 2;
$cat = 'all';
$cat_p = 'all';
if(isset($_GET['start_d'])){
    if(isset($_GET['cat'])){
      $cat = $_GET['cat'];
    }

    if($_GET['start_d']==0){
        $dp=1;
    }else{
        $dp = $_GET['start_d']-1;
    }

    // $dp = $_GET['start_d']-1;
    $dn = $_GET['start_d']+1;
    $start_d = $_GET['start_d'];
    $design->design_set_session($start_d,$cat);
}
if(isset($_GET['start_p'])){
  if(isset($_GET['cat_p'])){
    $cat_p = $_GET['cat_p'];
  }
  if($_GET['start_p']==0){
    $pp=1;
}else{
    $pp = $_GET['start_p']-1;
}
  // $pp = $_GET['start_p']-1;
  $pn = $_GET['start_p']+1;
  $start_p = $_GET['start_p'];
  $product->product_set_session($start_p,$cat_p);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Mehedi Art By <?php echo "Raisa"?></title>
     <!-- Link Swiper's CSS -->

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="./output/output.css">

    <link rel="stylesheet" href="page.css">
    <link rel="stylesheet" href="css/product_card.css">
    <link rel="stylesheet" href="css/slider_style.css">
    <link rel="stylesheet" href="css/service_c.css">

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

    <script src="jquery-3.5.1.min.js"></script>

    <link rel="shortcut icon" href="image/<?=$iiim?>" type="image/x-icon" />

<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>


<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="icon/bootstrap-icons.css">


<link rel="stylesheet" href="css/tailwindcss-colors.css">



<link rel="stylesheet" href="bootstrap.min.css">
    <!-- <script src="bootstrap.budle.min.js"></script> -->
    <link href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

<!-- <link rel="stylesheet" href="dist/styles.css"> -->

<link rel="stylesheet" href="css/carousel_and_other.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>


    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">




</head>
<body>

    <?php
    

    ?>

<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-1">

    <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://images.unsplash.com/profile-1695058559381-08958c381f32image?dpr=2&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff" class="h-8" alt="CMABR Logo">

        <a style="font-size: 20px; font-weight: 600;" href="#" class="md:hidden text-amber-800 logo text-decoration-none">CMAByRaisa</a>
        <a style="font-size: 20px; font-weight: 600;" href="#" class="hidden md:block logo text-amber-800 text-decoration-none">Creative Mehedi Art By Raisa</a>

    </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

        <button type="button" data-collapse-toggle="navbar-user" aria-controls="navbar-user" aria-expanded="false" data-bs-toggle="offcanvas" data-bs-target="#searchTop" aria-controls="searchTop" class="search__openn md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2 me-0">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
        </button>

        <div style="margin-right: 6px;" class="relative hidden md:block">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
              <span class="sr-only">Search icon</span>
            </div>
            <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="      Search...">
          </div>

        <div class="htc__shopping__cart mr-2 md:mr-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                        <a class="cart__menu" href="#"><i class="bi bi-cart icons"></i></a>
                                        <a href="#"><span class="htc__qua">2</span></a>
        </div>

        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/profile-1695058559381-08958c381f32image?dpr=2&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff" alt="user photo">
        </button>




        <div class="items-center justify-between z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
          
            <div class="profile">
                <img src="https://images.unsplash.com/profile-1695058559381-08958c381f32image?dpr=2&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff" alt="">
                <span>@Tasnim Islam Raisa</span>
                <i class='bx bx-caret-down'></i>
            </div>
          
            <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
          </div>


          <ul class="py-2" aria-labelledby="user-menu-button">

            <li>
              <a href="#home" class="home-active block px-4 py-2 text-sm text-decoration-none text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Home</a>
            </li>
            <li>
              <a href="#about" class="block px-4 py-2 text-sm text-gray-700 text-decoration-none hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">About</a>
            </li>
            <li>
              <a href="#packages" class="block px-4 py-2 text-sm text-gray-700 text-decoration-none hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Packages</a>
            </li>
            <li>
              <a href="#details" class="block px-4 py-2 text-sm text-gray-700 text-decoration-none hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Details</a>
            </li>
            <li>
                <a href="#review" class="block px-4 py-2 text-sm text-gray-700 text-decoration-none hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Review</a>
              </li>
              <li>
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="block text-decoration-none px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign In</a>
              </li>
              <li>
                <a href="admin/" data-toggle="modall" data-target="#exampleModalCenterr" class="block text-decoration-none px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Admin</a>
              </li>
          </ul>
        </div>
        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-1 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <div class="relative mt-3 md:hidden">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
            </div>
            <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="       Search...">
          </div>

      <ul class=" flex flex-col font-medium py-0.5 px-1 md:p-0 mt-1 md:align-items-left align-items-center md:text-left  m-auto border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
       

        <li style="" class="">
          <a href="#home" style="" class="home-active text-decoration-none text-center btn  md:active:bg-transparent block py-2 px-2 m-auto text-black dark:text-white bg-green-300 rounded md:hover:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#about" class="block py-2 px-2 text-decoration-none text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
        <li>
            <a href="#packages" class="block py-2 text-decoration-none px-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
            


            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 px-3 text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Packages<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg></button>
                            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#" class="block text-decoration-none px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li aria-labelledby="dropdownNavbarLink">
                                    <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dropdown<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
                    <div id="doubleDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="doubleDropdownButton">
                          <li>
                            <a href="#" class="block px-4 py-2 text-decoration-none hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Overview</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 text-decoration-none hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">My downloads</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 text-decoration-none hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Billing</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 text-decoration-none hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Rewards</a>
                          </li>
                        </ul>
                    </div>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-decoration-none hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                  </li>
                </ul>
                <div class="py-1">
                  <a href="#" class="block px-4 py-2 text-decoration-none text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">Sign out</a>
                </div>
            </div>


            </a>
        </li>
        <li>
          <a href="#details" class="block py-2 px-2 text-decoration-none text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Details</a>
        </li>
        <li>
          <a href="#review" class="block py-2 px-2 text-decoration-none text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Review</a>
        </li>
      </ul>
    </div>
    </div>
</nav>
  

    <!-- <header>
        <a href="#" class="logo">Creative Mehedi Art By Raisa</a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar navbar-nav ms-auto">
            <li class="nav-item"><a href="#home" class="home-active">Home</a></li>
            <li class="nav-item"><a href="#about">About</a></li>
            <li class="nav-item"><a href="#packages">Packages</a></li>
            <li class="nav-item"><a href="#details">Details</a></li>
            <li class="nav-item"><a href="#review">Review</a></li>


        </ul>
        <div class="profile">
            <img src="https://images.unsplash.com/profile-1695058559381-08958c381f32image?dpr=2&auto=format&fit=crop&w=150&h=150&q=60&crop=faces&bg=fff" alt="">
            <span>@Tasnim Islam Raisa</span>
            <i class='bx bx-caret-down'></i>
        </div>

    </header> -->






<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Cart</h5>
    
  <div class="border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">

        <li class="me-2 order_cart_btn">
            <a href="#" class="inline-flex active items-center justify-center p-1 text-blue-600 border-b-2  rounded-t-lg active:border-blue-600 dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
            01 <i class="bi bi-cart"></i>Order
            </a>
        </li>
        <li class="me-2 booking_cart_btn">
            <a href="#" class="inline-flex items-center justify-center p-1 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 active:border-blue-600 hover:border-gray-300 dark:hover:text-gray-300 group">
            01 <i class="bi bi-cart"></i>Booking 
            </a>
        </li>
    </ul>
</div>

<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>

  </div>
  <div class="offcanvas-body">


        <div class="order_cart" id="order_cart">
                  <span>Product Added Cart</span>



                  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                    Qty
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="/docs/images/products/apple-watch.png" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    Apple Watch
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <button class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                            </svg>
                        </button>
                        <div>
                            <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                        </div>
                        <button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                        </button>
                    </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    $599
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="/docs/images/products/imac.png" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple iMac">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    iMac 27"
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <button class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                            </svg>
                        </button>
                        <div class="ms-3">
                            <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                        </div>
                        <button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                        </button>
                    </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    $2499
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="/docs/images/products/iphone-12.png" class="w-16 md:w-32 max-w-full max-h-full" alt="iPhone 12">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    IPhone 12 
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <button class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                            </svg>
                        </button>
                        <div class="ms-3">
                            <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                        </div>
                        <button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                        </button>
                    </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    $999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


        </div>
        <div class="booking_cart hidden" id="booking_cart">
                  <span>Design Added Cart</span>



                  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Product
                </th>
                <th scope="col" class="px-6 py-3">
                    Qty
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="/docs/images/products/apple-watch.png" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    Apple Watch
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <button class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                            </svg>
                        </button>
                        <div>
                            <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                        </div>
                        <button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                        </button>
                    </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    $599
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="/docs/images/products/imac.png" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple iMac">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    iMac 27"
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <button class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                            </svg>
                        </button>
                        <div class="ms-3">
                            <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                        </div>
                        <button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                        </button>
                    </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    $2499
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4">
                    <img src="/docs/images/products/iphone-12.png" class="w-16 md:w-32 max-w-full max-h-full" alt="iPhone 12">
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    IPhone 12 
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        <button class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                            </svg>
                        </button>
                        <div class="ms-3">
                            <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
                        </div>
                        <button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                            <span class="sr-only">Quantity button</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                        </button>
                    </div>
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    $999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


        </div>


  </div>
</div>





<div class="offcanvas offcanvas-top" tabindex="-1" id="searchTop" aria-labelledby="searchTop">
  <div class="offcanvas-header">
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">



  <div class="border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        <li class="me-2">
            <a href="#" class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group">
                <svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                </svg>Profile
            </a>
        </li>
        <li class="me-2">
            <a href="#" class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page">
                <svg class="w-4 h-4 me-2 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                    <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                </svg>Dashboard
            </a>
        </li>
       
    </ul>
</div>


  </div>
</div>

    



<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body text-center align-items-center m-auto" >

      <div class="wrapperLogin">

         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
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
                        <select id="userType" name="userType" required>
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
                  <div class="field btn text-center m-auto">
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

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





 <!-- home -->
    <section class="home" id="home" >

<!-- <section>
  <div class="swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide swiper-slide--one">
        <span>domestic</span>
        <div>
          <h2>Enjoy the exotic of sunny Hawaii</h2>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
            </svg>
            Maui, Hawaii
          </p>
        </div>
      </div>
      <div class="swiper-slide swiper-slide--two">
        <span>subtropical</span>
        <div>
          <h2>The Island of Eternal Spring</h2>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
            </svg>
            Lanzarote, Spanien
          </p>
        </div>
      </div>

      <div class="swiper-slide swiper-slide--three">
        <span>history</span>
        <div>
          <h2>Awesome Eiffel Tower</h2>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
            </svg>
            Paris, France
          </p>
        </div>
      </div>

      <div class="swiper-slide swiper-slide--four">
        <span>Mayans</span>
        <div>
          <h2>One of the safest states in Mexico</h2>
          <p>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
            </svg>
            The Yucatan, Mexico
          </p>
        </div>
      </div>

      <div class="swiper-slide swiper-slide--five">
        <span>native</span>
        <div>
          <h2>The most popular yachting destination</h2>
          <p>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
            </svg>
            Whitsunday Islands, Australia
          </p>
        </div>
      </div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
</section> -->

  <div class="swiper">
    <div class="swiper-wrapper">

      <div class="swiper-slide swiper-slide--one">

      <div class="px-3 py-5 bg-neutral-100 lg:py-10">
    <div class="grid lg:grid-cols-2 items-center justify-items-center gap-5">
        <div class="order-2 lg:order-1 flex flex-col justify-center items-center">
        <p class="text-4xl font-bold md:text-7xl text-orange-600">25% OFF</p>
        <p class="text-4xl font-bold md:text-7xl">SUMMER SALE</p>
        <p class="mt-2 text-sm md:text-lg">For limited time only!</p>
        <button class="text-lg md:text-2xl bg-black text-white py-2 px-5 mt-10 hover:bg-zinc-800">Shop Now</button>
        </div>
        <div class="order-1 lg:order-2">
        <img class="h-80 w-80 object-cover lg:w-[500px] lg:h-[500px]" src="https://images.unsplash.com/photo-1615397349754-cfa2066a298e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt="">
        </div>
    </div>
      </div>

      </div>

      <div class="swiper-slide swiper-slide--two">
      <div class="px-3 py-5 bg-neutral-100 lg:py-10">
    <div class="grid lg:grid-cols-2 items-center justify-items-center gap-5">
        <div class="order-2 lg:order-1 flex flex-col justify-center items-center">
        <p class="text-4xl font-bold md:text-7xl text-orange-600">25% OFF</p>
        <p class="text-4xl font-bold md:text-7xl">SUMMER SALE</p>
        <p class="mt-2 text-sm md:text-lg">For limited time only!</p>
        <button class="text-lg md:text-2xl bg-black text-white py-2 px-5 mt-10 hover:bg-zinc-800">Shop Now</button>
        </div>
        <div class="order-1 lg:order-2">
        <img class="h-80 w-80 object-cover lg:w-[500px] lg:h-[500px]" src="https://images.unsplash.com/photo-1615397349754-cfa2066a298e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt="">
        </div>
    </div>
      </div>
      </div>

      <div class="swiper-slide swiper-slide--three">

      <div class="px-3 py-5 bg-neutral-100 lg:py-10">
    <div class="grid lg:grid-cols-2 items-center justify-items-center gap-5">
        <div class="order-2 lg:order-1 flex flex-col justify-center items-center">
        <p class="text-4xl font-bold md:text-7xl text-orange-600">25% OFF</p>
        <p class="text-4xl font-bold md:text-7xl">SUMMER SALE</p>
        <p class="mt-2 text-sm md:text-lg">For limited time only!</p>
        <button class="text-lg md:text-2xl bg-black text-white py-2 px-5 mt-10 hover:bg-zinc-800">Shop Now</button>
        </div>
        <div class="order-1 lg:order-2">
        <img class="h-80 w-80 object-cover lg:w-[500px] lg:h-[500px]" src="https://images.unsplash.com/photo-1615397349754-cfa2066a298e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt="">
        </div>
    </div>
      </div>

      </div>

      <div class="swiper-slide swiper-slide--four">

      <div class="px-3 py-5 bg-neutral-100 lg:py-10">
    <div class="grid lg:grid-cols-2 items-center justify-items-center gap-5">
        <div class="order-2 lg:order-1 flex flex-col justify-center items-center">
        <p class="text-4xl font-bold md:text-7xl text-orange-600">25% OFF</p>
        <p class="text-4xl font-bold md:text-7xl">SUMMER SALE</p>
        <p class="mt-2 text-sm md:text-lg">For limited time only!</p>
        <button class="text-lg md:text-2xl bg-black text-white py-2 px-5 mt-10 hover:bg-zinc-800">Shop Now</button>
        </div>
        <div class="order-1 lg:order-2">
        <img class="h-80 w-80 object-cover lg:w-[500px] lg:h-[500px]" src="https://images.unsplash.com/photo-1615397349754-cfa2066a298e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt="">
        </div>
    </div>
      </div>

      </div>

      <div class="swiper-slide swiper-slide--five">
       
      <div class="px-3 py-5 bg-neutral-100 lg:py-10">
    <div class="grid lg:grid-cols-2 items-center justify-items-center gap-5">
        <div class="order-2 lg:order-1 flex flex-col justify-center items-center">
        <p class="text-4xl font-bold md:text-7xl text-orange-600">25% OFF</p>
        <p class="text-4xl font-bold md:text-7xl">SUMMER SALE</p>
        <p class="mt-2 text-sm md:text-lg">For limited time only!</p>
        <button class="text-lg md:text-2xl bg-black text-white py-2 px-5 mt-10 hover:bg-zinc-800">Shop Now</button>
        </div>
        <div class="order-1 lg:order-2">
        <img class="h-80 w-80 object-cover lg:w-[500px] lg:h-[500px]" src="https://images.unsplash.com/photo-1615397349754-cfa2066a298e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt="">
        </div>
    </div>
      </div>

      </div>


      <div class="swiper-slide swiper-slide--five">
       
      <div class="px-3 py-5 bg-neutral-100 lg:py-10">
    <div class="grid lg:grid-cols-2 items-center justify-items-center gap-5">
        <div class="order-2 lg:order-1 flex flex-col justify-center items-center">
        <p class="text-4xl font-bold md:text-7xl text-orange-600">25% OFF</p>
        <p class="text-4xl font-bold md:text-7xl">SUMMER SALE</p>
        <p class="mt-2 text-sm md:text-lg">For limited time only!</p>
        <button class="text-lg md:text-2xl bg-black text-white py-2 px-5 mt-10 hover:bg-zinc-800">Shop Now</button>
        </div>
        <div class="order-1 lg:order-2">
        <img class="h-80 w-80 object-cover lg:w-[500px] lg:h-[500px]" src="https://images.unsplash.com/photo-1615397349754-cfa2066a298e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1887&q=80" alt="">
        </div>
    </div>
      </div>      

      </div>

    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
  
    </section>

    <!-- packages -->
    <section class="packages" id="packages">
        <div class="heading">
            <h1>Browse Our Hottest <br><span>Packages</span></h1>
            <a href="#" class="btn">See All<i class='bx bx-right-arrow-alt'></i></a>
            
        </div>

        <div class="packages-container">

            <!-- <div class="box box1">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/387157835_336316975579631_2239034539631206761_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=5f2048&_nc_ohc=FfYOnBAj2LcAX-M6ezE&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfCP-J9t8-LCcX4Lv69dj7zoUv-PIiq_VWlaB69VWfWhHw&oe=6546C017" alt="">
                <h2>Non Bridal Henna Design</h2>
                <span>Multiple types</span>
                <i class='bx bx-right-arrow-alt'></i>

            </div>

            <div class="box box2">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/322723982_670009237950697_2905543374317797598_n.jpg?stp=c0.105.641.641a_dst-jpg_s851x315&_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_ohc=A3nUjLlgmMkAX9NFAqS&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfBk3gFDmdPU1RKwuJskqfAHpvjNnUcWQxNX8MQ0R4Xqlg&oe=65450F7E" alt="">
                <h2>Semi Bridal Henna Design</h2>
                <span>2 types</span>
                <i class='bx bx-right-arrow-alt'></i>

            </div>

            <div class="box box3">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/265655639_102284962312669_608108835019162989_n.jpg?stp=c0.157.1573.1573a_dst-jpg_s851x315&_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_ohc=CsQo1TS3F9YAX_wse7j&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfAb2Eb_yOPt33AMHv3239Mnn4CCoUjjH2vbFUzTvDO9OQ&oe=6546D993" alt="">
                <h2>Bridal Henna Design</h2>
                <span>4 types</span>
                <i class='bx bx-right-arrow-alt'></i>
            </div> -->





              <div class="wrapper_c">
                  <button class="arrow prev"><i class="ri-arrow-left-s-line"></i></button>
                  <button class="arrow next"><i class="ri-arrow-right-s-line"></i></button>
                  <div class="card-wrapper" id="design_categories">

                      <!-- <div class="card-item">
                          <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                          <div class="card-info">
                              <a href="#" class="card-title">Cooked dish on gray bowl</a>
                              <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, beatae?</p>
                          </div>
                      </div>
                      <div class="card-item">
                          <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                          <div class="card-info">
                              <a href="#" class="card-title">Cooked dish on gray bowl</a>
                              <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, beatae?</p>
                          </div>
                      </div>
                      <div class="card-item">
                          <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                          <div class="card-info">
                              <a href="#" class="card-title">Cooked dish on gray bowl</a>
                              <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, beatae?</p>
                          </div>
                      </div>
                      <div class="card-item">
                          <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                          <div class="card-info">
                              <a href="#" class="card-title">Cooked dish on gray bowl</a>
                              <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, beatae?</p>
                          </div>
                      </div>
                      <div class="card-item">
                          <img src="https://images.unsplash.com/photo-1606787366850-de6330128bfc?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                          <div class="card-info">
                              <a href="#" class="card-title">Cooked dish on gray bowl</a>
                              <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, beatae?</p>
                          </div>
                      </div>
                      <div class="card-item">
                          <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="">
                          <div class="card-info">
                              <a href="#" class="card-title">Cooked dish on gray bowl</a>
                              <p class="card-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, beatae?</p>
                          </div>
                      </div> -->



                      <div class="box box1">
                          <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/387157835_336316975579631_2239034539631206761_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=5f2048&_nc_ohc=FfYOnBAj2LcAX-M6ezE&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfCP-J9t8-LCcX4Lv69dj7zoUv-PIiq_VWlaB69VWfWhHw&oe=6546C017" alt="">
                          <h2>Non Bridal Henna Design</h2>
                          <span>Multiple types</span>
                          <i class='bx bx-right-arrow-alt'></i>

                      </div>

                      <div class="box box2">
                          <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/322723982_670009237950697_2905543374317797598_n.jpg?stp=c0.105.641.641a_dst-jpg_s851x315&_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_ohc=A3nUjLlgmMkAX9NFAqS&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfBk3gFDmdPU1RKwuJskqfAHpvjNnUcWQxNX8MQ0R4Xqlg&oe=65450F7E" alt="">
                          <h2>Semi Bridal Henna Design</h2>
                          <span>2 types</span>
                          <i class='bx bx-right-arrow-alt'></i>

                      </div>

                      <div class="box box3">
                          <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/265655639_102284962312669_608108835019162989_n.jpg?stp=c0.157.1573.1573a_dst-jpg_s851x315&_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_ohc=CsQo1TS3F9YAX_wse7j&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfAb2Eb_yOPt33AMHv3239Mnn4CCoUjjH2vbFUzTvDO9OQ&oe=6546D993" alt="">
                          <h2>Bridal Henna Design</h2>
                          <span>4 types</span>
                          <i class='bx bx-right-arrow-alt'></i>
                      </div>




                  </div>
              </div>







        </div>

        <div class="pagination_container p-1">
        
        <nav aria-label="Page nvigation">
          <ul class="pagination">
              <!-- <li class=""><a href="" class="page-link  prev" ><span aria-hidden="true">&laquo;</span></a></li> -->
              
              <?php
              $pagi = 6;
              $current_page = 4;
               for($i=1;$i<=$pagi;$i++){
                  $class='';
                  if($current_page==$i){
                      ?>
                  <!-- <li class="page-item active"><a href="javascript:void(0)" class="page-link"><?php echo $i?></a></li> -->
              <?php
              }else{
              ?>
              <!-- <li class="page-item"><a href="?start=<?php echo $i ?>" class="page-link"><?php echo $i?></a></li> -->
              <?php } ?>
              <?php }?>
              <!-- <li class=""><a href="" class="page-link  next" ><span aria-hidden="true">&raquo;</span></a></li> -->
          </ul>
        </nav>                      

      </div>


      <div class="category-sectiond">
              <div class="">
                  <div class="category-wrapperd">
                      <button type="button" class="category-arrowd prev prevvd hidden"><i class="ri-arrow-left-s-line"></i></button>
                      <button type="button" class="category-arrowd next nexttd"><i class="ri-arrow-right-s-line"></i></button>
                      <div class="category-linkd" id="design_categories_2">


                          <!-- <a href="#">Electronics</a>
                          <a href="#">Home & Garden</a>
                          <a href="#">Health & Beauty</a>
                          <a href="#">Sports & Outdoors</a>
                          <a href="#">Toys & Games</a>
                          <a href="#">Pet Supplies</a>
                          <a href="#">Office & School Supplies</a>
                          <a href="#">Automotive</a>
                          <a href="#">Clothing</a>
                          <a href="#">Electronics</a>
                          <a href="#">Home & Garden</a>
                          <a href="#">Health & Beauty</a>
                          <a href="#">Sports & Outdoors</a>
                          <a href="#">Toys & Games</a>
                          <a href="#">Pet Supplies</a>
                          <a href="#">Office & School Supplies</a>
                          <a href="#">Automotive</a> -->
                      </div>
                  </div>
              </div>
      </div>


    </section>
    <!-- Details -->
    <section class="details" id="details">
        <div class="heading">
            <h1>Our Packages Details </h1>
            <a href="#" class="btn">Book Now<i class='bx bx-right-arrow-alt'></i></a>
        </div> 
        <!-- price -->
        <div class="details-container" id="design_product">



                <?php
                  
                  $data = $design->design_fetch($design->start,$cat);
                  
                  // echo $design->current_page;
                  if($data!=null){
                    while($row = mysqli_fetch_assoc($data)){
                      $code = $design->design($row['id'],$row['unique_id'],$row['pro_name'],$row['pro_details'],$row['pro_type'],$row['b_id'],$row['service_id'],$row['status'],$row['price'],$row['type_id'],$row['available'],$row['dis_per'],$row['added_date'],$row['book_order'],$row['pro_image']);
  
                      echo $code;
                    }
                  }



                ?>


            <!-- <div class="box">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/387176596_336316922246303_7785728387409454287_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeEpsZ4T-fz_5fSpcf0stsK-OqkHrNpkKGs6qQes2mQoa96QfK5NOPcCPCbu2NdpnTPvNNEU2oJh-iG-5pZV7fHI&_nc_ohc=yBC20U5PpFkAX8K_U4p&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfCVWsOHn1CqZEZltc-F6GWGWPGyQwYKq_o1YxgJ0tZgpQ&oe=65472594" alt="">
                <h2>Non-Bridal Henna Design</h2>
                <span>Per Side</span>
                <h3 class="price">150TK</h3>
                <i class='bx bxs-message-square-check'></i>
                <i class='bx bx-heart'></i>
            </div>


            <div class="box">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/305975223_175236538354343_7755819856223607081_n.jpg?stp=c0.67.960.960a_dst-jpg_s851x315&_nc_cat=106&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeHJPix2bnSk5UMoqEmt5qyYCXVIhgnsl_AJdUiGCeyX8BTww7gk2oJpnGHbkdVDT0_rL5EtjC55uNKNAIgMIUoe&_nc_ohc=m7Gfv8D_czQAX-QwPqo&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfCJO5-VQJG8FAgD16JtXg92sKf8Ym8tfRcA--IJv1o-Aw&oe=65464F0A" alt="">
                <h2>Non-Bridal Henna Design</h2>
                <span>Per Side</span>
                <h3 class="price">200TK</h3>
                <i class='bx bxs-message-square-check'></i>
                <i class='bx bx-heart'></i>
            </div>


            <div class="box">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/268345688_110911681449997_1989552157626476601_n.jpg?stp=c0.168.1538.1538a_dst-jpg_s851x315&_nc_cat=111&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGEUVtgMWkMBwkckipst-yunKJFykUlejOcokXKRSV6M32-fQIWRjVq4YQE4tKkYoQCv5So1-mhA3KVsX9Yx9Hb&_nc_ohc=Zvd_Gf-jHH0AX9Cx2NM&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfANZVJth7yTAsNPreCsq8CH-mn-2xvZrsbgHTfv1yG82Q&oe=65454705" alt="">
                <h2>Non-Bridal Henna Design</h2>
                <span>Per Side</span>
                <h3 class="price">250TK</h3>
                <i class='bx bxs-message-square-check'></i>
                <i class='bx bx-heart'></i>
            </div>


            <div class="box">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/345182806_765398791853760_8933830384336602884_n.jpg?stp=c0.174.1520.1520a_dst-jpg_s851x315&_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGdNSjVWPavxvVe0QHE3C8FF5_fAeDW9pAXn98B4Nb2kCT55nOT4dY_nOj1Ufnn0UmQb0yably_jOFeBTUVHKuK&_nc_ohc=qO8blEq66UUAX_hwIy9&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfAGB-cmom0LLvcKmJ0KeGCyQhKsXNj42VqKfev6hdvmMg&oe=65458477" alt="">
                
                <h2>Semi-Bridal Henna Design</h2>
                <span>Per Side</span>
                <h3 class="price">450TK</h3>
                <i class='bx bxs-message-square-check'></i>
                <i class='bx bx-heart'></i>
            </div>


            <div class="box">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/278387149_144815434726288_6195508071813877757_n.jpg?stp=c144.0.1760.1760a_dst-jpg_s851x315&_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeFoTgVrYdYgpjo-87XC6IjSqE4AMcKw6xOoTgAxwrDrE8AswDfmvfZhyrVLmtjebJi7a5PnzfcWeVt60rwcarJX&_nc_ohc=z44wg9ChbW8AX_PMY0o&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfDUuH4RXN5AAE9jxBWIR_kPGdfFvwBpi7m6Vo-DmyVldg&oe=6545696F" alt="">
                <h2>Semi-Bridal Henna Design</h2>
                <span>Both-Hand Both-Side</span>
                <h3 class="price">Simple Design <br>1600TK</h3>
                <i class='bx bxs-message-square-check'></i>
                <i class='bx bx-heart'></i>
            </div>


            <div class="box">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/342562647_641247864496619_7856330520666561455_n.jpg?stp=c0.173.1525.1525a_dst-jpg_s851x315&_nc_cat=104&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeED0KXtc9QSHyM1smpFds0ryVXky6qblfjJVeTLqpuV-EKnRNhXoxCeDhKb2cb7es8n_-RFySO3Oxlxcr-k55FH&_nc_ohc=f-rUbU8ODQ4AX_qweS6&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfD8gmRkSWEBQcIFr5MT9L1014U8LH5mSJ5a20vldeeK0w&oe=6546D13A" alt="">
                <h2>Semi-Bridal Henna Design</h2>
                <span>Both-Hand Both-Side</span>
                <h3 class="price">Gorgeous Design <br>2000TK</h3>
                <i class='bx bxs-message-square-check'></i>
                <i class='bx bx-heart'></i>
            </div>


            <div class="box">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/272856286_123757886832043_2236630308028798467_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeEpmO_g4AC8RJPcrH3S25PYLkFrbdavnRIuQWtt1q-dEk94lUs4ca_QLIGJXctLmkvJVeubyuVn5Tazmg3EQNyo&_nc_ohc=KX1QfUcgkJoAX9VI_Zx&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfCYLdOM5RrRx6grnGo7ff46Jm0VpWapc6SWH_sECT_sXA&oe=6546D630" alt="">
                <h2>Bridal Henna Design</h2>
                <span>Both-Hand Both-Side</span>
                <h3 class="price">Till elbow with-gap<br>2500TK</h3>
                <i class='bx bxs-message-square-check'></i>
                <i class='bx bx-heart'></i>
            </div>


            <div class="box">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/346649205_206099511741590_5012580755534572707_n.jpg?stp=c0.79.720.720a_dst-jpg_s851x315&_nc_cat=110&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeG4s0ijT4aJ2TdL7ui8moaw0Tkmnv4PVIvROSae_g9UiwecMAs2gWjYPeiS98Y87UPxNDYSZTBpwWMsF-Y1d4o1&_nc_ohc=tTY6W2n-1xsAX9SbZoR&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfATAaks4DoMSztS-L_GrCf5NuMgCkKBG3ecParR7ORMnw&oe=65469A38" alt="">
                <h2>Bridal Henna Design</h2>
                <span>Both-Hand Both-Side</span>
                <h3 class="price">Till elbow without-gap<br>3500TK</h3>
                <i class='bx bxs-message-square-check'></i>
                <i class='bx bx-heart'></i>
            </div>


            <div class="box">
                <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/264426883_102284992312666_8068556412498976810_n.jpg?stp=c0.111.1712.1712a_dst-jpg_s851x315&_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGsl1M1RG3aVRT6jMjnCHfNALl2FgqhwfkAuXYWCqHB-SxkhMssGNnisrvqBBdGVU2YEke32WG6hwAifdYGYtEe&_nc_ohc=EFqkbANTHTsAX98Nr7G&_nc_oc=AQnO1AuCzDKZGxeXZd42jtLjJscomP6DzJPpt5XUAxRyGXkeakBOO0Uu_pNrircBZ1E&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfAUWOTo_rEE35ubvuUtuaTnIVV58ga2WfOod5r01wm_pQ&oe=6546532D" alt="">
                <h2>Bridal Henna Design</h2>
                <span>Both-Hand Both-Side</span>
                <h3 class="price">Upto elbow Gorgeous<br>5000TK</h3>
                <i class='bx bxs-message-square-check'></i>
                <i class='bx bx-heart'></i>
            </div>            -->

        </div>

        <div class="pagination_container p-1">
        
        <nav aria-label="Page nvigation">
          <ul class="pagination" id="design_pagination">
              <li class=""><a href="?start_d=<?=$dp?>&cat=<?=$cat?>" class="page-link  design_pagi_prev" ><span aria-hidden="true">&laquo;</span></a></li>
              
              <?php
                  if(isset($_GET['start_d'])){
                    design_pagination($design->pagi,$design->current_page,$cat);
                  }else{
                    design_pagination($design->pagi,$design->current_page,$cat);
                  }
                
              ?>

              <li class=""><a href="?start_d=<?=$dn?>&cat=<?=$cat?>" class="page-link  design_pagi_next" ><span aria-hidden="true">&raquo;</span></a></li>
          </ul>
        </nav>                      

      </div>

    </section>

    <section style="margin: 0 auto" class="product_category" id="product_category">
        <div class="heading">
            <h1>Products Categories </h1>
            <a href="#" class="btn">Choose<i class='bx bx-right-arrow-alt'></i></a>
        </div> 
    <div style="margin: 0 auto" class="wrapper">
      <div class="icon"><i id="left" class="fa-solid fa-angle-left"></i></div>
      <ul class="tabs-box" id="product_categories">
        <li class="tab active">All</li>


        <!-- <li class="tab">Podcasts</li>
        <li class="tab">Databases</li>
        <li class="tab">Web Development</li>
        <li class="tab">Unboxing</li>
        <li class="tab">History</li>
        <li class="tab">Programming</li>
        <li class="tab">Gadgets</li>
        <li class="tab">Algorithms</li>
        <li class="tab">Comedy</li>
        <li class="tab">Gaming</li>
        <li class="tab">Share Market</li>
        <li class="tab">Smartphones</li>
        <li class="tab">Data Structure</li> -->

      </ul>
      <div class="icon"><i id="right" class="fa-solid fa-angle-right"></i></div>
    </div>

<div class="category-section">
        <div class="">
            <div class="category-wrapper">
                <button type="button" class="category-arrow prev prevv hidden"><i class="ri-arrow-left-s-line"></i></button>
                <button type="button" class="category-arrow next nextt"><i class="ri-arrow-right-s-line"></i></button>
                <div class="category-link" id="product_categories_2">


                    <!-- <a href="#">Electronics</a>
                    <a href="#">Home & Garden</a>
                    <a href="#">Health & Beauty</a>
                    <a href="#">Sports & Outdoors</a>
                    <a href="#">Toys & Games</a>
                    <a href="#">Pet Supplies</a>
                    <a href="#">Office & School Supplies</a>
                    <a href="#">Automotive</a>
                    <a href="#">Clothing</a>
                    <a href="#">Electronics</a>
                    <a href="#">Home & Garden</a>
                    <a href="#">Health & Beauty</a>
                    <a href="#">Sports & Outdoors</a>
                    <a href="#">Toys & Games</a>
                    <a href="#">Pet Supplies</a>
                    <a href="#">Office & School Supplies</a>
                    <a href="#">Automotive</a> -->
                </div>
            </div>
        </div>
</div>

    <div style="margin: 0 auto" class="wrapper">
         <nav style="margin: 0 auto">
         
         

         </nav>
        <div id="products" class="products px-0 m-auto">
        <div class="heading m-auto">
            <h1>Products Details </h1>
            <a href="#" class="btn">Add Cart<i class='bx bx-right-arrow-alt'></i></a>
        </div> 



        <div class="container-fluid">



        <div class="row" id="product_product">


                <?php

                    $data = $product->product_fetch($product->start,$cat_p);

                    if($data!=null){
                      while($row = mysqli_fetch_assoc($data)){
                        $code = $product->product($row['id'],$row['unique_id'],$row['pro_name'],$row['pro_details'],$row['pro_type'],$row['b_id'],$row['service_id'],$row['status'],$row['price'],$row['type_id'],$row['available'],$row['dis_per'],$row['added_date'],$row['book_order'],$row['pro_image']);

                        echo $code;
                      }
                    }

                ?>


                <!-- <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="Non Bridal Design">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">HP</p>
                            <h5 class="product-name">
                               <a href="#">
                                    HP Laptop 
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$500</span>
                                <span class="original-price">$799</span>
                            </div>
                            <div class="mt-2 text-center">
                                <a href="#" class="btn btn1">Add To Cart</a>
                                <a href="#" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="#" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="Non Bridal Design">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">HP</p>
                            <h5 class="product-name">
                               <a href="#">
                                    HP Laptop 
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$500</span>
                                <span class="original-price">$799</span>
                            </div>
                            <div class="mt-2 text-centerr">
                                <a href="#" class="btn btn1">Add To Cart</a>
                                <a href="#" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="#" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="Non Bridal Design">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">HP</p>
                            <h5 class="product-name">
                               <a href="#">
                                    HP Laptop 
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$500</span>
                                <span class="original-price">$799</span>
                            </div>
                            <div class="mt-2 text-centerr">
                                <a href="#" class="btn btn1">Add To Cart</a>
                                <a href="#" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="#" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="Non Bridal Design">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">HP</p>
                            <h5 class="product-name">
                               <a href="#">
                                    HP Laptop 
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$500</span>
                                <span class="original-price">$799</span>
                            </div>
                            <div class="mt-2 text-centerr">
                                <a href="#" class="btn btn1">Add To Cart</a>
                                <a href="#" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="#" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img class="card-img" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Zm9vZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="Non Bridal Design">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">HP</p>
                            <h5 class="product-name">
                               <a href="#">
                                    HP Laptop 
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$500</span>
                                <span class="original-price">$799</span>
                            </div>
                            <div class="mt-2 text-centerr">
                                <a href="#" class="btn btn1">Add To Cart</a>
                                <a href="#" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="#" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>        

      
        <div class="bg-gray-100 w-full min-h-screenn gap-4 flex-wrap flex justify-center items-center">





            <?php

                  // $data = $product->product_fetch($product->start,$cat_p);

                  // if($data!=null){
                  //   while($row = mysqli_fetch_assoc($data)){
                  //     $code = $product->product($row['id'],$row['unique_id'],$row['pro_name'],$row['pro_details'],$row['pro_type'],$row['b_id'],$row['service_id'],$row['status'],$row['price'],$row['type_id'],$row['available'],$row['dis_per'],$row['added_date'],$row['book_order'],$row['pro_image']);

                  //     echo $code;
                  //   }
                  // }

            ?>


<!-- 
              <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">

                <img class="h-40 object-cover rounded-xl" h-40 object-cover rounded-xl" src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="">
                <div class="p-2">

                <h2 class="font-bold text-lg mb-2 ">Heading</h2>
              
                <p class="text-sm text-gray-600">Simple Yet Beautiful Card Design with TaiwlindCss. Subscribe to our Youtube channel for more ...</p>
                </div>
      
                <div class="m-2">
                <a role='button' href='#' class="text-white bg-purple-600 px-3 py-1 rounded-md hover:bg-purple-700">Learn More</a>
                </div>
              </div>

              <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">

                <img class="h-40 object-cover rounded-xl" h-40 object-cover rounded-xl" src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="">
                <div class="p-2">

                <h2 class="font-bold text-lg mb-2 ">Heading</h2>

                <p class="text-sm text-gray-600">Simple Yet Beautiful Card Design with TaiwlindCss. Subscribe to our Youtube channel for more ...</p>
                </div>

                <div class="m-2">
                <a role='button' href='#' class="text-white bg-sky-500 px-3 py-1 rounded-md hover:bg-purple-700">Learn More</a>
                </div>
              </div>
              

              <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">

                <img class="h-40 object-cover rounded-xl" h-40 object-cover rounded-xl" src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="">
                <div class="p-2">

                <h2 class="font-bold text-lg mb-2 ">Heading</h2>

                <p class="text-sm text-gray-600">Simple Yet Beautiful Card Design with TaiwlindCss. Subscribe to our Youtube channel for more ...</p>
                </div>

                <div class="m-2">
                <a role='button' href='#' class="text-white bg-green-500 px-3 py-1 rounded-md hover:bg-purple-700">Learn More</a>
                </div>
              </div>

              <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">

                <img class="h-40 object-cover rounded-xl" h-40 object-cover rounded-xl" src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="">
                <div class="p-2">

                <h2 class="font-bold text-lg mb-2 ">Heading</h2>

                <p class="text-sm text-gray-600">Simple Yet Beautiful Card Design with TaiwlindCss. Subscribe to our Youtube channel for more ...</p>
                </div>

                <div class="m-2">
                <a role='button' href='#' class="text-white bg-yellow-500 px-3 py-1 rounded-md hover:bg-purple-700">Learn More</a>
                </div>
              </div> -->
  
  
  

        </div>

        <div class="pagination_container p-1">
        
          <nav aria-label="Page nvigation">
            <ul class="pagination" id="product_pagination">
                <li class="#"><a href="?start_p=<?=$pp?>&cat_p=<?=$cat_p?>" class="page-link  product_pagi_prev" ><span aria-hidden="true">&laquo;</span></a></li>
                
                <?php
                      
            
                      product_pagination($product->pagi,$product->current_page, $cat_p);
              
                            
                ?>
                <li class="#"><a href="?start_p=<?=$pn?>&cat_p=<?=$cat_p?>" class="page-link  product_pagi_next" ><span aria-hidden="true">&raquo;</span></a></li>
            </ul>
          </nav>                      

        </div>

        </div>



        </div>

      </div>


    </section>


    <!-- About -->
    <section class="about" id="about">
        <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/265267077_101779855696513_1761739230786580597_n.jpg?stp=c438.0.1173.1173a_dst-jpg_s851x315&_nc_cat=103&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGDUshTWcFCNfkJlWcQN10DjckzmklLdQ2NyTOaSUt1Dd_meBzEAw3TWHNMOqJTFd6j1xbK7-OcQzIqvzOymNOi&_nc_ohc=uCm5MuXXf3EAX-v2zkM&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfDsew3iGL3TWy3KCgH9UJvdVLNuOhm5m0t9V7mUo32Viw&oe=6545752B" alt="">
        <div class="about-text">
            <span>About Us</span>
            <p>Assalamualaikum Everyone.I'm Tasnim Islam Raisa. I'm a henna artist.<br>We all love henna. I will be really happy if I can make you happy with my henna works. To beautify your hands with the color of henna for your special moments you are requested to check my designs and to contact me at my website.<br>I am not giving any home service. You have to come to my house for applying henna (Chittagong) . I hope you guys will love my work. THANK YOU. For any kind of information you can mail me.</p>
            <a href="#" class="btn">Learn More<i class='bx bx-right-arrow-alt'></i></a>
        </div>
    </section>
    <!-- Reviwes -->
    <section class="review" id="review">
        <h2>Why Customer's Love Us?</h2>
        <div class="review-container">
            <!-- Reviwes  1-->
            <div class="box">
                <i class="bx bxs-quote-alt-left"></i>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>The one & only preferable henna artist. </p>
                <div class="review-profile">
                    <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/302484332_172280538649943_8850847120387297848_n.jpg?stp=dst-jpg_s851x315&_nc_cat=106&ccb=1-7&_nc_sid=5f2048&_nc_ohc=mptsMg3Qi3YAX-wggRg&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfANEmP-GvRAVJ4ziznRwE-M4e7_SpmwfHTc-T6VnXwa0g&oe=654608C2" alt="">
                    <h3>Fatema Bristy</h3>
                </div>
            </div>

             <!-- Reviwes  2-->
             <div class="box">
                <i class="bx bxs-quote-alt-left"></i>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>The one & only preferable henna artist. </p>
                <div class="review-profile">
                    <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/268654528_108394741701691_7456874045540881616_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=FaBpq_58pTYAX8DLn2b&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfDxMlWIgbeHwPq8YPOL3RMxWnaIF560j1_jupqK-6xegg&oe=6546364F" alt="">
                    <h3>Umme Salma</h3>
                </div>
            </div>

             <!-- Reviwes  3-->
             <div class="box">
                <i class="bx bxs-quote-alt-left"></i>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>The one & only preferable henna artist. </p>
                <div class="review-profile">
                    <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/271026258_119025000638665_7378988048525943007_n.jpg?stp=c0.118.1080.1080a_dst-jpg_s851x315&_nc_cat=105&ccb=1-7&_nc_sid=5f2048&_nc_ohc=3VerKQRwd6EAX8QLCH3&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfBhOZ46OXFNJtKwS0x6HhWVuFnA_yGt9O5yxT1prgREbw&oe=6545609E" alt="">
                    <h3>Fabiha Islam</h3>
                </div>
            </div>

             <!-- Reviwes  4-->
             <div class="box">
                <i class="bx bxs-quote-alt-left"></i>
                <div class="stars">
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <p>The one & only preferable henna artist. </p>
                <div class="review-profile">
                    <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/265393594_104197315454767_5730425408365978206_n.jpg?stp=c255.0.1538.1538a_dst-jpg_s851x315&_nc_cat=100&ccb=1-7&_nc_sid=5f2048&_nc_ohc=XrEdqY_uH1cAX9zSCiy&_nc_ht=scontent.fcgp7-1.fna&oh=00_AfBIGw18HpeBpX5rnA3814PbA1-pmQIDHW-j3VyM59x1OQ&oe=6546A142" alt="">
                    <h3>Nisa</h3>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <section class="footer" id="footer">
        <div class="footer-box">
            <a href="#" class="logo">Creative Mehedi Art By Raisa</a>
            <p>Chandgaon ,Chittagong</p>
            <div class="social" >
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-youtube'></i></a>

            </div>
        </div> 
        <div class="footer-box">
            <h2>Packages</h2>
            <a href="#">Non-Bridal Design</a>
            <a href="#">Semi-Bridal Design</a>
            <a href="#">Bridal Design</a>
            <a href="#">Arabic Design</a>
        </div> 
        <div class="footer-box">
            <h2>Useful Links</h2>
            <a href="#">Payment & Tax</a>
            <a href="#">Terms Of Use </a>
            <a href="#">My Blog</a>
            <a href="#">Return Policy</a>
        </div>
        <div class="footer-box">
            <h2>Newsletter</h2>
            <p>Get 10% Discount with <br>Email Newsletter</p>
            <form action="" >
            <i class='bx bxs-envelope'></i>
            <input type="email" name="" id="" placeholder="Enter Your Email">
            <i class='bx bx-arrow-back bx-rotate-180'></i>
            </form>
        </div>
    </section >










    <!-- copyright --> 
    <section>
        <div class="copyright">
            <p>&#169; <?=date("Y")?> Creative Mehedi Art By Raisa. All Rights Reserved.</p>

        </div>
    </section>


    <!-- Swiper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  
    <!-- Link to js --> 

</body>
</html>
<script>

  $(document).ready(function(){



    
$(document).on('click','.product_category_box', function(){

var cat_id = $(this).attr('id');
// alert("box"+cat_id);
        
        $.ajax({
          url:'product/design_product.php',
          type:'post',
          data: {
            cat_id:cat_id,
            product_product: true
          },
          success: function(response){

            $('#product_product').html(response);

          }
        });

        $.ajax({
          url:'product/design_product.php',
          type:'post',
          data: {
            cat_id:cat_id,
            product_pagination: true
          },
          success: function(response){

            $('#product_pagination').html(response);

          }
        });

});

    
$(document).on('click','.design_category_box', function(){

var cat_id = $(this).attr('id');
// alert("box"+cat_id);
        
        $.ajax({
          url:'product/design_product.php',
          type:'post',
          data: {
            cat_id:cat_id,
            design_product: true
          },
          success: function(response){

            $('#design_product').html(response);

          }
        });

        $.ajax({
          url:'product/design_product.php',
          type:'post',
          data: {
            cat_id:cat_id,
            design_pagination: true
          },
          success: function(response){

            $('#design_pagination').html(response);

          }
        });

});

    $('#design_categories').ready(function(){

      $.ajax({
          url:'category/category.php',
          type:'post',
          data: {
            design_category: true
          },
          success: function(response){

            if(response!=0){
              $('#design_categories').html(response); 
            }else{
              $('#design_categories').html("Category Not Found");
            }

          }
      });


    });


    $('#design_categories_2').ready(function(){

    $.ajax({
        url:'category/category.php',
        type:'post',
        data: {
          design_categories: true
        },
        success: function(response){

          if(response!=0){
            $('#design_categories_2').html(response); 
          }else{
            $('#design_categories_2').html("Category Not Found");
          }

        }
    });


    });    


    $('#product_categories').ready(function(){

    $.ajax({
        url:'category/category.php',
        type:'post',
        data: {
          product_category: true
        },
        success: function(response){

          if(response!=0){
            $('#product_categories').html(response);
          }else{
            $('#product_categories').html("Category Not Found");
          }

        }
    });


});

$('#product_categories_2').ready(function(){

$.ajax({
    url:'category/category.php',
    type:'post',
    data: {
      product_categories: true
    },
    success: function(response){

      if(response!=0){
        $('#product_categories_2').html(response); 
      }else{
        $('#product_categories_2').html("Category Not Found");
      }

    }
});


});

$(document).on('click','.booking_cart_btn', function(){

$('.order_cart').addClass('hidden');
$('.booking_cart').removeClass('hidden');

});
$(document).on('click','.order_cart_btn', function(){

$('.order_cart').removeClass('hidden');
$('.booking_cart').addClass('hidden');

});

      $(document).on('click','#login', function(){

        $('.signupf').addClass('hidden');
        $('.loginf').removeClass('hidden');

      });

      $(document).on('click','#signup', function(){

        $('.loginf').addClass('hidden');
        $('.signupf').removeClass('hidden');

      });


      $( '.search__open' ).on( 'click', function () {
          $( 'body' ).toggleClass( 'search__box__show__hide' );
          return false;
      });

      $( '.search__close__btn .search__close__btn_icon' ).on( 'click', function () {
          $( 'body' ).toggleClass( 'search__box__show__hide' );
          return false;
      });






  });

</script>

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
  <script src="dist/js/scriptc.js"></script>
  <script src="page.js"></script>
  <script src="dist/js/scriptp.js"></script>
  <script type="text/javascript" src="dist/js/script_p_c.js"></script>
  <script src="dist/js/service_c.js"></script>