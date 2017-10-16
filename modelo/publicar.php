<?php
class publicar{


  function CrearPublicacion($fila = array()) {
    $ValoresFila = "";
    while (list($key, $val) = each($fila)) {
    $ValoresFila = $ValoresFila . "'" . $val . "', ";
    }
    $ValoresFila = substr($ValoresFila, 0, -2);
    //echo "insert into usuarios values (" . $ValoresFila . "); <br>";
    mysql_query("insert into publicaciones values (" . $ValoresFila . ");")or die('<br>La consulta fallo<br><br> ' . mysql_error());
    //mysqli_query($this->link, "insert into " . $tabla . " values (" . $ValoresFila . ");")or die('La consulta falló ' . mysqli_error($this->link));
    echo "Registro exitoso...!!!";
  }

  function PublicacionUsuario($fila = array()) {
    $ValoresFila = "";
    while (list($key, $val) = each($fila)) {
    $ValoresFila = $ValoresFila . "'" . $val . "', ";
    }
    $ValoresFila = substr($ValoresFila, 0, -2);
    //echo "insert into usuarios values (" . $ValoresFila . "); <br>";
    mysql_query("insert into publicacionesxusuario values (" . $ValoresFila . ");")or die('<br>La consulta fallo<br><br> ' . mysql_error());
    //mysqli_query($this->link, "insert into " . $tabla . " values (" . $ValoresFila . ");")or die('La consulta falló ' . mysqli_error($this->link));
    echo "Registro exitoso...!!!";
  }

function ConsutarPublicaciones(){
  //$tabla=" publicacionesxusuario ";
  //$query = "SELECT * FROM ". $tabla;
  require_once '../modelo/conexion.php';
  $db = new conexion();
  $db->Conectar();
  $query="SELECT `publicaciones`.`descripcion`,`publicaciones`.`link`,`publicaciones`.`votos`,`publicaciones`.`comentarios`,`publicacionesxusuario`.`id_user`, `publicacionesxusuario`.`id_publicacion`, `usuarios`.`id_user`, `usuarios`.`username` FROM `publicaciones` LEFT JOIN `publicacionesxusuario` ON `publicaciones`.`id_publicacion` = `publicacionesxusuario`.`id_publicacion` LEFT JOIN `usuarios` ON `publicacionesxusuario`.`id_user` = `usuarios`.`id_user` ORDER BY `publicaciones`.`votos` DESC";
  $result = mysql_query($query);
echo <<< HTML
<!--table width="90%" align="center" class="table table-striped table-bordered table-hover" id="dataTables-example"><thead><tr-->
  <table width="90%" class="uk-table uk-table-divider uk-table-hover uk-table-responsive"><thead><tr>
  <th>Publicación</th><th>Usuario</th><th>Votos</th><th>Comentarios</th>
  </tr></thead><tbody>
HTML;
//echo "Resultado: ". $result;
    $http="http://";
//echo '<form action="control.php" method="POST" class="uk-panel uk-panel-box uk-form">';
    while ($row = mysql_fetch_array($result)) {
      echo "<tr><td><a href=".$http.$row['link']." target='_blank'>" . $row["descripcion"] . "</a></td><td>" . $row["username"] . "</td><td><a class='uk-icon-hover uk-icon-check' href='../controlador/votos.php?id_user=".$_SESSION['id_user']."&id_publicacion=".$row['id_publicacion']."'/> " . $row["votos"] . "
      </td><td><a class='uk-icon-hover uk-icon-comments-o' href='../vista/comentarios.php?id_publicacion=". $row['id_publicacion']."'> " . $row["comentarios"] . "</a></td></tr>";
    if (empty($row)) {
      echo '<tr><td align="center" colspan="4">No hay publicaciones</td></tr>';
    }
  }
  echo '</tbody></table>';
//</form>;
  }

//<a href="http://www.youtube.com" class="uk-icon-button uk-icon-github-square" ></a>
//SELECT `publicaciones`.`descripcion`, `publicaciones`.`link`, `publicaciones`.`votos`, `publicaciones`.`comentarios`, `publicacionesxusuario`.`id_user`, `publicacionesxusuario`.`id_publicacion`, `usuarios`.`id_user`, `usuarios`.`username` FROM `publicaciones` LEFT JOIN `publicacionesxusuario` ON `publicaciones`.`id_publicacion` = `publicacionesxusuario`.`id_publicacion` LEFT JOIN `usuarios` ON `publicacionesxusuario`.`id_user` = `usuarios`.`id_user`

} ?>
