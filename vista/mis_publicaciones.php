<!DOCTYPE html>
<html>
<?php
   session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
//   session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
if(!isset($_SESSION['id_user'])){
    //header('Location: ../index.php');
    $_SESSION['id_user']="0";
    $_SESSION['username']="Invitado";
  }
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido</title>
    <link href="/favicon.ico" rel="shortcut icon">
    <!-- link all the styles -->
    <link rel="stylesheet" href="../css/uikit.min.css" />
    <!-- link all the scripts -->
    <script src="../js/jquery.js"></script>
    <script src="../js/uikit.min.js"></script>
  </head>
  <body>
    <div class="container" >
      <div class="uk-container uk-align-center">
        <br>
          <h1 class="uk-h1 uk-text-center">Bienvenido <?=$_SESSION['username'];?> </h1>
            <!--p>
              Su ID es <?=$_SESSION['id_user'];?>, Su Correo es <?=$_SESSION['correo'];?>, Su Password es <?=$_SESSION['password'];?>
            </p-->
            <hr class='uk-grid-divider'>
            <div class="uk-grid-divider uk-grid-margin uk-text-center">
            <a href="contenido.php"><button value="Volver" class="uk-grid-width-1-2 uk-button uk-button-danger uk-button-large">Volver</button></a></p>
          </div><hr class='uk-grid-divider'>
            <!--a href="crear_publicacion.php">Publicar</a><br>
            <a href="../index.php">Cerrar sesión</a-->
            <div class="uk-overflow-auto">
              <?php
                require_once '../modelo/publicar.php';
                $mostrar = new publicar();
                $mostrar->ConsutarMisPublicaciones();
               ?>
               <!-- /.table-responsive -->
            </div>
            <br>
<!--?php
//trae el código para editar los usuarios según el r01
require_once '../controlador/links.php';
$vinculos = new links();
$vinculos->MostrarLinks();
?-->
      </div>
    </div>
  </body>
</html>
