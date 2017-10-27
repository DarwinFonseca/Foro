<?php
session_start();
if (!isset($_SESSION['id_user'])) {
  header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="uk-height-1-1">
  <head>
    <title>Editar Usuario</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://getuikit.com/v2/docs/css/uikit.docs.min.css">
      <script src="https://getuikit.com/v2/vendor/jquery.js"></script>
      <script src="https://getuikit.com/v2/docs/js/uikit.min.js"></script>
  </head>
  <body class="uk-height-1-1 uk-width-large-1-1">
    <div class="uk-vertical-align uk-text-center uk-height-1-1">
      <div class="uk-vertical-align-middle" style="width: 250px;">
        <h1>Editar Perfil</h1>
          <img class="uk-margin-bottom" width="140" height="120" src="../registro.png" alt="">

                <form action="../controlador/control.php" method="POST" class="uk-panel uk-panel-box uk-form">
                  <div class="uk-form-row">
                    <label class="uk-align-left uk-h4">ID Usuario: </label>
                    <div class="uk-form-row uk-form-icon">
                      <i class="uk-icon-user"></i>
                      <input class="uk-form-width-medium uk-form-large" type="text" placeholder="ID Usuario" name="id" id="id" value="<?=$_SESSION['id_user']?>" disabled />
                      <input class="uk-form-width-medium uk-form-large" type="hidden" placeholder="ID Usuario" name="id_user" id="id_user" value="<?=$_SESSION['id_user']?>"/>
                    </div>
                  </div>
                  <div class="uk-form-row">
                    <label class="uk-align-left uk-h4">Nombre del Usuario: </label>
                    <div class="uk-form-row uk-form-icon">
                      <i class="uk-icon-user"></i>
                      <input required  class="uk-form-width-medium uk-form-large" type="text" placeholder="Username" name="username" id="username" value="<?=$_SESSION['username']?>"/>
                      </div>
                  </div>
                  <div class="uk-form-row">
                    <label class="uk-align-left uk-h4">Correo: </label>
                    <div class="uk-form-row uk-form-icon">
                      <i class="uk-icon-at"></i>
                      <input required class="uk-form-width-medium uk-form-large" type="text" placeholder="Correo" name="correo" id="correo" value="<?=$_SESSION['correo']?>"/>
                    </div>
                  </div>
                  <div class="uk-form-row">
                    <label class="uk-align-left uk-h4">Contraseña Actual: </label>
                    <div class="uk-form-row uk-form-icon">
                      <i class="uk-icon-key"></i>
                      <input required class="uk-form-width-medium uk-form-large" type="password" placeholder="Password" name="password" id="password" value=""/>
                    </div>
                  </div>
                  <div class="uk-form-row">
                    <label class="uk-align-left uk-h4">Nueva Contraseña: </label>
                    <div class="uk-form-row uk-form-icon">
                      <i class="uk-icon-key"></i>
                      <input required class="uk-form-width-medium uk-form-large" type="password" placeholder="Password" name="password1" id="password1" value=""/>
                    </div>
                  </div>
                  <div class="uk-form-row">
                    <label class="uk-align-left uk-h4">Confirmar Contraseña: </label>
                    <div class="uk-form-row uk-form-icon">
                      <i class="uk-icon-key"></i>
                      <input required class="uk-form-width-medium uk-form-large" type="password" placeholder="Password" name="password2" id="password2" value=""/>
                    </div>
                  </div>
                  <div class="uk-form-row">
                      <button type="submit" value="Actualizar Usuario" id="btnEditar" name="btnEditar" class="uk-width-1-1 uk-button uk-button-success uk-button-large">Actualizar Datos</button>
                  </div>
                  <div class="uk-form-row">
                    <button type="submit" value="Eliminar Usuario" id="btnEliminar" name="btnEliminar" class="uk-width-1-1 uk-button uk-button-danger uk-button-large">Eliminar Usuario</button>
                  </div>
                </form><p>
                <a href="contenido.php"><button value="Volver" class="uk-grid-width-1-2 uk-button uk-button-primary uk-button-large">Volver</button></a></p>
      </div>
    </div>
  </body>
</html>
