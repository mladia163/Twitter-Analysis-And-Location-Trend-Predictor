<?php






?>


<html>
<body>
<form action = "one.php" method="POST">
<input type="hidden" value="1" name="loc">
<input type="submit" value="Delhi">
</form>
<form action = "one.php" method="POST">
<input type="hidden" value="2" name="loc">
<input type="submit" value="Gujrat">
</form>
<form action = "one.php" method="POST">
<input type="hidden" value="3" name="loc">
<input type="submit" value="MP">
</form>
<form action = "one.php" method="POST">
<input type="hidden" value="4" name="loc">
<input type="submit" value="South">
</form>	


<form action = "two.php" method="POST">
<input type="hidden" value="1" name="loc">
<input type="submit" value="Graph Delhi">
</form>
<form action = "two.php" method="POST">
<input type="hidden" value="2" name="loc">
<input type="submit" value="Graph Gujrat">
</form>
<form action = "two.php" method="POST">
<input type="hidden" value="3" name="loc">
<input type="submit" value="Graph MP">
</form>
<form action = "two.php" method="POST">
<input type="hidden" value="4" name="loc">
<input type="submit" value="Graph south">
</form>




<form action = "../user_tweets/tweet_fetch_one_user.php" method="POST">
<input type="text" name="users">
<input type="submit" value="User Details Fetch For location">
</form>


</body>
</html>
