-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2023 lúc 06:12 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `imgshare`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collections`
--

CREATE TABLE `collections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `collections`
--

INSERT INTO `collections` (`id`, `user_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Phong cảnh', '2023-10-18 10:17:20', '2023-11-17 18:12:39'),
(2, 1, 'Động vật', '2023-10-18 10:21:05', '2023-11-17 23:23:25'),
(3, 4, 'Hội họa', '2023-10-18 10:22:58', NULL),
(8, 4, 'Giày thể thao', '2023-10-30 15:18:22', '2023-10-30 15:18:22'),
(9, 4, 'Thú cưng', '2023-10-30 15:19:46', '2023-10-30 15:19:46'),
(11, 4, 'Nhật Bản', '2023-11-14 14:50:35', '2023-11-14 14:50:35'),
(12, 1, 'Giày thể thao', '2023-11-17 23:23:15', '2023-11-17 23:23:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collection_post`
--

CREATE TABLE `collection_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `collection_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `collection_post`
--

INSERT INTO `collection_post` (`id`, `collection_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 3, 8, NULL, NULL),
(10, 2, 7, NULL, NULL),
(11, 2, 16, NULL, NULL),
(12, 1, 17, NULL, NULL),
(30, 8, 13, NULL, NULL),
(34, 2, 6, NULL, NULL),
(56, 2, 34, NULL, NULL),
(59, 11, 17, NULL, NULL),
(60, 2, 36, NULL, NULL),
(63, 2, 37, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(2, 6, 4, 'Cute quá :3', '2023-10-21 17:33:02', NULL),
(8, 17, 4, 'Thật đẹp', '2023-11-14 14:51:37', NULL),
(9, 6, 1, 'Cảm ơn bạn <3', '2023-11-17 18:07:08', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(4, 4, 7, NULL, NULL),
(8, 4, 6, NULL, NULL),
(22, 1, 8, NULL, NULL),
(23, 1, 34, NULL, NULL),
(24, 4, 17, NULL, NULL),
(26, 1, 7, NULL, NULL),
(27, 1, 6, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_14_223857_create_posts_table', 1),
(6, '2023_10_15_170322_topic', 2),
(7, '2023_10_15_172809_posts', 3),
(8, '2023_10_18_170812_collections', 4),
(9, '2023_10_18_232837_posts', 5),
(10, '2023_10_18_234656_posts', 6),
(11, '2023_10_19_013308_create_collection_post_table', 7),
(12, '2023_10_19_014643_collection_post', 8),
(13, '2023_10_21_184623_create_comments_table', 9),
(14, '2023_10_21_201422_create_likes_table', 10),
(15, '2023_11_09_005159_create_post_topic_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `likequantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `img_path`, `status`, `likequantity`, `created_at`, `updated_at`) VALUES
(6, 1, 'Mèo', 'Mèo con dễ thương', 'LssvEyPC5mswKD6TzQqZaaXsDlMqpqXzfVfEq6Cr.jpg', NULL, 3, '2023-10-18 18:29:37', '2023-11-17 23:15:18'),
(7, 1, 'Chó', 'Chú chó đáng yêu của tôi !', 'ziKdFNBS1letTFv765mPqjNyuNiIcHsBanpRqn0U.jpg', NULL, 2, '2023-10-18 19:03:42', '2023-11-17 18:16:58'),
(8, 4, 'MonaLisa', 'Một bức chân dung thế kỷ 16 được vẽ bằng chất liệu sơn dầu trên một tấm gỗ dương tại Florence bởi Leonardo da Vinci trong thời kì Phục Hưng Ý.', 'P3I0dezA6g3c9WYmXEIjwQ1wNlkkNmwdi1CpyCo5.jpg', NULL, 1, '2023-10-18 19:10:40', '2023-11-14 12:42:54'),
(13, 4, 'Sneaker', 'Đôi giày của tôi <3', 'PtJ1QBQDWMQp6eo0dR5yo1q2njNwHzfbP3OtrSTm.jpg', NULL, 0, '2023-10-20 12:48:31', '2023-11-17 23:23:46'),
(16, 1, 'Đại bàng', 'Loài chim to lớn đại diện của tự do và quyền lực', 'kShJiArnPtftBWstQ5kIZKTJxTr3gIBKHhVpqees.jpg', NULL, 0, '2023-10-21 22:15:23', '2023-10-21 22:15:23'),
(17, 1, 'Núi Fuji', 'Ngọn núi tuyệt đẹp của xứ sở mặt trời mọc', 'fuji.jpg', NULL, 1, '2023-10-21 22:16:13', '2023-11-14 14:50:51'),
(34, 1, 'Becgie', 'Chú chó becgie mạnh mẽ và nhanh nhẹn', '7GXCCQsdgcXzP6eTXxZTU2HcTdDC5roTfMcYqzMm.jpg', NULL, 1, '2023-11-13 19:00:47', '2023-11-14 13:51:55'),
(36, 1, 'Shiba Inu', 'Chú chó với các biểu cảm thú vị', 'nd0DD2SBaxF95uZzBrkN6shN8qmeyAamD4DRG0Gu.jpg', NULL, 0, '2023-11-14 17:46:02', '2023-11-14 17:46:02'),
(37, 1, 'Mèo <3', 'Chú mèo này có làm bạn rung động ?', 'biCRTGTbjEvEyrjITFAWq4uyhI2Gl1tgZBI89WW7.jpg', NULL, 0, '2023-12-08 15:21:48', '2023-12-08 15:21:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_topic`
--

CREATE TABLE `post_topic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_topic`
--

INSERT INTO `post_topic` (`id`, `post_id`, `topic_id`, `created_at`, `updated_at`) VALUES
(1, 6, 8, NULL, NULL),
(2, 7, 15, NULL, NULL),
(7, 34, 15, NULL, NULL),
(9, 17, 31, NULL, NULL),
(10, 36, 15, NULL, NULL),
(11, 8, 16, NULL, NULL),
(12, 13, 38, NULL, NULL),
(13, 16, 17, NULL, NULL),
(14, 37, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'anime', 'Những hình ảnh hoạt hình theo phong cách Nhật Bản', NULL, '2023-11-17 12:21:33'),
(2, 'beach', '', NULL, NULL),
(3, 'bear', '', NULL, NULL),
(4, 'bicycle', '', NULL, NULL),
(5, 'bus', '', NULL, NULL),
(6, 'car', '', NULL, NULL),
(7, 'cargoship', '', NULL, NULL),
(8, 'cat', '', NULL, NULL),
(9, 'chicken', '', NULL, NULL),
(10, 'city', '', NULL, NULL),
(11, 'cruiseship', '', NULL, NULL),
(12, 'daisy', '', NULL, NULL),
(13, 'dandelion', '', NULL, NULL),
(14, 'desert', '', NULL, NULL),
(15, 'dog', '', NULL, NULL),
(16, 'drawings', '', NULL, NULL),
(17, 'eagle', '', NULL, NULL),
(18, 'engraving', '', NULL, NULL),
(19, 'forest', '', NULL, NULL),
(20, 'forklift', '', NULL, NULL),
(21, 'fortnite', '', NULL, NULL),
(22, 'freefire', '', NULL, NULL),
(23, 'genshinimpact', '', NULL, NULL),
(24, 'godofwar', '', NULL, NULL),
(25, 'horse', '', NULL, NULL),
(26, 'jacket', '', NULL, NULL),
(27, 'jeans', '', NULL, NULL),
(28, 'lion', '', NULL, NULL),
(29, 'minecraft', '', NULL, NULL),
(30, 'motorbike', '', NULL, NULL),
(31, 'mountain', '', NULL, NULL),
(32, 'painting', '', NULL, NULL),
(33, 'roses', '', NULL, NULL),
(34, 'sailboat', '', NULL, NULL),
(35, 'sculpture', '', NULL, NULL),
(36, 'shark', '', NULL, NULL),
(37, 'snake', '', NULL, NULL),
(38, 'sneaker', '', NULL, NULL),
(39, 'sunflowers', '', NULL, NULL),
(40, 'sweater', '', NULL, NULL),
(41, 'tiger', '', NULL, NULL),
(42, 'truck', '', NULL, NULL),
(43, 'tshirt', '', NULL, NULL),
(44, 'tulips', '', NULL, NULL),
(45, 'airplane', '', NULL, NULL),
(46, 'another', 'Những chủ đề chưa train', '2023-11-15 14:42:47', '2023-11-15 15:36:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `permission` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hà Trung Nghĩa', 'nghia@gmail.com', '$2y$10$tDvp/mxQ24rmro7qc3bDh.nFDnanx5yELGLVbRbMp3iPT./lqssN2', '1698173575.jpg', 0, NULL, '2023-10-15 09:05:44', '2023-10-30 12:21:36'),
(4, 'Hoàng Duy', 'duy@gmail.com', '$2y$10$GHK9A8E/qFl.bhtJZqT0geII2DOfuibUohZ86ypWIZsvrcu9qed9S', '1698173410.jpg', 0, NULL, '2023-10-15 12:23:51', '2023-10-24 18:50:10'),
(7, 'Admin', 'admin@gmail.com', '$2y$10$kyd9KvWO/k3SBZ8l/qpBeu3UMM2RMWp65BctNknnogFCj.DJCvR.S', 'adminavt.jpeg', 1, NULL, '2023-11-06 18:10:22', NULL),
(11, 'Thông Thái', 'thai@gmail.com', '$2y$10$gjk7x71bOkftjHWndAGxh.sPe5j/s8p93..dwas46QtXAEHGmylJ6', 'gundam.jpg', 0, NULL, '2023-11-17 23:43:26', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collections_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `collection_post`
--
ALTER TABLE `collection_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collection_post_collection_id_foreign` (`collection_id`),
  ADD KEY `collection_post_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `likes_user_id_post_id_unique` (`user_id`,`post_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `post_topic`
--
ALTER TABLE `post_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_topic_post_id_foreign` (`post_id`),
  ADD KEY `post_topic_topic_id_foreign` (`topic_id`);

--
-- Chỉ mục cho bảng `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `collection_post`
--
ALTER TABLE `collection_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `post_topic`
--
ALTER TABLE `post_topic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `collection_post`
--
ALTER TABLE `collection_post`
  ADD CONSTRAINT `collection_post_collection_id_foreign` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `collection_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `post_topic`
--
ALTER TABLE `post_topic`
  ADD CONSTRAINT `post_topic_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_topic_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
