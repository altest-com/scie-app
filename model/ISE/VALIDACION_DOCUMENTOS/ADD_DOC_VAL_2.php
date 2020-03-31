<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$CURP = $_POST['CURP'];

$sqlCheck = "SELECT EXISTS(SELECT * FROM VALIDACION_DOCUMENTOS WHERE ID_EVALUACION = '$ID_EVALUACION' LIMIT 1) AS MY_CHECK";
$result = $conexion->query($sqlCheck);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (strcmp($row["MY_CHECK"], "0") == 0) {
        	$sql = ("INSERT INTO VALIDACION_DOCUMENTOS (ID_CANDIDATO, ID_EVALUACION, CURP) VALUES('$ID_CANDIDATO', '$ID_EVALUACION', '$CURP')");
            $conexion->set_charset("utf8");
            if ($conexion->query($sql) === TRUE) {
                echo "true";
            } else {
                echo "false";
            }
        }
        else {
        	echo "true";
        }
    }
} else {
    echo "0 results";
    echo "true";
}

$conexion->close();
?>