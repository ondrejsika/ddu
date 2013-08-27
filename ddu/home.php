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
		include "fce/komunitni_kniha.fce.php";
			echo "
			<table width='100%' border='0'><tr valign='top'>
			<td width='50%'>
				<a href='seznam.php'>Zobrazit</a> 
				<br><a href='search.php'>Vyhledávání</a>
				<br><a href='pridat_dite.php'>Přidat dítě</a> 
				<br><a href='pridat_komunitni_kniha.php'>Přidat komutní kniha</a>
			</td><td width='50%'>
				<a href='podrobnosti_komunitni_kniha.php'><font size='4'>Komunitní kniha</font></a>
				<br>".komunitni_kniha(3)."
			</td></tr></table>
			";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
