-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2022 at 07:36 PM
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
(10, '2022_05_02_074241_add_notes_columns_to_reservations_table', 1),
(11, '2022_05_02_074324_add_notes_columns_to_orders_table', 1),
(12, '2022_05_02_074811_add_timestamps_columns_to_orders_table', 1),
(13, '2022_05_05_161510_add_price_to__table', 1),
(15, '2022_05_08_032853_remove_user_food_qty_orders_table', 2),
(16, '2014_10_12_000000_create_users_table', 3),
(17, '2014_10_12_100000_create_password_resets_table', 3),
(18, '2019_08_19_000000_create_failed_jobs_table', 3),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(20, '2022_04_11_055120_create_categories_table', 3),
(21, '2022_04_11_055255_create_restaurants_table', 3),
(22, '2022_04_11_055423_create_food_table', 3),
(23, '2022_04_29_184254_create_reservations_table', 3),
(24, '2022_05_02_041616_create_orders_table', 3),
(25, '2022_05_06_164339_create_vouchers_table', 3),
(26, '2022_05_10_222537_add_role_users_table', 4),
(27, '2022_05_10_222744_add_driver_fields_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reservation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliverlatertime` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_driver_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accepted_driver_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `restaurant_id`, `price`, `type`, `comment`, `status`, `notes`, `created_at`, `updated_at`, `address`, `reservation_id`, `name`, `cart`, `payment_type`, `deliverlatertime`, `img`, `rejected_driver_ids`, `accepted_driver_id`) VALUES
(37, 2005, 4, 'deliverlater', 'NULL', 'created', 'NO CUTLERY', '2022-05-09 10:51:49', NULL, '10 ADMIRALTY STREET 03-54 NORTHLINK BLDG', NULL, 'xyt986', 'O:15:\"App\\Models\\Cart\":4:{s:5:\"items\";a:1:{i:9019;a:4:{s:3:\"qty\";i:1;s:3:\"pri\";d:3.9;s:4:\"item\";O:15:\"App\\Models\\food\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:4:\"food\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:9019;s:13:\"restaurant_id\";i:2005;s:4:\"name\";s:12:\"Healthy Soup\";s:11:\"description\";s:36:\"Suitable for women on \"special\" time\";s:5:\"price\";d:3.9;s:3:\"img\";s:19:\"assets/img/9019.jpg\";}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:9019;s:13:\"restaurant_id\";i:2005;s:4:\"name\";s:12:\"Healthy Soup\";s:11:\"description\";s:36:\"Suitable for women on \"special\" time\";s:5:\"price\";d:3.9;s:3:\"img\";s:19:\"assets/img/9019.jpg\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:3:\"res\";i:2005;}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:3.9;s:10:\"restaurant\";i:2005;}', 'COD', '1330', NULL, NULL, NULL),
(49, 2002, 12, 'preorder', 'NULL', 'created', NULL, '2022-05-10 23:58:25', NULL, NULL, 23, 'rachel', 'O:15:\"App\\Models\\Cart\":4:{s:5:\"items\";a:1:{i:9008;a:4:{s:3:\"qty\";i:1;s:3:\"pri\";d:11.9;s:4:\"item\";O:15:\"App\\Models\\food\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:4:\"food\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:9008;s:13:\"restaurant_id\";i:2002;s:4:\"name\";s:13:\"Avocado Pasta\";s:11:\"description\";s:40:\"Creative combination of avocado and vege\";s:5:\"price\";d:11.9;s:3:\"img\";s:19:\"assets/img/9008.jpg\";}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:9008;s:13:\"restaurant_id\";i:2002;s:4:\"name\";s:13:\"Avocado Pasta\";s:11:\"description\";s:40:\"Creative combination of avocado and vege\";s:5:\"price\";d:11.9;s:3:\"img\";s:19:\"assets/img/9008.jpg\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:3:\"res\";i:2002;}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:11.9;s:10:\"restaurant\";i:2002;}', 'payatrestaurant', NULL, NULL, NULL, NULL),
(51, 2004, 20, 'deliverlater', 'Food is amazing', 'delivered', 'NO CUTLERY', '2022-05-18 09:49:51', '2022-05-18 09:54:01', '#19-293, jalan biru', NULL, 'testingdemo', 'O:15:\"App\\Models\\Cart\":4:{s:5:\"items\";a:2:{i:9013;a:4:{s:3:\"qty\";i:2;s:3:\"pri\";d:13.8;s:4:\"item\";O:15:\"App\\Models\\food\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:4:\"food\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:9013;s:13:\"restaurant_id\";i:2004;s:4:\"name\";s:14:\"Mala Xiang Guo\";s:11:\"description\";s:30:\"Spicy tauge,noodle,meat,vege..\";s:5:\"price\";d:6.9;s:3:\"img\";s:19:\"assets/img/9013.jpg\";}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:9013;s:13:\"restaurant_id\";i:2004;s:4:\"name\";s:14:\"Mala Xiang Guo\";s:11:\"description\";s:30:\"Spicy tauge,noodle,meat,vege..\";s:5:\"price\";d:6.9;s:3:\"img\";s:19:\"assets/img/9013.jpg\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:3:\"res\";i:2004;}i:9014;a:4:{s:3:\"qty\";i:1;s:3:\"pri\";d:5.9;s:4:\"item\";O:15:\"App\\Models\\food\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:4:\"food\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:9014;s:13:\"restaurant_id\";i:2004;s:4:\"name\";s:24:\"Spicy Sour Sliced Potato\";s:11:\"description\";s:23:\"vineger, potato, salt..\";s:5:\"price\";d:5.9;s:3:\"img\";s:19:\"assets/img/9014.jpg\";}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:9014;s:13:\"restaurant_id\";i:2004;s:4:\"name\";s:24:\"Spicy Sour Sliced Potato\";s:11:\"description\";s:23:\"vineger, potato, salt..\";s:5:\"price\";d:5.9;s:3:\"img\";s:19:\"assets/img/9014.jpg\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:3:\"res\";i:2004;}}s:8:\"totalQty\";i:3;s:10:\"totalPrice\";d:19.700000000000003;s:10:\"restaurant\";i:2004;}', 'COD', '2000', NULL, NULL, '105'),
(52, 2004, 7, 'preorder', 'No Comment', 'created', 'baby chair', '2022-05-18 09:51:41', NULL, NULL, 28, 'testingdemo', 'O:15:\"App\\Models\\Cart\":4:{s:5:\"items\";a:1:{i:9013;a:4:{s:3:\"qty\";i:1;s:3:\"pri\";d:6.9;s:4:\"item\";O:15:\"App\\Models\\food\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:4:\"food\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:9013;s:13:\"restaurant_id\";i:2004;s:4:\"name\";s:14:\"Mala Xiang Guo\";s:11:\"description\";s:30:\"Spicy tauge,noodle,meat,vege..\";s:5:\"price\";d:6.9;s:3:\"img\";s:19:\"assets/img/9013.jpg\";}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:9013;s:13:\"restaurant_id\";i:2004;s:4:\"name\";s:14:\"Mala Xiang Guo\";s:11:\"description\";s:30:\"Spicy tauge,noodle,meat,vege..\";s:5:\"price\";d:6.9;s:3:\"img\";s:19:\"assets/img/9013.jpg\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:3:\"res\";i:2004;}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";d:6.9;s:10:\"restaurant\";i:2004;}', 'payatrestaurant', NULL, NULL, NULL, NULL);

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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `restaurant_id`, `date`, `time`, `capacity`, `comment`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(23, 19, 2004, '2022-05-11', '1600', '4-8', 'none', 'created', 'baby chair * 2', '2022-05-10 23:57:08', '2022-05-10 23:57:08'),
(28, 104, 2001, '2022-05-19', '1000', '4-8', 'none', 'created', NULL, '2022-05-18 09:50:56', '2022-05-18 09:50:56');

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
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `img` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `phone`, `birthdate`, `address`, `remember_token`, `created_at`, `updated_at`, `img`, `role`) VALUES
(1, 'xyt986', 'xingyi.14@gmail.com', NULL, '$2y$10$dIEwz2xUXAe0ud0R5lHtROP/jGPnPFKIptqlH4.UKMOG1SbHsDME.', '999', '1980-04-04', '10 ADMIRALTY STREET 03-54 NORTHLINK BLDG', 'VI55tYRMJIJBl9ObxQdQMZeqXZMev83D7L6FudWOb6d7sSp1FgB2cCkbdnPz', '2022-04-26 17:18:14', '2022-05-17 20:09:15', NULL, NULL),
(2, 'shirowhitte', 'shiro@gmail.com', NULL, '$2y$10$AA2x.Vn34CURO.WzKRfZIeTUdvoolVwLDqfVinnV1m5qwQEgf84G.', '93847283', '2004-03-31', '168 Robinson Road #36-01 Capital Tower', NULL, '2022-04-26 19:12:25', '2022-04-26 19:12:25', NULL, NULL),
(9, 'sayeed22', 'oohsehun940627@gmail.com', NULL, '$2y$10$VldTxKBYIOUrd35o8MgtjeYXdrAZXI8w35J7URUY0Y2qn27alfA0a', '93748293', '2002-05-06', ' Opera Estate 9 Tosca Street', NULL, '2022-05-10 05:39:57', '2022-05-10 05:39:57', NULL, NULL),
(19, 'rachel', 'limrachel23@gmail.com', NULL, '$2y$10$NPzV5r4pMDlfgFmceYseuOSPS6a6M6Ss7AOJyTkeN4fztJeUUpXje', '81234567', '2002-05-11', '123 Wellington Circle', NULL, '2022-05-10 23:55:33', '2022-05-10 23:55:33', NULL, NULL),
(20, 'audrey ng', 'audrey.nfy@gmail.com', NULL, '$2y$10$/./ie85KP4uoSY5KI/M9EOKDA/SChLnJw.7KOMgXTono2AhCgM3tq', '81710879', '1999-09-05', '37-365, clementi avenue 3', NULL, '2022-05-12 06:14:21', '2022-05-12 06:14:21', NULL, NULL),
(24, 'shawn lee', 'shawn@gmail.com', NULL, '$2y$10$L8uDtFxOIwMgQeCu427lguwRymqEowMkY71EkXP3RBz4anvgDOdwa', '72839482', '1999-05-31', '10A SAGO STREET', NULL, '2022-05-13 10:23:03', '2022-05-13 10:23:03', NULL, NULL),
(25, 'james bond', 'james@gmail.com', NULL, '$2y$10$8YvdVcj8Rf0.pkLxCLyLBOPfg7OJijb8LjbPUuRG1mrXKHYBfNnlG', '93849038', '2002-05-07', '3 Shenton Way 10-01 Shenton House', 'UWtbOTL0d870ROR7iWnlp3MdIqB6n55HzCbQfTzMWCDWi7cWPzKcA3aWNkwI', '2022-05-13 10:33:53', '2022-05-13 10:33:53', NULL, NULL),
(26, 'vernicechau', 'vernice@gmail.com', NULL, '$2y$10$3CgpeJVgbJJPlntfdRoCLe1EKugUQsOdSKRATFVgSJB2.WlUpk5X6', '38495839', '1990-05-05', '1 Lor 2 Toa Payoh #02-502', NULL, '2022-05-13 10:37:45', '2022-05-13 10:37:45', NULL, 'DRIVER'),
(27, 'testing1', 'testing1@gmail.com', NULL, '$2y$10$ZtIWEqfF5gt/LauOM16/D.E6Ti7E.mV.4sh0DLLDhQQKJpSvvE2QS', '12123123123', '1998-05-18', ' 8 Fourth Lok Yang Road\r\n\r\n', NULL, '2022-05-13 11:03:57', '2022-05-13 11:03:57', NULL, 'DRIVER'),
(28, 'james', 'jamesleejie@gmail.com', NULL, '$2y$10$GNYRNiz1kFWb3//eLgBWaunovl/1GYI3l6XEIYizmzLURGsEiXhCS', '82938294', '1989-06-01', '156A Gul Circle S()', NULL, '2022-05-13 12:09:54', '2022-05-13 12:09:54', NULL, 'DRIVER'),
(29, 'blackcoolguy', 'jojochan@gmail.com', NULL, '$2y$10$2q/8Xfg0dyQl5rYuvsP87ufqfUC/MYJ21d3AZMrCzQeazDui62Jqa', '82938294', '1970-05-19', 'HDB Yishun 106 Yishun Ring Road #01-197', NULL, '2022-05-13 12:20:25', '2022-05-13 12:20:25', NULL, 'DRIVER'),
(30, 'joeychong', 'joey@gmail.com', NULL, '$2y$10$u/t1MW4uVnJycHQjy1dyietBXhp76WR44zMN2lv/UDbDcZweU.0.u', '92837293', '2002-05-07', '8 Temasek Boulevard #43-01 Suntec Tower 3', NULL, '2022-05-13 12:21:59', '2022-05-13 12:21:59', NULL, 'DRIVER'),
(31, 'boeychai', 'boeychai@gmail.com', NULL, '$2y$10$3zG.4Vpaxp83DWu4vzP8xe1iWE4pZRpDAufGgz/dG8DhQJg6F.oYW', '83948293', '2010-04-29', 'Sentosa Golf Club, 27 Bukit Manis Road', NULL, '2022-05-13 12:25:54', '2022-05-13 12:25:54', NULL, 'DRIVER'),
(32, 'kussmita', 'kussmita@gmail.com', NULL, '$2y$10$WkttIs1WXeMhHGp2j2px1up/h9Sfem3sgl.qIPfGJT8h/hWybDeKy', '92839403', '1999-04-25', ' Innovation Place, 25 Mandai Estate,', NULL, '2022-05-13 12:28:46', '2022-05-13 12:28:46', NULL, 'DRIVER'),
(101, 'admin', 'admin@gmail.com', NULL, '$2y$10$Q/aR7HhkTzjEn6KET2j1CuQ3QnEMkUxtyxBvL/EUkJ/I.w5e46vPW', '92829283', '1999-05-07', '#27-48, Jalan Biru, 719472, Singapore', NULL, '2022-05-17 18:39:48', '2022-05-17 19:36:17', NULL, 'ADMIN'),
(103, 'testing90', 'testing90@gmail.com', NULL, '$2y$10$04SYPvdPRIEur0GqR4p3w.fSsZzln2Wcabco9XRmqcMglxb7176wO', '82938294', '1995-05-11', '#10-28, SENJA ROAD', NULL, '2022-05-18 09:39:30', '2022-05-18 09:39:30', NULL, 'NULL'),
(104, 'testingdemo', 'testingdemo@gmail.com', NULL, '$2y$10$VrfQXCkyjMHiDnDX7RUYC.dCSPcFs0zT8HxiDIfqmDohU7C0GAz4K', '83947293', '1992-04-30', '453 Tagore Industrial Avenue', NULL, '2022-05-18 09:43:33', '2022-05-18 09:45:46', NULL, 'NULL'),
(105, 'drivertesting', 'drivertesting@gmail.com', NULL, '$2y$10$nOn3BSydBqGORkLuFW5Smu9U47p98DmCyTxAzXf.5UWhD4rvfkp2u', '18293928', '2000-05-02', 'testing', NULL, '2022-05-18 09:53:42', '2022-05-18 09:53:42', NULL, 'DRIVER');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `user_id`, `code`, `status`, `created_at`, `updated_at`) VALUES
(10001, 1, 'welcome10', 'created', NULL, NULL),
(10002, 2, 'welcome10', 'created', NULL, NULL);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_reservation_id_foreign` (`reservation_id`),
  ADD KEY `orders_name_foreign` (`name`);

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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_restaurant_id_foreign` (`restaurant_id`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vouchers_user_id_foreign` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2008;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_name_foreign` FOREIGN KEY (`name`) REFERENCES `users` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
