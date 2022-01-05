-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 08:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meal planning`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `InPantry` tinyint(1) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Cost` decimal(65,2) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `Name`, `InPantry`, `Type`, `Cost`, `UserID`) VALUES
(4, 'Bread', 1, 'carbs', '2.39', 7),
(8, 'Pasta Sauce', 1, 'other', '4.45', 7),
(11, 'Carrots', 1, 'veg', '2.56', 7),
(17, 'Almond Butter', 1, 'other', '3.69', 7),
(19, 'Cheese', 1, 'dairy', '1.99', 7),
(20, 'Sliced Ham', 1, 'meat', '4.49', 7),
(21, 'Mustard', 1, 'other', '2.00', 7),
(22, 'Chicken', 1, 'meat', '8.79', 7),
(23, 'Alfredo Sauce', 1, 'dairy', '2.66', 7),
(24, 'Chives', 1, 'other', '1.00', 7),
(26, 'Milk', 1, 'dairy', '3.45', 7),
(27, 'Cereal', 1, 'carbs', '3.67', 7),
(34, 'Taco Shells', 1, 'carbs', '4.56', 7),
(35, 'Ground Beef', 0, 'meat', '5.68', 7),
(36, 'Salsa', 0, 'other', '3.45', 7),
(37, 'Rice', 0, 'carbs', '4.90', 7),
(38, 'Black Beans', 1, 'veg', '0.75', 7),
(39, 'Eggs', 0, 'dairy', '4.29', 7),
(40, 'Bacon', 0, 'meat', '6.00', 7),
(42, 'Basil', 1, 'other', '4.45', 7),
(43, 'Rosemary', 1, 'other', '3.33', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mealinclusion`
--

CREATE TABLE `mealinclusion` (
  `MealID` int(11) NOT NULL,
  `PlanID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mealplans`
--

CREATE TABLE `mealplans` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `MealType` varchar(225) NOT NULL,
  `EasyPrep` tinyint(1) NOT NULL,
  `Calories` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Recipe` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `Name`, `MealType`, `EasyPrep`, `Calories`, `UserId`, `Recipe`) VALUES
(41, 'Sandwich', 'lunch', 1, 0, 7, ''),
(42, 'Alfredo Chicken', 'dinner', 1, 0, 7, ''),
(43, 'Tacos', 'lunch', 1, 0, 7, ''),
(44, 'Cereal', 'breakfast', 1, 0, 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `IngredientID` int(11) NOT NULL,
  `MealID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`IngredientID`, `MealID`) VALUES
(4, 41),
(19, 41),
(20, 41),
(21, 41),
(22, 42),
(23, 42),
(26, 42),
(40, 42),
(34, 43),
(35, 43),
(36, 43),
(37, 43),
(38, 43),
(40, 43),
(26, 44),
(27, 44);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `ProfilePicture` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `ProfilePicture`) VALUES
(7, 'Thistle', '$2y$10$dDkOjFcIIwg/j/QG8NQruO5RvfbxfgADYDoovBFBvDLxII66ISWwa', 'pizza'),
(8, 'DrB', '$2y$10$8P8rVLbwczrngvbH/ZTu/OqW537aH//d7CQAItsG18kUMceZmENVq', 'wine');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `ingredients_fk0` (`UserID`);

--
-- Indexes for table `mealinclusion`
--
ALTER TABLE `mealinclusion`
  ADD KEY `MealInclusion_fk0` (`MealID`),
  ADD KEY `MealInclusion_fk1` (`PlanID`);

--
-- Indexes for table `mealplans`
--
ALTER TABLE `mealplans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MealPlans_fk0` (`UserID`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `Meals_fk0` (`UserId`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD KEY `Recipes_fk0` (`IngredientID`),
  ADD KEY `Recipes_fk1` (`MealID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `mealplans`
--
ALTER TABLE `mealplans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_fk0` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `mealinclusion`
--
ALTER TABLE `mealinclusion`
  ADD CONSTRAINT `MealInclusion_fk0` FOREIGN KEY (`MealID`) REFERENCES `meals` (`id`),
  ADD CONSTRAINT `MealInclusion_fk1` FOREIGN KEY (`PlanID`) REFERENCES `mealplans` (`id`);

--
-- Constraints for table `mealplans`
--
ALTER TABLE `mealplans`
  ADD CONSTRAINT `MealPlans_fk0` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`);

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `Meals_fk0` FOREIGN KEY (`UserId`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `Recipes_fk0` FOREIGN KEY (`IngredientID`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `Recipes_fk1` FOREIGN KEY (`MealID`) REFERENCES `meals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
