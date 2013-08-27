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
		$ospod = "";
		$sql = "SELECT * FROM `zachyt`WHERE `id` = $id";
		$query = mysql_query($sql, $spojeni);
		$d = mysql_fetch_array($query);
		


		echo "<form action='upravit_zachyt.php?k=2' method='POST'>
			<p>Od
			<input type='hidden' name='id' value='".$d["id"]."'>
			<input type='hidden' name='dite' value='".$d["dite"]."'>
			<input type='text' name='od' value='".$d["od"]."'>
			<p>Do
			<input type='text' name='do' value='".$d["do"]."'>
			<p>Žadatel<br><input type='text' size='20' name='zadatel' value='".$d["zadatel"]."'>
			<p>Poslední pobyt<br><input type='text' size='40' name='posledni_pobyt' value='".$d["posledni_pobyt"]."'>
			<p>Poznámka<br><textarea rows='3' name='poznamka' cols='48'>".$d["poznamka"]."</textarea>
			<p><input type='submit' value='ok'>   <input type='reset' value='storno'>
			</form>
		";
	}
	else
	{
		//zapis do db
		$get=array("id",'dite','od','do','zadatel', 'posledni_pobyt', 'poznamka');
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}

		$sql = "
			UPDATE `$db`.`zachyt` SET `od` = '$od',
			`do` = '$do',
			`zadatel` = '$zadatel',
			`posledni_pobyt` = '$posledni_pobyt',
			`poznamka` = '$poznamka' WHERE `zachyt`.`id` = $id;
		";

		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='podrobnosti_zachyt.php?id=$dite'>zpět</a>";
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
