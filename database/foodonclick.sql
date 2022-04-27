-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2022 at 07:19 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodonclick`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1001, 'Japanese'),
(1002, 'Italian'),
(1003, 'Korean'),
(1004, 'Chinese'),
(1005, 'Dessert'),
(1006, 'American'),
(1007, 'Vegan');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `restaurant_id`, `name`, `description`, `price`, `img`) VALUES
(9001, 2001, 'Sanpoutei Ramen', 'Sanpoutei\'s signature shoyu ramen is big on flavour, thanks to a rich broth made with chicken, vegetables and sardines', 15.90, 'assets/img/9001.jpeg'),
(9002, 2001, 'Sashimi Salad', ' Low-carb Sashimi Salad With Sriracha Mayo', 11.90, 'assets/img/9002.jpg'),
(9003, 2001, 'Sushi Boat', 'Raw Sashimi on Japanese cooked rice', 13.90, 'assets/img/9003.jpg'),
(9004, 2002, 'Hawaiian Pizza', 'combines pizza sauce, cheese, cooked ham, and pineapple. ', 9.90, 'assets/img/9004.jpg'),
(9005, 2002, 'Pepperoni Pizza', ' traditional pizza baked together and scooped up with tortilla chips, crackers, or fresh veggies. ', 9.90, 'assets/img/9005.jpg'),
(9006, 2002, 'Lasagne', ' venly spread a quarter of the meat sauce across the bottom of the dish, then top with a single layer of lasagna', 11.90, 'assets/img/9006.jpg'),
(9007, 2002, 'Seafood Pasta', ' angel hair with shrimp and mussel', 15.90, 'assets/img/9007.jpg'),
(9008, 2002, 'Avocado Pasta', 'Creative combination of avocado and vege', 11.90, 'assets/img/9008.jpg'),
(9009, 2003, 'Toppokki', 'chewy rice cakes and fiery, funky gochujang chili paste.', 6.90, 'assets/img/9009.jpg'),
(9010, 2003, 'Naengmyeon (Cold Noodles)', 'Beef brisket, korean cucumber, korean radish, soup soy sauce, soy sauce', 9.90, 'assets/img/9010.jpeg'),
(9011, 2003, 'Korean BBQ Set', 'Pork belly, soulder, and mushroom', 19.90, 'assets/img/9011.jpg'),
(9012, 2003, 'Bibimbap', 'a bowl of warm white rice topped with namul and gochujang.', 11.90, 'assets/img/9012.jpeg'),
(9013, 2004, 'Mala Xiang Guo', 'Spicy tauge,noodle,meat,vege..', 6.90, 'assets/img/9013.jpg'),
(9014, 2004, 'Spicy Sour Sliced Potato', 'vineger, potato, salt..', 5.90, 'assets/img/9014.jpg'),
(9015, 2004, 'Mouthery Spicy Chicken', 'Signature chinese food', 6.90, 'assets/img/9015.jpg'),
(9016, 2005, 'Black Sesame Soup', 'Roasted black sesame, milk and rock sugar', 3.90, 'assets/img/9016.jpg'),
(9017, 2005, 'Black Glutinous Soup', 'Glutinous rice, sugar, milk', 3.90, 'assets/img/9017.jpg'),
(9018, 2005, 'Fu Zu Yi Mai', 'Fu Zu, sugar and barley', 2.90, 'assets/img/9018.jpg'),
(9019, 2005, 'Healthy Soup', 'Suitable for women on \"special\" time', 3.90, 'assets/img/9019.jpg'),
(9020, 2006, 'Spicy Crispy Chicken Burger', 'Burger bread, vege, onion, fried chicken with special mayo', 7.90, 'assets/img/9020.jpg'),
(9021, 2006, 'Chicken Hotdog Set', 'Bread with Hotdog, fries ans code', 9.90, 'assets/img/9021.jpg'),
(9022, 2006, 'Steak', '5-5 cooked beef steak', 19.90, 'assets/img/9022.jpg'),
(9023, 2006, 'Fish and Chips', 'Fried dory w batter, fries and vege', 15.90, 'assets/img/9023.jpg'),
(9024, 2007, 'Vege Soup w Tofu', 'Mixed vege and tofu in clear soup', 4.90, 'assets/img/9024.jpg'),
(9025, 2007, 'Vege Pizza', 'Mixed vege and mozerella on top of pizza crust', 8.90, 'assets/img/9025.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(21, '2022_04_11_055120_create_categories_table', 1),
(22, '2022_04_11_055255_create_restaurants_table', 1),
(23, '2022_04_11_055423_create_food_table', 1),
(24, '2022_04_27_085912_create_profiles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `category_id`, `name`, `email`, `phone`, `address`, `img`) VALUES
(2001, 1001, 'Chikuyotei', 'Chikuyotei@gmail.com', '6825 1064', '80 Middle Rd, #01-01 InterContinental Singapore, Singapore 188966', '1'),
(2002, 1002, 'Pasta Fresca Da Salvatore', 'PastaFrescaDaSalvatore@gmail.com', '6469 4920', '81 Fifth Ave., #01-02 Guthrie House, Singapore 268802', '2'),
(2003, 1003, 'Hyang Yeon Korean Restaurant', 'hyangyeon@gmail.com', '6221 6368', '128 Telok Ayer St, #01-01, Singapore 068597', '3'),
(2004, 1004, 'Man Fu Yuan Restaurant', 'manfuyuansg@gmail.com', '6825 1008', '80 Middle Road Level 2 InterContinental Singapore, Singapore 188966', '4'),
(2005, 1005, 'Ah Chew Dessert', 'ahchewsg@gmail.com', '6339 8198', ' #01 1 Liang Seah Street 10/11 Liang Seah Place, 189032', '5'),
(2006, 1006, '25 Degrees Burger, Wine & Liquor Bar', '25degreebarsg@gmail.com', '6809 7990', '200 Middle Rd, Hotel G, Singapore 188980', '6'),
(2007, 1007, 'Genesis Vegan Restaurant', 'genesisvegansg@gmail.com', '6438 7118', '2 Havelock Rd, #B1-01 Havelock Ii, Singapore 059763', '7');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `phone`, `birthdate`, `address`, `remember_token`, `created_at`, `updated_at`, `img`) VALUES
(1, 'xyt986', 'xingyi.14@gmail.com', NULL, '$2y$10$wbKR0pE7GgYc9eOyD7qvV.KcVC2.Q8NZqX/24TZJjkETwAzndPdFO', '82938923', '2022-04-04', '11,senja', NULL, '2022-04-27 09:18:14', '2022-04-27 09:18:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurants_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9026;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2008;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
