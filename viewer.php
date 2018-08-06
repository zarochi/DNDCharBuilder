<html>
<head>
<title>Character viewer</title>
<style>
html {height:100%;}
.main {height:100%; width:100%;}
.left {height:70%; width:49%;float:left;}
.right {height:70%; width:49%; float:right;}
.top {height:5%; width:100%;}
.bottom {height:29%; width:100%;position:relative; clear:both;}

.thin {border:solid black 1px;}
.skills {border:solid black 1px; padding-left:2px; padding-right:2px;}
.current {border:solid black 1px; text-aligh: left; padding-bottom: 50px;}
.stam {border:solid black 1px; text-aligh: left; padding-bottom: 50px;}
.thick {border:solid black 3px; padding: 5px;}
.hpwrapper {margin-top:2%;}
.defenses {text-align: center; border: solid black 2px; padding-left: 4px; padding-right: 4px;}
.def {padding-left: 10px;}
</style>
</head>
<body>
<div class='main'>
<?php
include("dbconnection.php");
session_start();
$name=$_POST['choice'];
echo "<div class='top'>";
echo $name;
echo "</div>";
$userID=$_SESSION['ID'];
$query="SELECT lvl,Initiative,Speed,HP,str,dex,con,wis,i,cha,ac,fort,ref,will,baseatk,stam FROM `char` WHERE name='".$name."'";
$results=getData($query);
echo "<div class='left'>";
displayData1($results);
echo "</div>";
$query="SELECT Acrobatics,Arcana,Athletics,Bluff,Diplomacy,Dungeoneering,Endurance,Heal,History,Insight,Intimidate,Nature,Perception,Religion,Stealth,Streetwise,Thievery FROM `char` WHERE name='".$name."'";
$results2=getData($query);
echo "<div class='right'>";
displayData2($results, $results2);
echo "</div>";
echo "<div class='bottom'>";
$fields=array('title','cost','rolls','description');
$labels=array('Title','Stamina cost','Die','Description');
$query="SELECT title,cost,rolls,description FROM `powers` WHERE name='".$name."'";
$results=getData($query);
displayData($results, $fields, $labels);
echo "</div>";

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

function displayData1($results)
{
	$lvl=$results[0]['lvl'];
	$health=$results[0]['HP'];
	$stam=$results[0]['stam'];
	$ac=$results[0]['ac'];
	$fort=$results[0]['fort'];
	$ref=$results[0]['ref'];
	$will=$results[0]['will'];
	$str=$results[0]['str'];
	$strmod=((int)(($results[0]['str']-10)/2));
	$dex=$results[0]['dex'];
	$dexmod=((int)(($results[0]['dex']-10)/2));
	$con=$results[0]['con'];
	$conmod=((int)(($results[0]['con']-10)/2));
	$wis=$results[0]['wis'];
	$wismod=((int)(($results[0]['wis']-10)/2));
	$int=$results[0]['i'];
	$intmod=((int)(($results[0]['i']-10)/2));
	$cha=$results[0]['cha'];
	$chamod=((int)(($results[0]['cha']-10)/2));
	$init=$results[0]['Initiative'];
	$spd=$results[0]['Speed'];
	$atk=$results[0]['baseatk'];
	$basic="2d6+".(int)($results[0]['baseatk']-$results[0]['lvl']);

	echo "Level: ".$lvl;

	echo "<table class='def'>";
	echo "<tr><td class='defenses'>AC<br>".$ac."</td><td class='defenses'>Ref<br>".$ref."</td><td class='defenses'>Fort<br>".$fort."</td><td class='defenses'>Will<br>".$will."</td></tr>";
	echo "</table>";

	echo "</br>";

	echo "<table class='stats'>";
	echo "<tr><td></td><td>Value</td><td>Mod</td></tr>";
	echo "<tr><td>Strength</td><td class='thin'>".$str."</td><td class='thin'>".$strmod."</td></tr>";
	echo "<tr><td>Dexterity</td><td class='thin'>".$dex."</td><td class='thin'>".$dexmod."</td></tr>";
	echo "<tr><td>Constitution</td><td class='thin'>".$con."</td><td class='thin'>".$conmod."</td></tr>";
	echo "<tr><td>Wisdom</td><td class='thin'>".$wis."</td><td class='thin'>".$wismod."</td></tr>";
	echo "<tr><td>Intellegence:</td><td class='thin'>".$int."</td><td class='thin'>".$intmod."</td></tr>";
	echo "<tr><td>Charisma</td><td class='thin'>".$cha."</td><td class='thin'>".$chamod."</td></tr>";
	echo "</table>";

	echo "</br>";

	echo "<table class='attack'>";
	echo "<tr><td class='thick'>Stamina: ".$stam."</td><td class='thick'>Hit bonus: +".$atk."</td><tr>";
	echo "<tr><td class='stam'>Current Stamina:</td><td class='thin'>Basic attack:<br><br><center>".$basic."<center></td></tr>";
	echo "</table>";

	echo "<table class='hpwrapper'>";
	echo "<tr><td class='thick'>Max HP: ".$health."<br>Bloodied (".((int)$health/2).")</td><td class='thick'>Surges: 10<br>Surge Value: ".((int)$health/4)."</td></tr>";
	echo "<tr><td class='current'>Current Health</td></tr>";
	echo "</table>";

	echo "<table>";
	echo "<tr><td><b>Initiative: </b></td><td>".$init."</td></tr><tr><td><b>Speed: </b></td><td>".$spd."</td></tr>";
	echo "</table>";
}

function displayData2($results, $results2)
{
	$str=$results[0]['str'];
	$dex=$results[0]['dex'];
	$con=$results[0]['con'];
	$wis=$results[0]['wis'];
	$int=$results[0]['i'];
	$cha=$results[0]['cha'];
	echo "<p>Skills</p>";
	echo "<hr>";
	echo "<table>";
	echo "<tr><td>Acrobatics:</td><td>".(int)(((int)$results2[0]['Acrobatics'])+(($dex-10)/2))."</td></tr>";
	echo "<tr><td>Arcana:</td><td>".(int)(((int)$results2[0]['Arcana'])+(($int-10)/2))."</td></tr>";
	echo "<tr><td>Athletics:</td><td>".(int)(((int)$results2[0]['Athletics'])+(($str-10)/2))."</td></tr>";
	echo "<tr><td>Bluff:</td><td>".(int)(((int)$results2[0]['Bluff'])+(($cha-10)/2))."</td></tr>";
	echo "<tr><td>Diplomacy:</td><td>".(int)(((int)$results2[0]['Diplomacy'])+(($cha-10)/2))."</td></tr>";
	echo "<tr><td>Dungeoneering:</td><td>".(int)(((int)$results2[0]['Dungeoneering'])+(($wis-10)/2))."</td></tr>";
	echo "<tr><td>Endurance:</td><td>".(int)(((int)$results2[0]['Endurance'])+(($con-10)/2))."</td></tr>";
	echo "<tr><td>Heal:</td><td>".(int)(((int)$results2[0]['Heal'])+(($wis-10)/2))."</td></tr>";
	echo "<tr><td>History:</td><td>".(int)(((int)$results2[0]['History'])+(($int-10)/2))."</td></tr>";
	echo "<tr><td>Insight:</td><td>".(int)(((int)$results2[0]['Insight'])+(($wis-10)/2))."</td></tr>";
	echo "<tr><td>Intimidate:</td><td>".(int)(((int)$results2[0]['Intimidate'])+(($cha-10)/2))."</td></tr>";
	echo "<tr><td>Nature:</td><td>".(int)(((int)$results2[0]['Nature'])+(($wis-10)/2))."</td></tr>";
	echo "<tr><td>Perception:</td><td>".(int)(((int)$results2[0]['Perception'])+(($wis-10)/2))."</td></tr>";
	echo "<tr><td>Religion:</td><td>".(int)(((int)$results2[0]['Religion'])+(($int-10)/2))."</td></tr>";
	echo "<tr><td>Stealth:</td><td>".(int)(((int)$results2[0]['Stealth'])+(($dex-10)/2))."</td></tr>";
	echo "<tr><td>Streetwise:</td><td>".(int)(((int)$results2[0]['Streetwise'])+(($cha-10)/2))."</td></tr>";
	echo "<tr><td>Thievery:</td><td>".(int)(((int)$results2[0]['Thievery'])+(($dex-10)/2))."</td></tr>";
	echo "</table>";
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
?>
</div>
</body>
</html>