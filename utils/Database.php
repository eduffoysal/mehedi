<?php
    class Database{
        private $host = "localhost";
        private $db_name = "secondhome";
        private $u_name = "root";
        private $pass = "";
        private $con;

        public function connect(){
            $this->con == null;
            try{
                $this->con = new PDO('mysql:host='.$this->host. ';dbname='.$this->db_name, $this->u_name, $this->pass);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $e){
                echo "Connection Error! : ".$e->getMessage();
            }

            return $this->con;
        }
    }
?>