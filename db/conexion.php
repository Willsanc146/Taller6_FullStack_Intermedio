<?php

    $host = 'localhost';
    $usuario = 'root';
    $contraseña = '';
    $basedatos = 'mi_proyecto';

    $conexion = new mysqli($host,$usuario,$contraseña,$basedatos,3307); //Los ultimos 4 numeros son el puerto que utiliza SQL

    if ($conexion->connect_errno) {
        echo "fallos en conexión";
        exit();
    }

?>