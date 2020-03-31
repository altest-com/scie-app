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


		
	if ($result = $conexion->query("SELECT digiscan.ID_CANDIDATO, digiscan.ID_EVALUACION, digiscan.CURP, digiscan.DIGISCAN,digiscan.FECHA, digiscan.DOCUMENTO_DE_IDENTIFICACION, digiscan.NO_DE_DOCUMENTO, digiscan.CIB, digiscan.TIPO_REGISTRO, digiscan.INFORMACION_DE_CONTACTO, digiscan.PELIGROSIDAD, digiscan.ARCHIVO  FROM digiscan WHERE digiscan.ID_EVALUACION = '$ID_EVALUACION'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT);
    	$result -> close();

    }

//	}
	

// 	else{ 


// 	if ($result = $conexion->query("SELECT digiscan.ID_CANDIDATO, digiscan.ID_EVALUACION, digiscan.CURP, digiscan.DIGISCAN,digiscan.FECHA, digiscan.DOCUMENTO_DE_IDENTIFICACION, digiscan.NO_DE_DOCUMENTO, digiscan.CIB, digiscan.TIPO_REGISTRO, digiscan.CLAVE_IDENTIFICACION_DOS, digiscan.CLAVE_IDENTIFICACION_TRES, digiscan.INFORMACION_DE_CONTACTO, digiscan.PELIGROSIDAD, digiscan.ARCHIVO, documentos.NOMBRE_DOCUMENTO FROM digiscan INNER JOIN documentos ON documentos.ID_EVALUACION = digiscan.ID_EVALUACION WHERE digiscan.ID_EVALUACION = '$ID_EVALUACION' ")) {

// 		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
//             $myArray[] = $row;
//     	}
//     	echo json_encode($myArray,JSON_PRETTY_PRINT);
//     	$result -> close();

//     }
// }

$conexion -> close();
?>