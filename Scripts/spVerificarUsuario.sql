USE ieuw;

DROP PROCEDURE IF EXISTS spVerificarUsuario;

DELIMITER //

CREATE PROCEDURE spVerificarUsuario(
    IN p_NombreUsuario VARCHAR(30),
    OUT pUsuarioExistente INT
)
BEGIN
    SELECT COUNT(*) INTO pUsuarioExistente
    FROM Usuario
    WHERE Correo = p_NombreUsuario;
END //

DELIMITER ;
