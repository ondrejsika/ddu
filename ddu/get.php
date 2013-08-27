<?php
// GET promene
// (c) nial group

$get=array("p","id","razeni","razeni2","task","action","u","k");
foreach ($get as $value) {
	if (isset($_GET[$value])) {
		$$value = $_GET[$value];
	}
	else {
		$$value = "";
	}
}

$post=array("name","pass","jmeno","poznamka","odstran");
foreach ($post as $value) {
	if (isset($_POST[$value])) {
		$$value = $_POST[$value];
	}
	else {
		$$value = "";
	}
}

$var=array("razeni","razeni2","s1","s2","s3","s4","s5","sa","sb");
foreach ($var as $value) {
	$$value = "";
}

?>
