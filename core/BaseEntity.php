<?php
require '../config/connection.php';
require 'MySqlConnection.php';

class BaseEntity
{
    private $table;
    private $conexion;

    public function __construct($table)
    {
        global $db;
        global $user;
        global $pswd;
        $this->conexion = new MySqlConnection($db, $user, $pswd);
        $this->table = (string)$table;
    }

    public function getConnection(){
        return $this->conexion;
    }

    public function closeConnection() {
        $this->conexion->closeMySqlConnection();
    }

    public function getAll($orderBy = "id"){

        $result = $this->conexion->executeSelectQuery("SELECT * FROM ".$this->table." ORDER BY $orderBy DESC;", false);
        return $result;
    }

    public function getById($id){
        $result = $this->conexion->executeSelectQuery("SELECT * FROM $this->table WHERE id = $id;", false);
        return $result;
    }

    public function getBy($column, $value){
        $result = $this->conexion->executeSelectQuery("SELECT * FROM $this->table WHERE $column = '$value';", false);
        return $result;
    }

    public function deleteById($id){
        $result = $this->conexion->executeUpdateQuery("DELETE FROM $this->table WHERE id = $id;");
        return $result;
    }

    public function deleteBy($column, $value){
        $result = $this->conexion->executeUpdateQuery("DELETE FROM $this->table WHERE $column = '$value';");
        return $result;
    }

    public function updateById($id, $column, $value) {
        $result = $this->conexion->executeUpdateQuery("UPDATE $this->table SET $column = '$value' WHERE id = '$id';");
        return $result;
    }


    public function executeQuery($query) {
        $result = $this->conexion->executeSelectQuery($query, false);
        return $result;
    }


    /*
     * Aquí podemos montarnos un montón de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */

}
