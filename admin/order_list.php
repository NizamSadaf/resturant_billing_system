<?php
include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
  body 
  {
    font-family: 'Comic Neue', cursive;
  }

	table,th,td
	{
       border: 1px solid black;
       text-align: center;
    }
    table
    {
    	width: 100%;
    }
</style>
<body>
<?php
$date=date("d-m-y");
echo "<table>";
echo "<tr>";
echo "<th>"; echo "ID"; echo "</th>";
echo "<th>"; echo "Items"; echo "</th>";
echo "<th>"; echo "Status"; echo "</th>";
echo "</tr>";
$qry1=mysqli_query($link,"select * from customer where date='$date'");
while($row1=mysqli_fetch_array($qry1))
{
	$id=$row1["id"];
	echo "<tr>";
	echo "<td>"; echo $id; echo "</td>";
	echo "<td>";
	$qry2=mysqli_query($link,"select * from order_list where order_id='$id'");
      while($row2=mysqli_fetch_array($qry2))
      {
      	$fname=$row2["name"];
      	$type=$row2["type"];
      	$qty=$row2["quantity"];
      	echo $fname."(".$type.")"."(".$qty.")".",";      
      }
      echo "</td>";
      echo "<td>"; 
      ?>
      <a href="served.php?id=<?php echo $id ?>">SERVED</a>
      <?php
      echo "</td>";
      echo "</tr>";
      
}
echo "</table>"
?>
</body>
</html>