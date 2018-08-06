<html>
<head>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<title>Character leveler</title>
<style>
html {height:100%;}
.main {height:100%; width:100%;}
.left {height:100%; width:49%;float:left;}
.right {height:100%; width:49%; float:right;}
</style>
</head>
<body>
<div class='main'>
<div class='left'>
<form method="post" action="levelcharacter.php">
<table>
<tr><td>Pick one:</td></tr>
<tr><td><input type="radio" name='stat' value='str'></td><td>Strength</td></tr>
<tr><td><input type="radio" name='stat' value='dex'></td><td>Dexterity</td></tr>
<tr><td><input type="radio" name='stat' value='con'></td><td>Constitution</td></tr>
<tr><td><input type="radio" name='stat' value='wis'></td><td>Wisdom</td></tr>
<tr><td><input type="radio" name='stat' value='i'></td><td>Intellegence</td></tr>
<tr><td><input type="radio" name='stat' value='cha'></td><td>Charisma</td></tr>
<tr><td>New power:</td><td></td><td></td></tr>
<tr><td></td><td>Title</td><td><input type="text" name="pwt"></td></tr>
<tr><td></td><td>Stamina</td><td><input type="text" name="pwc"></td></tr>
<tr><td></td><td>Dice</td><td><input type="text" name="pwr"></td></tr>
<tr><td></td><td>Description</td><td><input type="text" name="pwd"></td></tr>
</table>
</div>
<div class='right'>
<table>
<tr><td>Pick 4:</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Acrobatics"></td><td>Acrobatics</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Arcana"></td><td>Arcana</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Athletics"></td><td>Athletics</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Bluff"></td><td>Bluff</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Diplomacy"></td><td>Diplomacy</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Dungeoneering"></td><td>Dungeoneering</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Endurance"></td><td>Endurance</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Heal"></td><td>Heal</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="History"></td><td>History</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Insight"></td><td>Insight</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Intimidate"></td><td>Intimidate</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Nature"></td><td>Nature</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Perception"></td><td>Perception</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Religion"></td><td>Religion</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Stealth"></td><td>Stealth</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Streetwise"></td><td>Streetwise</td></tr>
<tr><td><input type='checkbox' class='skill' name="skill[]" value="Thievery"></td><td>Thievery</td></tr>
</table>
<?php
session_start();
$name=$_POST['choice'];
echo "<button type='submit' name='choice' value='".$name."'>Level Me</button>";
?>
</form>
<script type="text/javascript">
jQuery(function(){
    var max = 4;
    var checkboxes = $('input[type="checkbox"]');

    checkboxes.change(function(){
        var current = checkboxes.filter(':checked').length;
        checkboxes.filter(':not(:checked)').prop('disabled', current >= max);
    });
});
</script>
</div>
</div>
</body>
</html>