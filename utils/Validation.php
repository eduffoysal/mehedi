<?php
    class Validation{
        static function clean($str){
            $str = trim($str);
            $str = stripcslashes($str);
            $str = htmlspecialchars($str);
            
            return $str;
        }

        static function name($str){
            $name_regex = "/^([a-zA-Z' ])$/";
            if(preg_match($name_regex, $str)){
                return true;
            }else{
                return false;
            }
        }

        static function user_name($str){
            $name_regex = "/^[A-Za-z][A-Za-z0-9]{5,8}$/";
            if(preg_match($name_regex, $str)){
                return true;
            }else{
                return false;
            }
        }

        
        static function email($str){
            // $name_regex = "/^[A-Za-z][A-Za-z0-9]{5,8}$/";
            if(filter_var($str,FILTER_VALIDATE_EMAIL)){
                return true;
            }else{
                return false;
            }
        }

        static function password($str){
            $name_regex = "/^(?=.*?[A-Z})(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&])$/";
            if(preg_match($name_regex,$str)){
                return true;
            }else{
                return false;
            }
        }

        static function validateInput($con, $input){
            return mysqli_real_escape_string($con,$input);          
        }

    }
?>