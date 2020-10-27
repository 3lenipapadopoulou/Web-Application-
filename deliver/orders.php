<?php
include ("../connect.php");
include ("menu.php");

echo "<div class=\"container\">";
if (isset($_POST['OK']))
{
	
	$q= mysqli_query($conn,"select * from orders where id=$_POST[idp]");
	$r=mysqli_fetch_array($q);
	
	mysqli_query($conn,"update sh_pr set Quant=Quant-$r[Qnt] where id_s=$r[id_s] and id_p=$r[id_p]");
	mysqli_query($conn,"update orders set state='1' where id=$_POST[idp]");
	
	
}


?>


<div class=container> 
<h2>List of Pending Orders</h2>


<div>
<?php
$s="select * , orders.id as ido from orders,products where products.id=orders.id_p and id_u=$_SESSION[uid] and state<>'1'";

echo "<table class=table>";
echo "<tr><th>OrderId</th><th>Product</th><th>Quantity</th><th>Total Cost(€)</th><th>Details</th></tr>";

$q=mysqli_query($conn,$s);
while($r=mysqli_fetch_array($q))
{

		echo "<form action='' method=post>
		
		<input type='hidden' name=idp value='$r[ido]'>
		<tr><td>$r[ido]</td><td> $r[title]</td><td> $r[Qnt]</td><td>$r[total]</td>
		<td>$r[addr]<br>Coords: $r[lat] $r[lng]</td><td><input type=submit value='I delivered' name='OK'></td></tr>
	<form>";

	
	
}
echo "</table>";
?>

<div>
</body>
</html>