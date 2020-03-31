<?php
header("Content-type: text/html; charset=utf8");
require("../../conexion.php"); 

$ID_CANDIDATO = $_POST['ID_CANDIDATO'];



$conexion->set_charset("utf8");

	if ($result = $conexion->query("SELECT HUELLA_DIGITAL FROM candidatos WHERE ID_CANDIDATO = '$ID_CANDIDATO'")) {

        $row = mysqli_fetch_array($result);

        if($row[0] !== NULL){
            echo sprintf("%s", $row[0]);
        }
        else{
            echo "false";
        }

}

$conexion -> close();
?>