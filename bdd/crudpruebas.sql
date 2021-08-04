--*************INGRESO DE DATOS EN TABLAS SECUNDARIAS PERSONA**************************************-- 

--TABLA NACIONALIDAD--

INSERT INTO public.nacionalidad(
	codigo_nac, descripcion_nac)
	VALUES (1, 'ECUATORIANO'),
			(2, 'EXTRANJERO');


--TABLA ESTADO CIVIL--

INSERT INTO public.estadocivil(
	codigo_estciv, descripcion_estciv)
	VALUES (1, 'SOLTERO/A'),
			(2, 'CASADO/A'),
			(3,'DIVORCIADO/A'),
			(4,'VIUDO/A');


--TABLA SEXO--

INSERT INTO public.sexo(
	codigo_sex, descripcion_sex)
	VALUES (1, 'HOMBRE'),
			(2, 'MUJER');



--TABLA INSTRUCCION--

INSERT INTO public.intruccion(
	codigo_int, descripcion_int)
	VALUES (1, 'INICIAL'),
			(2, 'PRIMARIA'),
			(3, 'SECUNDARIA'),
			(4, 'SUPERIOR');


--TABLA ACTIVIDAD--

INSERT INTO public.actividad(
	codigo_act, descripcion_act)
	VALUES (1, 'EMPLEADO PRIVADO'),
			(2, 'FUNCIONARIO PÚBLICO'),
			(3, 'AUTÓNOMO'),
			(4, 'AGRICOLA'),
			(5, 'COMERCIANTE'),
			(6, 'AREAS DE LA TECNOLOGÍA'),
			(7, 'ÁREAS DE MEDICINA'),
			(8, 'SEGURIDAD'),
			(9, 'TRANSPORTE'),
			(10, 'LOGÍSTICA'),
			(11, 'OTROS');


--TABLA ESTADO PERSONA --

INSERT INTO public.estadopersona(
	codigo_estper, descripcion_estper)
	VALUES (1, 'ACTIVO'),
			(2,'PASIVO');

--+++++++++++++++SCRIPT PARA TABLA PERSONA++++++++++++++++--





--*************INGRESO DE DATOS EN TABLAS SECUNDARIAS USUARIO******************************************-- 

--TABLA TIPO USUARIO--


--TABLA ESTADO USUARIO--



--+++++++++++++++SCRIPT PARA TABLA USUARIO++++++++++++++++--







--*************INGRESO DE DATOS EN TABLAS SECUNDARIAS CUENTA BANCARIA********************************-- 

--TABLA TIPO CUENTA--


--TABLA ESTADO CUENTA--