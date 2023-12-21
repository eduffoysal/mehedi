<?php
include("../db/db.php");
session_start();

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

            <div class="box view_design_btn" id="<?=$row['id']?>">
                <img src="<?=$row['pro_image']?>" alt="">
                <h2><?=$row['pro_name']?></h2>
                <span><?=$row['pro_type']?></span>
                <h3 class="price"><?=$row['price']?>TK</h3>
                <form action="#" role="form" id="design_<?=$row['id']?>">
                <input type="hidden" name="unique_id" value="<?=$row['unique_id']?>">
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <input type="hidden" name="pro_name" value="<?=$row['pro_name']?>">
                <input type="hidden" name="pro_type" value="<?=$row['pro_type']?>">
                <input type="hidden" name="price" value="<?=$row['price']?>">
                <input type="hidden" name="book_order" value="<?=$row['book_order']?>">
                <input type="hidden" name="pro_image" value="<?=$row['pro_image']?>">
                <input type="hidden" name="type_id" value="<?=$row['type_id']?>">
                <input type="hidden" name="b_id" value="<?=$row['b_id']?>">
                <input type="hidden" name="available" value="<?=$row['available']?>">
                <input type="hidden" name="status" value="<?=$row['status']?>">
                <input type="hidden" name="dis_per" value="<?=$row['dis_per']?>">
                <input type="hidden" name="design" value="<?=$row['design']?>">
                <input type="hidden" name="side" value="<?=$row['side']?>">
                <input type="hidden" name="per_side_per" value="<?=$row['per_side_per']?>">
                <i class='bx bxs-message-square-check add_to_design_cart_btn' id="<?=$row['id']?>"></i>
                <i class='bx bx-heart book_mark_design_btn fw-bold fs-3' id='<?=$row['id']?>'></i>
                </form>
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
                    <div class="product-card view_product_btn">
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
                            <form action="#" role="form" id="product_<?=$row['id']?>">
                            <input type="hidden" name="unique_id" value="<?=$row['unique_id']?>">
                            <input type="hidden" name="id" value="<?=$row['id']?>">
                            <input type="hidden" name="pro_name" value="<?=$row['pro_name']?>">
                            <input type="hidden" name="pro_type" value="<?=$row['pro_type']?>">
                            <input type="hidden" name="price" value="<?=$row['price']?>">
                            <input type="hidden" name="book_order" value="<?=$row['book_order']?>">
                            <input type="hidden" name="pro_image" value="<?=$row['pro_image']?>">
                            <input type="hidden" name="type_id" value="<?=$row['type_id']?>">
                            <input type="hidden" name="b_id" value="<?=$row['b_id']?>">
                            <input type="hidden" name="available" value="<?=$row['available']?>">
                            <input type="hidden" name="status" value="<?=$row['status']?>">
                            <input type="hidden" name="dis_per" value="<?=$row['dis_per']?>">
                            <input type="hidden" name="design" value="<?=$row['design']?>">
                            <input type="hidden" name="side" value="<?=$row['side']?>">
                            <input type="hidden" name="per_side_per" value="<?=$row['per_side_per']?>">
                            </form>
                                <a href="javascript:void(0)" class="btn btn1 add_to_product_cart_btn" id="<?=$row['id']?>">Add To Cart</a>
                                <a href="javascript:void(0)" class="btn btn1 book_mark_product_btn" id="<?=$row['id']?>"> <i class="fa fa-heart"></i> </a>
                                <a href="javascript:void(0)" class="btn btn1 view_product_btn" id="<?=$row['id']?>"> View </a>
                            
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


if(isset($_POST['pro_name'])){

    $id = $_POST['id'];
    $unique_id = $_POST['unique_id'];
    $pro_name = $_POST['pro_name'];
    $pro_type = $_POST['pro_type'];
    $type_id = $_POST['type_id'];
    $available = $_POST['available'];
    $book_order = $_POST['book_order'];
    $status = intval($_POST['status']);
    $b_id = $_POST['b_id'];
    $price = floatval($_POST['price']);
    $image = $_POST['pro_image'];
    $dis_per = floatval($_POST['dis_per']);
    $design = $_POST['design'];
    $side = intval($_POST['side']);
    $per = floatval($_POST['per_side_per']);
    $order_booked_id = '';

    $orderList = new OrderList();
    $orderList->productList($b_id,$user_u_id,$book_order,$id,$order_booked_id,1,$price,$pro_name,$image,$pro_type,$design,$side,$per);
    
    if($orderList->saveToCart()){
        echo 1;
    }else{
        echo 'Product did not add to cart';
    }

}


if(isset($_POST['order_cart'])){

    // unset($_SESSION['design_cart']);
    // unset($_SESSION['product_cart']);


    ?>

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
                          <tbody >


    <?php

            if(empty($_SESSION['product_cart'])){
                $total = 0;
                $qntotal = 0;
            }?>
            <?php if(isset($_SESSION['product_cart'])){
                $total = 0;
                $qntotal = 0;
                foreach($_SESSION['product_cart'] as $k=> $item){
                    $total = $total + ($item['quantity'] * $item['price']);
                    $qntotal = $qntotal +$item['quantity'];
                    
                }


                $orderList = convertSessionToObjects('product_cart');

                foreach ($orderList as $index => $list) {
                    ?>

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" id="<?=$index?>">
                            <td class="p-4">
                                <img src="<?=$list->getProImage()?>" class="w-16 md:w-32 max-w-full max-h-full" alt="<?=$list->getProName()?>">
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                <?=$list->getProName()?>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <button class="inline-flex plus_p_btn items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" id="<?=$index?>" type="button">
                                        <span class="sr-only">Quantity button</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                        </svg>
                                    </button>
                                    <div>
                                        <input type="number" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="product_q_<?=$index?>" value="<?=$list->getQuantity()?>" placeholder="1" required>
                                    </div>
                                    <button class="inline-flex minus_p_btn items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" id="<?=$index?>" type="button">
                                        <span class="sr-only">Quantity button</span>
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                            <?=$list->getTotalPrice()?>
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium remove_product_btn text-red-600 dark:text-red-500 hover:underline" id="<?=$index?>">Remove</a>
                            </td>
                        </tr>

                    <?php
                }

            }
?>

                                <!-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
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
                              </tr> -->
                          </tbody>
                        </table>


<div class="container-fluid">
    <div class="row">
        <div class="mt-3 w-full">
            <a href="checkout/p" class="text-decoration-none decoration-none">
            <button type="button" class="btn btn-outline-info pickDate" id="pickDate">Checkout With <?=calculateTotalPrice('product_cart')?> BDT</button>
            </a>
        </div>
    </div>
</div>                        

<?php

}

if(isset($_POST['booking_cart'])){

    
    ?>

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
                          <tbody >


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

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" id="<?=$index?>">
                    <td class="p-4">
                        <img src="<?=$list->getProImage()?>" class="w-16 md:w-32 max-w-full max-h-full" alt="<?=$list->getProName()?>">
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        <?=$list->getProName()?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <button class="inline-flex plus_d_btn items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" id="<?=$index?>" type="button">
                                <span class="sr-only">Quantity button</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                </svg>
                            </button>
                            <div>
                                <input type="number" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?=$list->getQuantity()?>" placeholder="1" id="design_q_<?=$index?>" required>
                            </div>
                            <button class="inline-flex minus_d_btn items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" id="<?=$index?>" type="button">
                                <span class="sr-only">Quantity button</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    <?=$list->getTotalPrice()?>
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium remove_design_btn text-red-600 dark:text-red-500 hover:underline" id="<?=$index?>">Remove</a>
                    </td>
                </tr>

            <?php
        }

    }

    ?>
<!-- 
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
  </tr> -->
</tbody>
</table>

<div class="container-fluid">
    <div class="row">
        
        <div class="mt-3 w-full">
            <a href="date" class="text-decoration-none decoration-none">
            <button type="button" class="btn btn-info pickDate" id="pickDate">Pick A Date to Checkout With <?=calculateTotalPrice('design_cart')?> BDT</button>
            </a>
        </div>
    </div>
</div>

<?php


}


if(isset($_POST['booking_cart_2'])){

    
    ?>

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
                                      Side(Min)
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Price
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody >


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

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" id="<?=$index?>">
                    <td class="p-4">
                        <img src="<?=$list->getProImage()?>" class="w-16 md:w-32 max-w-full max-h-full" alt="<?=$list->getProName()?>">
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        <?=$list->getProName()?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <button class="inline-flex plus_d_btn items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" id="<?=$index?>" type="button">
                                <span class="sr-only">Quantity button</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                </svg>
                            </button>
                            <div>
                                <input type="number" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?=$list->getQuantity()?>" placeholder="1" id="design_q_<?=$index?>" required>
                            </div>
                            <button class="inline-flex minus_d_btn items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" id="<?=$index?>" type="button">
                                <span class="sr-only">Quantity button</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    <select class="design_side_selection" name="design_side" id="<?=$index?>" required>
                        <option value='no'><?=$list->getSide()?> Side</option>
                        <option value='1'>Single Side</option>
                        <option value='2'>Double Side</option>
                        <option value='3'>Three Side</option>
                        <option value='4'>Four Side</option>
                        <option value='0'>More 1</option>
                        <option value='5'>More 2</option>
                    </select>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    <?=$list->getTotalPrice()?>
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium remove_design_btn text-red-600 dark:text-red-500 hover:underline" id="<?=$index?>">Remove</a>
                    </td>
                </tr>

            <?php
        }

    }

    ?>
<!-- 
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
  </tr> -->
</tbody>
</table>


<div class="container-fluid">
    <div class="row">
        <div class="mt-3 w-full">
            <a href="../checkout" class="text-decoration-none decoration-none">
            <button type="button" class="btn btn-info pickDate" id="pickDate">Checkout With <?=calculateTotalPrice('design_cart')?> BDT</button>
            </a>
        </div>
    </div>
</div>

<?php


}

if(isset($_POST['remove_p'])){
    $index = $_POST['p_id'];

    $re = removeFromCart('product_cart', $index);
    if($re==true){
        echo 1;
    }else{
        echo "Index Not Found";
    }
    
}


if(isset($_POST['remove_d'])){
    $index = $_POST['p_id'];

    $re = removeFromCart('design_cart', $index);
    if($re==true){
        echo 1;
    }else{
        echo "Index Not Found";
    }
    
}

if(isset($_POST['minus_d'])){
    $index = $_POST['p_id'];

    $returnValue = increaseQuantity('design_cart', $index);

    if ($returnValue === true) {
        echo "Quantity increased successfully!";
    } else {
        echo "Failed to increase quantity.";
    }

}
if(isset($_POST['minus_p'])){
    $index = $_POST['p_id'];

    $returnValue = increaseQuantity('product_cart', $index);

    if ($returnValue === true) {
        echo "Quantity increased successfully!";
    } else {
        echo "Failed to increase quantity.";
    }

}

if(isset($_POST['plus_d'])){
    $index = $_POST['p_id'];

    $returnValue = decreaseQuantity('design_cart', $index);

    if ($returnValue === true) {
        echo "Quantity decreased successfully!";
    } else {
        echo "Failed to decrease quantity.";
    }

}


if(isset($_POST['side_set'])){
    $index = intval($_POST['p_id']);
    $side = $_POST['side'];
    if (!is_int($side)) {
        $side = intval($side);    
    }
    $returnValue = setDesignSide('design_cart', $index, $side);

    if ($returnValue === true) {
        echo 1;
    } else {
        echo "Failed to decrease quantity.";
    }

}


if(isset($_POST['plus_p'])){
    $index = $_POST['p_id'];

    $returnValue = decreaseQuantity('product_cart', $index);

    if ($returnValue === true) {
        echo "Quantity decreased successfully!";
    } else {
        echo "Failed to decrease quantity.";
    }

}
?>