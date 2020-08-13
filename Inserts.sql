Create table Datos_colegio(
Id_Datos serial primary key,
CodigoColegio integer,
TelefonoColegio int,
DireccionColegio varchar(80),
Director_Instituto varchar(25),
Codigo_infra int,
Municipio varchar(25),
Departamento varchar(25),
Instituto varchar (40)
)

insert into Datos_colegio
	values	(1, 1037, 22726985, '7a Calle Poniente No 5A, Urbanización Bonanza, Mejicanos','Giovani Beltrán', 20320, 'Mejicanos', 'San Salvador', 'Colegio Profesor Saul Edmundo Montero')



Create table Estado_Asignatura(
Id_EstadoAsignatura serial primary key,
Estado_Asignatura varchar(15)
)

INSERT INTO Estado_Asignatura
	VALUES	(1, 'Activa'),
			(2, 'Inactiva')

Create table Tipo_Asignatura(
Id_TipoAsignatura serial primary key,
TipoAsignatura varchar(30)
)

INSERT INTO Tipo_Asignatura
	VALUES	(1, 'Primaria'),
	 	(2,'Complementaria')

Create table Asignaturas(
Id_Asignatura serial primary key,
NombreAsignatura varchar(20),
Id_TipoAsignatura int references Tipo_Asignatura(Id_TipoAsignatura),
Id_EstadoAsignatura int references Estado_Asignatura(Id_EstadoAsignatura)
)

INSERT INTO Asignaturas
	VALUES	(1, 'Lenguaje', 1, 1),
	 		(2, 'Matemáticas', 1, 1),
         	(3, 'Sociales', 1, 1),
         	(4, 'Ciencias', 1, 1),
         	(5, 'Inglés', 1, 1),
         	(6, 'Informática', 1, 1)

Create table NivelDocente(
Id_NivelDoc serial primary key,
Nivel_docente varchar(35)
)

INSERT INTO NivelDocente
	VALUES	(1,'Preparatoria'),
	 		(2,'Primer Ciclo'),
	 		(3, 'Segundo Ciclo'),
	 		(4, 'Tercer Ciclo'),
	 		(5, 'Complementario')

Create table Tipo_docente(
Id_TipoDocente serial primary key,
Tipo varchar(20)
)

insert into tipo_docente
	values	(1, 'Básica'),
	  		(2, 'Especializado')

Create table Docente2(
Id_Docente serial primary key,
NombreDocente varchar(22),
ApellidoDocente varchar(22),
Codigo_docente int,
CorreoDocente char(40),
TelefonoDocente int,
DireccionDocente varchar(90),
DuiDocente varchar(10),
Fecha_NacimientoDocente date,
Titulos varchar(70),
Contra_prof char(20),
Num_Escalafon char(20),
Id_TipoDocente int references Tipo_docente(Id_TipoDocente),
Id_NivelDoc int references NivelDocente(Id_NivelDoc)
)

insert into Docente2
	values	(1, 'Beatriz', 'de Beltrán', 20009000, 'missbeatriz@gmail.com', 980765234, 'Mejicanos', 00045678-6, '1980-02-02', 'Maestría', 'mbeatriz123', 'Categoría', 1, 1)

insert into Docente2
	values
		(2, 'Zaida', 'Rivera', 20019001, 'misszaida@gmail.com', 089567243, 'Zacamil', 00045678-8, '1980-01-01', 'Maestría', 'mzaida123', 'Categoría 1', 1, 2)

insert into Docente2
	values		
		(3, 'Maritza', 'Martínez', 20029002, 'missmaritza@gmail.com', 980567432, 'Zacamil', 00045612-8, '1975-03-06', 'Licenciada', 'mmaritza123', 'Categoría 1', 1, 2)
		
insert into Docente2
	values		
		(4, 'Sara', 'Jiménez', 20039003, 'misssara@gmail.com', 890756243, 'Mejicanos', 00045614-4, '1980-05-04', 'Maestría', 'msara123', 'Categoría 1', 1, 3)
		
insert into Docente2
	values		
		(5, 'Reyna', 'Zepeda', 20059004, 'missreyna@gmail.com', 098657324, 'Mejicanos', 00045342-5, '1983-06-07' ,'Licenciada', 'mreyna123', 'Categoría 1', 1, 3)

insert into Docente2
	values
		(6, 'Juan', 'López', 20069006, 'misterjuan@gmail.com', 890567234, 'Ayutuxtepeque', 00045932-2,'1990-07-09','Maestría', 'mjuan123', 'Categoría 1', 1, 4)

insert into Docente2
	values
		(7, 'Juli', 'Bertrand', 20079007, 'missjuli@gmail.com', 098567432, 'Zacamil', 00045993-2, '1994-07-08','Licenciada', 'mjuli123', 'Categoría 1', 1, 4)

insert into Docente2
	values
		(8, 'Alejandra', 'Romero', 20089008, 'missalejandra@gmail.com', 890234765,'Ayutuxtepeque', 00045993-2,'1986-02-09','Maestría', 'malejandra123', 'Categoría 1', 1, 4)

insert into Docente2
	values
		(9, 'Luis', 'Fuentes', 20099009, 'misterluis@gmail.com', 432567098, 'Mejicanos',00045949-3, '1988-09-02', 'Informática', 'mluis123','Categoría 1', 2, 5)

insert into Docente2
	values
		(10, 'Nelson', 'Alvarado', 20109010, 'donnelson@gmail.com', 345276089,'Mejicanos',00059949-5, '1990-05-06', 'Deporte', 'mnelson123', 'Categoría 1', 2, 5)

insert into Docente2
	values
		(11, 'Cindy', 'Rivas', 20119011, 'misscindy@gmail.com', 465768921,'Zacamil',00054949-5, '1992-03-04','Inglés','mcindy123','Categoría 1', 2, 5)

Create table Estado_perfil(
Id_EstadoPerfil serial primary key,
Estado varchar(25)
)

INSERT INTO Estado_perfil
   VALUES(1, 'En Proceso'),
	 (2, 'Completado'),
	 (3, 'Prórroga')

Create table Tipo_perfil(
Id_Tipo_actividad serial primary key,
Nombre_actividad varchar(20),
Descripcion varchar(70)
)

INSERT INTO Tipo_perfil
    VALUES(1, 'Tarea evaluada', 'Tarea evaluativa'),
	  (2, 'Laboratorio', 'Laboratorio evaluativo'),
	  (3, 'Examen Trimestre', 'ExamenFinal de materia')

Create table Annio(
Id_Anio serial primary key,
Annio_Estado int
)

insert into Annio
	values	(1, 2020)

Create table Mes(
Id_Mes serial primary key,
Mes_estado varchar(11),
Id_Anio int references Annio(Id_Anio)
)

insert into Mes
	values	(1, 'Enero', 1),
		(2, 'Febrero', 1),
		(3, 'Marzo', 1),
		(4, 'Abril', 1),
		(5, 'Mayo', 1),
		(6, 'Junio', 1),
		(7, 'Julio', 1),
		(8, 'Agosto', 1),
		(9, 'Septiembre', 1),
		(10, 'Octubre', 1),
		(11, 'Noviembre', 1),
		(12, 'Diciembre', 1)

Create table Estado_Solvencia(
Id_EstadoSolvencia serial primary key,
EstadoS varchar(20)
)

insert into Estado_Solvencia
	values	(1, 'Pagada'),
		(2, 'No Pagada'),
		(3, 'En mora')

Create table Solvencia(
Id_solvencia serial primary key,
Id_EstadoSolvencia int references Estado_Solvencia(Id_EstadoSolvencia),
Id_Anio int references Annio(Id_Anio)
)

insert into Solvencia
	values	(1,1,1),
		(2,2,1),
		(3,3,1)

Create table Encargados(
Id_Encargado serial primary key,
Nombre_Encargado varchar(25),
Apellido_Encargado varchar(25),
Dui_Encargado varchar(10),
Telefono_Encargado int,
Correo_Encargado char(40),
Fecha_nacimiento_Encargado date,
Cantidad_hijos int
)

insert into Encargados
	values	(1,'Johanna','Castillo','378193716',74638283,'johannacastillo@gmail.com','1970-10-25',2)
	
insert into Encargados
	values	
		(2,'Rafael','Varela','3726183647',38279573,'rafaelvarela@gmail.com','1985-04-14',1),
		(3,'Marisela','Orellana','097362192',34567234,'mariselaorellana@gmail.com','1986-06-15',1),
		(4,'Victor','Batres','348954323',39854730,'victorbatres@gmail.com','1978-03-06',1),
		(5,'Veronica','Ortiz','849382057',67322343,'veronicaortiz@gmail.com','1989-07-20',2),
		(6,'Elena','Villatoro','194329781',48169428,'elenavilla@gmail.com','1980-08-05',1),
		(7,'Melisa','Cabrera','049165792',26487613,'elenavilla@gmail.com','1975-11-12',2),
		(8,'Melvin','Ventura','361579234',75913697,'@gmail.com','1995-08-06',1)


Create table Nivel(
Id_Nivel serial primary key,
Nivel varchar(20)
)

insert into Nivel
values	(1, 'Parvularia'),
	(2, 'Primer Ciclo'),
	(3, 'Segundo Ciclo'),
	(4, 'Tercer Ciclo')

Create table Estado_Grado(
Id_EstadoGrado serial primary key,
EstadoG varchar(20)
)

insert into Estado_grado
	values	(1,'Cupo lleno'),
		(2,'Con bacantes')

Create table Grado(
Id_Grado serial primary key,
Cantidad_alumnos integer,
Grado varchar(20),
Id_EstadoGrado int references Estado_Grado(Id_EstadoGrado)
)

insert into Grado
	values	(1, 10, 'Kinder 4 y 5', 2),
		(2, 10, 'Preparatoria', 1),
		(3, 15, 'Primer grado', 2),
		(4, 11, 'Segundo grado', 2),
		(5, 14, 'Tercer grado', 2),
		(6, 12, 'Cuarto grado', 2),
		(7, 16, 'Quinto grado', 1),
		(8, 17, 'Sexto grado', 1),
		(9, 15, 'Séptimo grado', 1),
		(10, 17, 'Octavo grado', 1),
		(11, 20, 'Noveno grado', 1)

Create table Estado_Alumno(
Id_EstadoAlumno serial primary key,
Estado_Alumno varchar(35)
)

INSERT INTO Estado_Alumno
	VALUES	(1, 'Cursando'),
	 	(2, 'Suspendido'),
	 	(3, 'No Solvente'),
	 	(4, 'Expulsado'),
	 	(5, 'Graduado')


Create table Alumno(
Id_Alumno serial primary key,
NombreAlumno varchar(17),
ApellidoAlumno varchar(17),
EdadAlumno int,
TelefonoAlumno int,
DireccionAlumno varchar(80),
Nie varchar(10),
Registro_estudiantil varchar(80),
Carnet int,
Id_solvencia int references Solvencia(Id_solvencia),
Correo char(40),
Contra_Alumno char(155),
Id_EstadoAlumno int references Estado_Alumno(Id_EstadoAlumno),
Id_Encargado int references Encargados(Id_Encargado),
Id_Grado int references Grado(Id_Grado)
)

insert into Alumno
	values	(1,'Rodrigo','Castillo',16,16498315,'Mejicanos,San salvador',0184587,1,2020101,1,'20200101@gmail.com','samos01',1,1,1),
		(2,'Rigoberto','Castillo',15,16498315,'Mejicanos,San salvador',0334553,1,2020102,1,'20200102@gmail.com','samos02',1,1,1),
		(3,'Alexandra','Varela',16,48628519,'Ayutuxtepeque,San salvador',5188648,1,2020203,1,'20200203@gmail.com','samos03',1,2,2),
		(4,'Karen','Orellana',17,16479648,'San Salvador,San salvador',1963489,1,2020304,1,'20200304@gmail.com','samos04',1,3,3),
		(5,'Sofia','Batres',12,36942821,'Ayutuxtepeque,San salvador',0483655,1,2020405,1,'20200405@gmail.com','samos05',1,4,4),
		(6,'Arturo','Ortiz',14,15976215,'Mejicanos,San salvador',0785653,1,2020506,1,'20200506@gmail.com','samos06',1,5,5),
		(7,'Carlos','Ortiz',13,81430153,'Mejicanos,San salvador',0154684,1,2020607,1,'20200607@gmail.com','samos07',1,5,6)

Create table Perfiles(
Id_Perfil serial primary key,
NombrePerfil varchar(25),
Descripcion varchar(100),
Porcentaje int,
Fecha_inicio date,
Fecha_fin date,
Cantidad_perfiles int,
Trimestre varchar(20),
Id_Tipo_actividad int references Tipo_perfil(Id_Tipo_actividad),
Id_Grado int not null references Grado(Id_Grado),
Id_Asignatura int references Asignaturas(Id_Asignatura),
Id_EstadoPerfil int references Estado_Perfil(Id_EstadoPerfil),
Id_Alumno int references Alumno(Id_Alumno)
)

Insert into Perfiles
	Values	(1, 'Evaluacion Unidad 1 y 2', 'Cuestionario de las clases vistas en Primer Trimestre', 15, '2020-03-03', '2020-03-1', '4', 'Primer trimestre', 2, 1 , 1,1),
            	(2, 'Unidad 3', 'Evaluaciones clase y prueba objetiva correspondiente a la unidad 2', 15, '2020-04-01', '2020-04-02', '4', 'Segundo Trimestre', 1, 3, 2, 3),
            	(3, 'Unidad 4 y 5', 'Examen final de las unidades vistas en clases', 30, '2020-04-2', '2020-04-20', '1', 'Segundo Trimestre', 3, 2, 3, 3),
            	(4, 'Proyecto Formativo', 'Reporte escrito sobre las problematicas vistas en clase', 25, '2020-04-15', '2020-04-20', '4', 'Segundo Trimestre', 2, 3, 3, 2) 


Create table Notas1(
Id_Nota serial primary key,
Promedio_final int, 
Id_Perfil int references Perfiles(Id_Perfil),
Id_Docente int references Docente2(Id_Docente),
Id_Alumno int references Alumno(Id_Alumno)
)

Insert into Notas1
      Values (1, 7, 2, 1, 5),
             (2, 9, 1, 2, 4),
             (3, 8, 4, 3, 3),
             (4, 9, 3, 4, 2),
             (5, 6, 4, 5, 1)

Create table Boletas(
Id_boleta serial primary key,
Id_Nota int references Notas1(Id_Nota),
Id_alumno int references Alumno(Id_alumno),
Id_Datos int references Datos_colegio(Id_Datos)
)

update Perfiles
set NombrePerfil='Unidad 1 y 2'
where id_perfil=1

update Alumno
set NombreAlumno='Jorge'
where id_alumno=1

update Estado_Grado
set EstadoG='Sin Cupo'
where id_EstadoGrado=1

update Estado_Grado
set EstadoG='Con Bacantes'
where id_EstadoGrado=2

update NivelDocente
set Nivel_docente='Parvularia'
where id_NivelDoc=1

select * from alumno 
select * from encargados
select * from solvencia
select * from estado_solvencia
select * from docente2
select * from tipo_docente
select * from notas1
select * from perfiles

select id_alumno, alumno.nombrealumno, carnet, nombre_encargado, telefono_encargado
from alumno
inner join encargados on alumno.id_encargado = encargados.id_encargado

select id_alumno, alumno.nombrealumno, alumno.id_solvencia
from alumno
inner join solvencia on alumno.id_solvencia = solvencia.id_solvencia

select nombredocente, titulos, num_escalafon, tipo
from docente2
inner join tipo_docente on docente2.id_tipodocente = tipo_docente.id_tipodocente

select nombrealumno, nombredocente, promedio_final, descripcion, nombreperfil
from notas1
inner join alumno on notas1.id_alumno = alumno.id_alumno
inner join docente2 on notas1.id_docente = docente2.id_docente
inner join perfiles on notas1.id_perfil = perfiles.id_perfil