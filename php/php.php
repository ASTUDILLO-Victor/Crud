<?php
include '../conexion/conn.php';
include '../models/poo.php';


$ce = $_POST["cedu"];

$nombre = $_POST["nom"];
$apellido = $_POST["ape"];

$nuevoUsuario = new Usuario($ce, $nombre, $apellido);

$nuevoUsuario->obtener($conn);


