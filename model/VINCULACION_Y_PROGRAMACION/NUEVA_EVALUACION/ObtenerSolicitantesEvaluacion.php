<?php
header("Content-type: text/html; charset=utf8");
include ("../../MySqlConnect.php");
include ("../../conection.php");
$conexion = new MySqlConnect($db, $user, $pswd);
$query = sprintf("SELECT DISTINCT (c3_corp.NOMBRE) FROM C3_CORP UNION SELECT DISTINCT (c3_dep.NOMBRE) FROM C3_DEP ORDER BY NOMBRE ASC;");
$conexion->executeSelectQuery($query, TRUE);
$conexion->closeMySqlConnection();
?>