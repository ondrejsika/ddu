<?php

function zjisti_id()
{ // BEGIN function pocet_radku
	$spojeni = $GLOBALS["spojeni"];
	$db = $GLOBALS["db"];
	$tb = $GLOBALS["tb"];
	$sql = "SELECT * FROM `$db`.`$tb` ORDER BY `$tb`.`id` DESC LIMIT 1";
	$vysledek = mysql_query($sql, $spojeni);
	$pocet = mysql_fetch_array($vysledek);
	return $pocet["id"] + 1;
} // END function pocet_radku

function zjisti_jmeno($id)
{ // BEGIN function pocet_radku
	$spojeni = $GLOBALS["spojeni"];
	$db = $GLOBALS["db"];
	$tb = $GLOBALS["tb"];
	$sql = "SELECT * FROM `$db`.`$tb` WHERE `id` LIKE '$id' LIMIT 1";
	$vysledek = mysql_query($sql, $spojeni);
	$pocet = mysql_fetch_array($vysledek);
	return $pocet["jmeno"];
} // END function pocet_radku

function id($tb)
{ // BEGIN function pocet_radku
	$spojeni = $GLOBALS["spojeni"];
	$db = $GLOBALS["db"];
	$sql = "SELECT * FROM `$db`.`$tb` ORDER BY `$tb`.`id` DESC LIMIT 1";
	$vysledek = mysql_query($sql, $spojeni);
	$pocet = mysql_fetch_array($vysledek);
	return $pocet["id"] + 1;
} // END function pocet_radku
?>
