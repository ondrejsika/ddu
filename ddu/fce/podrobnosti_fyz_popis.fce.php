<?php
	// nidb
	// (c) nial group, Ondrej Sika
	
	function barva_oci($a)
	{
		if ($a == "") return "";
		if ($a == 1) return "modrá";
		if ($a == 2) return "hnědá";
		if ($a == 3) return "zelená";
		if ($a == 4) return "šedá";
		if ($a == 5) return "šedomodrá";
		if ($a == 6) return "hnědozelená";
	}

	function barva_vlasu($a)
	{
		if ($a == "") return "";
		if ($a == 1) return "blond";
		if ($a == 2) return "tmavě blond";
		if ($a == 3) return "hnědá";
		if ($a == 4) return "černá";
		if ($a == 5) return "hnědá s melíry";
		if ($a == 6) return "červená";
	}

	function styl_vlasu($a)
	{
		if ($a == "") return "";
		if ($a == 1) return "mikádo";
		if ($a == 2) return "krátký";
		if ($a == 3) return "číro";
		if ($a == 4) return "HC";
		if ($a == 5) return "dredy";
		if ($a == 6) return "skin";
		if ($a == 11) return "dlouhý";
		if ($a == 12) return "krátký, vlnitý";
		if ($a == 13) return "dlouhý, kudrnatý";
		if ($a == 14) return "Travolta";
	}

	function oblicej($a)
	{
		if ($a == "") return "";
		if ($a == 1) return "oválný";
		if ($a == 2) return "kulatý";
		if ($a == 3) return "hranatý";
		if ($a == 4) return "štíhlý";
		if ($a == 5) return "drobný";
	}

	function nos($a)
	{
		if ($a == "") return "";
		if ($a == 1) return "malý";
		if ($a == 2) return "výrazný";
		if ($a == 3) return "velký";
		if ($a == 4) return "střední";
	}

	function usta($a)
	{
		if ($a == "") return "";
		if ($a == 1) return "plná";
		if ($a == 2) return "tenká";
		if ($a == 3) return "rovná";
		if ($a == 4) return "malá";
		if ($a == 5) return "velká";
	}

	function zuby($a)
	{
		if ($a == "") return "";
		if ($a == 1) return "pravidelné";
		if ($a == 2) return "nepravidelné";
		if ($a == 3) return "zkažené";
		if ($a == 4) return "kariézní";
		if ($a == 5) return "defektní";
		if ($a == 6) return "předkus";
	}

	function postava($a)
	{
		if ($a == "") return "";
		if ($a == 1) return "štíhlá";
		if ($a == 2) return "sportovní";
		if ($a == 3) return "silnější";
		if ($a == 6) return "hubená";
		if ($a == 7) return "obézní";
		if ($a == 8) return "střední";
		if ($a == 9) return "statná";
	}

	function vousy($a)
	{
		if ($a == "") return "";
		if ($a == 1) return "nemá";
		if ($a == 2) return "bradka";
		if ($a == 3) return "knír";
		if ($a == 4) return "plnovous";
		if ($a == 5) return "strniště";
	}
?>
