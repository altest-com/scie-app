<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
require("../../conexion.php"); 

$FECHA = $_POST['FECHA'];
$FECHA1 = $FECHA." 00:00:01";
$FECHA2 = $FECHA." 23:59:59";



$conexion->set_charset("utf8");

/* "SELECT CANDIDATOS.ID_CANDIDATO, ID_EVALUACION, CONCAT(PRIMER_NOMBRE, \" \", SEGUNDO_NOMBRE, \" \", PRIMER_APELLIDO, \" \", SEGUNDO_APELLIDO) AS NOMBRE, FROM CANDIDATOS JOIN EVALUACION ON(CANDIDATOS.ID_CANDIDATO = EVALUACION.ID_CANDIDATO) WHERE $PRUEBA = '$FECHA'"
*/
	if ($result = $conexion->query("SELECT * FROM medico_bitacora1 T INNER JOIN candidatos C ON C.ID_CANDIDATO = T.ID_CANDIDATO INNER JOIN evaluacion E ON E.ID_CANDIDATO = T.ID_CANDIDATO WHERE E.FECHA_EXAMEN_TOXICOLOGICO BETWEEN '$FECHA1' AND '$FECHA2'")) {

		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    	}
    	echo json_encode($myArray,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    	$result -> close();

    }

$conexion -> close();
?>