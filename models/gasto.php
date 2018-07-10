<?php
require_once 'db.php';

class Gasto{
	private $db;
	private $gasto;

	public function __construct(){
		$this->db=db::conexion();
		$this->gasto=array();
	}

	//Metodos CRUD
	public function addGasto($id_ut, $descripcion, $monto, $tipo, $numeroUts){

        $sql = "INSERT INTO gastos(id_gasto, id_ut, descripcion, monto, tipo, numeroUts)VALUES(
            NULL, $id_ut, '{$descripcion}', '{$monto}', '{$tipo}', '{$numeroUts}')";
            echo $sql;
        return $this->db->query($sql);
    }

    public function getGastos(){
        $sql = $this->db->query("SELECT g.id_gasto, g.descripcion, g.monto, 
                                    case 
                                        when g.tipo='1' then 'Ordinario' 
                                        when g.tipo='2' then 'Alquiler' 
                                        when g.tipo='3' then 'Multa' end as tipo, 
                                    ifnull(g.numeroUts,'-') numeroUts, g.id_ut
                                    FROM gastos g
                                    left JOIN ut u using(id_ut)
                                    ");
        while($filas = $sql->fetch_assoc()){
            $this->gasto[] = $filas;
        }
        return $this->gasto;
    }

    public function getGastoId($id_gasto){
        $sql = $this->db->query("SELECT * FROM gastos WHERE id_gasto = '{$id_gasto}'");
        while($filas = $sql->fetch_assoc()){
            $this->gasto[] = $filas;
        }
        return $this->gasto;
    } 

    public function editGasto($id_gasto, $id_ut, $descripcion, $monto, $tipo, $numeroUts){
        $sql = "UPDATE gastos SET id_ut=$id_ut, descripcion='{$descripcion}',
                                    monto='{$monto}', tipo='{$tipo}', numeroUts=$numeroUts
                  WHERE id_gasto='{$id_gasto}'";
        return $this->db->query($sql);
    }
    public function delGasto($id_gasto){
        $sql = "DELETE FROM gastos WHERE id_gasto={$id_gasto}";
        return $this->db->query($sql);
    }
}