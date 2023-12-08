<?php
    class Design_fetch{
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

        function __construct($con,$user_id)
        {
            $this->con=$con;
            $this->user=$user_id;
            $this->design_ini_session(0);
        }

        public function design_ini_session($start){
                if($start<=0){
                    $this->start=0;
                    $this->current_page=1;
                }else{
                    $this->current_page=$start;
                    $this->start--;
                    $this->start=$this->start*$this->per_page;
                }
            
            $_SESSION['design'] = true;
            $_SESSION['d_s'] = $this->start;
            $_SESSION['d_c'] = $this->current_page;
            $_SESSION['d_p_p'] = $this->per_page;
            $_SESSION['d_p'] = $this->pagi;


            $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='1'";

            $this->record=mysqli_num_rows(mysqli_query($this->con,$this->sql));
    
            $this->pagi=ceil($this->record/$this->per_page);
        }

        public function design_set_session($start){
            if($start<=0){
                $this->start=0;
                $this->current_page=1;
            }else{
                $this->current_page=$start;
                $this->start--;
                $this->start=$this->start*$this->per_page;
            }
        
        $_SESSION['design'] = true;
        $_SESSION['d_s'] = $this->start;
        $_SESSION['d_c'] = $this->current_page;
        $_SESSION['d_p_p'] = $this->per_page;
        $_SESSION['d_p'] = $this->pagi;


        $this->sql = "SELECT * FROM product WHERE  b_id='$this->user' AND book_order='1' ";

        $this->record=mysqli_num_rows(mysqli_query($this->con,$this->sql));

        $this->pagi=ceil($this->record/$this->per_page);
    }



    }


?>