<?php
include "Validation.php";
include "Util.php";
include "Database.php";
include "../Modals/User.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = Validation::clean($_POST['name']);
        $user_name = Validation::clean($_POST['username']);

        $data = "name=".$name."&username=".$user_name;
        if(!Validation::name($name)){
            $em = "Invalid Full Name!";
            Util::redirect("../home.php","error",$em,$data);
        }else if(!Validation::user_name($user_name)){
            $em = "Invalid User Name!";
            Util::redirect("../home.php","error",$em,$data);
        }else{
            $db = new Database();
            $con = $db->connect();

            $user = new User($con);
            $dataa = [$name,$user_name];
            $res = $user->insert($dataa);

            if($res){
                $sm = "Successfully inserted";
                Util::redirect("../home.php","success",$sm,$data);
            }else{
                $em = "An error occurred";
                Util::redirect("../home.php","error",$em,$data);
            }

        }

    }else{
        $em = "An error occurred";
        Util::redirect("../home.php","error",$em,$data);
    }
?>