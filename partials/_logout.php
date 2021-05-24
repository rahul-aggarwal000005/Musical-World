<?php
    session_start();
    echo "logging you out please wait....";
    session_destroy();
    header("location: /dbms/");
    exit();
?>