<?php
include ("../connect.php");
include ("menu.php");

?>
  
<div class="container">


  <div class="form-group">
  <?php
 

$s="select title, sum(total) as p1, count(*) as cnt 
	from orders,
	products where id_p=products.id and id_s=$_SESSION[sid] 
	group by title ";


echo "<h3>Totals per products</h3>";

$q=mysqli_query($conn,$s);
$st=0;
$spl=0;
echo "<table class=table>";
echo "<tr><th>Product</th><th>Num of Orders</th><th>Total(€)</th>";
while ($r=mysqli_fetch_array($q))
{
	echo "<tr><td>$r[title]</td><td>$r[cnt]</td><td>$r[p1]</td>";
	$st=$st+$r['p1'];
	$spl=$spl+$r['cnt'];
	
	
}
echo "<tr style='background-color:#eee;'><th>Totals</th><th>$spl</th><th>$st</th></tr>";
echo "</table>";
?>
  </div>
	
</div>

</body>
</html>