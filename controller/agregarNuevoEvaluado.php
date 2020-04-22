<?php
include('../core/tools.php');
include('../core/MySqlConnection.php');
include('../plugins/SimpleXLSX.php');
include('../config/connection.php');

error_reporting(0);
$nombre = $_POST['nombres'];
$pApellido = $_POST['primer_apellido'];
$sApellido = $_POST['segundo_apellido'];
$curp = $_POST['curp'];
$rfc = $_POST['rfc'];
$genero = $_POST['genero'];
$file = $_FILES['file-0'];

$conexion = new MySqlConnection($db, $user, $pswd);
if (isset($file) && !empty($file)) {
    // Si hay archivo, ignorar los demas datos!
    if ($xlsx = SimpleXLSX::parse($file['tmp_name']) ) {
        // $header_values serán los encabezados del array
        $header_values = $rows = [];
        foreach ( $xlsx->rows() as $k => $r ) {
            if ( $k === 0 ) {
                $header_values = $r;
                continue;
            }
            $rows[] = array_combine( $header_values, $r );
        }

        $registrosNoInsertados = array();
        for ($i = 0; $i < count($rows); $i++) {
            $row = $rows[$i];
            array_push($registrosNoInsertados, insertarEvaluado($row['Nombre'], $row['Primer Apellido'], $row['Segundo Apellido'], $row['Curp'], $row['Rfc'], $row['Genero'], $conexion, false) );
        }

        if (count($registrosNoInsertados) > 0) {
            echo json_encode($registrosNoInsertados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
}
else {
    if ( isset($nombre) && !empty($nombre) && isset($pApellido) && !empty($pApellido) &&
        isset($curp) && !empty($curp) && isset($rfc) && !empty($rfc) ) {
        //  Campos obligatorios enviados
        insertarEvaluado($nombre, $pApellido, $sApellido, $curp, $rfc, $genero, $conexion);
    }
    else {
        echo json_encode("false");
    }
}
$conexion->closeMySqlConnection();

function insertarEvaluado($nombre, $pApellido, $sApellido, $curp, $rfc, $genero, $conexion, $echo = true) {
    $finalArray = "";
    if ( validarCurp($curp) ) {
        // Si la Curp tiene el formato correcto, continuar
        if ( validarRfc($rfc) ) {
            // Si Rfc tiene el formato correcto, continuar
            // Revisar si en la base de datos ya existe un registro con la Curp que se intenta registrat
            $existeCurp = $conexion->getSingleValueFromQuery("SELECT CURP AS ROW FROM EVALUADOS WHERE CURP LIKE '$curp';");
            if (strcmp($existeCurp, $curp) == 0) {
                // Si en la base de datos existe una curp igual a la que se intenta insertar, entonces se lanzará un aviso. De lo contrario, se continuará haciendo la inserción
                $finalArray = $nombre." ".$pApellido." ".$sApellido.": ".$curp." - ¡Esta C.U.R.P. ya ha sido registrada!";
                if ($echo) echo json_encode("registered");
            }
            else {
                $query = sprintf("INSERT INTO EVALUADOS (NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, CURP, RFC, ID_GENERO) VALUES ('%s', '%s', '%s', '%s', '%s', (SELECT ID FROM GENEROS WHERE GENERO LIKE '%s'));",
                    $nombre, $pApellido, $sApellido, $curp, $rfc, $genero);
                if ( $conexion->executeInsertQuery($query) ) { // Esta linea es quien devuelve true o false dependiendo del resultado de la consulta
                    $finalArray = $nombre." ".$pApellido." ".$sApellido.": ".$curp." - ¡Se ha registrado un nuevo evaluado!";
                    if ($echo) echo json_encode("true");
                }
                else {
                    $finalArray = $nombre." ".$pApellido." ".$sApellido.": ".$curp." - ¡Un error ha impedido que se registre!";
                    if ($echo) echo json_encode("false");
                }
            }
        }
        else {
            $finalArray = $nombre." ".$pApellido." ".$sApellido.": ".$curp." - Por favor, revise que el formato del R.F.C. sea correcto.";
            if ($echo) echo json_encode("custom: Por favor, revise que el formato del R.F.C. sea correcto.");
        }
    }
    else {
        $finalArray = $nombre." ".$pApellido." ".$sApellido.": ".$curp." - Por favor, revise que el formato de la C.U.R.P. sea correcto.";
        if ($echo) echo json_encode("custom: Por favor, revise que el formato de la C.U.R.P. sea correcto.");
    }

    return $finalArray;
}
