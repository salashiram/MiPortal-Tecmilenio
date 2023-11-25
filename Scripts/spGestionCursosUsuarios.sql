USE ieuw;

DROP PROCEDURE IF EXISTS spGestionCursosUsuarios;

DELIMITER //

CREATE PROCEDURE spGestionCursosUsuarios(
    IN p_Accion CHAR(3),
    IN p_ID_curso_usuario INT,
    IN p_ID_curso INT,
    IN p_ID_usuario INT,
    IN p_ID_periodo INT,
    IN p_Calif DECIMAL(3,2),
    IN p_Observaciones VARCHAR(200),
    IN p_Grupo INT,
    IN p_Fecha DATE
)
BEGIN
    IF p_Accion = 'IN' THEN
        INSERT INTO CursosUsuarios(IdCurso, IdUsuario, IdPeriodo, Calif, Observaciones, Grupo, Fecha)
        VALUES(p_ID_curso, p_ID_usuario, p_ID_periodo, p_Calif, p_Observaciones, p_Grupo, p_Fecha);
    END IF;

    IF p_Accion = 'UP' THEN
        UPDATE CursosUsuarios
        SET IdCurso = p_ID_curso,
            IdUsuario = p_ID_usuario,
            IdPeriodo = p_ID_periodo,
            Calif = p_Calif,
            Observaciones = p_Observaciones,
            Grupo = p_Grupo,
            Fecha = p_Fecha
        WHERE IdCursoUsuario = p_ID_curso_usuario;
    END IF;

    IF p_Accion = 'DE' THEN
        DELETE FROM CursosUsuarios WHERE IdCursoUsuario = p_ID_curso_usuario;
    END IF;

    IF p_Accion = 'SE' THEN
        SELECT IdCursoUsuario, IdCurso, IdUsuario, IdPeriodo, Calif, Observaciones, Grupo, Fecha
        FROM CursosUsuarios
        WHERE IdCursoUsuario = p_ID_curso_usuario;
    END IF;
END //

DELIMITER ;
