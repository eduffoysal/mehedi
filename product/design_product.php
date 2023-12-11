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

if(isset($_POST['design_pagination']) && $_POST['cat_id'] != ''){
        $category = $_POST['cat_id'];
        if(isset($_POST['start']) && $_POST['start'] != 0){
            $start = $_POST['start'];
        }else{
            $start = 0;
        }

        if(isset($_POST['c_p']) && $_POST['c_p'] != 0){
            $current_page = $_POST['c_p'];
        }else{
            $current_page = 1;
        }
        $per_page = 9;

        if($start<=0){
            $start=0;
            $current_page=1;
        }else{
            $current_page=$start;
            $start--;
            $start=$start*$per_page;
        }

            if($category== 'all'){
                $sql = "SELECT * FROM product WHERE  b_id='$b_id' AND book_order='1' ";
            }else{
                $sql = "SELECT * FROM product WHERE  b_id='$b_id' AND book_order='1' AND (pro_type='$category' OR type_id='$category') ";
            }

            $record=mysqli_num_rows(mysqli_query($con,$sql));

            $pagi=ceil($record/$per_page);


            $result=mysqli_query($con,$sql);
            $num=mysqli_num_rows($result);

        $_SESSION['design'] = true;
        $_SESSION['d_s'] = $start;
        $_SESSION['d_c'] = $current_page;
        $_SESSION['d_p_p'] = $per_page;
        $_SESSION['d_p'] = $pagi;

        if($start==0){
            $dp=1;
        }else{
            $dp = $start-1;
        }

        $dn = $start+1;

        ?>
        
        <li class=""><a href="?start_d=<?=$dp?>&cat=<?=$category?>" class="page-link  design_pagi_prev" ><span aria-hidden="true">&laquo;</span></a></li>
              
              <?php
                for($i=1;$i<=$pagi;$i++){
                    $class='';
                    if($current_page==$i){
                    ?>
                        <li class="page-item active"><a href="javascript:void(0)" class="page-link"><?php echo $i?></a></li>
                    <?php
                    }else{
                    ?>
                        <li class="page-item design_pagi_btn" id="<?=$i?>"><a href="?start_d=<?php echo $i ?>&cat=<?=$category?>" id="<?=$i?>" class="page-link"><?php echo $i?></a></li>
                    <?php }
                }
              ?>

        <li class=""><a href="?start_d=<?=$dn?>&cat=<?=$category?>" class="page-link  design_pagi_next" ><span aria-hidden="true">&raquo;</span></a></li>


        <?php
        

}


if(isset($_POST['product_pagination']) && $_POST['cat_id'] != ''){
    $category = $_POST['cat_id'];
    if(isset($_POST['start']) && $_POST['start'] != 0){
        $start = $_POST['start'];
    }else{
        $start = 0;
    }

    if(isset($_POST['c_p']) && $_POST['c_p'] != 0){
        $current_page = $_POST['c_p'];
    }else{
        $current_page = 1;
    }
    $per_page = 9;

    if($start<=0){
        $start=0;
        $current_page=1;
    }else{
        $current_page=$start;
        $start--;
        $start=$start*$per_page;
    }

        if($category== 'all'){
            $sql = "SELECT * FROM product WHERE  b_id='$b_id' AND book_order='0' ";
        }else{
            $sql = "SELECT * FROM product WHERE  b_id='$b_id' AND book_order='0' AND (pro_type='$category' OR type_id='$category') ";
        }

        $record=mysqli_num_rows(mysqli_query($con,$sql));

        $pagi=ceil($record/$per_page);


        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);

    $_SESSION['design'] = true;
    $_SESSION['d_s'] = $start;
    $_SESSION['d_c'] = $current_page;
    $_SESSION['d_p_p'] = $per_page;
    $_SESSION['d_p'] = $pagi;

    if($start==0){
        $dp=1;
    }else{
        $dp = $start-1;
    }

    $dn = $start+1;

    ?>
    
    <li class=""><a href="?start_p=<?=$dp?>&cat_p=<?=$category?>" class="page-link  design_pagi_prev" ><span aria-hidden="true">&laquo;</span></a></li>
          
          <?php
            for($i=1;$i<=$pagi;$i++){
                $class='';
                if($current_page==$i){
                ?>
                    <li class="page-item active"><a href="javascript:void(0)" class="page-link"><?php echo $i?></a></li>
                <?php
                }else{
                ?>
                    <li class="page-item design_pagi_btn" id="<?=$i?>"><a href="?start_p=<?php echo $i ?>&cat_p=<?=$category?>" id="<?=$i?>" class="page-link"><?php echo $i?></a></li>
                <?php }
            }
          ?>

    <li class=""><a href="?start_p=<?=$dn?>&cat_p=<?=$category?>" class="page-link  design_pagi_next" ><span aria-hidden="true">&raquo;</span></a></li>


    <?php
    

}


?>