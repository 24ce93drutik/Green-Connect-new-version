-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2025 at 06:10 PM
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
-- Database: `green_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `content_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `content_title` varchar(50) NOT NULL,
  `content_discription` text NOT NULL,
  `content_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`content_id`, `name`, `content_title`, `content_discription`, `content_date`) VALUES
(7, 'swapnil', 'Provide Adequate Sunlight', 'Plants need the right amount of sunlight to carry out photosynthesis, which is essential for their growth. Most indoor plants thrive with indirect light, while flowering and vegetable plants need stronger, direct sunlight for several hours a day. Ensuring your plant gets the correct light intensity and duration helps it stay healthy and grow faster.', '2025-11-17'),
(8, 'Rutik', 'Water Correctly and Consistently', 'Watering is crucial, but too much or too little can harm your plants. Always check the soil before watering—if the top layer feels dry, it’s time to water. Overwatering can cause root rot, while underwatering can dry out the plant and stunt its growth. Try to water in the morning so the plant can use moisture throughout the day.', '2025-11-17'),
(9, 'Avishkar', 'Use Nutrient-Rich Soil and Fertilizer', 'Healthy soil is the foundation of strong plant growth. A good soil mix should be well-draining, loose, and rich in organic matter. Adding compost or natural fertilizers like vermicompost every few weeks replenishes nutrients, supports root development, and boosts plant health and productivity.', '2025-11-17'),
(10, 'anushka', 'Ensure Good Air Circulation', 'Plants grow better in environments with fresh, moving air. Good airflow helps prevent fungal infections, pest infestations, and moisture buildup. Keep your plants in ventilated spaces where there is gentle air movement, but avoid placing them in strong winds or direct blasts from fans and air conditioners.', '2025-11-17'),
(11, 'arjun', 'Repot Plants When They Outgrow Their Pots', 'As plants grow, their roots need more space to spread. When a plant becomes root-bound or shows slow growth, it’s time to repot it into a slightly larger container. Repotting with fresh soil gives the plant new nutrients and room to expand, leading to healthier and faster growth.', '2025-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(25) NOT NULL,
  `p_image` varchar(50) NOT NULL,
  `p_description` text NOT NULL,
  `p_location` varchar(25) NOT NULL,
  `p_owner_name` varchar(25) NOT NULL,
  `p_phone_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `p_name`, `p_image`, `p_description`, `p_location`, `p_owner_name`, `p_phone_no`) VALUES
(14, 'sunflower', 'uploads/1763364725_sunflower.webp', 'Sunflowers are large plants with a flower head that looks like a single flower but is actually made of hundreds of tiny ones. ', 'punjab', 'Swapnil', 78945633),
(15, 'lily ', 'uploads/1763364808_lily plant.jpg', 'Lilies are tall, perennial flowering plants from the genus Lilium known for their large, often fragrant, and trumpet-shaped flowers that come in a wide variety of colors like white, pink, yellow, and orange', 'jamukashmir ', 'samarth', 97552456),
(16, 'rose plant', 'uploads/1763364902_rose plant.webp', 'A rose is a woody perennial flowering plant in the genus Rosa, which is known for its ornamental flowers that vary widely in size, shape, and color and its stems that often have sharp prickles.', 'goa', 'rutik', 2147483647),
(17, 'zebra plant', 'uploads/1763364979_zebra plant.jpg', 'A \"Zebra Plant\" can refer to two popular houseplants: Aphelandra squarrosa (a tropical with yellow flowers and striped leaves) or Haworthiopsis fasciata (a succulent with white bumps on its dark green leaves)', 'sout', 'arjun', 2147483647),
(18, 'spider plant', 'uploads/1763365076_spider plant.jpg', 'Spider plants are resilient, low-maintenance houseplants, scientifically named Chlorophytum comosum, native to southern and tropical Africa', 'panjim', 'shafak', 2147483647),
(19, 'hibiscus', 'uploads/1763365295_hibiscus.jpg', 'Hibiscus are a genus of flowering plants in the Mallow family, known for their large, showy, trumpet-shaped flowers in various colors like red, pink, yellow, and white.', 'mumbai', 'harshal', 2147483647),
(20, 'jasmine', 'uploads/1763365450_jasmine.webp', 'Jasmine is a genus of fragrant shrubs and vines, often native to tropical and subtropical regions', 'bhandora', 'ravi', 2147483647),
(21, 'marigold', 'uploads/1763365545_marigold.jpg', 'Marigold is an annual plant known for its vibrant flowers in yellow, orange, and red, which have both ornamental and practical uses, including repelling pests', 'navelim', 'olivia', 2147483647),
(22, 'bamboo', 'uploads/1763365736_bamboo.jpg', 'Bamboo is a giant, fast-growing grass known for its woody, hollow stems (culms) that are strong and versatile', 'gujarat', 'rosy', 2147483647),
(26, 'cactus', 'uploads/1763369804_cactus.jpg', 'hfdbkfdskjf', 'panjim', 'Guari', 496546);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_no` int(10) NOT NULL,
  `user_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`user_id`, `username`, `user_email`, `user_no`, `user_password`) VALUES
(1, 'Ck_Nadu', 'rutik@gmail.com', 7875, 'rutik'),
(2, 'Samarth', 'samarth1234@gmail.com', 955151566, 'roshni'),
(3, 'swapnil jadhav', 'swapniljadhav3025@gmail.com', 2147483647, 'pcce swapnil'),
(4, 'gauri', 'guari@gmail.com', 6456, 'gauri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `content_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
