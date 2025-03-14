-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 09:23 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `produk` varchar(200) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `produk`, `harga`, `deskripsi`, `stok`) VALUES
(1, 'Asus TUF A15 FA506NFR-R725B6T-O Gaming Laptop - Graphite Black', 10549000, '• Processor: AMD Ryzen™ 7 7435HS Mobile Processor\r\n• Memory: 16GB DDR5-5600 SO-DIMM\r\n• Storage: 512GB PCIe® 4.0 NVMe™ M.2 SSD\r\n• Graphics : NVIDIA® GeForce RTX™ 2050 Laptop GPU 4GB GDDR6\r\n• Operating System : Windows 11 Home + Office Home and Student 2021', 20),
(2, 'Alienware M15 R5 R7-5800H', 39000000, '• Deskripsi Produk :\r\n• 15.6\" QHD (2560 x 1440) 240Hz 2ms with ComfortView Plus, NVIDIA G-SYNC and Advanced Optimus\r\n• AMD® Ryzen™ R7 5800H (8-Core, 20MB Total Cache, up to 4.4 GHz)\r\n• 32GB DDR4 3200MHz\r\n• 1TB M.2 PCIe NVMe Solid State Drive\r\n• Nvidia® Geforce™ RTX-3070 8GB GDDR6\r\n• Microsoft® Windows® 10 Home (English) 64 Bit\r\n• Microsoft® Office® Home & Student 2019', 10),
(3, 'Xiaomi Google TV A 43 2025 FHD', 2281000, '• - Mendukung Dolby Audio™, DTS:X, dan DTS®\r\n• - Remot Kontrol Bluetooth 360°\r\n• - Resolusi FHD 1080P\r\n• - Desain Bezel Ultra Tipis', 75),
(4, 'JBL Pulse 5 Bluetooth Speaker, USB C Charging, IP67 Dustproof, Waterproof, Multi-Color LED, Coaxial 2-Way Speaker', 3737000, '• Fitur\r\n• Pertunjukan cahaya 360 derajat yang menarik perhatian\r\n• Suara yang mantap dan bass yang dalam ke segala arah\r\n• Tahan debu dan kedap air IP67\r\n• Waktu putar 12 jam\r\n• Streaming Bluetooth nirkabel\r\n• Tambah keseruan dengan PartyBoost', 45),
(5, 'Erigo T-Shirt Oversize Pocket Ceol Olive', 113000, 'Oversize T-shirt menjadi lebih menarik dengan tambahan saku! Hadir dengan pilihan warna yang timeless dan menggunakan bahan yang nyaman. T-shirt essential ini tidak akan lama tergantung di dalam lemari, karena akan jadi pilihan T-shirt yang digunakan lagi dan lagi!\r\n\r\n\r\n\r\nHighlights:\r\n\r\n- Fitting Oversize\r\n\r\n- 1 Saku Patch di Bagian Dada\r\n\r\n- Slip label\r\n\r\n\r\nBahan: Cotton Combed 20s', 44),
(6, 'Erigo Shirt Jacket Dalvir Navy Unisex', 151000, '• - Regular-fit\r\n• - Kancing emboss\r\n• - Detail contrast stitching (Bartack stitch)\r\n• - 2 Saku lipit di bagian dada', 65),
(7, 'Carvil Sandal Pria RAFALO-01 M BLACK', 152000, 'Tersedia Ukuran : 40, 41, 42, 43, 44', 100),
(8, 'Carvil Sandal Wanita MELISSA-01 L RED\r\n', 157900, 'Tersedia Ukuran : 38, 39, 40, 41, 42, 43, 44', 100),
(9, 'Helm KYT Kyoto White - Half Face', 383000, '• ·        -  Helm half face\r\n• ·         - Didesain trendy\r\n• ·         - Busa bagian dalam helm yang mudah dilepas dan dicuci\r\n• ·         - Telah berstandarisasi DOT & SNI 1811-2007', 40),
(10, '9 to 12 Signature Atelier Double Pleats Shirt Kemeja Lipit Lengan Pendek Wanita Stylish - Cream Soft Peach', 159000, '• Lingkar Dada: 100 cm\r\n•Panjang Lengan: 25 cm\r\n•Panjang Badan: 57 cm\r\n•(Toleransi Ukuran: 1-2 cm)\r\n•Tinggi Model: 170 cm\r\n•Material: Katun Poplin Premium\r\n• Kemeja wanita dengan desain trendy dan detail lipit di bagian depan yang chic.\r\n• Cocok untuk ke kantor, santai, dan semi formal.\r\n• Dilengkapi dengan bukaan kancing depan.', 50),
(11, 'POLICE Kemeja Printing Cotton Regular Fit Pria\r\n', 144000, '\r\nKategori	Kemeja Formal Pria\r\nMerk\r\nPolice\r\nGratis retur 15 hari (semua alasan)\r\n• Short sleeves shirt\r\n• Desain casual\r\n• Detail graphic print pada bagian depan, front button opening & left chest pocket\r\n• Regular fit\r\n• Material Cotton\r\n• Bahan halus & nyaman', 46),
(12, 'Infinix Note 50 Pro', 3199000, 'Spesifikasi Infinix Note 50 Pro 8/256GB :  * Dimension : 163.26x74.43x7.32mm * Weight : 198g * Processor : MediaTek Helio G100 Ultimate * Operating System : XOS 15 * Ram : 8+8GB * Rom : 256GB * Display : 6.78” FHD+ AMOLED * Battery : 5200 mAh * Charger : 90W * Reverse Charger : Max 10W * Network : 4G/3G/2G * Camera : Front 32MP, Rear 50MP OIS+2MP+Flicker Sensor * Video : 2K 30FPS/1080p 60FPS/1080p 30FPS/720p 30 FPS * Dual Speakers Tuned by JBL * One-Tap Infinix AI∞ * Ultra-Resilient ArmorAlloy *', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
