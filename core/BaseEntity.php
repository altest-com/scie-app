<?php
require_once (realpath(dirname(__FILE__).'/../config/connection.php'));
require 'MySqlConnection.php';

class BaseEntity
{
    private $table;
    private $conectar;

    public function __construct($table)
    {
        global $db;
        global $user;
        global $pswd;
        $this->conectar = new MySqlConnection($db, $user, $pswd);
        $this->table = (string)$table;
    }

    public function getConetar(){
        return $this->conectar;
    }

    public function getAll(){

        $query = $this->conectar->executeSelectQuery("SELECT * FROM ".$this->table." ORDER BY id_menu DESC;", false);
        return $query;
    }

    public function getById($id){
        $query = $this->conectar->executeSelectQuery("SELECT * FROM $this->table WHERE id_menu=$id;", false);
        return $query;
    }

    public function getBy($column, $value){
        $query = $this->conectar->executeSelectQuery("SELECT * FROM $this->table WHERE $column = '$value'");
        return $query;
    }

    public function deleteById($id){
        $query = $this->conectar->executeUpdateQuery("DELETE FROM $this->table WHERE id_menu = $id");
        return $query;
    }

    public function deleteBy($column, $value){
        $query = $this->conectar->executeUpdateQuery("DELETE FROM $this->table WHERE $column = '$value'");
        return $query;
    }

    public function updateById($id, $column, $value) {
        $query = $this->conectar->executeUpdateQuery("UPDATE $this->table SET $column = '$value' WHERE id_menu = '$id'");
        return $query;
    }


    /*
     * Aquí podemos montarnos un montón de métodos que nos ayuden
     * a hacer operaciones con la base de datos de la entidad
     */

}
