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
		include "fce/komunitni_kniha.fce.php";
			echo komunitni_kniha(0);
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

include "footer.php";
?>