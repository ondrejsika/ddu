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
		$border = 1;
			echo "
				<table width='100%' border=$border>
					<tr>
						<td width='70%'>
							Jméno: jmeno
						</td>
						<td width='30%'>
							Rodné číslo: rc
						</td>
					</tr>
					<tr valign='top'>
						<td width='70%'>
							Bydliště
							<br>bydliste
						</td>
						<td width='30%'>
							Skupina: skupina a
							<br>OSPOD: ospod
							<br>Nařídil: nařídil
						</td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='100%'>
							Důvod: duvod
						<td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='50%'>
							Číslo jednací:
						</td>
						<td width='50%'>
							Datum rozhodnutí:
						</td>
					</tr>
					<tr>
						<td width='50%'>
							Od:
						</td>
						<td width='50%'>
							Poslední pobyt:
						</td>
					</tr>
					<tr>
						<td width='50%'>
							Odešel kdy:
						</td>
						<td width='50%'>
							Odešel kam:
						</td>
					</tr>
					<tr>
						<td width='50%'>
							Matka:
							<br>matka
						</td>
						<td width='50%'>
							Otec:
							<br>otec
						</td>
					</tr>
				</table>
				<table width='100%'>
			";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
