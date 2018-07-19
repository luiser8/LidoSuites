<?php
require_once 'db.php';

class Nivel{
	private $db;
	private $nivel;

	public function __construct(){
		$this->db=db::conexion();
		$this->nivel=array();
	}

	//Metodos CRUD
    public function getNivel(){
        $sql = $this->db->query("SELECT * FROM niveles");
        while($filas = $sql->fetch_assoc()){
            $this->nivel[] = $filas;
        }
        return $this->nivel;
    }
}