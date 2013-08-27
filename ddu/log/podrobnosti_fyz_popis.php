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
		include "fce/podrobnosti_fyz_popis.fce.php";
	$sql = "SELECT * FROM `$db`.`fyz_popis` WHERE `id` LIKE $id";
	$query = mysql_query($sql, $spojeni);
	if(mysql_num_rows($query) != 0){
	$d = mysql_fetch_array($query);
	$border = 0;
	echo "
		<table width='100%' border='$border'>
			<tr>
				<td width='50%'>
					Barva očí: <b>".barva_oci($d["barva_oci"])."</b>
				</td>
				<td width='50%'>
					Barva vlasů: <b>".barva_vlasu($d["barva_vlasu"])."</b>
				</td>
			</tr>
			<tr>
				<td width='50%'>
				Styl vlasů: <b>".styl_vlasu($d["barva_vlasu"])."</b>
				</td>
				<td width='50%'>
				Obličej: <b>".oblicej($d["oblicej"])."</b>
				</td>
			</tr>
			<tr>
				<td width='50%'>
				Nos: <b>".nos($d["nos"])."</b>
				</td>
				<td width='50%'>
				Ústa: <b>".usta($d["usta"])."</b>
				</td>
			</tr>
			<tr>
				<td width='50%'>
				Zuby: <b>".zuby($d["zuby"])."</b>
				</td>
				<td width='50%'>
				Postava: <b>".postava($d["postava"])."</b>
				</td>
			</tr>
			<tr>
				<td width='50%'>
				Vousi: <b>".vousy($d["vousy"])."</b>
				</td>
				<td width='50%'>
				 
				</td>
			</tr>
	</table>
	<table width='100%' border='$border'>
			<tr>
				<td width='100%'>
				Zdravotní stav: <b>".$d["zdravotni_stav"]."</b>
				</td>
			</tr>
			<tr>
				<td width='100%'>
				<p>Poznámka: <b>".$d["poznamka"]."</b>
				</td>
			</tr>
		<table>
	";
	}
	else echo "Žádaná data v databázi.";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
