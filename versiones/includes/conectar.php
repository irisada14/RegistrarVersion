<?php 
function conectar($Mode,$Query,$arreglo = array()){
	
	$u="root";
	$p="1234";
	$s="localhost";
	$db="bd1";

	$DBH = new PDO("mysql:host=".$s.";dbname=".$db.";charset=utf8", $u, $p, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));

	switch ($Mode) 
	{
		case 'exec':
			$STH = $DBH->prepare($Query);
			$STH->setFetchMode(PDO::FETCH_ASSOC);
			$STH->execute($arreglo);
			$STH->closeCursor();
			return $Result;
		break;

		case 'simple':
			$STH = $DBH->prepare($Query);
    		$STH->setFetchMode(PDO::FETCH_ASSOC);
			$STH->execute($arreglo);
			$Result = $STH->fetch();
			$STH->closeCursor();
			return $Result;
		break;

		case 'multiple':
			$STH = $DBH->prepare($Query);
    		$STH->setFetchMode(PDO::FETCH_ASSOC);
			$STH->execute($arreglo);
			$Result = $STH->fetchAll();
			$STH->closeCursor();
			return $Result;
		break;					
	}

}


 ?>