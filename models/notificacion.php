<?php
require_once 'db.php';
require_once 'cxc.php';

class Notificacion{
	private $db;
	private $notificacion;

	public function __construct(){
		$this->db=db::conexion();
		$this->notificacion=array();
	}

	//Metodos CRUD
	public function addNotificacion($id_forma_pago, $id_apartamento, $id_banco, $id_usuario, $monto, $referencia, $aprobado, $descripcion, $fecha){
        $sql = "INSERT INTO pagos(id_pago, id_forma_pago, id_apartamento, id_banco, id_usuario, monto, 
                                    referencia, aprobado, descripcion, fecha)VALUES(
            NULL, '{$id_forma_pago}', '{$id_apartamento}', '{$id_banco}', '{$id_usuario}', '{$monto}', '{$referencia}', '{$aprobado}', '{$descripcion}', '{$fecha}')";
            return $this->db->query($sql);

            // $cxc = new CXC();
            // $cxc->addCxc($id_apartamento, $id_alicuota, $id_mensualidad, $monto, 0, $fecha);
    }

    public function getNotificacion($id_usuario){
        $sql = $this->db->query("SELECT pagos.*, formas_pagos.descripcion AS forma, 
                                            bancos.descripcion AS banco,
                                                apartamentos.nombre AS apartamento
                                            FROM pagos
                                                INNER JOIN formas_pagos on pagos.id_forma_pago = formas_pagos.id_forma_pago
                                                INNER JOIN bancos on pagos.id_banco = bancos.id_banco
                                                INNER JOIN apartamentos on pagos.id_apartamento = apartamentos.id_apartamento
                                                WHERE pagos.id_usuario = '{$id_usuario}' ORDER BY pagos.id_pago DESC");
        while($filas = $sql->fetch_assoc()){
            $this->notificacion[] = $filas;
        }
        return $this->notificacion;
    }

    public function getNotificacionId($id_pago){
        $sql = $this->db->query("SELECT * FROM pagos WHERE id_forma_pago = '{$id_forma_pago}'");
        while($filas = $sql->fetch_assoc()){
            $this->notificacion[] = $filas;
        }
        return $this->notificacion;
    } 

    public function editNotificacion($id_pago, $id_forma_pago, $id_apartamento, $id_banco, $id_propietario, $monto, $referencia, $descripcion, $fecha){
        $sql = "UPDATE pagos SET id_forma_pago='{$id_forma_pago}', id_apartamento='{$id_apartamento}',
                                id_banco='{$id_banco}', id_usuario = '{$id_propietario}', monto='{$monto}', referencia='{$referencia}',
                                descripcion='{$descripcion}', fecha='{$fecha}'
                  WHERE id_pago='{$id_pago}'";
        return $this->db->query($sql);
    }
    public function delNotificacion($id_pago){
        $sql = "DELETE FROM pagos WHERE id_pago={$id_pago}";
        return $this->db->query($sql);
    }
}