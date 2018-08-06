<?php
include("dbconnection.php");
$user=$_POST['user'];
$pass=$_POST['pass'];
$fields=array('Username','pass','ID');
$labels=array('Username','password','ID');
$query='SELECT Username, pass, ID FROM users';
$results=getData($query);
auth($results);
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
		echo "</tr>";
	}
	echo "</table>";
}
function auth($results)
{
	session_start();
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$accepted=false;
	$index=-1;
	for ($x=0;$x<count($results);$x++)
	{
		if (($user==$results[$x][0]) and ($pass==$results[$x][1]))
		{
			$accepted=true;
			$index=$x;
		}
	}
	if ($accepted)
	{
		echo "User authenticated";
		$_SESSION['user']=$user;
		$_SESSION['ID']=$results[$index][2];
		header("Location: editor.php");
	}
	else
		echo "Incorrect login info";
}
?>