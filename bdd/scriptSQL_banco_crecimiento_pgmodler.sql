-- Database generated with pgModeler (PostgreSQL Database Modeler).
-- pgModeler  version: 0.7.2
-- PostgreSQL version: 9.4
-- Project Site: pgmodeler.com.br
-- Model Author: ---

SET check_function_bodies = false;
-- ddl-end --


-- Database creation must be done outside an multicommand file.
-- These commands were put in this file only for convenience.
-- -- object: new_database | type: DATABASE --
-- -- DROP DATABASE new_database;
-- CREATE DATABASE new_database
-- ;
-- -- ddl-end --
-- 

-- object: public.persona | type: TABLE --
-- DROP TABLE public.persona;
CREATE TABLE public.persona(
	cedula_per varchar(20),
	apellido1_per varchar(25),
	apellido2_per varchar(25),
	nombre1_per varchar(25),
	nombre2_per varchar(25),
	fechanac_per date,
	telefono_per varchar(10),
	celular_per varchar(10),
	email_per varchar(50),
	direcciondom_per varchar(80),
	nacionalidad_per integer,
	estadocivil integer,
	sexo_per integer,
	intruccion_per integer,
	actividad_per integer,
	estadopersona_per integer,
	CONSTRAINT pk_persona PRIMARY KEY (cedula_per)

);
-- ddl-end --
COMMENT ON TABLE public.persona IS 'usuarios del sistema y clientes';
COMMENT ON COLUMN public.persona.apellido1_per IS 'primer apellido';
COMMENT ON COLUMN public.persona.nombre1_per IS 'primer nombre';
COMMENT ON COLUMN public.persona.nombre2_per IS 'segiundo nombre ';
COMMENT ON COLUMN public.persona.fechanac_per IS 'fecha de nacimiento';
COMMENT ON COLUMN public.persona.telefono_per IS 'convencional';
COMMENT ON COLUMN public.persona.nacionalidad_per IS 'nacionalidad';
COMMENT ON COLUMN public.persona.estadocivil IS 'estado civil forenkey';
COMMENT ON COLUMN public.persona.sexo_per IS 'forenkey';
COMMENT ON COLUMN public.persona.actividad_per IS 'forenkey actividad a la que se dedica el usuario ocliente';
COMMENT ON COLUMN public.persona.estadopersona_per IS 'activo / pasivo';
COMMENT ON CONSTRAINT pk_persona ON public.persona IS 'clave primaria de la tambla persona';
-- ddl-end --

-- object: public.sexo | type: TABLE --
-- DROP TABLE public.sexo;
CREATE TABLE public.sexo(
	codigo_sex serial,
	descripcion_sex varchar(15),
	CONSTRAINT pk_sexo PRIMARY KEY (codigo_sex)

);
-- ddl-end --
COMMENT ON TABLE public.sexo IS 'sexo';
COMMENT ON COLUMN public.sexo.descripcion_sex IS 'HOMBRE Y MUJER';
-- ddl-end --

-- object: public.estadocivil | type: TABLE --
-- DROP TABLE public.estadocivil;
CREATE TABLE public.estadocivil(
	codigo_estciv serial,
	descripcion_estciv varchar(20),
	CONSTRAINT pk_estadocivil PRIMARY KEY (codigo_estciv)

);
-- ddl-end --
COMMENT ON TABLE public.estadocivil IS 'soltero / casado / viudo / divorciado / union libre';
-- ddl-end --

-- object: public.intruccion | type: TABLE --
-- DROP TABLE public.intruccion;
CREATE TABLE public.intruccion(
	codigo_int serial,
	descripcion_int varchar(20),
	CONSTRAINT pk_intruccion PRIMARY KEY (codigo_int)

);
-- ddl-end --
COMMENT ON TABLE public.intruccion IS 'nivel de instruccion academico / inicial / primaria / secundaria / superior/';
-- ddl-end --

-- object: public.nacionalidad | type: TABLE --
-- DROP TABLE public.nacionalidad;
CREATE TABLE public.nacionalidad(
	codigo_nac serial,
	descripcion_nac varchar(20),
	CONSTRAINT pk_nacionalidad PRIMARY KEY (codigo_nac)

);
-- ddl-end --
COMMENT ON TABLE public.nacionalidad IS 'nacionalidad persona / ecuatoriano / peruano/colombiano';
-- ddl-end --

-- object: public.actividad | type: TABLE --
-- DROP TABLE public.actividad;
CREATE TABLE public.actividad(
	codigo_act serial,
	descripcion_act varchar(30),
	CONSTRAINT pk_actividad PRIMARY KEY (codigo_act)

);
-- ddl-end --
COMMENT ON TABLE public.actividad IS 'obrero / servicios generales/seguridad/comerciante/educador/ventas/';
-- ddl-end --

-- object: public.tipousuario | type: TABLE --
-- DROP TABLE public.tipousuario;
CREATE TABLE public.tipousuario(
	codigo_tipusr serial,
	descripcion_tipusr varchar(30),
	CONSTRAINT pk_tipo_usuario PRIMARY KEY (codigo_tipusr)

);
-- ddl-end --
COMMENT ON TABLE public.tipousuario IS 'privilegio de usuario / administrador / empleado / cliente';
-- ddl-end --

-- object: public.estadopersona | type: TABLE --
-- DROP TABLE public.estadopersona;
CREATE TABLE public.estadopersona(
	codigo_estper serial,
	descripcion_estper varchar(15),
	CONSTRAINT pk_estadopersona PRIMARY KEY (codigo_estper)

);
-- ddl-end --
COMMENT ON TABLE public.estadopersona IS 'activo/pasivo';
-- ddl-end --

-- object: public.cuentabancaria | type: TABLE --
-- DROP TABLE public.cuentabancaria;
CREATE TABLE public.cuentabancaria(
	numerocuenta_cueban serial,
	fechaapertura_cueban date,
	saldo_cueban float,
	tipocuenta_cueban integer,
	persona_cueban character(20),
	estado_cueban integer,
	CONSTRAINT pk_cuentabancaria PRIMARY KEY (numerocuenta_cueban)

);
-- ddl-end --
-- object: public.tipocuenta | type: TABLE --
-- DROP TABLE public.tipocuenta;
CREATE TABLE public.tipocuenta(
	codigo_tipcue serial,
	descripcion_tipcue varchar(30),
	CONSTRAINT pk_tipocuenta PRIMARY KEY (codigo_tipcue)

);
-- ddl-end --
-- object: public.estadocuenta | type: TABLE --
-- DROP TABLE public.estadocuenta;
CREATE TABLE public.estadocuenta(
	codigo_estcue serial,
	descripcion_estcue varchar(15),
	CONSTRAINT pk_estadocuenta PRIMARY KEY (codigo_estcue)

);
-- ddl-end --
-- object: public.trandeposito | type: TABLE --
-- DROP TABLE public.trandeposito;
CREATE TABLE public.trandeposito(
	codigo_trandep serial,
	fechadeposito_trandep date,
	cuentabancaria_trandep integer,
	nombredep_trandep varchar(50),
	ceduladep_trandep varchar(20),
	monto_trandep double precision,
	tipodeposito_trandep integer,
	banco_trandep integer,
	numerocheque_trandep varchar(30),
	saldomonto_trandep double precision,
	CONSTRAINT pk_transacciondepositos PRIMARY KEY (codigo_trandep)

);
-- ddl-end --
COMMENT ON COLUMN public.trandeposito.saldomonto_trandep IS 'para almacenar la actualizacion del saldo del momento del deposito / historia';
-- ddl-end --

-- object: public.usuario | type: TABLE --
-- DROP TABLE public.usuario;
CREATE TABLE public.usuario(
	usuario_usr varchar(25),
	contrasena_usr varchar(50),
	tipousuario_usr integer,
	estado_usr integer,
	persona_usr varchar(20),
	CONSTRAINT pk_usuario PRIMARY KEY (usuario_usr)

);
-- ddl-end --
COMMENT ON TABLE public.usuario IS 'cuentas de usuario';
-- ddl-end --

-- object: public.estadousuario | type: TABLE --
-- DROP TABLE public.estadousuario;
CREATE TABLE public.estadousuario(
	codigo_esturs serial,
	descripcion_estusr varchar(25),
	CONSTRAINT pk_estado_usuario PRIMARY KEY (codigo_esturs)

);
-- ddl-end --
COMMENT ON TABLE public.estadousuario IS 'activo o pasivo';
-- ddl-end --

-- object: public.bancoslocales | type: TABLE --
-- DROP TABLE public.bancoslocales;
CREATE TABLE public.bancoslocales(
	codigo_banloc serial,
	descripcion_banloc varchar(30),
	CONSTRAINT pk_bancoslocales PRIMARY KEY (codigo_banloc)

);
-- ddl-end --
-- object: public.tipodeposito | type: TABLE --
-- DROP TABLE public.tipodeposito;
CREATE TABLE public.tipodeposito(
	codigo_tipdep serial,
	descripcion_tipdep varchar(30),
	CONSTRAINT pk_tipodeposito PRIMARY KEY (codigo_tipdep)

);
-- ddl-end --
-- object: public.tranretiro | type: TABLE --
-- DROP TABLE public.tranretiro;
CREATE TABLE public.tranretiro(
	codigo_tranret serial,
	fecha_tranret date
);
-- ddl-end --
COMMENT ON TABLE public.tranretiro IS 'tabla transacion retiro';
-- ddl-end --

-- object: fk_nacionalidad | type: CONSTRAINT --
-- ALTER TABLE public.persona DROP CONSTRAINT fk_nacionalidad;
ALTER TABLE public.persona ADD CONSTRAINT fk_nacionalidad FOREIGN KEY (nacionalidad_per)
REFERENCES public.nacionalidad (codigo_nac) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_estadocivil | type: CONSTRAINT --
-- ALTER TABLE public.persona DROP CONSTRAINT fk_estadocivil;
ALTER TABLE public.persona ADD CONSTRAINT fk_estadocivil FOREIGN KEY (estadocivil)
REFERENCES public.estadocivil (codigo_estciv) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_sexo | type: CONSTRAINT --
-- ALTER TABLE public.persona DROP CONSTRAINT fk_sexo;
ALTER TABLE public.persona ADD CONSTRAINT fk_sexo FOREIGN KEY (sexo_per)
REFERENCES public.sexo (codigo_sex) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_instruccion | type: CONSTRAINT --
-- ALTER TABLE public.persona DROP CONSTRAINT fk_instruccion;
ALTER TABLE public.persona ADD CONSTRAINT fk_instruccion FOREIGN KEY (intruccion_per)
REFERENCES public.intruccion (codigo_int) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_actividad | type: CONSTRAINT --
-- ALTER TABLE public.persona DROP CONSTRAINT fk_actividad;
ALTER TABLE public.persona ADD CONSTRAINT fk_actividad FOREIGN KEY (actividad_per)
REFERENCES public.actividad (codigo_act) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_estadopersona | type: CONSTRAINT --
-- ALTER TABLE public.persona DROP CONSTRAINT fk_estadopersona;
ALTER TABLE public.persona ADD CONSTRAINT fk_estadopersona FOREIGN KEY (estadopersona_per)
REFERENCES public.estadopersona (codigo_estper) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_persona | type: CONSTRAINT --
-- ALTER TABLE public.cuentabancaria DROP CONSTRAINT fk_persona;
ALTER TABLE public.cuentabancaria ADD CONSTRAINT fk_persona FOREIGN KEY (persona_cueban)
REFERENCES public.persona (cedula_per) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_tipocuenta | type: CONSTRAINT --
-- ALTER TABLE public.cuentabancaria DROP CONSTRAINT fk_tipocuenta;
ALTER TABLE public.cuentabancaria ADD CONSTRAINT fk_tipocuenta FOREIGN KEY (tipocuenta_cueban)
REFERENCES public.tipocuenta (codigo_tipcue) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_estadocuenta | type: CONSTRAINT --
-- ALTER TABLE public.cuentabancaria DROP CONSTRAINT fk_estadocuenta;
ALTER TABLE public.cuentabancaria ADD CONSTRAINT fk_estadocuenta FOREIGN KEY (estado_cueban)
REFERENCES public.estadocuenta (codigo_estcue) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_cuentabancaria_transacciondeposito | type: CONSTRAINT --
-- ALTER TABLE public.trandeposito DROP CONSTRAINT fk_cuentabancaria_transacciondeposito;
ALTER TABLE public.trandeposito ADD CONSTRAINT fk_cuentabancaria_transacciondeposito FOREIGN KEY (cuentabancaria_trandep)
REFERENCES public.cuentabancaria (numerocuenta_cueban) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_bancoslocales | type: CONSTRAINT --
-- ALTER TABLE public.trandeposito DROP CONSTRAINT fk_bancoslocales;
ALTER TABLE public.trandeposito ADD CONSTRAINT fk_bancoslocales FOREIGN KEY (banco_trandep)
REFERENCES public.bancoslocales (codigo_banloc) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_tipodeposito | type: CONSTRAINT --
-- ALTER TABLE public.trandeposito DROP CONSTRAINT fk_tipodeposito;
ALTER TABLE public.trandeposito ADD CONSTRAINT fk_tipodeposito FOREIGN KEY (tipodeposito_trandep)
REFERENCES public.tipodeposito (codigo_tipdep) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_tipousuario | type: CONSTRAINT --
-- ALTER TABLE public.usuario DROP CONSTRAINT fk_tipousuario;
ALTER TABLE public.usuario ADD CONSTRAINT fk_tipousuario FOREIGN KEY (tipousuario_usr)
REFERENCES public.tipousuario (codigo_tipusr) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: fk_estado_usuario | type: CONSTRAINT --
-- ALTER TABLE public.usuario DROP CONSTRAINT fk_estado_usuario;
ALTER TABLE public.usuario ADD CONSTRAINT fk_estado_usuario FOREIGN KEY (estado_usr)
REFERENCES public.estadousuario (codigo_esturs) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --


-- object: pk_persona_usuario | type: CONSTRAINT --
-- ALTER TABLE public.usuario DROP CONSTRAINT pk_persona_usuario;
ALTER TABLE public.usuario ADD CONSTRAINT pk_persona_usuario FOREIGN KEY (persona_usr)
REFERENCES public.persona (cedula_per) MATCH FULL
ON DELETE NO ACTION ON UPDATE NO ACTION;
-- ddl-end --



