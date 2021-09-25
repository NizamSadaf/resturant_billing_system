<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	form
  {
    margin:30%;
    margin-top: 10%; 
  }
  label
{
	margin-bottom: 3px;
}
input
{
  width: 100%;
  height:30px;
  margin-top:5px; 
}
input[type="text"]
{
	font-size: 20px;
	text-align: center;
	margin-bottom: 5px;
}
input[type="submit"]
{
   width:101%;
   height:30px;
   font-size: 20px;
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
$query=mysqli_query($link,"SELECT sum(total) from revenue where date BETWEEN '$sdate' AND '$edate'");
$row=mysqli_fetch_array($query);
?>
<center>
<div id="price">
	<p>Your Revenue is <b><?php echo $row["sum(total)"]; ?></b> Taka</p>
</div>
</center>
<?php
}
?>
	<form method="post">
		<label>From
		<input type="text" name="sdate">
	</label>
	<label>To
		<input type="text" name="edate">
	</label>
		<input type="submit" name="submit" value="Submit">
	</form>

</body>
</html>
