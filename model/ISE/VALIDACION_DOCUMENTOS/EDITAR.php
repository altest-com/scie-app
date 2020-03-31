<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php");


$ID_EVALUACION = $_POST['ID_EVALUACION'];
$TIPO = $_POST['TIPO'];
$OFICIO_E = $_POST['OFICIO_E'];
$OFICIO_R = $_POST['OFICIO_R'];

/*"INSERT INTO ASISTENCIA VALUES ('$ID_CANDIDATO', '$ID_EVALUACION', '$NOMBRE','$PRUEBA' ,'$FECHA', '$ASISTENCIA')"*/
		$sql = "UPDATE CERTIFICADOS SET OFICIO_ENVIO = '$OFICIO_E', OFICIO_RECEPCION = '$OFICIO_R' WHERE ID_EVALUACION ='$ID_EVALUACION' AND TIPO_CERTIFICADO = '$TIPO'";

                $conexion->set_charset("utf8");
                if ($conexion->query($sql) === TRUE) {
                    $isUpdateSuccessfully = "true";
                } else {
                    $isUpdateSuccessfully = "false";
                }
                $conexion->close();
                if($isUpdateSuccessfully){
                    echo "true";
                }
?>