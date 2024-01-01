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
    
        }
    }


    if (isset($_POST["design_category"])) {
        $cat_sql = "SELECT pt.*, COUNT(p.id) AS num
        FROM product_type pt
        LEFT JOIN product p ON pt.id = p.type_id
        WHERE pt.b_id = '$b_id' AND pt.book_order = '1'
        GROUP BY pt.id;";
        
        $cat_query=mysqli_query($con, $cat_sql);
        $cat_query_num=mysqli_num_rows($cat_query);
        if ($cat_query_num > 0) {
            $i=0;
            while ($cat = mysqli_fetch_assoc($cat_query)) {
                ?>
                    <div class="box design_category_box box<?=$i++?>" id="<?=$cat['id']?>">
                          <img src="image/<?=$cat['type_image']?>" alt="">
                          <h2><?=$cat['category']?></h2>
                          <span><?=$cat['num']?> Types</span>
                          <i class='bx bx-right-arrow-alt'></i>

                      </div>
                <?php
            }

        }else{

            echo 0;

        }

    }

    if (isset($_POST["design_categories"])) {
        $cat_sql = "SELECT pt.*, COUNT(p.id) AS num
        FROM product_type pt
        LEFT JOIN product p ON pt.id = p.type_id
        WHERE pt.b_id = '$b_id' AND pt.book_order = '1'
        GROUP BY pt.id;";
        
        $cat_query=mysqli_query($con, $cat_sql);
        $cat_query_num=mysqli_num_rows($cat_query);
        if ($cat_query_num > 0) {
            $i=0;
            while ($cat = mysqli_fetch_assoc($cat_query)) {
                ?>
                <a href="?start_d=0&cat=<?=$cat['id']?>" class="tab product_category_box tab<?=$i++?>" id="<?=$cat['id']?>"><?=$cat['category']?></a>
                <?php
            }

        }else{

            echo 0;

        }

    }

    if (isset($_POST["product_category"])) {
        $cat_sql = "SELECT pt.*, COUNT(p.id) AS num
        FROM product_type pt
        LEFT JOIN product p ON pt.id = p.type_id
        WHERE pt.b_id = '$b_id' AND pt.book_order = '0'
        GROUP BY pt.id;";
        
        $cat_query=mysqli_query($con, $cat_sql);
        $cat_query_num=mysqli_num_rows($cat_query);
        if ($cat_query_num > 0) {
            $i=0;
            while ($cat = mysqli_fetch_assoc($cat_query)) {
                ?>
                <li class="tab product_category_box tab<?=$i++?>" id="<?=$cat['id']?>"><?=$cat['category']?></li>
                <?php
            }

        }else{

            echo 0;

        }

    }

    if (isset($_POST["product_categories"])) {
        $cat_sql = "SELECT pt.*, COUNT(p.id) AS num
        FROM product_type pt
        LEFT JOIN product p ON pt.id = p.type_id
        WHERE pt.b_id = '$b_id' AND pt.book_order = '0'
        GROUP BY pt.id;";
        
        $cat_query=mysqli_query($con, $cat_sql);
        $cat_query_num=mysqli_num_rows($cat_query);
        if ($cat_query_num > 0) {
            $i=0;
            while ($cat = mysqli_fetch_assoc($cat_query)) {
                ?>
                <a href="?start_p=0&cat_p=<?=$cat['id']?>"class="tab product_category_box tab<?=$i++?>" id="<?=$cat['id']?>"><?=$cat['category']?></a>
                <?php
            }

        }else{

            echo 0;

        }

    }

?>