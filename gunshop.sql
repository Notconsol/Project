-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2025 at 12:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gunshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `name`) VALUES
(3, 'Bullets'),
(6, 'Clothes & Shoes'),
(4, 'Knives & Tools'),
(8, 'More'),
(5, 'Optics'),
(1, 'Sports pistols'),
(7, 'Tuning'),
(2, 'Weapons');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `in_stock` tinyint(1) DEFAULT 1,
  `image_path` varchar(255) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `in_stock`, `image_path`, `subcategory_id`) VALUES
(1, 'SPORTS PISTOL STACCATO XL 9MM 5.4', 8965.52, 1, '../img/SportPistols/Staccato.png', 1),
(2, 'SPORTS PISTOL CARL WALTHER Q5 MATCH SF VINTAGE CAL. 9X19', 8640.57, 1, '../img/SportPistols/CARLWALTHER.jpg', 1),
(3, 'SPORTS PISTOL CARL WALTHER Q5 MATCH SF THE PATRIOT 9X19', 7396.80, 1, '../img/SportPistols/patriot.png', 1),
(4, 'SPORTS PISTOL MAGNUM RESEARCH DESERT EAGLE L5 CAL.50 5`` BLK', 7099.67, 1, '../img/SportPistols/magnum.png', 1),
(5, 'SPORTS PISTOL CARL WALTHER Q5 MATCH OR 5` CAL. 9X19 MM', 4143.08, 1, '../img/SportPistols/WALTHERQ5.png', 1),
(6, 'SPORTS PISTOL CARL WALTHER PDP FULL SIZE STEEL FRAME MATCH 5.0', 3703.92, 1, '../img/SportPistols/WALTHERPDP.png', 1),
(7, 'SPORTS PISTOL SIG SAUER P320 AXG LEGION OR 9MM', 3648.10, 1, '../img/SportPistols/Legionp320.png', 1),
(8, 'SPORTS PISTOL SIG SAUER P220 LEGION FULL SIZE OR 45 AUTO', 3519.56, 1, '../img/SportPistols/Legionp220.png', 1),
(9, 'SPORTS PISTOL SIG SAUER M17X OR 9MM+ROMEO M17', 3316.65, 1, '../img/SportPistols/M17X.png', 1),
(10, 'SPORTS PISTOL SIG SAUER P365 AXG LEGION OR 9MM', 3128.61, 1, '../img/SportPistols/Legionp365.png', 1),
(11, 'SPORTS PISTOL SPRINGFIELD 1911 EMISSARY 9MM 5\" STAINLESS', 2782.29, 1, '../img/SportPistols/SPRINGFIELD.png', 1),
(12, 'SPORTS PISTOL SIG SAUER P320 SPECTER COMP BLACKOUT OR 9MM', 2772.73, 1, '../img/SportPistols/Blackout.png', 1),
(13, '18059 RIFLED CARBINE BARRETT M107A1', 37253.04, 1, '../img/Weapon/BARRETT.png', 2),
(14, 'RIFLED CARABINER FN SCAR 20S NRCH MULTI-CAM CAL.308 WIN FDE', 13257.22, 1, '../img/Weapon/SCAR.png', 2),
(15, 'MPA6.5BA SG/SF RH DEFIANCE DEVIANT SNIPER GREEN RIFLE', 8773.48, 1, '../img/Weapon/DEVIANT.png', 2),
(16, 'RIFLED CARBINE LWRC REPR MKII 308 WIN 20`` TUNGSTEN GREY', 10863.55, 1, '../img/Weapon/TUNGSTEN.png', 2),
(17, 'MRA RIFLED CARABINER MATRIX PRO RH DEFIANCE DEVIANT BRONZE', 9352.17, 1, '../img/Weapon/DEFIANCE.png', 2),
(18, 'RIFLED CARABINER FN SCAR 20S NRCH CAL.308 WIN BLACK', 12465.90, 1, '../img/Weapon/SCAR 20S.png', 2),
(19, 'RIFLED CARABINER FN SCAR 17S NRCH CAL.308 WIN BLACK', 11477.31, 1, '../img/Weapon/SCAR 17S.png', 2),
(20, 'RIFLED CARABINER MPA6MMBA-BB PLATINUM RH DEFIANCE DEVIANT', 8691.28, 1, '../img/Weapon/PLATINUM.png', 2),
(21, 'RIFLED CARBINE CHRISTENSEN ARMS CA10-DMR 308 WIN BRONZE', 8535.65, 1, '../img/Weapon/CHRISTENSEN.png', 2),
(22, 'RIFLED CARABINER MPA6MMBA-CSR 6MM CM RH DEFIANCE DEVIANT', 8230.96, 1, '../img/Weapon/MPA6MMBA.png', 2),
(23, 'RR-JP15MR RIFLED CARABINER JP 223 REM 18``', 6247.20, 1, '../img/Weapon/CARABINER.png', 2),
(24, 'RIFLED CARABINER ROBINSON XCR-L 223REM LIGHTWEIGHT M-LOK BLACK', 5895.38, 1, '../img/Weapon/ROBINSON.png', 2),
(25, 'SUB-CALIBER BULLET FEDERAL TROPHY COPPER SABOT SLUG K.20/76, 17.8 G', 6.80, 1, '../img/Bullets/FEDERAL.png', 7),
(26, 'SUB-CALIBER BULLET FEDERAL TROPHY COPPER SABOT SLUG K.12/76, 19.5 G', 5.04, 1, '../img/Bullets/TROPHY.png', 7),
(27, 'SUB-CALIBER BULLET FEDERAL TROPHY COPPER SABOT SLUG K. 20/70, 17.8G', 5.04, 1, '../img/Bullets/COPPER.png', 7),
(28, 'BUCKSHOT FEDERAL PERSONAL DEFENSE SHOTSHELL FORCE X2 K.12/70, 8.38 MM', 3.29, 1, '../img/Bullets/SHOTSHELL.png', 7),
(29, 'BUCKSHOT FEDERAL POWER SHOK SHOK BUCKSHOT K.12/70, 6.1MM, 35.5G', 2.30, 1, '../img/Bullets/BUCKSHOT.png', 7),
(30, 'SUB-CALIBER BULLET FEDERAL POWER SHOK SABOT SLUG K. 12/70, 28.4 G', 2.74, 1, '../img/Bullets/SHOK.png', 7),
(31, 'BUCKSHOT FEDERAL POWER SHOK BUCKSHOT - LOW RECOIL, K. 12/70, 8.38MM, 34 G', 2.63, 1, '../img/Bullets/BUCKSHOT.png', 7),
(32, 'BUCKSHOT FEDERAL POWER SHOK SHOK BUCKSHOT K.12/70, 8.38 MM, 34 G', 2.14, 1, '../img/Bullets/BUCKSHOT.png', 7),
(33, 'BULLET FEDERAL POWERSHOK RIFLED POWERSHOK SLUG K. 16/70, 22.7 G', 1.86, 1, '../img/Bullets/SLUG.png', 7),
(34, 'FEDERAL TRUBALL DEEP PENETRATOR RIFLED SLUG K. 12/70, 28.4G', 1.75, 1, '../img/Bullets/PENETRATOR.png', 7),
(35, 'TRUBALL RIFLED SLUG FEDERAL TRUBALL RIFLED SLUG LOW RECOIL K. 12/70, 28.4G', 1.76, 1, '../img/Bullets/RECOIL.png', 7),
(36, 'TRUBALL RIFLED SLUG FEDERAL TRUBALL RIFLED SLUG FEDERAL K. 12/70, 28.4G', 1.71, 1, '../img/Bullets/RECOIL.png', 7),
(37, 'FALLKNIVEN F1 PILOT SURVIVAL 3G KNIFE, BLACK MIKARTA', 745.28, 1, '../img/Knives and tools/PILOT SURVIVAL.png', 11),
(38, 'FALLKNIVEN F1 PILOT SURVIVAL 3G KNIFE, BURGUNDY MICARTA', 745.28, 1, '../img/Knives and tools/PILOT SURVIVAL1.png', 11),
(39, 'KNIFE FALLKNIVEN TK1 TRE KRONOR 3G, IVORY, LEATHER SHEATH', 767.20, 1, '../img/Knives and tools/TRE KRONOR.png', 11),
(40, 'KNIFE FALLKNIVEN TK1 TRE KRONOR 3G, COCOBOLO, LEATHER SHEATH', 767.20, 1, '../img/Knives and tools/TRE KRONOR1.png', 11),
(41, 'FALLKNIVEN KNIFE S1 FOREST KNIFE X BLACK, ZYTEL SHEATH', 394.56, 1, '../img/Knives and tools/FALLKNIVEN.png', 11),
(42, 'KNIFE FALLKNIVEN TK5 TRE KRONOR DE LUXE HUNTER 3G', 484.43, 1, '../img/Knives and tools/q.png', 11),
(43, 'FALLKNIVEN PHK PROFESSIONAL HUNTERS KNIFE 3G HUNTING, ZYTEL', 484.43, 1, '../img/Knives and tools/PHK.png', 11),
(44, 'FALLKNIVEN KNIFE S1 FOREST KNIFE X, ZYTEL SCABBARD', 356.20, 1, '../img/Knives and tools/SCABBARD.png', 11),
(45, 'FALLKNIVEN F1 PILOT SURVIVAL BLACK KNIFE, LEATHER SHEATH', 224.68, 1, '../img/Knives and tools/LEATHER.png', 11),
(46, 'TB OUTDOOR MARAUDEUR, MOX, G10, BLACK, KYDEX SHEATH', 201.39, 1, '../img/Knives and tools/KYDEX.png', 11),
(47, 'KNIFE KABAR SHORT KABAR USMC FIGHTING/UTILITY KNIFE', 230.16, 1, '../img/Knives and tools/KA-BAR.png', 11),
(48, 'PELTONEN M95 KNIFE, CERAKOTE BLACK COATING, BLACK', 367.16, 1, '../img/Knives and tools/PELTONEN.png', 11),
(49, 'OPTICAL SIGHT LEUPOLD MARK 5HD M5C3 FFP ILLUM. TREMOR 3', 5279.43, 1, '../img/Optics/LEUPOLD.png', 15),
(50, 'RIFLE SIGHT LEUPOLD MARK 5HD 7-35X56 (35MM) M5C3 FFP CCH', 4614.16, 1, '../img/Optics/MARK.png', 15),
(51, 'OPTICAL SIGHT TRIJICON TENMILE MRAD PRECISION TREE FFP', 4456.34, 1, '../img/Optics/TENMILE.png', 15),
(52, 'OPTICAL SIGHT SWAROVSKI Z8I 1,7-13,3X42 PL 4A-IF', 3818.35, 1, '../img/Optics/SWAROVSKI.png', 15),
(53, 'TRIJICON KIT OPTICAL SIGHT ACOG 4X32 BAC', 3439.25, 1, '../img/Optics/TRIJICON.png', 15),
(54, 'OPTICAL SIGHT TRIJICON CREDO 1-8X28 RED/GREEN MRAD SEGMENTED', 3122.50, 1, '../img/Optics/SEGMENTED.png', 15),
(55, 'OPTICAL SIGHT EOTECH VUDU 3.5-18X50 FFP 34MM H59 RETICLE MRAD', 3104.97, 1, '../img/Optics/EOTECH.png', 15),
(56, 'OPTICAL SIGHT LEUPOLD PATROL 6HD SFP CDS-ZL2 ILLUM. CMR2', 2415.58, 1, '../img/Optics/ILLUM.png', 15),
(57, 'OPTICAL SIGHT TRIJICON CREDO MOA 30MM CROSSHAIR SFP RED', 2321.33, 1, '../img/Optics/CROSSHAIR.png', 15),
(58, 'RIFLE SIGHT TRIJICON CREDO TREE CROSSHAIR FFP RED', 2321.33, 1, '../img/Optics/FFP.png', 15),
(59, 'TRIJICON KIT OPTICAL SIGHT ACOG 4X32 BAC', 3439.00, 1, '../img/Optics/TRIJICON.png', 15),
(60, 'RIFLE SIGHT LEUPOLD MARK 5HD 7-35X56 (35MM) M5C3 FFP CCH', 4600.22, 1, '../img/Optics/MARK.png', 15),
(61, 'MEN\'S JACKET BAKHOLD THERMO \"BERETTA\" (BROWN)', 703.59, 1, '../img/Clothes&Shoes/BAKHOLDJ.png', 19),
(62, 'MEN\'S HUNTING JACKET EXTREME DUCKER 2IN1 \"BERETTA\"', 966.87, 1, '../img/Clothes&Shoes/DUCKER.png', 19),
(63, 'MEN\'S JACKET GARCON \"BERETTA\"', 439.18, 1, '../img/Clothes&Shoes/GARCON.png', 19),
(64, 'MEN\'S JACKET DOWN \"BERETTA\"', 845.45, 1, '../img/Clothes&Shoes/DOWN.png', 19),
(65, 'MEN\'S HUNTING JACKET INSULATED STATIC EVO\"BERETTA\"', 415.35, 1, '../img/Clothes&Shoes/STATICJ.png', 19),
(66, 'MEN\'S PANTS BAKHOLD \"BERETTA\" (GREEN)', 414.21, 1, '../img/Clothes&Shoes/BAKHOLDP.png', 19),
(67, 'ANORAK JACKET FIELD GTX', 575.36, 1, '../img/Clothes&Shoes/ANORAK.png', 19),
(68, 'MEN\'S JACKET ALTAI-J \"HART\" OLIVE', 399.46, 1, '../img/Clothes&Shoes/ALTAI.png', 19),
(69, 'MEN\'S JACKET SKADE-J \"HART\" (PIXEL CAMO)', 356.34, 1, '../img/Clothes&Shoes/SKADE.png', 19),
(70, 'MEN\'S JACKET PINE FIELD \"BERETTA\"', 652.53, 1, '../img/Clothes&Shoes/PINE.png', 19),
(71, 'PANTS MEN\'S INSULATED STATIC EVO', 298.46, 1, '../img/Clothes&Shoes/STATICP.png', 19),
(72, 'MEN\'S THORNPROOF \"BERETTA\" PANTS', 559.47, 1, '../img/Clothes&Shoes/THORNPROOF.png', 19),
(73, 'MAGPUL HUNTER STOCK FOR REMINGTON 700 (SA)', 449.36, 1, '../img/Tuning/MAGPUL.png', 23),
(74, 'C8A317 STOCK KIT+HANDGUARD BERETTA TO A400 XPLOR LIGHT', 994.29, 1, '../img/Tuning/XPLOR.png', 23),
(75, 'MKE STOCK FOR T94/MP5 (TELESCOPIC)', 554.58, 1, '../img/Tuning/TELESCOPIC.png', 23),
(76, 'MDT LSS STOCK FOR HOWA-1500 / WEATHERBY VANGUARD', 3818.35, 1, '../img/Tuning/HOWA.png', 23),
(77, 'STOCK OF FAB M4 WITH SHOCK ABSORBER FOR AK 47, POLYMER', 317.62, 1, '../img/Tuning/ABSORBER.png', 23),
(78, 'STOCK TELESCOPIC FAB, FOR AKMS, WITH SHOCK ABSORBER', 318.66, 1, '../img/Tuning/FAB.png', 23),
(79, 'MAGPUL HUNTER X-22 STOCK FOR RUGER 10/22 ODG', 279.48, 1, '../img/Tuning/ODG.png', 23),
(80, 'MAGPUL HUNTER X-22 STOCK FOR RUGER 10/22 ODG FDE', 279.48, 1, '../img/Tuning/FDE.png', 23),
(81, 'MAGPUL HUNTER X-22 STOCK FOR RUGER 10/22 TAKEDOWN', 286.06, 1, '../img/Tuning/TAKEDOWN.png', 23),
(82, 'WOODEN STOCK TO BENELLI RAFFAELLO ELEGANT', 234.88, 1, '../img/Tuning/ELEGANT.png', 23),
(83, 'C71274 STOCK PLASTIC CAMOUFLAGE. BERETTA', 234.65, 1, '../img/Tuning/PLASTIC.png', 23),
(84, 'STOCK TELESCOPIC FAB M4 FOR AK 47, POLYMER, BLACK', 230.16, 1, '../img/Tuning/TELESCOP.png', 23),
(85, 'LR80R HAND-HELD FLASHLIGHT FENIX LR80R', 516.47, 1, '../img/More/LR80R.png', 27),
(86, 'LR60R HAND-HELD FLASHLIGHT FENIX LR60R', 483.63, 1, '../img/More/LR60R.png', 27),
(87, 'LR50R HAND-HELD FLASHLIGHT FENIX LR50R', 344.31, 1, '../img/More/LR50R.png', 27),
(88, 'HT30R HANDHELD LASER FLASHLIGHT FENIX HT30R', 340.69, 1, '../img/More/HT30R.png', 27),
(89, 'LEDLENSER H19R CORE HEAD LIGHT', 205.40, 1, '../img/More/H19R.png', 27),
(90, 'LEDLENSER H15R CORE HEAD LIGHT', 163.42, 1, '../img/More/H15R.png', 27),
(91, 'LEDLENSER MH11 BLACK&GRAY HEAD LIGHT', 156.61, 1, '../img/More/MH11.png', 27),
(92, 'LEDLENSER H7R SIGNATURE HEADLAMP', 123.70, 1, '../img/More/H7R.png', 27);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `review_text` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_name`, `rating`, `review_text`, `created_at`) VALUES
(11, 39, 'Jane', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere.', '2025-03-12 16:15:19'),
(12, 74, 'John', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pharetra ornare placerat. Donec cursus turpis in justo rhoncus, non pharetra.', '2025-05-02 00:45:55');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `main_category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `main_category_id`) VALUES
(1, 'Sports pistols', 1),
(2, 'Firearms', 2),
(3, 'Air Guns', 2),
(4, 'Traumatic weapon', 2),
(5, 'Revolvers', 2),
(6, 'Flare pistols', 2),
(7, 'Smoothbore cartridges', 3),
(8, 'Cartridges for rifled weapons', 3),
(9, 'Ammunition for traumatic weapons', 3),
(10, 'Flare rounds', 3),
(11, 'Knives', 4),
(12, 'Machete', 4),
(13, 'Multitools', 4),
(14, 'Axes, Shovels and more', 4),
(15, 'Sights Observation', 5),
(16, 'Observation devices', 5),
(17, 'Night vision sights & devices (NVB)', 5),
(18, 'Mounting', 5),
(19, 'Outwear', 6),
(20, 'Shoes', 6),
(21, 'Hats', 6),
(22, 'Gloves', 6),
(23, 'Adjustable stocks', 7),
(24, 'Handguard', 7),
(25, 'Magazines', 7),
(26, 'Pistol grips', 7),
(27, 'Lights', 8),
(28, 'Weapon safes', 8),
(29, 'Cleaning & Care', 8),
(30, 'Accessories', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `login`, `password_hash`, `join_date`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 'johndoe', '$2y$10$ibiHKobCCmjySh3UvH4CLeTIOqqc4h.U.G/cNfl0KTh1FyBlKOfcq', '2022-06-21 18:32:15'),
(2, 'Jane', 'Doe', 'jane.doe@example.com', 'janedoe', '$2y$10$vTOyNhr9m84bkbwhGVagTe7BMGKCxfgg9aTcpJYJjIkAKcYdsnkSa', '2024-05-08 18:51:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
