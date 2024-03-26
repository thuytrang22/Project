-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 25, 2024 lúc 03:42 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_order` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `order_id`, `status`, `total_order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '19', '0', '45000', '2024-03-06 13:12:18', '2024-03-06 12:45:54', '2024-03-06 13:12:18'),
(2, '17', '1', '45000', NULL, '2024-03-06 13:13:05', '2024-03-24 09:30:58'),
(3, '8', '1', '45000', NULL, '2024-03-06 13:13:24', '2024-03-06 13:15:38'),
(4, '32', '1', '45000', NULL, '2024-03-06 19:35:09', '2024-03-24 09:30:33'),
(5, '34', '1', '180000', NULL, '2024-03-06 19:40:16', '2024-03-06 19:40:42'),
(6, '36', '1', '99000', NULL, '2024-03-23 18:49:39', '2024-03-23 20:06:53'),
(7, '33', '1', '49500', NULL, '2024-03-24 01:05:38', '2024-03-24 09:30:07'),
(8, '29', '0', '0', NULL, '2024-03-24 01:47:04', '2024-03-24 01:47:04'),
(9, '30', '1', '0', NULL, '2024-03-24 01:47:17', '2024-03-24 09:30:23'),
(10, '31', '1', '49500', NULL, '2024-03-24 01:47:31', '2024-03-24 09:30:17'),
(11, '28', '1', '0', NULL, '2024-03-24 01:48:21', '2024-03-24 09:30:11'),
(12, '35', '1', '66000', NULL, '2024-03-24 01:55:16', '2024-03-24 09:29:55'),
(13, '27', '1', '0', NULL, '2024-03-24 02:08:04', '2024-03-24 09:29:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `people` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `seating_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `booking_date`, `time`, `message`, `created_at`, `updated_at`, `people`, `status`, `seating_id`) VALUES
(1, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:22', 'fdgf', '2024-02-20 09:53:13', '2024-02-20 09:53:13', 2, 0, ''),
(2, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:20', 'test', '2024-02-21 19:25:09', '2024-02-21 19:25:09', 1, 0, ''),
(3, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-03-06', '00:00', 'tôi muốn đặt bàn', '2024-03-06 19:25:31', '2024-03-06 19:25:31', 6, 0, ''),
(4, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-03-06', '00:00', 'tôi muốn đặt bàn', '2024-03-06 19:25:50', '2024-03-06 19:25:50', 6, 0, ''),
(5, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-01-11', '11:11', 'gg', '2024-03-09 18:21:19', '2024-03-17 10:40:47', 5, 0, 'B3'),
(6, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-02-12', '14:30', 'kkk\r\nlll', '2024-03-15 08:09:12', '2024-03-17 10:52:08', 12, 1, 'Chọn bàn'),
(7, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-03-22', '11:11', '111', '2024-03-18 07:35:48', '2024-03-18 07:35:48', 10, NULL, NULL),
(8, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:11', 'ccc', '2024-03-18 07:37:19', '2024-03-18 07:37:19', 10, NULL, NULL),
(9, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:01', 'dd', '2024-03-18 07:39:32', '2024-03-18 07:39:32', 12, NULL, NULL),
(10, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '1111-11-11', '11:11', '11', '2024-03-18 07:40:40', '2024-03-18 07:40:40', 11, NULL, NULL),
(11, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:11', 'fdfsff', '2024-03-18 07:42:16', '2024-03-18 07:42:16', 11, NULL, NULL),
(12, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:11', 'fdfsff', '2024-03-18 07:45:14', '2024-03-18 07:45:14', 11, NULL, NULL),
(13, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '1111-11-11', '11:11', 'a', '2024-03-18 07:47:23', '2024-03-18 07:47:23', 11, NULL, NULL),
(14, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '1111-11-11', '11:11', '1111', '2024-03-18 07:48:29', '2024-03-18 07:48:29', 11, NULL, NULL),
(15, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:11', '11111', '2024-03-18 07:51:25', '2024-03-18 07:51:25', 11, NULL, NULL),
(16, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-03-31', '14:22', 'vvvbvcbvcn', '2024-03-18 07:53:28', '2024-03-18 07:53:28', 4, NULL, NULL),
(17, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:11', 'gggg', '2024-03-18 08:08:25', '2024-03-18 08:08:25', 10, NULL, NULL),
(18, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2025-02-22', '11:11', 'dđ', '2024-03-18 08:12:40', '2024-03-18 08:12:40', 3, NULL, NULL),
(19, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:11', 'hghghg', '2024-03-18 08:43:39', '2024-03-18 08:43:39', 4, NULL, NULL),
(20, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:11', 'hghghg', '2024-03-18 08:46:43', '2024-03-18 08:46:43', 4, NULL, NULL),
(21, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:11', 'hghghg', '2024-03-18 08:47:09', '2024-03-18 08:55:09', 4, 1, 'B1'),
(22, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '14:02', 'hhh', '2024-03-21 07:43:22', '2024-03-21 07:43:22', 2, NULL, NULL),
(23, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2021-11-11', '14:22', 'jjj', '2024-03-21 08:36:26', '2024-03-21 08:36:26', 4, NULL, NULL),
(24, 'trang', 'trang.ltt210900p@sis.hust.edu.vn', '0332412298', '2024-11-11', '14:00', 'nn', '2024-03-21 08:45:32', '2024-03-21 08:45:32', 2, NULL, NULL),
(25, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '11:11', 'fff', '2024-03-21 08:55:22', '2024-03-23 23:21:43', 5, 1, 'B3'),
(26, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '0833769160', '2024-11-11', '23:11', 'hhhh', '2024-03-23 00:34:41', '2024-03-23 23:17:57', 4, 1, 'B2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Món Khai Vị', '2024-02-20 13:22:44', '2024-03-18 06:12:46', NULL),
(2, 'Món Chính', '2024-02-21 12:56:10', '2024-03-18 06:12:38', NULL),
(3, 'Món Tráng Miệng', '2024-03-18 06:13:44', '2024-03-18 06:13:44', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cost_types`
--

CREATE TABLE `cost_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cost_types`
--

INSERT INTO `cost_types` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'tiền điện', '2024-03-19 00:20:07', '2024-03-19 00:20:07'),
(2, 2, 'tiền nước', '2024-03-19 00:18:52', '2024-03-19 00:18:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'qqqq', '2024-03-14 08:52:41', '2024-03-14 08:52:41'),
(3, 'Lỗ thị thuỳ trang', 'nhimtrang10111@gmail.com', 'FFF\r\nSSS', '2024-03-15 08:13:47', '2024-03-15 08:13:47'),
(6, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'gggg', '2024-03-16 05:26:45', '2024-03-16 05:26:45'),
(7, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'mmm', '2024-03-16 05:29:08', '2024-03-16 05:29:08'),
(8, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '1', '2024-03-18 05:34:51', '2024-03-18 05:34:51'),
(9, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'vvv', '2024-03-21 08:56:09', '2024-03-21 08:56:09'),
(10, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '11', '2024-03-22 06:45:52', '2024-03-22 06:45:52'),
(11, 'vv', 'trang.ltt210900p@sis.hust.edu.vn', 'vv', '2024-03-22 06:48:54', '2024-03-22 06:48:54'),
(12, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'hh', '2024-03-22 06:50:43', '2024-03-22 06:50:43'),
(13, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'nnn', '2024-03-22 06:51:54', '2024-03-22 06:51:54'),
(14, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '11', '2024-03-22 06:53:54', '2024-03-22 06:53:54'),
(15, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'm', '2024-03-22 06:56:37', '2024-03-22 06:56:37'),
(16, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'xxx', '2024-03-22 21:25:30', '2024-03-22 21:25:30'),
(17, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'sss', '2024-03-22 21:39:52', '2024-03-22 21:39:52'),
(18, '111', 'nhimtrang10@gmail.com', 'nn', '2024-03-23 00:19:49', '2024-03-23 00:19:49'),
(19, '111', 'nhimtrang10@gmail.com', 'nn', '2024-03-23 00:21:24', '2024-03-23 00:21:24'),
(20, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '111', '2024-03-23 00:21:39', '2024-03-23 00:21:39'),
(21, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '111', '2024-03-23 00:22:06', '2024-03-23 00:22:06'),
(22, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', '111', '2024-03-23 00:22:31', '2024-03-23 00:22:31'),
(23, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'nnn', '2024-03-23 00:26:36', '2024-03-23 00:26:36'),
(24, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'nnn', '2024-03-23 00:31:40', '2024-03-23 00:31:40'),
(25, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'nn', '2024-03-23 00:31:59', '2024-03-23 00:31:59'),
(26, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'nn', '2024-03-23 00:33:01', '2024-03-23 00:33:01'),
(27, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'vv', '2024-03-23 00:36:45', '2024-03-23 00:36:45'),
(28, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'feedback', '2024-03-23 00:39:20', '2024-03-23 00:39:20'),
(29, 'Lỗ thị thuỳ trang', 'nhimtrang10@gmail.com', 'feedback', '2024-03-23 00:39:34', '2024-03-23 00:39:34'),
(30, 'test', 'nhimtrang10@gmail.com', 'feedback', '2024-03-23 00:39:52', '2024-03-23 00:39:52'),
(31, 'vv', 'nhimtrang10@gmail.com', 'vv', '2024-03-23 02:10:17', '2024-03-23 02:10:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `infor`
--

CREATE TABLE `infor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `table_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `infor`
--

INSERT INTO `infor` (`id`, `name`, `phone`, `table_number`, `created_at`, `updated_at`) VALUES
(1, 'Thuy Trang', '0985506476', 'B1', '2024-02-19 08:23:43', '2024-02-19 08:23:43'),
(2, 'Thuy Trang', '0985506487', 'B1', '2024-02-19 08:38:14', '2024-02-19 08:38:14'),
(3, 'test', '0833769160', 'B1', '2024-02-23 07:30:56', '2024-02-23 07:30:56'),
(4, 'xxx', '0833769160', 'B1', '2024-02-24 10:29:17', '2024-02-24 10:29:17'),
(5, 'xxxyyy', '0833769160', 'B1', '2024-02-24 10:31:24', '2024-02-24 10:31:24'),
(6, 'xxxyyyzzz', '0833769160', 'B1', '2024-02-24 10:33:16', '2024-02-24 10:33:16'),
(7, 'xxxyyyzzz', '0833769160', 'B1', '2024-02-24 10:46:17', '2024-02-24 10:46:17'),
(8, 'xxxyyyzzz', '0833769160', 'B1', '2024-02-24 10:48:41', '2024-02-24 10:48:41'),
(9, 'AAAA', '0833769155', 'A3', '2024-02-24 18:23:32', '2024-02-24 18:23:32'),
(10, 'Mèo', '0833769160', 'B1', '2024-02-29 00:29:30', '2024-02-29 00:29:30'),
(11, 'Lỗ thị thuỳ trang', '0833769160', '1', '2024-02-29 02:01:13', '2024-02-29 02:01:13'),
(12, 'Lỗ thị thuỳ trang', '0833769160', '1', '2024-02-29 02:01:27', '2024-02-29 02:01:27'),
(13, 'Lỗ thị thuỳ trang', '0833769160', '1', '2024-02-29 02:02:05', '2024-02-29 02:02:05'),
(14, 'test', '0833769160', '3', '2024-02-29 02:09:29', '2024-02-29 02:09:29'),
(15, 'test', '0833769160', '3', '2024-02-29 02:52:11', '2024-02-29 02:52:11'),
(16, 'Lỗ thị thuỳ trang', '0833769160', 'B1', '2024-02-29 18:13:17', '2024-02-29 18:13:17'),
(17, 'test', '0833769160', 'B1', '2024-02-29 19:22:52', '2024-02-29 19:22:52'),
(18, 'Lỗ thị thuỳ trang', '0833769160', 'B1', '2024-02-29 19:23:49', '2024-02-29 19:23:49'),
(19, 'test', '0833769160', 'B1', '2024-03-02 07:27:16', '2024-03-02 07:27:16'),
(20, 'test', '0833769160', 'B1', '2024-03-02 18:33:21', '2024-03-02 18:33:21'),
(21, 'test', '0833769160', 'B1', '2024-03-06 06:59:06', '2024-03-06 06:59:06'),
(22, 'test', '0833769160', 'B1', '2024-03-06 14:48:32', '2024-03-06 14:48:32'),
(23, 'test1', '0833769160', 'B1', '2024-03-06 14:51:49', '2024-03-06 14:51:49'),
(24, 'test1', '0833769160', 'B1', '2024-03-06 15:03:13', '2024-03-06 15:03:13'),
(25, 'Lỗ thị thuỳ trang', '0833769160', 'B1', '2024-03-06 16:16:38', '2024-03-06 16:16:38'),
(26, 'Lỗ thị thuỳ trang', '0833769160', 'B1', '2024-03-06 19:37:17', '2024-03-06 19:37:17'),
(27, 'test', '0833769160', 'B1', '2024-03-06 19:38:00', '2024-03-06 19:38:00'),
(28, 'test', '0332412298', 'B1', '2024-03-23 02:17:30', '2024-03-23 02:17:30'),
(29, 'Salads', '0332412298', 'B1', '2024-03-23 02:17:58', '2024-03-23 02:17:58'),
(30, 'trang', '0985506487', 'B1', '2024-03-23 18:49:09', '2024-03-23 18:49:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `maintenance_costs`
--

CREATE TABLE `maintenance_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `expense` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `maintenance_costs`
--

INSERT INTO `maintenance_costs` (`id`, `name`, `expense`, `deleted_at`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Điện tháng 8', '1000000', NULL, '2024-03-16 01:52:10', '2024-03-16 01:52:10', 1),
(2, 'Nước tháng 8', '500000', NULL, '2024-03-16 02:07:00', '2024-03-16 02:07:00', 2),
(3, 'Nước tháng 8', '500000', NULL, '2024-03-16 03:28:16', '2024-03-16 03:28:16', 2),
(4, 'Điện tháng 8', '1000000', NULL, '2024-03-16 03:28:16', '2024-03-16 03:28:16', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `public` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `public`, `detail`, `price`, `deleted_at`, `created_at`, `updated_at`, `id_category`) VALUES
(1, 'Mì Udon', 'public/VF6LJD0kT9rtgRvrpxkBs8TjETdb5izll5fMRZJC.jpg', 'Hành tây, tảo nori, hành lá, hành phi, rau mầm, đậu phụ, mình đen, ớt, cà rốt, trứng, và các loại thực phẩm khác', '45000', NULL, '2024-02-21 06:34:17', '2024-03-18 11:44:59', 2),
(2, 'Tempura', 'public/B0oXwczs9wVTyDf2Cwpe5r3zqtg1DQamAeluPhBG.jpg', 'Tôm (ebi), sò điệp (scallop), cá hồi (salmon), cá trích (mackerel), cá ngừ (tuna), cá hòa bình (halibut), và hải sản khác như cua, sò điệp, và ốc, cà rốt, cần tây, cà chua cherry, bí ngô, cải bắp cải, nấm, bắp cải, và cải ngọt.', '150000', NULL, '2024-02-21 06:36:28', '2024-03-18 11:50:15', 2),
(3, 'Sashimi', 'public/jHy2Wd6SOh2yW7b4Sf9vNCUFHdNs0RrhPHOE9m3w.jpg', 'Cá hồi (salmon), cá ngừ (tuna), cá hồng (yellowtail), cá trích (mackerel), cá saba (mackerel), cá hòa bình (halibut), và cá hải cẩu (sea bream), mực, tôm, sò điệp, sò điệp Nhật Bản (scallop), ốc, ốc hương (abalone).', '200000', NULL, '2024-02-21 06:37:08', '2024-03-18 11:43:04', 2),
(4, 'Sushi Cá Hồi', 'public/ANternLfYCgot8JRdcQaJLWrCUnFQ4nsuJ0Lmjbz.jpg', 'Gạo trắng đã được nấu và pha với giấm gạo, đường và muối, cá hồi, wasabi, gừng ướp chua ngọt, lá nori (tảo biển)', '100000', NULL, '2024-02-21 06:43:24', '2024-03-18 11:50:26', 2),
(5, 'Chawanmushi', 'public/YfEASqgCVihlAU4AgSIdsjh3FRejhs6z1BtZ4IF1.jpg', 'mushrooms, seafood, thin waste ginkgo seeds.', '60000', NULL, '2024-02-21 07:27:24', '2024-02-21 10:21:00', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2023_10_08_024053_create_dishes_table', 2),
(9, '2023_10_08_025012_create_drinks_table', 2),
(22, '2014_10_12_000000_create_users_table', 3),
(23, '2014_10_12_100000_create_password_resets_table', 3),
(24, '2019_08_19_000000_create_failed_jobs_table', 3),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(26, '2023_11_06_033548_create_menus_table', 3),
(27, '2024_02_03_175151_create_ware_house_table', 3),
(28, '2024_02_03_180253_create_infor_table', 3),
(33, '2024_02_03_181054_create_warehouses_table', 4),
(34, '2024_02_20_155332_create_bookings_table', 4),
(35, '2024_02_20_155647_add_people_to_bookings_table', 4),
(36, '2024_02_20_171920_change_column_in_table', 5),
(37, '2024_02_20_172449_drop_column_from_table', 6),
(38, '2024_02_20_173235_create_categories_table', 7),
(39, '2024_02_20_174100_create_morning_warehouses_table', 8),
(40, '2024_02_20_174347_create_evening_warehouses_table', 8),
(41, '2024_02_20_174602_create_inventorys_table', 8),
(42, '2024_02_21_195259_add_column_in_categories_table', 9),
(43, '2024_02_21_205351_add_column_in_morning_warehouses_table', 10),
(44, '2024_02_21_205428_add_column_in_evening_warehouses_table', 10),
(45, '2024_02_21_205516_add_column_in_inventorys_table', 10),
(46, '2024_02_23_155742_create_orders_table', 11),
(47, '2024_02_23_160335_create_payment_types_table', 11),
(48, '2024_02_23_160803_create_order_menus_table', 12),
(49, '2024_02_23_161215_create_bills_table', 12),
(50, '2024_02_23_162810_create_maintenance_costs_table', 12),
(51, '2024_02_25_044847_add_new_column_to_orders_table', 13),
(52, '2024_02_29_105012_add_deleted_at_in_warehouses_table', 14),
(53, '2024_02_29_113131_add_column_in_warehouses_table', 15),
(54, '2024_02_29_141444_create_roles_table', 16),
(55, '2024_02_29_142033_add_new_column_to_users_table', 16),
(57, '2024_03_04_123207_create_warehouses_table', 17),
(58, '2024_03_04_124253_create_feedbacks_table', 18),
(59, '2024_03_04_124717_create_seatings_table', 18),
(60, '2024_03_04_125311_create_ingredients_table', 18),
(61, '2024_03_05_160016_add_column_image_in_users_table', 19),
(64, '2024_03_16_083109_add_column_type_in_maintenance_costs_table', 20),
(65, '2024_03_16_083250_create_cost_types_table', 20),
(66, '2024_03_17_032055_add_column_in_seatings_table', 21),
(67, '2024_03_17_092633_create_seatings_table', 22),
(68, '2024_03_17_113458_add_column_in_bookings_table', 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `infor_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `infor_id`, `payment_type_id`, `deleted_at`, `created_at`, `updated_at`, `status`) VALUES
(1, 8, 0, NULL, '2024-02-24 11:03:39', '2024-02-24 11:03:39', NULL),
(2, 9, 0, NULL, '2024-02-24 18:23:41', '2024-02-24 18:23:41', NULL),
(3, 1, 0, NULL, '2024-02-29 01:39:45', '2024-02-29 01:39:45', NULL),
(4, 1, 0, NULL, '2024-02-29 01:48:21', '2024-02-29 01:48:21', NULL),
(5, 1, 0, NULL, '2024-02-29 01:48:54', '2024-02-29 01:48:54', NULL),
(6, 1, 0, NULL, '2024-02-29 01:48:59', '2024-02-29 01:48:59', NULL),
(7, 1, 0, NULL, '2024-02-29 01:49:04', '2024-02-29 01:49:04', NULL),
(8, 1, 0, NULL, '2024-02-29 01:50:46', '2024-02-29 01:50:46', NULL),
(9, 1, 0, NULL, '2024-02-29 01:51:32', '2024-02-29 01:51:32', NULL),
(10, 1, 0, NULL, '2024-02-29 01:53:11', '2024-02-29 01:53:11', NULL),
(11, 1, 0, NULL, '2024-02-29 01:53:46', '2024-02-29 01:53:46', NULL),
(12, 1, 0, NULL, '2024-02-29 19:23:21', '2024-02-29 19:23:21', NULL),
(13, 1, 0, NULL, '2024-02-29 19:23:31', '2024-02-29 19:23:31', NULL),
(14, 1, 0, NULL, '2024-02-29 19:23:56', '2024-02-29 19:23:56', NULL),
(15, 1, 0, NULL, '2024-02-29 19:24:40', '2024-02-29 19:24:40', NULL),
(16, 1, 0, NULL, '2024-02-29 19:25:01', '2024-02-29 19:25:01', NULL),
(17, 1, 0, NULL, '2024-03-02 07:29:09', '2024-03-02 07:29:09', NULL),
(18, 1, 0, NULL, '2024-03-02 07:30:13', '2024-03-02 07:30:13', NULL),
(19, 1, 0, '2024-03-06 13:12:18', '2024-03-06 06:59:14', '2024-03-06 13:12:18', NULL),
(20, 22, 0, NULL, '2024-03-06 14:48:37', '2024-03-06 14:48:37', NULL),
(21, 23, 0, NULL, '2024-03-06 14:55:42', '2024-03-06 14:55:42', NULL),
(22, 23, 0, NULL, '2024-03-06 14:58:48', '2024-03-06 14:58:48', NULL),
(23, 24, 0, NULL, '2024-03-06 15:09:09', '2024-03-06 15:09:09', NULL),
(24, 24, 0, NULL, '2024-03-06 15:09:50', '2024-03-06 15:09:50', NULL),
(25, 24, 0, NULL, '2024-03-06 15:10:42', '2024-03-06 15:10:42', NULL),
(26, 24, 1, NULL, '2024-03-06 15:12:15', '2024-03-24 08:32:03', NULL),
(27, 24, 0, NULL, '2024-03-06 15:13:20', '2024-03-06 15:13:20', NULL),
(28, 24, 0, NULL, '2024-03-06 15:16:19', '2024-03-06 15:16:19', NULL),
(29, 24, 0, NULL, '2024-03-06 15:17:18', '2024-03-06 15:17:18', NULL),
(30, 24, 0, NULL, '2024-03-06 15:20:08', '2024-03-06 15:20:08', NULL),
(31, 24, 0, NULL, '2024-03-06 15:21:53', '2024-03-06 15:21:53', NULL),
(32, 24, 0, NULL, '2024-03-06 15:26:39', '2024-03-06 15:26:39', NULL),
(33, 26, 0, NULL, '2024-03-06 19:37:28', '2024-03-06 19:37:28', NULL),
(34, 27, 0, NULL, '2024-03-06 19:38:21', '2024-03-06 19:38:21', NULL),
(35, 29, 0, NULL, '2024-03-23 02:19:12', '2024-03-23 02:19:12', NULL),
(36, 30, 0, NULL, '2024-03-23 18:49:20', '2024-03-23 18:49:20', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_menus`
--

CREATE TABLE `order_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `can_serve` tinyint(4) NOT NULL,
  `actual_amount` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_menus`
--

INSERT INTO `order_menus` (`id`, `order_id`, `menu_id`, `amount`, `can_serve`, `actual_amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, 0, NULL, '2024-02-24 11:03:39', '2024-02-24 11:03:39'),
(2, 1, 1, 2, 1, 0, NULL, '2024-02-24 11:03:39', '2024-02-24 11:03:39'),
(3, 1, 3, 2, 1, 0, NULL, '2024-02-24 11:03:39', '2024-02-24 11:03:39'),
(4, 2, 5, 3, 1, 0, NULL, '2024-02-24 18:23:41', '2024-02-24 18:23:41'),
(5, 3, 4, 1, 1, 0, NULL, '2024-02-29 01:39:45', '2024-02-29 01:39:45'),
(6, 4, 5, 1, 1, 0, NULL, '2024-02-29 01:48:21', '2024-02-29 01:48:21'),
(7, 5, 5, 1, 1, 0, NULL, '2024-02-29 01:48:54', '2024-02-29 01:48:54'),
(8, 5, 4, 1, 1, 0, NULL, '2024-02-29 01:48:54', '2024-02-29 01:48:54'),
(9, 6, 5, 1, 1, 0, NULL, '2024-02-29 01:48:59', '2024-02-29 01:48:59'),
(10, 6, 4, 1, 1, 0, NULL, '2024-02-29 01:48:59', '2024-02-29 01:48:59'),
(11, 7, 1, 1, 1, 0, NULL, '2024-02-29 01:49:04', '2024-02-29 01:49:04'),
(12, 8, 1, 1, 1, 0, NULL, '2024-02-29 01:50:46', '2024-02-29 01:50:46'),
(13, 9, 4, 1, 1, 0, NULL, '2024-02-29 01:51:32', '2024-02-29 01:51:32'),
(14, 10, 4, 1, 1, 0, NULL, '2024-02-29 01:53:11', '2024-02-29 01:53:11'),
(15, 11, 4, 1, 1, 0, NULL, '2024-02-29 01:53:46', '2024-02-29 01:53:46'),
(16, 12, 1, 1, 1, 0, NULL, '2024-02-29 19:23:21', '2024-02-29 19:23:21'),
(17, 13, 1, 1, 1, 0, NULL, '2024-02-29 19:23:31', '2024-02-29 19:23:31'),
(18, 14, 1, 1, 1, 0, NULL, '2024-02-29 19:23:56', '2024-02-29 19:23:56'),
(19, 15, 1, 1, 1, 0, NULL, '2024-02-29 19:24:40', '2024-02-29 19:24:40'),
(20, 16, 1, 1, 1, 0, NULL, '2024-02-29 19:25:01', '2024-02-29 19:25:01'),
(21, 17, 1, 1, 1, 0, NULL, '2024-03-02 07:29:09', '2024-03-02 07:29:09'),
(22, 18, 1, 1, 1, 0, '2024-03-06 13:12:44', '2024-03-02 07:30:13', '2024-03-06 13:12:44'),
(23, 19, 1, 1, 1, 0, NULL, '2024-03-06 06:59:14', '2024-03-06 06:59:14'),
(24, 20, 1, 1, 1, 0, NULL, '2024-03-06 14:48:37', '2024-03-06 14:48:37'),
(25, 21, 3, 2, 1, 0, NULL, '2024-03-06 14:55:42', '2024-03-06 14:55:42'),
(26, 22, 3, 2, 1, 0, NULL, '2024-03-06 14:58:48', '2024-03-06 14:58:48'),
(27, 31, 1, 1, 1, 0, NULL, '2024-03-06 15:21:53', '2024-03-06 15:21:53'),
(28, 32, 1, 1, 1, 0, NULL, '2024-03-06 15:26:39', '2024-03-06 15:26:39'),
(29, 33, 1, 1, 1, 0, NULL, '2024-03-06 19:37:28', '2024-03-06 19:37:28'),
(30, 34, 1, 1, 1, 0, NULL, '2024-03-06 19:38:21', '2024-03-06 19:38:21'),
(31, 34, 3, 1, 1, 0, NULL, '2024-03-06 19:38:21', '2024-03-06 19:38:21'),
(32, 34, 4, 1, 1, 0, NULL, '2024-03-06 19:38:21', '2024-03-06 19:38:21'),
(33, 34, 2, 1, 1, 0, NULL, '2024-03-06 19:38:21', '2024-03-06 19:38:21'),
(34, 35, 5, 1, 1, 0, NULL, '2024-03-23 02:19:12', '2024-03-23 02:19:12'),
(35, 36, 1, 2, 1, 0, NULL, '2024-03-23 18:49:20', '2024-03-23 18:49:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$tXpAhh1OoMaq9NGX1p2wdO4.aup4IoSS52ovipC8LxiuH2wOncjuq', '2024-02-29 17:32:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Tiền Thẻ', NULL, '2024-03-24 03:56:26', '2024-03-24 03:59:54'),
(2, 'Tiền Mặt', NULL, '2024-03-24 03:57:55', '2024-03-24 03:57:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `key`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', '2024-02-28 17:00:00', '2024-02-28 17:00:00'),
(2, 2, 'Kế toán', '2024-02-28 17:00:00', '2024-02-28 17:00:00'),
(3, 3, 'Nhân viên', '2024-02-28 17:00:00', '2024-02-28 17:00:00'),
(4, 4, 'Kho', '2024-02-28 17:00:00', '2024-02-28 17:00:00'),
(5, 5, 'Bếp', '2024-02-28 17:00:00', '2024-02-28 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seatings`
--

CREATE TABLE `seatings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table_number` varchar(255) NOT NULL,
  `pending` int(11) NOT NULL,
  `working` int(11) NOT NULL,
  `empty_table` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `seatings`
--

INSERT INTO `seatings` (`id`, `table_number`, `pending`, `working`, `empty_table`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'B1', 0, 1, 0, NULL, '2024-03-17 02:30:17', '2024-03-17 02:30:17'),
(2, 'B2', 0, 0, 1, NULL, '2024-03-17 02:59:59', '2024-03-17 02:59:59'),
(3, 'B3', 0, 0, 1, NULL, '2024-03-17 03:00:20', '2024-03-17 03:00:20'),
(4, 'B4', 1, 0, 0, NULL, '2024-03-17 03:01:37', '2024-03-17 10:53:17'),
(5, 'B5', 0, 0, 1, NULL, '2024-03-23 03:32:39', '2024-03-23 03:32:39'),
(6, 'B6', 0, 0, 1, NULL, '2024-03-23 03:39:37', '2024-03-23 03:39:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `image`) VALUES
(3, 'Admin', 'admin@gmail.com', NULL, '$2y$10$jnQX1M8dVlQR2slNwN9COeXkV5VSHCa/NMujgkONKqrfjliAHrWZq', 'w35g9pQR80RREYS5gfnj4DIHCq0hNkXxiNeYt75qyBwSI8kArP7r1NUZP17E', '2024-02-29 07:12:27', '2024-03-06 16:24:48', 1, 'public/mJw2bAaEkTJNiaan7Y6TuQIn92IJqBz1oX3TTSRu.jpg'),
(4, 'Kho', 'kho@gmail.com', NULL, '$2y$10$LiWtsXChjqxk5KfOAM86FuDHLSv5D.ZN7Fg5iBQ1r9yFme01nk7lO', NULL, '2024-03-05 07:37:52', '2024-03-05 07:37:52', 4, ''),
(5, 'Nhân Viên', 'nhanvien@gmal.com', NULL, '$2y$10$4N0PdWwHINjJM507VaJRVehJaLzlsbek0bjbjU/r2rUzkM0Or/LjC', NULL, '2024-03-05 07:49:08', '2024-03-05 07:49:08', 3, ''),
(6, 'Kế Toán', 'ketoan@gmal.com', NULL, '$2y$10$1CVcJuxR7fYhBzdqBfZ.YuPhQdKmGunuAMwIgJs7vm0R4MjNGh0Em', NULL, '2024-03-05 07:52:44', '2024-03-05 07:52:44', 2, ''),
(7, 'Bếp', 'bep@gmail.com', NULL, '$2y$10$3G4.ctzlymby7RD2PCDA7uMfPgDNx9KQgL1/8Up62pSwv7E7P/ZmO', NULL, '2024-03-05 07:57:40', '2024-03-05 07:57:40', 5, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `measure` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `quantity`, `measure`, `price`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cà chua', 10, 'kg', '30000', '1', NULL, '2024-03-04 11:31:34', '2024-03-06 13:44:07'),
(2, 'Cá hồi', 20, 'kg', '200000', '1', NULL, '2024-03-04 11:31:34', '2024-03-06 13:43:56'),
(3, 'Rau xà lách', 5, 'kg', '30000', '1', NULL, '2024-03-06 12:41:17', '2024-03-06 13:42:35'),
(4, 'Dưa chuột', 15, 'kg', '20000', '1', NULL, '2024-03-06 12:41:17', '2024-03-06 13:53:29'),
(5, 'Cá hồi', 10, 'kg', '200000', '2', NULL, '2024-03-06 12:42:09', '2024-03-06 13:45:58'),
(6, 'Cà chua', 5, 'kg', '30000', '2', NULL, '2024-03-06 12:42:09', '2024-03-06 13:44:32'),
(7, 'Cá hồi', 10, 'kg', '200000', '2', NULL, '2024-03-06 19:31:45', '2024-03-06 19:31:45'),
(8, 'Cà chua', 5, 'kg', '30000', '2', '2024-03-06 19:32:08', '2024-03-06 19:31:45', '2024-03-06 19:32:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cost_types`
--
ALTER TABLE `cost_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `infor`
--
ALTER TABLE `infor`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `maintenance_costs`
--
ALTER TABLE `maintenance_costs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_menus`
--
ALTER TABLE `order_menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `seatings`
--
ALTER TABLE `seatings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `cost_types`
--
ALTER TABLE `cost_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `infor`
--
ALTER TABLE `infor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `maintenance_costs`
--
ALTER TABLE `maintenance_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `order_menus`
--
ALTER TABLE `order_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `seatings`
--
ALTER TABLE `seatings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
