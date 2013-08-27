<?php

function zjisti_id()
{ // BEGIN function pocet_radku
	$spojeni = $GLOBALS["spojeni"];
	$db = $GLOBALS["db"];
	$tb = $GLOBALS["tb"];
	$sql = "SELECT * FROM `$db`.`$tb` ORDER BY `$tb`.`id` DESC LIMIT 1";
	$vysledek = mysql_query($sql, $spojeni);
	$pocet = mysql_fetch_array($vysledek);
	return $pocet["id"] + 1;
} // END function pocet_radku

function zjisti_jmeno($id)
{ // BEGIN function pocet_radku
	$spojeni = $GLOBALS["spojeni"];
	$db = $GLOBALS["db"];
	$tb = $GLOBALS["tb"];
	$sql = "SELECT * FROM `$db`.`$tb` WHERE `id` LIKE '$id' LIMIT 1";
	$vysledek = mysql_query($sql, $spojeni);
	$pocet = mysql_fetch_array($vysledek);
	return $pocet["jmeno"];
} // END function pocet_radku

function id($tb)
{ // BEGIN function pocet_radku
	$spojeni = $GLOBALS["spojeni"];
	$db = $GLOBALS["db"];
	$sql = "SELECT * FROM `$db`.`$tb` ORDER BY `$tb`.`id` DESC LIMIT 1";
	$vysledek = mysql_query($sql, $spojeni);
	$pocet = mysql_fetch_array($vysledek);
	return $pocet["id"] + 1;
} // END function pocet_radku

function select($hodnoty,$nazvy,$name){
	echo "
		<select name='$name'>
		<option value=''></option>
	";
	$i = 0;
	foreach ($hodnoty as $value) {
		echo "<option value='".$value."'>".$nazvy[$i]."</option>"   ;
	}
	$i++;
	echo "</select>";	
}

function datum($name,$sekce){
	if ($sekce == 0){
		$opt_d = "";
		for($i=1;$i<32;$i++){
			$opt_d = $opt_d."<option value='$i'>$i</option>";
		}
		$opt_m = "";
		for($i=1;$i<13;$i++){
			$opt_m = $opt_m."<option value='$i'>$i</option>";
		}		
		$return = "
			<select name='".$name."_d'>
			<option value=''></option>
			$opt_d
			</select>
			<select name='".$name."_m'>
			<option value=''></option>
			$opt_m
			</select>
			<input type='text' name='".$name."_r' size='5'>
		";return $return;
	}
	else
	{
		$return = $_POST[$name."_d"] .".". $_POST[$name."_m"] . "." .$_POST[$name."_r"] ;
	}
	return $return;
}

function narozen($rc){
	
}

function deti()
{
	global $spojeni;
	global $tb;
	$sql = "SELECT * FROM `$tb` ORDER BY `$tb`.`jmeno` ASC";
	$query = mysql_query($sql, $spojeni);
	while($d = mysql_fetch_array($query))
	{
		$deti[]=array($d["id"],$d["jmeno"]);
	}
	return $deti;
}
function ospod()
{
	global $spojeni;
	$sql = "SELECT * FROM `ospod` ORDER BY `ospod`.`jmeno` ASC";
	$query = mysql_query($sql, $spojeni);
	while($d = mysql_fetch_array($query))
	{
		$ospod[]=array($d["id"],$d["jmeno"]);
	}
	return $ospod;
}
function fd($name)
{
	$opt_d = "";
for($i=1;$i<32;$i++){
	$opt_d = $opt_d."<option value='$i'>$i</option>";
}
$opt_m = "";
for($i=1;$i<13;$i++){
	$opt_m = $opt_m."<option value='$i'>$i</option>";
}		
$return = "
	<select name='".$name."_d'>
	<option value=''></option>
	$opt_d
	</select>
	<select name='".$name."_m'>
	<option value=''></option>
	$opt_m
	</select>
	<input type='text' name='".$name."_r' size='5'>
";
return $return;
}
?>
