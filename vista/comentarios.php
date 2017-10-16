<?php
session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
if (!isset($_SESSION['id_user']) || !isset($_GET['id_publicacion']) ) {
  header('Location: ../index.php');
}
$id_user=$_SESSION['id_user'];
$username=$_SESSION['username'];

require_once '../modelo/comentar.php';
$mostrar = new comentar();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comentar</title>
    <!-- link all the styles -->
    <link href="/favicon.ico" rel="shortcut icon">
    <!-- link all the styles -->
    <link rel="stylesheet" href="../css/uikit.min.css" />
    <!-- link all the scripts -->
    <script src="../js/jquery.js"></script>
    <script src="../js/uikit.min.js"></script>

  </head>
  <body>
    <div class="container">
    <div class="uk-container uk-align-center">
<br>
    <h1 class="uk-text-center">Comentar en la publicación</h1>
      <br><div class="uk-overflow-auto">
          <?php
            $mostrar->PublicacionAComentar($_GET['id_publicacion']);
           ?>
      </div>
      <a href="contenido.php"><button value="Volver" class="uk-grid-width-1-2 uk-button uk-button-danger uk-button-large">Volver</button></a><hr>

      <?php if ($id_user!=0) {
 echo <<< HTML
     <form action="../controlador/control.php" method="POST" class="uk-form uk-panel uk-panel-box ">
      <div class="uk-margin-large">
        <input type="hidden"  name="id_publicacion"   id="id_publicacion" value="$_GET[id_publicacion]" />
        <label class="uk-form-label uk-h3 ">Comentario:</label> <br>
        <textarea class="uk-width-1-1 uk-form-large" name="textarea" rows="6" required maxlength="10000" placeholder="Escriba su comentario aquí..."></textarea>
      </div>
          <button class ="uk-form-width-medium uk-button uk-button-primary uk-button-large" type="submit" value="Comentar" id="btnComentar" name="btnComentar">Comentar</button>
    </form>
HTML;
        }else {
          echo "Para interactuar con el contenido debe <a href='../index.php'>Iniciar Sesión</a><br>";
        } ?>

          <div class="uk-container"><br>
            <h3>Comentarios anteriores: </h3>
            <?php
              $mostrar->MostrarComentarios($_GET['id_publicacion']);
             ?>
          </div>
        </div>
      </div>

    </body>
</html>
