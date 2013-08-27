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
			
		$jmeno = $_POST["jmeno"];
		
	
	
	if (empty($jmeno))
	{
		// formular
		echo "
			<form action='pridat_ospod.php' method='POST'>
			<p>Jméno: (prijmeni, jmeno)
			<br><input type='text' size='20' name='jmeno' value=''>
			<p><input type='submit' value='ok'>
			</form>
		";
	}
	else
	{
		//zapis do db
		$id = id("ospod");
		$sql = "INSERT INTO `$db`.`ospod` VALUES ('$id','$jmeno')";
		
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
