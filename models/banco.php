<?php
require_once 'db.php';

class Banco{
	private $db;
	private $banco;

	public function __construct(){
		$this->db=db::conexion();
		$this->banco=array();
	}

	//Metodos CRUD
	public function addBanco($descripcion){
        $sql = "INSERT INTO bancos(id_banco, descripcion)VALUES(
            NULL, '{$descripcion}')";
            return $this->db->query($sql);
    }

    public function getBancos(){
        $sql = $this->db->query("SELECT * FROM bancos");
        while($filas = $sql->fetch_assoc()){
            $this->banco[] = $filas;
        }
        return $this->banco;
    }

    public function getBancoId($id_banco){
        $sql = $this->db->query("SELECT * FROM bancos WHERE id_banco = '{$id_banco}'");
        while($filas = $sql->fetch_assoc()){
            $this->banco[] = $filas;
        }
        return $this->banco;
    } 

    public function editBanco($id_banco, $descripcion){
        $sql = "UPDATE bancos SET descripcion='{$descripcion}'
                  WHERE id_banco='{$id_banco}'";
        return $this->db->query($sql);
    }
    public function delBanco($id_banco){
        $sql = "DELETE FROM bancos WHERE id_banco={$id_banco}";
        return $this->db->query($sql);
    }
}