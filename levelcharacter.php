<html>
<head>
<style>
html {height:100%;}
.main {height:100%; width:100%;}
.left {height:100%; width:49%;float:left;}
.right {height:100%; width:49%; float:right;}
</style>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="main">
<?php
include("dbconnection.php");
session_start();
$name=$_POST['choice'];
$stat=$_POST['stat'];
$skills=$_POST['skill'];
$raisedstat="";
$level=getData("Select lvl FROM `char` WHERE name='".$name."'");
$hp=getData("Select HP FROM `char` WHERE name='".$name."'");
$hppl=getData("Select hppl FROM `char` WHERE name='".$name."'");

$level=(int)$level[0]['lvl'];
$hp=(int)$hp[0]['HP'];
$hppl=(int)$hppl[0]['hppl'];

$str=getData("Select str FROM `char` WHERE name='".$name."'");
$dex=getData("Select dex FROM `char` WHERE name='".$name."'");
$con=getData("Select con FROM `char` WHERE name='".$name."'");
$wis=getData("Select wis FROM `char` WHERE name='".$name."'");
$i=getData("Select i FROM `char` WHERE name='".$name."'");
$cha=getData("Select cha FROM `char` WHERE name='".$name."'");

$str=(int)$str[0]['str'];
$dex=(int)$dex[0]['dex'];
$con=(int)$con[0]['con'];
$i=(int)$i[0]['i'];
$wis=(int)$wis[0]['wis'];
$cha=(int)$cha[0]['cha'];

$stam=getData("Select stam FROM `char` WHERE name='".$name."'");
$stam=(int)$stam[0]['stam'];

$acrobatics=getData("Select Acrobatics FROM `char` WHERE name='".$name."'");
$arcana=getData("Select Arcana FROM `char` WHERE name='".$name."'");
$athletics=getData("Select Athletics FROM `char` WHERE name='".$name."'");
$bluff=getData("Select Bluff FROM `char` WHERE name='".$name."'");
$diplomacy=getData("Select Diplomacy FROM `char` WHERE name='".$name."'");
$dungeoneering=getData("Select Dungeoneering FROM `char` WHERE name='".$name."'");
$endurance=getData("Select Endurance FROM `char` WHERE name='".$name."'");
$heal=getData("Select Heal FROM `char` WHERE name='".$name."'");
$history=getData("Select History FROM `char` WHERE name='".$name."'");
$insight=getData("Select Insight FROM `char` WHERE name='".$name."'");
$intimidate=getData("Select Intimidate FROM `char` WHERE name='".$name."'");
$nature=getData("Select Nature FROM `char` WHERE name='".$name."'");
$perception=getData("Select Perception FROM `char` WHERE name='".$name."'");
$religion=getData("Select Religion FROM `char` WHERE name='".$name."'");
$stealth=getData("Select Stealth FROM `char` WHERE name='".$name."'");
$streetwise=getData("Select Streetwise FROM `char` WHERE name='".$name."'");
$thievery=getData("Select Thievery FROM `char` WHERE name='".$name."'");

$acrobatics=(int)$acrobatics[0]['Acrobatics'];
$arcana=(int)$arcana[0]['Arcana'];
$athletics=(int)$athletics[0]['Athletics'];
$bluff=(int)$bluff[0]['Bluff'];
$diplomacy=(int)$diplomacy[0]['Diplomacy'];
$dungeoneering=(int)$dungeoneering[0]['Dungeoneering'];
$endurance=(int)$endurance[0]['Endurance'];
$heal=(int)$heal[0]['Heal'];
$history=(int)$history[0]['History'];
$insight=(int)$insight[0]['Insight'];
$intimidate=(int)$intimidate[0]['Intimidate'];
$nature=(int)$nature[0]['Nature'];
$perception=(int)$perception[0]['Perception'];
$religion=(int)$religion[0]['Religion'];
$stealth=(int)$stealth[0]['Stealth'];
$streetwise=(int)$streetwise[0]['Streetwise'];
$thievery=(int)$thievery[0]['Thievery'];

$oldacrobatics=$acrobatics;
$oldarcana=$arcana;
$oldathletics=$athletics;
$oldbluff=$bluff;
$olddiplomacy=$diplomacy;
$olddungeoneering=$dungeoneering;
$oldendurance=$endurance;
$oldheal=$heal;
$oldhistory=$history;
$oldinsight=$insight;
$oldintimidate=$intimidate;
$oldnature=$nature;
$oldperception=$perception;
$oldreligion=$religion;
$oldstealth=$stealth;
$oldstreetwise=$streetwise;
$oldthievery=$thievery;
$pwt=$_POST['pwt'];
$pwc=$_POST['pwc'];
$pwr=$_POST['pwr'];
$pwd=$_POST['pwd'];
for ($x=0;$x<count($skills);$x++)
{
		if ($skills[$x]=="Acrobatics")
			$acrobatics++;
		if ($skills[$x]=="Arcana")
			$arcana++;
		if ($skills[$x]=="Athletics")
			$athletics++;
		if ($skills[$x]=="Bluff")
			$bluff++;
		if ($skills[$x]=="Diplomacy")
			$diplomacy++;
		if ($skills[$x]=="Dungeoneering")
			$dungeoneering++;
		if ($skills[$x]=="Endurance")
			$endurance++;
		if ($skills[$x]=="Heal")
			$heal++;
		if ($skills[$x]=="History")
			$history++;
		if ($skills[$x]=="Insight")
			$insight++;
		if ($skills[$x]=="Intimidate")
			$intimidate++;
		if ($skills[$x]=="Nature")
			$nature++;
		if ($skills[$x]=="Perception")
			$perception++;
		if ($skills[$x]=="Religion")
			$religion++;
		if ($skills[$x]=="Stealth")
			$stealth++;
		if ($skills[$x]=="Streetwise")
			$streetwise++;
		if ($skills[$x]=="Thievery")
			$thievery++;
}

if ($stat=="str")
{
	$raisedstat="Strength";
	$str=(int)$str+1;
}
if ($stat=="dex")
{
	$raisedstat="Dexterity";
	$dex=(int)$dex+1;
}
if ($stat=="con")
{
	$raisedstat="Constitution";
	$con=(int)$con+1;
}
if ($stat=="wis")
{
	$raisedstat="Wisdom";
	$wis=(int)$wis+1;
}
if ($stat=="i")
{
	$raisedstat="Intellegence";
	$i=(int)$i+1;
}
if ($stat=="cha")
{
	$raisedstat="Charisma";
	$cha=(int)$cha+1;
}

//begin stat changes
$level=((int)$level)+1;
$hp=($hp)+($hppl+(($con-10)/2));
$ac=10+(($dex-10)/2);
$fort=10+(($con-10)/2);
$ref=10+(($dex-10)/2);
$will=10+(($wis-10)/2);
$stam=(int)$stam+5;
if ($str>=$dex)
	$baseatk=(int)((($str-10)/2)+$level);
else if ($dex>$str)
	$baseatk=(int)((($dex-10)/2)+$level);
$init=(($dex-10)/2)+$level;
//end stat changes

/*echo "<div class='left'>";
echo "Name: ".$name;
echo "</br>";
echo "Stat raised: ".$raisedstat;
echo "<table>";
echo "<tr><td>New Power:</td></tr>";
echo "<tr><td>Title</td><td>".$pwt."</td></tr>";
echo "<tr><td>Cost</td><td>".$pwc."</td></tr>";
echo "<tr><td>Roll</td><td>".$pwr."</td></tr>";
echo "<tr><td>Description</td><td>".$pwd."</td></tr>";
echo "</table>";
echo "</div>";

echo "<div class='right'>";
echo "<table>";
echo "<tr><td>Skill</td><td>Old</td><td>New<td></tr>";
echo "<tr><td>Acrobatics</td><td>".$oldacrobatics."</td><td>".$acrobatics."</td></tr>";
echo "<tr><td>Arcana</td><td>".$oldarcana."</td><td>".$arcana."</td></tr>";
echo "<tr><td>Athletics</td><td>".$oldathletics."</td><td>".$athletics."</td></tr>";
echo "<tr><td>Bluff</td><td>".$oldbluff."</td><td>".$bluff."</td></tr>";
echo "<tr><td>Diplomacy</td><td>".$olddiplomacy."</td><td>".$diplomacy."</td></tr>";
echo "<tr><td>Dungeoneering</td><td>".$olddungeoneering."</td><td>".$dungeoneering."</td></tr>";
echo "<tr><td>Endurance</td><td>".$oldendurance."</td><td>".$endurance."</td></tr>";
echo "<tr><td>Heal</td><td>".$oldheal."</td><td>".$heal."</td></tr>";
echo "<tr><td>History</td><td>".$oldhistory."</td><td>".$history."</td></tr>";
echo "<tr><td>Insight</td><td>".$oldinsight."</td><td>".$insight."</td></tr>";
echo "<tr><td>Intimidate</td><td>".$oldintimidate."</td><td>".$intimidate."</td></tr>";
echo "<tr><td>Nature</td><td>".$oldnature."</td><td>".$nature."</td></tr>";
echo "<tr><td>Perception</td><td>".$oldperception."</td><td>".$perception."</td></tr>";
echo "<tr><td>Religion</td><td>".$oldreligion."</td><td>".$religion."</td></tr>";
echo "<tr><td>Stealth</td><td>".$oldstealth."</td><td>".$stealth."</td></tr>";
echo "<tr><td>Streetwise</td><td>".$oldstreetwise."</td><td>".$streetwise."</td></tr>";
echo "<tr><td>Thievery</td><td>".$oldthievery."</td><td>".$thievery."</td></tr>";
echo "</table>";
echo "</div>";*/

//save
$query="UPDATE `char` SET `lvl`=".$level.", `Initiative`=".$init.", `HP`=".$hp.", `str`=".$str.", `dex`=".$dex.", `con`=".$con.", `wis`=".$wis.", `i`=".$i.", `cha`=".$cha.", `Acrobatics`=".$acrobatics.", `Arcana`=".$arcana.", `Athletics`=".$athletics.", `Bluff`=".$bluff.", `Diplomacy`=".$diplomacy.", `Dungeoneering`=".$dungeoneering.", `Endurance`=".$endurance.", `Heal`=".$heal.", `History`=".$history.", `Insight`=".$insight.", `Intimidate`=".$intimidate.", `Nature`=".$nature.", `Perception`=".$perception.", `Religion`=".$religion.", `Stealth`=".$stealth.", `Streetwise`=".$streetwise.", `Thievery`=".$thievery.", `ac`=".$ac.", `fort`=".$fort.", `ref`=".$ref.", `will`=".$will.", `baseatk`=".$baseatk.", `stam`=".$stam." WHERE name='".$name."'";
$results=getData($query);
$query="INSERT INTO `powers` (`name`,`title`,`cost`,`rolls`,`description`) VALUES (\"".$name."\",'".$pwt."','".$pwc."','".$pwr."','".$pwd."')";
$results=getData($query);
//end save

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
?>
</br>
<p>Leveling complete</p>
<button type="button" id="return">Return to Character Manager</button>
<script>
$(document).ready(function(){
$("#return").click(function(){
document.location.href = "editor.php";
});
});
</script>
</div>
</body>
</html>