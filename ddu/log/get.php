<?php
// GET promene
// (c) nial group

$get=array("p","id","razeni","razeni2","task");
foreach ($get as $value) {
	if (isset($_GET[$value])) {
		$$value = $_GET[$value];
	}
	else {
		$$value = "";
	}
}

$post=array("name","pass","jmeno");
foreach ($post as $value) {
	if (isset($_POST[$value])) {
		$$value = $_POST[$value];
	}
	else {
		$$value = "";
	}
}
?>
