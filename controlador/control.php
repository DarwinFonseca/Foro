<?php
session_start();
//Si se crea una sesion...
if (isset($_POST['btnRegistrar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->RegistrarUsuario(array(null, $_POST['username'],md5($_POST['password']),$_POST['correo']), "usuarios");
    header('Location: ../index.php');
}

//Si se inicia una sesion...
if (isset($_POST['btnIniciar'])) {
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->ValidarLogin($_POST['username'], md5($_POST['password']));
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
  $pass=md5($_POST['password']);
  if (($_POST['id_user']!="")&&($pass==$_SESSION['password'])) {
      # code...
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->EliminarUsuario($_POST['id_user']);
//    header('Location: ../vista/contenido.php');
    }else {
      header('Location: ../vista/editar_perfil.php');
  }
}

//Editar sesion
if (isset($_POST['btnEditar'])) {
    if ($_POST['id_user']!=""){
      //echo "<br><br>User ID: ".$_POST['id_user'];
      $pass=md5($_POST['password']);
      if(($_POST['password1']==$_POST['password2']) && ($pass==$_SESSION['password'])) {
/*      echo "<br>LAS CONTRASEÑAS SON IGUALES <br>User: ".$_POST['id_user'];
      echo "<br>Username<br>".$_POST['username'];
      echo "<br>Correo<br>".$_POST['correo'];
      echo "<br>P1<br>".$_POST['password1'];
      echo "<br>P2<br>".$_POST['password2'];
      echo "<br>POriginal<br>".$pass;
      echo "<br>PSession<br>".$_SESSION['password']; */
    require '../modelo/conexion.php';
    $db = new conexion();
    $db->Conectar();
    $db->ActualizarUsuario(array($_POST['id_user'],$_POST['username'],md5($_POST['password1']),$_POST['correo']));
  }else {
    //echo "<br>LAS CONTRASEÑAS SON diferentes";
    header('Location: ../vista/editar_perfil.php');
    }
  }
}

if (isset($_POST['btnCrearPublicacion'])) {
    require_once '../modelo/conexion.php';
    require_once '../modelo/publicar.php';
    $db = new conexion();
    $model = new publicar();
    $db->Conectar();
    $model->PublicacionUsuario(array($_SESSION['id_user'], null));
    $model->CrearPublicacion(array(null, $_POST['descripcion'], $_POST['link'], 0, 0, 'activo'));

    header('Location: ../vista/contenido.php');
}

if (isset($_POST['btnComentar'])) {
  session_start();
  if ($_SESSION['id_user']!='0') {
  require_once '../modelo/comentar.php';
  $go = new comentar();
  $go->SubirComentario(array(null, $_SESSION['id_user'],$_POST['id_publicacion'],$_POST['textarea']));
  }else {
    header('Location: ../index.php');
  }
}


?>
