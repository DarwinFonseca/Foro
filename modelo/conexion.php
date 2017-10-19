<?php

class conexion {

  private $usuario;
  private $contrasena;
  private $servidor;
  private $nomDB;
  private $link;

    function conexion() {
        $this->usuario = "root";
        $this->contrasena = "";
        $this->servidor = "localhost";
        $this->nomDB = "foro";
        $this->link = "";
    }

    function Conectar() {
        $this->link = mysql_connect($this->servidor, $this->usuario, $this->contrasena);
        mysql_select_db($this->nomDB, $this->link) or die(mysql_error());
    }
    function CerrarConexion(){
      mysql_close();
    }

    function RegistrarUsuario($fila = array()) {
        $ValoresFila = "";
        while (list($key, $val) = each($fila)) {
            $ValoresFila = $ValoresFila . "'" . $val . "', ";
        }
        $ValoresFila = substr($ValoresFila, 0, -2);
        //echo "insert into usuarios values (" . $ValoresFila . "); <br>";
        mysql_query("insert into usuarios values (" . $ValoresFila . ");")or die('<br>La consulta fallo<br><br> ' . mysql_error());
        //mysqli_query($this->link, "insert into " . $tabla . " values (" . $ValoresFila . ");")or die('La consulta falló ' . mysqli_error($this->link));
        echo "Registro exitoso...!!!";
    }

    public function LogIn($validado, $username, $password) {

      if ($validado=='1') {
        //echo "<br>entro al Script LOGIN<br>";
        $consulta_mysql = 'SELECT * FROM usuarios WHERE username LIKE  "' .$username. '" AND password LIKE "' .$password. '"';
        //echo $consulta_mysql;
        $resultado_consulta_mysql = mysql_query($consulta_mysql);
        while ($row = mysql_fetch_array($resultado_consulta_mysql)) {
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['correo'] = $row['correo'];
          }
    /*
            echo "<br>" .            $_SESSION["id_user"];
            echo "<br>" .            $_SESSION["username"] ;
            echo "<br>" .            $_SESSION["password"];
            echo "<br>" .            $_SESSION["correo"];
    */
            //session_start();
            header ('Location: ../vista/contenido.php');
      }else {
        header('Location: ../index.php');
      }
    }

    function ValidarLogin($username, $password){
      $validado=0;
      #echo "entro al Script VALIDAR <br>";
      $consulta_mysql = 'SELECT * FROM usuarios WHERE username LIKE  "' .$username. '" AND password LIKE "' .$password. '"';
      #echo $consulta_mysql;
      $resultado_consulta_mysql = mysql_query($consulta_mysql);
      $row = mysql_fetch_array($resultado_consulta_mysql);
          if (empty($row)) {
            #echo "<br>¡ No se encontraron resultados !";
          }else {
            #echo "<br>¡ Se encontraron resultados !";
            $validado=1;
          }
          $this->LogIn($validado, $username, $password);
    }

    function EliminarUsuario($id_usuario) {
        $query = "DELETE FROM `usuarios` WHERE `usuarios`.`id` = ".$id_usuario;
        $result = mysql_query($query);
        header('Location: ../index.php');
    }

    function ActualizarUsuario($fila = array()){
      $query = "UPDATE `usuarios` SET `username` = '".$fila[1]."', `correo` = '".$fila[2]."', ' WHERE `usuarios`.`id_user` = ".$fila[0];
      mysql_query($query);
//      echo "QUERY: ". $query;
      header('Location: ../index.php');
    }

    function EditarUsuario($id_usuario) {
          session_destroy();
          session_start();
          $query = "SELECT * FROM `usuarios` WHERE `usuarios`.`id` = ".$id_usuario;
          $result = mysql_query($query);
          echo "El ID del usuario a editar es el ". $id_usuario . ".";

          while ($row = mysql_fetch_array($result)) {
              $_SESSION['id']     = $row['id'];
              $_SESSION['nombre'] = $row['nombre'];
              $_SESSION['apellido'] = $row['apellido'];
              $_SESSION['correo'] = $row['correo'];
              $_SESSION['password'] = $row['password'];
              $_SESSION['genero'] = $row['genero'];
              $_SESSION['rol']  = $row['rol'];
            }

    /*                        echo "session";
                        echo "<br>" .            $_SESSION["id"];
                        echo "<br>" .            $_SESSION["nombre"] . "</td>";
                        echo "<br>" .            $_SESSION["apellido"] . "</td>";
                        echo "<br>" .            $_SESSION["correo"] . "</td>";
                        echo "<br>" .            $_SESSION["password"] . "</td>";
                        echo "<br>" .            $_SESSION["genero"] . "</td>";
                        echo "<br>" .            $_SESSION["rol"] . "</td></tr>";
    */
    header('location: ../vista/editar.php');
    }

/*    function SubirComentario($fila = array()){
      $ValoresFila = "";
      while (list($key, $val) = each($fila)) {
      $ValoresFila = $ValoresFila . "'" . $val . "', ";
      }
      $ValoresFila = substr($ValoresFila, 0, -2);
      echo "insert into usuarios values (" . $ValoresFila . "); <br>";
      //mysql_query("insert into comentarios values (" . $ValoresFila . ");")or die('<br>La consulta fallo<br><br> ' . mysql_error());
    }
*/
}
?>
