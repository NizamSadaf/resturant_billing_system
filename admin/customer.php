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
	table,th,td
	{
       border: 1px solid black;
       text-align: center;
    }
    table
    {
    	width: 70%;
        margin-left: 25%;
        margin-top: 15px;
    }
</style>
<body>
<!---<form method="post">
	<input type="text" name="search">
</form>--->
<?php
echo "<table>";
echo "<tr>";
echo "<th>"; echo "Name"; echo "</th>";
echo "<th>"; echo "Phone"; echo "</th>";
echo "<th>"; echo "Date"; echo "</th>";
echo "</tr>";
$sql=mysqli_query($link,"select * from customer");
while($row=mysqli_fetch_array($sql))
{
	echo "<tr>";
    	echo "<td>"; echo $row["name"]; echo "</td>";
    	echo "<td>"; echo $row["phone"]; echo "</td>";
    	echo "<td>"; echo $row["date"]; echo "</td>"; 
    echo "</tr>";
}
echo "</table>";
?>

</body>
</html>