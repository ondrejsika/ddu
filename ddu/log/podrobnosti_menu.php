<?php
	$jmeno = zjisti_jmeno($id);
	
	echo "
		<table width=100%>
		<tr>
		<td width='80%'>
			<b>$jmeno</b> |
			<a href='podrobnosti.php?id=$id'>O dítěti</a> |
			<a href='podrobnosti_fyz_popis.php?id=$id'>Fyzický popis</a> |
			<a href='naviky.php?id=$id'>Náviky</a> |
			<a href='podrobnosti_vstupni_zpravy.php?id=$id'>Vstupní zprávy</a> | 
			<a href='podrobnosti_pobyt.php?id=$id'>Pobyt</a>
		</td>
		<td width='30%' align='right'>
			<a href='upravit.php'>Upravit</a>  | 
			<a href='vymazat.php?id=$id'>Vymazat</a>
		</td>
		</tr>
		</table>

		<hr size='1' color='black'>
	";
?>
