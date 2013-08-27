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
	
				if (empty($jmeno))
	{
		// formular
		$sql = "SELECT * FROM `$db`.`ospod` WHERE `id` = $id";
		$query = mysql_query($sql,$spojeni);
		$d = mysql_fetch_array($query);
		echo "
			<form action='upravit_ospod.php' method='POST'>

			
	<input type='hidden' name='id' value='".$d["id"]."'>

			<table width='100%'>
				<tr valign='top'>
					<td width='50%'>
			<p>Jméno: 
			<br><input type='text' size='20' name='jmeno' value='".$d["jmeno"]."'>
		
			<p>Ulice 
			<br><input type='text' size='20' name='ulice' value='".$d["ulice"]."'> 
			<p>Město
			<br><input type='text' size='20' name='mesto' value='".$d["mesto"]."'> psč <input type='text' size='6' name='psc' value='".$d["psc"]."'>
			
			<p><input type='submit' value='ok'>

					</td>
					<td width='50%'>
<p>Telefon
			<br><input type='text' size='20' name='tel' value='".$d["tel"]."'>
			<p>Fax
			<br><input type='text' size='20' name='fax' value='".$d["fax"]."'>
			<p>Email
			<br><input type='text' size='20' name='email' value='".$d["email"]."'>
			<p>Organizace
			<br><input type='text' size='20' name='organizace' value='".$d["organizace"]."'>
			<p>Další kontakty
			<br><input type='text' size='20' name='dalsi_kontakty' value='".$d["dalsi_kontakt"]."'>
					</td>
				</tr>
			</table>		</form>
		";
	}
	else
	{
		//zapis do db
		$id = $_POST["id"];
		$jmeno = $_POST["jmeno"];
		$ulice = $_POST["ulice"];
		$mesto = $_POST["mesto"]; 
		$tel = $_POST["tel"] ;
		$psc = $_POST["psc"] ;
		$fax = $_POST["fax"] ;
		$email = $_POST["email"] ;
		$organizace = $_POST["organizace"] ;
		$dalsi_kontakty = $_POST["dalsi_kontakty"] ;

		$sql = "
		UPDATE `dduplzencz`.`ospod` SET `jmeno` =  '$jmeno',
		`ulice` = ' $ulice',
		`mesto` = '$mesto',
		`psc` = '$psc',
		`tel` = '$tel',
		`fax` = '$fax',
		`email` = '$email',
		`organizace` = '$organizace',
		`dalsi_kontakt` = '$dalsi_kontakty' WHERE `ospod`.`id` =$id
		";
		//echo $sql;
		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='ospod.php'>zpět</a>";
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
