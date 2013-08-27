<?php
session_start();

function login()
{ // BEGIN function f_login
session_register("logon");
$_SESSION["logon"] = 1;
} // END function f_login

function logon()
{ // BEGIN function f_logon
$log = $_SESSION["logon"];
if ($log == 1):
  return true;
else:
  return false;
endif;
} // END function f_logon

function logout()
{ // BEGIN function f_logout
$_SESSION["logon"] = 0;
} // END function f_logout

function user_reg($user)
{ // BEGIN function user_reg
session_register("user");
$_SESSION["user"] = $user;
} // END function user_reg

function user_prava_reg($user)
{ // BEGIN function user_reg
include "mysql_conect.php";
$sql = "SELECT * FROM `$db`.`user` WHERE `name` LIKE '$user'";
$query = mysql_query($sql, $spojeni);
$d = mysql_fetch_array($query);
session_register("user_prava");
$_SESSION["user_prava"] = $d["prava"];
} // END function user_reg

function user()
{ // BEGIN function user
return $_SESSION["user"];
} // END function user

function user_prava()
{ // BEGIN function user
return $_SESSION["user_prava"];
} // END function user

function je_admin($name,$pass)
{ // BEGIN function je_admin
include "mysql_conect.php";
$sql = "SELECT * FROM `$db`.`user` WHERE `name` LIKE '$name'";
$query = mysql_query($sql, $spojeni);
if (mysql_num_rows($query) == 1)
{
	$d = mysql_fetch_array($query);
	if($pass == $d["pass"]) return true;
	else return false;
}
else return false;
} // END function je_admin

?>
