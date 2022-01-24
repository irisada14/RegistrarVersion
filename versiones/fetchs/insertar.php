<?php

include_once 'includes/ps_config.php';
include_once 'includes/db_connect.php';
//include_once 'includes/functions.php';
include_once 'includes/conectar.php';
include_once 'includes/conexion.php';
sec_session_start();

$modelo = $_POST["parametro1"];
$trio1 = $_POST["parametro2"];
$trio2 = $_POST["parametro3"];
$trio2 = $_POST["parametro4"];
$valor = $_POST["parametro5"];
//$numero = $_POST['parametro6'];
//$carac = $_POST['parametro7'];
if ($insert_stmt = $mysqli->prepare("INSERT INTO trio (modelo, trio1, trio2, trio3) VALUES (?, ?, ?, ?)")) {
			$insert_stmt->bind_param('ssss', $modelo, $trio1, $trio2, $trio3);
			if (! $insert_stmt->execute()) {
			header('Location: index.php?error='.$error_msg.'.');
			exit();
			}
			//mysql_free_result($insert_stmt);

			}

			header('Location: ad_modelo.php');
			include 'ad_versiones.php'; //se debe crear un html que confirma el envío

			/*
switch ($valor) {
	case 'Paso1':
if ($insert_stmt = $mysqli->prepare("INSERT INTO trio (modelo, trio1, trio2, trio3) VALUES (?, ?, ?, ?)")) {
			$insert_stmt->bind_param('ssss', $modelo, $trio1, $trio2, $trio3);
			if (! $insert_stmt->execute()) {
			header('Location: index.php?error='.$error_msg.'.');
			exit();
			}
			mysql_free_result($insert_stmt);

			}

			header('Location: ad_modelo.php');
			include 'ad_versiones.php'; //se debe crear un html que confirma el envío

		break;

	case 'Paso2':

			if ($insert_stmt = $mysqli->prepare("INSERT INTO columna (modelo, numero, descripcion) VALUES (?, ?, ?)")) {
			$insert_stmt->bind_param('sss', $modelo, $version, $descripcion);
			if (! $insert_stmt->execute()) {
			header('Location: index.php?error='.$error_msg.'.');
			exit();
			}
			mysql_free_result($insert_stmt);

			}

			header('Location: ad_modelo.php');
			include 'ad_versiones.php'; //se debe crear un html que confirma el envío


		break;

}
*/

?>