<?php
require_once 'db.php';

class FormaPago{
	private $db;
	private $formaPago;

	public function __construct(){
		$this->db=db::conexion();
		$this->formaPago=array();
	}

	//Metodos CRUD
	public function addFormaPago($descripcion){
        $sql = "INSERT INTO formas_pagos(id_forma_pago, descripcion)VALUES(
            NULL, '{$descripcion}')";
            return $this->db->query($sql);
    }

    public function getFormaPago(){
        $sql = $this->db->query("SELECT * FROM formas_pagos");
        while($filas = $sql->fetch_assoc()){
            $this->formaPago[] = $filas;
        }
        return $this->formaPago;
    }

    public function getFormaPagoId($id_forma_pago){
        $sql = $this->db->query("SELECT * FROM formas_pagos WHERE id_forma_pago = '{$id_forma_pago}'");
        while($filas = $sql->fetch_assoc()){
            $this->formaPago[] = $filas;
        }
        return $this->formaPago;
    } 

    public function editFormaPago($id_forma_pago, $descripcion){
        $sql = "UPDATE formas_pagos SET descripcion='{$descripcion}'
                  WHERE id_forma_pago='{$id_forma_pago}'";
        return $this->db->query($sql);
    }
    public function delFormaPago($id_forma_pago){
        $sql = "DELETE FROM formas_pagos WHERE id_forma_pago={$id_forma_pago}";
        return $this->db->query($sql);
    }
}