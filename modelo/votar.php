<?php

class votar{

function ValidarVoto($id_user, $id_publicacion) {
  $res_id_user=null; $res_id_publicacion=null;
  if ($id_user!=0) {

  $query = "SELECT `votos`.`id_user`, `votos`.`id_publicacion` FROM votos
  LEFT JOIN `publicaciones` ON `publicaciones`.`id_publicacion` = `votos`.`id_publicacion`
  LEFT JOIN `usuarios` ON `usuarios`.`id_user` = `votos`.`id_user`
  WHERE `publicaciones`.`id_publicacion` = '$id_publicacion' AND `usuarios`.`id_user` = '$id_user'";
  $result = mysql_query($query);
  while ($row = mysql_fetch_array($result)) {
    $res_id_user=$row['id_user'];
    $res_id_publicacion=$row['id_publicacion'];
  }
  #echo "$query<br>";
  if ($res_id_user==null&&$res_id_publicacion==null) {
    $this->AgregarVotante($id_user, $id_publicacion);
    $this->AgregarVotos($id_publicacion);
    }else {
      #echo "<p>Usted ya votó en esta publicación</p>";
      $this->EliminarVotos($id_publicacion);
      $this->EliminarVotante($id_user, $id_publicacion);
      #echo "<p>Usuario encontrado: $res_id_user";
      #echo "<p>Publicación encontrada: $res_id_publicacion";
    }
  }
  #echo "<p>Usuario dado: $id_user";
  #echo "<p>Publicación dada: $id_publicacion";
}
function EliminarVotante($id_user, $id_publicacion) {
  $query = "DELETE FROM `votos` WHERE `votos`.`id_publicacion` = $id_publicacion AND `votos`.`id_user` = $id_user";
  mysql_query($query);
}

function AgregarVotante($id_user, $id_publicacion) {
    $query = "INSERT INTO `votos` (`id_user`, `id_publicacion`) VALUES ($id_user, $id_publicacion)";
    mysql_query($query);
  }

function EliminarVotos($id_publicacion){
  $sql="SELECT votos FROM `publicaciones` WHERE id_publicacion = '$id_publicacion'";
  $result = mysql_query($sql);
  while ($row = mysql_fetch_array($result)) {
    $ValorVotos=$row['votos']-1;
  }
  $query="UPDATE `publicaciones` SET `votos` = $ValorVotos WHERE `publicaciones`.`id_publicacion` = $id_publicacion";
  mysql_query($query);
}

function AgregarVotos($id_publicacion){
  $sql="SELECT votos FROM `publicaciones` WHERE id_publicacion = '$id_publicacion'";
  $result = mysql_query($sql);
  while ($row = mysql_fetch_array($result)) {
    $ValorVotos=$row['votos']+1;
  }
  $query="UPDATE `publicaciones` SET `votos` = $ValorVotos WHERE `publicaciones`.`id_publicacion` = $id_publicacion";
  mysql_query($query);
  #echo "$query<br>";
  #echo "<p>Número de votos: ".$ValorVotos;
  //include("../controlador/votar.php");
}
}
 ?>
