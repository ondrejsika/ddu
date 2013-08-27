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
			$get=array('dite','druh_pobytu','ospod','duvod','od','do','naridil','vykonavatelnost', 'datum_rozhodnuti', 'posledni_pobyt', 'poznamka');
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}
	
	if (empty($dite))
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

		echo "<form action='pridat_pobyt.php' method='POST'>
		<p>Jméno:
			<br><select name='dite'>
			<option value=''></option>
";
		foreach ($jmena as $value) {
			echo "<option value='".$value[0]."'>".$value[1]."</option>"   ;
		}
	
		echo "
			</select>
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
			<p>Od<br><input type='text' size='20' name='od'>
			<p>Do<br><input type='text' size='20' name='do'>
			<p>Nařídil<br><input type='text' size='20' name='naridil'>
			<p>Vykonavatelnost<br><input type='text' size='20' name='vykonavatelnost'>
			<p>Datum rozhodnutí<br><input type='text' size='20' name='datum_rozhodnuti'>
			<p>Poslední pobyt<br><input type='text' size='40' name='posledni_pobyt'>
			<p>Poznímka<br><textarea rows='3' name='poznamka' cols='48'></textarea>
			<p><input type='submit' value='ok'>   <input type='reset' value='storno'>
			</form>
		";
	}
	else
	{
		//zapis do db
		$id = id("pobyt");

		$sql = "
			INSERT INTO `$db`.`pobyt` VALUES (
			'$id','$dite','$druh_pobytu','$ospod','$duvod','$od','$do','$naridil','$vykonavatelnost', '$datum_rozhodnuti', '$posledni_pobyt', '$poznamka')
		";

		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
	}
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
