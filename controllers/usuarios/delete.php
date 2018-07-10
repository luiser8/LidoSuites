<?php 
require_once '../../models/usuario.php';

$dataUsuario = json_decode(file_get_contents("php://input"));
var_dump($dataUsuario->id_usuario);
$instanciaUsuario = new Usuario();

//POST SEND
if(!empty($dataUsuario->id_usuario)){
    
    $result = $instanciaUsuario->deleteUsuario($dataUsuario->id_usuario);
    
    // Audit
    // $auth = new Audit();
    // $auth->setAudit('Inicio de sesion', 'User Session');

    echo json_encode($result);
}