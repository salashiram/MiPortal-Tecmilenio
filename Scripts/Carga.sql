USE ieuw;

-- Insertar datos en la tabla Usuario
INSERT INTO Usuario (Correo, NombreCompleto, Contrasena, FechaNacimiento, Matricula, Telefono, FechaIngreso, Rol, Calle, Pais, Ciudad, CP, UsuarioEliminado)
VALUES ('admin@ejemplo.com', 'Administrador', 'admin1234', '1990-01-01', 0, NULL, CURRENT_DATE, 0, '', '', '', 0, 0);

INSERT INTO Usuario (Correo, NombreCompleto, Contrasena, FechaNacimiento, Matricula, Telefono, FechaIngreso, Rol, Calle, Pais, Ciudad, CP, UsuarioEliminado)
VALUES ('correo@ejemplo.com', 'Abolfo', 'asd', '1990-01-01', 0, 12345678, CURRENT_DATE, 1, 'Calle', 'Mexico', 'Monterrey', 0, 0);

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
-- Variables para simplificar las inserciones
SET @IdUsuario = 2; -- Sustituye ID_DEL_ALUMNO con el ID real del alumno
SET @IdPeriodo = (SELECT IdPeriodo FROM Periodo WHERE NombrePeriodo = 'Ago-Dic 2023');

-- Insertar 5 materias para el alumno con id @IdUsuario
INSERT INTO CursosUsuarios (IdCurso, IdUsuario, IdPeriodo, PrimerParcial, SegundoParcial, TercerParcial, Oportunidad, Profesor, Modalidad, Aula, Observaciones, Grupo, Fecha)
VALUES 
((SELECT IdCurso FROM Curso WHERE NombreCurso = 'Graficas 2'), 2, 1, 50, 80, 80, 1, 'Profesor X', 1, 'Aula 101', 'Ninguna', 101, NOW()),
((SELECT IdCurso FROM Curso WHERE NombreCurso = 'IEUW'), 2, 1, 30, 10, 20, 1, 'Profesor Y', 0, 'Virtual', 'Ninguna', 102, NOW()),
((SELECT IdCurso FROM Curso WHERE NombreCurso = 'IEUW'), 2, 1, 30, 100, 40, 2, 'Profesor Y', 0, 'Virtual', 'Ninguna', 102, NOW()),
((SELECT IdCurso FROM Curso WHERE NombreCurso = 'IEUW'), 2, 1, 70, 100, 90, 3, 'Profesor Y', 0, 'Virtual', 'Ninguna', 102, NOW()),
((SELECT IdCurso FROM Curso WHERE NombreCurso = 'Escenarios'), 2, 1, 90, 55, 60, 1, 'Profesor Z', 1, 'Aula 103', 'Ninguna', 103, NOW()),
((SELECT IdCurso FROM Curso WHERE NombreCurso = 'BDM'), 2, 1, 100, 55, 100, 1, 'Profesor A', 1, 'Aula 104', 'Ninguna', 104, NOW()),
((SELECT IdCurso FROM Curso WHERE NombreCurso = 'POI'), 2, 1, 74, 74, 74, 1, 'Profesor B', 0, 'Virtual', 'Ninguna', 105, NOW());


