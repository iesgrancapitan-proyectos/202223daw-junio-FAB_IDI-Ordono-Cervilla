-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2023 a las 11:10:56
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fab_idi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `colaborador` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `colaborador`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL),
(2, 'embajador', NULL, NULL),
(3, 'mentor', NULL, NULL),
(4, 'instituto', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_academicos`
--

CREATE TABLE `cursos_academicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `curso_academico` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos_academicos`
--

INSERT INTO `cursos_academicos` (`id`, `curso_academico`, `created_at`, `updated_at`) VALUES
(1, '2020-2021', NULL, NULL),
(2, '2021-2022', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `representante` varchar(255) DEFAULT NULL,
  `colaborador_id` bigint(20) UNSIGNED NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`id`, `nombre`, `representante`, `colaborador_id`, `telefono`, `email`, `web`, `imagen`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'IES Jaén', NULL, 4, NULL, 'gc@gmail.com', NULL, 'entidad-default.webp', 1, '2023-06-04 05:42:30', '2023-06-04 05:42:30'),
(2, 'IES Málaga', NULL, 4, NULL, 'gc2@gmail.com', 'https://iesmartinrivero.org/', 'entidad-default.webp', 1, '2023-06-04 05:42:30', '2023-06-04 05:42:30'),
(3, 'IES Córdoba', NULL, 4, NULL, 'gc3@gmail.com', NULL, 'entidad-default.webp', 1, '2023-06-04 05:42:30', '2023-06-04 05:42:30'),
(4, 'IES Almería', NULL, 4, NULL, 'gc4@gmail.com', NULL, 'entidad-default.webp', 0, '2023-06-04 05:42:30', '2023-06-14 15:50:01'),
(5, 'IES Huelva', NULL, 4, '666666666', 'gc6@gmail.com', NULL, 'entidad-default.webp', 1, '2023-06-04 05:42:30', '2023-06-04 05:42:30'),
(6, 'IES Cádiz', NULL, 4, NULL, 'gc7@gmail.com', 'https://iesmartinrivero.org/', 'entidad-default.webp', 1, '2023-06-04 05:42:30', '2023-06-04 05:42:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `fecha`, `descripcion`, `imagen`, `url`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'evento 1', '2023-06-04', 'descripción del evento 1', 'evento-default.webp', NULL, 1, NULL, NULL),
(2, 'evento 2', '2023-06-04', 'descripción del evento 2', 'evento-default.webp', NULL, 1, NULL, NULL),
(3, 'evento 3', '2023-06-04', 'descripción del evento 3', 'evento-default.webp', NULL, 1, NULL, NULL),
(4, 'evento 4', '2023-06-04', 'descripción del evento 4', 'evento-default.webp', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_06_160750_create_videos_table', 1),
(6, '2023_05_08_172951_create_perfiles_table', 1),
(7, '2023_05_09_163504_add_foreign_key_to_users_table', 2),
(8, '2023_05_09_193635_create_colaboradores_table', 3),
(9, '2023_05_13_150902_create_users_table', 4),
(10, '2023_05_13_151843_create_colaboradores_table', 5),
(11, '2023_05_13_153153_create_usuarios_table', 6),
(12, '2023_05_13_161437_create_usuarios_table', 7),
(13, '2023_05_13_162409_create_entidades_table', 8),
(14, '2023_05_13_172941_create_users_table', 9),
(15, '2023_05_13_173203_create_users_table', 10),
(16, '2023_05_15_173113_create_colaboradores_table', 11),
(17, '2023_05_15_173345_create_colaboradores_table', 12),
(18, '2023_05_15_195132_create_colaboradores_table', 13),
(19, '2023_05_15_200157_agregar_campo_id_colaborador_a_users', 14),
(20, '2023_05_23_201552_create_premios_table', 15),
(21, '2023_06_02_173827_create_premios_table', 16),
(22, '2023_06_02_211939_create_eventos_table', 17),
(23, '2023_06_03_182005_create_entidades_table', 18),
(24, '2023_06_04_071209_create_entidades_table', 19),
(25, '2023_06_04_073824_create_entidades_table', 20),
(26, '2023_06_04_090647_create_proyectos_table', 21),
(27, '2023_06_04_092834_create_cursos_academicos', 22),
(28, '2023_06_04_093015_create_proyectos_table', 23),
(29, '2023_06_04_093411_create_tipos_proyecto_table', 24),
(30, '2023_06_04_093654_create_proyectos_table', 25),
(31, '2023_06_04_094001_create_proyectos_table', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perfil` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `perfil`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'usuario', NULL, NULL),
(3, 'mentor', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE `premios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `destacado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `premios`
--

INSERT INTO `premios` (`id`, `titulo`, `fecha`, `descripcion`, `imagen`, `url`, `activo`, `destacado`, `created_at`, `updated_at`) VALUES
(1, 'CicCartuja de Futuros Investigadores (XXI Feria de la Ciencia de Sevilla)', '2023-06-14', 'En busca de ideas para nuevas investigaciones”, han participado alumnos desde 1º de ESO hasta 1º de Bachillerato, los cuales prepararon un stand con más de 15 propuestas de distintas investigaciones.', '1.webp', 'https://cadenaser.com/andalucia/2023/05/23/el-ies-martin-rivero-consigue-el-primer-premio-ciccartuja-de-futuros-investigadores-en-la-xxi-feria-de-la-ciencia-de-sevilla-radio-coca-ser-ronda/', 1, 1, NULL, '2023-06-12 18:07:06'),
(2, 'Premio Accésit (XIII Premios Eustory)', '2023-06-16', 'Concurso de Historia para Jóvenes  obtenido por mi alumna de 4º ESO  de Cultura Científica, Ana Pascual por la obra que he tenido el placer de tutorizar \"Una mirada a la escuela de la Transición recordando a mi abuelo\"', '2.jpg', 'http://profundizaiesmartinrivero.blogspot.com/2020/12/premio-accesit-2020-en-concurso-eustory.html', 1, 1, NULL, '2023-06-11 04:53:09'),
(3, '2º Premio del Concurso Internacional Modalidad Sostenibilidad', '2023-06-14', 'Mención de honor 2º Premio del Concurso Internacional Modalidad Sostenibilidad', '3.jpg', 'https://profundizaiesmartinrivero.blogspot.com/2015/09/premios-conseguidos.html', 1, 1, NULL, '2023-06-12 18:06:23'),
(4, 'Premio de fomento de la Investigación y la Innovación Educativa', '2023-06-14', 'Marcos Naz, que hoy da clase en el IES Gran Capitán de Córdoba, ha recibido el premio de fomento de la investigación y la innovación educativa.', '4.webp', 'https://cordopolis.eldiario.es/cordoba-hoy/sociedad/docente-cordobes-multipremiado-lograr-alumnos-fabriquen-inventos-e-ideas_1_9971104.html', 1, 1, NULL, '2023-06-13 14:11:54'),
(5, 'premio 5', '2023-06-14', 'este es el premio 5', 'premio-default.webp', NULL, 1, 0, NULL, '2023-06-08 13:48:13'),
(6, 'premio 01', '2023-06-30', 'este es el premio 01', 'premio-default.webp', NULL, 1, 0, NULL, NULL),
(7, 'premio 02', '2023-06-19', 'este es el premio 02', 'premio-default.webp', NULL, 1, 0, NULL, NULL),
(8, 'premio 03', '2023-06-29', 'este es el premio 03', 'premio-default.webp', NULL, 1, 0, NULL, NULL),
(9, 'premio 04', '2023-06-22', 'este es el premio 04', 'premio-default.webp', NULL, 1, 0, NULL, NULL),
(10, 'premio 05', '2023-06-19', 'este es el premio 05', 'premio-default.webp', NULL, 1, 0, NULL, NULL),
(11, 'premio 06', '2023-06-29', 'este es el premio 06', 'premio-default.webp', NULL, 1, 0, NULL, NULL),
(12, 'premio 07', '2023-07-09', 'este es el premio 07', 'premio-default.webp', NULL, 1, 0, NULL, NULL),
(13, 'premio 08', '2023-07-05', 'este es el premio 08', 'premio-default.webp', NULL, 1, 0, NULL, NULL),
(14, 'premio 09', '2023-06-21', 'este es el premio 09', 'premio-default.webp', NULL, 1, 0, NULL, '2023-06-11 09:32:52'),
(15, 'premio 10', '2023-07-08', 'este es el premio 10', 'premio-default.webp', NULL, 1, 0, NULL, '2023-06-11 09:32:54'),
(16, 'premio 11', '2023-06-17', 'este es el premio 11', 'premio-default.webp', NULL, 1, 0, NULL, NULL),
(17, 'premio 12', '2023-06-15', 'este es el premio 12', 'premio-default.webp', NULL, 1, 0, NULL, '2023-06-11 05:22:39'),
(18, 'premio 13', '2023-06-30', 'este es el premio 13', 'premio-default.webp', NULL, 1, 0, NULL, '2023-06-12 18:06:30'),
(19, 'premio 14', '2023-06-18', 'este es el premio 14', 'premio-default.webp', NULL, 1, 0, NULL, '2023-06-11 09:32:56'),
(20, 'premio 15', '2023-06-22', 'este es el premio 15', 'premio-default.webp', NULL, 1, 0, NULL, '2023-06-11 04:59:50'),
(21, 'premio 16', '2023-06-24', 'este es el premio 16', 'premio-default.webp', NULL, 1, 0, NULL, '2023-06-12 18:06:32'),
(22, 'premio 17', '2023-06-14', 'este es el premio 17', 'premio-default.webp', NULL, 0, 0, NULL, '2023-06-13 14:11:37'),
(23, 'premio 18', '2023-06-26', 'este es el premio 18', 'premio-default.webp', NULL, 1, 0, NULL, '2023-06-12 18:06:14'),
(24, 'premio 19', '2023-06-22', 'este es el premio 19', 'premio-default.webp', NULL, 0, 0, NULL, '2023-06-13 14:11:32'),
(27, 's', '2023-06-08', 'a', 'premio-default.webp', 'https://www.google.es', 0, 0, '2023-06-11 12:50:02', '2023-06-11 12:59:34'),
(28, 's', '2023-06-09', 's', 'premio-default.webp', 'https://www.google.es', 0, 0, '2023-06-11 12:51:29', '2023-06-11 12:59:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `centro` varchar(255) DEFAULT NULL,
  `curso_academico_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_proyecto_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `destacado` varchar(255) NOT NULL DEFAULT '0',
  `disponible` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombre`, `autor`, `centro`, `curso_academico_id`, `tipo_proyecto_id`, `descripcion`, `destacado`, `disponible`, `url`, `imagen`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Proyecto PIP 1', 'autor 1', 'IES Random', 1, 2, 'Mi intención es desarrollar al máximo la investigación que se hizo de los huertos, con el objetivo de llevar a cabo diferentes alimentos como los cereales teniendo en cuenta la humedad, la temperatura, la salinidad,etc.', '0', '1', 'https://docs.google.com/document/d/1h_6awPRnumBqEAWORJp5RBnDWAoy6bEIl9q5ca6hALs/edit', 'proyecto-default.webp', 1, NULL, '2023-06-15 13:37:55'),
(2, 'Proyecto Intercentro 1', 'autor 1', 'IES Random', 1, 2, 'Esta es la descripción del proyecto', '0', '1', 'https://docs.google.com/document/d/1h_6awPRnumBqEAWORJp5RBnDWAoy6bEIl9q5ca6hALs/edit', 'proyecto-default.webp', 1, NULL, '2023-06-06 19:19:31'),
(3, 'Proyecto PIP 2', 'autor 1', 'IES Random', 1, 1, 'Mi intención es desarrollar al máximo la investigación que se hizo de los huertos, con el objetivo de llevar a cabo diferentes alimentos como los cereales teniendo en cuenta la humedad, la temperatura, la salinidad,etc.', '0', '1', 'https://docs.google.com/document/d/1h_6awPRnumBqEAWORJp5RBnDWAoy6bEIl9q5ca6hALs/edit', 'proyecto-default.webp', 1, NULL, '2023-06-11 09:27:14'),
(4, 'Proyecto Intercentro 2', 'autor 1', 'IES Random', 1, 2, 'Esta es la descripción del proyecto', '0', '1', 'https://docs.google.com/document/d/1h_6awPRnumBqEAWORJp5RBnDWAoy6bEIl9q5ca6hALs/edit', 'proyecto-default.webp', 1, NULL, '2023-06-06 16:27:17'),
(5, 'Proyecto Intercentro 3', 'autor 1', 'IES Random', 1, 2, 'Esta es la descripción del proyecto', '0', '1', 'https://docs.google.com/document/d/1h_6awPRnumBqEAWORJp5RBnDWAoy6bEIl9q5ca6hALs/edit', 'proyecto-default.webp', 1, NULL, NULL),
(6, 'Proyecto Intercentro 6', 'autor 1', 'IES Random', 1, 2, 'Esta es la descripción del proyecto', '0', '1', 'https://docs.google.com/document/d/1h_6awPRnumBqEAWORJp5RBnDWAoy6bEIl9q5ca6hALs/edit', 'proyecto-default.webp', 1, NULL, '2023-06-11 11:11:39'),
(7, 'Proyecto PIP', 'proyecto-pip-10-autor', 'proyecto-pip-10-centro', 2, 1, 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '0', '1', NULL, 'proyecto-default.webp', 1, '2023-06-06 15:37:06', '2023-06-15 13:47:02'),
(8, 'ProyectoPip', 'proyecto-pip-20-autor', 'proyecto-pip-20-centro', 2, 1, 'hh', '0', '1', NULL, 'proyecto-default.webp', 1, '2023-06-06 15:45:02', '2023-06-15 13:48:06'),
(9, 'proyecto-pip-300000000', 'proyecto-pip-30-autor', 'proyecto-pip-30-centro', 1, 1, 'z', '1', '0', NULL, '9.jpg', 1, '2023-06-06 15:55:26', '2023-06-15 13:59:54'),
(10, 'proyecto-pip-300rrrddd', 'proyecto-pip-30-autor', 'proyecto-pip-30-centro', 1, 1, 'z', '1', '1', NULL, 'proyecto-default.webp', 1, '2023-06-06 15:55:26', '2023-06-15 13:47:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_proyectos`
--

CREATE TABLE `tipos_proyectos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipos_proyectos` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_proyectos`
--

INSERT INTO `tipos_proyectos` (`id`, `tipos_proyectos`, `created_at`, `updated_at`) VALUES
(1, 'Proyecto PIP', NULL, NULL),
(2, 'Proyecto Intercentros', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `perfil_id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_colaborador` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `email`, `password`, `telefono`, `twitter`, `instagram`, `linkedin`, `perfil_id`, `imagen`, `activo`, `remember_token`, `created_at`, `updated_at`, `id_colaborador`) VALUES
(7, 'mentor2', 'mentor1apellido mentor1apellido', 'mentor2@gmail.com', '$2y$10$G/5dzQK/ii4/f8EplIKucupn6CW7yeC/bYXZW1gVxaWQzNpG0HAb6', '', '@johndoe_tweet', '@johndoe_insta', '@johndoe_linkedin', 3, 'usuario-default.webp', 0, NULL, '2023-05-13 16:06:42', '2023-05-26 07:51:33', 3),
(10, 'embajadora10', 'Apellido1 Apellido2', 'embajadora10@gmail.com', '$2y$10$4FFR5Bh/9mEWm13WXcMUMOQAAQmHC48MczAj77FW5QLSC./x77XDu', '', '@emabajadora_twitter', '@instagram', NULL, 2, 'usuario-default.webp', 1, NULL, '2023-05-13 16:12:49', '2023-05-20 05:42:25', 2),
(11, 'mentor4', 'mentor4apellido mentor4apellido', 'mentor4@gmail.com', '$2y$10$WJCXGTejwR7zFWKPCr1.AOCFsBvwEQZyQFh.GeteG3ETMCzmmS2Fq', NULL, '@twitter', NULL, NULL, 2, '11.jpg', 0, NULL, '2023-05-13 16:13:12', '2023-06-04 06:36:15', 3),
(12, 'embajador12', 'apellido1 apellido 2', 'embajador12@gmail.com', '$2y$10$FcMTz/v2i4JWFghKT31Hhu7NuwEody8c9LZlGnQi/WvZ95/76XCyW', '666666666', NULL, '@instagram', '@linkedin', 2, '12.jpg', 1, NULL, '2023-05-13 16:14:17', '2023-05-16 16:17:51', 2),
(13, 'embajador6', 'embajador6apellidos1 apellido2', 'embajador6@gmail.com', '$2y$10$WJCXGTejwR7zFWKPCr1.AOCFsBvwEQZyQFh.GeteG3ETMCzmmS2Fq', '555555555', '@twitter', NULL, NULL, 2, '13.jpg', 0, NULL, '2023-05-13 16:13:12', '2023-05-20 05:41:32', 2),
(15, 'embajador15', 'apellido1 apellido2', 'embajador15@gmail.com', '$2y$10$ja2TY5y8teyoVfpTXEux1O42ha7j4D4E2EC1SgEoRvEUtwo/BOnVS', NULL, NULL, '@instagram', NULL, 2, '15.jpg', 1, NULL, '2023-05-15 18:12:14', '2023-05-20 06:04:13', NULL),
(18, 'mentor1', 'mentor1', 'mentor1@gmail.com', '$2y$10$kEbmvLAgIyiCywuQR/gCzeDSCS/dRVwctXi4rCWaWYXEhVD/hI2Oi', '', '', '', '', 3, 'usuario-default.webp', 1, NULL, '2023-05-13 16:06:42', '2023-06-05 16:22:26', 3),
(19, 'user3', 'user3', 'user3@gmail.com', '$2y$10$IVkCwIm2Ywi9l13SzQHR/uivunHiL3mjYg9RWD3hx.h2ZR38ValLy', NULL, '@twitter', '@instagram', NULL, 1, '19.jpg', 1, NULL, '2023-06-03 15:18:28', '2023-06-14 15:53:09', NULL),
(25, 'embajador2', 'embajador2', 'embajador2@gmail.com', '$2y$10$PGQzgGb7ShHwyBcY7V.9C.Wgz3PCKv98bmnAmngQg6eaK9MBAELqa', '555555555', '@twitter', '@instagram', '@linkedin', 1, 'usuario-default.webp', 1, NULL, '2023-06-03 15:43:25', '2023-06-03 15:43:25', NULL),
(35, 'emba', 'embajador1apellido embajador1apellido', 'embajador1@gmail.com', '$2y$10$YSwm9vnfQOH1dbadHRB8hehhWb/01aAroRRSnRXjliUtk4k2WKzNG', '888 888 888', '@twitter', '@instagram', '@inkedin', 2, '35.jpg', 1, NULL, '2023-06-03 16:08:46', '2023-06-14 13:54:02', NULL),
(44, 'Marcos', 'Naz Lucena', 'admin1@gmail.com', '$2y$10$zsmNxMLWI4DYb5wOTlak2uZ0rNTT3V2JW3OMr2/s4OKt08NR73edy', '555888333', '@twitter', '@instagram', '@linkedin', 1, '44.webp', 1, NULL, '2023-06-10 06:32:09', '2023-06-10 06:32:09', NULL),
(47, 'user1', 'user1', 'user1@gmail.com', '$2y$10$w072Bw9yJRMfDa/64.VlrO8cKZLejkpYJiozzaopF1XqUqGZTkzru', NULL, NULL, '@instagram', NULL, 2, '47.jpg', 1, NULL, '2023-06-11 12:20:38', '2023-06-14 15:58:12', NULL),
(49, 'mentor56', 'apellido 1 apellido 2', 'mentor56@gmail.com', '$2y$10$Yg/EU56VvS8zh/V28PQYoOwErHXah0rpT1f4SNTsgJe7JAJnoa.Km', '666666666', '@twitter', '@instagram', NULL, 3, '49.jpg', 1, NULL, '2023-06-12 16:22:30', '2023-06-12 16:22:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `nombre`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Embajador Daniel Guerrero', 'https://www.youtube.com/embed/DLvyF6nj9bg', NULL, '2023-06-13 14:59:28'),
(2, 'Retotech IESGR', 'https://www.youtube.com/embed/nJqwNSk2U2M', NULL, '2023-06-13 15:00:01'),
(3, 'Embajadora Mar', 'https://www.youtube.com/embed/wRydVgvJwVE', NULL, '2023-06-13 15:00:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos_academicos`
--
ALTER TABLE `cursos_academicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entidades_email_unique` (`email`),
  ADD KEY `entidades_colaborador_id_foreign` (`colaborador_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyectos_curso_academico_id_foreign` (`curso_academico_id`),
  ADD KEY `proyectos_tipo_proyecto_id_foreign` (`tipo_proyecto_id`);

--
-- Indices de la tabla `tipos_proyectos`
--
ALTER TABLE `tipos_proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_perfil_id_foreign` (`perfil_id`),
  ADD KEY `users_id_colaborador_foreign` (`id_colaborador`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cursos_academicos`
--
ALTER TABLE `cursos_academicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `premios`
--
ALTER TABLE `premios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipos_proyectos`
--
ALTER TABLE `tipos_proyectos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD CONSTRAINT `entidades_colaborador_id_foreign` FOREIGN KEY (`colaborador_id`) REFERENCES `colaboradores` (`id`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_curso_academico_id_foreign` FOREIGN KEY (`curso_academico_id`) REFERENCES `cursos_academicos` (`id`),
  ADD CONSTRAINT `proyectos_tipo_proyecto_id_foreign` FOREIGN KEY (`tipo_proyecto_id`) REFERENCES `tipos_proyectos` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_colaborador_foreign` FOREIGN KEY (`id_colaborador`) REFERENCES `colaboradores` (`id`),
  ADD CONSTRAINT `users_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
