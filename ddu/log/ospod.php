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
			if (empty($p))
			{
				// zobrazení OSPOD
				$sql = "SELECT * FROM `$db`.`ospod`";
				$query = mysql_query($sql, $spojeni);
				while ($d = mysql_fetch_array($query)) {
					echo $d["jmeno"]."<br>";
				}
			}
			if ($p == "pridat")
			{
				if (empty($jmeno))
	{
		// formular
		echo "
			<form action='pridat_ospod.php' method='POST'>
			<p>Jméno:
			<br><input type='text' size='20' name='jmeno' value=''>
			<p>Příjmení:
			<br><input type='text' size='20' name='prijmeni' value=''>
			<p><input type='submit' value='ok'>
			</form>
		";
	}
	else
	{
		//zapis do db
		$id = id("ospod");
		$jmeno = $_POST["prijmeni"] . ", " . $jmeno;
		$sql = "INSERT INTO `$db`.`ospod` VALUES ('$id','$jmeno')";
		
		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
	}
			}
			if ($p == "vymazat")
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
		
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
