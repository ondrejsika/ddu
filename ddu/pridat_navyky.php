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
			
	
	if (empty($k))
	{
		// formular
		$jmena = "";
		$sql = "SELECT * FROM `$tb` ORDER BY `$tb`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$jmena[]=array($d["id"],$d["jmeno"]);
		}
		

		echo "<form action='pridat_navyky.php?id=$id&k=2' method='POST'>
			<p>Droga:
			<br><input type='text' name='droga'>
			
			<p>Poznámka:
			<br><textarea rows='7' name='poznamka' cols='48'></textarea>

			<p><input type='submit' value='ok'>
			</form>
		";
	}
	else
	{
		//zapis do db
		$get=array("id","droga","poznamka");
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}
		$sql = "
			INSERT INTO `$db`.`naviky` VALUES (
			'$dite_id','$droga','$poznamka')
		";

		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='navyky.php?id=$dite_id'>zpět</a>";
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
