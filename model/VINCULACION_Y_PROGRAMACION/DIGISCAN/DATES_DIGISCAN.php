<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$ID_EVALUACION = $_POST['ID_EVALUACION'];

$conexion->set_charset("utf8");
//error_reporting(0);



	$consulta = mysqli_query($conexion,"SELECT ARCHIVO FROM `digiscan`");
	$res=mysqli_fetch_array($consulta);

	//if($res[0] === 'Vacio')
	//{


		
	if ($result = $conexion->query("SELECT * FROM digiscan WHERE digiscan.ID_EVALUACION = '$ID_EVALUACION'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    	$result -> close();

    }

$conexion -> close();
?>