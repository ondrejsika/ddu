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
			$get=array("rc","jmeno","bydliste","od","skupina","duvod","ospod","cislo_jednaci","naridil","datum_rozhodnuti","odesel_dne","odesel_kam","druh_pobytu","posledni_pobyt","zdravotni_stav","pojistovna","matka","otec","dalsi_kontakty");
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
		echo "
			<form ENCTYPE='multipart/form-data' action='pridat_dite.php' method='POST'>	
			
<table width='100%' border=$border>
					<tr>
						<td width='70%'>
						Jméno: 
			<input type='text' size='20' name='jmeno' value=''>
			Příjmení:
			<input type='text' size='20' name='prijmeni' value=''>
			<br>Fotka: <input type='file' name='file' accept='*'>
						</td>
						<td width='30%'>
							Rodné číslo:
			<input type='text' size='20' name='rc' value=''>
						<br>dat. narození:";
			$name = "datum_narozeni";
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
						</td>
					</tr>
					<tr valign='top'>
						<td width='70%'>
							<p>Adresa
			<br>Ulice:
			<br><input type='text' size='20' name='ulice' value=''>č.p.<input type='text' size='6' name='cp' value=''>
			<br>Město:
			<br><input type='text' size='20' name='mesto' value=''>psč<input type='text' size='7' name='psc' value=''>
						</td>
						<td width='30%'>
							<p>Skupina:
			<input type='text' size='20' name='skupina' value=''>
							<p>OSPOD:
			<select name='ospod'>
			<option value=''></option>";

		foreach ($ospod as $value) {
			echo "<option value='".$value[0]."'>".$value[1]."</option>"   ;
		}
	
		echo "
			</select>
							<p>Nařídil:
			<input type='text' size='20' name='naridil' value=''>
						</td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='100%'>
							<p>Důvod:
			<input type='text' size='20' name='duvod' value=''>
						<td>
					</tr>
					<tr>
						<td width='100%'>
							<p>Druh pobytu:
			<input type='text' size='20' name='druh_pobytu' value=''>
			
						<td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='50%'>
							<p>Číslo jednací:
			<input type='text' size='20' name='cislo_jednaci' value=''>
						</td>
						<td width='50%'>
							<p>Datum rozhodnutí:
					
		";/////////
			$name = "datum_rozhodnuti";
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
						</td>
					</tr>
					<tr>
						<td width='50%'>
							<p>Od: ";/////////
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
						</td>
						<td width='50%'>
							<p>Posledni pobyt:
			<input type='text' size='20' name='posledni_pobyt' value=''>
						</td>
					</tr>
					<tr>
						<td width='50%'>
							Odešel kdy: ";/////////
			$name = "odesel_kdy";
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
						</td>
						<td width='50%'>
							<p>Odesel kam:
			<input type='text' size='20' name='odesel_kam' value=''>
						</td>
					</tr>
					<tr>
						<td width='50%'>
							Matka: (jméno, kontakt)
			<br><input type='text' size='20' name='matka' value=''>
						</td>
						<td width='50%'>
							Otec: (jméno, kontakt)
			<br><input type='text' size='20' name='otec' value=''>
						</td>
					</tr>
				</table>
				<table width='100%' border=$border>
					<tr>
						<td width='100%'>
							<p>Další kontakty
			<input type='text' size='20' name='dalsi_kontakty' value=''>
						<td>
					</tr>
					<tr>
						<td width='100%'>
							<p>Zdravotní stav:
			<input type='text' size='20' name='zdravotni_stav' value=''>
						<td>
					</tr>
					<tr>
						<td width='100%'>
							<p>Pojišťovna:
			<input type='text' size='20' name='pojistovna' value=''>
						<td>
					</tr>
				</table>
<p><input type='submit' value='ok'></form>
		";
	}
	else
	{
		//zapis do db
		$id = zjisti_id();
		$jmeno = $_POST["prijmeni"] . ", " . $jmeno;
		$bydliste = $_POST["ulice"] . " " . $_POST["cp"] . ", " . $_POST["psc"] . " " . $_POST["mesto"]; 
		$sql = "
			INSERT INTO `$db`.`$tb` VALUES (
			'$id',
			'$rc',
			'$jmeno',
			'$bydliste',
			'".datum("od",1)."', 
			'$skupina',
			'$duvod',
			'$ospod',
			'$cislo_jednaci', 
			'$naridil',
			'".datum("datum_rozhodnuti",1)."',
			'".datum("odesel_kdy",1)."',
			'$odesel_kam',
			'$druh_pobytu',
			'$posledni_pobyt',
			'$zdravotni_stav', 
			'$pojistovna',
			'$matka',
			'$otec',
			'$dalsi_kontakty',
			'".datum("datum_narozeni",1)."')
		";
		//echo $sql;
		$new = "./files/foto/".zjisti_id().".jpg";//".$_FILES['file']['name'];
		$up = "";
		if(!file_exists($new))
		{
			if (move_uploaded_file($_FILES['file']['tmp_name'], $new))
			{
				$up = "
					Soubor <B>".$_FILES['file']['name']."</B> 
					o velikosti <B>".$_FILES['file']['size']."</B> bajtů
				";
			}
			else
				//$up = "Žádný soubor jste neuploadovali !!!";
				$up = "";
		}
		for($i=1;$i<5;$i++) mysql_query("INSERT INTO `$db`.`zaverecne_zpravy` VALUES ('$id','$i','')",$spojeni);
		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.<br>$up";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
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
