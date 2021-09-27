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
	body 
  {
    font-family: 'Comic Neue', cursive;
 
  }

  .dropdown-btn {
  
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 50%;
  
  cursor: pointer;
  outline: none;
  text-align: center;
}
.active {
  background-color: green;
  color: white;
}
.dropdown-container {
  display: none;
  background-color: #fff;
  padding-left: 8px;
}
.dropdown-container a
{
  border:none;
  outline: none;
  text-decoration: none;
}
.dropdown-container a:hover
{
  color: #e32727;
  background-color:#4960e3;
}
.fa-caret-down {
  float: right;
  padding-right: 8px;
  margin-top: 6px;
  margin-left: 5px;
}
table
{
	width: 100%;
	text-align: center;
  margin-top: 15px;
}
.btn
{
	width: 50%;
}
.dropdown-btn
{
	background-color: #34ebb1;
	color: #fff;
}
</style>
<body>
<?php
 echo "<table>";
 echo "<tr>";
 echo "<th>"; echo "Food Name"; echo "</th>";
 echo "<th>"; echo "Half Price"; echo "</th>";
 echo "<th>"; echo "Full Price"; echo "</th>";
 echo "<th>"; echo "Status"; echo "</th>";
 echo "</tr>";
$query=mysqli_query($link,"select * from food");
while($row=mysqli_fetch_array($query))
{
	echo "<tr>";
	echo "<td>"; echo $row["name"]; echo "</td>";
	echo "<td>"; echo $row["half_price"]; echo "</td>";
	echo "<td>"; echo $row["full_price"]; echo "</td>"; 
	$status=$row["status"];
     if($status=='Available'){
	echo "<td>"; 
	
	?>
	<button class="btn btn-success"><?php echo $row["status"]?></button>
	<?php echo "</td>";}
	else {
	echo "<td>";
	
	?>
	<button class="btn btn-danger"><?php echo $row["status"]?></button>
	<?php
	echo "</td>";}
	echo "<td>";
	?>	
<button class="dropdown-btn">Edit
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="delete.php?name=<?php echo $row["name"]?>">Delete</a><br>
    <a href="update.php?name=<?php echo $row["name"]?>">Update</a><br>
    <a href="available.php?name=<?php echo $row["name"]?>">Available</a><br>
        <a href="unavailable.php?name=<?php echo $row["name"]?>">Unavailable</a>
  </div>
		<?php echo "</td>";
	echo "</tr>";
}
echo "</table>";
?>
<script type="text/javascript">
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}

</script>
</body>
</html>