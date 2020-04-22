<?php
header("Content-Type: text/html;charset=utf-8");
include("../../conection.php");
include("../../MySqlConnect.php");

$Datos = $_POST['DATOS'];
$DatosRecibidos = explode('-', $Datos);
$Nombre = $DatosRecibidos[0];
$Curp = $DatosRecibidos[1];
//ECHO $Curp;
    $sqlGetIdCandidato = sprintf("SELECT ID_CANDIDATO FROM CANDIDATOS WHERE 
	CONCAT(PRIMER_APELLIDO, ' ', IF (SEGUNDO_APELLIDO LIKE '', '', CONCAT(SEGUNDO_APELLIDO, ' ') ), PRIMER_NOMBRE, IF (SEGUNDO_NOMBRE LIKE '', '', CONCAT(' ', SEGUNDO_NOMBRE)))
     LIKE '%s' AND CURP LIKE '%s%%' LIMIT 1;", $Nombre, $Curp);

    $conexion = new MySqlConnect($db, $user, $pswd);
    $IdCandidato = $conexion -> getValueFromQuery($sqlGetIdCandidato, "ID_CANDIDATO");
    //echo $IdCandidato;
    $sqlGetLastEvaluacion = sprintf("
    SELECT E.ID_EVALUACION, E.FECHA_EVALUACION, E.FOLIO, C.PRIMER_APELLIDO, C.SEGUNDO_APELLIDO, 
    CONCAT (C.PRIMER_NOMBRE, IF (C.SEGUNDO_NOMBRE LIKE '', '', CONCAT(' ', C.SEGUNDO_NOMBRE))) AS NOMBRES, 
    O.CORPORACION, O.DEPENDENCIA, PM.CUIP, P.PUESTO_FUNCIONAL, IF(I.RESULTADO IS NULL,(SELECT INTEGRACION_R FROM concentrado_informacion_resultados WHERE ID_EVALUACION = E.ID_EVALUACION),I.RESULTADO) AS RESULTADO,
    (SELECT DATE(GREATEST(E.FECHA_EXAMEN_TOXICOLOGICO, E.FECHA_ISE_DOCUMENTOS, E.FECHA_ISE_ENTREVISTA, E.FECHA_EXAMEN_PSICOLOGICO, E.FECHA_EXAMEN_MEDICO, E.FECHA_EXAMEN_POLIGRAFICO, IF(R.FECHA_CAMBIO_RES_TOX IS NULL,'',R.FECHA_CAMBIO_RES_TOX) , 
    IF ((SELECT E1.FECHA_EXAMEN_POLIGRAFICO FROM evaluacion E1 WHERE E1.EVALUACION_DERIVADA_DE = E.ID_EVALUACION) IS NULL, '', 
    (SELECT E1.FECHA_EXAMEN_POLIGRAFICO FROM evaluacion E1 WHERE E1.EVALUACION_DERIVADA_DE = E.ID_EVALUACION))))) AS FECHA_INTEGRAL
    FROM CANDIDATOS C 
    INNER JOIN EVALUACION E ON (C.ID_CANDIDATO = E.ID_CANDIDATO) 
    LEFT JOIN OFICIOS O ON (E.ID_EVALUACION = O.ID_EVALUACION)
    LEFT JOIN PLATAFORMA_MEXICO PM ON (E.ID_EVALUACION = PM.ID_EVALUACION)
    LEFT JOIN PSICOLOGIA_REPORTE P ON (E.ID_EVALUACION = P.ID_EVALUACION)
    LEFT JOIN REPORTES R ON (E.ID_EVALUACION = R.ID_EVALUACION)
    LEFT JOIN RESULTADOS_INTEGRACION I ON (E.ID_EVALUACION = I.ID_EVALUACION) 
    WHERE C.ID_CANDIDATO LIKE '%s'
    ORDER BY E.FECHA_EVALUACION DESC LIMIT 1;", $IdCandidato);

    $conexion -> executeSelectQuery($sqlGetLastEvaluacion, TRUE);
    $conexion->closeMySqlConnection();
?>