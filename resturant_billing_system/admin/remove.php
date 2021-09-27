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
$date=date('d-m-y');
mysqli_query($link,"delete from order_list where name='$name' && order_id='$id'");

?>
<script type="text/javascript">
	alert("Item Removed");
	window.location="order.php";
</script>

</body>
</html>>
