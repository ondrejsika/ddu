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
		$pridat = "pridat_navyky.php";
		include "podrobnosti_menu.php";
		if (!empty($id)){
			if (empty($p))
			{
				// zobrazeni naviku
				echo "<a href='pridat_navyky.php?id=$id'>Přidat návyky</a><p><table width=100% border=0>";
				$sql = "SELECT * FROM `$db`.`naviky` WHERE `id` LIKE $id";
				$query = mysql_query($sql, $spojeni);
				if (mysql_num_rows($query) != 0){
				while($d = mysql_fetch_array($query)){
					echo "
						<tr>
							<td width=30%>
								".$d["droga"]."
							</td>
							<td width=70%>
								".$d["poznamka"]." - 
								 <a href='upravit_navyky.php?id=".$d["id"]."'>Upravit</a>
							</td>
						</tr>
					";
					}}
					else echo "Nemá žádné náviky";
				}
				echo "</table>";
			}
		else echo "Neplatné zadání";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}
include "footer.php";
?>
