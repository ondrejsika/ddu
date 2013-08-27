<?php
	// nidb
	// (c) nial group, Ondrej Sika
	
	function komunitni_kniha($limit)
	{
		global $db;
		global $spojeni;
		if($limit != 0) $limit = "limit $limit";
		else $limit = "";
		$ret = "";
		$sql = "SELECT * FROM `$db`.`komunitni_kniha` 
ORDER BY `komunitni_kniha`.`time` DESC $limit;";
		$query = mysql_query($sql, $spojeni);
		$i = 0;
		if(mysql_num_rows($query) != 0)
		{
			while($d = mysql_fetch_array($query))
			{
			if($i != 0) $ret = $ret . "<hr size='1' color='black'>";
			$ret = $ret . "
				<p>Uživatel <b>".$d["user"]."</b>
				<br>datum: ".date("j/m/Y H:i:s", $d["time"])."</b>
				<br>text:
				<br>".$d["text"]."
				<br><a href='upravit_komunitni_kniha.php?id=".$d["id"]."'>upravit</a>
			";
			if(user_prava() == 0) 
			$ret = $ret." | <a href='vymazat_komunitni_kniha.php?id=".$d["id"]."'>vymazat</a>";	
			$i++;
			}
		}
		return $ret;
	}	
?>
