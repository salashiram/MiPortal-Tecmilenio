USE ieuw;

DROP VIEW IF EXISTS viKardexTotal;

CREATE VIEW viKardexTotal AS
SELECT
  IdUsuario,
  NombreAlumno,
  Matricula,
  ROUND(SUM(Promedio) / COUNT(IdCurso), 2) AS 'PromedioTotal'
FROM
  viKardex
GROUP BY
  IdUsuario, NombreAlumno, Matricula;