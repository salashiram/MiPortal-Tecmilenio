USE ieuw;

DROP PROCEDURE IF EXISTS spLoginUsuario;

DELIMITER //

CREATE PROCEDURE spLoginUsuario (
    IN p_Correo VARCHAR(30),
    IN p_Contrasena VARCHAR(30)
)
BEGIN
    SELECT IdUsuario, Correo, NombreCompleto, Rol, FechaIngreso, FechaNacimiento, UsuarioEliminado
    FROM Usuario
    WHERE Correo = p_Correo AND Contrasena = p_Contrasena;
END //

DELIMITER ;
