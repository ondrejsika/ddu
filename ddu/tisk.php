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
		$sql = "SELECT * FROM `$db`.`$tb`WHERE `id` LIKE $id";
		$query = mysql_query($sql, $spojeni);
		$d = mysql_fetch_array($query);
		$border = 1;
			echo "
				<table width='100%' border=$border>
					<tr>
						<td width='70%'>
							Jméno: ".$d["jmeno"]."
						</td>
						<td width='30%'>
							Rodné číslo: ".$d["rc"]."
						</td>
					</tr>
					<tr valign='top'>
						<td width='70%'>
							Bydliště
							<br>".$d["bydliste"]."
						</td>
						<td width='30%'>
							Skupina: ".$d["skupina"]."
							<br>OSPOD: ".$d["ospod"]."
							<br>Nařídil: ".$d["naridil"]."
						</td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='100%'>
							Důvod: ".$d["duvod"]."
						<td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='50%'>
							Číslo jednací: ".$d["cislo_jednaci"]."
						</td>
						<td width='50%'>
							Datum rozhodnutí: ".$d["datum_rozhodnuti"]."
						</td>
					</tr>
					<tr>
						<td width='50%'>
							Od: ".$d["od"]."
						</td>
						<td width='50%'>
							Poslední pobyt: ".$d["posledni_pobyt"]."
						</td>
					</tr>
					<tr>
						<td width='50%'>
							Odešel kdy: ".$d["odesel_dne"]."
						</td>
						<td width='50%'>
							Odešel kam: ".$d["odesel_kam"]."
						</td>
					</tr>
					<tr>
						<td width='50%'>
							Matka:
							<br>".$d["matka"]."
						</td>
						<td width='50%'>
							Otec:
							<br>".$d["otec"]."
						</td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='100%'>
							Další kontakty:
							<br>".$d["dalsi_kontakty"]."
						<td>
					</tr>
					<tr>
						<td width='100%'>
							Zdravotní stav
							<br>".$d["zdravotni_stav"]."
						<td>
					</tr>
				</table>
			";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}
include "footer.php";
?>
