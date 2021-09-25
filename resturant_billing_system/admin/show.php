<?php
include 'connect.php';
session_start();
$id=$_SESSION["id"];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$qry=mysqli_query($link,"select sum(total) as total from order_list where order_id='$id'");
	$row=mysqli_fetch_array($qry);
  echo "<table>";
  echo "<tr>";
  echo "<th>"; echo "Food Name"; echo "</th>";
  echo "<th>"; echo "Type"; echo "</th>";
  echo "<th>"; echo "Quantity"; echo "</th>";
  echo "<th>"; echo "Price"; echo "</th>";
  echo "</tr>";
  $qry1=mysqli_query($link,"select * from order_list where order_id='$id'");
  while($row1=mysqli_fetch_array($qry1))
  {
    echo "<tr>";
    echo "<td>"; echo $row1["name"]; echo "</td>";
    echo "<td>"; echo $row1["type"]; echo "</td>";
    echo "<td>"; echo $row1["quantity"]; echo "</td>";
    echo "<td>"; echo $row1["total"]; echo "</td>";
    echo "</tr>";
  }
  echo "<tr>";
  echo "<td>";?><b>Total</b><?php echo $row["total"]; echo "</td>";
  echo "</tr>";
  echo "</table>";
?>
</body>
</html>