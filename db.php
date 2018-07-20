<?php

class db
{
    public static function conexion(){
        $conexion = new mysqli('localhost', 'id5519139_lidosuites_user', '19651249ler', 'id5519139_lidosuites', '3306');
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}