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
			
	
	if (empty($k))
	{
		// formular
		$jmena = "";
		$sql = "SELECT * FROM `vstupni_zpravy` WHERE `id` = $id";
		$query = mysql_query($sql, $spojeni);
		$d = mysql_fetch_array($query);
				

		echo "<form action='upravit_vstupni_zpravy.php?k=2' method='POST'>
			<p>Název zprávy:
			<input type='hidden' name='id' value='".$d["id"]."'>
			<br><input type='text' name='nazev' value='".$d["nazev"]."'>
			
			<p>Zpráva:
			<br><textarea rows='7' name='zprava' cols='48'>".$d["zprava"]."</textarea>

			<p><input type='submit' value='ok'>
			</form>
		";
	}
	else
	{
		//zapis do db
		$get=array("id","nazev","zprava");
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}

		$sql = "
			UPDATE `$db`.`vstupni_zpravy` SET `nazev` = '$nazev',
`zprava` = '$zprava' WHERE `vstupni_zpravy`.`id` = $id;
		";

		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='podrobnosti_vstupni_zpravy.php?id=$id'>zpět</a>";
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
