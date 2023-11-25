USE ieuw;

DROP VIEW IF EXISTS viDetalleCursosUsuarios;

CREATE VIEW viDetalleCursosUsuarios AS
SELECT
    cu.IdCursoUsuario AS Id,
    c.NombreCurso AS Curso,
    cu.PrimerParcial,
    cu.SegundoParcial,
    cu.TercerParcial,
    cu.Oportunidad,
    cu.Profesor,
    CASE cu.Modalidad WHEN 1 THEN 'Presencial' ELSE 'En línea' END AS Modalidad,
    cu.Aula,
    cu.Observaciones,
    cu.Grupo,
    cu.Fecha,
    u.IdUsuario,
    u.NombreCompleto AS NombreUsuario,
    u.Rol,
    u.Correo,
    u.Matricula,
    u.Telefono,
    u.FechaNacimiento,
    u.Calle,
    u.Pais,
    u.Ciudad,
    u.CP,
    p.NombrePeriodo AS Periodo,
    (SELECT COUNT(*) FROM CursosUsuarios WHERE IdUsuario = cu.IdUsuario AND IdPeriodo = cu.IdPeriodo) AS TotalCursosPeriodo
FROM
    CursosUsuarios cu
    JOIN Usuario u ON cu.IdUsuario = u.IdUsuario
    JOIN Curso c ON cu.IdCurso = c.IdCurso
    JOIN Periodo p ON cu.IdPeriodo = p.IdPeriodo
GROUP BY
    cu.IdCursoUsuario, u.IdUsuario;
