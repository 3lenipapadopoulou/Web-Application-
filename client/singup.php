<?php
include ("../connect.php");
include ("menu.php");
?>
<div class="container">

<?php
if(isset($_POST['email']))
{
	$sql="INSERT INTO client(id,email,password,phone) 
			VALUES (NULL ,  '$_POST[email]',  '$_POST[pwd]',  '$_POST[phone]');";
	
	if(mysqli_query($conn,$sql))
		echo "<h1>You have a new account. Try to Login!</h1>";
	else
		echo "<p>Error. This Account Exists </p>";
	
	
	die();
	
}


?>
</div>


<div class="container">
	<form action="" method="post">
	  <div class="form-group">
		<label for="email">Email:</label>
		<input type="email" class="form-control" id="email" name="email" required>
	  </div>
	  <div class="form-group">
		<label for="pwd">Password:</label>
		<input type="password" class="form-control" id="pwd" name="pwd" required>
	  </div>
	  <div class="form-group">
		<label for="phone">Phone:</label>
		<input type="text" class="form-control" id="phone" name="phone" required>
	  </div>
	 
	  <button type="submit" class="btn btn-default">SingUP</button>
	</form>	
</div>

</body>
</html>

</body>
</html>