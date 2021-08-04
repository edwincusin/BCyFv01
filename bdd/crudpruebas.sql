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

INSERT INTO public.persona(
	cedula_per, apellido1_per, apellido2_per, nombre1_per, nombre2_per, fechanac_per, telefono_per, celular_per, email_per, direcciondom_per, nacionalidad_per, estadocivil, sexo_per, intruccion_per, actividad_per, estadopersona_per)
	VALUES ('1753081050', 'CUSIN', 'ANTAMBA', 'EDWIN', 'GEOVANY', '23-06-1997', '062919080', '0961918920', 'EGA.CUSIN@YAVIRAC.EDU.EC', 'PICHINCHA/QUITO/BELISARIO QUEVEDO/ SAN VICENTE Y S/N / N32OE64', 1, 1, 1, 1, 1, 1),
			('1753081051', 'CUS', 'ANTAM', 'DANIELA', 'CESIBEL', '23-06-1998', '062919081', '0961918921', 'BB.CUSIN@YAVIRAC.EDU.EC', 'IMBABURA/QUITO/BELISARIO QUEVEDO/ SAN VICENTE Y S/N / N32OE64', 2, 2, 2, 2, 3, 2),
			('1753081052', 'CUSI', 'ANT', 'MARLON', 'GABRIEL', '23-06-1999', '062919082', '0961918922', 'CC.CUSIN@YAVIRAC.EDU.EC', 'GUAYAS/QUITO/BELISARIO QUEVEDO/ SAN VICENTE Y S/N / N32OE64', 1, 3, 1, 3, 3, 1),
			('1753081053', 'CSN', 'ANTAMB', 'DIANA', 'VALERIA', '23-06-2000', '062919083', '0961918923', 'DD.CUSIN@YAVIRAC.EDU.EC', 'CHIMBORAZO/QUITO/BELISARIO QUEVEDO/ SAN VICENTE Y S/N / N32OE64', 2, 4, 2, 2, 4, 2);



--*************INGRESO DE DATOS EN TABLAS SECUNDARIAS USUARIO******************************************-- 

--TABLA TIPO USUARIO--

INSERT INTO public.tipousuario(
	codigo_tipusr, descripcion_tipusr)
	VALUES (1, 'ADMINISTRADOR'),
			(2, 'EMPLEADO'),
			(3, 'CLIENTE');

--TABLA ESTADO USUARIO--
INSERT INTO public.estadousuario(
	codigo_esturs, descripcion_estusr)
	VALUES (1, 'ACTIVO'),
			(2, 'PASIVO');


--+++++++++++++++SCRIPT PARA TABLA USUARIO++++++++++++++++--

INSERT INTO public.usuario(
	usuario_usr, contrasena_usr, tipousuario_usr, estado_usr, persona_usr)
	VALUES ('admin', 'admin', 1, 1, '1753081050'),
			('edwincusin1', 'edwincusin1', 2, 1, '1753081051'), 
			('edwincusin2', 'edwincusin2',2, 2, '1753081052'), 
			('edwincusin3', 'edwincusin3', 3, 1, '1753081053');





--*************INGRESO DE DATOS EN TABLAS SECUNDARIAS CUENTA BANCARIA********************************-- 

--TABLA TIPO CUENTA--

INSERT INTO public.tipocuenta(
	codigo_tipcue, descripcion_tipcue)
	VALUES  (1, 'AHORROS'),
			(2, 'CORRIENTE');

--TABLA ESTADO CUENTA--

INSERT INTO public.estadocuenta(
	codigo_estcue, descripcion_estcue)
	VALUES  (1, 'ACTIVO'),
			(2, 'PASIVO');

--+++++++++++++++SCRIPT PARA TABLA CUENTA BANCARIA++++++++++++++++--
INSERT INTO public.cuentabancaria(
	numerocuenta_cueban, fechaapertura_cueban, saldo_cueban, tipocuenta_cueban, persona_cueban, estado_cueban)
	VALUES (1, '01-08-2021', 100.25, 1, '1753081050', 1),
			(2, '01-01-2021', 50, 2, '1753081051', 1),
			(3, '01-02-2021', 0, 1, '1753081052', 2),
			(4, '01-03-2021', 1000, 2, '1753081051', 1);