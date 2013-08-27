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
		if (user_prava()==0)
		{
		$sql = "DELETE FROM `$db`.`komunitni_kniha` WHERE `komunitni_kniha`.`id` = $id";
		if(mysql_query($sql,$spojeni)) echo "Vymazáno";
		else echo "Vyskitla se chyba";
		echo "<p><a href='podrobnosti_komunitni_kniha.php'>zpět</a>";
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
