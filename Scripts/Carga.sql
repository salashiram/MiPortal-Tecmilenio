USE ieuw;

-- Insertar datos en la tabla Usuario
INSERT INTO Usuario (Correo, NombreCompleto, Contrasena, FechaNacimiento, Matricula, Telefono, FechaIngreso, Rol, Calle, Pais, Ciudad, CP, UsuarioEliminado)
VALUES ('admin@ejemplo.com', 'Administrador', 'admin1234', '1990-01-01', 0, NULL, CURRENT_DATE, 0, '', '', '', 0, 0);

-- Insertar datos en la tabla Periodo
INSERT INTO Periodo (NombrePeriodo)
VALUES ('Ago-Dic 2023'), ('Ene-Jun 2024'), ('Ago-Dic 2024');

-- Insertar datos en la tabla Curso
INSERT INTO Curso (NombreCurso, Semestre, Creditos, CursoEliminado)
VALUES ('Graficas 2', 6, 3, 0), ('IEUW', 6, 4, 0), ('Escenarios', 6, 3, 0);

INSERT INTO Curso (NombreCurso, Semestre, Creditos, CursoEliminado)
VALUES ('BDM', 7, 3, 0), ('POI', 7, 4, 0), ('Optimizacion', 7, 3, 0);

INSERT INTO Curso (NombreCurso, Semestre, Creditos, CursoEliminado)
VALUES ('RV', 8, 3, 0), ('Web 2', 8, 4, 0), ('Procesamiento', 8, 3, 0);

-- Insertar datos en la tabla CursosUsuarios
INSERT INTO CursosUsuarios (IdCurso, IdUsuario, IdPeriodo, Calif, Observaciones, Grupo, Fecha)
VALUES (1, 1, 1, NULL, '', 1, CURRENT_DATE), (2, 1, 2, NULL, '', 2, CURRENT_DATE), (3, 1, 3, NULL, '', 1, CURRENT_DATE);


