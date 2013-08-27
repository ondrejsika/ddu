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
		$ospod = "";
		$sql = "SELECT * FROM `$tb` ORDER BY `$tb`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$jmena[]=array($d["id"],$d["jmeno"]);
		}
		$sql = "SELECT * FROM `ospod` ORDER BY `ospod`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$ospod[]=array($d["id"],$d["jmeno"]);
		}

		echo "<form action='pridat_zachyt.php?k=2&id=$id' method='POST'>
		
			<p>Od";/////////
			$name = "od";
			$opt_d = "";
		for($i=1;$i<32;$i++){
			$opt_d = $opt_d."<option value='$i'>$i</option>";
		}
		$opt_m = "";
		for($i=1;$i<13;$i++){
			$opt_m = $opt_m."<option value='$i'>$i</option>";
		}		
		$return = "
			<select name='".$name."_d'>
			<option value=''></option>
			$opt_d
			</select>
			<select name='".$name."_m'>
			<option value=''></option>
			$opt_m
			</select>
			<input type='text' name='".$name."_r' size='5'>
		";echo $return . "
			<p>Do";/////////
			$name = "do";
			$opt_d = "";
		for($i=1;$i<32;$i++){
			$opt_d = $opt_d."<option value='$i'>$i</option>";
		}
		$opt_m = "";
		for($i=1;$i<13;$i++){
			$opt_m = $opt_m."<option value='$i'>$i</option>";
		}		
		$return = "
			<select name='".$name."_d'>
			<option value=''></option>
			$opt_d
			</select>
			<select name='".$name."_m'>
			<option value=''></option>
			$opt_m
			</select>
			<input type='text' name='".$name."_r' size='5'>
		";echo $return . "
			<p>Žadatel<br><input type='text' size='20' name='zadatel'>
			<p>Poslední pobyt<br><input type='text' size='40' name='posledni_pobyt'>
			<p>Poznámka<br><textarea rows='3' name='poznamka' cols='48'></textarea>
			<p><input type='submit' value='ok'>   <input type='reset' value='storno'>
			</form>
		";
	}
	else
	{
		//zapis do db
$get=array('dite','od','do','zadatel', 'posledni_pobyt', 'poznamka');
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}

		$sql = "
			INSERT INTO `$db`.`zachyt` VALUES (
			'".id("zachyt")."','$dite_id','".datum("od",1)."','".datum("do",1)."','$zadatel', '$posledni_pobyt', '$poznamka')
		";

		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='podrobnosti_zachyt.php?id=$id'>zpět</a>";
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
