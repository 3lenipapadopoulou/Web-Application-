<?php
include ("../connect.php");
include ("menu.php");

if (isset($_POST['idsp']))
{
	
	mysqli_query($conn,"update sh_pr set Quant='$_POST[qnt]' where id=$_POST[idsp]");
}

?>
  
<div class="container">


<h2>List of Quantities of Products:</h2> 
<table class=table>
<tr><th>Product</th><th>Quant</th><th></th></tr>
 <?php

 
$s="select *,sh_pr.id as idsp from sh_pr, products where id_p=products.id and id_s=$_SESSION[sid]";
 $q=mysqli_query($conn,$s);
 

  while ($r=mysqli_fetch_array($q))
 {
	 echo "
	 
	 <form action='' method=post>
	 <input type=hidden name='idsp' value=$r[idsp]>
	 <tr><td>$r[title]</td><td><input type=number name=qnt value='$r[Quant]'> </td>
	<td><input type='submit' name=sv class='btn btn-default' value='Save'></td></tr>
	 </form>
	 ";
 }

?> 
 </table>
</div>

</body>
</html>
