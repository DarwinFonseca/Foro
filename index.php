<?php
session_start(); // al volver al index si existe una session, esta sera destruida, existen formas de conservarlas como con un if(session_start()!= NULL). Pero por el momento para el ejemplo no es valido.
session_destroy();  // Se destruye la session existente de esta forma no permite el duplicado.
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="uk-height-1-1">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Iniciar sesión</title>
        <link rel="stylesheet" href="https://getuikit.com/v2/docs/css/uikit.docs.min.css">
        <script src="https://getuikit.com/v2/vendor/jquery.js"></script>
        <script src="https://getuikit.com/v2/docs/js/uikit.min.js"></script>
    </head>

    <body class="uk-height-1-1">
        <div class="uk-vertical-align uk-text-center">
          <br>
          <h1>Bienvenido al foro</h1>
            <div class="uk-vertical-align-middle" style="width: 250px;">
                <img class="uk-margin-bottom" width="140" height="120" src="login.png" alt="">
                <form action="controlador/control.php" method="POST" class="uk-panel uk-panel-box uk-form">
                    <div class="uk-form-row">
                      <i class="uk-icon-user"></i>
                        <input name="username" required class="uk-form-width-medium uk-form-large" type="text" placeholder="Username">
                    </div>
                    <div class="uk-form-row">
                      <i class="uk-icon-key"></i>
                        <input name="password" required class="uk-form-width-medium uk-form-large" type="password" placeholder="Password">
                    </div>
                    <div class="uk-form-row">
                        <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" value="Iniciar sesión" id="btnIniciar" name="btnIniciar" >Iniciar Sesión</button>
                    </div>
                    <div class="uk-form-row uk-text-small">
                        <!--label class="uk-float-left"><input type="checkbox"> Recordarme</label-->
                        <!--a class="uk-float-right uk-link uk-link-muted" href="#">Recordar Password</a-->
                    </div>
                </form>
                <h3>
                También puede <a class="uk-link uk-link-reset" href="registro.php">registrarse</a><br>
                <br><a class="uk-link uk-icon-unlink" href="vista/contenido.php"> Explorar publicaciones</a>
              </h3>
                </div>
        </div>
    </body>
</html>
