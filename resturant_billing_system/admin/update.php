<?php
include "connect.php";
$name=$_GET["name"];
?>
<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
    	window.history.forward();
    </script>
	<title>Restaurant Billing System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<style type="text/css">
	body 
  {
    font-family: 'Comic Neue', cursive;
 
  }

	form
	{
		margin-top: 20%;
	    margin-left: 25%;

	}
label,input
{
	width:500px;
}

</style>
<body>
	<?php
	$query=mysqli_query($link,"select * from food where name='$name'");
	$row=mysqli_fetch_array($query);
	$fname=$row["name"];
	$half_price=$row["half_price"];
	$full_price=$row["full_price"];
	?>
<form method="post">
	<label for="fname">Food Name<br>
	<input type="text" name="fname" value="<?php echo $fname ?>"><br>
</label>
<label for="price">Half Price<br>
	<input type="text" name="half_price" value="<?php echo $half_price ?>"><br>
</label>
<label for="price">Full Price<br>
	<input type="text" name="full_price" value="<?php echo $full_price ?>"><br>
</label>

<input type="submit" name="update" value="UPDATE">
</form>
<?php
if(isset($_POST["update"]))
{
	mysqli_query($link,"update food set name='$_POST[fname]',half_price='$_POST[half_price]',full_price='$_POST[full_price]' where name='$name'");
	?>
	<script type="text/javascript">
		alert("Item Updated Successfully");
		window.location="item_details.php";
	</script>
	<?php
}
?>
</body>
</html>
