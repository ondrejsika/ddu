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
			$get=array("id","nazev","zprava");
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}
	
	if (empty($id))
	{
		// formular
		$jmena = "";
		$sql = "SELECT * FROM `$tb` ORDER BY `$tb`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$jmena[]=array($d["id"],$d["jmeno"]);
		}
		

		echo "<form action='pridat_vstupni_zpravy.php' method='POST'>
		<p>Jméno:
			<br><select name='id'>
			<option value=''></option>
";
		foreach ($jmena as $value) {
			echo "<option value='".$value[0]."'>".$value[1]."</option>"   ;
		}
	
		echo "
			</select>
			<p>Název zprávy:
			<br><input type='text' name='nazev'>
			
			<p>Zpráva:
			<br><textarea rows='7' name='zprava' cols='48'></textarea>

			<p><input type='submit' value='ok'>
			</form>
		";
	}
	else
	{
		//zapis do db
		
		$user = user();
echo $user;
		$time = time();

		$sql = "
			INSERT INTO `$db`.`vstupni_zpravy` VALUES (
			'$id','$nazev','$user','$time','$zprava')
		";

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
