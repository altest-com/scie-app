<?php
include("core/MySqlConnection.php");
include("config/connection.php");


$conexion = new MySqlConnection($db, $user, $pswd);
$query = sprintf("select * from sys_menus;");
$resultData = $conexion->executeSelectQuery($query, true);
$obj = json_decode($resultData);
$resultado = "";
for ($i = 0; $i < count($obj); $i++)
{
    $resultado = $resultado."<li class=\"nav-item\">
                        <a id=".makeId($obj[$i]->nombre_menu)." href=".makeJSFunctionName($obj[$i]->nombre_menu)." class=\"nav-link\">
                            <i class=\"".$obj[$i]->icono_menu."\"></i>
                            <p>
                                ".$obj[$i]->nombre_menu."
                            </p>
                        </a>
                    </li>";
}
echo $resultado;

function makeId($str) : string {
    $id = strtolower($str);
    $id = str_replace(' ', '_', $id);
    return $id;
}

function makeJSFunctionName($str) : string {
    if (strcmp($str, "Dashboard") == 0) {
        return "index.php";
    }
    $nameFunction = "javascript:load('".str_replace(' ', '', $str)."');";
    return $nameFunction;
}

?>
