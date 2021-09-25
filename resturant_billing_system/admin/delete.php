<?php
include "connect.php";
$name=$_GET["name"];
mysqli_query($link,"delete from food where name='$name'");
header("location:item_details.php");
?>