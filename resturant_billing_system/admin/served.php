<?php
include "connect.php";
session_start();
$id=$_GET["id"];
mysqli_query($link,"delete from order_list where order_id='$id'");
header("location:order_list.php");
?>