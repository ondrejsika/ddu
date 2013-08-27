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
			echo "	
			<table width='100%' size='0'><tr><td>
				OSPOD | 
				<a href='ospod.php'>zobrazit</a> | 
				<a href='ospod.php?p=pridat'>přidat</a>| 
				<a href='ospod.php?p=vymazat'>odstranit</a>
			</td></tr></table>
			<hr size='1' color='black'>
			";
			if(isset($_POST["jmeno"])) $jmeno = $_POST["jmeno"];
			else $jmeno = "";
			if (empty($p))
			{
				echo "<table width='100%'>
				<tr>
				<td width='20%'>
				Jméno
				</td>
				<td width='20%'>Ulice
				</td>
				<td width='20%'>Město PSČ
				</td>
				<td width='20%'>telefon
				</td>
				<td width='20%'>email
				</td>
						</tr>

";
				// zobrazení OSPOD
				$sql = "SELECT * FROM `$db`.`ospod`";
				$query = mysql_query($sql, $spojeni);
				while ($d = mysql_fetch_array($query)) {
					//echo $d["jmeno"]."<br>";
					if (!isset($i)) $i = 0;	
				if ($i == 0) $color = "#BFE0DE";
				if ($i == 1) $color = "";
				if ($i == 0) $i = 1;
				else $i = 0;
					echo "
						<tr bgcolor='$color'>
							<td width='20%'>
							<a href='ospod.php?p=podrobnosti&id=".$d["id"]."'>".$d["jmeno"]."</a>
							</td>
							<td width='20%'><a href='ospod.php?p=podrobnosti&id=".$d["id"]."'>".$d["ulice"]."</a>
							</td>
							<td width='20%'><a href='ospod.php?p=podrobnosti&id=".$d["id"]."'>".$d["mesto"]." ".$d["psc"]."</a>
							</td>
							<td width='20%'><a href='ospod.php?p=podrobnosti&id=".$d["id"]."'>".$d["tel"]."</a>
							</td>
							<td width='20%'><a href='ospod.php?p=podrobnosti&id=".$d["id"]."'>".$d["email"]."</a>
							</td>
						</tr>
					";
				}
				echo "</table>";
			}
			if ($p == "pridat")
			{
				if (empty($jmeno))
	{
		// formular
		echo "
			<form action='ospod.php?p=pridat' method='POST'>

			
	

			<table width='100%'>
				<tr valign='top'>
					<td width='50%'>
			<p>Jméno: 
			<br><input type='text' size='20' name='jmeno' value=''>
			<p>Přijmeni
			<br><input type='text' size='20' name='prijmeni' value=''>
			<p>Ulice 
			<br><input type='text' size='20' name='ulice' value=''> č.p. <input type='text' size='5' name='cp' value=''>
			<p>Město
			<br><input type='text' size='20' name='mesto' value=''> psč <input type='text' size='6' name='psc' value=''>
			
			<p><input type='submit' value='ok'>

					</td>
					<td width='50%'>
<p>Telefon
			<br><input type='text' size='20' name='tel' value=''>
			<p>Fax
			<br><input type='text' size='20' name='fax' value=''>
			<p>Email
			<br><input type='text' size='20' name='email' value=''>
			<p>Organizace
			<br><input type='text' size='20' name='organizace' value=''>
			<p>Další kontakty
			<br><input type='text' size='20' name='dalsi_kontakty' value=''>
					</td>
				</tr>
			</table>		</form>
		";
	}
	else
	{
		//zapis do db
		$id = id("ospod");
		$jmeno = $_POST["prijmeni"] . ", " . $jmeno;
		$ulice = $_POST["ulice"] ." ". $_POST["cp"] ;
		$mesto = $_POST["mesto"]; 
		$tel = $_POST["tel"] ;
		$psc = $_POST["psc"] ;
		$fax = $_POST["fax"] ;
		$email = $_POST["email"] ;
		$organizace = $_POST["organizace"] ;
		$dalsi_kontakty = $_POST["dalsi_kontakty"] ;
		$sql = "INSERT INTO `$db`.`ospod` VALUES ($id,'$jmeno','$ulice','$mesto','$psc','$tel','$fax','$email','$organizace','$dalsi_kontakty')";
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
			}
			if ($p == "vymazat" and user_prava() == 0)
			{
				if (empty($id)){
					$sql = "SELECT * FROM `$db`.`ospod`";
					$query = mysql_query($sql, $spojeni);
					while ($d = mysql_fetch_array($query)) {
						echo "<a href='ospod.php?p=vymazat&id=".$d["id"]."'>".$d["jmeno"]."</a><br>";
					}
				}
				else
				{
					// mysql
					$sql = "DELETE FROM `ospod` WHERE `id` LIKE $id;";
					if(mysql_query($sql,$spojeni)) echo "Data byla odstraněna.";
					else echo "Vyslitla se chyba!";
					
				}
			}
			if ($p == "podrobnosti")
			{
				$sql = "SELECT * FROM `$db`.`ospod` WHERE `id` = $id";
				$query = mysql_query($sql, $spojeni);
				$d = mysql_fetch_array($query);
				echo "	
					<p><a href='upravit_ospod.php?id=".$d["id"]."'>upravit</a>
					<p>Jméno
					<br>".$d["jmeno"]."
					<p>Adesa
					<br>".$d["ulice"]."
					<br>".$d["psc"]." ".$d["mesto"]."
					<p>Telefon
					<br>".$d["tel"]."
					<p>Fax
					<br>".$d["fax"]."
					<p>Email
					<br>".$d["email"]."
					<p>Organizace
					<br>".$d["organizace"]."
					<p>Další kontakt
					<br>".$d["dalsi_kontakt"]."
				";	
			
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
