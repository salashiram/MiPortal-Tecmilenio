USE ieuw;

DROP PROCEDURE IF EXISTS spGestionCursos;

DELIMITER //

CREATE PROCEDURE spGestionCursos(
    IN p_Accion CHAR(3),
    IN p_ID_curso INT,
    IN p_NombreCurso VARCHAR(100),
    IN p_Semestre INT,
    IN p_Creditos INT,
    IN p_CursoEliminado BOOL
)
BEGIN
    IF p_Accion = 'IN' THEN
        INSERT INTO Curso(NombreCurso, Semestre, Creditos, CursoEliminado)
        VALUES(p_NombreCurso, p_Semestre, p_Creditos, 0);
    END IF;

    IF p_Accion = 'UP' THEN
        UPDATE Curso
        SET NombreCurso = p_NombreCurso,
            Semestre = p_Semestre,
            Creditos = p_Creditos,
            CursoEliminado = p_CursoEliminado
        WHERE IdCurso = p_ID_curso;
    END IF;

    IF p_Accion = 'BO' THEN
        UPDATE Curso
        SET CursoEliminado = 1
        WHERE IdCurso = p_ID_curso;
    END IF;

    IF p_Accion = 'DE' THEN
        DELETE FROM Curso WHERE IdCurso = p_ID_curso;
    END IF;

    IF p_Accion = 'SE' THEN
        SELECT IdCurso, NombreCurso, Semestre, Creditos, CursoEliminado
        FROM Curso
        WHERE IdCurso = p_ID_curso;
    END IF;
END //

DELIMITER ;
