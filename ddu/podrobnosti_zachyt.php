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
		$pridat = "pridat_zachyt.php?id=$id";
		include "podrobnosti_menu.php";
		include "fce/podrobnosti_pobyt.fce.php";
	$sql = "SELECT * FROM `$db`.`zachyt` WHERE `dite` LIKE $id ORDER BY `zachyt`.`id` DESC";
	
	$i = 0;
	$query = mysql_query($sql, $spojeni);
	if(mysql_num_rows($query) != 0){
	while($d = mysql_fetch_array($query)){
	if($i != 0) echo "<hr size='1' color='black'>";
	
	echo "
		<p>Od:
		<b>".$d["od"]."</b> | 
		Do:
		<b>".$d["do"]."</b>
		<br>Žadatel:
		<b>".$d["zadatel"]."</b>
		<p>Poslední pobyt:
		<b>".$d["posledni_pobyt"]."</b>
		<p>Poznámka
		<br><b>".$d["poznamka"]."</b>
		<br><a href='upravit_zachyt.php?id=".$d["id"]."'>upravit</a>
	";
	$i++;
	}}
	else echo "Žádaná data v databázi.<p><a href='pridat_zachyt.php?id=$id'>Přidat záchyt</a>";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}
include "footer.php";
?>
