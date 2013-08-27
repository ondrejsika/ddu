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
		$sql = "SELECT * FROM `komunitni_kniha` WHERE `id` = $id";
		$query = mysql_query($sql, $spojeni);
		$d = mysql_fetch_array($query);
		// formular
			echo "<form action='upravit_komunitni_kniha.php?k=2' method='POST'>	
			<p>Text:
			<br><textarea rows='7' name='poznamka' cols='48'>".$d["text"]."</textarea>
			<input type='hidden' name='id' value='".$d["id"]."'>
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
		$sql = "UPDATE `$db`.`komunitni_kniha` SET `text` = '$poznamka' WHERE `komunitni_kniha`.`id` = $id;";
		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='podrobnosti_komunitni_kniha.php'>zpět</a>";
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
