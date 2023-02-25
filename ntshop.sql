-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 06:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ntshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `proid_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `usercart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230202050721', '2023-02-02 06:07:33', 92),
('DoctrineMigrations\\Version20230202050854', '2023-02-02 06:08:59', 42),
('DoctrineMigrations\\Version20230204050541', '2023-02-04 06:05:56', 652),
('DoctrineMigrations\\Version20230204051119', '2023-02-04 06:11:25', 37),
('DoctrineMigrations\\Version20230207043543', '2023-02-07 05:35:51', 834),
('DoctrineMigrations\\Version20230211085233', '2023-02-11 09:52:49', 802),
('DoctrineMigrations\\Version20230211085353', '2023-02-11 09:53:57', 37),
('DoctrineMigrations\\Version20230212041642', '2023-02-12 05:17:21', 3418),
('DoctrineMigrations\\Version20230212041833', '2023-02-12 05:18:38', 175),
('DoctrineMigrations\\Version20230214011913', '2023-02-14 02:24:39', 715),
('DoctrineMigrations\\Version20230214013500', '2023-02-14 02:35:05', 38),
('DoctrineMigrations\\Version20230214013625', '2023-02-14 02:36:30', 44),
('DoctrineMigrations\\Version20230214104757', '2023-02-14 11:48:09', 3446),
('DoctrineMigrations\\Version20230215010824', '2023-02-15 02:08:31', 114),
('DoctrineMigrations\\Version20230215065508', '2023-02-15 07:55:19', 790),
('DoctrineMigrations\\Version20230216023000', '2023-02-16 03:30:09', 1461),
('DoctrineMigrations\\Version20230216023619', '2023-02-16 03:36:53', 46),
('DoctrineMigrations\\Version20230216024720', '2023-02-16 03:53:07', 191),
('DoctrineMigrations\\Version20230216025954', '2023-02-16 03:59:57', 230),
('DoctrineMigrations\\Version20230222030924', '2023-02-22 04:09:40', 769),
('DoctrineMigrations\\Version20230222092534', '2023-02-22 10:26:03', 2328);

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `userorder_id` int(11) DEFAULT NULL,
  `total` double NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `userorder_id`, `total`, `date`) VALUES
(79, 1, 1000, '2023-02-23 16:55:16'),
(80, 4, 3099, '2023-02-23 17:47:53'),
(81, 4, 500, '2023-02-23 18:03:42'),
(82, 1, 3999, '2023-02-24 10:27:01'),
(83, 1, 2498, '2023-02-24 10:28:46'),
(84, 1, 1699, '2023-02-24 10:36:44'),
(85, 1, 4000, '2023-02-24 10:41:45'),
(86, 1, 2500, '2023-02-24 11:51:27'),
(87, 1, 7689, '2023-02-24 12:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL,
  `oid_id` int(11) DEFAULT NULL,
  `pid_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `oid_id`, `pid_id`, `quantity`) VALUES
(16, 79, 2, 1),
(17, 80, 2, 1),
(18, 80, 16, 3),
(19, 80, 3, 1),
(20, 81, 1, 1),
(21, 82, 2, 2),
(22, 82, 4, 1),
(23, 83, 4, 1),
(24, 83, 10, 1),
(25, 84, 6, 1),
(26, 84, 12, 1),
(27, 85, 2, 1),
(28, 85, 13, 1),
(29, 86, 1, 1),
(30, 86, 11, 4),
(31, 87, 6, 11);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `idpro` varchar(255) NOT NULL,
  `namepro` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `infopro` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `idpro`, `namepro`, `price`, `infopro`, `image`, `supplier_id`) VALUES
(1, 'A01', 'Apple Watch S8 GPS', 500, 'Possessing a trendy style, the appearance has not been changed much. Actual performance and positioning of the product. Upgraded health care features, supporting better body training\r\n', 'A01.jpg', 1),
(2, 'A02', 'Apple Watch Ultra', 1000, 'New design with a somewhat aggressive design. The sharp screen is protected by Sapphire glass. Leading performance with exclusive chip\r\nThe watch runs on a 64-bit dual-core Apple S8 chip, accompanied by a W3 wireless chip and an on-board U1 ultra-wideband', 'A02.jpg', 1),
(3, 'A03', 'Apple Watch Series 7 LTE', 599, 'Modern and elegant design\r\nApple Watch S7 LTE 41 mm aluminum silicone band has an upgraded design compared to its predecessor. Possessing a luxurious and modern look, the Apple Watch S7 is designed with soft rounded corners with a curved watch face to cre', 'A03.jpg', 1),
(4, 'A04', 'Apple Watch S8 LTE', 1999, 'Apple Watch Series 8 smart watch runs on dual-core Apple S8 chip with outstanding power for the ability to handle all user needs well. In addition, the watch also provides you with a large storage space when equipped with 32 GB of internal memory, allowin', 'A04.jpg', 1),
(5, 'R01', 'Realme Watch 2 pro', 1000, '\r\nYoung and trendy style\r\nRealme Watch 2 Pro smart watch in this black version for trendy colors, upgraded screen larger with 1.75 inches. Lightweight, removable silicone strap for easy changes. The weight of the watch is quite light, with only 40 grams, ', 'R01.jpg', 4),
(6, 'R02', 'Realme Watch 3', 699, '\r\nTrendy modern look\r\nRealme smartwatch has a slightly curved square face design at 4 corners, surrounded by a polycarbonate frame that gives the watch rigidity but still retains light weight. Soft, hand-friendly silicone strap gives you comfort in all ac', 'R02.jpg', 4),
(7, 'O01', 'Oppo Band', 200, 'Youthful design, full of personalityOppo Band smart bracelet brings a new look - full of personality and dynamism. The lightweight, waterproof silicone strap gives you the freedom to work all day long without worrying about being stuck in your hands. Th', 'O01.jpg', 3),
(8, 'A06', 'Apple Watch SE 2022', 2500, 'SALIENT FEATURES\r\nBesides the preeminent features of a locating watch (belonging to the line with video call features) such as: Listening to calls - 2-way messaging, video calling, positioning, setting safe areas, emergency calls SOS, block incoming stran', 'A06.jpg', 1),
(9, 'A07', '\r\nApple Watch Ultra LTE Trail 49mm cord', 999, '\r\nPersonal appearance, extremely durable Possessing the usual appearance of Apple Watch products, but with the Ultra version, Apple has equipped a Titanium frame and high-class Sapphire glass to increase the durability of the device. Moreover, the MIL-STD', 'A07.jpg', 1),
(10, 'A08', '\r\nApple Watch S8 LTE 41mm', 499, ' Modern design, suitable for a variety of styles\r\nIt can be seen that the design of Apple smartwatches has been quite similar since the first model was released in 2015. And the 41mm Apple Watch S8 LTE also has a bold Apple look with a rectangular watch f', 'A08.jpg', 1),
(11, 'A09', '\r\nApple Watch S8 GPS', 500, ' Stylish look with Apples signature design\r\nOverall, Apple Watch SE 2022 and Apple Watch Series 8 retain the same design as their predecessors, but the new Apple Watch SE version is equipped with a screen 30% larger than the Watch 3 Series version. , givi', 'A09.jpg', 1),
(12, 'R03', '\r\nXiaomi Redmi Watch 2 Lite', 1000, ' Minimalist style, neat design\r\nXiaomi Redmi Watch 2 Lite has a mass of 35 g, when worn on my hand, it is extremely comfortable to move, when playing sports, I do not feel entangled. The copper face has a size of 41.2 mm suitable for both men and women an', 'R03.jpg', 4),
(13, 'S01', '\r\nSamsung Galaxy Watch5', 3000, ' The design still has a modern beauty with a beautiful color palette\r\nSamsung Galaxy Watch5 has the familiar round face shape that we often see in its smart watches. The 44 mm version offers a rather masculine color palette but still helps the wearer exud', 'S01.jpg', 2),
(14, 'S02', '\r\nSamsung Galaxy Watch5 LTE', 2000, ' The design still has a modern beauty with a beautiful color palette\r\nSamsung Galaxy Watch5 has the familiar round face shape that we often see in its smart watches. The 44 mm version offers a rather masculine color palette but still helps the wearer exud', 'S02.jpg', 2),
(15, 'S03', '\r\nSamsung Galaxy Watch 4', 2000, ' The design still has a modern beauty with a beautiful color palette\r\nSamsung Galaxy Watch5 has the familiar round face shape that we often see in its smart watches. The 44 mm version offers a rather masculine color palette but still helps the wearer exud', 'S03.jpg', 2),
(16, 'O02', '\r\nOppo Band 2 ', 500, ' OPPO has launched the OPPO Band 2 product with an upgrade in design, health monitoring features and sports modes to support users to take care of their body in a scientific way.Compact design, no entanglement during use. The point that impresses me when ', 'O02.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `namesup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `namesup`) VALUES
(1, 'Apple'),
(2, 'SamSung'),
(3, 'Oppo'),
(4, 'Realme');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `phone`, `address`) VALUES
(1, 'nguyenanhtrinh05@gmail.com', '[\"ROLE_USER\"]', '$2y$13$g07UKxiEJ2pLMQuKMRbJPebpBIWHGxObjp8zoB7Qj0cHN3W08tD/a', 'taotentrinh', '0919723728', 'soc trang'),
(3, 'hihi05@gmail.com', '[\"ROLE_USER\"]', '$2y$13$fG1KAuLbGSh2Cdf8sB8ZBeqYeU2gtaB56yhmTTLpPepmilO7Jta0W', 'taotentrinh', '0919723728', 'soc trang'),
(4, 'anhtrinh@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$XgTofqZCkHarchNo.m1rZO0xWlwUTPHAM5wao75wcW3AKrVbe5lP2', 'Anhtrinh', '0919723729', 'hihi'),
(5, 'haolo@gmail.com', '[\"ROLE_USER\"]', '$2y$13$svTljhw1wu8wgs/bG.e4/eUfT5hbGRQE.VpvPb0ua/KqtTq4JxIf.', 'taotenhao', '0919723728', 'ca mau'),
(6, 'hao@gmail.com', '[\"ROLE_USER\"]', '$2y$13$T79wfBjpr7nliCydYgpj4.vCTnC1fZwrJyX.wj48KSrA7iFwe7Spe', 'haohao', '1234567890', 'ca mau');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BA388B7F2415B3E` (`proid_id`),
  ADD KEY `IDX_BA388B786B43101` (`usercart_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F5299398A1DA924F` (`userorder_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_27A0E7F2F1067566` (`oid_id`),
  ADD KEY `IDX_27A0E7F2386C528` (`pid_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD2ADD6D8C` (`supplier_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_BA388B786B43101` FOREIGN KEY (`usercart_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_BA388B7F2415B3E` FOREIGN KEY (`proid_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_F5299398A1DA924F` FOREIGN KEY (`userorder_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_27A0E7F2386C528` FOREIGN KEY (`pid_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `FK_27A0E7F2F1067566` FOREIGN KEY (`oid_id`) REFERENCES `order` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD2ADD6D8C` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
