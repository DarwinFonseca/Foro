<?php
session_start();
//Si se crea una sesion...
if (isset($_POST['btnRegistrar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->RegistrarUsuario(array(null, $_POST['username'],$_POST['password'],$_POST['correo']), "usuarios");
    header('Location: ../index.php');
}

//Si se inicia una sesion...
if (isset($_POST['btnIniciar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->ValidarLogin($_POST['username'], $_POST['password']);
//    header('Location: ../vista/contenido.php');
}

//Si votan...
if (isset($_POST['btnVotar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->Votar($row['id_user'],$row['id_publicacion']);
//    header('Location: ../vista/contenido.php');
}

//Eliminar sesion
if (isset($_POST['btnEliminar'])) {
  if ($_POST['id_usuario']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EliminarUsuario($_POST['id_usuario']);
//    header('Location: ../vista/contenido.php');
  }
}

//Editar sesion
if (isset($_POST['btnEditar'])) {
  if ($_POST['id_usuario']=="") {
    header('Location: ../vista/contenido.php');
  }else{
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EditarUsuario($_POST['id_usuario']);
    //header('Location: ../vista/editar.php');
  }
}

if (isset($_POST['btnCrearPublicacion'])) {
    require_once '../modelo/conexion.php';
    require_once '../modelo/publicar.php';
    $db = new conexion();
    $model = new publicar();
    $db->Conectar();
    $model->CrearPublicacion(array(null, $_POST['descripcion'], $_POST['link'], 0, 0));
    $model->PublicacionUsuario(array($_SESSION['id_user'], null));

    header('Location: ../vista/contenido.php');
}

if (isset($_POST['btnComentar'])) {
  session_start();
  if ($_SESSION['id_user']!=0) {
  require_once '../modelo/comentar.php';
  $go = new comentar();
  $go->SubirComentario(array(null, $_SESSION['id_user'],$_POST['id_publicacion'],$_POST['textarea']));
  }else {
    header('Location: ../index.php');
  }
}


?>
