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
		include "fce/podrobnosti_fyz_popis.fce.php";
	$sql = "SELECT * FROM `$db`.`vstupni_zpravy` WHERE `id` LIKE $id";
	
	
	$query = mysql_query($sql, $spojeni);
	if (mysql_num_rows($query) != 0){
		while($d = mysql_fetch_array($query)){
		$date = date("j/m/Y H:i:s", $d["time"]);
		echo "
			<p><b>".$d["nazev"]."</b>
			<br>Autor: <b>".$d["user"]."</b>
			<br>Datum zadání: $date
			<br>Zpráva
			<br>".$d["zprava"]."
		
		";
		}
		
		}
		else 
		{
		echo "V databázi nejsou žádné vstupní zprávy";
		}
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
