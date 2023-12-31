<?php
    class Design_fetch{
        private $db;
        private $con;
        private $user;

        public $per_page=9;
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
            $this->design_ini_session(0,'all');
        }

        public function design_ini_session($start,$cat){

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
                $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='1'";
            }else{
                $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='1' AND (pro_type='$cat' OR type_id='$cat') ";
            }


            $this->record=mysqli_num_rows(mysqli_query($this->con,$this->sql));
    
            $this->pagi=ceil($this->record/$this->per_page);

            $_SESSION['design'] = true;
            $_SESSION['d_s'] = $this->start;
            $_SESSION['d_c'] = $this->current_page;
            $_SESSION['d_p_p'] = $this->per_page;
            $_SESSION['d_p'] = $this->pagi;
        }

        public function design_set_session($start,$cat){

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
                    $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='1'";
                }else{
                    $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='1' AND (pro_type='$cat' OR type_id='$cat') ";
                }

                $this->record=mysqli_num_rows(mysqli_query($this->con,$this->sql));
    
                $this->pagi=ceil($this->record/$this->per_page);

            $_SESSION['design'] = true;
            $_SESSION['d_s'] = $this->start;
            $_SESSION['d_c'] = $this->current_page;
            $_SESSION['d_p_p'] = $this->per_page;
            $_SESSION['d_p'] = $this->pagi;

        }


        public function design_fetch($start,$category){

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
                    $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='1' limit $this->start, $this->per_page";
                }else{
                    $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='1' AND (pro_type='$category' OR type_id='$category') limit $this->start, $this->per_page";
                }
    
                $this->record=mysqli_num_rows(mysqli_query($this->con,$this->sql));
    
                // $this->pagi=ceil($this->record/$this->per_page);
    
    
                $result=mysqli_query($this->con,$this->sql);
                $this->result=$result;
                $num=mysqli_num_rows($result);
                $this->num=$num;
            
            $_SESSION['design'] = true;
            $_SESSION['d_s'] = $this->start;
            $_SESSION['d_c'] = $this->current_page;
            $_SESSION['d_p_p'] = $this->per_page;
            $_SESSION['d_p'] = $this->pagi;



            if($num == 0){

                // echo '<script>location.replace("error.php")</script>';  
                
            }
            else{
                return $result;
            }

        }

        // limit $start, $per_page
        public function design_list($searchkey,$category){
            if(!empty($searchkey)){    
                $query = "SELECT * FROM product WHERE pro_name LIKE '%$searchkey%' OR pro_type LIKE '%$searchkey%' OR price LIKE '%$searchkey%' OR pro_details LIKE '%$searchkey%' AND b_id='$this->user' AND book_order='1' AND (pro_type='$category' OR type_id='$category') limit $this->start, $this->per_page";

            }
            else{
                // if(){

                // }else{
                    
                // }
                $query = "SELECT * FROM product WHERE b_id='$this->user' AND book_order='1' AND (pro_type='$category' OR type_id='$category') limit $this->start, $this->per_page";
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

        public function design($id,$unique_id,$pro_name,$pro_details,$pro_type,$b_id,$service_id,$status,$price,$type_id,$available,$dis_per,$added_date,$book_order,$image,$design,$side,$per){

            $code ="
                <div class=\"box view_design_btn\" id=\"$id\">
                    <img src=\"$image\" alt=\"\">
                    <h2>$pro_name</h2>
                    <span>$pro_type</span>
                    <h3 class=\"price\">$price</h3>
                    <form action=\"#\" role=\"form\" id=\"design_$id\">
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
                    <i class=\"bx bxs-message-square-check add_to_design_cart_btn\" id=\"$id\"></i>
                    <i class=\"bx bx-heart book_mark_design_btn fw-bold fs-3\" id=\"$id\"></i>
                    </form>
                </div>
            ";

            echo $code;

        }


    }


?>