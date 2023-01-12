-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2022 lúc 06:23 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web-check-ip`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cate`
--

CREATE TABLE `cate` (
  `id` int(12) NOT NULL,
  `name_cate` varchar(256) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cate`
--

INSERT INTO `cate` (`id`, `name_cate`, `created_at`, `updated_at`) VALUES
(1, 'Hoá học đại cương', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Xác suất thống kê', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'Tin học ứng dụng ', '2022-10-11 12:07:33.953691', '2022-10-11 12:07:33.953691'),
(4, 'Anh văn', '2022-10-11 12:08:06.826276', '2022-10-11 12:08:06.826276');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `parent_id` int(64) NOT NULL,
  `lesson_link` varchar(512) DEFAULT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chapter`
--

INSERT INTO `chapter` (`id`, `name`, `parent_id`, `lesson_link`, `updated_at`, `created_at`) VALUES
(1, 'Chương 1', 1, 'https://docs.google.com/forms/d/e/1FAIpQLSf-Jj8ktGZkYUYYn2yWRLcXgor_Uq4QLk6yjS910sZo6cXT5Q/viewform?embedded=true', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Chương 2', 1, 'https://docs.google.com/forms/d/e/1FAIpQLSfZzT2wuJl_Z8R2fhrGVT490Ic5FBL5ooRX8TFCf8TKcgWQwQ/viewform?embedded=true', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(3, 'Chương 3', 1, 'https://docs.google.com/forms/d/e/1FAIpQLSd7ygZy5ZT-sNs5LHkDQ3p-EYm5QRg1vpSybMY6Q9Qb11xLxQ/viewform?embedded=true', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'Chương 4', 1, 'https://docs.google.com/forms/d/e/1FAIpQLSfl2KHP9Z_FMusL_WXO0ERYW7WPYTPapy6I0it4pKgix1X3WA/viewform?embedded=true', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(7, 'Chương 6', 1, 'https://docs.google.com/forms/d/e/1FAIpQLSfpI2x9p8y746DXaHCbt9pH6xUFt7K679yUifERCqV3o4SxZQ/viewform?embedded=true', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(9, 'Chương 7', 1, 'https://docs.google.com/forms/d/e/1FAIpQLSfkxWjqOFqT6CLJOVi5x4Hxkxi14Qs5mOvtfWM17-6Gxu8C0g/viewform?embedded=true', '2022-10-11 12:03:01.976046', '2022-10-11 12:03:01.976046'),
(10, 'Chương 8', 1, 'https://docs.google.com/forms/d/e/1FAIpQLSeNckFbezpLV683JiX49DpkZHWwQjWVTZhZBaDHLNTr6jJf2A/viewform?embedded=true', '2022-10-11 12:03:02.189475', '2022-10-11 12:03:02.189475'),
(11, 'Chương 9', 1, 'https://docs.google.com/forms/d/e/1FAIpQLSfP28hGJCu16QWskONIjKELr3Al3ghdAiw-upmxRuft1RhDog/viewform?embedded=true', '2022-10-11 12:03:02.497358', '2022-10-11 12:03:02.497358'),
(13, 'Bài tập', 2, 'https://docs.google.com/forms/d/e/1FAIpQLSf3Ftm9YG5o0z5Ku22GxfChziEM2Bv2dngS2rfi3_kM4vrckw/viewform?embedded=true', '2022-10-11 12:09:14.696085', '2022-10-11 12:09:14.696085'),
(14, 'Tổng hợp', 2, 'https://docs.google.com/forms/d/e/1FAIpQLSfXYKyfYNuYIYCQD3EkEdykcrwyEH15uZ5-yB8_S5bfwBxT5w/viewform?embedded=true', '2022-10-11 12:09:24.492766', '2022-10-11 12:09:24.492766'),
(15, 'Lý Thuyết', 2, 'https://docs.google.com/forms/d/e/1FAIpQLScEGmF8tKvVFxqWWEQ6aOndBr7h94rt2YW6wCH2X9NcvPRyng/viewform?embedded=true', '2022-10-11 12:10:58.073392', '2022-10-11 12:10:58.073392'),
(16, 'Trắc nghiệm', 3, 'https://docs.google.com/forms/d/e/1FAIpQLSe5vztvXBjNJI9zAvLXI2lb2tSezGcExY3dhMBSWt61kfpCgQ/viewform?embedded=true', '2022-10-16 10:12:37.520968', '2022-10-16 10:12:37.520968'),
(17, 'Tổng hợp', 4, 'https://docs.google.com/forms/d/e/1FAIpQLSdYuO1MiYXPBEXDjHyohmC5X5eD2eno2ZDCEYtMlXPFCLoSyQ/viewform?embedded=true', '2022-10-16 10:13:16.861541', '2022-10-16 10:13:16.861541'),
(30, 'Phần 1', 4, 'https://docs.google.com/forms/d/e/1FAIpQLSeX8dxi0jY02oKTc9LiSZ5KUNlhiiw6NRIYoqk5OfgPERdeXQ/viewform?embedded=true', '2022-10-23 03:59:34.110218', '2022-10-23 03:59:34.110218'),
(31, 'Phần 2', 4, 'https://docs.google.com/forms/d/e/1FAIpQLScR96UO6AbiQDKgZG6QBF4-lbmDRGbSd3rfdMdOVHq2EIbjMg/viewform?embedded=true', '2022-10-23 04:00:03.326534', '2022-10-23 04:00:03.326534'),
(32, 'Phần 3', 4, 'https://docs.google.com/forms/d/e/1FAIpQLSfOh8BqeqenLWNHRu9KKHo-RhK4LfNgbyutUu1e8mBPaW8Nrg/viewform?embedded=true', '2022-10-23 04:00:03.730987', '2022-10-23 04:00:03.730987'),
(33, 'Phần 4', 4, 'https://docs.google.com/forms/d/e/1FAIpQLScJuwaI1wOdHH7nKltgfBl1XpnxlaGIQg7JqOTl8QZthgauKg/viewform?embedded=true', '2022-10-23 04:00:04.483373', '2022-10-23 04:00:04.483373'),
(34, 'Phần 5', 4, 'https://docs.google.com/forms/d/e/1FAIpQLSflCycP89v673Hvr7Vpey5Z04F1o04eDdEE7AJ1oHUOFCbYHQ/viewform?embedded=true', '2022-10-23 06:46:26.788388', '2022-10-23 06:46:26.788388'),
(35, 'Phần 6', 4, 'https://docs.google.com/forms/d/e/1FAIpQLSdTl-SEvlpNQfLZdLqEL37zLkVFHPonbOAXnNtuEXejSOSKrw/viewform?embedded=true', '2022-10-23 06:46:29.066134', '2022-10-23 06:46:29.066134');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ip_config`
--

CREATE TABLE `ip_config` (
  `id` int(3) NOT NULL,
  `name` varchar(256) NOT NULL,
  `ip` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `count` int(12) NOT NULL DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ip_config`
--

INSERT INTO `ip_config` (`id`, `name`, `ip`, `status`, `count`, `updated_at`, `created_at`) VALUES
(15, 'Khách', '171.254.145.158', 1, 9, '2022-10-11 15:48:08', '2022-10-11 15:00:17'),
(22, 'Khách', '27.79.44.255', 1, 91, '2022-10-23 08:04:45', '2022-10-16 10:10:07'),
(23, 'Khách', '116.110.226.167', 1, 2, '2022-10-18 06:33:25', '2022-10-18 06:29:32'),
(24, 'Khách', '171.255.171.201', 1, 2, '2022-10-18 07:11:10', '2022-10-18 07:07:45'),
(25, 'Khách', '171.234.8.194', 1, 1, '2022-10-19 03:41:13', '2022-10-18 15:42:31'),
(26, 'Khách', '27.66.48.178', 1, 2, '2022-10-19 03:23:20', '2022-10-19 03:21:40'),
(27, 'Khách', '14.241.159.49', 1, 3, '2022-10-19 06:36:10', '2022-10-19 03:25:34'),
(28, 'Khách', '14.175.128.181', 1, 10, '2022-10-20 02:20:14', '2022-10-20 01:38:46'),
(29, 'Khách', '171.254.128.164', 0, 3, '2022-10-20 09:52:41', '2022-10-20 07:25:37'),
(30, 'Khách', '171.255.156.117', 0, 0, '2022-10-21 01:32:24', '2022-10-21 01:32:24'),
(31, 'Khách', '27.71.106.111', 0, 1, '2022-10-21 01:53:39', '2022-10-21 01:53:10'),
(32, 'Khách', '171.255.145.229', 0, 1, '2022-10-22 15:37:39', '2022-10-22 15:37:17'),
(33, 'Khách', '171.255.156.9', 0, 1, '2022-10-23 01:40:45', '2022-10-23 01:27:54'),
(34, 'Khách hàng vãng lai', '123.16.248.227', 1, 28, '2022-10-24 04:21:45', '2022-10-24 02:07:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `role` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `email_verified_at` varchar(256) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `session_id` varchar(64) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `status`, `email_verified_at`, `password`, `session_id`, `updated_at`, `created_at`) VALUES
(6, 'admin', 'admin@gmail.com', 1, 1, NULL, '$2y$10$IRdIxzJxOtch73OF8Ssv9.xHCJFYpm4dfduVE8DXg9ljd3e9EuoHm', 'grCXUnQmo0nvflchxqNGFav1xd9noGeN7kypLYTV', '2022-10-24 04:02:16', '2022-10-24 03:08:02'),
(7, 'Xuân Ngọc', 'user@gmail.com', 0, 1, NULL, '$2y$10$fJx9J7s5YEL8GPE8QSRnLOOIhynt6WPHVSFNAWG6brPchuAFZPsBy', 'MkHkUPwvWM7sqqXdrgZJ5ibyD8mIT3EOrSyaTB63', '2022-10-24 04:21:40', '2022-10-24 02:28:49');
--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ip_config`
--
ALTER TABLE `ip_config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cate`
--
ALTER TABLE `cate`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `ip_config`
--
ALTER TABLE `ip_config`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
