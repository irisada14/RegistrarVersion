<?php 
//Conexion

$server = "localhost";
$user = "root";
$password = "1234";
$DB = "bd1";

// hacer la conexion
$con = mysql_connect($server,$user,$password) or die (mysql_error());
// buscar la base de datos.
$sdb = mysql_select_db($DB,$con) or die ("no se encontro la base de datos");

 ?>