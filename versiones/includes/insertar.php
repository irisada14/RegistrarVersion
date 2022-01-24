<?php

include_once 'conectar.php';
include_once 'conectar.php';
include_once 'conexion.php';

include_once 'ps_config.php';
include_once 'db_connect.php';

$modelo =$_POST["parametro1"];
$trio1 = $_POST["parametro2"];
$trio2 = $_POST["parametro3"];
$trio3 = $_POST["parametro4"];
$valor = $_POST["parametro5"];
$titulo = $_POST["parametro6"];
$slogan = $_POST["parametro7"];
$precio = $_POST["parametro8"];
$central = $_POST["parametro9"];
$tipo = $_POST["parametro10"];
$linea = $_POST["parametro11"];
$versiones = $_POST["parametro15"];
$numero = $_POST['parametro12'];
$carac = $_POST['parametro13'];
$smodelo = $_POST["parametro14"];
$foot = $_POST["parametro16"];

 

switch ($valor) {
 	
		case 'verificar':
			$sqli = ("SELECT modelos.linea, modelos.titulo, modelos.modelo, modelos.versiones, modelos.slogan, modelos.precios,  modelos.central, modelos.tipo, modelos.foot, modelos.trio1, modelos.trio2, modelos.trio3, caracteristicas.numero, caracteristicas.descripcion FROM modelos INNER JOIN caracteristicas
			ON modelos.modelo = caracteristicas.modelo WHERE modelos.modelo = '".$modelo."' ORDER BY caracteristicas.numero ASC ");
			$result = mysql_query($sqli);
			$output = array();
			while($row = mysql_fetch_assoc($result))
			{
			$output[] = $row;
			}
			echo json_encode($output);
			mysql_free_result($result);
		break;


	case 'Paso1':
			$sqli = "INSERT INTO modelos(linea, modelo, versiones, titulo, slogan, precios, central, tipo, foot, trio1, trio2, trio3) VALUES ('".$linea."','".$modelo."','".$versiones."','".$titulo."','".$slogan."','".$precio."','".$central."','".$tipo."','".$foot."','".$trio1."','".$trio2."','".$trio3."')  ";
			$result2 = mysql_query($sqli);
			mysql_free_result($result2);
		break;

	case 'Paso2':
			$sqli = "INSERT INTO caracteristicas(modelo, numero, descripcion) VALUES ('".$smodelo."','".$numero."','".$carac."')  ";
			$result = mysql_query($sqli);
			mysql_free_result($result);
		break;

	case 'Paso3':
			$sqli =  "UPDATE modelos SET linea = '".$linea."',
			modelo = '".$modelo."',
			versiones = '".$versiones."',
			titulo = '".$titulo."',
			slogan = '".$slogan."',
			precios = '".$precio."',
			central = '".$central."',
			tipo = '".$tipo."',
			foot = '".$foot."',
			trio1 = '".$trio1."',
			trio2 = '".$trio2."',
			trio3 = '".$trio3."'
			WHERE modelo = '".$modelo."'
			";
			  $result = mysql_query($sqli);
			  mysql_free_result($result);

			$sqli =  "UPDATE caracteristicas SET descripcion = '".$carac."' WHERE modelo = '".$modelo."' AND numero = '".$numero."'";
			$result = mysql_query($sqli);
			mysql_free_result($result);
		break;

	case 'selectcarac':

$sqli = ("SELECT * FROM caracteristicas WHERE modelo = '".$modelo."' ORDER BY numero ASC");
		$result = mysql_query($sqli);
			$output = array();
			while($row = mysql_fetch_assoc($result))
			{
			$output[] = $row;
			}
			echo json_encode($output);
			mysql_free_result($result);
		break;

}




?>