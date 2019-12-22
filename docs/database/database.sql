CREATE DATABASE casprop;
USE casprop;

CREATE TABLE Practica(
    Id INT auto_increment,
    Nombre VARCHAR(50),
    constraint pk_practica primary key(Id)
);

CREATE TABLE Empresa(
    Rut INT,
    Nombre VARCHAR(100),
    Direccion VARCHAR(100),
    Giro VARCHAR(100),
    constraint pk_empresa primary key(Rut)
);

CREATE TABLE Alumno(
    Rut INT,
    Nombre VARCHAR(50),
    Nivel INT,
    Clave VARCHAR(20),
    constraint pk_alumno primary key(Rut)
);

CREATE TABLE Profesor(
    Rut INT,
    Nombre VARCHAR(50),
    Asignatura VARCHAR(50),
    Clave VARCHAR(20),
    constraint pk_profesor primary key(Rut)
);

CREATE TABLE Guia(
    Rut INT,
    Nombre VARCHAR(50),
    Cargo VARCHAR(50),
    Clave VARCHAR(20),
    RutEmpresa INT,
    constraint pk_guia primary key(Rut),
    constraint fk_guia_empresa foreign key(RutEmpresa) references Empresa(Rut)
);

CREATE TABLE Alumno_practica(
    Id INT auto_increment,
    FechaInicio DATETIME,
    FechaFin DATETIME,
    Estado INT,
    RutProfesor INT,
    RutAlumno INT,
    RutGuia INT,
    IdPractica INT,
    constraint pk_alumnopractica primary key(Id),
    constraint fk_alumnopractica_profesor foreign key(RutProfesor) references Profesor(Rut),
    constraint fk_alumnopractica_alumno foreign key(RutAlumno) references Alumno(Rut),
    constraint fk_alumnopractica_guia foreign key(RutGuia) references Guia(Rut),
    constraint fk_alumnopractica_practica foreign key(IdPractica) references Practica(Id)
);

CREATE TABLE Bitacora(
    Id INT auto_increment,
    Texto VARCHAR(300),
    Fecha DATETIME,
    Tipo INT,
    RutAutor INT,
    IdAlumnopractica INT,
    constraint pk_bitacora primary key(Id),
    constraint fk_bitacora_alumnopractica foreign key(IdAlumnopractica) references Alumno_practica(Id)
);

CREATE TABLE Asistencia(
    Id INT auto_increment,
    Fecha DATETIME,
    Estado INT,
    RutAlumno INT,
    IdAlumnopractica INT,
    constraint pk_asistencia primary key(Id),
    constraint fk_asistencia_alumno foreign key(RutAlumno) references Alumno(Rut),
    constraint fk_asistencia_alumnopractica foreign key(IdAlumnopractica) references Alumno_practica(Id)
);