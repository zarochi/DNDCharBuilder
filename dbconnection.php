<?php
$user='fiesam19';
$pass='amfKMD4evr';
$dbs='mysql:host=127.0.0.1;dbname=characters';
try
{
$db=new PDO($dbs, $user, $pass);
}
catch(PDOException $e)
{
print "Error!: ".$e->getMessage()."</br>";
die();
}
?>