<?php
include "connect.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html>

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