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
include "podrobnosti_menu.php";
			$get=array('dite','druh_pobytu','ospod','duvod','od','do','naridil','vykonavatelnost', 'datum_rozhodnuti', 'posledni_pobyt', 'poznamka');
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}
	
	if (empty($k))
	{
		// formular
		$jmena = "";
		$ospod = "";
		$sql = "SELECT * FROM `$tb` ORDER BY `$tb`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$jmena[]=array($d["id"],$d["jmeno"]);
		}
		$sql = "SELECT * FROM `ospod` ORDER BY `ospod`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$ospod[]=array($d["id"],$d["jmeno"]);
		}

		echo "<form action='pridat_pobyt.php?id=$id&k=2' method='POST'>
		
			
			
			<table width='100%'>
			<tr valign='top'>
			<td width='50%'>

			<p>Druh pobytu:
			<br><select name='druh_pobytu'>
			<option value=''></option>
			<option value='1'>Předběžné opatření</option>
			<option value='2'>Ústavní výchova</option>
			<option value='3'>Ochranná výchova</option>
			<option value='4'>Dobrovolný pobyt</option>
			<option value='5'>Rediagnostika</option>
			</select>

			<p>OSPOD:
			<br><select name='ospod'>
			<option value=''></option>";
			
		foreach ($ospod as $value) {
			echo "<option value='".$value[0]."'>".$value[1]."</option>"   ;
		}

	echo "
			</select>
			<p>Důvod:
			<br><textarea rows='7' name='duvod' cols='48'></textarea>
			<p>Od";/////////
			$name = "od";
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
		";echo $return . "
			<p>Do";/////////
			$name = "do";
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
		";echo $return . "
			
			</td>
			<td width='50%'>
<p>Nařídil<br><input type='text' size='20' name='naridil'>
			<p>Vykonavatelnost<br><input type='text' size='20' name='vykonavatelnost'>
<p>Datum rozhodnutí<br><input type='text' size='20' name='datum_rozhodnuti'>
			<p>Poslední pobyt<br><input type='text' size='40' name='posledni_pobyt'>
			<p>Poznámka<br><textarea rows='3' name='poznamka' cols='48'></textarea>
			<p><input type='submit' value='ok'>   <input type='reset' value='storno'>
			</td>
			</tr>
			</table></form>
		";
	}
	else
	{
		//zapis do db
		

		$sql = "
			INSERT INTO `$db`.`pobyt` VALUES (
			'".id("pobyt")."',
'$dite_id',
'$druh_pobytu',
'$ospod',
'$duvod',
'".datum("od",1)."',
'".datum("do",1)."',
'$naridil',
'$vykonavatelnost', 
'$datum_rozhodnuti', 
'$posledni_pobyt', 
'$poznamka')
		";

		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='podrobnosti_pobyt.php?id=$id'>zpět</a>";
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
