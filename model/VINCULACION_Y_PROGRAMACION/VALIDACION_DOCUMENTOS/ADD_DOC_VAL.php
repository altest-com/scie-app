<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$CURP = $_POST['CURP'];

/*LA CONSULTA SE ENCARGA DE ELIMINAR LA INFORMACIÓN DEL REGISTRO QUE PERTENEZCA A UNA EVALUACIÓN QUE YA TENGA DATOS PARA SOBREESCRIBIR SU
*INFROMACIÓN (UN UPDATE, PERO CREA SI NO EXISTE)
*/
$sqlDel = ("DELETE FROM VALIDACION_DOCUMENTOS WHERE ID_EVALUACION = '$ID_EVALUACION'");
$conexion->set_charset("utf8");
if ($conexion->query($sqlDel) === TRUE) {
   	echo "true";
} else {
    echo "false";
}

//INSERCIÓN DE DATOS EN LA TABLA PLATAFORMA MEXICO
$sql = ("INSERT INTO VALIDACION_DOCUMENTOS (ID_CANDIDATO, ID_EVALUACION, CURP) VALUES('$ID_CANDIDATO', '$ID_EVALUACION', '$CURP')");

	$conexion->set_charset("utf8");

	if ($conexion->query($sql) === TRUE) {
   	 	echo "true";
	} else {
    	echo "false";
}
$conexion->close();

?>