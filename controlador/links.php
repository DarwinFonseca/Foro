<?php

class links{

  private $CrearPublicacion;
  private $CerrarSesion;
  private $IniciarSesion;

function links(){

  $this->CrearPublicacion="<a href='../vista/crear_publicacion.php' class='uk-button uk-button-primary uk-button-large'>Crear Publicación</a>";
  $this->MisPublicaciones="<a href='../vista/mis_publicaciones.php' class='uk-button uk-button-success uk-button-large'>Mis Publicaciones</a>";
  $this->MiPerfil="<a href='../vista/editar_perfil.php' class='uk-button uk-button uk-button-large'>Mi Perfil</a>";
  $this->CerrarSesion="<a href='../index.php' class='uk-button uk-button-danger uk-button-large'>Cerrar Sesión</a>";
  $this->IniciarSesion="<a href='../index.php'>Iniciar Sesión</a>";

}

function MostrarLinks(){

//echo "<form action='../controlador/control.php' method='POST'><p>";
  if (isset($_SESSION['id_user'])) {
    if ($_SESSION['id_user']=='0') {
      echo "Para interactuar con el contenido debe $this->IniciarSesion.<br>";
    }else{
      echo $this->CrearPublicacion ." ";
      echo $this->MisPublicaciones ." ";
      echo $this->MiPerfil ." ";
      echo $this->CerrarSesion;
    }
  }
//echo "</p><br></form>";
}

}?>
