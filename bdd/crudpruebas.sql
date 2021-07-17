--insertar datos en tablas secundarias de usuariosSiccopes --
--tabla cargo-- 
INSERT INTO public.cargo(
	codigo_cargo, descripcion_cargo)
	VALUES (1, 'DIRECTOR OPERACIONES'),
            (2,'COORDINADOR OPERACIONES'),
            (3, 'OPERADOR CCYOPE');

--tabla tipo o privilegio de usuario-- 
INSERT INTO public.tipousuario(
	codigo_tu, descripcion_tu)
	VALUES (1, 'ADMINISTRADOR'),
            (2, 'USUARIO');

-- tabla sexo --
INSERT INTO public.sexo(
	codigo_sexo, descripcion_sexo)
	VALUES (1, 'HOMBRE'),
            (2, 'MUJER');

-- tablas estado laboral--
INSERT INTO public.estadolaboral(
	codigo_el, descripcion_el)
	VALUES (1, 'ACTIVO'),
            (2, 'CESADO');

--*tabla usuarioSiccopes*--
--registro1--
INSERT INTO public.usuariosiccopes(
                                cedula_usr,
                                contrasena_usr,
                                primerapellido_usr,
                                primernombre_usr,
                                email_usr,
                                fecharegistro_usr,
                                cargo_usr,
                                tipousuario_usr,
                                sexo_usr,
                                estadolaboral_usr)
	VALUES ('1753081056',
            'admin1996',
            'CUSIN',
            'EDWIN',
            'edwin@ecuador.com',
            '02/06/2021',
            3,
            1,
            1,
            1);

--registro1--
INSERT INTO public.usuariosiccopes(
                                cedula_usr,
                                contrasena_usr,
                                primerapellido_usr,
                                primernombre_usr,
                                email_usr,
                                fecharegistro_usr,
                                cargo_usr,
                                tipousuario_usr,
                                sexo_usr,
                                estadolaboral_usr)
	VALUES ('1753081057',
            'admin1997',
            'ANTAMBA',
            'GEOVANNY',
            'edwin@quito.com',
            '01/06/2021',
            1,
            2,
            1,
            2);