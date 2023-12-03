<?php
    session_start();
    include("../Modals/User.php");
    include("../db/db.php");
    include("Database.php");
    include("Util.php");

    Class Session{

        private $session = false;
        private $logged_in = false;
        private $user_data = array();

        private $row;
        private $user;
        private $con;
        private $role;

        public function __construct(){
            $db = new Database();
            $this->con = $db->connect();
            $this->user = new User($this->con);

            $this->isLogged();
        }

        public function isLogged(){
            if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]==true){
                return 1;
            }else{
                return 0;
            }
        }

        public function isLoggedIn(){
            if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]==true){
                $this->logged_in = true;
            }else{
                $this->logged_in = false;
                Util::redirect("../","login","You are Logged Out! Please, Log in First");
            }
        }

        public function isRole($role){
            if(isset($_SESSION["role"]) && $_SESSION["role"]==$role){
                return $this;
            }else{
                $this->logout();
            }
        }

        public function logout(){
            session_unset();
            session_destroy();
        
            Util::redirect("../", "logout", "Your Logged Out");
        }

        public function setUserSession($user){
            $this->user = $user;
            $this->logged_in = true;
            $this->user_data = $user;
            $this->row = $user;

            if($user['u_type']!=''){
                if($user['u_type'] == '0'){
                    $this->role = 'customer';
                }else if($user['u_type'] == '1'){
                    $this->role = 'admin';
                }else{
                    $this->role = '';
                    Util::redirect("../","login","You are Logged Out! Please, Log in First");

                }

            }else{

                Util::redirect("../","login","You are Logged Out! Please, Log in First");
                return;
            }

            $_SESSION['user']=$user['unique_id'];
			$_SESSION['user_id']=$user['user_id'];
			$_SESSION['unique_id']=$user['unique_id'];
			$_SESSION['user_phone']=$user['phone'];
            $_SESSION['mess_id'] = $user['mess_id'];
			$_SESSION['school_id'] = $user['school_id'];
			
			$_SESSION['logged_in'] = true;
			$_SESSION['row'] = $user;


            $_SESSION['user_data'] = array('id'=>$user['id'],
                                        'unique_id'=>$user['unique_id'],
                                        'u_name'=>$user['u_name'],
                                        'phone'=>$user['phone'],
                                        'email'=>$user['email'],
                                        'phone_pass'=>$user['phone_pass'],
                                        'u_type'=>$user['u_type'],
                                        'mess_id'=>$user['mess_id'],
                                        'school_id'=>$user['school_id'],
                                        'user_id'=>$user['user_id']);

        }

    }

?>