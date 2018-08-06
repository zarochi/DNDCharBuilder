<html>
<head>
<title>New Character</title>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<style>
.main {width:100%;}
.left {float:left; width:49%;}
.right {float:right; width:49%;}
</style>
</head>
<body>
<div class="main">
<form method="post" action="createcharacter.php">
<table class="left">
<tr><td>Character Name:</td><td><input type="text" name="name"></td></tr>
<tr><td>Strength:</td><td><button type="button" class="add">+</button><button type="button" class="rem">-</button><input type="text" name="str" id="str" value="20" class="txt" readonly></td></tr>
<tr><td>Dexterity:</td><td><button type="button" class="add">+</button><button type="button" class="rem">-</button><input type="text" name="dex" id="dex" value="20" class="txt" readonly></td></tr>
<tr><td>Constitution:</td><td><button type="button" class="add">+</button><button type="button" class="rem">-</button><input type="text" name="con" id="con" value="20" class="txt" readonly></td></tr>
<tr><td>Wisdom:</td><td><button type="button" class="add">+</button><button type="button" class="rem">-</button><input type="text" name="wis" id="wis" value="20" class="txt" readonly></td></tr>
<tr><td>Intellegence:</td><td><button type="button" class="add">+</button><button type="button" class="rem">-</button><input type="text" name="i" id="int" value="20" class="txt" readonly></td></tr>
<tr><td>Charisma:</td><td><button type="button" class="add">+</button><button type="button" class="rem">-</button><input type="text" name="cha" id="cha" value="20" class="txt" readonly></td></tr>
<tr><td>Points available:</td><td><input id="pts" type="text" name="pts" value="20" readonly></td></tr>
<tr><td>HP per level (DM decision)</td><td><input type="text" name="hppl" value="0"></td></tr>
<tr><td>Power1:</td><td>Title</td><td><input type="text" name="pw1t"></td></tr>
<tr><td></td><td>Stamina</td><td><input type="text" name="pw1c"></td></tr>
<tr><td></td><td>Dice</td><td><input type="text" name="pw1r"></td></tr>
<tr><td></td><td>Description</td><td><input type="text" name="pw1d"></td></tr>
<tr><td>Power2:</td><td>Title</td><td><input type="text" name="pw2t"></td></tr>
<tr><td></td><td>Stamina</td><td><input type="text" name="pw2c"></td></tr>
<tr><td></td><td>Dice</td><td><input type="text" name="pw2r"></td></tr>
<tr><td></td><td>Description</td><td><input type="text" name="pw2d"></td></tr>
<tr><td>Power3:</td><td>Title</td><td><input type="text" name="pw3t"></td></tr>
<tr><td></td><td>Stamina</td><td><input type="text" name="pw3c"></td></tr>
<tr><td></td><td>Dice</td><td><input type="text" name="pw3r"></td></tr>
<tr><td></td><td>Description</td><td><input type="text" name="pw3d"></td></tr>
<tr><td>Power4:</td><td>Title</td><td><input type="text" name="pw4t"></td></tr>
<tr><td></td><td>Stamina</td><td><input type="text" name="pw4c"></td></tr>
<tr><td></td><td>Dice</td><td><input type="text" name="pw4r"></td></tr>
<tr><td></td><td>Description</td><td><input type="text" name="pw4d"></td></tr>
</table>
<table class="right">
<tr><td>Acrobatics:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="acro" class="t" readonly></td></tr>
<tr><td>Arcana:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="arc" class="t" readonly></td></tr>
<tr><td>Athletics:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="ath" class="t" readonly></td></tr>
<tr><td>Bluff:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="blu" class="t" readonly></td></tr>
<tr><td>Diplomacy:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="dip" class="t" readonly></td></tr>
<tr><td>Dungeoneering:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="dun" class="t" readonly></td></tr>
<tr><td>Endurance:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="end" class="t" readonly></td></tr>
<tr><td>Heal:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="he" class="t" readonly></td></tr>
<tr><td>History:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="his" class="t" readonly></td></tr>
<tr><td>Insight:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="ins" class="t" readonly></td></tr>
<tr><td>Intimidate:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="int" class="t" readonly></td></tr>
<tr><td>Nature:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="nat" class="t" readonly></td></tr>
<tr><td>Perception:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="per" class="t" readonly></td></tr>
<tr><td>Religion:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="rel" class="t" readonly></td></tr>
<tr><td>Stealth:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="ste" class="t" readonly></td></tr>
<tr><td>Streetwise:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="st" class="t" readonly></td></tr>
<tr><td>Thievery:</td><td><button type="button" class="a">+</button><button type="button" class="r">-</button><input value="0" type="text" name="the" class="t" readonly></td></tr>
<tr><td>Available Points:</td><td><input type="text" id="p" value="20" readonly></td></tr>
<tr><td><input type="submit" name="submit" formaction="createcharacter.php" value="Create Character"></td></tr>
</table>
</form>
<script>
$(document).ready(function(){
$(".left").on("click", ".add", function(){
var pts=parseInt($("#pts").val());
var value=parseInt($(this).parent().find(".txt").val());
if (value>=30)
	alert("Stat is at max value");
else if (pts>0)
{
	value++;
	pts--;
	$("#pts").val(pts);
	$(this).parent().find(".txt").val(value);
}
else
	alert("Not enough points");
});
$(".left").on("click", ".rem", function(){
var pts=parseInt($("#pts").val());
var value=parseInt($(this).parent().find(".txt").val());
if (pts<20&&value>20)
{
	value--;
	pts++;
	$("#pts").val(pts);
	$(this).parent().find(".txt").val(value);
}
else
	alert("Points are full or stat is at its lowest");
});

$(".right").on("click", ".a", function(){
var pts=parseInt($("#p").val());
var value=parseInt($(this).parent().find(".t").val());
if (value>=10)
	alert("Stat is at max value");
else if (pts>0)
{
	value++;
	pts--;
	$("#p").val(pts);
	$(this).parent().find(".t").val(value);
}
else
	alert("Not enough points");
});
$(".right").on("click", ".r", function(){
var pts=parseInt($("#p").val());
var value=parseInt($(this).parent().find(".t").val());
if (pts<20&&value>0)
{
	value--;
	pts++;
	$("#p").val(pts);
	$(this).parent().find(".t").val(value);
}
else
	alert("Points are full or stat is at its lowest");
});

});
</script>
</div>
</body>
</html>
