<?php
$db_src    = "mysql:host=localhost;dbname=myforum";
$db_user   = "root";
$db_pass   = "";


$connect = new PDO($db_src, $db_user, $db_pass);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
