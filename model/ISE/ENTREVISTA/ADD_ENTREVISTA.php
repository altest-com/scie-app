<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conexion.php");

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];
$ID_EVALUACION = $_POST['ID_EVALUACION'];
$CURP = $_POST['CURP'];
$FUNCIONES = $_POST['FUNCIONES'];
$SUELDO = $_POST['SUELDO'];
$DEUDAS = $_POST['DEUDAS'];
$SITUACION_PATRIMONIAL = $_POST['SITUACION_PATRIMONIAL'];
$ANT_DEL_SANC_ADMIN = $_POST['ANT_DEL_SANC_ADMIN'];
$VALIDACION_DOCUMENTAL = $_POST['VALIDACION_DOCUMENTAL'];
$OTROS_ASPECTOS_RELEVANTES = $_POST['OTROS_ASPECTOS_RELEVANTES'];
$DIAGNOSTICO_PRELIMINAR = $_POST['DIAGNOSTICO_PRELIMINAR'];
$SINTESIS_TECNICA = $_POST['SINTESIS_TECNICA'];

//printf("%s\n, %s\n, %s\n, %s\n, %s\n, %s\n, %s\n, %s\n, %s\n, %s\n, %s\n, %s\n", $ID_CANDIDATO, $ID_EVALUACION, $CURP, $FUNCIONES, $SUELDO, $DEUDAS, $SITUACION_PATRIMONIAL, $ANT_DEL_SANC_ADMIN, $VALIDACION_DOCUMENTAL, $OTROS_ASPECTOS_RELEVANTES, $DIAGNOSTICO_PRELIMINAR, $SINTESIS_TECNICA);

$sqlCheck = "SELECT EXISTS(SELECT * FROM ENTREVISTA WHERE ID_EVALUACION = '$ID_EVALUACION' LIMIT 1) AS MY_CHECK";
$result = $conexion->query($sqlCheck);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (strcmp($row["MY_CHECK"], "0") == 0) {
            //echo $row["MY_CHECK"];
        	$sql = ("INSERT INTO ENTREVISTA(ID_CANDIDATO, ID_EVALUACION, CURP, FUNCIONES, SUELDO, DEUDAS, SITUACION_PATRIMONIAL, ANT_DEL_SANC_ADMIN, VALIDACION_DOCUMENTAL, OTROS_ASPECTOS_RELEVANTES, DIAGNOSTICO_PRELIMINAR, SINTESIS_TECNICA) VALUES('$ID_CANDIDATO', '$ID_EVALUACION', '$CURP', '$FUNCIONES', '$SUELDO', '$DEUDAS', '$SITUACION_PATRIMONIAL', '$ANT_DEL_SANC_ADMIN', '$VALIDACION_DOCUMENTAL', '$OTROS_ASPECTOS_RELEVANTES', '$DIAGNOSTICO_PRELIMINAR', '$SINTESIS_TECNICA')");

            $conexion->set_charset("utf8");

            if ($conexion->query($sql) === TRUE) {
                echo "true";
            } else {
                echo "false";
            }
        }
        else {
        	$sql = ("UPDATE ENTREVISTA SET FUNCIONES = '$FUNCIONES', SUELDO = '$SUELDO', DEUDAS = '$DEUDAS', SITUACION_PATRIMONIAL = '$SITUACION_PATRIMONIAL', ANT_DEL_SANC_ADMIN = '$ANT_DEL_SANC_ADMIN', VALIDACION_DOCUMENTAL = '$VALIDACION_DOCUMENTAL', OTROS_ASPECTOS_RELEVANTES = '$OTROS_ASPECTOS_RELEVANTES', DIAGNOSTICO_PRELIMINAR = '$DIAGNOSTICO_PRELIMINAR', SINTESIS_TECNICA = '$SINTESIS_TECNICA' WHERE ID_EVALUACION = '$ID_EVALUACION'");

            $conexion->set_charset("utf8");

            if ($conexion->query($sql) === TRUE) {
                echo "true";
            } else {
                echo "false";
            }
        }
    }
} else {
    echo "0 results";
    echo "true";
}
$conexion->close();
?>