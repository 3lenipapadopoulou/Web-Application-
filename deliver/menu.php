<?php
if(isset($_POST['username']))
{
	
	$sql="SELECT * FROM  users WHERE  username =  '$_POST[username]' AND  password =  '$_POST[pwd]' and type_user='delivery'";
	$res=mysqli_query($conn,$sql);
	if (mysqli_num_rows($res)>0)
	{
		$row=mysqli_fetch_array($res);
		$_SESSION['uid']=$row['id'];
	
	}

	
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Del</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Delivery</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
 <?php

if (@$_SESSION['uid']!='')
{
?>


		<li><a href="setstate.php">Set State</a></li>
		<li><a href="place.php">Place</a></li>
		<li><a href="orders.php">Show Orders</a></li>

<?php
}


?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
 		<?php
if (@$_SESSION['uid']=='')
{
	echo "
	<li><a href='login.php'>Login</a></li>";
	}
	else
		echo "<li><a href='logout.php'>Logout</a></li>";
	
		
?>
        
      </ul>
    </div>
  </div>
</nav>

