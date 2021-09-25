<?php
include "connect.php";
session_start();
$id=$_SESSION["id"];
$dt=$_SESSION["dt"];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
form
  {
    margin-left: 25%;
    margin-top: 30%; 
    width: 100%;
  }
input
{
  width: 100%;
  height:30px;
  margin-top:5px; 
}
input[type="text"]
{
  width: 99%;
  height:25px;
  margin-top:5px; 

}
select
{
  width: 100%;
  height:30px;
  margin-top:5px; 

}
.container1
{
  float: left;
  margin-bottom: 500px;
  
}
.container2
{
  float: right;
  margin-right: 120px;
  margin-top: 120px;
  background-color: #a83238;
  color: #fff;
  padding: 10px;
}
td,th
{
  text-align: center;
  
}
pre
{
  font-size: 1.5em;
  margin-left: 20px;

}
a
{
  outline: none;
  text-decoration: none;
  color: #3234a8;
}
a:hover
{
  color: #fff;
}
</style>
<body>
  <div class="col-md-10 offset=md-1">
  <div class="container1">
    <div class="row">
      <div class="col-md-4">
        <form action="" method="post">
   <select name="name">
  <?php
  $query=mysqli_query($link,"select * from food");
  while($row=mysqli_fetch_array($query))
  {
    $name=$row["name"];
    ?>
    <option value="<?php echo $name;?>"><?php echo $name;?></option>
    <?php
  }
  ?>
  </select>
    <select name="type">
      <option value="half">Half</option>
      <option value="full">Full</option>
    </select>
    <select name="qty">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>
  
  <input type="submit" name="submit" value="ORDER">
  <input type="submit" name="show" value="TOTAL">
</form>
      </div>
       </div>
  </div>

<?php
if(isset($_POST["submit"]))
{
	$name=$_POST["name"];
	$qty=$_POST["qty"];
	$type=$_POST["type"];
	$date=date('y-m-d');
	$query=mysqli_query($link,"select * from food where name='$name'");
	$row=mysqli_fetch_array($query);
    if($type=='half')
    {
    	$price1=$row["half_price"];
    	$total=$qty*$price1;
    	//mysqli_query($link,"insert into order_list values('$id','$name','$type','$qty','$total')");
    }
    else
    {
    	$price2=$row["full_price"];
    	$total=$qty*$price2;
    	//mysqli_query($link,"insert into order_list values('$id','$name','$qty','$total')");
    }
    $date=date('y-m-d');
	mysqli_query($link,"insert into order_list values('$id','$name','$type','$qty','$total','$date')");
	mysqli_query($link,"insert into revenue values ('$id','$name','$date','$total')");
	header("location:order.php");
}
?>
<?php

if(isset($_POST["show"]))
{
	
  $qry=mysqli_query($link,"select sum(total) as total from order_list where order_id='$id' and date='$dt'");
  $row=mysqli_fetch_array($qry);
  echo "<div class='container2'>";
  echo "<div class='row'>";
   echo "<div class='col-md-5'>";
  echo "<table>";
  echo "<tr>";
  echo "<th>"; echo "Food Name"; echo "</th>";
  echo "<th>"; echo "Type"; echo "</th>";
  echo "<th>"; echo "Quantity"; echo "</th>";
  echo "<th>"; echo "Price"; echo "</th>";
  echo "<th>"; echo "Remove"; echo "</th>";
  echo "</tr>";
  $qry1=mysqli_query($link,"select * from order_list where order_id='$id'");
  while($row1=mysqli_fetch_array($qry1))
  {
    echo "<tr>";
    echo "<td>"; echo $row1["name"]; echo "</td>";
    echo "<td>"; echo $row1["type"]; echo "</td>";
    echo "<td>"; echo $row1["quantity"]; echo "</td>";
    echo "<td>"; echo $row1["total"]; echo "</td>";
    echo "<td>";?><a href="remove.php?name=<?php echo $row1["name"]?>">Remove</a><?php echo "</td>";
    echo "</tr>";
  }
  echo "<tr>";
  echo "<td>";?><pre>Total <?php echo $row["total"];?></pre><?php  echo "</td>";
  echo "</tr>";
  echo "</table>";
  echo "</div>";
  echo "</div>";
  echo "</div>";
}
?>
</div>
</body>
</html>