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
$sql = "SELECT * FROM `$db`.`$tb`WHERE `id` LIKE $id";
	
	
	$query = mysql_query($sql, $spojeni);
	$d = mysql_fetch_array($query);
	echo "
		<p>Rodné číslo
		<br><b>".$d["rc"]."</b>
		<p>Jméno
		<br><b>".$d["jmeno"]."</b>
		<p>Bydlište
		<br><b>".$d["bydliste"]."</b>
		<p>Od
		<br><b>".$d["od"]."</b>
		<p>Skupina
		<br><b>".$d["skupina"]."</b>
		<p>Důvod
		<br><b>".$d["duvod"]."</b>
		<p>OSPOD
		<br><b>".$d["ospod"]."</b>
		<p>Číslo jednací
		<br><b>".$d["cislo_jednaci"]."</b>
		<p>Nařídil
		<br><b>".$d["naridil"]."</b>
		<p>Datum rozhodnutí
		<br><b>".$d["datum_rozhodnuti"]."</b>
		<p>Odesel dne
		<br><b>".$d["odesel_dne"]."</b>
		<p>Odesel kam
		<br><b>".$d["odesel_kam"]."</b>
		<p>Druh pobytu
		<br><b>".$d["druh_pobytu"]."</b>
		<p>Poslední pobyt
		<br><b>".$d["posledni_pobyt"]."</b>
		<p>Zdravotní stav
		<br><b>".$d["zdravotni_stav"]."</b>
		<p>Pojistovna
		<br><b>".$d["pojistovna"]."</b>
		<p>Matka
		<br><b>".$d["matka"]."</b>
		<p>Otec
		<br><b>".$d["otec"]."</b>
		<p>Další kontakty
		<br><b>".$d["dalsi_kontakty"]."</b>
	";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
