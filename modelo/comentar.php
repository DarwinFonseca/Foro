<?php
class comentar{


    function SubirComentario($fila = array()){
      require_once 'conexion.php';
      $db = new conexion();
      $db->Conectar();
      $ValoresFila = "";
      while (list($key, $val) = each($fila)) {
      $ValoresFila = $ValoresFila . "'" . $val . "', ";
      }
      $ValoresFila = substr($ValoresFila, 0, -2);
      echo "insert into usuarios values (" . $ValoresFila . "); <br>";
      mysql_query("insert into comentarios values (" . $ValoresFila . ");")or die('<br>La consulta fallo<br><br> ' . mysql_error());

      $this->SumarComentario($fila[2]);

      header('Location: ../vista/comentarios.php?id_publicacion='.$fila[2]);
    }


  function PublicacionAComentar($id_publicacion){
    require_once 'conexion.php';
    $db = new conexion();
    $db->Conectar();
    $query="SELECT `publicaciones`.`descripcion`,`publicaciones`.`link`,`publicaciones`.`votos`,`publicaciones`.`comentarios`,
            `publicacionesxusuario`.`id_user`, `publicacionesxusuario`.`id_publicacion`, `usuarios`.`id_user`, `usuarios`.`username`
            FROM `publicaciones`
            LEFT JOIN `publicacionesxusuario` ON `publicaciones`.`id_publicacion` = `publicacionesxusuario`.`id_publicacion`
            LEFT JOIN `usuarios` ON `publicacionesxusuario`.`id_user` = `usuarios`.`id_user`
            WHERE `publicaciones`.`id_publicacion` = $id_publicacion";
    $result = mysql_query($query);

  echo <<< HTML
  <div class="uk-panel-box-primary">
    <table width="90%" class="uk-table uk-table-divider uk-table-hover uk-table-responsive"><thead><tr>
    <th>Publicación</th><th>Publicado por: </th><th>Votos</th><th>Comentarios</th>
    </tr></thead><tbody>
HTML;
      $http="http://";
      while ($row = mysql_fetch_array($result)) {
        echo "<tr><td><a href=".$http.$row['link']." target='_blank'>" . $row["descripcion"] . "</a></td><td>" . $row["username"] . "</td><td><a class='uk-icon-hover uk-icon-thumbs-o-up' /> " . $row["votos"] . "</a></td><td><a class='uk-icon-hover uk-icon-comments-o' /> " . $row["comentarios"] . "</a></td></tr>";
      if (empty($row)) {
        echo '<tr><td align="center" colspan="5">No hay publicaciones</td></tr>';
      }
    }
    echo '</tbody></table></div>';
    }

    function MostrarComentarios($id_publicacion){
      require_once 'conexion.php';
      $db = new conexion();
      $db->Conectar();
      $query="SELECT `comentarios`.`comentario`, `usuarios`.`username`, `usuarios`.`id_user`, `comentarios`.`id_comentario`, `comentarios`.`id_publicacion`
              FROM `comentarios`
              LEFT JOIN `usuarios` ON `comentarios`.`id_user` = `usuarios`.`id_user`
              WHERE `comentarios`.`id_publicacion` = $id_publicacion";
      $result = mysql_query($query);

        while ($row = mysql_fetch_array($result)) {
          echo '<div class="uk-panel-box">';
          echo <<< HTML
           <p>$row[username] comentó: </p>$row[comentario]
</div><br>
HTML;
        if (empty($row)) {
          echo '<tr><td align="center">No hay publicaciones</td></tr>';
        }
      }
    }

    function SumarComentario($id_publicacion){
      $sql="SELECT comentarios FROM `publicaciones` WHERE id_publicacion = '$id_publicacion'";
      $result = mysql_query($sql);
      while ($row = mysql_fetch_array($result)) {
        $ValorComentarios=$row['comentarios']+1;
      }
      $query="UPDATE `publicaciones` SET `comentarios` = $ValorComentarios WHERE `publicaciones`.`id_publicacion` = $id_publicacion";
      mysql_query($query);
    }


} ?>
