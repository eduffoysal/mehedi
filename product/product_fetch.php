<?php
    class Product_fetch{
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
            $this->product_ini_session(0);
        }

        public function product_ini_session($start){

                $this->start=$start;
                if($start<=0){
                    $this->start=0;
                    $this->current_page=1;
                }else{
                    $this->current_page=$start;
                    $this->start--;
                    $this->start=$this->start*$this->per_page;
                }

                $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='0'";

                $this->record=mysqli_num_rows(mysqli_query($this->con,$this->sql));
        
                $this->pagi=ceil($this->record/$this->per_page);
            
                $_SESSION['product'] = true;
                $_SESSION['p_s'] = $this->start;
                $_SESSION['p_c'] = $this->current_page;
                $_SESSION['p_p_p'] = $this->per_page;
                $_SESSION['p_p'] = $this->pagi;

        }

        public function product_set_session($start){

                $this->start=$start;
                if($start<=0){
                    $this->start=0;
                    $this->current_page=1;
                }else{
                    $this->current_page=$start;
                    $this->start--;
                    $this->start=$this->start*$this->per_page;
                }

                $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='0' ";

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

        public function product($id,$unique_id,$pro_name,$pro_details,$pro_type,$b_id,$service_id,$status,$price,$type_id,$available,$dis_per,$added_date,$book_order,$image){

            $code ="
                    <div class=\"w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl\">
                    
                    <img class=\"h-40 object-cover rounded-xl h-40 object-cover rounded-xl\" src=\"$image\" alt=\"\">
                    <div class=\"p-2\">
                    
                    <h2 class=\"font-bold text-lg mb-2 \">Heading</h2>
                    
                    <p class=\"text-sm text-gray-600\">Simple Yet Beautiful Card Design with TaiwlindCss. Subscribe to our Youtube channel for more ...</p>
                    </div>
                    
                    <div class=\"m-2\">
                    <a role=\"button\" href=\"\" class=\"text-white bg-purple-600 px-3 py-1 rounded-md hover:bg-purple-700\">Learn More</a>
                    </div>
                    </div>
            
            ";

            echo $code;

        }


    }


?>