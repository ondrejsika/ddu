<?php
	// nidb
	// (c) nial group, Ondrej Sika
	
	include "header.php";
	include "log_fce.php";
	
	if (logon())
	{
		include "mysql_conect.php";
		include "header.php";
		include "get.php";
		include "fce.php";
		//vlastni stranka
		include "head.php";
		/*****/
			
	
	if (empty($k))
	{
		// formular
		$jmena = "";
		$ospod = "";
		

		$sql = "SELECT * FROM `ospod` ORDER BY `ospod`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$ospod[]=array($d["id"],$d["jmeno"]);
		}
$sql = "SELECT * FROM `pobyt` WHERE `id` = $id";
		$query = mysql_query($sql, $spojeni);
		$d = mysql_fetch_array($query);
		echo "<form action='upravit_pobyt.php?k=2' method='POST'>
		<input type='hidden' name='id' value='".$d["id"]."'>
			<input type='hidden' name='dite' value='".$d["dite"]."'>
			
			<table width='100%'>
			<tr valign='top'>
			<td width='50%'>
";
for($i = 1;$i<7;$i++){ 
$p = "s$i";
if($d["druh_pobytu"] == $i)
{
	$$p = "SELECTED";
}
else $$p = "";
}
echo "	
			<p>Druh pobytu:
			<br><select name='druh_pobytu'>
			<option value=''></option>
			<option value='1' $s1>Předběžné opatření</option>
			<option value='2' $s2>Ústavní výchova</option>
			<option value='3' $s3>Ochranná výchova</option>
			<option value='4' $s4>Dobrovolný pobyt</option>
			<option value='5' $s5>Rediagnostika</option>
			</select>

			<p>OSPOD:
			<br><select name='ospod'>
			<option value=''></option>";
			
		foreach ($ospod as $value) {
			if($d["ospod"] == $value) $s = "SELECTED";
			else $s = "";
			echo "<option value='".$value[0]."' $s>".$value[1]."</option>"   ;
		}

	echo "
			</select>
			<p>Důvod:
			<br><textarea rows='7' name='duvod' cols='48'>".$d["duvod"]."</textarea>
			<p>Od <input type='text' name='od' value='".$d["od"]."'>
			<p>Do <input type='text' name='do' value='".$d["do"]."'>
			
			</td>
			<td width='50%'>
<p>Nařídil<br><input type='text' size='20' name='naridil' value='".$d["naridil"]."'>
			<p>Vykonavatelnost<br><input type='text' size='20' name='vykonavatelnost' value='".$d["vykonavatelnost"]."'>
<p>Datum rozhodnutí<br><input type='text' size='20' name='datum_rozhodnuti' value='".$d["datum_rozhodnuti"]."'>
			<p>Poslední pobyt<br><input type='text' size='40' name='posledni_pobyt' value='".$d["posledni_pobyt"]."'>
			<p>Poznámka<br><textarea rows='3' name='poznamka' cols='48'>".$d["poznamka"]."</textarea>
			<p><input type='submit' value='ok'>   <input type='reset' value='storno'>
			</td>
			</tr>
			</table></form>
		";
	}
	else
	{
		//zapis do db
		$get=array("id",'dite','druh_pobytu','ospod','duvod','od','do','naridil','vykonavatelnost', 'datum_rozhodnuti', 'posledni_pobyt', 'poznamka');
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}

		$sql = "
			UPDATE `$db`.`pobyt` SET `druh_pobytu` =  '$druh_pobytu',
			`ospod` = '$ospod',
			`duvod` = '$duvod',
			`od` = '$od',
			`do` = '$do',
			`naridil` = '$naridil',
			`vykonovatelnost` = '$vykonavatelnost',
			`datum_rozhodnuti` = '$datum_rozhodnuti',
			`posledni_pobyt` = '$posledni_pobyt',
			`poznamka` = '$poznamka' WHERE `pobyt`.`id` =$id
		";

		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='podrobnosti_pobyt.php?id=$dite'>zpět</a>";
	}
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}
include "footer.php";
?>
