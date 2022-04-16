<?php
include_once 'libs/imodel.php';
class Model{
    function __construct(){
        //se conecta a la base de datos
        $this->db = new Database();
    }
    /*sirve para reutilizar las sentencias
    para poder ejecutar una consulta
    */
    function query($query){
        return $this->db->connect()->query($query);
    }
    function prepare($query){
        return $this->db->connect()->prepare($query);
    }
}