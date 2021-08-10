
--ARCHIVO DE CAMBIO REALIXADOS EN LA DB PARA SER REUTILIZADOS EN CASO DE CAMBIOS ,NO OLVIDAR COMENTARLOS POR FAVOR



-- ALTER TABLE
	-- tecnologia ADD marca_tecnologia  VARCHAR(20) NOT NULL ;


-- DROP  table
    -- ALTER TABLE
-- 	tecnologia DROP marca_tecnologia;
--     ALTER TABLE
-- 	activo ADD marca_activo VARCHAR(20);
--     ALTER TABLE
-- 	activo ADD marca_activo VARCHAR(20);

--     ALTER TABLE activo 
--    ADD CONSTRAINT fk_estado
--    FOREIGN KEY (estado) 
--    REFERENCES "Anios"(clave_anio);

--    alter table empleado DROP COLUMN cargo_empleado cascade;
describe usuario;
ALTER TABLE cargo_empleado MODIFY id_cargo_empleado INT NOT NULL;
ALTER TABLE cargo_empleado DROP PRIMARY KEY;
ALTER TABLE cargo_empleado ADD PRIMARY KEY (codigo_cargo_empleado);
ALTER TABLE activo ADD  id_cargo_empleado int(10) null;
ALTER TABLE activo ADD COLUMN  (codigo_cargo_empleado);
--agrega columna a tabla activo
ALTER TABLE activo ADD codigo_cargo_empleado INT(20) NOT NULL;
ALTER TABLE vehiculo ADD patente_vehiculo VARCHAR(8) NOT NULL;
ALTER TABLE activo ADD id_cargo_usuario  INT(10) NOT NULL;
ALTER TABLE activo  FOREIGN KEY (codigo_cargo_empleado) REFERENCES cargo_empleado(codigo_cargo_empleado);
ALTER TABLE activo ADD FOREIGN KEY (id_cargo_empleado) REFERENCES cargo_empleado(id_cargo_empleado);
ALTER TABLE activo ADD FOREIGN KEY (id_cargo_usuario) REFERENCES cargo_empleado(id_cargo_empleado);
ALTER TABLE activo ADD codigo_cargo_empleado INT(20) NOT NULL;
ALTER TABLE activo ADD CONSTRAINT fk_codigo_cargo_empleado FOREIGN KEY (codigo_cargo_empleado) REFERENCES cargo_empleado(codigo_cargo_empleado);
ALTER TABLE activo ADD codigo_estado INT(10) NOT NULL;
ALTER TABLE activo ADD CONSTRAINT fk_codigo_estado FOREIGN KEY (codigo_estado) REFERENCES estado(id_estado);
ALTER TABLE estado ADD id_estado INT(20) auto_increment;
ALTER TABLE `vehiculo` CHANGE COLUMN nombre_vehiculo marca_vehiculo varchar (30) NOT NULL;

alter table vehiculo add COLUMN modelo_vehiculo VARCHAR(10) not null;
alter table usuario add COLUMN clave INT(8) not null;


--eliminar una columna 
alter table activo drop marca_activo;
alter table activo drop nombre_activo;
alter table asignacion_activo RENAME asignar_activo;
ALTER TABLE activo drop id_cargo_empleado;
ALTER TABLE activo drop FOREIGN KEY id_cargo_empleado;