<?php
include ("../connect.php");

$s="select *, orders.id as ids from orders,products where 
products.id=orders.id_p and 
id_s=$_GET[id] and state<>'1'";

$q=mysqli_query($conn,$s);
echo "<table class=table>";
echo "<tr><th>OrderId</th><th>Product</th><th>Quantity</th><th>Total(€)</th></tr>";
while($r=mysqli_fetch_array($q))
{


	echo "<tr><td>$r[id]</td><td> $r[title]</td><td> $r[Qnt]</td><td>$r[total] </td></tr>";
	
}

echo "</table>";

?>
