<?php
$id_user=$_GET['id_user'];
$id_publicacion=$_GET['id_publicacion'];

require_once '../modelo/conexion.php';
require_once '../modelo/votar.php';
$db = new conexion();
$model = new votar();
$db->Conectar();
$model->ValidarVoto($id_user,$id_publicacion);
header("location: ../vista/contenido.php");
?>
