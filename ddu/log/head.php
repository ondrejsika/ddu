<?php
	// nidb
	// (c) nial group, Ondrej Sika

	$user = user();
	$prava = user_prava();

	echo "
		<table width='100%' border='0'>
			<tr>
				<td width='55%' align='left'>
					<a href='home.php'>Home</a> | 
					<a href='seznam.php'>Zobrazit</a> | 
					<a href='search.php'>Vyhledávání</a> | 
					<a href='pridat.php'>Přidat</a> |
					<a href='ospod.php'>OSPOD</a>
					
				</td>
				<td width='45%' align='right'>
					přihlášen jako: <b>$user</b> |
					<a href='logout.php'>odhlásit se</a>
				</td>
			</tr>
		</table>
		<hr size='1' color='black'>
	";
?>
