<?php 
require_once '../../models/usuario.php';

$dataUsuario = json_decode(file_get_contents("php://input"));
var_dump($dataUsuario->id_usuario);
$instanciaUsuario = new Usuario();


//POST SEND
if(!empty($dataUsuario->EditUsuario)){
    
    $result = $instanciaUsuario->editUsuario($dataUsuario->id_usuario, $dataUsuario->nombres, $dataUsuario->apellidos,
    										$dataUsuario->correo, $dataUsuario->contrasena,
    										$dataUsuario->telefono, $dataUsuario->nivel);
    
    // Audit
    // $auth = new Audit();
    // $auth->setAudit('Inicio de sesion', 'User Session');

    echo json_encode($result);
}