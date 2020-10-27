<?php
include ("../connect.php");
include ("menu.php");
?>
<div class="container">


<form action="index.php" method=post>

  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="loginemail">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>


</div>
</body>
</html>