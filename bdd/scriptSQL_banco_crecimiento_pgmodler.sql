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
	nombre1_per varchar(25),
	nombre2_per varchar(25),
	apellido2_per varchar(25),
	fechanac_per date,
	telefono_per varchar(10),
	celular_per varchar(10),
	direcciondom_per varchar(50),
	nacionalidad_per integer,
	estadocivil integer,
	sexo_per integer,
	intruccion_per integer,
	actividad_per integer,
	tipopersona_per integer,
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
COMMENT ON COLUMN public.persona.tipopersona_per IS 'forenkey tipo de persona';
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

-- object: public.tipopersona | type: TABLE --
-- DROP TABLE public.tipopersona;
CREATE TABLE public.tipopersona(
	codigo_tipper serial,
	descripcion_tipper varchar(30)
);
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


