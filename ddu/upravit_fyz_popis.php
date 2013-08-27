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
		$id2 = $id;
			
	
	
	if (empty($k))
	{
		// formular
		$jmena = "";
		$sql = "SELECT * FROM `$tb` ORDER BY `$tb`.`jmeno` ASC";
		$query = mysql_query($sql, $spojeni);
		while($d = mysql_fetch_array($query))
		{
			$jmena[]=array($d["id"],$d["jmeno"]);
		}
		$sql = "SELECT * FROM `$db`.`fyz_popis` WHERE `id` = $id2";
		$query = mysql_query($sql,$spojeni);
		$d = mysql_fetch_array($query);

		echo "<form action='upravit_fyz_popis.php?k=2' method='POST'>
		

<table width=100% border='0'>
<tr valign='top'>
<td width='50%'>
<input type='hidden' name='id' value='$id2'>

";
for($i = 1;$i<15;$i++){ 
$p = "s$i";
if($d["barva_oci"] == $i)
{
	$$p = "SELECTED";
}
else $$p = "";
}
echo "
			<p>Barva očí:
			<br><select name='barva_oci'>
				<option value=''></option>
				<option value='1' $s1>modrá</option>
				<option value='2' $s2>hnědá</option>
				<option value='3' $s3>zelená</option>
				<option value='4' $s4>šedá</option>
				<option value='5' $s5>šedomodrá</option>
				<option value='6' $s6>hnědozelená</option>
			</select>
";
for($i = 1;$i<15;$i++){ 
$p = "s$i";
if($d["barva_vlasu"] == $i)
{
	$$p = "SELECTED";
}
else $$p = "";
}
echo "
      <p>Barva vlasů:
      <br><select name='barva_vlasu'>
				<option value=''></option>
				<option value='1' $s1>blond</option>
				<option value='2' $s2>tmavě blond</option>
				<option value='3' $s3>hnědá</option>
				<option value='4' $s4>černá</option>
				<option value='5' $s5>hnědá s melíry</option>
				<option value='6' $s6>červená</option>
		</select>
";
for($i = 1;$i<16;$i++){ 
$p = "s$i";
if($d["stil_vlasu"] == $i)
{
	$$p = "SELECTED";
}
else $$p = "";
}
echo "
    <p>Styl vlasů
     <br><select name='stil_vlasu'>
			<option value=''></option>
			<option value='1' $s1>mikádo</option>
			<option value='2' $s2>krátký</option>
			<option value='3' $s3>číro</option>
			<option value='4' $s4>HC</option>
			<option value='6' $s6>dredy</option>
			<option value='8' $s8>skin</option>
			<option value='9' $s9>polodlouhý - EMO</option>
			<option value='11' $s11>dlouhý</option>
			<option value='12' $s12>krátký, vlnitý</option>
			<option value='13' $s13>dlouhý, kurnatý</option>
			<option value='14' $s14>Travolta</option>
		
</select>
";
for($i = 1;$i<15;$i++){ 
$p = "s$i";
if($d["oblicej"] == $i)
{
	$$p = "SELECTED";
}
else $$p = "";
}
echo "
<p>Obličej:
<br><select name='oblicej'>
<option value=''></option>
<option value='1' $s1>oválný</option>
<option value='2' $s2>kulatý</option>
<option value='3' $s3>hranatý</option>
<option value='4' $s4>štíhlý</option>
<option value='5' $s5>drobný</option>
</select>
";
for($i = 1;$i<15;$i++){ 
$p = "s$i";
if($d["nos"] == $i)
{
	$$p = "SELECTED";
}
else $$p = "";
}
echo "
<p>Nos:
<br><select name='nos'>
<option value=''></option>
<option value='1' $s1>malý</option>
<option value='2' $s2>výrazný</option>
<option value='3' $s3>velký</option>
<option value='4' $s4>střední</option>

</select>
";
for($i = 1;$i<15;$i++){ 
$p = "s$i";
if($d["usta"] == $i)
{
	$$p = "SELECTED";
}
else $$p = "";
}
echo "
<p>Ústa:
<br><select name='usta'>
<option value=''></option>
<option value='1' $s1>plná</option>
<option value='2' $s2>tenká</option>
<option value='3' $s3>rovná</option>
<option value='4' $s4>malá</option>
<option value='5' $s5>velká</option>
</select>
";
for($i = 1;$i<15;$i++){ 
$p = "s$i";
if($d["zuby"] == $i)
{
	$$p = "SELECTED";
}
else $$p = "";
}
echo "
<p>Zuby:
<br><select name='zuby'>
<option value=''></option>
<option value='1' $s1>pravidelné</option>
<option value='2' $s2>nepravidelné</option>
<option value='3' $s3>zkažené</option>
<option value='4' $s4>kariézní</option>
<option value='5' $s5>defektní</option>
<option value='6' $s6>předkus</option>
</select>


</td>
<td width='50%'>
";
for($i = 1;$i<15;$i++){ 
$p = "s$i";
if($d["postava"] == $i)
{
	$$p = "SELECTED";
}
else $$p = "";
}
echo "
<p>Postava:
<br><select name=postava>
<option value=''></option>
<option value='1' $s1>štíhlá</option>
<option value='2' $s2>sportovní</option>
<option value='3' $s3>silnější</option>
<option value='4' $s4>drobná</option>

<option value='6' $s6>hubená</option>
<option value='7' $s7>obézní</option>
<option value='8' $s8>střední</option>
<option value='9' $s9>statná</option>
</select>
";
for($i = 1;$i<15;$i++){ 
$p = "s$i";
if($d["vousy"] == $i)
{
	$$p = "SELECTED";
}
else $$p = "";
}
echo "
<p>Vousy:
<br><select name='vousy'>
<option value=''></option>
<option value='1' $s1>nemá</option>
<option value='2' $s2>bradka</option>

<option value='3' $s3>knír</option>
<option value='4' $s4>plnovous</option>
<option value='5' $s5>strniště</option>
</select>

<p>Výška:
<br><input type='text' name='vyska' value='".$d["vyska"]."'>cm
<p>Váha:
<br><input type='text' name='vaha' value='".$d["vaha"]."'>kg
                
<p>Poznámka:
<br><textarea rows='3' name='poznamka' cols='48'>".$d["poznamka"]."</textarea>

<p>Zdravotní stav:
<br><textarea rows='3' name='zdravotni_stav' cols='48'>".$d["zdravotni_stav"]."</textarea>

<p><input type='submit' value='ok'>


</td>
</tr>
</table></form>
		";
	}
	else
	{
		//zapis do db
		$get=array("id","barva_oci","barva_vlasu","stil_vlasu","oblicej","nos","usta","zuby","postava","vousy","vyska","vaha","poznamka","id","zdravotni_stav");
	foreach ($get as $value) {
		if (isset($_POST[$value])) {
			$$value = $_POST[$value];
		}
		else {
			$$value = "";
		}}
		$sql = "
			UPDATE `dduplzencz`.`fyz_popis` SET `barva_oci` =  '$barva_oci',
			`barva_vlasu` = '$barva_vlasu',
			`stil_vlasu` = '$stil_vlasu',
			`oblicej` = '$oblicej',
			`nos` = '$nos',
			`usta` = '$usta',
			`zuby` = '$zuby',
			`postava` = '$postava',
			`vousy` = '$vousy',
			`vyska` = '$vyska',
			`vaha` = '$vaha',
			`poznamka` = '$poznamka',
			`zdravotni_stav` = '$zdravotni_stav' WHERE `fyz_popis`.`id` = $id;
		";
		
		if(mysql_query($sql, $spojeni))
		{
			echo "Data  upesne pridana.";
		}
		else
		{
			echo "Vyskitla se chyba!";
		}
		echo "<p><a href='podrobnosti_fyz_popis.php?id=$id'>zpět</a>";
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
