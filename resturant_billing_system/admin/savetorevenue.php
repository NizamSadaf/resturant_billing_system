<?php
include "connect.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Billing System</title>
</head>
<body>
<?php
$total=$_SESSION['total'];

$date=date('d-m-y');
mysqli_query($link,"insert into revenue values ('$date','$total')");

?>
<script type="text/javascript">
	
	window.location="order_id.php";
</script>

</body>
</html>
