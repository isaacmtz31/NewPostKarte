drop database  if exists Postales;
create database Postales;
use Postales;

drop table if exists admini;
create table admini(
	idAdmin int(10) primary key not null auto_increment,
    contra varchar(32),
    email varchar(60)
);
drop table if exists usuario;
create table usuario(
	idUsuario int(10) primary key not null auto_increment,
	nombreUsuario varchar(100),
    apellidoUsuario varchar(100),
    genero varchar(15),
	contra varchar(32),
	email varchar(60), 
    edad int(2),
    fotoPerfil varchar(500) default 'C:\\wamp64\\www\\postkarte_v2\\imgs\\users\\user1.jpg',
    fechaRegistro datetime default current_timestamp
);
drop table if exists categorias;
create table categorias(
	idCategoria int(10) primary key not null auto_increment,
    nombreCategoria varchar(100),    
    imagen nvarchar(300) null default 'C:\\wamp64\\www\\postkarte_v2\\imgs\\categorias\\categoria1.jpg',
    conteo int(4) not null default 0 /* cuenta las postales enviadas pertenecientes a esta categoria */
);

create table papel
(
	idPapel int(10) primary key not null auto_increment,
    nombrePapel varchar(150),
	img varchar(150) default 'C:\\wamp64\\www\\postkarte_v2\\imgs\\papeles\\papel1.jpg'  
);

drop table if exists karte;
create table karte
(
	idKarte int(3) primary key not null,
    nombreK nvarchar(50) not null, 
    descripcion nvarchar(200) not null, 
    idPapel int(3) not null, 
    enviados int(4) not null default 0,    
    FOREIGN KEY  (idPapel) REFERENCES papel(idPapel) on update cascade on delete cascade
);

 /* Tabla para conocer enviados/recibidos */
drop table if exists relUsuarioKarte;
create table relUsuarioKarte
(
	idEnviados int(10) primary key not null auto_increment,
    idRemitente int(10) not null,
    idDestinatario int(10) not null,
    idKarte int(3) not null,
    FOREIGN KEY (idRemitente) REFERENCES usuario(idUsuario) on update cascade on delete cascade,
    FOREIGN KEY (idDestinatario) REFERENCES usuario(idUsuario) on update cascade on delete cascade,
    FOREIGN KEY (idKarte) REFERENCES karte(idKarte) on update cascade on delete cascade
);



/*PROCEDIMIENTOS ALMACENADOS*/

drop procedure if exists logIn;
delimiter **
create procedure logIn(in mail varchar(60), in psw varchar(32))
begin
	declare admOusr int;
    declare ok int;
    declare msj varchar(60);
    set admOusr = (select count(idAdmin) from admini where email = mail);
		if(admOusr != 0)then
			set ok = (select count(idAdmin) from admini where email = mail and contra = psw);
				if(ok = 0)then
					set msj = 'ADMIN NO ENCONTRADO';
                else
					set msj = 'ADMIN ENCONTRADO';
                end if;
        else
			set ok = (select count(idUsuario) from usuario where email = mail and contra = psw);
            if(ok = 0)then
					set msj = 'USUARIO NO ENCONTRADO';
                else
					set msj = 'USUARIO ENCONTRADO';
                end if;
        end if;      
        select msj as aviso;
end**
delimiter ;
select * from usuario;
call logIn('isaac@mail.com','1234');

drop procedure if exists agregarUsuario;
delimiter **
CREATE PROCEDURE agregarUsuario(in nombreU varchar(100), in apellidoU varchar(100), in gener varchar(15), in psw varchar(32), in mail varchar(60), in age int(2))
begin
	DECLARE msj VARCHAR(60);
    DECLARE idUsuAux int(10);
    DECLARE existe int;
    set existe = (select count(idUsuario) from usuario where email = mail);
    if(existe = 0) then
		IF(nombreU != '')THEN
			IF(apellidoU != '') then
				IF(gener != '' ) then
					IF(psw != '' ) then
						IF(mail != '') then
							insert into usuario(nombreUsuario,apellidoUsuario,genero,contra,email,edad) values(nombreU, apellidoU, gener, psw, mail, age);                      
							set msj = 'Usuario agregado';
						ELSE
							set msj = 'EL PASSWORD ESTA VACIO';
						END IF;
					ELSE
						set msj = 'EL PASSWORD ESTA VACIO';
					END IF;
				ELSE
					set msj = 'EL GENERO ESTA VACIO';
				END IF;
			else
				set msj = 'EL APELLIDO ESTA VACIO';
			end if;
		ELSE	
			set msj = 'EL NOMBRE ESTA VACIO';
		END IF;
	else	
		set msj = 'Ese correo ya esta ocupado';
	END IF;
    select msj as aviso;
end**
delimiter ;
call agregarUsuario('ISAAC','MARTINEZ SANCHEZ', 'MASCULINO', '1234','isaac@mail.com',20);
select * from usuario;
insert into usuario(idUsuario,nombreUsuario,apellidoUsuario,genero,contra,email,edad)  values (1, 'ISAAC','MARTINEZ SANCHEZ', 'MASCULINO', '1234','isaac@mail.com',20);
insert into usuario(nombreUsuario,apellidoUsuario,genero,contra,email,edad)  values ('ISAAC','MARTINEZ SANCHEZ', 'MASCULINO', '1234','isaac@mail.com',20);
delete from usuario;

drop procedure if exists agregarAdmin;
delimiter **
create procedure agregarAdmin(in mail varchar(60), in psw varchar(32))
begin
	declare existe int;
    declare msj varchar(50);
    set existe = (select count(idAdmin) from admini where email = mail);
    if(existe = 0)then
		if(mail != '')then
			if(psw != '') then
				insert into admini(contra,email)values(psw, mail);
				set msj = 'Administrador agregado';
            else
				set msj = 'CONTRASENA VACIA';
            end if;
        else
			set msj = 'EL MAIL ESTA VACIO';
        end if;			
    else
		set msj = 'Ese correo de administrador ya esta ocupado';
	end if;
    select msj as aviso;
end **
delimiter ;

select * from admini;
call agregarAdmin('admin1@admin.com','1324');
call logIn('admin@admin.com','134');

/*Recuperar datos del usuario*/
drop procedure if exists datosUsuario;
delimiter **
create procedure datosUsuario(in mail varchar(60))
begin
	declare existe int;
    declare msj varchar(60);
    set existe = (select count(idUsuario) from usuario where email = mail);
    if(existe != 0)then
		select idUsuario, nombreUsuario as 'Nombre', apellidoUsuario as 'Apellidos', genero as 'Genero', email as 'E-mail', edad as 'Edad', fotoPerfil as 'Foto de Perfil' from usuario where email = mail;        
    else
		set msj = 'Ese usuario no existe';        
        select msj as aviso;
end if;		
end**
delimiter ;
select * from usuario;
call datosUsuario('isaac@mail.com')


