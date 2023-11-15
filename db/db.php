<?php

    date_default_timezone_set("Asia/Dhaka");
    $today=date("Y-m-d");
    $time= date("h:i:s");

    $con = new mysqli("localhost","root","","mehedi") or die(mysqli_error());

    $list=array();
    $month = date("m");
    $year = date("Y");
    $today = date("Y-m-d");
    $totalDay = date('t');
    $curm = date('m', strtotime('-1'));
    $cury = date('Y', strtotime('-1'));
    $curd = date('d', strtotime('-1'));
              
    for($d=1; $d<=$totalDay; $d++)
    {
        $time=mktime(12, 0, 0, $curm, $d, $cury);          
        if (date('m', $time)==$curm)       
            $list[]=date('Y-m-d', $time);
       
    } 

    $uni_id = strtoupper(bin2hex(random_bytes(3)));
    $r_id = rand(time(), 100000000);
    
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $url = "https://";   
    else  
    $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
$urlm = "https://";   
else  
$urlm = "http://";   
// Append the host(domain name, ip) to the URL.   
$urlm.= $_SERVER['HTTP_HOST'];   

// Append the requested resource location to the URL   
// $urlm.= $_SERVER['REQUEST_URI'];  

function base(){
    echo str_replace("h.php","",$_SERVER['PHP_SELF']);
}

// $URLS = explode("/",$_SERVER['QUERY_STRING']);

// if(file_exists($URLS[0]."php")){
    // require_once($URLS[0]."php");
// }else{
    // require_once("404.php");
// }
?>
