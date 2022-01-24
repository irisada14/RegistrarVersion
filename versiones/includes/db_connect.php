<?php
error_reporting(E_ERROR);
include_once 'ps_config.php'; 

          $link = mysql_connect(HOST, USER, PASSWORD); 
                  mysql_select_db(DATABASE, $link);

$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
if ($mysqli->connect_error) {
    header("Location: ../error.php?err=No se puede conectar al servidor");
    exit();
}



?>