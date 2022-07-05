-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 04:36 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_unique` int(8) NOT NULL,
  `cart_id` int(8) NOT NULL,
  `game_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int(10) UNSIGNED NOT NULL,
  `game_name` varchar(50) NOT NULL,
  `relese_date` date NOT NULL,
  `game_info` varchar(255) NOT NULL,
  `game_price` decimal(10,2) NOT NULL,
  `game_image` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `game_name`, `relese_date`, `game_info`, `game_price`, `game_image`) VALUES
(15, 'Forza Horizon 5', '2022-01-13', 'Forza Horizon 5 is a 2021 racing video game developed by Playground Games and published by Xbox Game Studios.', '52.99', 'Forza-Horizon-5.jpg'),
(16, 'Battlefield 2042 ', '2020-12-31', 'Battlefield 2042 is a first-person shooter video game developed by DICE and published by Electronic Arts.', '1.99', 'battlefield2042.jpg'),
(17, 'Halo Infinite ', '2020-08-05', 'Halo Infinite is a first-person shooter game developed by 343 Industries and published by Xbox Game Studios. It is the sixth mainline entry in the Halo series, and the third in the \"Reclaimer Saga\" following Halo 5: Guardians.', '31.99', 'Halo_Infinite48.jpg'),
(18, 'Marvel\'s Guardians of the Galaxy', '2020-12-25', 'Marvel\'s Guardians of the Galaxy is a 2021 action-adventure game developed by Eidos-Montréal and published by Square Enix.', '99.20', 'avangers.jpg'),
(19, 'Call of Duty: Vanguard ', '2020-12-30', 'Call of Duty: Vanguard is a 2021 first-person shooter game developed by Sledgehammer Games and published by Activision. It was released on November 5 for Microsoft Windows, PlayStation 4, PlayStation 5, Xbox One, and Xbox Series X/S. It serves as the 18th', '40.34', 'cod.jpg'),
(20, 'Age of Empires IV ', '2020-12-01', 'Age of Empires IV is a real-time strategy video game developed by Relic Entertainment in partnership with World\'s Edge and published by Xbox Game Studios. It is the fourth installment of the Age of Empires series.', '14.43', 'empires4.jpg'),
(22, 'Far Cry 6 ', '2021-12-30', 'Far Cry 6 is a 2021 action-adventure first-person shooter game developed by Ubisoft Toronto and published by Ubisoft. It is the sixth main installment in the Far Cry series and the successor to 2018\'s Far Cry 5.', '67.09', 'farcry6.jpg'),
(23, 'The Legend of Zelda: Breath of the Wild ', '2021-07-06', 'The Legend of Zelda: Breath of the Wild is a 2017 action-adventure game developed and published by Nintendo for the Nintendo Switch and Wii U consoles. Breath of the Wild is the nineteenth installment of The Legend of Zelda franchise and is set at the end', '37.87', 'zelda.jpg'),
(24, 'Metroid Dread ', '2021-10-08', 'Metroid Dread is an action-adventure game developed by MercurySteam and Nintendo EPD, released on October 8, 2021, for the Nintendo Switch. Players control bounty hunter Samus Aran as she investigates the source of a mysterious transmission on the planet ', '9.12', 'metroid.jpg'),
(25, 'Deathloop ', '2021-12-26', 'Deathloop is a 2021 first-person shooter game developed by Arkane Studios and published by Bethesda Softworks. It was released on September 14 for Microsoft Windows and as a timed console exclusive for the PlayStation 5.', '43.21', 'deathloop.jpg'),
(26, 'Elden Ring ', '2022-01-05', 'Elden Ring is an action role-playing game developed by FromSoftware and published by Bandai Namco Entertainment. The game, directed by Hidetaka Miyazaki, was made in collaboration with fantasy novelist George R. R. Martin, who supplied a foundation for th', '56.32', 'elden.jpg'),
(27, 'The Medium ', '2021-12-28', 'The Medium is a psychological horror video game developed and published by Bloober Team. It was released for Microsoft Windows and Xbox Series X/S on January 28, 2021 and was released for PlayStation 5 on September 3, 2021.', '1.99', 'medium.jpg'),
(28, 'It Takes Two ', '2022-01-08', 'It Takes Two is an action-adventure platform game developed by Hazelight Studios and published by Electronic Arts. The game was released for Microsoft Windows, PlayStation 4, PlayStation 5, Xbox One and Xbox Series X/S in March 2021.', '35.11', 'two.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(8) NOT NULL,
  `role` varchar(20) NOT NULL,
  `userName` varchar(128) NOT NULL,
  `userLast` varchar(128) NOT NULL,
  `userUserName` varchar(128) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userPwd` varchar(128) NOT NULL,
  `userItems` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `role`, `userName`, `userLast`, `userUserName`, `userEmail`, `userPwd`, `userItems`) VALUES
(12, 'admin', 'Emsar', 'Omic', 'Emsar2000', 'emsar.omic@outlook.com', '$2y$10$zFfI87mA4GCLh7Id3N2Kz.TU1r3fIDJDAXiwm1wCsP3ceMuTxDQHm', ''),
(16, '', 'adnan', 'dzindo', 'adnan', 'adnan@gmail.com', '$2y$10$aJg9RY7s.wD/nz.LXEHM2OjUlPL9Qb/Duv/F3qkVwpqZoTcdMNkRK', ''),
(17, '', 'tarik', 'tarik', 'tarik', 'tarik@gmail.com', '$2y$10$QhjwREPZB915XK5ZHvUWqOzuVQ.KZt9LedVFeZsa9qUjQBjNT3xYO', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_unique`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_unique` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
