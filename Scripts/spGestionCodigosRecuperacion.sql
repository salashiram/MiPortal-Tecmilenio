USE ieuw;

DROP PROCEDURE IF EXISTS spGestionCodigosRecuperacion;

DELIMITER //

CREATE PROCEDURE spGestionCodigosRecuperacion(
    IN p_Accion CHAR(3),
    IN p_IdRecuperacion INT,
    IN p_IdUsuario INT,
    IN p_Codigo VARCHAR(50),
    IN p_FechaExpiracion DATETIME,
    IN p_Utilizado BOOL
)
BEGIN
    IF p_Accion = 'IN' THEN
        INSERT INTO RecuperacionContrasena(IdUsuario, Codigo, FechaCreacion, FechaExpiracion, Utilizado)
       VALUES(p_IdUsuario, p_Codigo, NOW(), DATE_ADD(NOW(), INTERVAL 15 MINUTE), p_Utilizado);
    END IF;

    IF p_Accion = 'UP' THEN
        UPDATE RecuperacionContrasena
        SET Codigo = p_Codigo,
            FechaExpiracion = p_FechaExpiracion,
            Utilizado = p_Utilizado
        WHERE IdRecuperacion = p_IdRecuperacion;
    END IF;

    IF p_Accion = 'SE' THEN
        SELECT IdRecuperacion, IdUsuario, Codigo, FechaCreacion, FechaExpiracion, Utilizado
        FROM RecuperacionContrasena
        WHERE IdRecuperacion = p_IdRecuperacion;
    END IF;
END //

DELIMITER ;
