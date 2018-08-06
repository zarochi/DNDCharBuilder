<html>
<head>
<title>Character manager</title>
</head>
<body>
<?php
session_start();
$userID=$_SESSION['ID'];
$user=$_SESSION['user'];
echo "Welcome ".$user;
?>
<form action="viewcharacters.php" method="post">
<input type="submit" name="submit" value="View Characters">
</form>
<form action="newcharacter.php" method="post">
<input type="submit" name="submit" value="New Character">
</form>
</body>
</html>