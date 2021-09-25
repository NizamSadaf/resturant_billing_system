<?php
include "connect.php";

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Billing System</title>
</head>
<style type="text/css">
	form
  {
    margin:30%;
    margin-top: 15%; 
  }
input
{
  width: 100%;
  height:30px;
  margin-top:5px; 
}
label
{
	margin-bottom: 3px;
}
input[type="text"]
{
	font-size: 20px;
	text-align: center;
	margin-bottom: 5px;
}

</style>
<body>
<form action="" method="post">
	<label>Order Id
		<input type="text" name="id">
	</label>
	<label>Customer Name
		<input type="text" name="name">
	</label>
	<label>Phone
		<input type="text" name="phone">
	</label>
	<label>Date
		<input type="text" name="date" value="<?php echo date('y-m-d')?>">
	</label>
	
	<input type="submit" name="submit" value="Submit">
</form>
<?php
if(isset($_POST["submit"])){
	
$_SESSION["id"]=$_POST["id"];
$_SESSION["dt"]=date('y-m-d');
mysqli_query($link,"insert into customer values('$_POST[id]','$_POST[name]','$_POST[phone]','$_POST[date]')");
header("location:order.php");
}
?>
</body>
</html>