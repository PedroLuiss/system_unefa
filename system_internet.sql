-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 04:17:14
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `system_internet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_plan_estudio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `code`, `name`, `num_plan_estudio`, `created_at`, `updated_at`) VALUES
(1, '1326D', 'Ingeniería Sistemas - Diurno', 44, NULL, NULL),
(2, '1322D', 'Ingenieria Electrica - Diurno', 1, NULL, NULL),
(3, '1320D', 'Ingenieria Agronomia - Diurno', 35, NULL, NULL),
(4, '1309D', 'Licenciado/a Administracion - Diurno', 15, NULL, NULL),
(5, '1303D', 'TSU ENFERMERIA', 3, NULL, NULL),
(6, '1310D', 'Licenciado/a Economia - Diurno', 17, NULL, NULL),
(7, '1326N', 'Ingeniería Sistemas - Nocturno', 45, NULL, NULL),
(8, '1322N', 'Ingenieria Electrica - Nocturno', 2, NULL, NULL),
(9, '1309N', 'Licenciado/a Administracion - Nocturno', 16, NULL, NULL),
(10, '1310N', 'Licenciado/a Economia - Nocturno', 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento_servicio_comunitarios`
--

CREATE TABLE `documento_servicio_comunitarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checket` tinyint(1) NOT NULL DEFAULT 0,
  `fase` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documento_servicio_comunitarios`
--

INSERT INTO `documento_servicio_comunitarios` (`id`, `documento`, `checket`, `fase`, `created_at`, `updated_at`) VALUES
(1, 'CARPETA MARRON CON GANCHO TAMAÑO OFICIO CON ETIQUETA IDENTIFICADA DEL GRUPO DEL ANTEPROYECTO.', 0, 1, NULL, NULL),
(2, 'CARTA DE COMPROMISO DE LOS ESTUDIANTES.', 0, 1, NULL, NULL),
(3, 'PLANILLA DE INSCRIPCIÓN AL SERVICIO COMUNITARIO. (SC1)', 0, 1, NULL, NULL),
(4, 'CARTA DE ACEPTACI N DEL TUTOR ACAO MICO. (SCI-A).', 0, 1, NULL, NULL),
(5, 'CARTA DE ACEPTACION DEL TUTOR COMUNITARIO PARA LA PRESTACIÓN DE SERVICIO COMUNITARIO DEL ESTUDIANTE UNEFISTA (SCI-B).', 0, 1, NULL, NULL),
(6, 'CARTA DE POSTULACION.', 0, 1, NULL, NULL),
(7, 'DATOS DE LA TITUCION/ COMUNIDAD.', 0, 1, NULL, NULL),
(8, 'PLANILLA DE DATOS PERSONALES (CADA ESTUDIANTES DEL GRUPO).', 0, 1, NULL, NULL),
(9, 'FOTOCOPIA DE LA CÉDULA DE IDENTIDAD. (CADA ESTUDIANTES DEL GRUPO).', 0, 1, NULL, NULL),
(10, 'FOTOCOPIA DE LA PLANILLA DE INSCRIPCION GENERADA POR EL SICEU. CADA ESTUDIANTES DEL GRUPO).', 0, 1, NULL, NULL),
(11, 'RECORD ACADÉMICO. (CADA ESTUDIANTES DEL GRUPO).', 0, 1, NULL, NULL),
(12, '1er DIAGNOSTICO DE LA COMUNIDAD.', 0, 1, NULL, NULL),
(13, 'CONTRAPORTADA DEL ANTEPROYECTO.', 0, 1, NULL, NULL),
(14, 'PORTADA DEL ANTEPROYECTO.', 0, 1, NULL, NULL),
(15, 'NDICE.', 0, 1, NULL, NULL),
(16, 'PLANTEAMIENTO DEL PROBLEMA.', 0, 1, NULL, NULL),
(17, 'JUSTIFICACIÓN.', 0, 1, NULL, NULL),
(18, 'OBJETIVO GENERAL.', 0, 1, NULL, NULL),
(19, 'OBJETIVO ESPECIFICOS.', 0, 1, NULL, NULL),
(20, 'METAS.', 0, 1, NULL, NULL),
(21, 'COBERTURA GEOGRAFICA Y POBLACIÓN.', 0, 1, NULL, NULL),
(22, 'RESEÑA HISTORICA.', 0, 1, NULL, NULL),
(23, 'CUADRO DE ACTIVIDADES. ', 0, 1, NULL, NULL),
(24, 'RECURSOS. ', 0, 1, NULL, NULL),
(25, 'TIEMPOS.', 0, 1, NULL, NULL),
(26, 'DIAGRAMA DE GANTT. FIRMADA Y SELLADA POR LA COMUNIDAD/INSTITUCON.', 0, 1, NULL, NULL),
(27, 'DIAGNOSTICO DE LA COMUNIDAD. (1er DIAGNOSTICO DE LA COMUNIDAD). ', 0, 1, NULL, NULL),
(28, 'ARBOL DEL PROBLEMA.', 0, 1, NULL, NULL),
(29, 'ARBOL DEL OBJETIVOS.', 0, 1, NULL, NULL),
(30, 'CONTROL DE ASISTENCIA A TUTORIAS.', 0, 1, NULL, NULL),
(31, 'SINOPSIS DEL ANTEPROYECTO DEL SERVICIO COMUNITARIO.', 0, 1, NULL, NULL),
(32, 'CERTIFICADO DE REVISIÓN DEL ANTEPROYECTO FÍSICO (FIRMADO POR 32 EL TUTOR ACADÉMICO .', 0, 1, NULL, NULL),
(33, 'ACTA DE CONSIGNACION MENSUAL DE CONTROL DE ASISTENCIA Y EVALUACIÓN DE RENDIMIENTO (SC.2) MES DE _', 0, 2, NULL, NULL),
(34, 'PLANILLA DE CONTROL DE ASISTENCIA AL SERVICIO COMUNITARIO (SC.3) MES DE _', 0, 2, NULL, NULL),
(35, 'PLANILLA DE EVALUACIÓN MENSUAL DE RENDIMIENTO (SC.4) MES DE _ ', 0, 2, NULL, NULL),
(36, 'ACTA DE CONSIGNACIÓN MENSUAL DE CONTROL DE ASISTENCIA Y EVALUACION DE RENDIMIENTO (SC.2) MES DE _', 0, 2, NULL, NULL),
(37, 'PLANILLA DE CONTROL DE ASISTENCIA AL SERVICIO COMUNITARIO (SC.3) MES DE _', 0, 2, NULL, NULL),
(38, 'PLANILLA DE EVALUACION MENSUAL DE RENDIMIENTO (SC.4) MES DE _', 0, 2, NULL, NULL),
(39, 'ACTA DE CONSIGNACIÓN MENSUAL DE CONTROL DE ASISTENCIA Y EVALUACION DE RENDIMIENTO (SC.2) MES DE _', 0, 2, NULL, NULL),
(40, 'PLANILLA DE CONTROL DE ASISTENCIA AL SERVICIO COMUNITARIO (SC.3) MES DE _', 0, 2, NULL, NULL),
(41, 'PLANILLA DE EVALUACIÓN MENSUAL DE RENDIMIENTO (SC.4) MES DE _', 0, 2, NULL, NULL),
(42, 'ACTA DE CULMINACIÓN DE SERVICIO COMUNITARIO (SC.5) (consta de 4 páginas) ', 0, 2, NULL, NULL),
(43, 'PLANILLA DE ACTA DE CULMINACIÓN DEL SERVICIO COMUNITARIO (SC.6) (consta de 2 páginas)', 0, 2, NULL, NULL),
(44, 'CERTIFICADO DE REVISIÓN DE PROYECTO FINAL DIGITAL (FIRMADO POR EL TUTOR ACADÉMICO)', 0, 2, NULL, NULL),
(45, 'DESCRIPCION DE LAS ACTIVIDADES EJECUTADAS.', 0, 2, NULL, NULL),
(46, 'POBLACIÓN BENEFICIARIA.', 0, 2, NULL, NULL),
(47, 'IMPACTO GENERADO EN LA COMUNIDAD.', 0, 2, NULL, NULL),
(48, 'APORTES DEL PROYECTO.', 0, 2, NULL, NULL),
(49, 'MEMORIA FOTOGRAFICA DEL PROYECTO.', 0, 2, NULL, NULL),
(50, 'CONCLUSIONES Y RECOMENDACIONES.', 0, 2, NULL, NULL),
(51, 'BIBLIOGRAFIA.', 0, 2, NULL, NULL),
(52, 'ANEXOS.', 0, 2, NULL, NULL),
(53, 'RESUMEN DEL PROYECTO FINAL DE SERVICIO COMUNITARIO.', 0, 2, NULL, NULL),
(54, 'PROYECTO EN FORMATO DIGITAL (CD) (Caratula Rotulada).', 0, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantecomunitarios`
--

CREATE TABLE `estudiantecomunitarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estudiantes_id` bigint(20) UNSIGNED NOT NULL,
  `semestre` int(11) DEFAULT NULL,
  `turno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `all_fase` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'true->saber si esta viendo las dos fases, false-> solo una fase',
  `fase` int(11) NOT NULL DEFAULT 1 COMMENT '1= Face N1, 2=Face N2, 3=Completado',
  `nota_one` double DEFAULT NULL COMMENT 'La nota de la fase 1',
  `nota_twe` double DEFAULT NULL COMMENT 'La nota de la fase 2',
  `observacion_fase_one` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion_fase_twe` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiene_grupo` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Saber si tiene un grupo false:No, True:Ss',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombres` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segundo_apellido` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carreras_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fe_ingreso` date DEFAULT NULL,
  `inicio_programa` date DEFAULT NULL,
  `sexo` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sanguineo` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edo_civil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nucleo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etnia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discapacidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fe_nac` date DEFAULT NULL,
  `lugar_nac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_hab` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_cel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string_sevicio_comunitario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `turno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recorrido` tinyint(1) NOT NULL DEFAULT 0,
  `import_control` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `cedula`, `nombres`, `primer_apellido`, `segundo_apellido`, `carreras_id`, `fe_ingreso`, `inicio_programa`, `sexo`, `sanguineo`, `edo_civil`, `condicion`, `nucleo`, `etnia`, `discapacidad`, `pais`, `fe_nac`, `lugar_nac`, `ciudad`, `direccion`, `tel_hab`, `tel_cel`, `email`, `string_sevicio_comunitario`, `turno`, `recorrido`, `import_control`, `created_at`, `updated_at`) VALUES
(1, '29851361', 'Pedro Luis', 'Rodiguez', 'Rojas', '1', '2016-01-05', '2016-01-24', 'MASCULINO', 'O+', 'SOLTERO', 'CIVIL', 'LARA', 'OTROS GRUPOS', 'SIN DISCAPACIDAD', 'VENEZUELA', '1997-12-28', 'TUREN', 'PORTUGUEZA', 'La ruezga sur', '02519288938', '0412-0421765', 'Peluisrodriguez2@gmail.com', NULL, NULL, 0, 0, NULL, NULL),
(2, '26846596', 'Glomarys Alexandra', 'Guedez', 'Peña', '1', '2016-01-05', '2016-05-24', 'FEMENINO', 'O+', 'SOLTERO', 'CIVIL', 'LARA', 'OTROS GRUPOS', 'SIN DISCAPACIDAD', 'VENEZUELA', '1998-07-16', 'HOSPITAL CENTRAL ESTADO LARA', 'BARQUISIMETO', 'la nueva lucha', '02514439001', '0412-5360016', 'glomarysguedez.la@gmail.com', NULL, NULL, 0, 0, NULL, NULL),
(3, '26399566', 'Yixon Smith', 'Montes', 'Mendoza', '1', '2015-09-24', '2015-09-28', 'MASCULINO', 'O+', 'SOLTERO', 'CIVIL', 'LARA', 'OTROS GRUPOS', 'SIN DISCAPACIDAD', 'VENEZUELA', '1998-02-24', 'HOSPITAL CENTRAL ESTADO LARA', 'BARQUISIMETO', 'Los cerrajones', '02514437323', '0426-3583821', 'yixon2011@gmail.com', NULL, NULL, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedientes`
--

CREATE TABLE `expedientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estudiantes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `progres` int(11) NOT NULL DEFAULT 0,
  `carpeta_student` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente_files`
--

CREATE TABLE `expediente_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expedientes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `estudiantes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_documento_servicio_comunitarios`
--

CREATE TABLE `grupo_documento_servicio_comunitarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documento_servicio_comunitario_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Id de la tabla documentos servicio comunitario',
  `grupo_s_c_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Id de la tabla grupo_s_c',
  `checket` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_s_c_estudiantes`
--

CREATE TABLE `grupo_s_c_estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupo_s_c_id` bigint(20) UNSIGNED DEFAULT NULL,
  `estudiantes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `observaciones` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota_eno` double(8,2) DEFAULT NULL,
  `nota_two` double(8,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `reprobo` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_s_c_files`
--

CREATE TABLE `grupo_s_c_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grupo_s_c_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fase` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_s_c_s`
--

CREATE TABLE `grupo_s_c_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profesore_id` bigint(20) UNSIGNED DEFAULT NULL,
  `carrera_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nombre_proyecto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_comunidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nombre de la comunidad o institucional',
  `nombre_tutor_comunitario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nombre del tutor comunitario',
  `cedula_tutor_comunitario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'cedula del tutor comunitario',
  `telefono_tutor_comunitario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'telefono del tutor comunitario',
  `vinc_project_planes_prog` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'VINCULACIÓN DEL PROYECTO CON LOS PLANES, PROGRAMAS  Y/O PROYECTOS, ESTABLECIDOS POR EL EJECUTIVO NACIONA',
  `area_accion_project` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'INDIQUE ÁREA DE ACCIÓN DEL PROYECTO (AMBIENTAL, SOCIOPRODUCTIVO, TECNOLOGICO, SOCIAL, EDUCATIVO, SOCIO-COMUNITARIO, ENTRE OTROS) SOLO COLOCAR UN NOMBRE',
  `cant_beneficiados` int(11) NOT NULL DEFAULT 0 COMMENT 'CANTIDAD DE BENEFICIADOS (SOLO NÚMEROS)',
  `foros` tinyint(1) NOT NULL DEFAULT 0,
  `charlas` tinyint(1) NOT NULL DEFAULT 0,
  `jornadas` tinyint(1) NOT NULL DEFAULT 0,
  `talleres` tinyint(1) NOT NULL DEFAULT 0,
  `campanas` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Campañas',
  `reunion_misiones` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'REUNIÓN CON MISIONES',
  `ferias` tinyint(1) NOT NULL DEFAULT 0,
  `alianzas_estrategicas` tinyint(1) NOT NULL DEFAULT 0,
  `direccion_comunidad` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'La direccion de la comunidad',
  `estado` int(11) NOT NULL COMMENT '0 = pendiente, 1 = Finalizado',
  `total_studiante` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1= Face N1, 2=Face N2, 3=Completado',
  `archivo_subido` tinyint(1) NOT NULL DEFAULT 0,
  `nota_evaluada_one` tinyint(1) NOT NULL DEFAULT 0,
  `nota_evaluada_twe` tinyint(1) NOT NULL DEFAULT 0,
  `exportar_exel` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_02_020530_create_estudiantes_table', 1),
(6, '2022_06_05_034252_create_expedientes_table', 1),
(7, '2022_06_05_034655_create_expediente_files_table', 1),
(8, '2022_06_05_040224_create_carreras_table', 1),
(9, '2022_06_05_043451_create_temp_file_expedientes_table', 1),
(10, '2023_01_16_024143_create_profesores_table', 1),
(11, '2023_01_16_032648_create_grupo_s_c_s_table', 1),
(12, '2023_01_16_033724_create_grupo_s_c_estudiantes_table', 1),
(13, '2023_01_16_034421_create_grupo_s_c_files_table', 1),
(14, '2023_01_22_024344_create_temp_grupo_s_c_estudiantes_table', 1),
(15, '2023_01_31_042048_create_estudiantecomunitarios_table', 1),
(16, '2023_03_04_024626_create_permission_tables', 1),
(17, '2023_04_28_020619_create_documento_servicio_comunitarios_table', 1),
(18, '2023_04_28_021101_create_grupo_documento_servicio_comunitarios_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permission_index', 'web', '2023-05-29 06:43:06', '2023-05-29 06:43:06'),
(2, 'permission_create', 'web', '2023-05-29 06:43:06', '2023-05-29 06:43:06'),
(3, 'permission_show', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(4, 'permission_edit', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(5, 'permission_destroy', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(6, 'role_index', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(7, 'role_create', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(8, 'role_show', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(9, 'role_edit', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(10, 'role_destroy', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(11, 'user_index', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(12, 'user_create', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(13, 'user_show', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(14, 'user_edit', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(15, 'user_destroy', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(16, 'post_index', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(17, 'post_create', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(18, 'post_show', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(19, 'post_edit', 'web', '2023-05-29 06:43:07', '2023-05-29 06:43:07'),
(20, 'post_destroy', 'web', '2023-05-29 06:43:08', '2023-05-29 06:43:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_perfil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'INDIQUE SI ES ADMINISTRATIVO Ó DOCENTE',
  `tipo_perfil_unidad_admi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'EN CASO DE SER ADMINISTRATIVO INDIQUE UNIDAD A LA QUE PERTENECE',
  `tipo_perfil_unidad_doce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'EN CASO DE SER DOCENTE INDIQUE LA CATEGORÍA',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `cedula`, `nombre`, `email`, `primer_apellido`, `segundo_apellido`, `especialidad`, `tipo_perfil`, `tipo_perfil_unidad_admi`, `tipo_perfil_unidad_doce`, `created_at`, `updated_at`) VALUES
(1, '12343568', 'Eduar', '1@gmail.com', 'Pereira', 'Rojas', 'Ingenieria Sistema', NULL, NULL, NULL, NULL, NULL),
(2, '26846596', 'Jose', '1@gmail.com', 'guzman', 'Peña', 'Ingenieria Sistema', NULL, NULL, NULL, NULL, NULL),
(3, '4234563', 'Edecio', '1@gmail.com', 'Freitez', 'Mendoza', 'Ingenieria Electrica', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-05-29 06:43:08', '2023-05-29 06:43:08'),
(2, 'User', 'web', '2023-05-29 06:43:08', '2023-05-29 06:43:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_file_expedientes`
--

CREATE TABLE `temp_file_expedientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_log` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_grupo_s_c_estudiantes`
--

CREATE TABLE `temp_grupo_s_c_estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estudiantes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cedula`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '4151265461', NULL, '$2y$10$KsoadPwPD7hHP5XdQMe9becNCPppVkvpjcwNj10Eln5P55jUvodxS', NULL, '2023-05-29 06:43:10', '2023-05-29 06:43:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documento_servicio_comunitarios`
--
ALTER TABLE `documento_servicio_comunitarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantecomunitarios`
--
ALTER TABLE `estudiantecomunitarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expedientes_estudiantes_id_foreign` (`estudiantes_id`);

--
-- Indices de la tabla `expediente_files`
--
ALTER TABLE `expediente_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expediente_files_expedientes_id_foreign` (`expedientes_id`),
  ADD KEY `expediente_files_estudiantes_id_foreign` (`estudiantes_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `grupo_documento_servicio_comunitarios`
--
ALTER TABLE `grupo_documento_servicio_comunitarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_s_c_estudiantes`
--
ALTER TABLE `grupo_s_c_estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_s_c_files`
--
ALTER TABLE `grupo_s_c_files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_s_c_s`
--
ALTER TABLE `grupo_s_c_s`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `temp_file_expedientes`
--
ALTER TABLE `temp_file_expedientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temp_grupo_s_c_estudiantes`
--
ALTER TABLE `temp_grupo_s_c_estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_cedula_unique` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `documento_servicio_comunitarios`
--
ALTER TABLE `documento_servicio_comunitarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `estudiantecomunitarios`
--
ALTER TABLE `estudiantecomunitarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `expedientes`
--
ALTER TABLE `expedientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `expediente_files`
--
ALTER TABLE `expediente_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_documento_servicio_comunitarios`
--
ALTER TABLE `grupo_documento_servicio_comunitarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_s_c_estudiantes`
--
ALTER TABLE `grupo_s_c_estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_s_c_files`
--
ALTER TABLE `grupo_s_c_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_s_c_s`
--
ALTER TABLE `grupo_s_c_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `temp_file_expedientes`
--
ALTER TABLE `temp_file_expedientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temp_grupo_s_c_estudiantes`
--
ALTER TABLE `temp_grupo_s_c_estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `expedientes`
--
ALTER TABLE `expedientes`
  ADD CONSTRAINT `expedientes_estudiantes_id_foreign` FOREIGN KEY (`estudiantes_id`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `expediente_files`
--
ALTER TABLE `expediente_files`
  ADD CONSTRAINT `expediente_files_estudiantes_id_foreign` FOREIGN KEY (`estudiantes_id`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expediente_files_expedientes_id_foreign` FOREIGN KEY (`expedientes_id`) REFERENCES `expedientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
