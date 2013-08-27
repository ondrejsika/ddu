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
					/*echo "
				<a href='index.php?p=seznam&r=jmeno&r2=$r2'>jména</a> 
				<a href='index.php?p=seznam&r=rc&r2=$r2'>rc</a> |
				<a href='index.php?p=seznam&r2=desc&r=$r'>sestupne</a> 
				<a href='index.php?p=seznam&r2=asc&r=$r'>vzestupne</a>
			";*/
			
			if (empty($r)) $r = "id";
			if(empty($r2)) $r2 = "ASC";
			
			if ($_GET["razeni"] == 1 or $razeni == ""){
		$r = "rc";
		$s1 = "selected";
	}
	if ($_GET["razeni"] == 2){
		$r = "jmeno";
		$s2 = "selected";
	}
	if ($_GET["razeni"] == 3){ 
		$r = "druh_pobytu";
		$s3 = "selected";
	}
	if ($_GET["razeni"] == 4){ 
		$r = "od";
		$s4 = "selected";
	}
	if ($_GET["razeni"] == 5){ 
		$r = "odesel_dne";
		$s5 = "selected";
	}
	
	if ($_GET["razeni2"] == 2 or $razeni2 == ""){ 
		$r2 = "ASC";
		$sb = "selected";
	}
	if ($_GET["razeni2"]==1){ 
		$r2 = "DESC";
		$sa = "selected";
	}
	
	echo "
		<form action='' method='GET'>
			<select name='razeni' size='1'>
			  <option value='1' $s1>Rodné číslo
			  <option value='2' $s2>Jméno
			  <option value='3' $s3>Druh pobytu
			  <option value='4' $s4>Od
			  <option value='5' $s5>Do
			</select>
			<select name='razeni2' size='1'>
			  <option value='1' $sa>Vzestupně
			  <option value='2' $sb>Sestupně
			</select>
			<input type='submit' value='ok'>
		</form>	
	";		
			

			$sql = "SELECT * FROM `$db`.`$tb` ORDER BY `$tb`.`$r` $r2";
			
			echo "
				<table width=100%>
					<tr>
						<td width=16%>
							Rodné číslo
						</td>
						<td width=16%>
							Jméno
						</td>
						<td width=16%>
							Druh pobytu
						</td>
						<td width=16%>
							Narozen
						</td>
						<td width=16%>
							Od
						</td>
						<td width=16%>
							Do
						</td>
					</tr>
				
			";
			
			$query = mysql_query($sql, $spojeni);
			while ($d = mysql_fetch_array($query)) {
				echo "
					<tr>
						<td width=16%>
							<a href='podrobnosti.php?id=".$d["id"]."'>
							".$d["rc"]."</a>
						</td>
						<td width=16%>
							<a href='podrobnosti.php?id=".$d["id"]."'>
							".$d["jmeno"]."</a>
						</td>
						<td width=16%>
							<a href='podrobnosti.php?id=".$d["id"]."'>
							".$d["druh_pobytu"]."</a>
						</td>
						<td width=16%>
							<a href='podrobnosti.php?id=".$d["id"]."'>
							".$d["rc"]."</a>
						</td>
						<td width=16%>
							<a href='podrobnosti.php?id=".$d["id"]."'>
							".$d["od"]."</a>
						</td>
						<td width=16%>
							<a href='podrobnosti.php?id=".$d["id"]."'>
							".$d["odesel_dne"]."</a>
						</td>
					</tr>
				";
			}
			echo "</table>";
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
