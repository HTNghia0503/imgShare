-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2023 lúc 02:55 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

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
(1, 1, 'Phong Cảnh', '2023-10-18 10:17:20', NULL),
(2, 1, 'Động Vật', '2023-10-18 10:21:05', '2023-10-30 12:21:49'),
(3, 4, 'Hội họa', '2023-10-18 10:22:58', NULL),
(5, 5, 'Gundam', NULL, NULL);

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
(9, 2, 6, NULL, NULL),
(10, 2, 7, NULL, NULL),
(11, 2, 16, NULL, NULL),
(12, 1, 17, NULL, NULL);

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
(3, 6, 5, 'Thật đáng yêu !', '2023-10-21 17:34:55', NULL);

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
(5, 5, 6, NULL, NULL),
(8, 4, 6, NULL, NULL),
(17, 4, 17, NULL, NULL);

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
(14, '2023_10_21_201422_create_likes_table', 10);

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
(6, 1, 'Mèo', 'Mèo con cute <3', 'LssvEyPC5mswKD6TzQqZaaXsDlMqpqXzfVfEq6Cr.jpg', NULL, 2, '2023-10-18 18:29:37', '2023-10-24 13:22:45'),
(7, 1, 'Chó', 'Chú chó đáng yêu của tôi !', 'ziKdFNBS1letTFv765mPqjNyuNiIcHsBanpRqn0U.jpg', NULL, 1, '2023-10-18 19:03:42', '2023-10-30 13:35:55'),
(8, 4, 'MonaLisa', 'Một bức chân dung thế kỷ 16 được vẽ bằng chất liệu sơn dầu trên một tấm gỗ dương tại Florence bởi Leonardo da Vinci trong thời kì Phục Hưng Ý.', 'P3I0dezA6g3c9WYmXEIjwQ1wNlkkNmwdi1CpyCo5.jpg', NULL, 0, '2023-10-18 19:10:40', '2023-10-21 20:02:57'),
(13, 4, 'Sneaker', 'Đôi giày của tôi <3', 'PtJ1QBQDWMQp6eo0dR5yo1q2njNwHzfbP3OtrSTm.jpg', NULL, 0, '2023-10-20 12:48:31', '2023-10-20 12:48:31'),
(16, 1, 'Đại bàng', 'Loài chim to lớn đại diện của tự do và quyền lực', 'kShJiArnPtftBWstQ5kIZKTJxTr3gIBKHhVpqees.jpg', NULL, 0, '2023-10-21 22:15:23', '2023-10-21 22:15:23'),
(17, 1, 'Núi Fuji', 'Ngọn núi tuyệt đẹp của xứ sở mặt trời mọc', 'fuji.jpg', NULL, 1, '2023-10-21 22:16:13', '2023-10-24 15:41:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Chân dung', 'Bức ảnh thể hiện đúng diện mạo, thần sắc và hình dáng của một người bất kì nào đó.', NULL, NULL),
(2, 'Núi non', 'Dạng địa hình lồi, có sườn dốc và độ cao thường lớn hơn và cao hơn đồi, nằm trải dài trên phạm vi nhất định.', NULL, NULL);

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
(2, 'Admin', 'admin@gmail.com', '$2y$10$hhK29DEBKXuN5IJ4dgPnHuE9pJmOSGFqs.lgsAFd345xvQTr4SmZC', 'null', 1, NULL, '2023-10-15 09:05:44', NULL),
(4, 'Hoàng Duy', 'duy@gmail.com', '$2y$10$GHK9A8E/qFl.bhtJZqT0geII2DOfuibUohZ86ypWIZsvrcu9qed9S', '1698173410.jpg', 0, NULL, '2023-10-15 12:23:51', '2023-10-24 18:50:10'),
(5, 'Thông Thái', 'thai@gmail.com', '$2y$10$Xx0RyP1/jEBHtOvljyR7BOk0MAQxJ5GJGDn1RUzNQQzxSIEkm8zLq', 'gundam.jpg', 0, NULL, '2023-10-17 13:22:16', NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `collection_post`
--
ALTER TABLE `collection_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
