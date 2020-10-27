<?php
include ("../connect.php");
include ("menu.php");
?>
<div class="container">
<form action="index.php" method=post>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>
  <button type="submit" class="btn btn-default">Login</button>
</form>
	
	
</div>

</body>
</html>