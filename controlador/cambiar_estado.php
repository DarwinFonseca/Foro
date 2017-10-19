<?php
$estado=$_GET['estado'];
$id_publicacion=$_GET['id_publicacion'];

require_once '../modelo/conexion.php';
require_once '../modelo/publicar.php';
$db = new conexion();
$pub = new publicar();
$db->Conectar();
$pub->CambiarEstado($estado, $id_publicacion);
header("location: ../vista/mis_publicaciones.php");
?>
