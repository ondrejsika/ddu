<?php
	$jmeno = zjisti_jmeno($id);
	$dite_id = $id;
	if(isset($pridat)) $pridat = "<a href='$pridat'>Přidat</a>  | ";
	else $pridat = "";
	if(isset($upravit)) $upravit = "<a href='$upravit'>Upravit</a>  | ";
	else $upravit = "";
	echo "
		<table width=100%>
		<tr>
		<td width='80%'>
			<b>$jmeno</b> |
			<a href='podrobnosti.php?id=$id'>O dítěti</a> |
			<a href='podrobnosti_foto.php?id=$id'>Foto</a> |
			<a href='podrobnosti_fyz_popis.php?id=$id'>Fyzický popis</a> |
			<a href='navyky.php?id=$id'>Návyky</a> |
			<a href='podrobnosti_zpravy.php?id=$id'>Zprávy</a> | 
			<a href='podrobnosti_pobyt.php?id=$id'>Pobyt</a> |
			<a href='podrobnosti_zachyt.php?id=$id'>Záchyt</a> | 
			<a href='podrobnosti_utek.php?id=$id'>Útěk</a> 
		</td>
		<td width='30%' align='right'>
			$pridat
			$upravit
			<a href='vymazat.php?id=$id'>Vymazat</a>
		</td>
		</tr>
		</table>

		<hr size='1' color='black'>
	";//| 
			//<a href='podrobnosti_zaverecne_zpravy.php?id=$id'>Závěrečné zprávy</a>
?>
