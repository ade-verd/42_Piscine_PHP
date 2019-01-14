-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Jan 13, 2019 at 01:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_minishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`) VALUES
(14);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `ref`, `name`, `price`, `image`) VALUES
(4, 1, 'Green carpet', 559.69, 'https://www.ikea.com/sg/en/images/products/stockholm-rug-low-pile-green__0602999_PE680619_S4.JPG'),
(5, 2, 'Blue carpet', 199.85, 'https://www.ikea.com/sg/en/images/products/sonderod-rug-high-pile-blue__0602993_PE680614_S4.JPG'),
(6, 3, 'Mulitcolor carpet', 159.36, 'https://www.ikea.com/fr/fr/images/products/halved-tapis-tisse-a-plat-coloris-assortis__0603024_PE680632_S4.JPG'),
(7, 4, 'Flower vase', 24.95, 'https://www.ikea.com/sg/en/images/products/stockholm-bowl-yellow__0419250_PE576167_S4.JPG'),
(8, 5, 'Clear Blue vase', 23.89, 'https://www.ikea.com/sg/en/images/products/pepparkorn-vase-blue__0654737_PE708796_S4.JPG'),
(9, 6, 'White vase', 6.75, 'https://www.ikea.com/sg/en/images/products/foremal-vase-white__0597015_PE677003_S4.JPG'),
(10, 7, 'Pink lamp', 19.96, 'https://www.ikea.com/sg/en/images/products/fado-table-lamp-pink__0513811_PE639149_S4.JPG'),
(11, 8, 'Panda lamp', 14.95, 'https://www.ikea.com/fr/fr/images/products/angarna-lampe-de-table-a-led__0628707_PE693958_S4.JPG'),
(12, 9, 'Blue lamp', 29.45, 'https://www.ikea.com/fr/fr/images/products/vaxjo-suspension-bleu__0540561_PE653055_S4.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `id_category` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`id_category`, `id_article`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(2, 1),
(2, 2),
(2, 3),
(4, 4),
(4, 5),
(4, 6),
(3, 7),
(3, 8),
(3, 9),
(5, 3),
(6, 2),
(6, 5),
(6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'all'),
(2, 'carpets'),
(3, 'lamps'),
(4, 'vases'),
(5, 'multicolor'),
(6, 'blue articles');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `id_user`, `id_article`, `quantity`, `status`, `date_order`) VALUES
(1, 12, 4, 1, 'In progress', '2019-01-13 18:54:10'),
(2, 12, 12, 1, 'In progress', '2019-01-13 18:54:10'),
(3, 12, 6, 1, 'In progress', '2019-01-13 18:54:10'),
(4, 12, 5, 1, 'In progress', '2019-01-13 18:54:10'),
(5, 13, 6, 1, 'In progress', '2019-01-13 19:01:45'),
(6, 13, 7, 1, 'In progress', '2019-01-13 19:01:45'),
(7, 13, 5, 1, 'In progress', '2019-01-13 19:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(10, 'gabriele', '$2y$10$FNgclHo7KezRZd/04psOu.n/Hnlrfv6vszYQSIeDRzBdHPwsIv.mO'),
(11, 'katinas', '$2y$10$/6DCLbLlaZ/SAVxf940mj.FkGwUSV19x6YUoXXPDiRZYir3v/pynu'),
(12, 'titi', '$2y$10$Ub3ZyLFYYYbo0A2HogJQAOQBVjoVBCqf7scZefk39D8F./fNOn8am'),
(13, 'toto', '$2y$10$sGORccmFVBsd7i9HVATvvu05lEvl3.ZUdpGqOKgaW/KHuZOfqJwo6'),
(14, 'admin', '$2y$10$mLuzh9Dz9WOWy6x6noNRNOUnNwcU5b8L00e77.2kehYvCOZMmapiO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
