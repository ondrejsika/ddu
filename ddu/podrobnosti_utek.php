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
		$pridat = "pridat_utek.php?id=$id";
		include "podrobnosti_menu.php";
		// formular
	$sql = "SELECT * FROM `$db`.`uteky` WHERE `dite` LIKE $id ";
	$query = mysql_query($sql, $spojeni);
	if(mysql_num_rows($query) != 0)
{
	while($d = mysql_fetch_array($query)){

		echo "
<table width='100%'><tr valign='top'><td width='50%'>

			
				<p>Útěk ".$d["utek"]."
			<p>Návarat ".$d["navrat"]."
			<p>Ohlášen ".$d["ohlasen"]."
			<p>Příčina<br>".$d["pricina"]."

			<p>Místo uteku<br>".$d["misto"]."
			<p>Popis oblečení<br>".$d["obleceni"]."
			</td><td width='50%'>
			<p>Směr<br>".$d["smer"]."
			<p>Prostředky (peníze, jídlo, ...)<br>".$d["prostredky"]."
			<p>Poznámka<br>".$d["poznamka"]."
			</td></tr></table></form>
			<hr size='1' color='black'>
		";
	}
}
else
echo "<a href='pridat_utek.php?id=$id'>Přidat</a>";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}
include "footer.php";
?>
