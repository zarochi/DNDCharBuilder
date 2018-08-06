<html>
<head>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
</head>
<body>
<?php
include("dbconnection.php");
session_start();
$userID=$_SESSION['ID'];
$name=$_POST['name'];
$str=$_POST['str'];
$dex=$_POST['dex'];
$con=$_POST['con'];
$wis=$_POST['wis'];
$i=$_POST['i'];
$cha=$_POST['cha'];
$acro=$_POST['acro'];
$arc=$_POST['arc'];
$ath=$_POST['ath'];
$blu=$_POST['blu'];
$dip=$_POST['dip'];
$dun=$_POST['dun'];
$end=$_POST['end'];
$he=$_POST['he'];
$his=$_POST['his'];
$ins=$_POST['ins'];
$int=$_POST['int'];
$nat=$_POST['nat'];
$per=$_POST['per'];
$rel=$_POST['rel'];
$ste=$_POST['ste'];
$stre=$_POST['st'];
$the=$_POST['the'];
$hppl=$_POST['hppl'];
$hp=(int)($hppl+(($con-10)/2));
$ac=10+(($dex-10)/2);
$fort=10+(($con-10)/2);
$ref=10+(($dex-10)/2);
$will=10+(($wis-10)/2);
$lvl=1;
if ($str>=$dex)
	$baseatk=(int)((($str-10)/2)+$lvl);
else if ($dex>$str)
	$baseatk=(int)((($dex-10)/2)+$lvl);
$init=(($dex-10)/2)+$lvl;
$spd=6;
$stam=100;

$pw1t=$_POST['pw1t'];
$pw1c=$_POST['pw1c'];
$pw1r=$_POST['pw1r'];
$pw1d=$_POST['pw1d'];
$pw2t=$_POST['pw2t'];
$pw2c=$_POST['pw2c'];
$pw2r=$_POST['pw2r'];
$pw2d=$_POST['pw2d'];
$pw3t=$_POST['pw3t'];
$pw3c=$_POST['pw3c'];
$pw3r=$_POST['pw3r'];
$pw3d=$_POST['pw3d'];
$pw4t=$_POST['pw4t'];
$pw4c=$_POST['pw4c'];
$pw4r=$_POST['pw4r'];
$pw4d=$_POST['pw4d'];

$query="INSERT INTO `char` (`name`,`lvl`,`Initiative`,`Speed`,`HP`,`str`,`dex`,`con`,`wis`,`i`,`cha`,`ID`,`Acrobatics`,`Arcana`,`Athletics`,`Bluff`,`Diplomacy`,`Dungeoneering`,`Endurance`,`Heal`,`History`,`Insight`,`Intimidate`,`Nature`,`Perception`,`Religion`,`Stealth`,`Streetwise`,`Thievery`,`ac`,`fort`,`ref`,`will`,`baseatk`,`hppl`,`stam`) VALUES (\"".$name."\",".$lvl.",".$init.",".$spd.",".$hp.",".$str.",".$dex.",".$con.",".$wis.",".$i.",".$cha.",".$userID.",".$acro.",".$arc.",".$ath.",".$blu.",".$dip.",".$dun.",".$end.",".$he.",".$his.",".$ins.",".$int.",".$nat.",".$per.",".$rel.",".$ste.",".$stre.",".$the.",".$ac.",".$fort.",".$ref.",".$will.",".$baseatk.",".$hppl.",".$stam.")";
$results=getData($query);
$query="INSERT INTO `powers` (`name`,`title`,`cost`,`rolls`,`description`) VALUES (\"".$name."\",'".$pw1t."','".$pw1c."','".$pw1r."','".$pw1d."')";
$results=getData($query);
$query="INSERT INTO `powers` (`name`,`title`,`cost`,`rolls`,`description`) VALUES (\"".$name."\",'".$pw2t."','".$pw2c."','".$pw2r."','".$pw2d."')";
$results=getData($query);
$query="INSERT INTO `powers` (`name`,`title`,`cost`,`rolls`,`description`) VALUES (\"".$name."\",'".$pw3t."','".$pw3c."','".$pw3r."','".$pw3d."')";
$results=getData($query);
$query="INSERT INTO `powers` (`name`,`title`,`cost`,`rolls`,`description`) VALUES (\"".$name."\",'".$pw4t."','".$pw4c."','".$pw4r."','".$pw4d."')";
$results=getData($query);
echo "Character created";
function getData($query)
{
	global $db;
	try
	{
		$statement=$db->query($query);
	}
	catch(PDOException $e)
	{
		print "Error: ".$e->getMessage()."</br>";
		die();
	}
}

?>
</br>
<button type="button" id="return">Return to Character Manager</button>
<script>
$(document).ready(function(){
$("#return").click(function(){
document.location.href = "editor.php";
});
});
</script>
</body>
</html>