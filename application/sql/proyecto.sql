
-- Tabla de usuarios que tendrá un login, pass y email

drop table usuarios cascade;

create table usuarios (
id_usuario bigserial constraint pk_usuarios primary key,
login_usuario varchar(15)  constraint uq_login_usuario unique,
nombre char(15) not null,
apellidos char(30) not null,
clave char(32) not null,
email char(32) constraint uq_email unique
);

insert into usuarios (login_usuario, nombre, apellidos, clave, email) values ('Tehgriefer','Teh', 'Griefer', md5('tehgriefer1'), 'tehgriefer@gmail.com');
insert into usuarios (login_usuario, nombre, apellidos, clave, email) values ('Barbaro', 'Bar', 'Baro', md5('barbaro1'), 'barbaro@gmail.com');
insert into usuarios (login_usuario, nombre, apellidos, clave, email) values ('Mago','Ma', 'Go', md5('mago1'), 'mago@gmail.com');
insert into usuarios (login_usuario, nombre, apellidos, clave, email) values ('Monje','Mon', 'Je', md5('monje1'), 'monje@gmail.com');
insert into usuarios (login_usuario, nombre, apellidos, clave, email) values ('cazador', 'Caza', 'Dor', md5('cazador1'), 'cazador@gmail.com');
insert into usuarios (login_usuario, nombre, apellidos, clave, email) values ('brujo', 'Bru', 'jo', md5('brujo1'), 'brujo@gmail.com');


-- Tabla de los videos que los usuarios podrán subir a la web, tendrá una categoría a elegir de una lista
-- Y la posibilidad de adjuntar un mirror o enlace de otros streamings como youtube, alternativos al de la propia web
-- El video incluirá también una fecha de subida para poder extraerlos más recientes

drop table videos cascade;

create table videos (
id_video bigserial constraint pk_videos primary key,
nombre char(50) not null,
usuario bigint not null constraint fk_videos_usuarios references usuarios(id_usuario),
categoria char(15) not null constraint ck_categoria_valida check (categoria in('Barbarian','WitchDoctor','Wizard','DemonHunter','Monk')),
descripcion text,
fecha_subida timestamp default current_timestamp
);

insert into videos (nombre, usuario, categoria, descripcion) 
values ('DemonHunter Solo Butcher', 5, 'DemonHunter','DH soleando Butcher en Hell');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('Barbarian Solo Azmodan', 1, 'Barbarian','Bárbaro solea Azmodan');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('Monk Solo Butcher', 4, 'Monk','Monje solea Carnicero');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('DemonHunter trailer', 5, 'DemonHunter','Trailer de DH');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('Wizard trailer', 3, 'Wizard','Trailer de Wizard');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('Barbarian trailer', 2, 'Barbarian','Trailer de Barbaro');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('Monk trailer', 4, 'Monk','Trailer de Monje');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('Wizard Solo Butcher', 3, 'Wizard','Trailer de DH');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('DemonHunter Solo Belial', 5, 'DemonHunter','Demon Hunter vs Belial');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('DemonHunter Solo Azmodan', 5, 'DemonHunter','Demon Hunter vs Azmodan');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('DemonHunter Solo Rakanoth', 5, 'DemonHunter','Demon Hunter vs Rakanoth');
insert into videos (nombre, usuario, categoria, descripcion) 
values ('Witch Doctor 9 secs Butcher', 6, 'WitchDoctor','Insane DPS');



-- Tabla de comentarios que los usuarios podrán hacer sobre el video, se podrá votar del 1 al 5 y escribir un comentario

drop table comentarios cascade;

create table comentarios (
id_comentario bigserial constraint pk_comentarios primary key,
video bigint not null constraint fk_comentarios_videos references videos(id_video),
usuario bigint not null constraint fk_videos_usuarios references usuarios(id_usuario),
puntuacion numeric(1) constraint ck_puntuacion_valida check (puntuacion between 1 and 5),
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


-- Crearemos una vista para facilitar la consulta desde la página principal de los 10 últimos videos


drop view ultimos_videos cascade;

create view ultimos_videos as select nombre, usuario, categoria, descripcion,
		
	  case  when  trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/60) = 0  then   ' « 1 Minuto '
		when  trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/60) = 1  then     trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/60) || ' Minuto '
		when  (trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/3600) < 1) then  trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/60) || ' Minutos '
		when  (trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/3600) = 1) then  trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/3600) || ' Hora '
		when (trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/3600) < 24 ) then trunc(extract(epoch from current_timestamp -fecha_subida)/3600) || ' Horas '
		when (trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/3600) = 24 ) then trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/86400) || ' Día '
  		when (trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/3600) > 24 ) then trunc(EXTRACT(EPOCH FROM current_timestamp - fecha_subida)/86400) || ' Días '  
		else trunc(extract(epoch from current_timestamp -fecha_subida)/3600) || ' Horas '  END as fecha from videos order by fecha_subida desc limit 10;


-- Vamos a crear una vista más sencilla para calcular los 10 videos mejor valorados (En función a su puntuación media)

drop view puntuacion_videos cascade;

create view puntuacion_videos as select (select nombre from videos where id_video=video) as nombre, ROUND(AVG(puntuacion)) as media, count(video) 
					from comentarios group by video order by AVG(puntuacion) desc limit 10;

-- Vistas para ver los videos de las diferentes categorías

create view videos_magos as select * from videos where categoria = 'Wizard';

create view videos_barbaros as select * from videos where categoria = 'Barbarian';

create view videos_brujos as select * from videos where categoria = 'WitchDoctor';

create view videos_monjes as select * from videos where categoria = 'Monk';

create view videos_demonhunter as select * from videos where categoria = 'DemonHunter';
