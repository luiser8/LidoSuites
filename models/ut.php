<?php
require_once 'db.php';

class Ut{
	private $db;
	private $ut;

	public function __construct(){
		$this->db=db::conexion();
		$this->ut=array();
	}

	//Metodos CRUD
	public function addUt($ut, $anio){
        $sql = "INSERT INTO ut(id_ut, ut, anio)VALUES(
            NULL, '{$ut}', '{$anio}')";
            return $this->db->query($sql);
    }

    public function getUt(){
        $sql = $this->db->query("SELECT * FROM ut");
        while($filas = $sql->fetch_assoc()){
            $this->ut[] = $filas;
        }
        return $this->ut;
    }

    public function getUtId($id_ut){
        $sql = $this->db->query("SELECT * FROM ut WHERE id_ut = '{$id_ut}'");
        while($filas = $sql->fetch_assoc()){
            $this->ut[] = $filas;
        }
        return $this->ut;
    } 

    public function editUt($id_ut, $ut, $anio){
        $sql = "UPDATE ut SET ut='{$ut}', anio='{$anio}'
                  WHERE id_ut='{$id_ut}'";
        return $this->db->query($sql);
    }
    public function delUt($id_ut){
        $sql = "DELETE FROM ut WHERE id_ut={$id_ut}";
        return $this->db->query($sql);
    }
}