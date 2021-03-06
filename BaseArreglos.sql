PGDMP     )    )                x            samossystem    11.8    11.8 �               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false                       1262    17292    samossystem    DATABASE     �   CREATE DATABASE samossystem WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Latin America.1252' LC_CTYPE = 'Spanish_Latin America.1252';
    DROP DATABASE samossystem;
             postgres    false            �            1259    17490    alumno    TABLE     �  CREATE TABLE public.alumno (
    id_alumno integer NOT NULL,
    nombrealumno character varying(17),
    apellidoalumno character varying(17),
    fechanacimientoalumno date,
    telefonoalumno integer,
    direccionalumno character varying(80),
    nie character varying(10),
    registro_estudiantil character varying(80),
    carnet integer,
    id_solvencia integer,
    correo character(40),
    contra_alumno character(155),
    id_estadoalumno integer,
    id_encargado integer,
    id_grado integer
);
    DROP TABLE public.alumno;
       public         postgres    false            �            1259    17488    alumno_id_alumno_seq    SEQUENCE     �   CREATE SEQUENCE public.alumno_id_alumno_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.alumno_id_alumno_seq;
       public       postgres    false    235            	           0    0    alumno_id_alumno_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.alumno_id_alumno_seq OWNED BY public.alumno.id_alumno;
            public       postgres    false    234            �            1259    17395    annio    TABLE     d   CREATE TABLE public.annio (
    id_anio integer NOT NULL,
    annio_estado character varying(20)
);
    DROP TABLE public.annio;
       public         postgres    false            �            1259    17393    annio_id_anio_seq    SEQUENCE     �   CREATE SEQUENCE public.annio_id_anio_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.annio_id_anio_seq;
       public       postgres    false    217            
           0    0    annio_id_anio_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.annio_id_anio_seq OWNED BY public.annio.id_anio;
            public       postgres    false    216            �            1259    17327    asignaturas    TABLE     �   CREATE TABLE public.asignaturas (
    id_asignatura integer NOT NULL,
    nombreasignatura character varying(20),
    id_tipoasignatura integer,
    id_estadoasignatura integer
);
    DROP TABLE public.asignaturas;
       public         postgres    false            �            1259    17325    asignaturas_id_asignatura_seq    SEQUENCE     �   CREATE SEQUENCE public.asignaturas_id_asignatura_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.asignaturas_id_asignatura_seq;
       public       postgres    false    205                       0    0    asignaturas_id_asignatura_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.asignaturas_id_asignatura_seq OWNED BY public.asignaturas.id_asignatura;
            public       postgres    false    204            �            1259    17564    boletas    TABLE     �   CREATE TABLE public.boletas (
    id_boleta integer NOT NULL,
    id_nota integer,
    id_alumno integer,
    id_datos integer
);
    DROP TABLE public.boletas;
       public         postgres    false            �            1259    17562    boletas_id_boleta_seq    SEQUENCE     �   CREATE SEQUENCE public.boletas_id_boleta_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.boletas_id_boleta_seq;
       public       postgres    false    241                       0    0    boletas_id_boleta_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.boletas_id_boleta_seq OWNED BY public.boletas.id_boleta;
            public       postgres    false    240            �            1259    17303    datos_colegio    TABLE     c  CREATE TABLE public.datos_colegio (
    id_datos integer NOT NULL,
    codigocolegio integer,
    telefonocolegio integer,
    direccioncolegio character varying(80),
    director_instituto character varying(25),
    codigo_infra integer,
    municipio character varying(25),
    departamento character varying(25),
    instituto character varying(40)
);
 !   DROP TABLE public.datos_colegio;
       public         postgres    false            �            1259    17301    datos_colegio_id_datos_seq    SEQUENCE     �   CREATE SEQUENCE public.datos_colegio_id_datos_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.datos_colegio_id_datos_seq;
       public       postgres    false    199                       0    0    datos_colegio_id_datos_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.datos_colegio_id_datos_seq OWNED BY public.datos_colegio.id_datos;
            public       postgres    false    198            �            1259    17361    docente2    TABLE     �  CREATE TABLE public.docente2 (
    id_docente integer NOT NULL,
    nombredocente character varying(22),
    apellidodocente character varying(22),
    correodocente character(40),
    telefonodocente integer,
    direcciondocente character varying(90),
    duidocente character varying(10),
    fecha_nacimientodocente date,
    titulos character varying(70),
    contra_prof character(20),
    num_escalafon character(20),
    id_tipodocente integer,
    id_niveldoc integer
);
    DROP TABLE public.docente2;
       public         postgres    false            �            1259    17359    docente2_id_docente_seq    SEQUENCE     �   CREATE SEQUENCE public.docente2_id_docente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.docente2_id_docente_seq;
       public       postgres    false    211                       0    0    docente2_id_docente_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.docente2_id_docente_seq OWNED BY public.docente2.id_docente;
            public       postgres    false    210            �            1259    17442 
   encargados    TABLE     �  CREATE TABLE public.encargados (
    id_encargado integer NOT NULL,
    nombre_encargado character varying(25),
    apellido_encargado character varying(25),
    dui_encargado character varying(10),
    telefono_encargado integer,
    correo_encargado character(40),
    direccion_encargado character varying(200),
    municipio_encargado character varying(20),
    lugar_trabajo character varying(200),
    fecha_nacimiento_encargado date,
    cantidad_hijos integer
);
    DROP TABLE public.encargados;
       public         postgres    false            �            1259    17440    encargados_id_encargado_seq    SEQUENCE     �   CREATE SEQUENCE public.encargados_id_encargado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.encargados_id_encargado_seq;
       public       postgres    false    225                       0    0    encargados_id_encargado_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.encargados_id_encargado_seq OWNED BY public.encargados.id_encargado;
            public       postgres    false    224            �            1259    17482    estado_alumno    TABLE     u   CREATE TABLE public.estado_alumno (
    id_estadoalumno integer NOT NULL,
    estado_alumno character varying(35)
);
 !   DROP TABLE public.estado_alumno;
       public         postgres    false            �            1259    17480 !   estado_alumno_id_estadoalumno_seq    SEQUENCE     �   CREATE SEQUENCE public.estado_alumno_id_estadoalumno_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.estado_alumno_id_estadoalumno_seq;
       public       postgres    false    233                       0    0 !   estado_alumno_id_estadoalumno_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.estado_alumno_id_estadoalumno_seq OWNED BY public.estado_alumno.id_estadoalumno;
            public       postgres    false    232            �            1259    17311    estado_asignatura    TABLE     �   CREATE TABLE public.estado_asignatura (
    id_estadoasignatura integer NOT NULL,
    estado_asignatura character varying(15)
);
 %   DROP TABLE public.estado_asignatura;
       public         postgres    false            �            1259    17309 )   estado_asignatura_id_estadoasignatura_seq    SEQUENCE     �   CREATE SEQUENCE public.estado_asignatura_id_estadoasignatura_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 @   DROP SEQUENCE public.estado_asignatura_id_estadoasignatura_seq;
       public       postgres    false    201                       0    0 )   estado_asignatura_id_estadoasignatura_seq    SEQUENCE OWNED BY     w   ALTER SEQUENCE public.estado_asignatura_id_estadoasignatura_seq OWNED BY public.estado_asignatura.id_estadoasignatura;
            public       postgres    false    200            �            1259    17461    estado_grado    TABLE     m   CREATE TABLE public.estado_grado (
    id_estadogrado integer NOT NULL,
    estadog character varying(20)
);
     DROP TABLE public.estado_grado;
       public         postgres    false            �            1259    17459    estado_grado_id_estadogrado_seq    SEQUENCE     �   CREATE SEQUENCE public.estado_grado_id_estadogrado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.estado_grado_id_estadogrado_seq;
       public       postgres    false    229                       0    0    estado_grado_id_estadogrado_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.estado_grado_id_estadogrado_seq OWNED BY public.estado_grado.id_estadogrado;
            public       postgres    false    228            �            1259    17379    estado_perfil    TABLE     n   CREATE TABLE public.estado_perfil (
    id_estadoperfil integer NOT NULL,
    estado character varying(25)
);
 !   DROP TABLE public.estado_perfil;
       public         postgres    false            �            1259    17377 !   estado_perfil_id_estadoperfil_seq    SEQUENCE     �   CREATE SEQUENCE public.estado_perfil_id_estadoperfil_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.estado_perfil_id_estadoperfil_seq;
       public       postgres    false    213                       0    0 !   estado_perfil_id_estadoperfil_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.estado_perfil_id_estadoperfil_seq OWNED BY public.estado_perfil.id_estadoperfil;
            public       postgres    false    212            �            1259    17416    estado_solvencia    TABLE     u   CREATE TABLE public.estado_solvencia (
    id_estadosolvencia integer NOT NULL,
    estados character varying(20)
);
 $   DROP TABLE public.estado_solvencia;
       public         postgres    false            �            1259    17414 '   estado_solvencia_id_estadosolvencia_seq    SEQUENCE     �   CREATE SEQUENCE public.estado_solvencia_id_estadosolvencia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 >   DROP SEQUENCE public.estado_solvencia_id_estadosolvencia_seq;
       public       postgres    false    221                       0    0 '   estado_solvencia_id_estadosolvencia_seq    SEQUENCE OWNED BY     s   ALTER SEQUENCE public.estado_solvencia_id_estadosolvencia_seq OWNED BY public.estado_solvencia.id_estadosolvencia;
            public       postgres    false    220            �            1259    17469    grado    TABLE     �   CREATE TABLE public.grado (
    id_grado integer NOT NULL,
    cantidad_alumnos integer,
    grado character varying(20),
    id_estadogrado integer
);
    DROP TABLE public.grado;
       public         postgres    false            �            1259    17467    grado_id_grado_seq    SEQUENCE     �   CREATE SEQUENCE public.grado_id_grado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.grado_id_grado_seq;
       public       postgres    false    231                       0    0    grado_id_grado_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.grado_id_grado_seq OWNED BY public.grado.id_grado;
            public       postgres    false    230            �            1259    17403    mes    TABLE     t   CREATE TABLE public.mes (
    id_mes integer NOT NULL,
    mes_estado character varying(11),
    id_anio integer
);
    DROP TABLE public.mes;
       public         postgres    false            �            1259    17401    mes_id_mes_seq    SEQUENCE     �   CREATE SEQUENCE public.mes_id_mes_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.mes_id_mes_seq;
       public       postgres    false    219                       0    0    mes_id_mes_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.mes_id_mes_seq OWNED BY public.mes.id_mes;
            public       postgres    false    218            �            1259    17453    nivel    TABLE     ^   CREATE TABLE public.nivel (
    id_nivel integer NOT NULL,
    nivel character varying(20)
);
    DROP TABLE public.nivel;
       public         postgres    false            �            1259    17451    nivel_id_nivel_seq    SEQUENCE     �   CREATE SEQUENCE public.nivel_id_nivel_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.nivel_id_nivel_seq;
       public       postgres    false    227                       0    0    nivel_id_nivel_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.nivel_id_nivel_seq OWNED BY public.nivel.id_nivel;
            public       postgres    false    226            �            1259    17345    niveldocente    TABLE     p   CREATE TABLE public.niveldocente (
    id_niveldoc integer NOT NULL,
    nivel_docente character varying(35)
);
     DROP TABLE public.niveldocente;
       public         postgres    false            �            1259    17343    niveldocente_id_niveldoc_seq    SEQUENCE     �   CREATE SEQUENCE public.niveldocente_id_niveldoc_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.niveldocente_id_niveldoc_seq;
       public       postgres    false    207                       0    0    niveldocente_id_niveldoc_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.niveldocente_id_niveldoc_seq OWNED BY public.niveldocente.id_niveldoc;
            public       postgres    false    206            �            1259    17546    notas1    TABLE     �   CREATE TABLE public.notas1 (
    id_nota integer NOT NULL,
    promedio_final integer,
    id_perfil integer,
    id_alumno integer
);
    DROP TABLE public.notas1;
       public         postgres    false            �            1259    17544    notas1_id_nota_seq    SEQUENCE     �   CREATE SEQUENCE public.notas1_id_nota_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.notas1_id_nota_seq;
       public       postgres    false    239                       0    0    notas1_id_nota_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.notas1_id_nota_seq OWNED BY public.notas1.id_nota;
            public       postgres    false    238            �            1259    17518    perfiles    TABLE     h  CREATE TABLE public.perfiles (
    id_perfil integer NOT NULL,
    nombreperfil character varying(25),
    descripcion character varying(100),
    porcentaje integer,
    fecha_inicio date,
    fecha_fin date,
    trimestre character varying(20),
    id_tipo_actividad integer,
    id_asignatura integer,
    id_estadoperfil integer,
    id_docente integer
);
    DROP TABLE public.perfiles;
       public         postgres    false            �            1259    17516    perfiles_id_perfil_seq    SEQUENCE     �   CREATE SEQUENCE public.perfiles_id_perfil_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.perfiles_id_perfil_seq;
       public       postgres    false    237                       0    0    perfiles_id_perfil_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.perfiles_id_perfil_seq OWNED BY public.perfiles.id_perfil;
            public       postgres    false    236            �            1259    17424 	   solvencia    TABLE     z   CREATE TABLE public.solvencia (
    id_solvencia integer NOT NULL,
    id_estadosolvencia integer,
    id_anio integer
);
    DROP TABLE public.solvencia;
       public         postgres    false            �            1259    17422    solvencia_id_solvencia_seq    SEQUENCE     �   CREATE SEQUENCE public.solvencia_id_solvencia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.solvencia_id_solvencia_seq;
       public       postgres    false    223                       0    0    solvencia_id_solvencia_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.solvencia_id_solvencia_seq OWNED BY public.solvencia.id_solvencia;
            public       postgres    false    222            �            1259    17319    tipo_asignatura    TABLE     z   CREATE TABLE public.tipo_asignatura (
    id_tipoasignatura integer NOT NULL,
    tipoasignatura character varying(30)
);
 #   DROP TABLE public.tipo_asignatura;
       public         postgres    false            �            1259    17317 %   tipo_asignatura_id_tipoasignatura_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_asignatura_id_tipoasignatura_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 <   DROP SEQUENCE public.tipo_asignatura_id_tipoasignatura_seq;
       public       postgres    false    203                       0    0 %   tipo_asignatura_id_tipoasignatura_seq    SEQUENCE OWNED BY     o   ALTER SEQUENCE public.tipo_asignatura_id_tipoasignatura_seq OWNED BY public.tipo_asignatura.id_tipoasignatura;
            public       postgres    false    202            �            1259    17353    tipo_docente    TABLE     j   CREATE TABLE public.tipo_docente (
    id_tipodocente integer NOT NULL,
    tipo character varying(20)
);
     DROP TABLE public.tipo_docente;
       public         postgres    false            �            1259    17351    tipo_docente_id_tipodocente_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_docente_id_tipodocente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.tipo_docente_id_tipodocente_seq;
       public       postgres    false    209                       0    0    tipo_docente_id_tipodocente_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.tipo_docente_id_tipodocente_seq OWNED BY public.tipo_docente.id_tipodocente;
            public       postgres    false    208            �            1259    17387    tipo_perfil    TABLE     �   CREATE TABLE public.tipo_perfil (
    id_tipo_actividad integer NOT NULL,
    nombre_actividad character varying(20),
    descripcion character varying(70)
);
    DROP TABLE public.tipo_perfil;
       public         postgres    false            �            1259    17385 !   tipo_perfil_id_tipo_actividad_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_perfil_id_tipo_actividad_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.tipo_perfil_id_tipo_actividad_seq;
       public       postgres    false    215                       0    0 !   tipo_perfil_id_tipo_actividad_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.tipo_perfil_id_tipo_actividad_seq OWNED BY public.tipo_perfil.id_tipo_actividad;
            public       postgres    false    214            �            1259    17295    usuarios    TABLE       CREATE TABLE public.usuarios (
    id_usuario integer NOT NULL,
    nombres_usuario character varying(50),
    apellidos_usuario character varying(50),
    correo_usuario character varying(100),
    alias_usuario character varying(20),
    clave_usuario character varying(150)
);
    DROP TABLE public.usuarios;
       public         postgres    false            �            1259    17293    usuarios_id_usuario_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.usuarios_id_usuario_seq;
       public       postgres    false    197                       0    0    usuarios_id_usuario_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.usuarios_id_usuario_seq OWNED BY public.usuarios.id_usuario;
            public       postgres    false    196                       2604    17493    alumno id_alumno    DEFAULT     t   ALTER TABLE ONLY public.alumno ALTER COLUMN id_alumno SET DEFAULT nextval('public.alumno_id_alumno_seq'::regclass);
 ?   ALTER TABLE public.alumno ALTER COLUMN id_alumno DROP DEFAULT;
       public       postgres    false    234    235    235                       2604    17398    annio id_anio    DEFAULT     n   ALTER TABLE ONLY public.annio ALTER COLUMN id_anio SET DEFAULT nextval('public.annio_id_anio_seq'::regclass);
 <   ALTER TABLE public.annio ALTER COLUMN id_anio DROP DEFAULT;
       public       postgres    false    216    217    217                       2604    17330    asignaturas id_asignatura    DEFAULT     �   ALTER TABLE ONLY public.asignaturas ALTER COLUMN id_asignatura SET DEFAULT nextval('public.asignaturas_id_asignatura_seq'::regclass);
 H   ALTER TABLE public.asignaturas ALTER COLUMN id_asignatura DROP DEFAULT;
       public       postgres    false    204    205    205                       2604    17567    boletas id_boleta    DEFAULT     v   ALTER TABLE ONLY public.boletas ALTER COLUMN id_boleta SET DEFAULT nextval('public.boletas_id_boleta_seq'::regclass);
 @   ALTER TABLE public.boletas ALTER COLUMN id_boleta DROP DEFAULT;
       public       postgres    false    240    241    241                       2604    17306    datos_colegio id_datos    DEFAULT     �   ALTER TABLE ONLY public.datos_colegio ALTER COLUMN id_datos SET DEFAULT nextval('public.datos_colegio_id_datos_seq'::regclass);
 E   ALTER TABLE public.datos_colegio ALTER COLUMN id_datos DROP DEFAULT;
       public       postgres    false    199    198    199            	           2604    17364    docente2 id_docente    DEFAULT     z   ALTER TABLE ONLY public.docente2 ALTER COLUMN id_docente SET DEFAULT nextval('public.docente2_id_docente_seq'::regclass);
 B   ALTER TABLE public.docente2 ALTER COLUMN id_docente DROP DEFAULT;
       public       postgres    false    210    211    211                       2604    17445    encargados id_encargado    DEFAULT     �   ALTER TABLE ONLY public.encargados ALTER COLUMN id_encargado SET DEFAULT nextval('public.encargados_id_encargado_seq'::regclass);
 F   ALTER TABLE public.encargados ALTER COLUMN id_encargado DROP DEFAULT;
       public       postgres    false    224    225    225                       2604    17485    estado_alumno id_estadoalumno    DEFAULT     �   ALTER TABLE ONLY public.estado_alumno ALTER COLUMN id_estadoalumno SET DEFAULT nextval('public.estado_alumno_id_estadoalumno_seq'::regclass);
 L   ALTER TABLE public.estado_alumno ALTER COLUMN id_estadoalumno DROP DEFAULT;
       public       postgres    false    232    233    233                       2604    17314 %   estado_asignatura id_estadoasignatura    DEFAULT     �   ALTER TABLE ONLY public.estado_asignatura ALTER COLUMN id_estadoasignatura SET DEFAULT nextval('public.estado_asignatura_id_estadoasignatura_seq'::regclass);
 T   ALTER TABLE public.estado_asignatura ALTER COLUMN id_estadoasignatura DROP DEFAULT;
       public       postgres    false    200    201    201                       2604    17464    estado_grado id_estadogrado    DEFAULT     �   ALTER TABLE ONLY public.estado_grado ALTER COLUMN id_estadogrado SET DEFAULT nextval('public.estado_grado_id_estadogrado_seq'::regclass);
 J   ALTER TABLE public.estado_grado ALTER COLUMN id_estadogrado DROP DEFAULT;
       public       postgres    false    229    228    229            
           2604    17382    estado_perfil id_estadoperfil    DEFAULT     �   ALTER TABLE ONLY public.estado_perfil ALTER COLUMN id_estadoperfil SET DEFAULT nextval('public.estado_perfil_id_estadoperfil_seq'::regclass);
 L   ALTER TABLE public.estado_perfil ALTER COLUMN id_estadoperfil DROP DEFAULT;
       public       postgres    false    212    213    213                       2604    17419 #   estado_solvencia id_estadosolvencia    DEFAULT     �   ALTER TABLE ONLY public.estado_solvencia ALTER COLUMN id_estadosolvencia SET DEFAULT nextval('public.estado_solvencia_id_estadosolvencia_seq'::regclass);
 R   ALTER TABLE public.estado_solvencia ALTER COLUMN id_estadosolvencia DROP DEFAULT;
       public       postgres    false    221    220    221                       2604    17472    grado id_grado    DEFAULT     p   ALTER TABLE ONLY public.grado ALTER COLUMN id_grado SET DEFAULT nextval('public.grado_id_grado_seq'::regclass);
 =   ALTER TABLE public.grado ALTER COLUMN id_grado DROP DEFAULT;
       public       postgres    false    230    231    231                       2604    17406 
   mes id_mes    DEFAULT     h   ALTER TABLE ONLY public.mes ALTER COLUMN id_mes SET DEFAULT nextval('public.mes_id_mes_seq'::regclass);
 9   ALTER TABLE public.mes ALTER COLUMN id_mes DROP DEFAULT;
       public       postgres    false    218    219    219                       2604    17456    nivel id_nivel    DEFAULT     p   ALTER TABLE ONLY public.nivel ALTER COLUMN id_nivel SET DEFAULT nextval('public.nivel_id_nivel_seq'::regclass);
 =   ALTER TABLE public.nivel ALTER COLUMN id_nivel DROP DEFAULT;
       public       postgres    false    227    226    227                       2604    17348    niveldocente id_niveldoc    DEFAULT     �   ALTER TABLE ONLY public.niveldocente ALTER COLUMN id_niveldoc SET DEFAULT nextval('public.niveldocente_id_niveldoc_seq'::regclass);
 G   ALTER TABLE public.niveldocente ALTER COLUMN id_niveldoc DROP DEFAULT;
       public       postgres    false    206    207    207                       2604    17549    notas1 id_nota    DEFAULT     p   ALTER TABLE ONLY public.notas1 ALTER COLUMN id_nota SET DEFAULT nextval('public.notas1_id_nota_seq'::regclass);
 =   ALTER TABLE public.notas1 ALTER COLUMN id_nota DROP DEFAULT;
       public       postgres    false    239    238    239                       2604    17521    perfiles id_perfil    DEFAULT     x   ALTER TABLE ONLY public.perfiles ALTER COLUMN id_perfil SET DEFAULT nextval('public.perfiles_id_perfil_seq'::regclass);
 A   ALTER TABLE public.perfiles ALTER COLUMN id_perfil DROP DEFAULT;
       public       postgres    false    237    236    237                       2604    17427    solvencia id_solvencia    DEFAULT     �   ALTER TABLE ONLY public.solvencia ALTER COLUMN id_solvencia SET DEFAULT nextval('public.solvencia_id_solvencia_seq'::regclass);
 E   ALTER TABLE public.solvencia ALTER COLUMN id_solvencia DROP DEFAULT;
       public       postgres    false    222    223    223                       2604    17322 !   tipo_asignatura id_tipoasignatura    DEFAULT     �   ALTER TABLE ONLY public.tipo_asignatura ALTER COLUMN id_tipoasignatura SET DEFAULT nextval('public.tipo_asignatura_id_tipoasignatura_seq'::regclass);
 P   ALTER TABLE public.tipo_asignatura ALTER COLUMN id_tipoasignatura DROP DEFAULT;
       public       postgres    false    202    203    203                       2604    17356    tipo_docente id_tipodocente    DEFAULT     �   ALTER TABLE ONLY public.tipo_docente ALTER COLUMN id_tipodocente SET DEFAULT nextval('public.tipo_docente_id_tipodocente_seq'::regclass);
 J   ALTER TABLE public.tipo_docente ALTER COLUMN id_tipodocente DROP DEFAULT;
       public       postgres    false    208    209    209                       2604    17390    tipo_perfil id_tipo_actividad    DEFAULT     �   ALTER TABLE ONLY public.tipo_perfil ALTER COLUMN id_tipo_actividad SET DEFAULT nextval('public.tipo_perfil_id_tipo_actividad_seq'::regclass);
 L   ALTER TABLE public.tipo_perfil ALTER COLUMN id_tipo_actividad DROP DEFAULT;
       public       postgres    false    215    214    215                       2604    17298    usuarios id_usuario    DEFAULT     z   ALTER TABLE ONLY public.usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_id_usuario_seq'::regclass);
 B   ALTER TABLE public.usuarios ALTER COLUMN id_usuario DROP DEFAULT;
       public       postgres    false    197    196    197            �          0    17490    alumno 
   TABLE DATA               �   COPY public.alumno (id_alumno, nombrealumno, apellidoalumno, fechanacimientoalumno, telefonoalumno, direccionalumno, nie, registro_estudiantil, carnet, id_solvencia, correo, contra_alumno, id_estadoalumno, id_encargado, id_grado) FROM stdin;
    public       postgres    false    235   ��       �          0    17395    annio 
   TABLE DATA               6   COPY public.annio (id_anio, annio_estado) FROM stdin;
    public       postgres    false    217   ��       �          0    17327    asignaturas 
   TABLE DATA               n   COPY public.asignaturas (id_asignatura, nombreasignatura, id_tipoasignatura, id_estadoasignatura) FROM stdin;
    public       postgres    false    205   ��                 0    17564    boletas 
   TABLE DATA               J   COPY public.boletas (id_boleta, id_nota, id_alumno, id_datos) FROM stdin;
    public       postgres    false    241   �       �          0    17303    datos_colegio 
   TABLE DATA               �   COPY public.datos_colegio (id_datos, codigocolegio, telefonocolegio, direccioncolegio, director_instituto, codigo_infra, municipio, departamento, instituto) FROM stdin;
    public       postgres    false    199   �       �          0    17361    docente2 
   TABLE DATA               �   COPY public.docente2 (id_docente, nombredocente, apellidodocente, correodocente, telefonodocente, direcciondocente, duidocente, fecha_nacimientodocente, titulos, contra_prof, num_escalafon, id_tipodocente, id_niveldoc) FROM stdin;
    public       postgres    false    211   <�       �          0    17442 
   encargados 
   TABLE DATA               �   COPY public.encargados (id_encargado, nombre_encargado, apellido_encargado, dui_encargado, telefono_encargado, correo_encargado, direccion_encargado, municipio_encargado, lugar_trabajo, fecha_nacimiento_encargado, cantidad_hijos) FROM stdin;
    public       postgres    false    225   Y�       �          0    17482    estado_alumno 
   TABLE DATA               G   COPY public.estado_alumno (id_estadoalumno, estado_alumno) FROM stdin;
    public       postgres    false    233   v�       �          0    17311    estado_asignatura 
   TABLE DATA               S   COPY public.estado_asignatura (id_estadoasignatura, estado_asignatura) FROM stdin;
    public       postgres    false    201   ��       �          0    17461    estado_grado 
   TABLE DATA               ?   COPY public.estado_grado (id_estadogrado, estadog) FROM stdin;
    public       postgres    false    229   ��       �          0    17379    estado_perfil 
   TABLE DATA               @   COPY public.estado_perfil (id_estadoperfil, estado) FROM stdin;
    public       postgres    false    213   ��       �          0    17416    estado_solvencia 
   TABLE DATA               G   COPY public.estado_solvencia (id_estadosolvencia, estados) FROM stdin;
    public       postgres    false    221   ��       �          0    17469    grado 
   TABLE DATA               R   COPY public.grado (id_grado, cantidad_alumnos, grado, id_estadogrado) FROM stdin;
    public       postgres    false    231   �       �          0    17403    mes 
   TABLE DATA               :   COPY public.mes (id_mes, mes_estado, id_anio) FROM stdin;
    public       postgres    false    219   $�       �          0    17453    nivel 
   TABLE DATA               0   COPY public.nivel (id_nivel, nivel) FROM stdin;
    public       postgres    false    227   A�       �          0    17345    niveldocente 
   TABLE DATA               B   COPY public.niveldocente (id_niveldoc, nivel_docente) FROM stdin;
    public       postgres    false    207   ^�                  0    17546    notas1 
   TABLE DATA               O   COPY public.notas1 (id_nota, promedio_final, id_perfil, id_alumno) FROM stdin;
    public       postgres    false    239   {�       �          0    17518    perfiles 
   TABLE DATA               �   COPY public.perfiles (id_perfil, nombreperfil, descripcion, porcentaje, fecha_inicio, fecha_fin, trimestre, id_tipo_actividad, id_asignatura, id_estadoperfil, id_docente) FROM stdin;
    public       postgres    false    237   ��       �          0    17424 	   solvencia 
   TABLE DATA               N   COPY public.solvencia (id_solvencia, id_estadosolvencia, id_anio) FROM stdin;
    public       postgres    false    223   ��       �          0    17319    tipo_asignatura 
   TABLE DATA               L   COPY public.tipo_asignatura (id_tipoasignatura, tipoasignatura) FROM stdin;
    public       postgres    false    203   ��       �          0    17353    tipo_docente 
   TABLE DATA               <   COPY public.tipo_docente (id_tipodocente, tipo) FROM stdin;
    public       postgres    false    209   ��       �          0    17387    tipo_perfil 
   TABLE DATA               W   COPY public.tipo_perfil (id_tipo_actividad, nombre_actividad, descripcion) FROM stdin;
    public       postgres    false    215   �       �          0    17295    usuarios 
   TABLE DATA               �   COPY public.usuarios (id_usuario, nombres_usuario, apellidos_usuario, correo_usuario, alias_usuario, clave_usuario) FROM stdin;
    public       postgres    false    197   )�                   0    0    alumno_id_alumno_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.alumno_id_alumno_seq', 1, false);
            public       postgres    false    234            !           0    0    annio_id_anio_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.annio_id_anio_seq', 1, false);
            public       postgres    false    216            "           0    0    asignaturas_id_asignatura_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.asignaturas_id_asignatura_seq', 1, false);
            public       postgres    false    204            #           0    0    boletas_id_boleta_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.boletas_id_boleta_seq', 1, false);
            public       postgres    false    240            $           0    0    datos_colegio_id_datos_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.datos_colegio_id_datos_seq', 1, false);
            public       postgres    false    198            %           0    0    docente2_id_docente_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.docente2_id_docente_seq', 1, false);
            public       postgres    false    210            &           0    0    encargados_id_encargado_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.encargados_id_encargado_seq', 1, false);
            public       postgres    false    224            '           0    0 !   estado_alumno_id_estadoalumno_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.estado_alumno_id_estadoalumno_seq', 1, false);
            public       postgres    false    232            (           0    0 )   estado_asignatura_id_estadoasignatura_seq    SEQUENCE SET     X   SELECT pg_catalog.setval('public.estado_asignatura_id_estadoasignatura_seq', 1, false);
            public       postgres    false    200            )           0    0    estado_grado_id_estadogrado_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.estado_grado_id_estadogrado_seq', 1, false);
            public       postgres    false    228            *           0    0 !   estado_perfil_id_estadoperfil_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.estado_perfil_id_estadoperfil_seq', 1, false);
            public       postgres    false    212            +           0    0 '   estado_solvencia_id_estadosolvencia_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.estado_solvencia_id_estadosolvencia_seq', 1, false);
            public       postgres    false    220            ,           0    0    grado_id_grado_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.grado_id_grado_seq', 1, false);
            public       postgres    false    230            -           0    0    mes_id_mes_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.mes_id_mes_seq', 1, false);
            public       postgres    false    218            .           0    0    nivel_id_nivel_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.nivel_id_nivel_seq', 1, false);
            public       postgres    false    226            /           0    0    niveldocente_id_niveldoc_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.niveldocente_id_niveldoc_seq', 1, false);
            public       postgres    false    206            0           0    0    notas1_id_nota_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.notas1_id_nota_seq', 1, false);
            public       postgres    false    238            1           0    0    perfiles_id_perfil_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.perfiles_id_perfil_seq', 1, false);
            public       postgres    false    236            2           0    0    solvencia_id_solvencia_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.solvencia_id_solvencia_seq', 1, false);
            public       postgres    false    222            3           0    0 %   tipo_asignatura_id_tipoasignatura_seq    SEQUENCE SET     T   SELECT pg_catalog.setval('public.tipo_asignatura_id_tipoasignatura_seq', 1, false);
            public       postgres    false    202            4           0    0    tipo_docente_id_tipodocente_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.tipo_docente_id_tipodocente_seq', 1, false);
            public       postgres    false    208            5           0    0 !   tipo_perfil_id_tipo_actividad_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.tipo_perfil_id_tipo_actividad_seq', 1, false);
            public       postgres    false    214            6           0    0    usuarios_id_usuario_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.usuarios_id_usuario_seq', 1, true);
            public       postgres    false    196            @           2606    17495    alumno alumno_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY public.alumno
    ADD CONSTRAINT alumno_pkey PRIMARY KEY (id_alumno);
 <   ALTER TABLE ONLY public.alumno DROP CONSTRAINT alumno_pkey;
       public         postgres    false    235            .           2606    17400    annio annio_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY public.annio
    ADD CONSTRAINT annio_pkey PRIMARY KEY (id_anio);
 :   ALTER TABLE ONLY public.annio DROP CONSTRAINT annio_pkey;
       public         postgres    false    217            "           2606    17332    asignaturas asignaturas_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.asignaturas
    ADD CONSTRAINT asignaturas_pkey PRIMARY KEY (id_asignatura);
 F   ALTER TABLE ONLY public.asignaturas DROP CONSTRAINT asignaturas_pkey;
       public         postgres    false    205            F           2606    17569    boletas boletas_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.boletas
    ADD CONSTRAINT boletas_pkey PRIMARY KEY (id_boleta);
 >   ALTER TABLE ONLY public.boletas DROP CONSTRAINT boletas_pkey;
       public         postgres    false    241                       2606    17308     datos_colegio datos_colegio_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.datos_colegio
    ADD CONSTRAINT datos_colegio_pkey PRIMARY KEY (id_datos);
 J   ALTER TABLE ONLY public.datos_colegio DROP CONSTRAINT datos_colegio_pkey;
       public         postgres    false    199            (           2606    17366    docente2 docente2_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.docente2
    ADD CONSTRAINT docente2_pkey PRIMARY KEY (id_docente);
 @   ALTER TABLE ONLY public.docente2 DROP CONSTRAINT docente2_pkey;
       public         postgres    false    211            6           2606    17450    encargados encargados_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.encargados
    ADD CONSTRAINT encargados_pkey PRIMARY KEY (id_encargado);
 D   ALTER TABLE ONLY public.encargados DROP CONSTRAINT encargados_pkey;
       public         postgres    false    225            >           2606    17487     estado_alumno estado_alumno_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.estado_alumno
    ADD CONSTRAINT estado_alumno_pkey PRIMARY KEY (id_estadoalumno);
 J   ALTER TABLE ONLY public.estado_alumno DROP CONSTRAINT estado_alumno_pkey;
       public         postgres    false    233                       2606    17316 (   estado_asignatura estado_asignatura_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY public.estado_asignatura
    ADD CONSTRAINT estado_asignatura_pkey PRIMARY KEY (id_estadoasignatura);
 R   ALTER TABLE ONLY public.estado_asignatura DROP CONSTRAINT estado_asignatura_pkey;
       public         postgres    false    201            :           2606    17466    estado_grado estado_grado_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.estado_grado
    ADD CONSTRAINT estado_grado_pkey PRIMARY KEY (id_estadogrado);
 H   ALTER TABLE ONLY public.estado_grado DROP CONSTRAINT estado_grado_pkey;
       public         postgres    false    229            *           2606    17384     estado_perfil estado_perfil_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.estado_perfil
    ADD CONSTRAINT estado_perfil_pkey PRIMARY KEY (id_estadoperfil);
 J   ALTER TABLE ONLY public.estado_perfil DROP CONSTRAINT estado_perfil_pkey;
       public         postgres    false    213            2           2606    17421 &   estado_solvencia estado_solvencia_pkey 
   CONSTRAINT     t   ALTER TABLE ONLY public.estado_solvencia
    ADD CONSTRAINT estado_solvencia_pkey PRIMARY KEY (id_estadosolvencia);
 P   ALTER TABLE ONLY public.estado_solvencia DROP CONSTRAINT estado_solvencia_pkey;
       public         postgres    false    221            <           2606    17474    grado grado_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.grado
    ADD CONSTRAINT grado_pkey PRIMARY KEY (id_grado);
 :   ALTER TABLE ONLY public.grado DROP CONSTRAINT grado_pkey;
       public         postgres    false    231            0           2606    17408    mes mes_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.mes
    ADD CONSTRAINT mes_pkey PRIMARY KEY (id_mes);
 6   ALTER TABLE ONLY public.mes DROP CONSTRAINT mes_pkey;
       public         postgres    false    219            8           2606    17458    nivel nivel_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.nivel
    ADD CONSTRAINT nivel_pkey PRIMARY KEY (id_nivel);
 :   ALTER TABLE ONLY public.nivel DROP CONSTRAINT nivel_pkey;
       public         postgres    false    227            $           2606    17350    niveldocente niveldocente_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.niveldocente
    ADD CONSTRAINT niveldocente_pkey PRIMARY KEY (id_niveldoc);
 H   ALTER TABLE ONLY public.niveldocente DROP CONSTRAINT niveldocente_pkey;
       public         postgres    false    207            D           2606    17551    notas1 notas1_pkey 
   CONSTRAINT     U   ALTER TABLE ONLY public.notas1
    ADD CONSTRAINT notas1_pkey PRIMARY KEY (id_nota);
 <   ALTER TABLE ONLY public.notas1 DROP CONSTRAINT notas1_pkey;
       public         postgres    false    239            B           2606    17523    perfiles perfiles_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.perfiles
    ADD CONSTRAINT perfiles_pkey PRIMARY KEY (id_perfil);
 @   ALTER TABLE ONLY public.perfiles DROP CONSTRAINT perfiles_pkey;
       public         postgres    false    237            4           2606    17429    solvencia solvencia_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.solvencia
    ADD CONSTRAINT solvencia_pkey PRIMARY KEY (id_solvencia);
 B   ALTER TABLE ONLY public.solvencia DROP CONSTRAINT solvencia_pkey;
       public         postgres    false    223                        2606    17324 $   tipo_asignatura tipo_asignatura_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.tipo_asignatura
    ADD CONSTRAINT tipo_asignatura_pkey PRIMARY KEY (id_tipoasignatura);
 N   ALTER TABLE ONLY public.tipo_asignatura DROP CONSTRAINT tipo_asignatura_pkey;
       public         postgres    false    203            &           2606    17358    tipo_docente tipo_docente_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.tipo_docente
    ADD CONSTRAINT tipo_docente_pkey PRIMARY KEY (id_tipodocente);
 H   ALTER TABLE ONLY public.tipo_docente DROP CONSTRAINT tipo_docente_pkey;
       public         postgres    false    209            ,           2606    17392    tipo_perfil tipo_perfil_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.tipo_perfil
    ADD CONSTRAINT tipo_perfil_pkey PRIMARY KEY (id_tipo_actividad);
 F   ALTER TABLE ONLY public.tipo_perfil DROP CONSTRAINT tipo_perfil_pkey;
       public         postgres    false    215                       2606    17300    usuarios usuarios_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public         postgres    false    197            Q           2606    17506    alumno alumno_id_encargado_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.alumno
    ADD CONSTRAINT alumno_id_encargado_fkey FOREIGN KEY (id_encargado) REFERENCES public.encargados(id_encargado);
 I   ALTER TABLE ONLY public.alumno DROP CONSTRAINT alumno_id_encargado_fkey;
       public       postgres    false    2870    225    235            P           2606    17501 "   alumno alumno_id_estadoalumno_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.alumno
    ADD CONSTRAINT alumno_id_estadoalumno_fkey FOREIGN KEY (id_estadoalumno) REFERENCES public.estado_alumno(id_estadoalumno);
 L   ALTER TABLE ONLY public.alumno DROP CONSTRAINT alumno_id_estadoalumno_fkey;
       public       postgres    false    233    235    2878            R           2606    17511    alumno alumno_id_grado_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.alumno
    ADD CONSTRAINT alumno_id_grado_fkey FOREIGN KEY (id_grado) REFERENCES public.grado(id_grado);
 E   ALTER TABLE ONLY public.alumno DROP CONSTRAINT alumno_id_grado_fkey;
       public       postgres    false    2876    231    235            O           2606    17496    alumno alumno_id_solvencia_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.alumno
    ADD CONSTRAINT alumno_id_solvencia_fkey FOREIGN KEY (id_solvencia) REFERENCES public.solvencia(id_solvencia);
 I   ALTER TABLE ONLY public.alumno DROP CONSTRAINT alumno_id_solvencia_fkey;
       public       postgres    false    2868    235    223            H           2606    17338 0   asignaturas asignaturas_id_estadoasignatura_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.asignaturas
    ADD CONSTRAINT asignaturas_id_estadoasignatura_fkey FOREIGN KEY (id_estadoasignatura) REFERENCES public.estado_asignatura(id_estadoasignatura);
 Z   ALTER TABLE ONLY public.asignaturas DROP CONSTRAINT asignaturas_id_estadoasignatura_fkey;
       public       postgres    false    2846    205    201            G           2606    17333 .   asignaturas asignaturas_id_tipoasignatura_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.asignaturas
    ADD CONSTRAINT asignaturas_id_tipoasignatura_fkey FOREIGN KEY (id_tipoasignatura) REFERENCES public.tipo_asignatura(id_tipoasignatura);
 X   ALTER TABLE ONLY public.asignaturas DROP CONSTRAINT asignaturas_id_tipoasignatura_fkey;
       public       postgres    false    2848    205    203            Z           2606    17575    boletas boletas_id_alumno_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.boletas
    ADD CONSTRAINT boletas_id_alumno_fkey FOREIGN KEY (id_alumno) REFERENCES public.alumno(id_alumno);
 H   ALTER TABLE ONLY public.boletas DROP CONSTRAINT boletas_id_alumno_fkey;
       public       postgres    false    2880    235    241            [           2606    17580    boletas boletas_id_datos_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.boletas
    ADD CONSTRAINT boletas_id_datos_fkey FOREIGN KEY (id_datos) REFERENCES public.datos_colegio(id_datos);
 G   ALTER TABLE ONLY public.boletas DROP CONSTRAINT boletas_id_datos_fkey;
       public       postgres    false    199    2844    241            Y           2606    17570    boletas boletas_id_nota_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.boletas
    ADD CONSTRAINT boletas_id_nota_fkey FOREIGN KEY (id_nota) REFERENCES public.notas1(id_nota);
 F   ALTER TABLE ONLY public.boletas DROP CONSTRAINT boletas_id_nota_fkey;
       public       postgres    false    239    241    2884            J           2606    17372 "   docente2 docente2_id_niveldoc_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.docente2
    ADD CONSTRAINT docente2_id_niveldoc_fkey FOREIGN KEY (id_niveldoc) REFERENCES public.niveldocente(id_niveldoc);
 L   ALTER TABLE ONLY public.docente2 DROP CONSTRAINT docente2_id_niveldoc_fkey;
       public       postgres    false    2852    211    207            I           2606    17367 %   docente2 docente2_id_tipodocente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.docente2
    ADD CONSTRAINT docente2_id_tipodocente_fkey FOREIGN KEY (id_tipodocente) REFERENCES public.tipo_docente(id_tipodocente);
 O   ALTER TABLE ONLY public.docente2 DROP CONSTRAINT docente2_id_tipodocente_fkey;
       public       postgres    false    211    2854    209            N           2606    17475    grado grado_id_estadogrado_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.grado
    ADD CONSTRAINT grado_id_estadogrado_fkey FOREIGN KEY (id_estadogrado) REFERENCES public.estado_grado(id_estadogrado);
 I   ALTER TABLE ONLY public.grado DROP CONSTRAINT grado_id_estadogrado_fkey;
       public       postgres    false    231    2874    229            K           2606    17409    mes mes_id_anio_fkey    FK CONSTRAINT     x   ALTER TABLE ONLY public.mes
    ADD CONSTRAINT mes_id_anio_fkey FOREIGN KEY (id_anio) REFERENCES public.annio(id_anio);
 >   ALTER TABLE ONLY public.mes DROP CONSTRAINT mes_id_anio_fkey;
       public       postgres    false    219    217    2862            X           2606    17557    notas1 notas1_id_alumno_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.notas1
    ADD CONSTRAINT notas1_id_alumno_fkey FOREIGN KEY (id_alumno) REFERENCES public.alumno(id_alumno);
 F   ALTER TABLE ONLY public.notas1 DROP CONSTRAINT notas1_id_alumno_fkey;
       public       postgres    false    235    239    2880            W           2606    17552    notas1 notas1_id_perfil_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.notas1
    ADD CONSTRAINT notas1_id_perfil_fkey FOREIGN KEY (id_perfil) REFERENCES public.perfiles(id_perfil);
 F   ALTER TABLE ONLY public.notas1 DROP CONSTRAINT notas1_id_perfil_fkey;
       public       postgres    false    2882    237    239            T           2606    17529 $   perfiles perfiles_id_asignatura_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.perfiles
    ADD CONSTRAINT perfiles_id_asignatura_fkey FOREIGN KEY (id_asignatura) REFERENCES public.asignaturas(id_asignatura);
 N   ALTER TABLE ONLY public.perfiles DROP CONSTRAINT perfiles_id_asignatura_fkey;
       public       postgres    false    205    237    2850            V           2606    17539 !   perfiles perfiles_id_docente_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.perfiles
    ADD CONSTRAINT perfiles_id_docente_fkey FOREIGN KEY (id_docente) REFERENCES public.docente2(id_docente);
 K   ALTER TABLE ONLY public.perfiles DROP CONSTRAINT perfiles_id_docente_fkey;
       public       postgres    false    237    211    2856            U           2606    17534 &   perfiles perfiles_id_estadoperfil_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.perfiles
    ADD CONSTRAINT perfiles_id_estadoperfil_fkey FOREIGN KEY (id_estadoperfil) REFERENCES public.estado_perfil(id_estadoperfil);
 P   ALTER TABLE ONLY public.perfiles DROP CONSTRAINT perfiles_id_estadoperfil_fkey;
       public       postgres    false    2858    237    213            S           2606    17524 (   perfiles perfiles_id_tipo_actividad_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.perfiles
    ADD CONSTRAINT perfiles_id_tipo_actividad_fkey FOREIGN KEY (id_tipo_actividad) REFERENCES public.tipo_perfil(id_tipo_actividad);
 R   ALTER TABLE ONLY public.perfiles DROP CONSTRAINT perfiles_id_tipo_actividad_fkey;
       public       postgres    false    2860    215    237            M           2606    17435     solvencia solvencia_id_anio_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.solvencia
    ADD CONSTRAINT solvencia_id_anio_fkey FOREIGN KEY (id_anio) REFERENCES public.annio(id_anio);
 J   ALTER TABLE ONLY public.solvencia DROP CONSTRAINT solvencia_id_anio_fkey;
       public       postgres    false    223    2862    217            L           2606    17430 +   solvencia solvencia_id_estadosolvencia_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.solvencia
    ADD CONSTRAINT solvencia_id_estadosolvencia_fkey FOREIGN KEY (id_estadosolvencia) REFERENCES public.estado_solvencia(id_estadosolvencia);
 U   ALTER TABLE ONLY public.solvencia DROP CONSTRAINT solvencia_id_estadosolvencia_fkey;
       public       postgres    false    2866    223    221            �      x������ � �      �      x������ � �      �      x������ � �            x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �             x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �   z   x�3�t�I�J�K)��tN,.������)�,�Mr���s3s���s9�K2*9U�*UT��|��r��#2+
��"���K��+
#���r��*�<�����*�,�
M,��b���� {%|     