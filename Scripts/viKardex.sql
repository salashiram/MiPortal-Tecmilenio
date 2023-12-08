USE ieuw;

DROP VIEW IF EXISTS viKardex;

CREATE VIEW viKardex AS
SELECT
  u.NombreCompleto AS 'NombreAlumno',
  u.Matricula AS 'Matricula',
  ROUND(AVG((cu.PrimerParcial + cu.SegundoParcial + cu.TercerParcial) / 3), 2) AS 'PromedioTotal',
  c.IdCurso AS 'IdCurso',
  c.Creditos AS 'Creditos',
  c.NombreCurso AS 'NombreMateria',
  ROUND(AVG(cu.PrimerParcial), 2) AS 'Promedio1erParcial',
  ROUND(AVG(cu.SegundoParcial), 2) AS 'Promedio2doParcial',
  ROUND(AVG(cu.TercerParcial), 2) AS 'Promedio3erParcial'
FROM
  Usuario u
JOIN CursosUsuarios cu ON u.IdUsuario = cu.IdUsuario
JOIN Curso c ON cu.IdCurso = c.IdCurso
GROUP BY
  u.NombreCompleto, u.Matricula, c.IdCurso, c.Creditos, c.NombreCurso
ORDER BY
  u.NombreCompleto, c.NombreCurso;
