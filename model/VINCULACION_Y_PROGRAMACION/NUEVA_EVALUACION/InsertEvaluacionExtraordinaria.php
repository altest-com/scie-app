<?php
{
    header ("Content-Type: text/html;charset=utf-8");
    include ("../../MySqlConnect.php");
    include ("../../conection.php");
    error_reporting(0);

    $ID_EVALUACION = $_POST['ID_EVALUACION'];
    $ID_EVALUACION_PADRE = $_POST['ID_EVALUACION_PADRE'];
    $FECHA_PRUEBA = $_POST['FECHA_PRUEBA'];
    $DEPARTAMENTO = $_POST['DEPARTAMENTO'];
    $ID = $_POST['ID'];
   	$FOLIO = $_POST['FOLIO'];

    if (isset($ID_EVALUACION) && isset($FECHA_PRUEBA) && isset($DEPARTAMENTO))
    {
        $conexion = new MySqlConnect($db, $user, $pswd);
        $CupoDeEvaluacionesPorDia = (int)$conexion->getSingleValueFromQuery(sprintf("SELECT DISTINCT COUNT(EVALUACION.ID_CANDIDATO) AS ROW FROM EVALUACION WHERE '%s' 
        IN (EVALUACION.FECHA_EXAMEN_TOXICOLOGICO, EVALUACION.FECHA_ISE_DOCUMENTOS, EVALUACION.FECHA_ISE_ENTREVISTA, 
        EVALUACION.FECHA_EXAMEN_PSICOLOGICO, EVALUACION.FECHA_EXAMEN_MEDICO, EVALUACION.FECHA_EXAMEN_POLIGRAFICO);", $FECHA_PRUEBA));
        if ($CupoDeEvaluacionesPorDia < 20)
        {
            // Se puede guardar la fecha porque aun no se llena el limite diario.
            // Recolectar datos de la evaluación con id = 'Id guardado en el campo Evaluación de la que deriva' de la evaluación que se quiere almacenar.
            $ID_CANDIDATO = $conexion->getSingleValueFromQuery(sprintf("SELECT ID_CANDIDATO AS ROW FROM EVALUACION WHERE ID_EVALUACION = '%s'", $ID_EVALUACION_PADRE));
            $FECHA_EVALUACION = $conexion->getSingleValueFromQuery(sprintf("SELECT FECHA_EVALUACION AS ROW FROM EVALUACION WHERE ID_EVALUACION = '%s'", $ID_EVALUACION_PADRE));
            $TIPO_EVALUACION = $conexion->getSingleValueFromQuery(sprintf("SELECT TIPO_EVALUACION AS ROW FROM EVALUACION WHERE ID_EVALUACION = '%s'", $ID_EVALUACION_PADRE));
            $MOTIVO_EVALUACION = $conexion->getSingleValueFromQuery(sprintf("SELECT MOTIVO_EVALUACION AS ROW FROM EVALUACION WHERE ID_EVALUACION = '%s'", $ID_EVALUACION_PADRE));
            $MODO_EVALUACION = $conexion->getSingleValueFromQuery(sprintf("SELECT MODO_EVALUACION AS ROW FROM EVALUACION WHERE ID_EVALUACION = '%s'", $ID_EVALUACION_PADRE));
            $SOLICITANTE = $conexion->getSingleValueFromQuery(sprintf("SELECT SOLICITANTE_DE_EVALUACION AS ROW FROM EVALUACION WHERE ID_EVALUACION = '%s'", $ID_EVALUACION_PADRE));
            $ORIGEN_RECURSOS = $conexion->getSingleValueFromQuery(sprintf("SELECT ORIGEN_DE_RECURSOS AS ROW FROM EVALUACION WHERE ID_EVALUACION = '%s'", $ID_EVALUACION_PADRE));
            $FTOX = "";
            $FISEDOC = "";
            $FISEENT = "";
            $FPSICO = "";
            $FMED = "";
            $FPOL = "";
            $ESTATUS = 0;
            $NUMERO_OFICIO = "";
            $FECHA_OFICIO = "";
            $AUTORIZACION = "FF";
            $OBSERVACIONES = "";

            $addEvEx = sprintf("INSERT INTO EVALUACION VALUES ('%s', '%s','%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', %d, '%s', '%s', '%s', '%s', '%s');", 
            $ID_EVALUACION, $ID_CANDIDATO,$FOLIO, $FECHA_EVALUACION, $TIPO_EVALUACION, $MOTIVO_EVALUACION, $MODO_EVALUACION, $SOLICITANTE, $ORIGEN_RECURSOS, $FTOX, $FISEDOC,
            $FISEENT, $FPSICO, $FMED, $FPOL, $ESTATUS, $NUMERO_OFICIO, $FECHA_OFICIO, $ID_EVALUACION_PADRE, $AUTORIZACION, $OBSERVACIONES);
            $updateFecha = sprintf("UPDATE EVALUACION SET %s = '%s' WHERE ID_EVALUACION = '%s';", $DEPARTAMENTO, $FECHA_PRUEBA, $ID_EVALUACION);
            $insertInt = sprintf("INSERT INTO integracion VALUES('%s','%s','%s',(SELECT CONCAT(PRIMER_APELLIDO, ' ', SEGUNDO_APELLIDO, ' ', PRIMER_NOMBRE, ' ', SEGUNDO_NOMBRE) FROM CANDIDATOS WHERE ID_CANDIDATO LIKE '%s'), '%d','%d','%d','%d','%d','%d','%d');", $ID_CANDIDATO, $ID_EVALUACION, $FECHA_EVALUACION,$ID_CANDIDATO,1,1,1,1,1,0,0);
            $lol = sprintf("UPDATE vinculacion_curps_ext SET ESTATUS = '%s' WHERE ID = '%s';", "1", $ID);
            $lol2 = sprintf("UPDATE integracion SET POLI = '%d' WHERE ID_EVALUACION = '%s';", 0, $ID_EVALUACION_PADRE);
            $conexion->executeInsertQuery($addEvEx);
            $conexion->executeInsertQuery($updateFecha);
            $conexion->executeInsertQuery($lol);
            $conexion->executeInsertQuery($insertInt);
        }
        else
        {
            echo "false: La fecha seleccionada ya contiene 20 evaluaciones programadas, por favor elija otro día.";
        }
    }
    else
    {
        echo "false";
    }
    $conexion->closeMySqlConnection();
}
?>