USE ieuw;

DROP PROCEDURE IF EXISTS spGestionCursosUsuarios;

DELIMITER //

CREATE PROCEDURE spGestionCursosUsuarios(
    IN p_Accion CHAR(3),
    IN p_ID_curso_usuario INT,
    IN p_ID_curso INT,
    IN p_ID_usuario INT,
    IN p_ID_periodo INT,
    IN p_PrimerParcial DECIMAL(3,2),
    IN p_SegundoParcial DECIMAL(3,2),
    IN p_TercerParcial DECIMAL(3,2),
    IN p_Oportunidad INT,
    IN p_Profesor VARCHAR(50),
    IN p_Modalidad BOOL,
    IN p_Aula VARCHAR(50),
    IN p_Observaciones VARCHAR(200),
    IN p_Grupo INT,
    IN p_Fecha DATE
)
BEGIN
    IF p_Accion = 'IN' THEN
        INSERT INTO CursosUsuarios(
            IdCurso, 
            IdUsuario, 
            IdPeriodo, 
            PrimerParcial, 
            SegundoParcial, 
            TercerParcial, 
            Oportunidad,
            Profesor,
            Modalidad,
            Aula,
            Observaciones, 
            Grupo, 
            Fecha)
        VALUES(
            p_ID_curso, 
            p_ID_usuario, 
            p_ID_periodo, 
            p_PrimerParcial, 
            p_SegundoParcial, 
            p_TercerParcial, 
            p_Oportunidad,
            p_Profesor,
            p_Modalidad,
            p_Aula,
            p_Observaciones, 
            p_Grupo, 
            p_Fecha);
    END IF;

    IF p_Accion = 'UP' THEN
        UPDATE CursosUsuarios
        SET IdCurso = p_ID_curso,
            IdUsuario = p_ID_usuario,
            IdPeriodo = p_ID_periodo,
            PrimerParcial = p_PrimerParcial,
            SegundoParcial = p_SegundoParcial,
            TercerParcial = p_TercerParcial,
            Oportunidad = p_Oportunidad,
            Profesor = p_Profesor,
            Modalidad = p_Modalidad,
            Aula = p_Aula,
            Observaciones = p_Observaciones,
            Grupo = p_Grupo,
            Fecha = p_Fecha
        WHERE IdCursoUsuario = p_ID_curso_usuario;
    END IF;

    IF p_Accion = 'DE' THEN
        DELETE FROM CursosUsuarios WHERE IdCursoUsuario = p_ID_curso_usuario;
    END IF;

    IF p_Accion = 'SE' THEN
        SELECT *
        FROM CursosUsuarios
        WHERE IdCursoUsuario = p_ID_curso_usuario;
    END IF;
    IF p_Accion = 'SE2' THEN
    SELECT 
        Curso AS 'Nombre de la Materia',
        Oportunidad,
        Profesor,
        Modalidad,
        Aula
    FROM 
        viDetalleCursosUsuarios
    WHERE 
        IdUsuario = p_ID_usuario;
END IF;
IF p_Accion = 'SE3' THEN
    SELECT 
        v.NombreCurso AS 'Materia',
        v.Oportunidad,
        v.PrimerParcial,
        v.SegundoParcial,
        v.TercerParcial,
        (v.PrimerParcial + v.SegundoParcial + v.TercerParcial)/3 AS 'Promedio',
        p.NombrePeriodo
    FROM 
        viDetalleCursosUsuarios v
    JOIN Periodo p ON v.IdPeriodo = p.IdPeriodo
    WHERE 
        v.IdUsuario = p_ID_usuario
    ORDER BY 
        v.IdPeriodo DESC, v.Promedio DESC;
END IF;
END //

DELIMITER ;
