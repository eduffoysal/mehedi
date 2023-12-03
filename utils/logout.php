<?php
    session_start();
    include("Util.php");

    session_unset();
    session_destroy();

    Util::redirect("../", "logout", "Your Logged Out");
?>