<?php
include("../db/db.php");
session_start();

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

if(isset($_POST['design_product'])) {
    $per_page = 9;
    $start = 0;
    if (isset($_POST['start']) && $_POST['start']!=''){
        $start = $_POST['start'];
    } 

    $cat_id = $_POST['cat_id'];

    if($cat_id== 'all'){
        $sql = "SELECT * FROM product WHERE  b_id='$b_id' AND book_order='1' limit $start, $per_page";
    }else{
        $sql = "SELECT * FROM product WHERE  b_id='$b_id' AND book_order='1' AND (pro_type='$cat_id' OR type_id='$cat_id') limit $start, $per_page";
    }

    $record=mysqli_num_rows(mysqli_query($con,$sql));

    // $this->pagi=ceil($this->record/$this->per_page);


    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);


        if($num == 0){
            
        }
        else{
            $i=0;
            while($row=mysqli_fetch_assoc($result)){
                ?>

            <div class="box" id="<?=$row['id']?>">
                <img src="<?=$row['pro_image']?>" alt="">
                <h2><?=$row['pro_name']?></h2>
                <span><?=$row['pro_type']?></span>
                <h3 class="price"><?=$row['price']?>TK</h3>
                <i class='bx bxs-message-square-check' id="<?=$row['id']?>></i>
                <i class='bx bx-heart' id="<?=$row['id']?>></i>
            </div>

                <?php
            }
        }

}

if(isset($_POST['product_product'])) {
    $per_page = 9;
    $start = 0;
    if (isset($_POST['start']) && $_POST['start']!=''){
        $start = $_POST['start'];
    } 

    $cat_id = $_POST['cat_id'];

    if($cat_id== 'all'){
        $sql = "SELECT * FROM product WHERE  b_id='$b_id' AND book_order='0' limit $start, $per_page";
    }else{
        $sql = "SELECT * FROM product WHERE  b_id='$b_id' AND book_order='0' AND (pro_type='$cat_id' OR type_id='$cat_id') limit $start, $per_page";
    }

    $record=mysqli_num_rows(mysqli_query($con,$sql));

    // $this->pagi=ceil($this->record/$this->per_page);


    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);


        if($num == 0){
            
        }
        else{
            $i=0;
            while($row=mysqli_fetch_assoc($result)){
                $available = $row["available"];
                if($available==0){
                    $stock = "Stock Out";
                }else{
                    $stock = "In Stock";
                }
                ?>

                <div class="col-md-3 col-sm-6">
                    <div class="product-card">
                        <div class="product-card-img" id="<?=$row['id']?>">
                            <label class="stock bg-success"><?=$stock?></label>
                            <img src="<?=$row['pro_image']?>" alt="<?=$row['pro_name']?>">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand"><?=$row['pro_type']?></p>
                            <h5 class="product-name">
                               <a href="#">
                               <?=$row['pro_name']?> 
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price"><?=$row['price']?> TK</span>
                                <span class="original-price"><?=$row['price']?> TK</span>
                            </div>
                            <div class="mt-2 text-centerr">
                                <a href="javascript:void(0)" class="btn btn1" id="<?=$row['id']?>">Add To Cart</a>
                                <a href="javascript:void(0)" class="btn btn1" id="<?=$row['id']?>"> <i class="fa fa-heart"></i> </a>
                                <a href="javascript:void(0)" class="btn btn1" id="<?=$row['id']?>"> View </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        }

}

?>