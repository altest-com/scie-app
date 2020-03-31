<?php
include ("MySqlConnect.php");
include ("../../conection.php");
//$dbConnect = new MySqlConnect("siiec", "root", "");
//$dbConnect->executeSelectQuery("SELECT * FROM CANDIDATOS", TRUE);
$dbConnect = new MySqlConnect($db, $user, $pswd);
//$dbConnect->executeSelectQuery("SELECT * FROM CANDIDATOS", TRUE);
$query = "INSERT INTO OFICIOS (NUM_OFICIO, ID_CANDIDATO, ID_EVALUACION, DEPENDENCIA, ADSCRIPCION, CORPORACION, PUESTO, ANIO) VALUES ('88', '', '', '', '', '', '', 2018);";
$query .= "INSERT INTO OFICIOS (NUM_OFICIO, ID_CANDIDATO, ID_EVALUACION, DEPENDENCIA, ADSCRIPCION, CORPORACION, PUESTO, ANIO) VALUES ('11', '', '', '', '', '', '', 2019);";
//echo $query;
echo $dbConnect->executeInsertQuery($query, TRUE);
//$dbConnect->executeSelectQuery("SELECT * FROM CANDIDATOS", TRUE);
//echo $dbConnect->getValueFromQuery("SELECT * FROM CANDIDATOS LIMIT 1", "CURP");
//echo $dbConnect->getSingleValueFromQuery("SELECT PRIMER_NOMBRE AS ROW FROM CANDIDATOS LIMIT 1");
$dbConnect->closeMySqlConnection();
?>