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
				<a href='seznam.php'>Zobrazit</a> 
				<br><a href='search.php'>Vyhledávání</a>
				<br><a href='pridat.php'>Přidat</a> 
				<br><a href='pridat_pobyt.php'>Přidat pobyt</a> 
				<br><a href='pridat_vstupni_zpravy.php'>Přidat vstupní zprávy</a>
			";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
