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
                        <a href=\"".$obj[$i]->direccion_vista_menu."\" class=\"nav-link\">
                            <i class=\"".$obj[$i]->icono_menu."\"></i>
                            <p>
                                ".$obj[$i]->nombre_menu."
                            </p>
                        </a>
                    </li>";
}
echo $resultado;

?>
