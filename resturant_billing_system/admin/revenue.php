<?php
include "connect.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	form
	{
		margin-top: 20%;
	    margin-left: 33%;

	}
label,input
{
	width:500px;
}

#price
{
	font-size: 50px;
}
</style>
<body>
	<?php
if(isset($_POST["submit"])){
	$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$query=mysqli_query($link,"SELECT sum(amount) from revenue where date BETWEEN '$sdate' AND '$edate'");
$row=mysqli_fetch_array($query);
?>
<center>
<div id="price">
	<p>Your Revenue is <b><?php echo $row["sum(amount)"]; ?></b> Taka</p>
</div>
</center>
<?php
}
?>
	<form method="post">
		<label>From
		<input type="text" name="sdate" placeholder="dd-mm-yy">
	</label>
	<label>To
		<input type="text" name="edate" placeholder="dd-mm-yy">
	</label>
		<input type="submit" name="submit" value="Submit">
	</form>

</body>
</html>
