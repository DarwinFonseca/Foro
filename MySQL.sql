CREATE database foro;
use foro;

CREATE TABLE `usuarios` (
`id_user` INT(100) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`username`  varchar(45) NOT NULL,
`password` varchar(45) NOT NULL,
`correo` varchar(45) NOT NULL
);

CREATE TABLE `publicaciones` (
`id_publicacion` INT(100) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`descripcion`  varchar(900) NOT NULL,
`link`  varchar(100) NOT NULL,
`votos` INT(100) NOT NULL,
`comentarios` INT(100) NOT NULL,
`estado` varchar(45) NOT NULL
);

CREATE TABLE `publicacionesxusuario` (
`id_user` INT(100) NOT NULL,
`id_publicacion` INT(100) NOT NULL PRIMARY KEY AUTO_INCREMENT,
foreign key(id_user) references `usuarios`(id_user) on delete cascade on update cascade,
foreign key(id_publicacion) references `publicaciones`(id_publicacion) on delete cascade on update cascade
);

CREATE TABLE `comentarios` (
`id_comentario` INT(100) PRIMARY KEY NOT NULL AUTO_INCREMENT,
`id_user`  INT(100) NOT NULL,
`id_publicacion`  INT(100) NOT NULL,
`comentario`  varchar(900) NOT NULL,
foreign key(id_user) references `usuarios`(id_user) on delete cascade on update cascade,
foreign key(id_publicacion) references `publicaciones`(id_publicacion) on delete cascade on update cascade
);

CREATE TABLE `votos` (
`id_user` INT(100) NOT NULL,
`id_publicacion` INT(100) NOT NULL,
foreign key(id_user) references `usuarios`(id_user) on delete cascade on update cascade,
foreign key(id_publicacion) references `publicaciones`(id_publicacion) on delete cascade on update cascade
);


INSERT INTO `usuarios` (`id_user`, `username`, `password`, `correo`) VALUES (NULL, 'darwin', 'darwin', 'darwin'), (NULL, 'jose', 'jose', 'jose');
