
create DATABASE salfa_servicios;

-- use salfa_servicios;

drop database salfa_servicios;
SHOW TABLEs; 
SELECT * FROM activo;
select * from activo;
describe activo;
select * from cargo_empleado;
describe cargo_empleado;
select * from empleado;
describe empleado;
select * from estado;
describe estado;
select * from herramienta;
describe herramienta;
select * from tecnologia;
describe tecnologia;
select * from usuario;
describe usuario;
select * from vehiculo;
describe vehiculo;


-- Tabla Herramienta ,insert
INSERT  into herramienta (nombre_herramienta,stock_herramienta) 
    VALUES("Alicate",20);
INSERT  into herramienta (nombre_herramienta,stock_herramienta) 
    VALUES("punta phillips",30);
INSERT  into herramienta (nombre_herramienta,stock_herramienta) 
    VALUES("Atornillador cruz",40);
INSERT  into herramienta (nombre_herramienta,stock_herramienta) 
    VALUES("Atornillador paleta",50);
INSERT  into herramienta (nombre_herramienta,stock_herramienta) 
    VALUES("llave allen 2",10);
INSERT  into herramienta (nombre_herramienta,stock_herramienta) 
    VALUES("Alicate punta",90);
INSERT  into herramienta (nombre_herramienta,stock_herramienta) 
    VALUES("Martillo",100);
INSERT  into herramienta (nombre_herramienta,stock_herramienta) 
    VALUES("Taladro",12);
INSERT  into herramienta (nombre_herramienta,stock_herramienta) 
    VALUES("Rotomartillo",10);

   

    

--tabla estado


INSERT INTO estado_asignacion(codigo_estado,estado) values (
    2,'asignado'
);


describe cargo_empleado;

--Inserta cargo_empleado
select * from cargo_empleado;
INSERT INTO cargo_empleado(codigo_cargo_empleado,tipo_cargo_empleado) values (
    2,'administrativo'
);

INSERT INTO cargo_empleado(codigo_cargo_empleado,tipo_cargo_empleado) values (
    3,'administrador'
);

--Inserta tecnologia
INSERT INTO tecnologia(nombre_tecnologia,stock_tecnologia) values (
    'telefono movil',30
);
INSERT INTO tecnologia(nombre_tecnologia,marca_tecnologia,modelo_tecnologia, stock_tecnologia) values (
    'notebook','HP','ENVY15',20
);
INSERT INTO tecnologia(nombre_tecnologia,marca_tecnologia,modelo_tecnologia, stock_tecnologia) values (
    'Celular','Samsung','A21S',10
);

--insertar usuarios
INSERT INTO usuario(rut_usuario,nombre_usuario,apellido_usuario,email_usuario,telefono_usuario,id_cargo_usuario,password_usuario) values (
    '1-1','Alonso','Andrade','alonso@gmail.com','+56 9 056235845',1,123456
);
INSERT INTO usuario(rut_usuario,nombre_usuario,apellido_usuario,email_usuario,telefono_usuario,id_cargo_usuario,password_usuario) values (
    '1-2','Hector','mendoza','hector@gmail.com','+56 9 05623888',2,123456
);
INSERT INTO usuario(rut_usuario,nombre_usuario,apellido_usuario,email_usuario,telefono_usuario,id_cargo_usuario,password_usuario) values (
    '1-3','Mauricio','Tapia','mauricio@gmail.com','+56 9 056238745',1,123456
);

--Insertar Vehiculo
INSERT INTO vehiculo(patente_vehiculo, marca_vehiculo,modelo_vehiculo,stock_vehiculo) values (
    'ab-cd-89','mazda','big-2021',3
);
INSERT INTO vehiculo(patente_vehiculo, marca_vehiculo,modelo_vehiculo,stock_vehiculo) values (
    'IJ-KL-90','Honda','CIVIC',4
);
INSERT INTO vehiculo(patente_vehiculo, marca_vehiculo,modelo_vehiculo,stock_vehiculo) values (
    'ef-gh-89','chevrolet','LUV',5
);




--Insertar Activo
describe activo;
insert into activo( descripcion_activo, patente_vehiculo,id_tecnologia,id_herramienta) values('llega mañana','ef-gh-89',1,1);





    
