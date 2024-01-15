-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-01-2024 a las 05:09:25
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reserve`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adminauths`
--

CREATE TABLE `adminauths` (
  `id` int NOT NULL,
  `name` text COLLATE utf8mb4_bin,
  `description` text COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `adminauths`
--

INSERT INTO `adminauths` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Approved', 'Manager approved', NULL, NULL),
(2, 'Reviewing', 'Manager reviewing', NULL, NULL),
(3, 'Rejected', 'Manager rejected', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commonareas`
--

CREATE TABLE `commonareas` (
  `id` int NOT NULL,
  `name` text COLLATE utf8mb4_bin,
  `description` text COLLATE utf8mb4_bin,
  `capacity` int DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `commonareas`
--

INSERT INTO `commonareas` (`id`, `name`, `description`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'Salon', 'Multiple uses salon', 150, '2024-01-09 10:48:24', '2024-01-09 10:48:45'),
(2, 'Pool', 'Common use Pool', 20, '2024-01-09 10:49:19', '2024-01-09 10:49:19'),
(3, 'Barbeque spot', 'Open barbeque spot ', 30, '2024-01-09 10:49:58', '2024-01-09 10:49:58'),
(4, 'Oudoor basketball court', 'Oudoor basketball spot ', 60, '2024-01-11 08:49:42', '2024-01-11 08:49:42'),
(5, 'Parking lot', 'Car use parking lot', 200, '2024-01-14 03:28:59', '2024-01-14 03:28:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int NOT NULL,
  `users_id` int NOT NULL,
  `commonareas_id` int DEFAULT NULL,
  `status_id` int NOT NULL,
  `files_id` int DEFAULT NULL,
  `adminauths_id` int DEFAULT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `users_id`, `commonareas_id`, `status_id`, `files_id`, `adminauths_id`, `title`, `descripcion`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, NULL, 1, 'Mike\'s new job celebrtion', 'Mike inhson got a new job , celebration', '2024-01-09 00:00:00', '2024-01-11 00:00:00', '2024-01-11 09:04:16', '2024-01-15 07:15:01'),
(7, 1, 1, 1, 5, 2, 'Jennifer XVparty', 'XV years party', '2024-01-01 00:00:00', '2024-01-03 00:00:00', '2024-01-15 02:46:39', '2024-01-15 10:30:40'),
(8, 1, 4, 1, 4, 2, 'Jason birthday pary', 'The party will be after a basketball game , that why w need the open court', '2024-01-03 00:00:00', '2024-01-06 00:00:00', '2024-01-15 02:48:15', '2024-01-15 10:29:55'),
(9, 1, 5, 1, 3, 1, 'Fernando wedding party', 'Wedding party for 53 persons', '2024-01-14 00:00:00', '2024-01-14 23:59:00', '2024-01-15 02:58:24', '2024-01-15 10:23:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `connection` text COLLATE utf8mb4_bin NOT NULL,
  `queue` text COLLATE utf8mb4_bin NOT NULL,
  `payload` longtext COLLATE utf8mb4_bin NOT NULL,
  `exception` longtext COLLATE utf8mb4_bin NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` bigint UNSIGNED NOT NULL,
  `file_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `file_extension` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `file_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `file_name`, `file_extension`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'CV_JLERO.pdf', 'pdf', 'storage/receipts//Tb0sNw9lBKOUpUOivNFztZSq5vCD0Ij9Oaq1WDC9.pdf', '2024-01-15 10:20:48', '2024-01-15 10:20:48'),
(2, 'CV_JLERO.pdf', 'pdf', 'storage/receipts//8hnmJrD2DBbxrwTXyY7UNdlheuhiFvG9ZC4NBOUp.pdf', '2024-01-15 10:21:28', '2024-01-15 10:21:28'),
(3, 'CV_JLERO.pdf', 'pdf', 'storage/receipts//7DQkpgdXQXEkK4cXWc8cb3OSStYSDO4kS0Per18L.pdf', '2024-01-15 10:23:34', '2024-01-15 10:23:34'),
(4, 'CV_JLERO.pdf', 'pdf', 'storage/receipts//Zu1aLxQNs0zIgpeSQEYwD2rtnbIxZ7ITNjgocgK5.pdf', '2024-01-15 10:29:54', '2024-01-15 10:29:54'),
(5, 'Resumen_1640231910.pdf', 'pdf', 'storage/receipts//FLmCCXHag7e9jsDx1QbAuliaobuClM5xLnspilrH.pdf', '2024-01-15 10:30:40', '2024-01-15 10:30:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_01_07_185352_create_permission_tables', 2),
(7, '2024_01_10_032500_create_events_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'users.index', 'web', '2024-01-08 02:43:24', '2024-01-08 02:43:24'),
(2, 'permissions.index', 'web', '2024-01-08 02:43:58', '2024-01-08 02:43:58'),
(3, 'roles.index', 'web', '2024-01-08 02:48:10', '2024-01-08 02:48:10'),
(4, 'dashboard.index', 'web', '2024-01-08 02:50:48', '2024-01-08 02:50:48'),
(5, 'commonareas.index', 'web', '2024-01-08 02:51:15', '2024-01-08 02:51:15'),
(6, 'guests.index', 'web', '2024-01-08 02:51:31', '2024-01-08 08:46:32'),
(7, 'receipts.index', 'web', '2024-01-08 10:53:13', '2024-01-08 10:53:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_bin NOT NULL,
  `abilities` text COLLATE utf8mb4_bin,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-01-08 09:12:06', '2024-01-08 09:12:06'),
(2, 'user', 'web', '2024-01-08 10:12:29', '2024-01-08 10:12:29'),
(3, 'manager', 'web', '2024-01-08 10:12:50', '2024-01-08 10:12:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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
(7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `description` text COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Succeed', 'If you hve already paid for te reservation', NULL, '2024-01-15 08:47:48'),
(2, 'Pending', 'If you don\'t make the reservation payment', NULL, '2024-01-15 08:48:11'),
(3, 'Failed', 'Diddn\'t pay and reservation cancelled ', NULL, '2024-01-15 08:48:40'),
(4, 'Rejected', 'Manager deny action', NULL, NULL),
(5, 'Reviewing', 'Manager reviewing', NULL, NULL),
(6, 'Approved', 'Manager Approvation\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jose Luis Eduardo Ramirez Ortiz', 'jlramez@gmail.com', NULL, '$2y$12$r/Ee/iNNZNxM6HwlarqBw.IFsBPMM1CSNvRNu1CsWrc2mUL9wd7f.', NULL, '2024-01-07 08:26:40', '2024-01-08 09:16:24'),
(2, 'Jason Smith', 'jason.smith@gmail.com', NULL, '$2y$12$tz7TK1uWo3VmsBEY5ZFHau0RCjmY8w8fz9pkVWnkG3UTjrYKXBs.i', NULL, '2024-01-12 10:26:16', '2024-01-12 10:27:24'),
(3, 'Richard Nava', 'rich.nava@gmail.com', NULL, '$2y$12$BN3bpwhyFG6ipIHXsnk2zOVCCt/M/RO.Ygiuz1sE4LGmTDzsG/Zna', NULL, '2024-01-12 10:28:24', '2024-01-12 10:29:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adminauths`
--
ALTER TABLE `adminauths`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `commonareas`
--
ALTER TABLE `commonareas`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `files`
--
ALTER TABLE `files`
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
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_team_id_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adminauths`
--
ALTER TABLE `adminauths`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `commonareas`
--
ALTER TABLE `commonareas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

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
