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
		include "podrobnosti_menu.php";
		include "podrobnosti_zpravy_menu.php";
		include "fce/podrobnosti_fyz_popis.fce.php";
		echo "<font size=4>Závěrečné zprávy</font>";
		$sql = "SELECT * FROM `$db`.`zaverecne_zpravy` WHERE `id` LIKE $id";
		$query = mysql_query($sql, $spojeni);
		if (mysql_num_rows($query) != 0){
		while($d = mysql_fetch_array($query)){
		$u = $d["user"];
		if($u == 1) $u = "Sociální pracovnice";
		if($u == 2) $u = "Psycholog";
		if($u == 3) $u = "Etoped";
		if($u == 4) $u = "Zdravotnice";
		echo "
			<p><b>".$u."</b>
			<br>".$d["zprava"]."
			<br><a href='upravit_zaverecne_zpravy.php?id=$id&u=".$d["user"]."'>Upravit</a>
		";
		}
		
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
