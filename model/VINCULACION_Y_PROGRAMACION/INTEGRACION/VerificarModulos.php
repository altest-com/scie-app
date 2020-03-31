<?php
header("Content-type: text/html; charset=utf8");
header('Content-type:application/json');
include ("../../conection.php"); 
include ("../../MySqlConnect.php");

$ID_EVALUACION = $_POST['ID_EVALUACION'];
$PRUEBA = (int)$_POST['PRUEBA'];

$finalQuery = "";
$origenDelError = "";
$conexion = new MySqlConnect($db, $user, $pswd);
switch ($PRUEBA)
{
    case 2: // ISE
        $finalQuery = sprintf(
            "SELECT EVALUACION.ID_EVALUACION, PM.ID_EVALUACION AS 'PLATAFORMA MÉXICO', DGS.ID_EVALUACION AS DIGISCAN, ENT.ID_EVALUACION AS ENTREVISTA, 
            IA.ID_EVALUACION AS 'INVESTIGACIÓN DE ANTECEDENTES', RA.ID_EVALUACION AS 'REPORTE ANTECEDENTES', REPISE.ID_EVALUACION AS REPORTE FROM EVALUACION 
            LEFT JOIN PLATAFORMA_MEXICO PM ON (EVALUACION.ID_EVALUACION = PM.ID_EVALUACION)
            LEFT JOIN DIGISCAN DGS ON (EVALUACION.ID_EVALUACION = DGS.ID_EVALUACION)
            LEFT JOIN ENTREVISTA ENT ON (EVALUACION.ID_EVALUACION = ENT.ID_EVALUACION)
            LEFT JOIN INVESTIGACION_ANTECEDENTES IA ON (EVALUACION.ID_EVALUACION = IA.ID_EVALUACION)
            LEFT JOIN REPORTE_ANTECEDENTES RA ON (EVALUACION.ID_EVALUACION = RA.ID_EVALUACION)
            LEFT JOIN REPORTE_ISE REPISE ON (EVALUACION.ID_EVALUACION = REPISE.ID_EVALUACION)
            WHERE EVALUACION.ID_EVALUACION LIKE '%s';", $ID_EVALUACION
        );

        $registros = $conexion->getRowFromQuery($finalQuery);

        if ($registros["PLATAFORMA MÉXICO"] === NULL) { $origenDelError = "PLATAFORMA MÉXICO"; break;}
        if ($registros["DIGISCAN"] === NULL) { $origenDelError = "DIGISCAN"; break;}
        if ($registros["ENTREVISTA"] === NULL) { $origenDelError = "ENTREVISTA"; break;}
        //if ($registros["HISTORIA DE VIDA"] === NULL) { $origenDelError = "HISTORIA DE VIDA"; break;}
        if ($registros["INVESTIGACIÓN DE ANTECEDENTES"] === NULL) { $origenDelError = "INVESTIGACIÓN DE ANTECEDENTES"; break;}
        if ($registros["REPORTE ANTECEDENTES"] === NULL) { $origenDelError = "REPORTE DE ANTECEDENTES"; break;}
        if ($registros["REPORTE"] === NULL) { $origenDelError = "REPORTE"; break;}
    break;
    case 3: // MED
        $finalQuery = sprintf(
            "SELECT EVALUACION.ID_EVALUACION, CL.ID_EVALUACION AS 'HISTORIA CLÍNICA', RM.ID_EVALUACION AS REPORTE FROM EVALUACION 
            LEFT JOIN MEDICO_CLINICA01 CL ON (EVALUACION.ID_EVALUACION = CL.ID_EVALUACION)
            LEFT JOIN REPORTES_MED RM ON (EVALUACION.ID_EVALUACION = RM.ID_EVALUACION)
            WHERE EVALUACION.ID_EVALUACION LIKE '%s';", $ID_EVALUACION
        );

        $registros = $conexion->getRowFromQuery($finalQuery);

        if ($registros["HISTORIA CLÍNICA"] === NULL) { $origenDelError = "HISTORIA CLÍNICA"; break;}
        if ($registros["REPORTE"] === NULL) { $origenDelError = "REPORTE"; break;}
    break;
    case 4: // TOX
        $finalQuery = sprintf(
            "SELECT EVALUACION.ID_EVALUACION, B1.ID_EVALUACION AS HEMATOLOGÍA, B2.ID_EVALUACION AS 'QUÍMICA SANGUÍNEA', B3.ID_EVALUACION AS UROANÁLISIS, TB1.ID_EVALUACION AS TOXICOLOGÍA, 
            TB2.ID_EVALUACION AS METABOLITOS, TB3.ID_EVALUACION AS LÍQUIDOS, TB4.ID_EVALUACION AS 'ANÁLISIS MICROSCÓPICO SEDIMENTO', REP.ID_EVALUACION AS REPORTE FROM EVALUACION 
            LEFT JOIN MEDICO_BITACORA1 B1 ON (EVALUACION.ID_EVALUACION = B1.ID_EVALUACION)
            LEFT JOIN MEDICO_BITACORA2 B2 ON (EVALUACION.ID_EVALUACION = B2.ID_EVALUACION)
            LEFT JOIN MEDICO_BITACORA3 B3 ON (EVALUACION.ID_EVALUACION = B3.ID_EVALUACION)
            LEFT JOIN TOXICOLOGICO_BITACORA1 TB1 ON (EVALUACION.ID_EVALUACION = TB1.ID_EVALUACION)
            LEFT JOIN TOXICOLOGICO_BITACORA2 TB2 ON (EVALUACION.ID_EVALUACION = TB2.ID_EVALUACION)
            LEFT JOIN TOXICOLOGICO_BITACORA3 TB3 ON (EVALUACION.ID_EVALUACION = TB3.ID_EVALUACION)
            LEFT JOIN TOXICOLOGICO_BITACORA4 TB4 ON (EVALUACION.ID_EVALUACION = TB4.ID_EVALUACION)
            LEFT JOIN REPORTES REP ON (EVALUACION.ID_EVALUACION = REP.ID_EVALUACION)
            WHERE EVALUACION.ID_EVALUACION LIKE '%s';", $ID_EVALUACION
        );

        $registros = $conexion->getRowFromQuery($finalQuery);

        if ($registros["HEMATOLOGÍA"] === NULL) { $origenDelError = "HEMATOLOGÍA"; break;}
        if ($registros["QUÍMICA SANGUÍNEA"] === NULL) { $origenDelError = "QUÍMICA SANGUÍNEA"; break;}
        if ($registros["UROANÁLISIS"] === NULL) { $origenDelError = "UROANÁLISIS"; break;}
        if ($registros["TOXICOLOGÍA"] === NULL) { $origenDelError = "TOXICOLOGÍA"; break;}
        if ($registros["METABOLITOS"] === NULL) { $origenDelError = "METABOLITOS"; break;}
        if ($registros["LÍQUIDOS"] === NULL) { $origenDelError = "LÍQUIDOS"; break;}
        if ($registros["ANÁLISIS MICROSCÓPICO SEDIMENTO"] === NULL) { $origenDelError = "ANÁLISIS MICROSCÓPICO SEDIMENTO"; break;}
        if ($registros["REPORTE"] === NULL) { $origenDelError = "REPORTE"; break;}
    break;
    case 5: // PSI
        $finalQuery = sprintf(
            "SELECT EVALUACION.ID_EVALUACION, CP.ID_EVALUACION AS 'CALIFICACIÓN PSICOLÓGICO', PM.ID_EVALUACION AS PSICOMETRÍA, PR.ID_EVALUACION AS REPORTE FROM EVALUACION 
            LEFT JOIN CALIFICACION_PSICOLOGICO CP ON (EVALUACION.ID_EVALUACION = CP.ID_EVALUACION)
            LEFT JOIN PSICOMETRIA PM ON (EVALUACION.ID_EVALUACION = PM.ID_EVALUACION)
            LEFT JOIN PSICOLOGIA_REPORTE PR ON (EVALUACION.ID_EVALUACION = PR.ID_EVALUACION)
            WHERE EVALUACION.ID_EVALUACION LIKE '%s';", $ID_EVALUACION
        );

        $registros = $conexion->getRowFromQuery($finalQuery);

        if ($registros["CALIFICACIÓN PSICOLÓGICO"] === NULL) { $origenDelError = "CALIFICACIÓN PSICOLÓGICO"; break;}
        if ($registros["PSICOMETRÍA"] === NULL) { $origenDelError = "PSICOMETRÍA"; break;}
        if ($registros["REPORTE"] === NULL) { $origenDelError = "REPORTE"; break;}
    break;
    case 6: // POL
        $finalQuery = sprintf(
            "SELECT EVALUACION.ID_EVALUACION, CA.ID_EVALUACION AS CALIFICACIONES, RP.ID_EVALUACION AS REPORTE FROM EVALUACION 
            LEFT JOIN CALIFICACION CA ON (EVALUACION.ID_EVALUACION = CA.ID_EVALUACION)
            LEFT JOIN REPORTE_POLIGRAFIA RP ON (EVALUACION.ID_EVALUACION = RP.ID_EVALUACION)
            WHERE EVALUACION.ID_EVALUACION LIKE '%s';", $ID_EVALUACION
        );
        
        $registros = $conexion->getRowFromQuery($finalQuery);
    
        if ($registros["CALIFICACIONES"] === NULL) { $origenDelError = "CALIFICACIONES"; break;}
        if ($registros["REPORTE"] === NULL) { $origenDelError = "REPORTE"; break;}
    break;
    case 7: // INT
        $finalQuery = sprintf(
            "SELECT EVALUACION.ID_EVALUACION, (SELECT ID_EVALUACION FROM CONCENTRADO_INTEGRACION WHERE ID_EVALUACION = EVALUACION.ID_EVALUACION AND TIPO = '1') AS 'CONCENTRADO_INTEGRADORAS',(SELECT ID_EVALUACION FROM CONCENTRADO_INTEGRACION WHERE ID_EVALUACION = EVALUACION.ID_EVALUACION AND TIPO = '2') AS CONCENTRADO_SUPERVISION, RUI.ID_EVALUACION AS REPORTE FROM EVALUACION 
            LEFT JOIN CONCENTRADO_INTEGRACION COI ON (EVALUACION.ID_EVALUACION = COI.ID_EVALUACION)
            LEFT JOIN REPORTE_INTEGRACION RUI ON (EVALUACION.ID_EVALUACION = RUI.ID_EVALUACION)
            WHERE EVALUACION.ID_EVALUACION LIKE '%s';", $ID_EVALUACION
        );

        $registros = $conexion->getRowFromQuery($finalQuery);

        
        if ($registros["REPORTE"] === NULL) { $origenDelError = "REPORTE"; break;}
        if ($registros["CONCENTRADO_INTEGRADORAS"] === NULL) { $origenDelError = "CONCENTRADO INTEGRADORAS"; break;}
        if ($registros["CONCENTRADO_SUPERVISION"] === NULL) { $origenDelError = "CONCENTRADO SUPERVISION"; break;}
    break;
    default:
        //NADA
    break;
}
if (strcmp($origenDelError, "") == 0)
{
    echo "true";
}
else 
{
    echo "false.".$origenDelError;
}
$conexion->closeMySqlConnection();
?>