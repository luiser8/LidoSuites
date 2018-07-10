<?php
require_once 'db.php';

class Detalle{
	private $db;
	private $detalle;

	public function __construct(){
		$this->db=db::conexion();
		$this->cxc=array();
	}

	//Metodos CRUD
	public function addDetalle($id_mensualidad, $id_gasto, $cantidad, $fecha){
        $sql = "INSERT INTO detalle_mensualidad(id_detalle_mensualidad, id_mensualidad, id_gasto, cantidad, fecha)VALUES(
            NULL, '{$id_mensualidad}', '{$id_gasto}', '{$cantidad}', '{$fecha}')";
            return $this->db->query($sql);
    }

}