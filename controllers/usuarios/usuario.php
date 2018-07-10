<?php 
require_once '../../models/usuario.php';

// $dataUsuario = json_decode(file_get_contents("php://input"));
// var_dump($dataUsuario->id_usuario);
$instanciaUsuario = new Usuario();

//POST SEND
if(!empty($_POST['session'])){
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    $result = $instanciaUsuario->getSession($usuario, $password);
    
    // Audit
    // $auth = new Audit();
    // $auth->setAudit('Inicio de sesion', 'User Session');

    echo json_encode($result);
}if(!empty($_POST['logout'])){
	$result = $instanciaUsuario->delSession();
	echo json_encode($result);
}

//GET REQUEST
if(isset($_GET)){
	$result = $instanciaUsuario->getUsuarios();
	echo json_encode($result);
}

// //DELETE
// if(isset($_GET)){
//     $result = $instanciaUsuario->getUsuarios();
//     echo json_encode($result);
// }