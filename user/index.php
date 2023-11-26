<?php
include('../db/db.php');
session_start();

if(isset($_SESSION['user'])){
    $_SESSION['visitor_id']=$_SESSION['user'];
    $_SESSION['unique_id']=$_SESSION['user'];
    if($_SESSION['role']=='admin'){
        header("location:../admin");
    }elseif($_SESSION['role']=='user'){
        header("location:../admin/user");
    }
    // if($_SESSION['b_id']==''){
    //     header("location:create");
    // }else{
    //     $b_id = $_SESSION['b_id'];
    // }

}else{
    header("location:../");
}


if(!isset($_SESSION['user'])){
    header('location:../');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../output/output.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">

</head>
<body >
    


    <!-- start: Popular -->
    <section class="py-12">
        <div class="lg:container xl:max-w-7xl mx-auto px-4">
            <div class="swiper swiper-popular rounded-md">
                <div class="swiper-wrapper">
                    <a href="#" class="swiper-slide relative before:absolute before:w-full before:h-full before:bottom-0 before:left-0 before:bg-gradient-to-b before:from-transparent before:to-black group/post">
                        <img src="https://source.unsplash.com/random/500x500/?tech" alt="" class="w-full h-96 object-cover">
                        <div class="absolute bottom-0 left-0 w-full p-6 sm:p-8 max-w-3xl">
                            <ul class="flex items-center mb-2">
                                <li class="text-sm font-semibold text-white/70">Oct 10, 2023</li>
                                <li class="text-sm font-semibold text-white/70 before:w-1 before:h-1 before:rounded-full before:bg-gray-400 before:align-middle before:mx-2 before:inline-block">3 min read</li>
                            </ul>
                            <span class="text-2xl sm:text-3xl font-medium leading-snug sm:leading-tight bg-underline bg-[length:0_6%] bg-no-repeat bg-[0_100%] transition-all group-hover/post:bg-[length:100%_6%] text-white">Lorem ipsum dolor sit amet consectetur.</span>
                            <p class="text-white/70 line-clamp-2 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, non ipsa porro similique ratione illum suscipit rem iusto modi at?</p>
                            <div class="flex items-center mt-6">
                                <img src="https://source.unsplash.com/random/32x32/?user" alt="" class="w-8 h-8 rounded-full">
                                <span class="ml-3 font-medium text-white">by Fajar Std</span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="swiper-slide relative before:absolute before:w-full before:h-full before:bottom-0 before:left-0 before:bg-gradient-to-b before:from-transparent before:to-black group/post">
                        <img src="https://source.unsplash.com/random/500x500/?tech" alt="" class="w-full h-96 object-cover">
                        <div class="absolute bottom-0 left-0 w-full p-6 sm:p-8 max-w-3xl">
                            <ul class="flex items-center mb-2">
                                <li class="text-sm font-semibold text-white/70">Oct 10, 2023</li>
                                <li class="text-sm font-semibold text-white/70 before:w-1 before:h-1 before:rounded-full before:bg-gray-400 before:align-middle before:mx-2 before:inline-block">3 min read</li>
                            </ul>
                            <span class="text-2xl sm:text-3xl font-medium leading-snug sm:leading-tight bg-underline bg-[length:0_6%] bg-no-repeat bg-[0_100%] transition-all group-hover/post:bg-[length:100%_6%] text-white">Lorem ipsum dolor sit amet consectetur.</span>
                            <p class="text-white/70 line-clamp-2 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, non ipsa porro similique ratione illum suscipit rem iusto modi at?</p>
                            <div class="flex items-center mt-6">
                                <img src="https://source.unsplash.com/random/32x32/?user" alt="" class="w-8 h-8 rounded-full">
                                <span class="ml-3 font-medium text-white">by Fajar Std</span>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="swiper-slide relative before:absolute before:w-full before:h-full before:bottom-0 before:left-0 before:bg-gradient-to-b before:from-transparent before:to-black group/post">
                        <img src="https://source.unsplash.com/random/500x500/?tech" alt="" class="w-full h-96 object-cover">
                        <div class="absolute bottom-0 left-0 w-full p-6 sm:p-8 max-w-3xl">
                            <ul class="flex items-center mb-2">
                                <li class="text-sm font-semibold text-white/70">Oct 10, 2023</li>
                                <li class="text-sm font-semibold text-white/70 before:w-1 before:h-1 before:rounded-full before:bg-gray-400 before:align-middle before:mx-2 before:inline-block">3 min read</li>
                            </ul>
                            <span class="text-2xl sm:text-3xl font-medium leading-snug sm:leading-tight bg-underline bg-[length:0_6%] bg-no-repeat bg-[0_100%] transition-all group-hover/post:bg-[length:100%_6%] text-white">Lorem ipsum dolor sit amet consectetur.</span>
                            <p class="text-white/70 line-clamp-2 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus, non ipsa porro similique ratione illum suscipit rem iusto modi at?</p>
                            <div class="flex items-center mt-6">
                                <img src="https://source.unsplash.com/random/32x32/?user" alt="" class="w-8 h-8 rounded-full">
                                <span class="ml-3 font-medium text-white">by Fajar Std</span>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- end: Popular -->


</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="../dist/js/scriptb.js"></script>