

create database salfa_servicios;


drop database salfa_servicios;

use salfa_servicios;



    show tables; 
select * from usuario;
select * from empleado;
select * from vehiculo;
select * from activo;
select * from herramienta;
select * from cargo_empleado;
drop table cargo_empleado;
drop table herramienta;
drop TABLE estado_asignacion;
drop table usuario;
drop table vehiculo;
drop table estado;
DROP TABLE vehiculo;
drop table tecnologia;

create table if not exists usuario (

 id_usuario int(10) AUTO_INCREMENT,
rut_usuario varchar(10) not null,
password_usuario varchar(8) not null,
primary key(id_usuario),


);

alter table usuario drop foreign key fk_id_cargo_empleado;

create table if not exists empleado (

    id_empleado int(10) AUTO_INCREMENT,
    rut_empleado varchar(10) not null,
    nombre_empleado varchar(30) not null,
    apellido_empleado varchar(30) not null,
    email_empleado varchar(30) not null,
    telefono_empleado varchar(30) not null,
    cargo_empleado int(10),
    primary key(id_empleado),
    constraint fk_id_cargo_empleados FOREIGN KEY(cargo_empleado) REFERENCES cargo_empleado(id_cargo_empleado)


);

drop table empleado;

alter table empleado drop foreign key fk_id_cargo_empleados;

create table if not exists vehiculo (
    id_vehiculo int(10) AUTO_INCREMENT,
    patente_vehiculo varchar(8)NOT null,
    marca_vehiculo VARCHAR (20),
    modelo_vehiculo VARCHAR (20),
    stock_vehiculo int(10),
    descripcion_vehiculo VARCHAR(250),
    primary key( id_vehiculo)
);




create table if not exists tecnologia (

    id_tecnologia int(10) auto_increment,
    nombre_tecnologia varchar(20) null,
    marca_tecnologia varchar(20) null,
    modelo_tecnologia VARCHAR (20) null,
    stock_tecnologia int(10),
    descripcion_tecnologia VARCHAR(250),
    primary key(id_tecnologia)
);

create table if not exists herramienta (

    id_herramienta int(10) auto_increment,
    nombre_herramienta varchar(20) null,
    marca_herramienta varchar(20) null,
    modelo_herramienta VARCHAR (20) null,
    stock_herramienta int(10),
    descripcion_herramienta VARCHAR(250),
    primary key( id_herramienta)
);



create table if not exists activo (

    id_activo int(10) auto_increment,
    id_vehiculo int(10) null,
    id_tecnologia int(10) null,
    id_herramienta int(10) null,
    fecha_entrega DATE,
    fecha_devolucion DATE,
    descripcion_activo varchar(30) not null,
    id_usuario int(10) null,
    primary key(id_activo),
    FOREIGN KEY (id_vehiculo) REFERENCES vehiculo(id_vehiculo),
    FOREIGN KEY (id_tecnologia) REFERENCES tecnologia(id_tecnologia),
    FOREIGN KEY (id_herramienta) REFERENCES herramienta(id_herramienta),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)


);

alter table activo add foreign key (usuario_id) REFERENCES usuario(id_usuario);
alter table activo drop column id_empleado;
alter table activo add  column usuario_id int(10);

CREATE TABLE IF NOT EXISTS estado_asignacion(
    id_estado int(11) auto_increment,
    codigo_estado int(10) DEFAULT 1,
    estado VARCHAR(20) default 'no asignado',
    PRIMARY KEY (id_estado)

);

CREATE TABLE IF NOT EXISTS cargo_empleado(

    id_cargo_empleado INT(10) AUTO_INCREMENT ,
    codigo_cargo_empleado int(20) not null,
    tipo_cargo_empleado VARCHAR(20) not null,
    primary key(id_cargo_empleado)

    
);

