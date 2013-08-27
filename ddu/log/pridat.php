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
		echo "
			<p><a href='pridat_dite.php'>Přidej dítě</a>	
			<br><a href='pridat_fyz_popis.php'>Přidej fyzický popis</a>
			<br><a href='pridat_vstupni_zpravy.php'>Přidej vstupní zprávy</a>
			<br><a href='pridat_naviky.php'>Přidej náviky</a>
			<br><a href='pridat_pobyt.php'>Přidej pobyt</a>
		";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
