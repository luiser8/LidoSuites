<?php
require_once 'db.php';

class Contrato{
	private $db;
	private $contrato;

	public function __construct(){
		$this->db=db::conexion();
		$this->contrato=array();
	}

	//Metodos CRUD
	public function addContrato($id_apartamento, $id_propietario, $fechaInicio, $fechaFin){
        $sql = "INSERT INTO contrato(id_contrato, id_apartamento, id_propietario, fecha_inicio, fecha_fin)VALUES(
            NULL, '{$id_apartamento}', '{$id_propietario}', '{$fechaInicio}', '{$fechaFin}')";
            return $this->db->query($sql);
    }
}