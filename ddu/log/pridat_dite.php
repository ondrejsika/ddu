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
			$get=array("rc","jmeno","bydliste","od","skupina","duvod","ospod","cislo_jednaci","naridil","datum_rozhodnuti","odesel_dne","odesel_kam","druh_pobytu","posledni_pobyt","zdravotni_stav","pojistovna","matka","otec","dalsi_kontakty");
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}
	
	if (empty($rc))
	{
		// formular
		$ospod = "";
		$sql = "SELECT * FROM `ospod` ORDER BY `ospod`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$ospod[]=array($d["id"],$d["jmeno"]);
		}
		echo "
			<form action='pridat_dite.php' method='POST'>
			<p>Rodné číslo:
			<br><input type='text' size='20' name='rc' value=''>
			<p>Jméno: 
			<br><input type='text' size='20' name='jmeno' value=''>
			<p>Příjmení:
			<br><input type='text' size='20' name='prijmeni' value=''>
			<p>Adresa
			<br>Ulice:
			<br><input type='text' size='20' name='ulice' value=''>č.p.<input type='text' size='6' name='cp' value=''>
			<br>Město:
			<br><input type='text' size='20' name='mesto' value=''>psč<input type='text' size='7' name='psc' value=''>
			<p>Od: (RR-MM-DD)
			<br><input type='text' size='20' name='od' value=''>
			<p>Skupina:
			<br><input type='text' size='20' name='skupina' value=''>
			<p>Důvod:
			<br><input type='text' size='20' name='duvod' value=''>
			<p>OSPOD:
			<br>
			<select name='ospod'>
			<option value=''></option>";

		foreach ($ospod as $value) {
			echo "<option value='".$value[0]."'>".$value[1]."</option>"   ;
		}
	
		echo "
			</select>
			
			<p>Číslo jednací:
			<br><input type='text' size='20' name='cislo_jednaci' value=''>
			<p>Nařídil:
			<br><input type='text' size='20' name='naridil' value=''>
			<p>Datum rozhodnutí:
			<br><input type='text' size='20' name='datum_rozhodnuti' value=''>
			<p>Odesel dne:  (RR-MM-DD)
			<br><input type='text' size='20' name='odesel_dne' value=''>
			<p>Odesel kam:
			<br><input type='text' size='20' name='odesel_kam' value=''>
			<p>Druh pobytu:
			<br><input type='text' size='20' name='druh_pobytu' value=''>
			<p>Posledni pobyt:
			<br><input type='text' size='20' name='posledni_pobyt' value=''>
			<p>Zdravotní stav:
			<br><input type='text' size='20' name='zdravotni_stav' value=''>
			<p>Pojišťovna:
			<br><input type='text' size='20' name='pojistovna' value=''>
			<p>Matka: (jméno, kontakt)
			<br><input type='text' size='20' name='matka' value=''>
			<p>Otec: (jméno, kontakt)
			<br><input type='text' size='20' name='otec' value=''>
			<p>Další kontakty
			<br><input type='text' size='20' name='dalsi_kontakty' value=''>
			<p><input type='submit' value='ok'>
			</form>
		";
	}
	else
	{
		//zapis do db
		$id = zjisti_id();
		$jmeno = $_POST["prijmeni"] . ", " . $jmeno;
		$bydliste = $_POST["ulice"] . " " . $_POST["cp"] . ", " . $_POST["psc"] . " " . $_POST["mesto"]; 
		$sql = "
			INSERT INTO `$db`.`$tb` VALUES (
			'$id',
			'$rc',
			'$jmeno',
			'$bydliste',
			'$od', 
			'$skupina',
			'$duvod',
			'$ospod',
			'$cislo_jednaci', 
			'$naridil',
			'$datum_rozhodnuti',
			'$odesel_dne',
			'$odesel_kam',
			'$druh_pobytu',
			'$posledni_pobyt',
			'$zdravotni_stav', 
			'$pojistovna',
			'$matka',
			'$otec',
			'$dalsi_kontakty')
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
