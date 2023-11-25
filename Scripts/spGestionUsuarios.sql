USE ieuw;

DROP PROCEDURE IF EXISTS spGestionUsuarios;

DELIMITER //

CREATE PROCEDURE spGestionUsuarios(
    IN p_Accion CHAR(3),
    IN p_ID_usuario INT,
    IN p_Correo VARCHAR(50),
    IN p_NombreCompleto VARCHAR(50),
    IN p_Contrasena VARCHAR(30),
    IN p_FechaNacimiento DATE,
    IN p_Matricula INT,
    IN p_Telefono INT,
    IN p_FechaIngreso DATE,
    IN p_Rol BOOLEAN,
    IN p_Calle VARCHAR(200),
    IN p_Pais VARCHAR(30),
    IN p_Ciudad VARCHAR(50),
    IN p_CP INT,
    IN p_UsuarioEliminado BOOL
)
BEGIN
    IF p_Accion = 'IN' THEN
        SET p_FechaIngreso = CURDATE();
        INSERT INTO Usuario(Correo, NombreCompleto, Contrasena, FechaNacimiento, Matricula, Telefono, FechaIngreso, Rol, Calle, Pais, Ciudad, CP, UsuarioEliminado)
        VALUES(p_Correo, p_NombreCompleto, p_Contrasena, p_FechaNacimiento, p_Matricula, p_Telefono, current_date(), p_Rol, p_Calle, p_Pais, p_Ciudad, p_CP, 0);
    END IF;

    IF p_Accion = 'UP' THEN
        UPDATE Usuario
        SET Correo = p_Correo,
            NombreCompleto = p_NombreCompleto,
           
            FechaNacimiento = p_FechaNacimiento,
            Matricula = p_Matricula,
            Telefono = p_Telefono,
            
            
            Calle = p_Calle,
            Pais = p_Pais,
            Ciudad = p_Ciudad,
            CP = p_CP
            
        WHERE IdUsuario = p_ID_usuario;
    END IF;

    IF p_Accion = 'BO' THEN
        UPDATE Usuario
        SET UsuarioEliminado = 1
        WHERE IdUsuario = p_ID_usuario;
    END IF;

    IF p_Accion = 'DE' THEN
        DELETE FROM Usuario WHERE IdUsuario = p_ID_usuario;
    END IF;

    IF p_Accion = 'SE' THEN
        SELECT IdUsuario, Correo, NombreCompleto, Contrasena, FechaNacimiento, Matricula, Telefono, FechaIngreso, Rol, Calle, Pais, Ciudad, CP, UsuarioEliminado
        FROM Usuario
        WHERE IdUsuario = p_ID_usuario;
    END IF;
    IF p_Accion = 'SE2' THEN
        SELECT IdUsuario
        FROM Usuario
        WHERE Correo = p_Correo;
    END IF;
END //

DELIMITER ;
