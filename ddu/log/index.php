<?php
	// nidb
	// (c) nial group, Ondrej Sika

	// included files
	include "mysql_conect.php";
	include "header.php";
	include "get.php";
	include "fce.php";
	include "log_fce.php";
	
	if(empty($task)) $task_text = "";
	if($task == 1) $task_text = "<font color='red'>Bylo zadáno špatné jméno nebo heslo!</font>";
	
	// main
	if(empty($name) or empty($pass))
	{
		// formular
		
		echo "
			<form action='index.php' method='POST'>
			<center>
				<table width='400'>
					<tr>
						<td width='400'>
							DDU a SVP Plzeň
						</td>
					</tr>
				</table>
				<table width='400'>
					<tr>
						<td width='200'>
							<input type='text' size='20' name='name'>
						</td>
						<td width='200'>
							jméno
						</td>
					</tr>
					<tr>
						<td width='200'>
							<input type='password' size='20' name='pass'>
						</td>
						<td width='200'>
							heslo
						</td>
					</tr>
				</table>
				<table width='400'>
					<tr>
						<td width='400'>
							<input type='submit' value='Přihlaš'>
						</td>
					</tr>
					<tr>
						<td width='400'>
							$task_text
						</td>
					</tr>
				</table>
			</center>
		";
	}
	else
	{
		// prihlaseni
		if (je_admin($name,$pass))
		{
			login();
			user_reg($name);
			user_prava_reg($name);
			header("location: home.php");
		}
		else
		{
			header("location: index.php?task=1");
		}
	}
?>
