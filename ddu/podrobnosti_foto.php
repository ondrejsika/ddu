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
		include "podrobnosti_menu.php";

		$width = 300;

		$file = "files/foto/$id.jpg";
		if(file_exists($file))
		{
			$r = getimagesize($file);
			if ($r[0] > $r[1]) $pomer = 3/4;
			else $pomer = 4/3;
			$height = $width*$pomer;
			echo "<img src='$file' width='$width' height='$height'>";
		}
		else
		{
			echo "<form ENCTYPE='multipart/form-data' action='podrobnosti_foto.php?action=1&id=$id' method='POST'>
			<input type='file' name='file' accept='*'>
			<p><input type='submit' value='ok'>
			
			";
		}
		if ($action == 1)
		{
			$new = "./files/foto/$id.jpg";//".$_FILES['file']['name'];
			//echo $_FILES['file']['type'];
			if(!file_exists($new))
			{
				if (move_uploaded_file($_FILES['file']['tmp_name'], $new))
				{
					header("location: podrobnosti_foto.php?id=$id");
				}
				else
					//$up = "Žádný soubor jste neuploadovali !!!";
					$up = "";
			}
		}
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}
include "footer.php";
?>
