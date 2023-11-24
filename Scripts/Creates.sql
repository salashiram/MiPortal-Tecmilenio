use ieuw;

DROP TABLE IF EXISTS CursosUsuarios;
CREATE TABLE CursosUsuarios
(
IdCursoUsuario INT auto_increment PRIMARY KEY NOT NULL, -- PK 
IdCurso INT  NOT NULL, -- FK(Curso)
IdUsuario INT NOT NULL, -- FK(Usuario)
IdPeriodo INT NOT NULL, -- FK(Periodo)
Calif DECIMAL(3,2) ,
Observaciones VARCHAR(50) ,
Grupo int not null, 
Fecha DATE NOT NULL

);

DROP TABLE IF EXISTS Periodo;
CREATE TABLE Periodo
(
  IdPeriodo INT auto_increment PRIMARY KEY NOT NULL, -- PK 
  NombrePeriodo VARCHAR(30) NOT NULL  
);

DROP TABLE IF EXISTS Curso;
CREATE TABLE Curso
(
  IdCurso INT auto_increment PRIMARY KEY NOT NULL, -- PK 
  NombreCurso VARCHAR(30) NOT NULL ,
  Semestre int not null,
  Creditos int not null,  
  CursoEliminado BOOL NOT NULL
);

DROP TABLE IF EXISTS Usuario;
CREATE TABLE Usuario
(
  IdUsuario INT auto_increment PRIMARY KEY NOT NULL, -- PK
  Correo VARCHAR(30) NOT NULL unique,
  NombreCompleto VARCHAR(30) NOT NULL ,
  Contrasena VARCHAR(30) NOT NULL ,  FechaNacimiento  DATE NOT NULL, 
  Matricula int NOT NULL,
  Telefono int ,
  FechaIngreso  DATE NOT NULL,
  Rol bool NOT NULL, -- 0 empleado, 1 alumno
  Calle VARCHAR(50),
  Pais VARCHAR(30),
  Ciudad VARCHAR(30),
  CP int,  
  UsuarioEliminado BOOL NOT NULL
);

ALTER TABLE CursosUsuarios	
	ADD CONSTRAINT FK_UsuLista_iDUsuario   FOREIGN KEY (IdUsuario) REFERENCES Usuario(IdUsuario),
    ADD CONSTRAINT FK_UsuLista_iDUsuario2   FOREIGN KEY (IdCurso) REFERENCES Curso(IdCurso),
    ADD CONSTRAINT FK_UsuLista_iDUsuario3   FOREIGN KEY (IdPeriodo) REFERENCES Periodo(IdPeriodo);




    
