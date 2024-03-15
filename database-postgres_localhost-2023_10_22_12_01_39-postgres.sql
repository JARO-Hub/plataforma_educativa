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
-- Name: desactivar_sesiones_previas(); Type: FUNCTION; Schema: tbd_application; Owner: phpadmin
--

CREATE FUNCTION tbd_application.desactivar_sesiones_previas() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
BEGIN
    -- Desactiva las sesiones anteriores del mismo usuario
    UPDATE tbd_application.sesions
    SET estado = false
    WHERE usuario_id = NEW.usuario_id AND estado = true AND sesion_id <> NEW.sesion_id;

    /*** LOGS ***/
    CALL tbd_application.log_registro_generico(NEW.usuario_id, 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions SET estado = false WHERE usuario_id ='|| NEW.usuario_id || ' AND estado = true AND sesion_id <>'|| NEW.sesion_id||';', 'eL usuario ' || NEW.usuario_id || ' ha iniciado sesión');

    -- Devuelve el registro actual para que la inserción continúe
    RETURN NEW;
END;
$$;


ALTER FUNCTION tbd_application.desactivar_sesiones_previas() OWNER TO phpadmin;

--
-- Name: get_accionesbyrol(integer, integer); Type: FUNCTION; Schema: tbd_application; Owner: phpadmin
--

CREATE FUNCTION tbd_application.get_accionesbyrol(p_rol_id integer, p_usuario_id integer) RETURNS TABLE(nombre_funcion character varying)
    LANGUAGE plpgsql
    AS $$
BEGIN
    RETURN QUERY
    SELECT f.nombre AS nombre_funcion
    FROM tbd_application.funciones f
        INNER JOIN
        tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id
    WHERE rf.roles_id = p_rol_id;

    CALL tbd_application.log_registro_generico(p_usuario_id, 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol');
END;
$$;


ALTER FUNCTION tbd_application.get_accionesbyrol(p_rol_id integer, p_usuario_id integer) OWNER TO phpadmin;

--
-- Name: get_rol(integer); Type: FUNCTION; Schema: tbd_application; Owner: phpadmin
--

CREATE FUNCTION tbd_application.get_rol(p_usuario_id integer) RETURNS TABLE(roles_id integer, nombre character varying, descripcion text)
    LANGUAGE plpgsql
    AS $$
BEGIN
    RETURN QUERY
    SELECT v_r_u.roles_id, v_r_u.nombre, v_r_u.descripcion  FROM tbd_application.view_roles_usuario v_r_u
    WHERE v_r_u.usuario_id = p_usuario_id;

END;
$$;


ALTER FUNCTION tbd_application.get_rol(p_usuario_id integer) OWNER TO phpadmin;

--
-- Name: log_registro_generico(bigint, character varying, character varying, text, text); Type: PROCEDURE; Schema: tbd_application; Owner: phpadmin
--

CREATE PROCEDURE tbd_application.log_registro_generico(pm_id_usuario bigint, pm_nombre_funcion character varying, pm_operacion character varying, pm_consulta text, pm_descripcion text)
    LANGUAGE plpgsql
    AS $$
DECLARE
    v_ip_usuario INET;
    v_anio_actual INTEGER;
    v_mes_actual INTEGER;
    v_nombre_tabla_log VARCHAR;
    v_existe_tabla INTEGER;
    v_crear_tabla TEXT;
    v_crear_secuencia TEXT;
    v_consulta_dinamica TEXT;
BEGIN
    --  IP del cliente
    v_ip_usuario := inet_client_addr();

    -- Determina el mes y año actuales
    SELECT extract(YEAR FROM current_date) INTO v_anio_actual;
    SELECT extract(MONTH FROM current_date) INTO v_mes_actual;

    --sanitizamos las comillas simples en pm_consulta y pm_descripcion
    pm_consulta := replace(pm_consulta, '''', '''''');
    pm_descripcion := replace(pm_descripcion, '''', '''''');

    -- Define el nombre de la tabla de bitácora basado en el mes y año actuales
    v_nombre_tabla_log := 'log_tbd_application_' || v_anio_actual || '_' || v_mes_actual;

    -- Verifica si la tabla ya existe
    SELECT COUNT(*) INTO v_existe_tabla
    FROM pg_tables
    WHERE tablename = v_nombre_tabla_log;

    -- Si la tabla no existe, la crea
    IF v_existe_tabla = 0 THEN
        v_crear_tabla := 'CREATE TABLE tbd_application.' || v_nombre_tabla_log || ' (
            id_log_evento BIGSERIAL NOT NULL,
            id_usuario BIGINT NOT NULL,
            ip_usuario INET NOT NULL,
            funcion VARCHAR(100) NOT NULL,
            operacion VARCHAR(10) NOT NULL,
            consulta_ejecutada TEXT NOT NULL,
            descripcion_log TEXT NOT NULL,
            fecha_reg DATE NOT NULL,
            hora_reg TIME NOT NULL,
            CONSTRAINT pk_' || v_nombre_tabla_log || ' PRIMARY KEY (id_log_evento)
        )';
        EXECUTE v_crear_tabla;

        v_crear_secuencia := 'CREATE SEQUENCE tbd_application.' || v_nombre_tabla_log || '_seq START 1';
        EXECUTE v_crear_secuencia;
    END IF;

    -- Inserta el registro en la tabla de bitácora del mes actual
    v_consulta_dinamica := 'INSERT INTO tbd_application.' || v_nombre_tabla_log ||
    ' (id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg)
    VALUES
    (' || pm_id_usuario || ', ''' || v_ip_usuario || ''', ''' || pm_nombre_funcion || ''', ''' || pm_operacion || ''', ''' || pm_consulta || ''', ''' || pm_descripcion || ''', CURRENT_DATE, CURRENT_TIME)';
    EXECUTE v_consulta_dinamica;
END;
$$;


ALTER PROCEDURE tbd_application.log_registro_generico(pm_id_usuario bigint, pm_nombre_funcion character varying, pm_operacion character varying, pm_consulta text, pm_descripcion text) OWNER TO phpadmin;

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

    /*** LOG ***/
    CALL tbd_application.log_registro_generico(user_id, 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario ' || user_id || ' con el pid ' || client_pid);


    RETURN hashed_pid;


END;
$$;


ALTER FUNCTION tbd_application.register_session(user_id integer, client_pid integer) OWNER TO phpadmin;

--
-- Name: tiene_permiso(integer, integer, character varying, character); Type: FUNCTION; Schema: tbd_application; Owner: phpadmin
--

CREATE FUNCTION tbd_application.tiene_permiso(p_usuario_id integer, p_rol_id integer, p_funcion_nombre character varying, p_operacion character) RETURNS boolean
    LANGUAGE plpgsql
    AS $$
DECLARE
    permiso boolean := false;
BEGIN
    SELECT CASE
        WHEN p_operacion = 'c' AND rf.c = 'c' THEN TRUE
        WHEN p_operacion = 'r' AND rf.r = 'r' THEN TRUE
        WHEN p_operacion = 'u' AND rf.u = 'u' THEN TRUE
        WHEN p_operacion = 'd' AND rf.d = 'd' THEN TRUE
        ELSE FALSE
    END INTO permiso
    FROM tbd_application.rel_funciones rf
    INNER JOIN tbd_application.funciones f ON f.funcion_id = rf.funcion_id
    WHERE rf.roles_id = p_rol_id AND f.nombre = p_funcion_nombre;

    /*** LOG ***/
    CALL tbd_application.log_registro_generico(p_usuario_id, 'tiene_permiso', 'SELECT', 'SELECT CASE
        WHEN p_operacion = ''c'' AND rf.c = ''c'' THEN TRUE
        WHEN p_operacion = ''r'' AND rf.r = ''r'' THEN TRUE
        WHEN p_operacion = ''u'' AND rf.u = ''u'' THEN TRUE
        WHEN p_operacion = ''d'' AND rf.d = ''d'' THEN TRUE
        ELSE FALSE
    END INTO permiso',  'Se valida si el usuario tiene permiso para realizar la operacion ' || p_operacion || ' en la funcion ' || p_funcion_nombre || ' con el rol ' || p_rol_id);


    RETURN CASE
               WHEN permiso IS NOT NULL THEN permiso
               ELSE false
        END;
END;
$$;


ALTER FUNCTION tbd_application.tiene_permiso(p_usuario_id integer, p_rol_id integer, p_funcion_nombre character varying, p_operacion character) OWNER TO phpadmin;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: roles; Type: TABLE; Schema: tbd_application; Owner: phpadmin
--

CREATE TABLE tbd_application.roles (
    roles_id integer NOT NULL,
    nombre character varying(100),
    descripcion text
);


ALTER TABLE tbd_application.roles OWNER TO phpadmin;

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
-- Name: usuariosroles; Type: TABLE; Schema: tbd_application; Owner: phpadmin
--

CREATE TABLE tbd_application.usuariosroles (
    rol_usuario_id integer NOT NULL,
    usuario_id integer NOT NULL,
    roles_id integer NOT NULL
);


ALTER TABLE tbd_application.usuariosroles OWNER TO phpadmin;

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
-- Name: funciones; Type: TABLE; Schema: tbd_application; Owner: phpadmin
--

CREATE TABLE tbd_application.funciones (
    funcion_id integer NOT NULL,
    nombre character varying(255),
    descripcion text,
    procedimiento boolean DEFAULT false,
    funcion boolean DEFAULT false
);


ALTER TABLE tbd_application.funciones OWNER TO phpadmin;

--
-- Name: funciones_funcion_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: phpadmin
--

CREATE SEQUENCE tbd_application.funciones_funcion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.funciones_funcion_id_seq OWNER TO phpadmin;

--
-- Name: funciones_funcion_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: phpadmin
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
-- Name: log_tbd_application_2023_10; Type: TABLE; Schema: tbd_application; Owner: phpadmin
--

CREATE TABLE tbd_application.log_tbd_application_2023_10 (
    id_log_evento bigint NOT NULL,
    id_usuario bigint NOT NULL,
    ip_usuario inet NOT NULL,
    funcion character varying(100) NOT NULL,
    operacion character varying(10) NOT NULL,
    consulta_ejecutada text NOT NULL,
    descripcion_log text NOT NULL,
    fecha_reg date NOT NULL,
    hora_reg time without time zone NOT NULL
);


ALTER TABLE tbd_application.log_tbd_application_2023_10 OWNER TO phpadmin;

--
-- Name: log_tbd_application_2023_10_id_log_evento_seq; Type: SEQUENCE; Schema: tbd_application; Owner: phpadmin
--

CREATE SEQUENCE tbd_application.log_tbd_application_2023_10_id_log_evento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.log_tbd_application_2023_10_id_log_evento_seq OWNER TO phpadmin;

--
-- Name: log_tbd_application_2023_10_id_log_evento_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: phpadmin
--

ALTER SEQUENCE tbd_application.log_tbd_application_2023_10_id_log_evento_seq OWNED BY tbd_application.log_tbd_application_2023_10.id_log_evento;


--
-- Name: log_tbd_application_2023_10_seq; Type: SEQUENCE; Schema: tbd_application; Owner: phpadmin
--

CREATE SEQUENCE tbd_application.log_tbd_application_2023_10_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.log_tbd_application_2023_10_seq OWNER TO phpadmin;

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
-- Name: rel_funciones; Type: TABLE; Schema: tbd_application; Owner: phpadmin
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


ALTER TABLE tbd_application.rel_funciones OWNER TO phpadmin;

--
-- Name: rel_funciones_rel_funcion_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: phpadmin
--

CREATE SEQUENCE tbd_application.rel_funciones_rel_funcion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.rel_funciones_rel_funcion_id_seq OWNER TO phpadmin;

--
-- Name: rel_funciones_rel_funcion_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: phpadmin
--

ALTER SEQUENCE tbd_application.rel_funciones_rel_funcion_id_seq OWNED BY tbd_application.rel_funciones.rel_funcion_id;


--
-- Name: roles_roles_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: phpadmin
--

CREATE SEQUENCE tbd_application.roles_roles_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.roles_roles_id_seq OWNER TO phpadmin;

--
-- Name: roles_roles_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: phpadmin
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
-- Name: usuariosroles_rol_usuario_id_seq; Type: SEQUENCE; Schema: tbd_application; Owner: phpadmin
--

CREATE SEQUENCE tbd_application.usuariosroles_rol_usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tbd_application.usuariosroles_rol_usuario_id_seq OWNER TO phpadmin;

--
-- Name: usuariosroles_rol_usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: tbd_application; Owner: phpadmin
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
-- Name: view_roles_usuario; Type: VIEW; Schema: tbd_application; Owner: phpadmin
--

CREATE VIEW tbd_application.view_roles_usuario AS
 SELECT r.roles_id,
    r.nombre,
    r.descripcion,
    u.usuario_id
   FROM ((tbd_application.roles r
     JOIN tbd_application.usuariosroles ur ON ((r.roles_id = ur.roles_id)))
     JOIN tbd_application.usuarios u ON ((u.usuario_id = ur.usuario_id)));


ALTER TABLE tbd_application.view_roles_usuario OWNER TO phpadmin;

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
-- Name: funciones funcion_id; Type: DEFAULT; Schema: tbd_application; Owner: phpadmin
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
-- Name: log_tbd_application_2023_10 id_log_evento; Type: DEFAULT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.log_tbd_application_2023_10 ALTER COLUMN id_log_evento SET DEFAULT nextval('tbd_application.log_tbd_application_2023_10_id_log_evento_seq'::regclass);


--
-- Name: materias materia_id; Type: DEFAULT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.materias ALTER COLUMN materia_id SET DEFAULT nextval('tbd_application.materias_materia_id_seq'::regclass);


--
-- Name: rel_funciones rel_funcion_id; Type: DEFAULT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.rel_funciones ALTER COLUMN rel_funcion_id SET DEFAULT nextval('tbd_application.rel_funciones_rel_funcion_id_seq'::regclass);


--
-- Name: roles roles_id; Type: DEFAULT; Schema: tbd_application; Owner: phpadmin
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
-- Name: usuariosroles rol_usuario_id; Type: DEFAULT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.usuariosroles ALTER COLUMN rol_usuario_id SET DEFAULT nextval('tbd_application.usuariosroles_rol_usuario_id_seq'::regclass);


--
-- Data for Name: archivosestudiantestareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: archivostareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: documentosarchivosestudiantesta; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: documentosarchivostareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: educadores; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: estudiantes; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: estudiantesgrupos; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: estudiantestareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: funciones; Type: TABLE DATA; Schema: tbd_application; Owner: phpadmin
--

INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (1, 'tareas', '"Entity-Type" encargada del historico de <tareas> de un <educador>', false, false);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (2, 'grupos', '"Entity-Type" encargada del historico de <grupos> de un <educador>', false, false);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (3, 'estudiantestareas', '"Entity-Type" encargada del historico de <tareas> de un <estudiante>', false, false);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (4, 'estudiantesgrupos', '"Entity-Type" encargada del historico de <grupos> de un <estudiante>', false, false);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (5, 'get_rol', '"Function" encargada de leer los <roles> de un <usuario> registrado', false, true);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (6, 'register_session', '"Function" de registrar las <sesiones> de un <usuario> ', false, true);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (7, 'get_AccionesByRol', '"Funcion" encargada de leer las <funciones> de un <rol>', false, true);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (9, 'get_TareasByGrupo', '"Funcion" encargada de leer las <tareas> de un <grupo>', false, true);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (10, 'set_TareasEnUnGrupo', '"Procedure" encargada de registrar <tareas> en un <grupo>', true, false);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (11, 'set_TareaEstudiante', '"Procedure" encargada de registrar <tareasestudiantes>', true, false);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (8, 'get_Grupos', '"Funcion" encargada de leer los <grupos> de un <educador>', false, true);
INSERT INTO tbd_application.funciones (funcion_id, nombre, descripcion, procedimiento, funcion) VALUES (12, 'get_GruposEstudiantes', '"Funcion" encargada de leer los <grupos> de un <estudiante>', false, true);


--
-- Data for Name: gestiones; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: grupos; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: imagenesarchivosestudiantestare; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: imagenesarchivostareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: log_tbd_application_2023_10; Type: TABLE DATA; Schema: tbd_application; Owner: phpadmin
--

INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (1, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''juanperez@gmail.com''', 'Consulta de usuarios por email', '2023-10-15', '22:07:23.354859');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (2, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''juanperez@gmail.com''', 'Consulta de usuarios por email', '2023-10-15', '22:10:20.003616');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (3, 4, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions', 'eL usuario 4 ha iniciado sesión', '2023-10-15', '22:10:23.210384');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (4, 4, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 4 con el pid 20128', '2023-10-15', '22:10:23.210384');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (5, 4, '::1', 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol', '2023-10-15', '22:10:32.242492');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (6, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''juanperez@gmail.com''', 'Consulta de usuarios por email', '2023-10-15', '22:16:50.697862');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (7, 4, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions', 'eL usuario 4 ha iniciado sesión', '2023-10-15', '22:16:50.786116');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (8, 4, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 4 con el pid 26284', '2023-10-15', '22:16:50.786116');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (9, 4, '::1', 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol', '2023-10-15', '22:16:51.286696');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (10, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''marceloflores@gmail.com''', 'Consulta de usuarios por email', '2023-10-15', '22:17:56.632319');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (11, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''marceloflores@gmail.com''', 'Consulta de usuarios por email', '2023-10-15', '22:18:05.919727');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (12, 5, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions', 'eL usuario 5 ha iniciado sesión', '2023-10-15', '22:18:06.010761');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (13, 5, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 5 con el pid 21660', '2023-10-15', '22:18:06.010761');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (14, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''marceloflores@gmail.com''', 'Consulta de usuarios por email', '2023-10-15', '22:19:10.039376');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (15, 5, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions', 'eL usuario 5 ha iniciado sesión', '2023-10-15', '22:19:10.129318');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (16, 5, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 5 con el pid 17736', '2023-10-15', '22:19:10.129318');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (17, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''marceloflores@gmail.com''', 'Consulta de usuarios por email', '2023-10-15', '22:19:14.185807');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (18, 5, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions', 'eL usuario 5 ha iniciado sesión', '2023-10-15', '22:19:14.282759');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (19, 5, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 5 con el pid 21484', '2023-10-15', '22:19:14.282759');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (20, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''marceloflores@gmail.com''', 'Consulta de usuarios por email', '2023-10-15', '22:20:45.785844');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (21, 5, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions', 'eL usuario 5 ha iniciado sesión', '2023-10-15', '22:20:45.879732');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (22, 5, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 5 con el pid 28496', '2023-10-15', '22:20:45.879732');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (23, 5, '::1', 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol', '2023-10-15', '22:20:46.38128');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (24, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''juanperez@gmail.com''', 'Consulta de usuarios por email', '2023-10-15', '22:29:58.414382');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (25, 4, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions', 'eL usuario 4 ha iniciado sesión', '2023-10-15', '22:29:58.504417');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (26, 4, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 4 con el pid 31420', '2023-10-15', '22:29:58.504417');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (27, 4, '::1', 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol', '2023-10-15', '22:29:59.792026');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (28, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''juanperez@gmail.com''', 'Consulta de usuarios por email', '2023-10-16', '07:16:37.759253');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (29, 4, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions', 'eL usuario 4 ha iniciado sesión', '2023-10-16', '07:16:37.867571');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (30, 4, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 4 con el pid 4844', '2023-10-16', '07:16:37.867571');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (31, 4, '::1', 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol', '2023-10-16', '07:16:38.3627');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (32, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''juanperez@gmail.com''', 'Consulta de usuarios por email', '2023-10-16', '07:20:15.524092');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (33, 4, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions', 'eL usuario 4 ha iniciado sesión', '2023-10-16', '07:20:15.634855');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (34, 4, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 4 con el pid 26588', '2023-10-16', '07:20:15.634855');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (35, 4, '::1', 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol', '2023-10-16', '07:20:16.133733');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (36, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''marceloflores@gmail.com''', 'Consulta de usuarios por email', '2023-10-16', '07:20:49.896016');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (37, 5, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions', 'eL usuario 5 ha iniciado sesión', '2023-10-16', '07:20:50.002467');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (38, 5, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 5 con el pid 20580', '2023-10-16', '07:20:50.002467');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (39, 5, '::1', 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol', '2023-10-16', '07:20:50.50189');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (40, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''juanperez@gmail.com''', 'Consulta de usuarios por email', '2023-10-22', '10:40:50.711287');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (41, 4, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions SET estado = false WHERE usuario_id =4 AND estado = true AND sesion_id <>42;', 'eL usuario 4 ha iniciado sesión', '2023-10-22', '10:40:50.882659');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (42, 4, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 4 con el pid 7468', '2023-10-22', '10:40:50.882659');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (43, 4, '::1', 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol', '2023-10-22', '10:40:51.451763');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (44, 4, '::1', 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol', '2023-10-22', '10:41:01.631908');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (45, 0, '::1', 'usuarios', 'SELECT', 'SELECT * FROM tbd_application.usuarios WHERE email = ''juanperez@gmail.com''', 'Consulta de usuarios por email', '2023-10-22', '10:44:57.00579');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (46, 4, '::1', 'desactivar_sesiones_previas', 'UPDATE', 'UPDATE tbd_application.sesions SET estado = false WHERE usuario_id =4 AND estado = true AND sesion_id <>43;', 'eL usuario 4 ha iniciado sesión', '2023-10-22', '10:44:57.11461');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (47, 4, '::1', 'register_session', 'INSERT', 'INSERT INTO tbd_application.sesions(usuario_id, pid, estado, fecha, hora ) VALUES(user_id, client_pid, true, current_date, current_time);', 'Se registro una nueva sesion para el usuario 4 con el pid 27392', '2023-10-22', '10:44:57.11461');
INSERT INTO tbd_application.log_tbd_application_2023_10 (id_log_evento, id_usuario, ip_usuario, funcion, operacion, consulta_ejecutada, descripcion_log, fecha_reg, hora_reg) VALUES (48, 4, '::1', 'get_accionesbyrol', 'SELECT', 'SELECT f.nombre AS nombre_funcion FROM tbd_application.funciones f INNER JOIN tbd_application.rel_funciones rf on f.funcion_id = rf.funcion_id WHERE rf.roles_id = p_rol_id;', 'Obtiene las acciones de un rol', '2023-10-22', '10:44:57.616505');


--
-- Data for Name: materias; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: rel_funciones; Type: TABLE DATA; Schema: tbd_application; Owner: phpadmin
--

INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 1, 5, 1, NULL, 'r', NULL, NULL);
INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 2, 5, 2, NULL, 'r', NULL, NULL);
INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 3, 6, 1, 'c', NULL, NULL, NULL);
INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 4, 6, 2, 'c', NULL, NULL, NULL);
INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 5, 7, 1, NULL, 'r', NULL, NULL);
INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 6, 7, 2, NULL, 'r', NULL, NULL);
INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 7, 8, 2, NULL, 'r', NULL, NULL);
INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 8, 9, 2, NULL, 'r', NULL, NULL);
INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 9, 10, 2, 'c', NULL, NULL, NULL);
INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 10, 11, 1, 'c', NULL, NULL, NULL);
INSERT INTO tbd_application.rel_funciones (estado, rel_funcion_id, funcion_id, roles_id, c, r, u, d) VALUES (NULL, 11, 12, 1, NULL, 'r', NULL, NULL);


--
-- Data for Name: roles; Type: TABLE DATA; Schema: tbd_application; Owner: phpadmin
--

INSERT INTO tbd_application.roles (roles_id, nombre, descripcion) VALUES (1, 'estudiante', 'Rol de un usuario que es un "Estudiante"');
INSERT INTO tbd_application.roles (roles_id, nombre, descripcion) VALUES (2, 'educador', 'Rol de un usuario que es un "Educador"');


--
-- Data for Name: sesions; Type: TABLE DATA; Schema: tbd_application; Owner: phpadmin
--

INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (3, 4, 27044, false, '2023-10-13', '12:30:13.420872');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (4, 4, 28092, false, '2023-10-13', '12:36:06.878947');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (5, 4, 27860, false, '2023-10-13', '13:41:05.998622');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (6, 4, 20768, false, '2023-10-14', '21:16:27.456088');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (7, 4, 13728, false, '2023-10-14', '21:19:16.958217');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (8, 4, 28856, false, '2023-10-14', '21:21:02.550664');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (9, 4, 28924, false, '2023-10-14', '21:25:44.047136');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (10, 4, 268, false, '2023-10-14', '21:27:46.791196');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (11, 4, 22444, false, '2023-10-14', '21:34:51.506453');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (12, 4, 20172, false, '2023-10-14', '22:55:30.519505');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (13, 4, 12892, false, '2023-10-14', '23:04:57.791059');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (14, 4, 30684, false, '2023-10-14', '23:08:45.978951');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (15, 4, 11460, false, '2023-10-14', '23:09:13.797918');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (16, 4, 25484, false, '2023-10-14', '23:09:50.104024');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (17, 4, 19364, false, '2023-10-14', '23:15:50.279418');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (18, 4, 26996, false, '2023-10-14', '23:18:31.934777');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (19, 4, 21672, false, '2023-10-14', '23:25:43.167844');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (20, 4, 30996, false, '2023-10-15', '18:06:08.423981');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (21, 4, 31676, false, '2023-10-15', '18:06:45.897289');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (22, 4, 17184, false, '2023-10-15', '18:07:37.54212');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (23, 4, 24088, false, '2023-10-15', '18:07:45.583946');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (24, 4, 29652, false, '2023-10-15', '18:08:35.696755');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (25, 4, 31584, false, '2023-10-15', '18:10:44.80105');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (26, 4, 23736, false, '2023-10-15', '18:18:45.448429');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (27, 4, 13680, false, '2023-10-15', '18:22:23.512532');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (28, 4, 21376, false, '2023-10-15', '18:24:11.112392');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (29, 4, 26160, false, '2023-10-15', '18:26:17.708742');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (30, 4, 3284, false, '2023-10-15', '18:28:12.098653');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (31, 4, 28968, false, '2023-10-15', '18:28:35.065633');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (32, 4, 20128, false, '2023-10-15', '22:10:23.210384');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (33, 4, 26284, false, '2023-10-15', '22:16:50.786116');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (34, 5, 21660, false, '2023-10-15', '22:18:06.010761');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (35, 5, 17736, false, '2023-10-15', '22:19:10.129318');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (36, 5, 21484, false, '2023-10-15', '22:19:14.282759');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (37, 5, 28496, false, '2023-10-15', '22:20:45.879732');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (38, 4, 31420, false, '2023-10-15', '22:29:58.504417');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (39, 4, 4844, false, '2023-10-16', '07:16:37.867571');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (40, 4, 26588, false, '2023-10-16', '07:20:15.634855');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (41, 5, 20580, false, '2023-10-16', '07:20:50.002467');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (43, 4, 27392, true, '2023-10-22', '10:44:57.11461');
INSERT INTO tbd_application.sesions (sesion_id, usuario_id, pid, estado, fecha, hora) VALUES (42, 4, 7468, false, '2023-10-22', '10:40:50.882659');


--
-- Data for Name: tareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: tipo_grupo; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: tbd_application; Owner: phpadmin
--

INSERT INTO tbd_application.usuarios (usuario_id, nombre, apellido, email, contrasena, fecha_nacimiento, foto_perfil) VALUES (4, 'Juan', 'Perez', 'juanperez@gmail.com', '$2y$10$nuRyUT9j1Z.KoUCeyRsx/.C/xfKR3d0kQ/qZSC8mkz.XvRXhZ0F.S', '1990-01-01', NULL);
INSERT INTO tbd_application.usuarios (usuario_id, nombre, apellido, email, contrasena, fecha_nacimiento, foto_perfil) VALUES (5, 'Marcelo', 'Flores', 'marceloflores@gmail.com', '$2y$10$nuRyUT9j1Z.KoUCeyRsx/.C/xfKR3d0kQ/qZSC8mkz.XvRXhZ0F.S', '1974-06-06', NULL);


--
-- Data for Name: usuariosroles; Type: TABLE DATA; Schema: tbd_application; Owner: phpadmin
--

INSERT INTO tbd_application.usuariosroles (rol_usuario_id, usuario_id, roles_id) VALUES (1, 4, 1);
INSERT INTO tbd_application.usuariosroles (rol_usuario_id, usuario_id, roles_id) VALUES (2, 5, 2);


--
-- Data for Name: videosarchivosestudiantestareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



--
-- Data for Name: videosarchivostareas; Type: TABLE DATA; Schema: tbd_application; Owner: postgres
--



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
-- Name: funciones_funcion_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: phpadmin
--

SELECT pg_catalog.setval('tbd_application.funciones_funcion_id_seq', 12, true);


--
-- Name: gestiones_gestion_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.gestiones_gestion_id_seq', 1, false);


--
-- Name: grupos_grupo_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.grupos_grupo_id_seq', 1, false);


--
-- Name: log_tbd_application_2023_10_id_log_evento_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: phpadmin
--

SELECT pg_catalog.setval('tbd_application.log_tbd_application_2023_10_id_log_evento_seq', 48, true);


--
-- Name: log_tbd_application_2023_10_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: phpadmin
--

SELECT pg_catalog.setval('tbd_application.log_tbd_application_2023_10_seq', 1, false);


--
-- Name: materias_materia_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: postgres
--

SELECT pg_catalog.setval('tbd_application.materias_materia_id_seq', 1, false);


--
-- Name: rel_funciones_rel_funcion_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: phpadmin
--

SELECT pg_catalog.setval('tbd_application.rel_funciones_rel_funcion_id_seq', 11, true);


--
-- Name: roles_roles_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: phpadmin
--

SELECT pg_catalog.setval('tbd_application.roles_roles_id_seq', 2, true);


--
-- Name: sesions_sesion_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: phpadmin
--

SELECT pg_catalog.setval('tbd_application.sesions_sesion_id_seq', 43, true);


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

SELECT pg_catalog.setval('tbd_application.usuarios_usuario_id_seq', 5, true);


--
-- Name: usuariosroles_rol_usuario_id_seq; Type: SEQUENCE SET; Schema: tbd_application; Owner: phpadmin
--

SELECT pg_catalog.setval('tbd_application.usuariosroles_rol_usuario_id_seq', 2, true);


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
-- Name: roles ak_nombres_roles_roles; Type: CONSTRAINT; Schema: tbd_application; Owner: phpadmin
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
-- Name: funciones pk_funciones_nombre; Type: CONSTRAINT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.funciones
    ADD CONSTRAINT pk_funciones_nombre UNIQUE (nombre);


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
-- Name: log_tbd_application_2023_10 pk_log_tbd_application_2023_10; Type: CONSTRAINT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.log_tbd_application_2023_10
    ADD CONSTRAINT pk_log_tbd_application_2023_10 PRIMARY KEY (id_log_evento);


--
-- Name: materias pk_materias; Type: CONSTRAINT; Schema: tbd_application; Owner: postgres
--

ALTER TABLE ONLY tbd_application.materias
    ADD CONSTRAINT pk_materias PRIMARY KEY (materia_id);


--
-- Name: funciones pk_nombre; Type: CONSTRAINT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.funciones
    ADD CONSTRAINT pk_nombre PRIMARY KEY (funcion_id);


--
-- Name: rel_funciones pk_rel_funciones; Type: CONSTRAINT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.rel_funciones
    ADD CONSTRAINT pk_rel_funciones PRIMARY KEY (rel_funcion_id, funcion_id, roles_id);


--
-- Name: roles pk_roles; Type: CONSTRAINT; Schema: tbd_application; Owner: phpadmin
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
-- Name: usuariosroles pk_usuariosroles; Type: CONSTRAINT; Schema: tbd_application; Owner: phpadmin
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
-- Name: funcion_rel_fk; Type: INDEX; Schema: tbd_application; Owner: phpadmin
--

CREATE INDEX funcion_rel_fk ON tbd_application.rel_funciones USING btree (funcion_id);


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
-- Name: rel_funciones_pk; Type: INDEX; Schema: tbd_application; Owner: phpadmin
--

CREATE UNIQUE INDEX rel_funciones_pk ON tbd_application.rel_funciones USING btree (rel_funcion_id, funcion_id, roles_id);


--
-- Name: rol_funcion_fk; Type: INDEX; Schema: tbd_application; Owner: phpadmin
--

CREATE INDEX rol_funcion_fk ON tbd_application.rel_funciones USING btree (roles_id);


--
-- Name: rol_usuario_fk; Type: INDEX; Schema: tbd_application; Owner: phpadmin
--

CREATE INDEX rol_usuario_fk ON tbd_application.usuariosroles USING btree (roles_id);


--
-- Name: roles_pk; Type: INDEX; Schema: tbd_application; Owner: phpadmin
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
-- Name: usuario_rol_fk; Type: INDEX; Schema: tbd_application; Owner: phpadmin
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
-- Name: usuariosroles_pk; Type: INDEX; Schema: tbd_application; Owner: phpadmin
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
-- Name: sesions trg_desactivar_sesiones_previas; Type: TRIGGER; Schema: tbd_application; Owner: phpadmin
--

CREATE TRIGGER trg_desactivar_sesiones_previas AFTER INSERT ON tbd_application.sesions FOR EACH ROW EXECUTE PROCEDURE tbd_application.desactivar_sesiones_previas();


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
-- Name: rel_funciones fk_rel_func_funcion_r_funcione; Type: FK CONSTRAINT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.rel_funciones
    ADD CONSTRAINT fk_rel_func_funcion_r_funcione FOREIGN KEY (funcion_id) REFERENCES tbd_application.funciones(funcion_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: rel_funciones fk_rel_func_rol_funci_roles; Type: FK CONSTRAINT; Schema: tbd_application; Owner: phpadmin
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
-- Name: usuariosroles fk_usuarios_rol_usuar_roles; Type: FK CONSTRAINT; Schema: tbd_application; Owner: phpadmin
--

ALTER TABLE ONLY tbd_application.usuariosroles
    ADD CONSTRAINT fk_usuarios_rol_usuar_roles FOREIGN KEY (roles_id) REFERENCES tbd_application.roles(roles_id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- Name: usuariosroles fk_usuarios_usuario_r_usuarios; Type: FK CONSTRAINT; Schema: tbd_application; Owner: phpadmin
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

