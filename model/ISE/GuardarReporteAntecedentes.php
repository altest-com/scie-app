<?php
{
    include ("../conection.php");
    include ("../MySqlConnect.php");

    $IdEvaluacion = $_POST['ID_EVALUACION'];
    $TextPlataformaMexico = $_POST['PLATAFORMA_MEXICO'];
    $TextRNPSP = $_POST['RNPSP'];
    $TextDigiscan = $_POST['DIGISCAN'];
    $TextTelescan = $_POST['TELESCAN'];
    $TextFuentesAbiertas = $_POST['FUENTES_ABIERTAS'];
    $TextoTSJ = $_POST['TSJ'];
    $TextoFGJ = $_POST['FGJ'];
    $TextoSFP = $_POST['SFP'];
    $TextoDCRP = $_POST['DCRP'];
    $TextoOtros = $_POST['OTROS'];
    $TextoConclusionFinal = $_POST['CONCLUSION_FINAL'];
    $TextoIndicesDelictivos = $_POST['INDICES_DELICTIVOS'];
    $TextoSocioDemograficos = $_POST['SOCIODEMOGRAFICOS'];
    $TextoFuentesInformativas = $_POST['FUENTES_INFORMATIVAS'];
    $TextoIse = $_POST['ANT_ISE'];
    $TextoMedTox = $_POST['ANT_MEDTOX'];
    $TextoPsicologia = $_POST['ANT_PSICO'];
    $TextoPoligrafia = $_POST['ANT_POL'];
    $TextoIntegracion = $_POST['ANT_INT'];

    if (isset($IdEvaluacion))
    {
        $conexion = new MySqlConnect($db, $user, $pswd);
        $queryDel = sprintf("DELETE FROM REPORTE_ANTECEDENTES WHERE ID_EVALUACION LIKE '%s';", $IdEvaluacion);
        $InsertQuery = sprintf("INSERT INTO REPORTE_ANTECEDENTES VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', /**/ '%s', '%s', '%s', '%s', '%s');", 
                        $IdEvaluacion, $TextPlataformaMexico, $TextRNPSP, $TextDigiscan, $TextTelescan, $TextFuentesAbiertas, $TextoTSJ, $TextoFGJ, $TextoSFP, $TextoDCRP, $TextoOtros,$TextoIse, $TextoMedTox, $TextoPsicologia, $TextoPoligrafia, $TextoIntegracion, $TextoIndicesDelictivos, 
                        $TextoSocioDemograficos, $TextoFuentesInformativas, $TextoConclusionFinal);
        $conexion->executeInsertQuery($queryDel.$InsertQuery, 2);
        $conexion->closeMySqlConnection();
    }
}
?>