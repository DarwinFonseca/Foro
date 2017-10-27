<?php
session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
if (!isset($_SESSION['id_user']) || $_SESSION['id_user']=="0") {
  header('Location: ../index.php');
}?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Crear Bien</title>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/favicon.ico" rel="shortcut icon">
        <!-- link all the styles -->
        <link rel="stylesheet" href="../css/uikit.min.css" />
        <!-- link all the scripts -->
        <script src="../js/jquery.js"></script>
        <script src="../js/uikit.min.js"></script>

  </head>
  <body>

<div class="container">
  <div class="uk-container uk-container-center uk-text-center">
    <br>
    <h1>Crear publicación</h1>
    <div class="uk-vertical-align-middle" style="width: 600px;">
    <form class="uk-form uk-panel uk-panel-box" action="../controlador/control.php" method="POST">
              <br><label class="uk-form-label uk-h3 uk-align-left">Link:</label> <br />
              <br><input required class="uk-width-1-1 uk-form-large" type="text" name="link" id="link" placeholder="www.example.com" />
              <br><br><label class="uk-form-label uk-h3 uk-align-left">Descripción:</label> <br />
              <br><textarea required class="uk-width-1-1 uk-form-large" type="text" name="descripcion" id="descripcion" placeholder="Ejemplo: Introducción a la ingeniería social"  rows="4" cols="49"></textarea>
              <br><br><input class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit" value="Crear Publicacion"  id="btnCrearPublicacion" name="btnCrearPublicacion" />
          </div>
    </form>
    <br><br><a href="contenido.php"><button value="Volver" class="uk-grid-width-1-2 uk-button uk-button-danger uk-button-large">Volver</button></a></p>
</div>
  </body>
</html>
