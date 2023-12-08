USE ieuw;

DROP VIEW IF EXISTS viKardex;

CREATE VIEW viKardex AS
SELECT
  u.IdUsuario AS 'IdUsuario',
  u.NombreCompleto AS 'NombreAlumno',
  u.Matricula AS 'Matricula',
  c.IdCurso AS 'IdCurso',
  c.Creditos AS 'Creditos',
  c.Semestre AS 'Semestre',
  c.NombreCurso AS 'NombreMateria',
  cu.Oportunidad AS 'Oportunidad',
  ROUND(AVG(cu.PrimerParcial), 2) AS 'Promedio1erParcial',
  ROUND(AVG(cu.SegundoParcial), 2) AS 'Promedio2doParcial',
  ROUND(AVG(cu.TercerParcial), 2) AS 'Promedio3erParcial',
  ROUND(AVG((cu.PrimerParcial + cu.SegundoParcial + cu.TercerParcial) / 3), 2) AS 'Promedio'
FROM
  Usuario u
JOIN CursosUsuarios cu ON u.IdUsuario = cu.IdUsuario
JOIN Curso c ON cu.IdCurso = c.IdCurso
GROUP BY
  u.IdUsuario, u.NombreCompleto, u.Matricula, c.IdCurso, c.Creditos, c.Semestre, c.NombreCurso, cu.Oportunidad
ORDER BY
  c.IdCurso, c.Semestre, c.NombreCurso;
