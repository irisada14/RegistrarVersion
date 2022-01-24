<?php 

include_once '../includes/ps_config.php';
include_once '../includes/db_connect.php';


$modelo= $_POST['parametro1']; 
$opcion= $_POST['parametro2'];

switch ($opcion) {
    case 'cuantos':
$sqli = "SELECT versiones FROM modelos WHERE modelo='".$modelo."'";
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