USE ieuw;

DROP PROCEDURE IF EXISTS spGestionPeriodos;

DELIMITER //

CREATE PROCEDURE spGestionPeriodos(
    IN p_Accion CHAR(3),
    IN p_ID_periodo INT,
    IN p_NombrePeriodo VARCHAR(30)
)
BEGIN
    IF p_Accion = 'IN' THEN
        INSERT INTO Periodo(NombrePeriodo)
        VALUES(p_NombrePeriodo);
    END IF;

    IF p_Accion = 'UP' THEN
        UPDATE Periodo
        SET NombrePeriodo = p_NombrePeriodo
        WHERE IdPeriodo = p_ID_periodo;
    END IF;

    IF p_Accion = 'DE' THEN
        DELETE FROM Periodo WHERE IdPeriodo = p_ID_periodo;
    END IF;

    IF p_Accion = 'SE' THEN
        SELECT IdPeriodo, NombrePeriodo
        FROM Periodo
        WHERE IdPeriodo = p_ID_periodo;
    END IF;
END //

DELIMITER ;
