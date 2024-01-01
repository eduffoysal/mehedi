<?php
    class Product_fetch{
        private $db;
        private $con;
        private $user;

        public $per_page=8;
        public $start=0;
        public $current_page=1;

        public $pagi;

        public $per_page_size= 10;
        public $per_page_count= 10;
        public $per_page_offset= 0;
        public $sql= "";
        public $record;
        public $result;
        public $num;

        function __construct($con,$user_id)
        {
            $this->con=$con;
            $this->user=$user_id;
            $this->product_ini_session(0,'all');
        }

        public function product_ini_session($start,$cat){

                $this->start=$start;
                if($start<=0){
                    $this->start=0;
                    $this->current_page=1;
                }else{
                    $this->current_page=$start;
                    $this->start--;
                    $this->start=$this->start*$this->per_page;
                }

                if($cat=='all'){
                    $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='0'";
                }else{
                    $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='0' AND (pro_type='$cat' OR type_id='$cat') ";
                }

                $this->record=mysqli_num_rows(mysqli_query($this->con,$this->sql));
        
                $this->pagi=ceil($this->record/$this->per_page);
            
                $_SESSION['product'] = true;
                $_SESSION['p_s'] = $this->start;
                $_SESSION['p_c'] = $this->current_page;
                $_SESSION['p_p_p'] = $this->per_page;
                $_SESSION['p_p'] = $this->pagi;

        }

        public function product_set_session($start, $cat){

                $this->start=$start;
                if($start<=0){
                    $this->start=0;
                    $this->current_page=1;
                }else{
                    $this->current_page=$start;
                    $this->start--;
                    $this->start=$this->start*$this->per_page;
                }

                if($cat=='all'){
                    $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='0'";
                }else{
                    $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='0' AND (pro_type='$cat' OR type_id='$cat') ";
                }

                $this->record=mysqli_num_rows(mysqli_query($this->con,$this->sql));
    
                // $this->pagi=ceil($this->record/$this->per_page);
            
                $_SESSION['product'] = true;
                $_SESSION['p_s'] = $this->start;
                $_SESSION['p_c'] = $this->current_page;
                $_SESSION['p_p_p'] = $this->per_page;
                $_SESSION['p_p'] = $this->pagi;

        }


        public function product_fetch($start,$category){

                // $this->start=$start;
                // if($start<=0){
                //     $this->start=0;
                //     $this->current_page=1;
                // }else{
                //     $this->current_page=$start;
                //     $this->start--;
                //     $this->start=$this->start*$this->per_page;
                // }


                if($category== 'all'){
                    $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='0' limit $this->start, $this->per_page";
                }else{
                    $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='0' AND (pro_type='$category' OR type_id='$category') limit $this->start, $this->per_page";
                }
    
    
                $this->record=mysqli_num_rows(mysqli_query($this->con,$this->sql));
    
                $this->pagi=ceil($this->record/$this->per_page);
    
    
                $result=mysqli_query($this->con,$this->sql);
                $this->result=$result;
                $num=mysqli_num_rows($result);
                $this->num=$num;
            
            $_SESSION['product'] = true;
            $_SESSION['p_s'] = $this->start;
            $_SESSION['p_c'] = $this->current_page;
            $_SESSION['p_p_p'] = $this->per_page;
            $_SESSION['p_p'] = $this->pagi;



            if($num == 0){

                // echo '<script>location.replace("error.php")</script>';  
                
            }
            else{
                return $result;
            }

        }

        // limit $start, $per_page
        public function product_list($searchkey,$category){
            if(!empty($searchkey)){    
                $query = "SELECT * FROM product WHERE pro_name LIKE '%$searchkey%' OR pro_type LIKE '%$searchkey%' OR price LIKE '%$searchkey%' OR pro_details LIKE '%$searchkey%' AND b_id='$this->user' AND book_order='0' AND (pro_type='$category' OR type_id='$category') limit $this->start, $this->per_page";

            }
            else{
                // if(){

                // }else{
                    
                // }
                $query = "SELECT * FROM product WHERE b_id='$this->user' AND book_order='0' AND (pro_type='$category' OR type_id='$category') limit $this->start, $this->per_page";
                $searchkey = "";
            }
        
            $result=mysqli_query($this->con,$query);
            $this->result=$result;
            $num=mysqli_num_rows($result);
            $this->num=$num;

            if($num == 0){

                // echo '<script>location.replace("error.php")</script>';  
                
            }
            else{
                return $result;
            }

        }

        public function product($id,$unique_id,$pro_name,$pro_details,$pro_type,$b_id,$service_id,$status,$price,$type_id,$available,$dis_per,$added_date,$book_order,$image,$design,$side,$per){
            if($available==0){
                $stock = "Stock Out";
            }else{
                $stock = "In Stock";
            }

            $code ="
            <div class=\"col-md-3 col-sm-6\" id=\"$id\">
                <div class=\"product-card view_product_btn\">
                    <div class=\"product-card-img\">
                        <label class=\"stock bg-success\">$stock</label>
                        <img src=\"image/$image\" alt=\"$pro_name\">
                    </div>
                    <div class=\"product-card-body\">
                        <p class=\"product-brand\">$pro_type</p>
                        <h5 class=\"product-name\">
                        <a href=\"#\">
                                $pro_name 
                        </a>
                        </h5>
                        <div>
                            <span class=\"selling-price\">$price TK</span>
                            <span class=\"original-price\">$price TK</span>
                        </div>
                        <div class=\"mt-2 text-centerr\">
                        <form action=\"#\" role=\"form\" id=\"product_$id\">
                        <input type=\"hidden\" name=\"unique_id\" value=\"$unique_id\">
                        <input type=\"hidden\" name=\"id\" value=\"$id\">
                        <input type=\"hidden\" name=\"pro_name\" value=\"$pro_name\">
                        <input type=\"hidden\" name=\"pro_type\" value=\"$pro_type\">
                        <input type=\"hidden\" name=\"price\" value=\"$price\">
                        <input type=\"hidden\" name=\"book_order\" value=\"$book_order\">
                        <input type=\"hidden\" name=\"pro_image\" value=\"$image\">
                        <input type=\"hidden\" name=\"type_id\" value=\"$type_id\">
                        <input type=\"hidden\" name=\"b_id\" value=\"$b_id\">
                        <input type=\"hidden\" name=\"available\" value=\"$available\">
                        <input type=\"hidden\" name=\"status\" value=\"$status\">
                        <input type=\"hidden\" name=\"dis_per\" value=\"$dis_per\">
                        <input type=\"hidden\" name=\"design\" value=\"$design\">
                        <input type=\"hidden\" name=\"side\" value=\"$side\">
                        <input type=\"hidden\" name=\"per_side_per\" value=\"$per\">
                        </form>
                            <a href=\"javascript:void(0)\" class=\"btn btn1 add_to_product_cart_btn\" id=\"$id\">Add To Cart</a>
                            <a href=\"javascript:void(0)\" class=\"btn btn1 book_mark_product_btn\" id=\"$id\"> <i class=\"fa fa-heart\" id=\"$id\"></i> </a>
                            <a href=\"javascript:void(0)\" class=\"btn btn1 view_product_btn\" id=\"$id\"> View </a>
                        
                        </div>
                    </div>
                </div>
            </div>
            
            ";

            echo $code;

        }


    }


?>