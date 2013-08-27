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
		$id2 = $id;
			$get=array("datum_narozeni","id","rc","jmeno","bydliste","od","skupina","duvod","ospod","cislo_jednaci","naridil","datum_rozhodnuti","odesel_dne","odesel_kam","druh_pobytu","posledni_pobyt","zdravotni_stav","pojistovna","matka","otec","dalsi_kontakty");
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}
	
	if (empty($rc))
	{
		// formular
		$ospod = "";
		$sql = "SELECT * FROM `ospod` ORDER BY `ospod`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$ospod[]=array($d["id"],$d["jmeno"]);
		}
		$border = 0;
		$sql = "SELECT * FROM `$db`.`$tb` WHERE `id` = $id2";
		$query = mysql_query($sql,$spojeni);
		$d = mysql_fetch_array($query);
		echo "
			<form ENCTYPE='multipart/form-data' action='upravit_dite.php' method='POST'>	
			
<table width='100%' border=$border>
					<tr>
						<td width='70%'>
						Jméno: 
			<input type='text' size='20' name='jmeno' value='".$d["jmeno"]."'>

			<input type='hidden' name='id' value='".$d["id"]."'>
						</td>
						<td width='30%'>
							Rodné číslo:
			<input type='text' size='20' name='rc' value='".$d["rc"]."'>
						<br>dat. narození:
			<input type='text' size='20' name='datum_narozeni' value='".$d["datum_narozeni"]."'>


						</td>
					</tr>
					<tr valign='top'>
						<td width='70%'>
							<p>Adresa
			<textarea name='bydliste' rows='3' cols='49'>".$d["bydliste"]."</textarea>
						</td>
						<td width='30%'>
							<p>Skupina:
			<input type='text' size='20' name='skupina' value='".$d["skupina"]."'>
							<p>OSPOD:
			<select name='ospod'>
			<option value=''></option>";
		foreach ($ospod as $value) {
			if($d["ospod"] == $value[1]) $s = "selected";
			else $s = "";
			echo "<option value='".$value[0]."'>".$value[1]."</option>"   ;
		}
	
		echo "
			</select>
							<p>Nařídil:
			<input type='text' size='20' name='naridil' value='".$d["naridil"]."'>
						</td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='100%'>
							<p>Důvod:
			<input type='text' size='20' name='duvod' value='".$d["duvod"]."'>
						<td>
					</tr>
					<tr>
						<td width='100%'>
							<p>Druh pobytu:
			<input type='text' size='20' name='druh_pobytu' value='".$d["druh_pobytu"]."'>
			
						<td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='50%'>
							<p>Číslo jednací:
			<input type='text' size='20' name='cislo_jednaci' value='".$d["cislo_jednaci"]."'>
						</td>
						<td width='50%'>
							<p>Datum rozhodnutí:
							<input type='text' size='20' name='datum_rozhodnuti' value='".$d["datum_rozhodnuti"]."'>
							<p>Od: 
<input type='text' size='20' name='od' value='".$d["od"]."'>
						</td>
						<td width='50%'>
							<p>Posledni pobyt:
			<input type='text' size='20' name='posledni_pobyt' value='".$d["posledni_pobyt"]."'>
						</td>
					</tr>
					<tr>
						<td width='50%'>
							Odešel kdy: 
<input type='text' size='20' name='odesel_dne' value='".$d["odesel_dne"]."'>
						</td>
						<td width='50%'>
							<p>Odesel kam:
			<input type='text' size='20' name='odesel_kam' value='".$d["odesel_kam"]."'>
						</td>
					</tr>
					<tr>
						<td width='50%'>
							Matka: (jméno, kontakt)
			<br><input type='text' size='20' name='matka' value='".$d["matka"]."'>
						</td>
						<td width='50%'>
							Otec: (jméno, kontakt)
			<br><input type='text' size='20' name='otec' value='".$d["otec"]."'>
						</td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='100%'>
							<p>Další kontakty
			<input type='text' size='20' name='dalsi_kontakty' value='".$d["dalsi_kontakty"]."'>
						<td>
					</tr>
					<tr>
						<td width='100%'>
							<p>Zdravotní stav:
			<input type='text' size='20' name='zdravotni_stav' value='".$d["zdravotni_stav"]."'>
						<td>
					</tr>
					<tr>
						<td width='100%'>
							<p>Pojišťovna:
			<input type='text' size='20' name='pojistovna' value='".$d["pojistovna"]."'>
						<td>
					</tr>
				</table>
<p><input type='submit' value='ok'></form>
		";
	}
	else
	{
		//zapis do db
		$sql = "
			UPDATE `dduplzencz`.`deti` SET `rc` = '$rc', `jmeno` = '$jmeno', `bydliste` = '$bydliste', `od` = '$od', `skupina` = '$skupina', `duvod` = '$duvod', `ospod` = '$ospod', `cislo_jednaci` = '$cislo_jednaci', `naridil` = '$naridil', `datum_rozhodnuti` = '$datum_rozhodnuti', `odesel_dne` = '$odesel_dne', `odesel_kam` = '$odesel_kam', `druh_pobytu` = '$druh_pobytu', `posledni_pobyt` = '$posledni_pobyt', `zdravotni_stav` = '$zdravotni_stav', `pojistovna` = '$pojistovna', `matka` = '$matka', `otec` = '$otec', `dalsi_kontakty` = '$dalsi_kontakty', `datum_narozeni` = '$datum_narozeni' WHERE `id` = $id;
		";
		//echo $sql;
		
		if (mysql_query($sql, $spojeni))
		{
			echo "Uspesně zmeneno";
		}
		else echo "Vyslitla se chyba";
		echo "<p><a href='podrobnosti.php?id=$id'>zpět</a>";
			
		
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
