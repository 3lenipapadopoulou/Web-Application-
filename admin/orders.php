<?php
include ("../connect.php");
include ("menu.php");

echo "<div class=\"container\">";

$sid=$_SESSION['sid'];
?>

<script>
// AJAX SCRIPT FROM W3SCHOOLS
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("orders").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajax.php?id=<?php echo $sid ?>", true);
  xhttp.send();
}
</script>


<script>
setInterval(function(){ loadDoc(); },1000);
</script>
<div class=container> 
<h2>List of pending Orders</h2>
<div id=orders><div>
	 



</body>
</html>