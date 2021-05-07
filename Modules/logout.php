<?php
session_start();
session_destroy();
header('./Admin/login.php');
//header("location:./../Admin/login");
?>