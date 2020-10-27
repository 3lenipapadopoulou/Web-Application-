<form action='xml.php' method=post>
Month=<select name=mo>
<?php
for ($i=1;$i<=12;$i++)
	echo "<option>$i</option>";
?>
</select><br>
Year=<select name=ye>
<?php
for ($i=2017;$i<=2020;$i++)
	echo "<option>$i</option>";
?>
</select><br>

<input type=submit value='Get XML'>


</form>