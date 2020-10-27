<?php
include ("../connect.php");
include ("menu.php");

if (isset($_POST['state']))
{
	if ($_POST['state']=='Be Active')
		mysqli_query($conn,"update users set state=1 where id=$_SESSION[uid]");
	else
		mysqli_query($conn,"update users set state=0 where id=$_SESSION[uid]");
}
?>
  
<div class="container">

<form action="" method=post>
  <div class="form-group">
	<?php
		$q=mysqli_query($conn,"select * from users where id=$_SESSION[uid]");
		$r=mysqli_fetch_array($q);
		
		if($r['state']==0) 
				echo "Your state is InActive. <input type=submit value='Be Active' name=state> ";
		
		if($r['state']==1) 
				echo "Your state is Active. <input type=submit value='Be InActive' name=state>";
		
	
	?>
	
  </div>
</form>
	
</div>

</body>
</html>