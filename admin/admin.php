<?php
    include("../db/db.php");
    session_start();

    $b_id='';
    if (isset($_SESSION["b_id"])) {
        $b_id = $_SESSION['b_id'];
    }
    $uniqueId= time().'-'.mt_rand();

    $unique = strtoupper(bin2hex(random_bytes(3)));
    $ran_id = rand(time(), 100000000);

    $unique.' - '.$uniqueId.' - '.$ran_id;


    if(isset($_POST['d_cat'])){

        $cat_name = $_POST['cat_name'];
        $cat_desc = $_POST['cat_details'];

        $sql = "INSERT INTO product_type (unique_id,b_id,service_id,category,details,book_order) VALUES ('$uniqueId','$b_id','1','$cat_name','$cat_desc','1')";


        if($con->query($sql)){
            if(isset($_FILES['updateimage'])){
    
                $img_name = $_FILES['updateimage']['name'];
                $img_type = $_FILES['updateimage']['type'];
                $tmp_name = $_FILES['updateimage']['tmp_name'];
                
                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);
    
                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions) === true){
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($img_type, $types) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"../image/".$new_img_name)){
    
                            $con->query("UPDATE product_type SET type_image='$new_img_name' WHERE unique_id='$uniqueId'");
    
    
                            if(isset($_SESSION['img'])){
                                $deletepic =$_SESSION['img'];
                                unlink("../image/".$deletepic);
                            }
    
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role']=='student'){
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }else if($_SESSION['role']=='admin'){
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }else {
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }
        
                            }else{
                                echo "Welcome, Your Registration Form Successfully Submitted";
                            }
                            
                            
                        }else{
    
                                echo "Hey 1";
                            
                            
                        }
            
                    }else{
    
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন..";
                        
                    }
                        
                }else{
    
                        echo "file format দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    
                }
                    
    
    
            }else{
                echo "Please uploade a Image";
            }
        }


        
    }

    if(isset($_POST['p_cat'])){

        $cat_name = $_POST['cat_name'];
        $cat_desc = $_POST['cat_details'];

        $sql = "INSERT INTO product_type (unique_id,b_id,service_id,category,details,book_order) VALUES ('$uniqueId','$b_id','1','$cat_name','$cat_desc','0')";


        if($con->query($sql)){
            if(isset($_FILES['updateimage'])){
    
                $img_name = $_FILES['updateimage']['name'];
                $img_type = $_FILES['updateimage']['type'];
                $tmp_name = $_FILES['updateimage']['tmp_name'];
                
                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);
    
                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions) === true){
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($img_type, $types) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"../image/".$new_img_name)){
    
                            $con->query("UPDATE product_type SET type_image='$new_img_name' WHERE unique_id='$uniqueId'");
    
    
                            if(isset($_SESSION['img'])){
                                $deletepic =$_SESSION['img'];
                                unlink("../image/".$deletepic);
                            }
    
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role']=='student'){
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }else if($_SESSION['role']=='admin'){
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }else {
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }
        
                            }else{
                                echo "Welcome, Your Registration Form Successfully Submitted";
                            }
                            
                            
                        }else{
    
                                echo "Hey 1";
                            
                            
                        }
            
                    }else{
    
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন..";
                        
                    }
                        
                }else{
    
                        echo "file format দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    
                }
                    
    
    
            }else{
                echo "Please uploade a Image";
            }
        }


        
    }


    if(isset($_POST['design_add'])){

        $cat_name = $_POST['product_name'];
        $cat_desc = $_POST['product_details'];

        $price = $_POST['price'];

        $type_id = $_POST['category'];

        $discount = $_POST['discount'];
        $design = $_POST['design'];
        $side = $_POST['side'];
        $per_side_per = $_POST['per_side_per'];

        $sq = "SELECT * FROM product_type WHERE id='$type_id' AND b_id='$b_id' AND book_order='1' ";

        $result = mysqli_query($con,$sq);
        $row = mysqli_fetch_array($result);

        $pro_type  = $row['category'];

        $sql = "INSERT INTO product (unique_id,b_id,service_id,pro_name,pro_details,book_order,price,pro_type,type_id,dis_per,design,side,per_side_per) VALUES ('$uniqueId','$b_id','1','$cat_name','$cat_desc','1','$price','$pro_type','$type_id','$discount','$design','$side','$per_side_per')";


        if($con->query($sql)){
            if(isset($_FILES['updateimage'])){
    
                $img_name = $_FILES['updateimage']['name'];
                $img_type = $_FILES['updateimage']['type'];
                $tmp_name = $_FILES['updateimage']['tmp_name'];
                
                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);
    
                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions) === true){
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($img_type, $types) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"../image/".$new_img_name)){
    
                            $con->query("UPDATE product SET pro_image='$new_img_name' WHERE unique_id='$uniqueId'");
    
    
                            if(isset($_SESSION['img'])){
                                $deletepic =$_SESSION['img'];
                                unlink("../image/".$deletepic);
                            }
    
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role']=='student'){
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }else if($_SESSION['role']=='admin'){
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }else {
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }
        
                            }else{
                                echo "Welcome, Your Registration Form Successfully Submitted";
                            }
                            
                            
                        }else{
    
                                echo "Hey 1";
                            
                            
                        }
            
                    }else{
    
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন..";
                        
                    }
                        
                }else{
    
                        echo "file format দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    
                }
                    
    
    
            }else{
                echo "Please uploade a Image";
            }
        }


        
    }

    if(isset($_POST['product_add'])){

        $cat_name = $_POST['product_name'];
        $cat_desc = $_POST['product_details'];

        $price = $_POST['price'];

        $type_id = $_POST['category'];

        $discount = $_POST['discount'];
        $design = $_POST['design'];
        $side = $_POST['side'];
        $per_side_per = $_POST['per_side_per'];

        $sq = "SELECT category FROM product_type WHERE id='$type_id' AND b_id='$b_id' AND book_order='0' ";

        $result = mysqli_query($con,$sq);
        $row = mysqli_fetch_array($result);

        $pro_type  = $row['category'];

        $sql = "INSERT INTO product (unique_id,b_id,service_id,pro_name,pro_details,book_order,price,pro_type,type_id,dis_per,design,side,per_side_per) VALUES ('$uniqueId','$b_id','1','$cat_name','$cat_desc','0','$price','$pro_type','$type_id','$discount','$design','$side','$per_side_per')";


        if($con->query($sql)){
            if(isset($_FILES['updateimage'])){
    
                $img_name = $_FILES['updateimage']['name'];
                $img_type = $_FILES['updateimage']['type'];
                $tmp_name = $_FILES['updateimage']['tmp_name'];
                
                $img_explode = explode('.',$img_name);
                $img_ext = end($img_explode);
    
                $extensions = ["jpeg", "png", "jpg"];
                if(in_array($img_ext, $extensions) === true){
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($img_type, $types) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"../image/".$new_img_name)){
    
                            $con->query("UPDATE product SET pro_image='$new_img_name' WHERE unique_id='$uniqueId'");
    
    
                            if(isset($_SESSION['img'])){
                                $deletepic =$_SESSION['img'];
                                unlink("../image/".$deletepic);
                            }
    
                            if(isset($_SESSION['role'])){
                                if($_SESSION['role']=='student'){
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }else if($_SESSION['role']=='admin'){
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }else {
                                    echo "ধন্যবাদ! আপনার নতুন একটি form  সংরক্ষণ করা হয়েছে...";
                                }
        
                            }else{
                                echo "Welcome, Your Registration Form Successfully Submitted";
                            }
                            
                            
                        }else{
    
                                echo "Hey 1";
                            
                            
                        }
            
                    }else{
    
                            echo "দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন..";
                        
                    }
                        
                }else{
    
                        echo "file format দুঃখিত! জেপিজি অথবা পিএনজি ফাইলের ছবি আপ্লোড করুন...";
                    
                }
                    
    
    
            }else{
                echo "Please uploade a Image";
            }
        }


        
    }

?>