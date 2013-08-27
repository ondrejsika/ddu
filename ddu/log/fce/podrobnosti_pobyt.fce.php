<?php
	// nidb
	// (c) nial group, Ondrej Sika
	
	function druh_pobytu($a)
	{
		if ($a == "") return "";
		if ($a == 1) return "Předběžné opatření";
		if ($a == 2) return "Ústavní výchova";
		if ($a == 3) return "Ochranná výchova";
		if ($a == 4) return "Dobrovolný pobyt";
		if ($a == 5) return "Rediagnostika";
	}

	
?>

	<option value=''></option>
			<option value='1'></option>
			<option value='2'></option>
			<option value='3'></option>
			<option value='4'></option>
			<option value='5'></option>
			</select>

