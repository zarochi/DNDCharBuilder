<html>
<head>
<title>View Characters</title>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
</head>
<body>
<?php
include("dbconnection.php");
session_start();
$userID=$_SESSION['ID'];
$fields=array('name','lvl','Initiative','Speed', 'HP', 'str','dex','con','wis','i','cha');
$labels=array('Name','Level','Initiative','Speed','Health','Strength','Dexterity','Constitution','Wisdom','Intellegence','Charisma');
$query="SELECT name,lvl,Initiative,Speed,HP,str,dex,con,wis,i,cha FROM `char` WHERE ID=".$userID;
$results=getData($query);
displayData($results, $fields, $labels);
function getData($query)
{
	global $db;
	try
	{
		$statement=$db->query($query);
		$results=$statement->fetchAll();
	}
	catch(PDOException $e)
	{
		print "Error: ".$e->getMessage()."</br>";
		die();
	}
	return $results;
}

function displayData($results, $fields, $labels)
{
	echo "<table>";
	echo "<tr>";
	for ($i=0;$i<count($labels);$i++)
		echo "<td><b>".$labels[$i]."</b></td>";
	echo "</tr>";
	for ($x=0;$x<count($results);$x++)
	{
		echo "<tr>";
		for ($y=0;$y<count($fields);$y++)
			echo "<td>".$results[$x][$fields[$y]]."</td>";
		echo "<td><form action='viewer.php' method='post'><button type='submit' name='choice' value='".$results[$x][0]."'class='view'>View full sheet</button></form></td>";
		echo "<td><form action='leveler.php' method='post'><button type='submit' name='choice' value='".$results[$x][0]."'class='view'>Level up</button></form></td>";
		echo "</tr>";
	}
	echo "</table>";
}
?>
</body>
</html>