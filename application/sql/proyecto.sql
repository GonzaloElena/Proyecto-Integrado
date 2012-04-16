
-- Tabla de usuarios que tendrá un login, pass y email

drop table usuarios cascade;

create table usuarios (
id_usuario bigserial constraint pk_usuarios primary key,
login_usuario varchar(15)  constraint uq_login_usuario unique,
clave char(32) not null,
email char(32) constraint uq_email unique
);

insert into usuarios (login_usuario, clave, email) values ('Tehgriefer', md5('tehgriefer1'), 'tehgriefer@gmail.com');
insert into usuarios (login_usuario, clave, email) values ('Barbaro', md5('barbaro1'), 'barbaro@gmail.com');
insert into usuarios (login_usuario, clave, email) values ('Mago', md5('mago1'), 'mago@gmail.com');
insert into usuarios (login_usuario, clave, email) values ('Monje', md5('monje1'), 'monje@gmail.com');
insert into usuarios (login_usuario, clave, email) values ('cazador', md5('cazador1'), 'cazador@gmail.com');


-- Tabla de los videos que los usuarios podrán subir a la web, tendrá una categoría a elegir de una lista
-- Y la posibilidad de adjuntar un mirror o enlace de otros streamings como youtube, alternativos al de la propia web
-- El video incluirá también una fecha de subida para poder extraerlos más recientes

drop table videos cascade;

create table videos (
id_video bigserial constraint pk_videos primary key,
nombre char(30) not null,
usuario bigint not null constraint fk_videos_usuarios references usuarios(id_usuario),
categoria char(15) not null constraint ck_categoria_valida check (categoria in('Barbarian','WitchDoctor','Wizard','DemonHunter','Monk')),
puntuacion numeric (3,2),
enlace char(30),
descripcion text,
fecha_subida timestamp default current_timestamp
);

insert into videos (nombre, usuario, categoria,  enlace, descripcion) 
values ('TehgrieferPvp', 1, 'Barbarian', 'http://www.youtube.es/teh','Video fenomenal de Pvp a saco');
insert into videos (nombre, usuario, categoria,  enlace, descripcion) 
values ('TehgrieferPvp2', 1, 'Barbarian', 'http://www.youtube.es/teh2','Nuestro amigo Teh ajusticia a unos paletos');
insert into videos (nombre, usuario, categoria,  enlace, descripcion) 
values ('TehgrieferPvp3', 1, 'Barbarian', 'http://www.youtube.es/te3','Teh la lía a saco');
insert into videos (nombre, usuario, categoria,  enlace, descripcion) 
values ('Bárbaro', 2, 'Barbarian', 'http://www.youtube.es/barbaro','Video de un bárbaro dando hostias como panes');
insert into videos (nombre, usuario, categoria,  enlace, descripcion) 
values ('Mago', 3, 'Wizard', 'http://www.youtube.es/wizard','Video de un mago que es tralla pura');
insert into videos (nombre, usuario, categoria,  enlace, descripcion) 
values ('Mago', 4, 'DemonHunter', 'http://www.youtube.es/hunter','Video de un cazador de demonios skilled');
insert into videos (nombre, usuario, categoria,  enlace, descripcion) 
values ('Mago', 5, 'Monk', 'http://www.youtube.es/monk','Video de un monje más duro que Bruce Willis');
insert into videos (nombre, usuario, categoria,  enlace, descripcion) 
values ('WitchDoctor', 1, 'WitchDoctor', 'http://www.youtube.es/witch','Puro vudú');


-- Tabla de comentarios que los usuarios podrán hacer sobre el video, se podrá votar del 1 al 5 y escribir un comentario

drop table comentarios cascade;

create table comentarios (
id_comentario bigserial constraint pk_comentarios primary key,
video bigint not null constraint fk_comentarios_videos references videos(id_video),
usuario bigint not null constraint fk_videos_usuarios references usuarios(id_usuario),
puntuacion numeric(1) not null constraint ck_puntuacion_valida check (puntuacion between 1 and 5),
comentario text,
fecha timestamp default current_timestamp
);

insert into comentarios (video, usuario, puntuacion, comentario) values (1,2,5,'Eres el puto amo');
insert into comentarios (video, usuario, puntuacion, comentario) values (1,3,5,'Puro Skill');
insert into comentarios (video, usuario, puntuacion, comentario) values (1,4,5,'Best video ever');
insert into comentarios (video, usuario, puntuacion, comentario) values (2,2,1,'Veneno');
insert into comentarios (video, usuario, puntuacion, comentario) values (3,2,5,'Mu güeno');
insert into comentarios (video, usuario, puntuacion, comentario) values (4,2,5,'Bestial');
insert into comentarios (video, usuario, puntuacion, comentario) values (5,2,1,'Perdí 10 minutos de mi vida');
insert into comentarios (video, usuario, puntuacion, comentario) values (6,1,5,'Me encanta');
insert into comentarios (video, usuario, puntuacion, comentario) values (7,1,5,'Fabuloso');




