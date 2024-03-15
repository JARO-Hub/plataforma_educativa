--
-- PostgreSQL database dump
--

-- Dumped from database version 11.20
-- Dumped by pg_dump version 11.20

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: tbd_application; Type: SCHEMA; Schema: -; Owner: phpadmin
--

CREATE SCHEMA tbd_application;


ALTER SCHEMA tbd_application OWNER TO phpadmin;

--
-- Name: email_type; Type: DOMAIN; Schema: tbd_application; Owner: postgres
--

CREATE DOMAIN tbd_application.email_type AS character varying(255);


ALTER DOMAIN tbd_application.email_type OWNER TO postgres;

--
-- Name: estado; Type: DOMAIN; Schema: tbd_application; Owner: postgres
--

CREATE DOMAIN tbd_application.estado AS smallint;


ALTER DOMAIN tbd_application.estado OWNER TO postgres;

--
-- Name: estado_rol; Type: DOMAIN; Schema: tbd_application; Owner: postgres
--

CREATE DOMAIN tbd_application.estado_rol AS integer;


ALTER DOMAIN tbd_application.estado_rol OWNER TO postgres;

--
-- Name: extension_doc; Type: DOMAIN; Schema: tbd_application; Owner: postgres
--

CREATE DOMAIN tbd_application.extension_doc AS character varying(10);


ALTER DOMAIN tbd_application.extension_doc OWNER TO postgres;

--
-- Name: extension_img; Type: DOMAIN; Schema: tbd_application; Owner: postgres
--

CREATE DOMAIN tbd_application.extension_img AS character varying(10);


ALTER DOMAIN tbd_application.extension_img OWNER TO postgres;

--
-- Name: extension_video; Type: DOMAIN; Schema: tbd_application; Owner: postgres
--

CREATE DOMAIN tbd_application.extension_video AS character varying(10);


ALTER DOMAIN tbd_application.extension_video OWNER TO postgres;

--
-- Name: password_type; Type: DOMAIN; Schema: tbd_application; Owner: postgres
--

CREATE DOMAIN tbd_application.password_type AS character varying(500);


ALTER DOMAIN tbd_application.password_type OWNER TO postgres;

--
-- Name: register_session(integer, integer); Type: FUNCTION; Schema: tbd_application; Owner: phpadmin
--

CREATE FUNCTION tbd_application.register_session(user_id integer, client_pid integer) RETURNS text
    LANGUAGE plpgsql
    AS $$
DECLARE
    hashed_pid TEXT;
BEGIN

    INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora )
    VALUES(user_id, client_pid, true, current_date, current_time);

    SELECT encode(digest(client_pid::TEXT, 'sha224'), 'hex') INTO hashed_pid;
    RETURN hashed_pid;
END;
$$;


ALTER FUNCTION tbd_application.register_session(user_id integer, client_pid integer) OWNER TO phpadmin;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: archivosestudiantestareas; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.archivosestudiantestareas (
    archivo_estudiante_tarea_ integer NOT NULL,
    estudiante_id integer NOT NULL,
    tarea_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    fecha_subida date,
    fecha_modificacion date,
    tamano integer
);


ALTER TABLE tbd_application.archivosestudiantestareas OWNER TO postgres;

--
-- Name: archivosestudiantestareas_archivo_estudiante_tarea__seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.archivosestudiantestareas_archivo_estudiante_tarea__seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.archivosestudiantestareas_archivo_estudiante_tarea__seq OWNER TO postgres;

--
-- Name: archivosestudiantestareas_archivo_estudiante_tarea__seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.archivosestudiantestareas_archivo_estudiante_tarea__seq OWNED BY tbd_application.archivosestudiantestareas.archivo_estudiante_tarea_;


--
-- Name: archivostareas; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.archivostareas (
    archivo_tarea_id integer NOT NULL,
    tarea_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    fecha_subida date,
    fecha_modificacion date,
    tamano integer
);


ALTER TABLE tbd_application.archivostareas OWNER TO postgres;

--
-- Name: archivostareas_archivo_tarea_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.archivostareas_archivo_tarea_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.archivostareas_archivo_tarea_id_seq OWNER TO postgres;

--
-- Name: archivostareas_archivo_tarea_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.archivostareas_archivo_tarea_id_seq OWNED BY tbd_application.archivostareas.archivo_tarea_id;


--
-- Name: documentosarchivosestudiantesta; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.documentosarchivosestudiantesta (
    archivo_estudiante_tarea_ integer NOT NULL,
    estudiante_id integer NOT NULL,
    tarea_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    extension tbd_application.extension_doc,
    contenido_url text
);


ALTER TABLE tbd_application.documentosarchivosestudiantesta OWNER TO postgres;

--
-- Name: documentosarchivostareas; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.documentosarchivostareas (
    archivo_tarea_id integer NOT NULL,
    tarea_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    extension tbd_application.extension_doc,
    contenido_url text,
    CONSTRAINT ckc_extension_document CHECK (((extension IS NULL) OR ((extension)::text = ANY ((ARRAY['pdf'::character varying, 'epub'::character varying, 'txt'::character varying, 'doc'::character varying, 'docx'::character varying])::text[]))))
);


ALTER TABLE tbd_application.documentosarchivostareas OWNER TO postgres;

--
-- Name: educadores; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.educadores (
    educador_id integer NOT NULL,
    especialidad character varying(255),
    grado_academico character varying(100),
    biografia text
);


ALTER TABLE tbd_application.educadores OWNER TO postgres;

--
-- Name: estudiantes; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.estudiantes (
    estudiante_id integer NOT NULL,
    matricula character varying(50),
    codigo integer,
    carrera character varying(100)
);


ALTER TABLE tbd_application.estudiantes OWNER TO postgres;

--
-- Name: estudiantesgrupos; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.estudiantesgrupos (
    estudiante_grupo_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    estudiante_id integer NOT NULL,
    fecha_registro date,
    hora_registro time without time zone
);


ALTER TABLE tbd_application.estudiantesgrupos OWNER TO postgres;

--
-- Name: estudiantesgrupos_estudiante_grupo_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.estudiantesgrupos_estudiante_grupo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.estudiantesgrupos_estudiante_grupo_id_seq OWNER TO postgres;

--
-- Name: estudiantesgrupos_estudiante_grupo_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.estudiantesgrupos_estudiante_grupo_id_seq OWNED BY tbd_application.estudiantesgrupos.estudiante_grupo_id;


--
-- Name: estudiantestareas; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.estudiantestareas (
    estudiante_id integer NOT NULL,
    tarea_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    estado tbd_application.estado,
    CONSTRAINT ckc_estado_estudian CHECK (((estado IS NULL) OR ((estado)::smallint = ANY (ARRAY[1, 2, 3, 4]))))
);


ALTER TABLE tbd_application.estudiantestareas OWNER TO postgres;

--
-- Name: funciones; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.funciones (
    funcion_id integer NOT NULL,
    nombre character varying(255),
    descripcion text
);


ALTER TABLE tbd_application.funciones OWNER TO postgres;

--
-- Name: funciones_funcion_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.funciones_funcion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.funciones_funcion_id_seq OWNER TO postgres;

--
-- Name: funciones_funcion_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.funciones_funcion_id_seq OWNED BY tbd_application.funciones.funcion_id;


--
-- Name: gestiones; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.gestiones (
    gestion_id integer NOT NULL,
    periodo character varying(100),
    fecha_inicio date,
    fecha_fin date,
    descripcion text
);


ALTER TABLE tbd_application.gestiones OWNER TO postgres;

--
-- Name: gestiones_gestion_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.gestiones_gestion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.gestiones_gestion_id_seq OWNER TO postgres;

--
-- Name: gestiones_gestion_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.gestiones_gestion_id_seq OWNED BY tbd_application.gestiones.gestion_id;


--
-- Name: grupos; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.grupos (
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    materia_id integer,
    gestion_id integer,
    tipo_grupo_id integer NOT NULL,
    nombre character varying(255),
    descripcion text,
    capacidad_maxima integer
);


ALTER TABLE tbd_application.grupos OWNER TO postgres;

--
-- Name: grupos_grupo_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.grupos_grupo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.grupos_grupo_id_seq OWNER TO postgres;

--
-- Name: grupos_grupo_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.grupos_grupo_id_seq OWNED BY tbd_application.grupos.grupo_id;


--
-- Name: imagenesarchivosestudiantestare; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.imagenesarchivosestudiantestare (
    archivo_estudiante_tarea_ integer NOT NULL,
    estudiante_id integer NOT NULL,
    tarea_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    extension tbd_application.extension_img,
    resolucion character varying(50),
    descripcion text,
    contenido_url text
);


ALTER TABLE tbd_application.imagenesarchivosestudiantestare OWNER TO postgres;

--
-- Name: imagenesarchivostareas; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.imagenesarchivostareas (
    archivo_tarea_id integer NOT NULL,
    tarea_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    extension tbd_application.extension_img,
    resolucion character varying(50),
    descripcion text,
    contenido_url text,
    CONSTRAINT ckc_extension_imagenes CHECK (((extension IS NULL) OR ((extension)::text = ANY ((ARRAY['jpg'::character varying, 'jpeg'::character varying, 'png'::character varying, 'gif'::character varying, 'bmp'::character varying])::text[]))))
);


ALTER TABLE tbd_application.imagenesarchivostareas OWNER TO postgres;

--
-- Name: materias; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.materias (
    materia_id integer NOT NULL,
    nombre character varying(100),
    codigo character varying(100),
    creditos integer
);


ALTER TABLE tbd_application.materias OWNER TO postgres;

--
-- Name: materias_materia_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.materias_materia_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.materias_materia_id_seq OWNER TO postgres;

--
-- Name: materias_materia_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.materias_materia_id_seq OWNED BY tbd_application.materias.materia_id;


--
-- Name: rel_funciones; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.rel_funciones (
    estado tbd_application.estado_rol,
    rel_funcion_id integer NOT NULL,
    funcion_id integer NOT NULL,
    roles_id integer NOT NULL,
    c character(1) DEFAULT NULL::bpchar,
    r character(1) DEFAULT NULL::bpchar,
    u character(1) DEFAULT NULL::bpchar,
    d character(1) DEFAULT NULL::bpchar,
    CONSTRAINT ckc_estado_rel_func CHECK (((estado IS NULL) OR ((estado)::integer = ANY (ARRAY[1, 2, 3]))))
);


ALTER TABLE tbd_application.rel_funciones OWNER TO postgres;

--
-- Name: rel_funciones_rel_funcion_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.rel_funciones_rel_funcion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.rel_funciones_rel_funcion_id_seq OWNER TO postgres;

--
-- Name: rel_funciones_rel_funcion_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.rel_funciones_rel_funcion_id_seq OWNED BY tbd_application.rel_funciones.rel_funcion_id;


--
-- Name: roles; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.roles (
    roles_id integer NOT NULL,
    nombre character varying(100),
    descripcion text
);


ALTER TABLE tbd_application.roles OWNER TO postgres;

--
-- Name: roles_roles_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.roles_roles_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.roles_roles_id_seq OWNER TO postgres;

--
-- Name: roles_roles_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.roles_roles_id_seq OWNED BY tbd_application.roles.roles_id;


--
-- Name: sesions; Type: TABLE; Schema: tbd_application; Owner: phpadmin
--

CREATE TABLE tbd_application.sesions (
    sesion_id integer NOT NULL,
    usuario_id integer NOT NULL,
    pid integer,
    estado boolean,
    fecha date,
    hora time without time zone
);


ALTER TABLE tbd_application.sesions OWNER TO phpadmin;

--
-- Name: sesions_sesion_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: phpadmin
--

CREATE SEQUENCE tbd_application.sesions_sesion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.sesions_sesion_id_seq OWNER TO phpadmin;

--
-- Name: sesions_sesion_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: phpadmin
--

ALTER SEQUENCE tbd_application.sesions_sesion_id_seq OWNED BY tbd_application.sesions.sesion_id;


--
-- Name: tareas; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.tareas (
    tarea_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    titulo character varying(255),
    descripcion text,
    fecha_limite date,
    puntaje_maximo integer,
    instrucciones text
);


ALTER TABLE tbd_application.tareas OWNER TO postgres;

--
-- Name: tareas_tarea_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.tareas_tarea_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.tareas_tarea_id_seq OWNER TO postgres;

--
-- Name: tareas_tarea_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.tareas_tarea_id_seq OWNED BY tbd_application.tareas.tarea_id;


--
-- Name: tipo_grupo; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.tipo_grupo (
    tipo_grupo_id integer NOT NULL,
    descripcion text,
    color_asociado character varying(20),
    icono character(1),
    prioridad integer
);


ALTER TABLE tbd_application.tipo_grupo OWNER TO postgres;

--
-- Name: tipo_grupo_tipo_grupo_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.tipo_grupo_tipo_grupo_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.tipo_grupo_tipo_grupo_id_seq OWNER TO postgres;

--
-- Name: tipo_grupo_tipo_grupo_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.tipo_grupo_tipo_grupo_id_seq OWNED BY tbd_application.tipo_grupo.tipo_grupo_id;


--
-- Name: usuarios; Type: TABLE; Schema: tbd_application; Owner: phpadmin
--

CREATE TABLE tbd_application.usuarios (
    usuario_id integer NOT NULL,
    nombre character varying(100),
    apellido character varying(100),
    email tbd_application.email_type,
    contrasena tbd_application.password_type,
    fecha_nacimiento date,
    foto_perfil text,
    CONSTRAINT ckc_email_usuarios CHECK (((email IS NULL) OR ((email)::text ~* '^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$'::text)))
);


ALTER TABLE tbd_application.usuarios OWNER TO phpadmin;

--
-- Name: usuarios_usuario_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: phpadmin
--

CREATE SEQUENCE tbd_application.usuarios_usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.usuarios_usuario_id_seq OWNER TO phpadmin;

--
-- Name: usuarios_usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: phpadmin
--

ALTER SEQUENCE tbd_application.usuarios_usuario_id_seq OWNED BY tbd_application.usuarios.usuario_id;


--
-- Name: usuariosroles; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.usuariosroles (
    rol_usuario_id integer NOT NULL,
    usuario_id integer NOT NULL,
    roles_id integer NOT NULL
);


ALTER TABLE tbd_application.usuariosroles OWNER TO postgres;

--
-- Name: usuariosroles_rol_usuario_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: postgres
--

CREATE SEQUENCE tbd_application.usuariosroles_rol_usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.usuariosroles_rol_usuario_id_seq OWNER TO postgres;

--
-- Name: usuariosroles_rol_usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: postgres
--

ALTER SEQUENCE tbd_application.usuariosroles_rol_usuario_id_seq OWNED BY tbd_application.usuariosroles.rol_usuario_id;


--
-- Name: videosarchivosestudiantestareas; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.videosarchivosestudiantestareas (
    archivo_estudiante_tarea_ integer NOT NULL,
    estudiante_id integer NOT NULL,
    tarea_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    duracion time without time zone,
    calidad character varying(50),
    extension tbd_application.extension_video,
    contenido_url text
);


ALTER TABLE tbd_application.videosarchivosestudiantestareas OWNER TO postgres;

--
-- Name: videosarchivostareas; Type: TABLE; Schema: tbd_application; Owner: postgres
--

CREATE TABLE tbd_application.videosarchivostareas (
    archivo_tarea_id integer NOT NULL,
    tarea_id integer NOT NULL,
    educador_id integer NOT NULL,
    grupo_id integer NOT NULL,
    duracion time without time zone,
    calidad character varying(50),
    extension tbd_application.extension_video,
    contenido_url text,
    CONSTRAINT ckc_extension_videosar CHECK (((extension IS NULL) OR ((extension)::text = ANY ((ARRAY['mov'::character varying, 'mp4'::character varying, 'wmv'::character varying, 'avi'::character varying, 'avchd'::character varying, 'flv'::character varying])::text[]))))
);


ALTER TABLE tbd_application.videosarchivostareas OWNER TO postgres;

--
-- Name: archivosestudiantestareas archivo_estudiante_tarea_; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.archivosestudiantestareas ALTER COLUMN archivo_estudiante_tarea_ SET DEFAULT nextval('tbd_application.archivosestudiantestareas_archivo_estudiante_tarea__seq'::regclass);


--
-- Name: archivostareas archivo_tarea_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.archivostareas ALTER COLUMN archivo_tarea_id SET DEFAULT nextval('tbd_application.archivostareas_archivo_tarea_id_seq'::regclass);


--
-- Name: estudiantesgrupos estudiante_grupo_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.estudiantesgrupos ALTER COLUMN estudiante_grupo_id SET DEFAULT nextval('tbd_application.estudiantesgrupos_estudiante_grupo_id_seq'::regclass);


--
-- Name: funciones funcion_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.funciones ALTER COLUMN funcion_id SET DEFAULT nextval('tbd_application.funciones_funcion_id_seq'::regclass);


--
-- Name: gestiones gestion_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.gestiones ALTER COLUMN gestion_id SET DEFAULT nextval('tbd_application.gestiones_gestion_id_seq'::regclass);


--
-- Name: grupos grupo_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.grupos ALTER COLUMN grupo_id SET DEFAULT nextval('tbd_application.grupos_grupo_id_seq'::regclass);


--
-- Name: materias materia_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.materias ALTER COLUMN materia_id SET DEFAULT nextval('tbd_application.materias_materia_id_seq'::regclass);


--
-- Name: rel_funciones rel_funcion_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.rel_funciones ALTER COLUMN rel_funcion_id SET DEFAULT nextval('tbd_application.rel_funciones_rel_funcion_id_seq'::regclass);


--
-- Name: roles roles_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.roles ALTER COLUMN roles_id SET DEFAULT nextval('tbd_application.roles_roles_id_seq'::regclass);


--
-- Name: sesions sesion_id; Type: DEFAULT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.sesions ALTER COLUMN sesion_id SET DEFAULT nextval('tbd_application.sesions_sesion_id_seq'::regclass);


--
-- Name: tareas tarea_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.tareas ALTER COLUMN tarea_id SET DEFAULT nextval('tbd_application.tareas_tarea_id_seq'::regclass);


--
-- Name: tipo_grupo tipo_grupo_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.tipo_grupo ALTER COLUMN tipo_grupo_id SET DEFAULT nextval('tbd_application.tipo_grupo_tipo_grupo_id_seq'::regclass);


--
-- Name: usuarios usuario_id; Type: DEFAULT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.usuarios ALTER COLUMN usuario_id SET DEFAULT nextval('tbd_application.usuarios_usuario_id_seq'::regclass);


--
-- Name: usuariosroles rol_usuario_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.usuariosroles ALTER COLUMN rol_usuario_id SET DEFAULT nextval('tbd_application.usuariosroles_rol_usuario_id_seq'::regclass);


--
-- Data for Name: archivosestudiantestareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.archivosestudiantestareas (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id, fecha_subida, fecha_modificacion, tamano) FROM stdin;
\.


--
-- Data for Name: archivostareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.archivostareas (archivo_tarea_id, tarea_id, educador_id, grupo_id, fecha_subida, fecha_modificacion, tamano) FROM stdin;
\.


--
-- Data for Name: documentosarchivosestudiantesta; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.documentosarchivosestudiantesta (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id, extension, contenido_url) FROM stdin;
\.


--
-- Data for Name: documentosarchivostareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.documentosarchivostareas (archivo_tarea_id, tarea_id, educador_id, grupo_id, extension, contenido_url) FROM stdin;
\.


--
-- Data for Name: educadores; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.educadores (educador_id, especialidad, grado_academico, biografia) FROM stdin;
\.


--
-- Data for Name: estudiantes; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.estudiantes (estudiante_id, matricula, codigo, carrera) FROM stdin;
\.


--
-- Data for Name: estudiantesgrupos; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.estudiantesgrupos (estudiante_grupo_id, educador_id, grupo_id, estudiante_id, fecha_registro, hora_registro) FROM stdin;
\.


--
-- Data for Name: estudiantestareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.estudiantestareas (estudiante_id, tarea_id, educador_id, grupo_id, estado) FROM stdin;
\.


--
-- Data for Name: funciones; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.funciones (funcion_id, nombre, descripcion) FROM stdin;
1	tareas	"Entity-Type" encargada del historico de <tareas> de un <educador>
2	grupos	"Entity-Type" encargada del historico de <grupos> de un <educador>
3	estudiantestareas	"Entity-Type" encargada del historico de <tareas> de un <estudiante>
4	estudiantesgrupos	"Entity-Type" encargada del historico de <grupos> de un <estudiante>
\.


--
-- Data for Name: gestiones; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.gestiones (gestion_id, periodo, fecha_inicio, fecha_fin, descripcion) FROM stdin;
\.


--
-- Data for Name: grupos; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.grupos (educador_id, grupo_id, materia_id, gestion_id, tipo_grupo_id, nombre, descripcion, capacidad_maxima) FROM stdin;
\.


--
-- Data for Name: imagenesarchivosestudiantestare; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.imagenesarchivosestudiantestare (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id, extension, resolucion, descripcion, contenido_url) FROM stdin;
\.


--
-- Data for Name: imagenesarchivostareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.imagenesarchivostareas (archivo_tarea_id, tarea_id, educador_id, grupo_id, extension, resolucion, descripcion, contenido_url) FROM stdin;
\.


--
-- Data for Name: materias; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.materias (materia_id, nombre, codigo, creditos) FROM stdin;
\.


--
-- Data for Name: rel_funciones; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) FROM stdin;
\.


--
-- Data for Name: roles; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.roles (roles_id, nombre, descripcion) FROM stdin;
1	Estudiante	Rol de un usuario que es un "Estudiante"
2	Educador	Rol de un usuario que es un "Educador"
\.


--
-- Data for Name: sesions; Type: TABLE DATA; Schema: tbd_application; Owner: phpadmin
--

COPY tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) FROM stdin;
3	4	27044	t	2023-10-13	12:30:13.420872
4	4	28092	t	2023-10-13	12:36:06.878947
5	4	27860	t	2023-10-13	13:41:05.998622
\.


--
-- Data for Name: tareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.tareas (tarea_id, educador_id, grupo_id, titulo, descripcion, fecha_limite, puntaje_maximo, instrucciones) FROM stdin;
\.


--
-- Data for Name: tipo_grupo; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.tipo_grupo (tipo_grupo_id, descripcion, color_asociado, icono, prioridad) FROM stdin;
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: tbd_application; Owner: phpadmin
--

COPY tbd_application.usuarios (usuario_id, nombre, apellido, email, contrasena, fecha_nacimiento, foto_perfil) FROM stdin;
4	Juan	Perez	juanperez@gmail.com	$2y$10$nuRyUT9j1Z.KoUCeyRsx/.C/xfKR3d0kQ/qZSC8mkz.XvRXhZ0F.S	1990-01-01	\N
\.


--
-- Data for Name: usuariosroles; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.usuariosroles (rol_usuario_id, usuario_id, roles_id) FROM stdin;
\.


--
-- Data for Name: videosarchivosestudiantestareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.videosarchivosestudiantestareas (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id, duracion, calidad, extension, contenido_url) FROM stdin;
\.


--
-- Data for Name: videosarchivostareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--

COPY tbd_application.videosarchivostareas (archivo_tarea_id, tarea_id, educador_id, grupo_id, duracion, calidad, extension, contenido_url) FROM stdin;
\.


--
-- Name: archivosestudiantestareas_archivo_estudiante_tarea__seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.archivosestudiantestareas_archivo_estudiante_tarea__seq', 1, false);


--
-- Name: archivostareas_archivo_tarea_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.archivostareas_archivo_tarea_id_seq', 1, false);


--
-- Name: estudiantesgrupos_estudiante_grupo_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.estudiantesgrupos_estudiante_grupo_id_seq', 1, false);


--
-- Name: funciones_funcion_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.funciones_funcion_id_seq', 4, true);


--
-- Name: gestiones_gestion_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.gestiones_gestion_id_seq', 1, false);


--
-- Name: grupos_grupo_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.grupos_grupo_id_seq', 1, false);


--
-- Name: materias_materia_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.materias_materia_id_seq', 1, false);


--
-- Name: rel_funciones_rel_funcion_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.rel_funciones_rel_funcion_id_seq', 1, false);


--
-- Name: roles_roles_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.roles_roles_id_seq', 2, true);


--
-- Name: sesions_sesion_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: phpadmin
--

SELECT pg_catalog.setval('tbd_application.sesions_sesion_id_seq', 5, true);


--
-- Name: tareas_tarea_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.tareas_tarea_id_seq', 1, false);


--
-- Name: tipo_grupo_tipo_grupo_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.tipo_grupo_tipo_grupo_id_seq', 1, false);


--
-- Name: usuarios_usuario_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: phpadmin
--

SELECT pg_catalog.setval('tbd_application.usuarios_usuario_id_seq', 4, true);


--
-- Name: usuariosroles_rol_usuario_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.usuariosroles_rol_usuario_id_seq', 1, false);


--
-- Name: estudiantes ak_identifier_codigo__estudian; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.estudiantes
    ADD CONSTRAINT ak_identifier_codigo__estudian UNIQUE (codigo);


--
-- Name: materias ak_identifier_codigo__materias; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.materias
    ADD CONSTRAINT ak_identifier_codigo__materias UNIQUE (codigo);


--
-- Name: usuarios ak_identifier_email_usuarios; Type: CONSTRAINT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.usuarios
    ADD CONSTRAINT ak_identifier_email_usuarios UNIQUE (email);


--
-- Name: roles ak_nombres_roles_roles; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.roles
    ADD CONSTRAINT ak_nombres_roles_roles UNIQUE (nombre);


--
-- Name: archivosestudiantestareas pk_archivosestudiantestareas; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.archivosestudiantestareas
    ADD CONSTRAINT pk_archivosestudiantestareas PRIMARY KEY (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: archivostareas pk_archivostareas; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.archivostareas
    ADD CONSTRAINT pk_archivostareas PRIMARY KEY (archivo_tarea_id, tarea_id, educador_id, grupo_id);


--
-- Name: documentosarchivosestudiantesta pk_documentosarchivosestudiant; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.documentosarchivosestudiantesta
    ADD CONSTRAINT pk_documentosarchivosestudiant PRIMARY KEY (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: documentosarchivostareas pk_documentosarchivostareas; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.documentosarchivostareas
    ADD CONSTRAINT pk_documentosarchivostareas PRIMARY KEY (archivo_tarea_id, tarea_id, educador_id, grupo_id);


--
-- Name: educadores pk_educadores; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.educadores
    ADD CONSTRAINT pk_educadores PRIMARY KEY (educador_id);


--
-- Name: estudiantes pk_estudiantes; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.estudiantes
    ADD CONSTRAINT pk_estudiantes PRIMARY KEY (estudiante_id);


--
-- Name: estudiantesgrupos pk_estudiantesgrupos; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.estudiantesgrupos
    ADD CONSTRAINT pk_estudiantesgrupos PRIMARY KEY (estudiante_grupo_id, educador_id, grupo_id, estudiante_id);


--
-- Name: estudiantestareas pk_estudiantestareas; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.estudiantestareas
    ADD CONSTRAINT pk_estudiantestareas PRIMARY KEY (estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: funciones pk_funciones; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.funciones
    ADD CONSTRAINT pk_funciones PRIMARY KEY (funcion_id);


--
-- Name: gestiones pk_gestiones; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.gestiones
    ADD CONSTRAINT pk_gestiones PRIMARY KEY (gestion_id);


--
-- Name: grupos pk_grupos; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.grupos
    ADD CONSTRAINT pk_grupos PRIMARY KEY (educador_id, grupo_id);


--
-- Name: imagenesarchivosestudiantestare pk_imagenesarchivosestudiantes; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.imagenesarchivosestudiantestare
    ADD CONSTRAINT pk_imagenesarchivosestudiantes PRIMARY KEY (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: imagenesarchivostareas pk_imagenesarchivostareas; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.imagenesarchivostareas
    ADD CONSTRAINT pk_imagenesarchivostareas PRIMARY KEY (archivo_tarea_id, tarea_id, educador_id, grupo_id);


--
-- Name: materias pk_materias; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.materias
    ADD CONSTRAINT pk_materias PRIMARY KEY (materia_id);


--
-- Name: rel_funciones pk_rel_funciones; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.rel_funciones
    ADD CONSTRAINT pk_rel_funciones PRIMARY KEY (rel_funcion_id, funcion_id, roles_id);


--
-- Name: roles pk_roles; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.roles
    ADD CONSTRAINT pk_roles PRIMARY KEY (roles_id);


--
-- Name: sesions pk_sesions; Type: CONSTRAINT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.sesions
    ADD CONSTRAINT pk_sesions PRIMARY KEY (sesion_id, usuario_id);


--
-- Name: tareas pk_tareas; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.tareas
    ADD CONSTRAINT pk_tareas PRIMARY KEY (tarea_id, educador_id, grupo_id);


--
-- Name: tipo_grupo pk_tipo_grupo; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.tipo_grupo
    ADD CONSTRAINT pk_tipo_grupo PRIMARY KEY (tipo_grupo_id);


--
-- Name: usuarios pk_usuarios; Type: CONSTRAINT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.usuarios
    ADD CONSTRAINT pk_usuarios PRIMARY KEY (usuario_id);


--
-- Name: usuariosroles pk_usuariosroles; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.usuariosroles
    ADD CONSTRAINT pk_usuariosroles PRIMARY KEY (rol_usuario_id, usuario_id, roles_id);


--
-- Name: videosarchivosestudiantestareas pk_videosarchivosestudiantesta; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.videosarchivosestudiantestareas
    ADD CONSTRAINT pk_videosarchivosestudiantesta PRIMARY KEY (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: videosarchivostareas pk_videosarchivostareas; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.videosarchivostareas
    ADD CONSTRAINT pk_videosarchivostareas PRIMARY KEY (archivo_tarea_id, tarea_id, educador_id, grupo_id);


--
-- Name: archivosestudiantestareas_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX archivosestudiantestareas_pk ON tbd_application.archivosestudiantestareas USING btree (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: archivostareas_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX archivostareas_pk ON tbd_application.archivostareas USING btree (archivo_tarea_id, tarea_id, educador_id, grupo_id);


--
-- Name: clasificador_grupos_tipo_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX clasificador_grupos_tipo_fk ON tbd_application.grupos USING btree (tipo_grupo_id);


--
-- Name: compuesto_estudiante_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX compuesto_estudiante_fk ON tbd_application.estudiantestareas USING btree (estudiante_id);


--
-- Name: compuesto_tarea_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX compuesto_tarea_fk ON tbd_application.estudiantestareas USING btree (tarea_id, educador_id, grupo_id);


--
-- Name: documentosarchivosestudiantesta_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX documentosarchivosestudiantesta_pk ON tbd_application.documentosarchivosestudiantesta USING btree (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: documentosarchivostareas_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX documentosarchivostareas_pk ON tbd_application.documentosarchivostareas USING btree (archivo_tarea_id, tarea_id, educador_id, grupo_id);


--
-- Name: educadores_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX educadores_pk ON tbd_application.educadores USING btree (educador_id);


--
-- Name: estudiante_grupo_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX estudiante_grupo_fk ON tbd_application.estudiantesgrupos USING btree (estudiante_id);


--
-- Name: estudiantes_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX estudiantes_pk ON tbd_application.estudiantes USING btree (estudiante_id);


--
-- Name: estudiantesgrupos_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX estudiantesgrupos_pk ON tbd_application.estudiantesgrupos USING btree (estudiante_grupo_id, educador_id, grupo_id, estudiante_id);


--
-- Name: estudiantestareas_archivos_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX estudiantestareas_archivos_fk ON tbd_application.archivosestudiantestareas USING btree (estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: estudiantestareas_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX estudiantestareas_pk ON tbd_application.estudiantestareas USING btree (estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: funcion_rel_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX funcion_rel_fk ON tbd_application.rel_funciones USING btree (funcion_id);


--
-- Name: funciones_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX funciones_pk ON tbd_application.funciones USING btree (funcion_id);


--
-- Name: gestion_grupos_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX gestion_grupos_fk ON tbd_application.grupos USING btree (gestion_id);


--
-- Name: gestiones_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX gestiones_pk ON tbd_application.gestiones USING btree (gestion_id);


--
-- Name: grupo_estudiante_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX grupo_estudiante_fk ON tbd_application.estudiantesgrupos USING btree (educador_id, grupo_id);


--
-- Name: grupos_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX grupos_pk ON tbd_application.grupos USING btree (educador_id, grupo_id);


--
-- Name: imagenesarchivosestudiantestare_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX imagenesarchivosestudiantestare_pk ON tbd_application.imagenesarchivosestudiantestare USING btree (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: imagenesarchivostareas_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX imagenesarchivostareas_pk ON tbd_application.imagenesarchivostareas USING btree (archivo_tarea_id, tarea_id, educador_id, grupo_id);


--
-- Name: materia_grupos_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX materia_grupos_fk ON tbd_application.grupos USING btree (materia_id);


--
-- Name: materias_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX materias_pk ON tbd_application.materias USING btree (materia_id);


--
-- Name: rel_funciones_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX rel_funciones_pk ON tbd_application.rel_funciones USING btree (rel_funcion_id, funcion_id, roles_id);


--
-- Name: rol_funcion_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX rol_funcion_fk ON tbd_application.rel_funciones USING btree (roles_id);


--
-- Name: rol_usuario_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX rol_usuario_fk ON tbd_application.usuariosroles USING btree (roles_id);


--
-- Name: roles_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX roles_pk ON tbd_application.roles USING btree (roles_id);


--
-- Name: sesions_pk; Type: INDEX; Schema: tbd_application; Owner: phpadmin
--

CREATE UNIQUE INDEX sesions_pk ON tbd_application.sesions USING btree (sesion_id, usuario_id);


--
-- Name: tareas_archivos_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX tareas_archivos_fk ON tbd_application.archivostareas USING btree (tarea_id, educador_id, grupo_id);


--
-- Name: tareas_grupo_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX tareas_grupo_fk ON tbd_application.tareas USING btree (educador_id, grupo_id);


--
-- Name: tareas_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX tareas_pk ON tbd_application.tareas USING btree (tarea_id, educador_id, grupo_id);


--
-- Name: tipo_grupo_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX tipo_grupo_pk ON tbd_application.tipo_grupo USING btree (tipo_grupo_id);


--
-- Name: usuario_rol_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX usuario_rol_fk ON tbd_application.usuariosroles USING btree (usuario_id);


--
-- Name: usuario_sesion_fk; Type: INDEX; Schema: tbd_application; Owner: phpadmin
--

CREATE INDEX usuario_sesion_fk ON tbd_application.sesions USING btree (usuario_id);


--
-- Name: usuarios_hacen_grupos_fk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE INDEX usuarios_hacen_grupos_fk ON tbd_application.grupos USING btree (educador_id);


--
-- Name: usuarios_pk; Type: INDEX; Schema: tbd_application; Owner: phpadmin
--

CREATE UNIQUE INDEX usuarios_pk ON tbd_application.usuarios USING btree (usuario_id);


--
-- Name: usuariosroles_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX usuariosroles_pk ON tbd_application.usuariosroles USING btree (rol_usuario_id, usuario_id, roles_id);


--
-- Name: videosarchivosestudiantestareas_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX videosarchivosestudiantestareas_pk ON tbd_application.videosarchivosestudiantestareas USING btree (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id);


--
-- Name: videosarchivostareas_pk; Type: INDEX; Schema: tbd_application; Owner: postgres
--

CREATE UNIQUE INDEX videosarchivostareas_pk ON tbd_application.videosarchivostareas USING btree (archivo_tarea_id, tarea_id, educador_id, grupo_id);


--
-- Name: archivosestudiantestareas fk_archivos_estudiant_estudian; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.archivosestudiantestareas
    ADD CONSTRAINT fk_archivos_estudiant_estudian FOREIGN KEY (estudiante_id, tarea_id, educador_id, grupo_id) REFERENCES tbd_application.estudiantestareas(estudiante_id, tarea_id, educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: archivostareas fk_archivos_tareas_ar_tareas; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.archivostareas
    ADD CONSTRAINT fk_archivos_tareas_ar_tareas FOREIGN KEY (tarea_id, educador_id, grupo_id) REFERENCES tbd_application.tareas(tarea_id, educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: documentosarchivosestudiantesta fk_document_is_a_doc__archivos; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.documentosarchivosestudiantesta
    ADD CONSTRAINT fk_document_is_a_doc__archivos FOREIGN KEY (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id) REFERENCES tbd_application.archivosestudiantestareas(archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: documentosarchivostareas fk_document_is_a_docu_archivos; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.documentosarchivostareas
    ADD CONSTRAINT fk_document_is_a_docu_archivos FOREIGN KEY (archivo_tarea_id, tarea_id, educador_id, grupo_id) REFERENCES tbd_application.archivostareas(archivo_tarea_id, tarea_id, educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: educadores fk_educador_is_a_educ_usuarios; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.educadores
    ADD CONSTRAINT fk_educador_is_a_educ_usuarios FOREIGN KEY (educador_id) REFERENCES tbd_application.usuarios(usuario_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: estudiantestareas fk_estudian_compuesto_estudian; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.estudiantestareas
    ADD CONSTRAINT fk_estudian_compuesto_estudian FOREIGN KEY (estudiante_id) REFERENCES tbd_application.estudiantes(estudiante_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: estudiantestareas fk_estudian_compuesto_tareas; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.estudiantestareas
    ADD CONSTRAINT fk_estudian_compuesto_tareas FOREIGN KEY (tarea_id, educador_id, grupo_id) REFERENCES tbd_application.tareas(tarea_id, educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: estudiantesgrupos fk_estudian_estudiant_estudian; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.estudiantesgrupos
    ADD CONSTRAINT fk_estudian_estudiant_estudian FOREIGN KEY (estudiante_id) REFERENCES tbd_application.estudiantes(estudiante_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: estudiantesgrupos fk_estudian_grupo_est_grupos; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.estudiantesgrupos
    ADD CONSTRAINT fk_estudian_grupo_est_grupos FOREIGN KEY (educador_id, grupo_id) REFERENCES tbd_application.grupos(educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: estudiantes fk_estudian_is_a_estu_usuarios; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.estudiantes
    ADD CONSTRAINT fk_estudian_is_a_estu_usuarios FOREIGN KEY (estudiante_id) REFERENCES tbd_application.usuarios(usuario_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: grupos fk_grupos_clasifica_tipo_gru; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.grupos
    ADD CONSTRAINT fk_grupos_clasifica_tipo_gru FOREIGN KEY (tipo_grupo_id) REFERENCES tbd_application.tipo_grupo(tipo_grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: grupos fk_grupos_gestion_g_gestione; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.grupos
    ADD CONSTRAINT fk_grupos_gestion_g_gestione FOREIGN KEY (gestion_id) REFERENCES tbd_application.gestiones(gestion_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: grupos fk_grupos_materia_g_materias; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.grupos
    ADD CONSTRAINT fk_grupos_materia_g_materias FOREIGN KEY (materia_id) REFERENCES tbd_application.materias(materia_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: grupos fk_grupos_usuarios__educador; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.grupos
    ADD CONSTRAINT fk_grupos_usuarios__educador FOREIGN KEY (educador_id) REFERENCES tbd_application.educadores(educador_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: imagenesarchivostareas fk_imagenes_is_a_imag_archivos; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.imagenesarchivostareas
    ADD CONSTRAINT fk_imagenes_is_a_imag_archivos FOREIGN KEY (archivo_tarea_id, tarea_id, educador_id, grupo_id) REFERENCES tbd_application.archivostareas(archivo_tarea_id, tarea_id, educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: imagenesarchivosestudiantestare fk_imagenes_is_a_img__archivos; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.imagenesarchivosestudiantestare
    ADD CONSTRAINT fk_imagenes_is_a_img__archivos FOREIGN KEY (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id) REFERENCES tbd_application.archivosestudiantestareas(archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: rel_funciones fk_rel_func_funcion_r_funcione; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.rel_funciones
    ADD CONSTRAINT fk_rel_func_funcion_r_funcione FOREIGN KEY (funcion_id) REFERENCES tbd_application.funciones(funcion_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: rel_funciones fk_rel_func_rol_funci_roles; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.rel_funciones
    ADD CONSTRAINT fk_rel_func_rol_funci_roles FOREIGN KEY (roles_id) REFERENCES tbd_application.roles(roles_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: sesions fk_sesions_usuario_s_usuarios; Type: FK CONSTRAINT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.sesions
    ADD CONSTRAINT fk_sesions_usuario_s_usuarios FOREIGN KEY (usuario_id) REFERENCES tbd_application.usuarios(usuario_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: tareas fk_tareas_tareas_gr_grupos; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.tareas
    ADD CONSTRAINT fk_tareas_tareas_gr_grupos FOREIGN KEY (educador_id, grupo_id) REFERENCES tbd_application.grupos(educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: usuariosroles fk_usuarios_rol_usuar_roles; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.usuariosroles
    ADD CONSTRAINT fk_usuarios_rol_usuar_roles FOREIGN KEY (roles_id) REFERENCES tbd_application.roles(roles_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: usuariosroles fk_usuarios_usuario_r_usuarios; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.usuariosroles
    ADD CONSTRAINT fk_usuarios_usuario_r_usuarios FOREIGN KEY (usuario_id) REFERENCES tbd_application.usuarios(usuario_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: videosarchivosestudiantestareas fk_videosar_is_a_vide_archivos; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.videosarchivosestudiantestareas
    ADD CONSTRAINT fk_videosar_is_a_vide_archivos FOREIGN KEY (archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id) REFERENCES tbd_application.archivosestudiantestareas(archivo_estudiante_tarea_, estudiante_id, tarea_id, educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: videosarchivostareas fk_videosar_is_a_vide_archivos; Type: FK CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.videosarchivostareas
    ADD CONSTRAINT fk_videosar_is_a_vide_archivos FOREIGN KEY (archivo_tarea_id, tarea_id, educador_id, grupo_id) REFERENCES tbd_application.archivostareas(archivo_tarea_id, tarea_id, educador_id, grupo_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- PostgreSQL database dump complete
--

