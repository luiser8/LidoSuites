<?php 
require_once '../../models/usuario.php';

$instanciaUsuario = new Usuario();

//POST SEND
if(!empty($_POST)){
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    $instanciaUsuario->getSession($usuario, $password);
}