<?php

function getRootUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/');
    
    return "$protocol://$host$uri";
}


$rootUrl = getRootUrl();
echo "Root URL: $rootUrl";
?>
