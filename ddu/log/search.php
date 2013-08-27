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
	$get=array("sloupec", "search");
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}
	
	

		// formular
		echo "
			<form action='search.php' method='POST'>
			<select name='sloupec' size='1'>
			  <option value='jmeno' selected> Jméno
			  <option value='rc' >Rodné číslo
			  <option value='bydliste' >Bydliště
			</select>
			<input type='text' size='30' name='search' value=''>
			<input type='submit' value='hledat'>
			</form>
		";

	if (
	!empty($sloupec)
	)
	{
		//zobrazi pozadavek		
		$sql = "SELECT * FROM `$db`.`$tb` WHERE `$sloupec` LIKE '%$search%'  ORDER BY `$tb`.`id` DESC";
	echo "
		<table width=100%>
			<tr>
				<td width=16%>
					Rodné číslo
				</td>
				<td width=16%>
					Jméno
				</td>
				<td width=16%>
					Druh pobytu
				</td>
				<td width=16%>
					Narozen
				</td>
				<td width=16%>
					Od
				</td>
				<td width=16%>
					Do
				</td>
			</tr>
		
	";
	
	$query = mysql_query($sql, $spojeni);
	while ($d = mysql_fetch_array($query)) {
		echo "
			<tr>
				<td width=16%>
					<a href='podrobnosti.php?id=".$d["id"]."'>
					".$d["rc"]."</a>
				</td>
				<td width=16%>
					<a href='podrobnosti.php?id=".$d["id"]."'>
					".$d["jmeno"]."</a>
				</td>
				<td width=16%>
					<a href='podrobnosti.php?id=".$d["id"]."'>
					".$d["druh_pobytu"]."</a>
				</td>
				<td width=16%>
					<a href='podrobnosti.php?id=".$d["id"]."'>
					".$d["rc"]."</a>
				</td>
				<td width=16%>
					<a href='podrobnosti.php?id=".$d["id"]."'>
					".$d["od"]."</a>
				</td>
				<td width=16%>
					<a href='podrobnosti.php?id=".$d["id"]."'>
					".$d["odesel_dne"]."</a>
				</td>
			</tr>
		";
	}
	echo "</table>";
	}
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>