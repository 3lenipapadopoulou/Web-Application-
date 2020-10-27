<?php
header("Content-type: text/xml");
?>
<?xml version="1.0" encoding="UTF-8"?>
<xml>
 <header>
	<transaction>
		<period month="<?php echo $_POST['mo'] ?>" year="<?php echo $_POST['ye'] ?>"/>
	</transaction>
	</header>
	<body>
	<employees>
<?php
include ("connect.php");

	$q=mysqli_query($conn,"select * from users");
	
	while ($r=mysqli_fetch_array($q))
	{
		
		if ($r['type_user']=='manager')
		{	
			$q2=mysqli_query($conn,"select * from shop where id_user=$r[id]");
			$r2=mysqli_fetch_array($q2);
		
			$q3=mysqli_query($conn,"select sum(total) as t from orders where id_s=$r2[id] 
				and month(date1)= $_POST[mo] and year(date1)=$_POST[ye]");
				
			$r3=mysqli_fetch_array($q3);
			
			$sal=800+$r3['t']*0.02;
		}
		else
		{
		
			$q2=mysqli_query($conn,"select sum(dst) as t from orders where id_u=$r[id] 
			and month(date1)= $_POST[mo] and year(date1)=$_POST[ye]");
			$r2=mysqli_fetch_array($q3);
			
			$sal=40*25+$r2['t']*0.10/1000;
		}
		
		echo "
		<employee>
				<firstName>$r[fname]</firstName>
				<lastName>$r[lname]</lastName>
				<amka>$r[AMKA]</amka>
				<afm>$r[AFM]</afm>
				<iban>$r[IBAN]</iban>
				<ammount>$sal</ammount>
		</employee>";

	}
?>
 </employees>
 </body>
</xml>