<?php
require_once 'db.php';

class Pago{
	private $db;
	private $pago;

	public function __construct(){
		$this->db=db::conexion();
		$this->pago=array();
	}

    public function addPago($id_forma_pago, $id_apartamento, $id_banco, $id_usuario, $monto, $referencia, $aprobado, $descripcion, $fecha){
        $sql = "INSERT INTO pagos(id_pago, id_forma_pago, id_apartamento, id_banco, id_usuario, monto, referencia, aprobado, descripcion, fecha)VALUES(
            NULL, '{$id_forma_pago}', '{$id_apartamento}', '{$id_banco}', '{$id_usuario}', '{$monto}', '{$referencia}', '{$aprobado}', '{$descripcion}', '{$fecha}')";
            return $this->db->query($sql);
    }

    public function getPagos(){
        $sql = $this->db->query("SELECT pagos.*, formas_pagos.descripcion AS forma, 
                                                bancos.descripcion AS banco, usuarios.*,
                                                apartamentos.nombre AS apartamento
                                            FROM pagos
                                                INNER JOIN formas_pagos on pagos.id_forma_pago = formas_pagos.id_forma_pago
                                                INNER JOIN bancos on pagos.id_banco = bancos.id_banco
                                                INNER JOIN apartamentos on pagos.id_apartamento = apartamentos.id_apartamento
                                                INNER JOIN usuarios on pagos.id_usuario = usuarios.id_usuario 
                                                ORDER BY pagos.aprobado AND pagos.fecha ASC");
        while($filas = $sql->fetch_assoc()){
            $this->pago[] = $filas;
        }
        return $this->pago;
    }

    public function getPagosNotificacion(){
        $sql = $this->db->query("SELECT COUNT(aprobado) AS sinAprobar FROM pagos WHERE aprobado != 1");
        while($filas = $sql->fetch_assoc()){
            $this->pago[] = $filas;
        }
        return $this->pago;
    }

    public function getEstadoCuenta($id_usuario){
        $sql = $this->db->query("SELECT pagos.*, usuarios.*
                                         FROM pagos 
                                         INNER JOIN usuarios on pagos.id_usuario = usuarios.id_usuario
                                         WHERE pagos.aprobado != 0 AND pagos.id_usuario = '{$id_usuario}'");
        while($filas = $sql->fetch_assoc()){
            $this->pago[] = $filas;
        }
        return $this->pago;
    }

    public function estadoDeCuenta($id_usuario){
        $sql = $this->db->query("SELECT fecha, descripcion, monto
                                         FROM pagos 
                                         WHERE aprobado != 0 AND id_usuario = '{$id_usuario}'");
        while($filas = $sql->fetch_assoc()){
            $this->pago[] = $filas;
        }
        return $this->pago;
    }

    public function getPagosNotificacionId($id_usuario){
        $sql = $this->db->query("SELECT COUNT(aprobado) AS sinAprobar FROM pagos WHERE aprobado != 1 AND id_usuario = '{$id_usuario}'");
        while($filas = $sql->fetch_assoc()){
            $this->pago[] = $filas;
        }
        return $this->pago;
    }

    public function getPagosId($id_pago){
        $sql = $this->db->query("SELECT pagos.*, formas_pagos.descripcion AS forma, 
                                                bancos.descripcion AS banco, usuarios.*,
                                                apartamentos.nombre AS apartamento,
                                                usuarios.*
                                            FROM pagos
                                                INNER JOIN formas_pagos on pagos.id_forma_pago = formas_pagos.id_forma_pago
                                                INNER JOIN bancos on pagos.id_banco = bancos.id_banco
                                                INNER JOIN apartamentos on pagos.id_apartamento = apartamentos.id_apartamento
                                                INNER JOIN usuarios on pagos.id_usuario = usuarios.id_usuario
                                            WHERE pagos.id_pago = '{$id_pago}'");
        while($filas = $sql->fetch_assoc()){
            $this->pago[] = $filas;
        }
        return $this->pago;
    } 

    public function getPagosId2($id_pago){
        $sql = $this->db->query("SELECT * FROM pagos WHERE id_pago = '{$id_pago}'");
        while($filas = $sql->fetch_assoc()){
            $this->pago[] = $filas;
        }
        return $this->pago;
    }

    public function getColumns(){
        $sql = $this->db->query("SHOW columns FROM pagos");
        while($filas = $sql->fetch_assoc()){
            $this->pago[] = $filas;
        }
        return $this->pago;
    }
    
    public function editPagos($id_pago, $id_forma_pago, $id_apartamento, $id_banco, $id_propietario, $monto, $referencia, $aprobado, $descripcion, $fecha){
        $sql = "UPDATE pagos SET id_forma_pago='{$id_forma_pago}', id_apartamento='{$id_apartamento}',
                                id_banco='{$id_banco}', id_propietario = '{$id_propietario}', monto='{$monto}', referencia='{$referencia}',
                                aprobado='{$aprobado}', descripcion='{$descripcion}', fecha='{$fecha}'
                  WHERE id_pago='{$id_pago}'";
        return $this->db->query($sql);
    }
    public function delPago($id_pago){
        $sql = "DELETE FROM pagos WHERE id_pago={$id_pago}";
        return $this->db->query($sql);
    }    
    public function aprobarPago($id_pago, $aprobado){
        $sql = "UPDATE pagos SET aprobado = '{$aprobado}' WHERE id_pago={$id_pago}";
        return $this->db->query($sql);
    }
}