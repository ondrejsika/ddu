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
		$odstran = $_POST["odstran"];
		$dite = zjisti_jmeno($id);
		if (empty($odstran))
		{
			if (!empty($id))
			{
				echo "
					<p>Opravdu chcete odstanit <b>$dite</b> a vsechny data vázající se k němu?
					<form action='vymazat.php' method='POST'>
					<input type='hidden' name='odstran' value='$id'>
					<input type='submit' value='ok'>
					</form>
				";		
			}
			else echo "Neplatné zadaní";
		}
		else
		{
			$sql = "DELETE FROM `deti` WHERE `id` LIKE $odstran;";
			mysql_query($sql,$spojeni);
			$sql = "DELETE FROM `fyz_popis` WHERE `id` LIKE $odstran;";
			mysql_query($sql,$spojeni);
			$sql = "DELETE FROM `pobyt` WHERE `dite` LIKE $odstran;";
			mysql_query($sql,$spojeni);
			$sql = "DELETE FROM `vstupni_zpravy` WHERE `id` LIKE $odstran;";
			mysql_query($sql,$spojeni);
			echo "Záznamy byly odstraňeny.";
		}
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
