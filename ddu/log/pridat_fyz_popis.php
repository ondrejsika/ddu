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
			$get=array("barva_oci","barva_vlasu","styl_vlasu","oblicej","nos","usta","zuby","postava","vousy","vyska","vaha","poznamka","id","zdravotni_stav");
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}
	}
	
	if (empty($id))
	{
		// formular
		$jmena = "";
		$sql = "SELECT * FROM `$tb` ORDER BY `$tb`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$jmena[]=array($d["id"],$d["jmeno"]);
		}
		

		echo "<form action='pridat_fyz_popis.php' method='POST'>
		<p>Jméno:
			<br><select name='id'>
			<option value=''></option>
";
		foreach ($jmena as $value) {
			echo "<option value='".$value[0]."'>".$value[1]."</option>"   ;
		}
	
		echo "
			</select>
			<p>Barva očí:
			<br><select name='barva_oci'>
				<option value=''></option>
				<option value='1'>modrá</option>
				<option value='2'>hnědá</option>
				<option value='3'>zelená</option>
				<option value='4'>šedá</option>
				<option value='5'>šedomodrá</option>
				<option value='6'>hnědozelená</option>
			</select>
      <p>Barva vlasů:
      <br><select name='barva_vlasu'>
				<option value=''></option>
				<option value='1'>blond</option>
				<option value='2'>tmavě blond</option>
				<option value='3'>hnědá</option>
				<option value='4'>černá</option>
				<option value='5'>hnědá s melíry</option>
				<option value='6'>červená</option>
		</select>
    <p>Styl vlasů
     <br><select name='styl_vlasu'>
			<option value=''></option>
			<option value='1'>mikádo</option>
			<option value='2'>krátký</option>
			<option value='3'>číro</option>
			<option value='4'>HC</option>
			<option value='6'>dredy</option>
			<option value='8'>skin</option>
			<option value='9'>polodlouhý - EMO</option>
			<option value='11'>dlouhý</option>
			<option value='12'>krátký, vlnitý</option>
			<option value='13'>dlouhý, kurnatý</option>
			<option value='14'>Travolta</option>
		
</select>

<p>Obličej:
<br><select name='oblicej'>
<option value=''></option>
<option value='1'>oválný</option>
<option value='2'>kulatý</option>
<option value='3'>hranatý</option>
<option value='4'>štíhlý</option>
<option value='5'>drobný</option>
</select>

<p>Nos:
<br><select name='nos'>
<option value=''></option>
<option value='1'>malý</option>
<option value='2'>výrazný</option>
<option value='3'>velký</option>
<option value='4'>střední</option>

</select>

<p>Ústa:
<br><select name='usta'>
<option value=''></option>
<option value='1'>plná</option>
<option value='2'>tenká</option>
<option value='3'>rovná</option>
<option value='4'>malá</option>
<option value='5'>velká</option>
</select>

<p>Zuby:
<br><select name='zuby'>
<option value=''></option>
<option value='1'>pravidelné</option>
<option value='2'>nepravidelné</option>
<option value='3'>zkažené</option>
<option value='4'>kariézní</option>
<option value='5'>defektní</option>
<option value='6'>předkus</option>
</select>

<p>Postava:
<br><select name=postava>
<option value=''></option>
<option value='1'>štíhlá</option>
<option value='2'>sportovní</option>
<option value='3'>silnější</option>
<option value='4'>drobná</option>

<option value='6'>hubená</option>
<option value='7'>obézní</option>
<option value='8'>střední</option>
<option value='9'>statná</option>
</select>

<p>Vousy:
<br><select name='vousy'>
<option value=''></option>
<option value='1'>nemá</option>
<option value='2'>bradka</option>

<option value='3'>knír</option>
<option value='4'>plnovous</option>
<option value='5'>strniště</option>
</select>

<p>Výška:
<br><input type='text' name='vyska'>cm
<p>Váha:
<br><input type='text' name='vaha'>kg
                
<p>Poznámka:
<br><textarea rows='5' name='poznamka' cols='48'></textarea>

<p>Zdravotní stav:
<br><textarea rows='5' name='zdravotni_stav' cols='48'></textarea>

<p><input type='submit' value='ok'>
</form>
		";
	}
	else
	{
		//zapis do db
		
		$sql = "
			INSERT INTO `$db`.`fyz_popis` VALUES (
			'$id','$barva_oci','$barva_vlasu','$styl_vlasu','$oblicej','$nos','$usta','$zuby','$postava','$vousy','$vyska','$vaha','$poznamka','$zdravotni_stav')
		";
		
		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
	}
		/*****/
		include "foot.php";
	}
	else
	{
		header("location: index.php");
	}

?>
