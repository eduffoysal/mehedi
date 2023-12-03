<?php
    class User{
        private $table;
        private $con;

        private $id;
        private $full_name;
        private $user_name;
        private $unique_id;
        private $uId;
        private $mess_id;
        private $school_id;
        private $phone;
        private $password;
        private $email;
        private $phone_pass;
        private $u_type;
        private $a_status;
        private $otp;
        private int $last_login;

        function __construct($db_con){
            $this->con = $db_con;
            $this->table = "users";
        }

        function insert($data){
            try{
                $sql = 'INSERT INTO '.$this->table.' (unique_id, user_id, u_name, phone, password, phone_pass, u_type, otp, email) VALUES(?,?,?,?,?,?,?,?,?)';

                $stmt = $this->con->prepare($sql);
                $res = $stmt->execute($data);

                return $res;
            }catch(PDOException $e){
                return 0;
            }
        }

        function unique_user($name){
            try{
                $sql = 'SELECT u_name FROM '. $this->table.' WHERE u_name= ? ';

                $stmt = $this->con->prepare($sql);
                $res = $stmt->execute([$name]);

                if($stmt->rowCount() > 0){
                    return 0;
                }else{
                    return 1;
                }

            }catch(PDOException $e){
                return 0;
            }
        }

        function auth($name, $password){
            try{
                $sql = 'SELECT * FROM '.$this->table.' WHERE u_name = ? OR password = ? ';

                $stmt = $this->con->prepare($sql);
                $res = $stmt->execute([$name,$password]);

                if($stmt->rowCount() == 1){
                    
                    $user = $stmt->fetch();
                    $db_name = $user['u_name'];
                    $db_pass = $user['password'];
                    if($db_name == $name){
                        //password verification condition
                        $this->user_name = $db_name;
                        return 1;

                    }else{
                        return 0;
                    }


                }else{
                    return 0;
                }

            }catch(PDOException $e){
                return 0;
            }
        }

        function getUser(){
            $data = array('id'=>$this->id,
                        'user_name'=>$this->user_name,
                        'email'=>$this->email,
                        'phone'=>$this->phone);

            return $data;
        }

        

    }
?>