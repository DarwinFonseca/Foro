<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Editar Usuario</title>
  </head>
  <body>
    <h1>Editar usuario</h1>
<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('Location: ../index.php');
}
 ?>
      <form action="../controlador/control.php" method="POST">
            <p>
                    <label>ID:</label>
                    <br><input disabled type="text" name="id_usuario" id="id_usuario" value="<?php echo $_SESSION['id']; ?>"/>
                    <br><br><label>Nombre:</label>
                    <br><input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']; ?>"/>
                    <br><br><label>Apelido:</label>
                    <br><input type="text" name="apellido" id="apellido" value="<?php echo $_SESSION['apellido']; ?>" />
                    <br><br><label>Correo:</label>
                    <br><input type="text" name="correo" id="correo" value="<?php echo $_SESSION['correo']; ?>"/>
                    <br><br><label>Password:</label>
                    <br><input type="password" name="password" id="password" value="<?php echo $_SESSION['password']; ?>"/>
                    <br><br><label>Género:</label>
                    <br>  <select name="genero" id="genero" value="<?php echo $_SESSION['genero']; ?>">
                      <?php
                      if ($_SESSION['genero']=="M") {
                        echo "<option value='M' selected>Masculino</option><option value='F'>Femenino</option>";
                      }else{
                        echo "<option value='M'>Masculino</option><option value='F' selected>Femenino</option>";
                      }
                       ?>
                      </select>
                    <br><br><label>Atributos:</label>
                    <br><select name="rol" id="rol" value="<?php echo $_SESSION['rol']; ?>">
                      <?php
                      if ($_SESSION['rol']=="1") {
                        echo "<option value='1' selected>L</option><option value='2'>L, CU</option><option value='3'>L, CU, EU</option><option value='4'>L, CU, EU, E</option>";
                        }else{if ($_SESSION['rol']=="2") {
                          echo "<option value='1'>L</option><option value='2' selected>L, CU</option><option value='3'>L, CU, EU</option><option value='4'>L, CU, EU, E</option>";
                          }else{if ($_SESSION['rol']=="3") {
                            echo "<option value='1'>L</option><option value='2'>L, CU</option><option value='3' selected>L, CU, EU</option><option value='4'>L, CU, EU, E</option>";
                            }else {
                              echo "<option value='1'>L</option><option value='2'>L, CU</option><option value='3'>L, CU, EU</option><option value='4' selected>L, CU, EU, E</option>";
                            }
                          }
                        }
                     ?>
                    </select>
<br><br>
                    <input type="submit" value="Actualizar usuario" id="btnActualizar" name="btnActualizar" />
            </p>
    </form>

  </body>
</html>
