-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 09:20 AM
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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `total`) VALUES
(1, 0, 1, 1, 5750000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_produk` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_produk`, `name`, `description`, `stock`, `image`, `category`, `price`) VALUES
(1, 'Xiaomi 11T Ultra Second', 'Keterangan Produk :\r\nXiaomi Mi 11 Ultra 5G 12/256 GB\r\nGaransi Resmi Xiaomi\r\n\r\nWarna : Ceramic Black.\r\n\r\nKondisi : Good Condition (Lecet Pemakaian), Fungsi Normal.\r\n\r\nFullset :\r\n(Unit dilengkapi dengan Box, Charger, dan Kabel) Bukan Bawaan\r\n\r\nFactory Unlock ( Dapat Menggunakan Seluruh Provider Indonesia dan Luar Negeri Karena Unit yang Kami Jual Resmi )\r\n\r\nMi Cloud ( Aman dan Sudah di Logout )', 9, 'uploads/67d78e7f0a8e4.jpg', 'Electronic', 5750000.00),
(2, 'Meja Belajar / Meja Kantor / Meja Kayu Minimalis / Meja Kerja - TYPE3-S-PUTIH', 'Fitur:\r\n- Mudah dirakit, tidak repot\r\n- Bagus dan sederhana, mudah dibersihkan\r\n- Dapat digunakan di dalam rumah. dan di luar rumah\r\n- Rangka baja yang dicat anti karat, kuat, tahan karat yang baik.\r\n- Meja lebar untuk berbagai keperluan. Baik itu meja kerja, meja komputer, meja makan, atau tempat multifungsi\r\n\r\nSpesifikasi\r\nUkuran: 120*60*75cm\r\nBerat: 17.68/19.64KG\r\nBahan: MDF+Steel frame\r\n\r\nThe BROWN+SHELF and WOOD+SHELF meja dengan rak untuk monitor atau komputer\r\n', 20, 'uploads/67d78f1e21cb4.jpg', 'Furniture', 500000.00),
(3, 'COOCAA TV 50 inch Android 10.0 - Digital TV - 4K UHD - Smart TV (COOCAA 50S5G PRO)', 'COOCAA TV 50 inch Android 10.0 - Digital TV - 4K UHD - Smart TV (COOCAA 50S5G PRO)', 30, 'uploads/67d7907fc4eba.jpg', 'Electronic', 4249000.00),
(4, 'FANTECH ATOM96 MK890V2 RGB Mechanical Gaming Keyboard - ATOM63 SKYBLUE, BLUE SWITCH', 'FANTECH ATOM96 MK890V2:\r\n*\r\nSpecifications:\r\nLayout 95%\r\n•Hotswap 3 Pin North Facing\r\n•Number of key: 96 keys\r\n•Switch type: Mechanical\r\n•Anti Ghosting: All keys\r\n•Connectivty: Wired\r\n•Adjustable Feet\r\n•10 lighting modes\r\n•Material ABS\r\n•Weight 720 g\r\n•Size 385*136*35.5 mm\r\n\r\nFANTECH ATOM81 MK875V2:\r\n*\r\nSpecifications:\r\n- Layout 75%\r\n- ⁠Hotswap 3 Pin North Facing\r\n- ⁠Number of key: 81 keys\r\n- ⁠Switch type: Mechanical\r\n- ⁠Anti Ghosting: 26 keys\r\n- ⁠Connectivty: Wired\r\n- ⁠Adjustable Feet\r\n- ⁠17 li', 40, 'uploads/67d791389eee6.jpg', 'Accessories', 218000.00),
(5, 'Anker Soundcore R50i NC Adaptive Noise Cancelling ANC TWS - A3959 - Black', '*) Garansi resmi 12 bulan\r\n*) Garansi langsung ganti baru jika rusak fungsi selama 2x24 jam sejak barang diterima dan transaksi belum diselesaikan\r\n*) Salah beli variant bisa diretur tukar tipe yang benar selama belum membuka kemasan\r\n*) Untuk klaim garansi, mohon menyertakan kemasan & screenshot invoice digital pembelian di ecommerce\r\n==================================================\r\n\r\nAnker Soundcore R50i NC Adaptive Noise Cancelling ANC TWS - A3959\r\n\r\nSoundcore R50i NC True Wireless Bluetoo', 50, 'uploads/67d791c50dfed.jpg', 'Accessories', 285000.00),
(6, 'Whiskas Adult Cat Hairball Control Makanan Kucing Kering 450gr', 'WHISKAS Makanan Kucing Kering Adult Fungsional Hairball Control rasa Chicken dan Tuna\r\n\r\n1. WHISKAS adalah 100% makanan kucing kering lengkap dan seimbang.\r\n\r\n2. Renyah di bagian luar dengan bagian tengah yang lembut dan lezat.\r\n\r\n3. Makanan kucing kering yang diformulasikan untuk membantu kesehatan saluran kemih.\r\n\r\n4. Dikhususkan untuk membantu mengurangi efek Hairball', 100, 'uploads/67d792638ee6d.jpg', 'Food', 36300.00),
(7, 'Sedaap Mie Instan Goreng Bag x 5 pcs', 'Sedaap Instant Noodle Goreng x 5 Pcs\r\nSedaap Instant Noodle Goreng isi 5 Pcs adalah mie instant goreng persembahan Wings Food yang dikemas dalam bundling kemasan pack khusus isi 5 agar lebih praktis. Diproduksi dan diproses secara higienis dibawah pengawasan ketat para ahli. Tekstur mie yang kenyal dan tidak cepat lunak serta bumbu rempah dan bawang goreng yang crispy didalamnya semakin menambah kelezatan pada saat menyantapnya.', 250, 'uploads/67d792e07e110.jpg', 'Food', 22400.00),
(8, 'Redoxon Triple Action isi 10 Tablet-Redoxon isi 10-Vit C-VitaminCorona', 'Expired date : 08/2025\r\n\r\nReady Silahkan Diorder\r\n\r\nIndikasi Umum :\r\nSuplementasi vitamin C, Vitamin D, Zinc untuk membantu menjaga daya tahan tubuh dan kesehatan.\r\n\r\nDeskripsi :\r\nREDOXON TRIPLE ACTION EFFERVESCENT dilengkapi dengan Vitamin D yang bekerja sama dengan Vitamin C dan Zinc, membantu menjaga daya tahan tubuh pada saat perjalanan, kondisi perubahan cuaca, dan paparan polusi. Vitamin C bermanfaat membantu daya tahan tubuh dan kesehatan serta berperan sebagai antioksidan untuk menangkal', 50, 'uploads/67d7936521fe4.jpg', 'Food', 43000.00),
(9, 'Rak Buku Minimalis Besar Warna Putih', 'Rak Buku Minimalis Besar Warna Putih adalah solusi sempurna untuk menyimpan dan menampilkan koleksi buku serta barang dekorasi Anda. Dengan desain minimalis dan finishing warna putih bersih, rak ini mudah dipadukan dengan berbagai gaya interior, mulai dari modern hingga klasik.\r\n\r\nRak ini dirancang dengan ukuran besar, yaitu P 160 cm x L 40 cm x T 200 cm, memberikan kapasitas penyimpanan yang optimal tanpa mengorbankan estetika. Terbuat dari bahan berkualitas tinggi, rak ini kokoh dan tahan lama', 20, 'uploads/67d7940d945af.jpg', 'Furniture', 6000000.00),
(10, 'T-Shirt Erigo Apparel Navy', 'Menggunakan Ukuran XL\r\nBahan: Katun\r\nM: Lebar Dada: 50 cm - Panjang Baju: 70 cm - Lebar Bahu: 12.5L: Lebar Dada: 52 cm - Panjang Baju: 72 cm - Lebar Bahu: 13XL: Lebar Dada: 54 cm - Panjang Baju: 74 cm - Lebar Bahu: 13.5', 85, 'uploads/67d794ac8c7d2.jpg', 'Fashion', 91000.00),
(11, 'Erigo Coach Jacket Graphic Alev Black Unisex', 'Jaket multifungsi yang memberi kenyamanan dengan gaya yang stylish. Menggunakan bahan taslan (waterproof), snap button untuk penutup jaket & lapisan furing pada bagian dalam. Dilengkapi 2 saku & tali serut di bagian bawah jaket.\r\n\r\n\r\nErigo Coach Jacket akan membuat orang jatuh cinta, ditambah dengan gambar yang dicetak pada bagian depan & belakang, menggunakan sablon plastisol sehingga gambar pada Erigo Coach Jacket akan awet & tahan lama.\r\n\r\n\r\nHighlights:\r\n\r\n- Zipper\r\n\r\n- Snap Button\r\n\r\n- Lapis', 90, 'uploads/67d7954546061.jpg', 'Fashion', 193000.00),
(12, 'Keychain Thanksinsomnia', 'Exquisite keychain crafted from pewter, featuring a detailed, reclining figure design. Perfect for adding a unique touch to your keys or as a thoughtful gift.\r\n\r\n\r\nMaterial: Pewter\r\n\r\nMade in studiomesin\r\n\r\nPERHATIAN:\r\n\r\n- Pastikan pesanan Anda sudah sesuai sebelum menyelesaikan pembayaran, karena pesanan yang masuk akan langsung diproses \r\n\r\n- Untuk mengajukan komplain, Anda wajib melampirkan video unboxing dan foto label pengiriman.', 100, 'uploads/67d7d1f294744.jpeg', 'Accessories', 12000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` mediumtext NOT NULL,
  `role` enum('admin','pembeli') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(2, 'buyer', 'e10adc3949ba59abbe56e057f20f883e', 'pembeli');

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
  ADD PRIMARY KEY (`id_produk`);

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
