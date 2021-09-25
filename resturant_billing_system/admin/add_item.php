<?php
include "connect.php";

?>
<!DOCTYPE html>
<html>
<head>
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
<form method="post">
	<label for="fname">Food Name<br>
	<input type="text" name="fname" required=""><br>
</label>
<label for="price">Half Price<br>
	<input type="text" name="half_price" required=""><br>
</label>
<label for="price">Full Price<br>
	<input type="text" name="full_price" required=""><br>
</label>

<input type="submit" name="submit" value="submit">
</form>
<?php
if(isset($_POST["submit"]))
{
	mysqli_query($link,"insert into food values('$_POST[fname]','$_POST[half_price]','$_POST[full_price]','Available')");
}
?>
</body>
</html>