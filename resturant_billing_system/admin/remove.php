<?php
include "connect.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$name=$_GET["name"];
$id=$_SESSION["id"];
mysqli_query($link,"delete from order_list where name='$name' && order_id='$id'");
mysqli_query($link,"delete from revenue where fname='$name' && order_id='$id'");
?>
<script type="text/javascript">
	alert("Item Removed");
	window.location="order.php";
</script>

</body>
</html>>
