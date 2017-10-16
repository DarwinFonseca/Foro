<!DOCTYPE html>
<?php
    session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
    session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
    include_once('modelo/conexion.php');
    if(isset($_SESSION['id_user'])){
      header('Location: index.php');
    }
?>
<html lang="en-gb" dir="ltr" class="uk-height-1-1">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Crear una sesión</title>
      <link rel="stylesheet" href="https://getuikit.com/v2/docs/css/uikit.docs.min.css">
      <script src="https://getuikit.com/v2/vendor/jquery.js"></script>
      <script src="https://getuikit.com/v2/docs/js/uikit.min.js"></script>
  </head>

  <body class="uk-height-1-1">

    <div class="uk-vertical-align uk-text-center uk-height-1-1">
        <div class="uk-vertical-align-middle" style="width: 250px;">

            <h1>Creación de una sesión</h1>
            <img class="uk-margin-bottom" width="140" height="120" src="registro.png" alt="">

            <form action="controlador/control.php" method="POST" class="uk-panel uk-panel-box uk-form">

                  <div class="uk-form-row">
                    <i class="uk-icon-user"></i>
                    <input required  class="uk-form-width-medium uk-form-large" type="text" placeholder="Username" name="username" id="username"/>
                  </div>
                  <div class="uk-form-row">
                    <i class="uk-icon-at"></i>
                    <input required class="uk-form-width-medium uk-form-large" type="text" placeholder="Correo" name="correo" id="correo"/>
                  </div>
                  <div class="uk-form-row">
                    <i class="uk-icon-key"></i>
                    <input required class="uk-form-width-medium uk-form-large" type="password" placeholder="Password" name="password" id="password" />
                  </div>
                  <div class="uk-form-row">
                  <button type="submit" value="Crear sesión" id="btnRegistrar" name="btnRegistrar" class="uk-width-1-1 uk-button uk-button-primary uk-button-large">Crear sesión</button>
                </div>
            </form><p>
            <a href="index.php"><button value="Volver" class="uk-grid-width-1-2 uk-button uk-button-danger uk-button-large">Volver</button></a></p>
        </div>
      </div>
    </body>
</html>
