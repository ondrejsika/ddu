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
		if(empty($poznamka))
		{
			echo "
				<form action='upravit_zaverecne_zpravy.php?id=$id&u=$u' method='POST'>
			";
			$sql = "SELECT * FROM `$db`.`zaverecne_zpravy` WHERE `id` LIKE $id and `user` like '$u'";
			$query = mysql_query($sql, $spojeni);
			if (mysql_num_rows($query) != 0)
			{
				$d = mysql_fetch_array($query);
				$u = $d["user"];
				if($u == 1) $u = "Sociální pracovnice";
				if($u == 2) $u = "Psycholog";
				if($u == 3) $u = "Etoped";
				if($u == 4) $u = "Zdravotnice";
				echo "
					<p><b>".$u."</b>
					<p><textarea rows='7' name='poznamka' cols='48'>".$d["zprava"]."</textarea>
					<p><input type='submit' value='ok'>
				";
			}
			echo "</form>";
		}
		else
		{
			$sql = "UPDATE `$db`.`zaverecne_zpravy` SET `zprava` = '$poznamka ' WHERE  `zaverecne_zpravy`.`id` = $id and `user` = $u";
			if(mysql_query($sql,$spojeni)) echo "Upraveno.";
			else echo "Vyskitla se chyba! Neupraveno!";
			echo "<p><a href='podrobnosti_zaverecne_zpravy.php?id=$id'>Závěrečné zprávy</a>";
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
