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
		$id2 = $id;
			
	
	if (empty($k))
	{
		// formular
		$jmena = "";
		$sql = "SELECT * FROM `naviky` WHERE `id` = $id2";
		$query = mysql_query($sql, $spojeni);
		$d = mysql_fetch_array($query);
		

		echo "<form action='upravit_navyky.php?k=1' method='POST'>
			<input type='hidden' name='id' value='".$d["id"]."'>
			<p>Droga:
			<br><input type='text' name='droga' value='".$d["droga"]."'>
			
			<p>Poznámka:
			<br><textarea rows='7' name='poznamka' cols='48'>".$d["poznamka"]."</textarea>

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
			UPDATE `$db`.`naviky` SET `droga` =  '$droga',
`poznamka` = '$poznamka' WHERE `naviky`.`id` = $id;
		";

		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='navyky.php?id=$id'>zpět</a>";
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
