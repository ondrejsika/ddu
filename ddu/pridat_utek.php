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

		echo "<form action='pridat_utek.php?id=$id&k=2' method='POST'>
<table width='100%'><tr valign='top'><td width='50%'>
		
				<p>Útěk ".datum("utek",0)."
			<p>Návarat ".datum("navrat",0)."
			<p>Ohlášen ".datum("ohlasen",0)."
			<p>Příčina<br><input type='text' size='20' name='pricina'>

			<p>Místo uteku<br><input type='text' size='40' name='misto'>
			<p>Popis oblečení<br><input type='text' size='40' name='obleceni'>
			</td><td width='50%'>
			<p>Směr<br><input type='text' size='40' name='smer'>
			<p>Prostředky (peníze, jídlo, ...)<br><input type='text' size='40' name='prostredky'>
			<p>Poznámka<br><textarea rows='3' name='poznamka' cols='48'></textarea>
			<p><input type='submit' value='ok'>   <input type='reset' value='storno'>
			</td></tr></table></form>
		";
	}
	else
	{
		//zapis do db
$get=array('dite','utek','navrat','ohlasen', 'obleceni',"pricina","misto","smer","prostredky",'poznamka');
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}
		

		 $sql = "
			INSERT INTO `$db`.`uteky` VALUES (
			'".id("uteky")."','$dite_id','".datum("utek",1)."','".datum("navrat",1)."','".datum("ohlasen",1)."', '$pricina','$misto', '$obleceni','$smer', '$prostredky', '$poznamka')
		";

		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='podrobnosti_utek.php?id=$id'>zpět</a>";
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
