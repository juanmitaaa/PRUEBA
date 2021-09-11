-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: db5004185010.hosting-data.io
-- Tiempo de generación: 11-09-2021 a las 09:00:25
-- Versión del servidor: 5.7.33-log
-- Versión de PHP: 7.0.33-0+deb9u11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbs3460367`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `lastname`, `phone`, `dni`, `email`, `created_at`, `updated_at`) VALUES
(2, 'Antonio', 'Sanchez', '7777777', '58955159H', 'antoniosanchez@yopmail.com', '2021-08-17 12:38:17', '2021-08-19 08:09:26'),
(3, 'Manolo', 'Medina', '666666666', '58955159H', 'manolomedia@yopmail.com', '2021-08-19 08:09:56', '2021-08-19 08:09:56'),
(5, 'Isa', 'Poyato Mejía', '647778545', '48878587A', 'jmedro79@gmail.com', '2021-08-22 11:33:08', '2021-08-22 11:33:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidences`
--

CREATE TABLE `incidences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warranty_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `components` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete_products` tinyint(4) DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repair_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_line_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `incidences`
--

INSERT INTO `incidences` (`id`, `warranty_period`, `components`, `complete_products`, `reason`, `repair_cost`, `state_id`, `ticket_line_id`, `created_at`, `updated_at`) VALUES
(1, '1000', 'abcdefgc', 0, NULL, NULL, 5, 5, '2021-08-21 11:07:13', '2021-08-25 09:37:32'),
(2, '100', 'abcdefg', 1, NULL, NULL, 3, 8, '2021-08-22 06:04:17', '2021-08-25 09:37:14'),
(4, 'un año', 'Cargador, caja e Instrucciones', 1, NULL, NULL, 6, 3, '2021-08-22 11:36:51', '2021-08-22 11:41:15'),
(5, NULL, NULL, 1, 'abcd', '112', 1, 7, '2021-08-23 04:52:20', '2021-08-25 09:37:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `cif`, `name`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'G03659523', 'Fabricante11', 'Avd Constitución, 11', 'fabricante11@yopmail.com', '2021-08-17 13:55:41', '2021-08-17 14:03:27'),
(3, 'G03658524', 'Fabricante2', 'Avd Diagonal, 33', 'fabricante2@yopmail.com', '2021-08-18 07:12:58', '2021-08-18 07:12:58'),
(4, 'H06462105', 'Fabricante3', 'C/Malaga, 20', 'fabricante3@yopmail.com', '2021-08-18 07:14:25', '2021-08-18 07:14:25'),
(5, 'C458774458', 'Sony España', 'Poligono los Santos S/N, Barcelona', 'sonycustomer@sony.es', '2021-08-22 11:17:44', '2021-08-22 11:27:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_08_11_135135_create_sessions_table', 1),
(9, '2021_08_14_082955_create_roles_table', 2),
(10, '2021_08_14_083049_create_states_table', 2),
(11, '2021_08_14_083050_create_customers_table', 2),
(12, '2021_08_14_083051_create_manufacturers_table', 2),
(13, '2021_08_14_083052_create_products_table', 2),
(14, '2021_08_14_083144_create_roles_users_table', 2),
(15, '2021_08_14_083229_create_tickets_table', 3),
(16, '2021_08_14_083239_create_ticket_lines_table', 4),
(17, '2021_08_14_083329_create_incidences_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ean` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `warranty` tinyint(4) NOT NULL,
  `manufacturer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `ean`, `designation`, `price`, `warranty`, `manufacturer_id`, `created_at`, `updated_at`) VALUES
(1, '11111', 'Producto1', 100.00, 1, 1, '2021-08-18 07:02:41', '2021-08-18 07:02:41'),
(2, '2222', 'Producto2', 122.00, 0, 1, '2021-08-18 07:24:44', '2021-08-18 07:24:44'),
(3, '333', 'Producto3', 101.00, 1, 1, '2021-08-18 07:25:35', '2021-08-18 07:25:35'),
(4, '444', 'Producto4', 55.00, 1, 3, '2021-08-18 07:25:52', '2021-08-18 07:25:52'),
(5, '5555', 'Producto5', 66.00, 0, 3, '2021-08-18 07:26:23', '2021-08-18 07:26:23'),
(7, '6666666', 'Producto6', 651.00, 1, 3, '2021-08-20 08:01:17', '2021-08-20 08:01:30'),
(8, '8431876055443', 'Consola Sony PS5 Standard Edition', 499.00, 1, 5, '2021-08-22 11:19:48', '2021-08-22 11:19:48'),
(9, '8431876158773', 'Consola Sony PS4 PRO', 349.00, 1, 5, '2021-08-22 11:20:55', '2021-08-22 11:22:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2021-08-15 06:51:15', '2021-08-15 06:51:15'),
(2, 'aux', 'Auxiliar', '2021-08-15 06:51:15', '2021-08-15 06:51:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-08-15 09:22:17', '2021-08-15 09:22:17'),
(15, 11, 1, NULL, NULL),
(16, 12, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gTYARzarm3l4gq2xAtRIbxv25HVVmEkPUGzvZThd', NULL, '66.249.66.90', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.119 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHVnbHpoZWNYanE5VXMxdURDVnQxeHZMcU5neThKU1ljWnZCNjBaYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9zNTcyMjQ1OTM4Lm1pYWxvamFtaWVudG8uZXMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631190834),
('5tmolbo8vxuoNPWbPiYJoQLNNpke5Yta92N53XIS', NULL, '66.249.66.89', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUmYzUE05VFBqZXVsZVBnRThxSWhPT0VGck5IM2o4M1RKbVVoVDloMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9zNTcyMjQ1OTM4Lm1pYWxvamFtaWVudG8uZXMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631190835),
('VHfqN84VH8a68jvn24hX93osELq5Pq8DxX8SfsH5', NULL, '66.249.66.90', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMm1sa0tkck5BRVdSUW9NYXdhVDF4QnZLcDQyTGk3WGhmNkdPZkV5QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9zNTcyMjQ1OTM4Lm1pYWxvamFtaWVudG8uZXMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631224649),
('4L68R99p5HCt03bYCBziDUo59Vu1XWJVkmWrybfr', NULL, '66.249.66.90', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.119 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieHY5MnhmMDBRaWplWHNlOGhnMmdhWU9XZFhDRkRTVmw0VVpSbzlLMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9zNTcyMjQ1OTM4Lm1pYWxvamFtaWVudG8uZXMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631346793),
('j0zNhAct1SEjkEoxGaEaI8U42Bgx6293QpIJeSzr', NULL, '212.89.5.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMWpTaFRiNWJGU1VOWjdNNndwY3FkTUR2OVFsd1NzN1ZMMHFhRzV6aCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9zNTcyMjQ1OTM4Lm1pYWxvamFtaWVudG8uZXMvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1631350188),
('Jo1W2Qx9pZ0n2Lh1Et1hazmzqhb2cZC2oPy2FMtN', 1, '185.36.2.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTnpNbVZyM2xsVUtrQVR6Q2hmbEYzMzJPRHU5TDZTc1lNc0V1Skh2UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9zNTcyMjQ1OTM4Lm1pYWxvamFtaWVudG8uZXMvY3VzdG9tZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFQ4Wkt3REhDZm9JdW5KT2svdnJHaU9rdnROUXdJL3QvNHgwT3d1WC5KUXZVTzlPbU11S1lhIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRUOFpLd0RIQ2ZvSXVuSk9rL3ZyR2lPa3Z0TlF3SS90LzR4ME93dVguSlF2VU85T21NdUtZYSI7fQ==', 1631350197);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Recogido', '2021-08-17 11:36:11', '2021-08-17 11:36:11'),
(3, 'En reparación', '2021-08-17 11:39:32', '2021-08-17 11:39:32'),
(5, 'En deposito', '2021-08-17 11:39:58', '2021-08-17 11:39:58'),
(6, 'Entregado', '2021-08-17 11:40:10', '2021-08-17 11:40:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(10) NOT NULL,
  `seller` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `number`, `seller`, `caja`, `purchase_at`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 100, 'vendedor11', 'caja11', '2021-08-23 06:25:24', 2, '2021-08-19 09:05:25', '2021-08-20 09:16:43'),
(2, 150, 'vendedor2', 'caja2', '2021-08-23 06:25:30', 3, '2021-08-20 08:18:30', '2021-08-20 08:18:30'),
(3, 111, 'Julian', '33', '2021-08-23 06:25:38', 5, '2021-08-22 11:54:36', '2021-08-22 11:54:36'),
(4, 222, 'vendedor12', 'caja2', '2021-08-22 22:00:00', 2, '2021-08-23 04:49:46', '2021-08-23 04:50:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_lines`
--

CREATE TABLE `ticket_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ticket_lines`
--

INSERT INTO `ticket_lines` (`id`, `ticket_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2021-08-19 09:05:25', '2021-08-19 09:05:25'),
(4, 1, 2, '2021-08-19 09:05:25', '2021-08-19 09:05:25'),
(5, 1, 4, '2021-08-19 09:05:25', '2021-08-19 09:05:25'),
(6, 2, 1, '2021-08-20 08:18:30', '2021-08-20 08:18:30'),
(7, 2, 2, '2021-08-20 08:18:30', '2021-08-20 08:18:30'),
(8, 2, 4, '2021-08-20 08:18:30', '2021-08-20 08:18:30'),
(9, 1, 5, '2021-08-20 09:16:43', '2021-08-20 09:16:43'),
(10, 1, 7, '2021-08-20 09:16:43', '2021-08-20 09:16:43'),
(11, 3, 9, '2021-08-22 11:54:36', '2021-08-22 11:54:36'),
(12, 3, 8, '2021-08-22 11:54:36', '2021-08-22 11:54:36'),
(13, 4, 2, '2021-08-23 04:49:46', '2021-08-23 04:49:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'j_medi_rome@hotmail.com', NULL, '$2y$10$T8ZKwDHCfoIunJOk/vrGiOkvtNQwI/t/4x0OwuX.JQvUO9OmMuKYa', NULL, NULL, 'I3v6fcHTiWHeNlJ80KOMesyHXNFjASvNiEBvxEBtvGXzxfgUIYslJamoQ6LR', NULL, NULL, '2021-08-11 13:13:29', '2021-08-11 13:13:29'),
(11, 'Paula', 'paula@prueba.es', NULL, '$2y$10$B45WU4vgEldrVVg26mtj9uN2AeaF/1wbApMdt/9T/KwqOg8AZkcQy', NULL, NULL, NULL, NULL, NULL, '2021-08-29 18:05:15', '2021-08-29 18:05:15'),
(12, 'Tribunal', 'tribunal@unir.net', NULL, '$2y$10$PVlhQiGdc1SOsFFZ5UyvSe7pb4XKs8087C4TPcEbjMMbjtn5dWD/y', NULL, NULL, NULL, NULL, NULL, '2021-09-07 06:33:55', '2021-09-07 06:33:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `incidences`
--
ALTER TABLE `incidences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incidences_state_id_foreign` (`state_id`),
  ADD KEY `incidences_ticket_line_id_foreign` (`ticket_line_id`);

--
-- Indices de la tabla `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_manufacturer_id_foreign` (`manufacturer_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_users_user_id_foreign` (`user_id`),
  ADD KEY `roles_users_rol_id_foreign` (`role_id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_customer_id_foreign` (`customer_id`);

--
-- Indices de la tabla `ticket_lines`
--
ALTER TABLE `ticket_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_lines_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_lines_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `incidences`
--
ALTER TABLE `incidences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ticket_lines`
--
ALTER TABLE `ticket_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidences`
--
ALTER TABLE `incidences`
  ADD CONSTRAINT `incidences_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `incidences_ticket_line_id_foreign` FOREIGN KEY (`ticket_line_id`) REFERENCES `ticket_lines` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `roles_users_rol_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `roles_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Filtros para la tabla `ticket_lines`
--
ALTER TABLE `ticket_lines`
  ADD CONSTRAINT `ticket_lines_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ticket_lines_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
