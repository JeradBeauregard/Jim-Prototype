-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2025 at 05:53 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jim_prototype`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `default_rest` int(11) DEFAULT '120',
  `is_custom` tinyint(1) DEFAULT '0',
  `muscle_group` varchar(100) DEFAULT NULL,
  `equipment` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `default_sets` int(11) DEFAULT '3',
  `default_reps` int(11) DEFAULT '12',
  `default_weight` int(11) DEFAULT '0',
  `default_time_per_set` int(11) DEFAULT '60'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `name`, `category`, `default_rest`, `is_custom`, `muscle_group`, `equipment`, `type`, `default_sets`, `default_reps`, `default_weight`, `default_time_per_set`) VALUES
(1, 'Barbell Bench Press', 'Push', 120, 0, 'Chest', 'Barbell', 'Strength', 3, 12, 135, 60),
(2, 'Incline Dumbbell Press', 'Push', 90, 0, 'Chest', 'Dumbbell', 'Hypertrophy', 3, 12, 50, 60),
(3, 'Pull-Up', 'Pull', 150, 0, 'Back', 'Bodyweight', 'Strength', 3, 12, 0, 60),
(4, 'Barbell Row', 'Pull', 120, 0, 'Back', 'Barbell', 'Strength', 3, 12, 115, 60),
(5, 'Squat', 'Legs', 150, 0, 'Legs', 'Barbell', 'Strength', 3, 12, 185, 60),
(6, 'Romanian Deadlift', 'Legs', 120, 0, 'Hamstrings', 'Barbell', 'Hypertrophy', 3, 12, 95, 60),
(7, 'Overhead Press', 'Push', 120, 0, 'Shoulders', 'Barbell', 'Strength', 3, 12, 75, 60),
(8, 'Plank', 'Core', 60, 0, 'Abs', 'Bodyweight', 'Mobility', 3, 1, 0, 45),
(9, 'Deadlift', 'Pull', 180, 0, 'Full Body', 'Barbell', 'Strength', 3, 12, 225, 60),
(10, 'Lunges', 'Legs', 90, 0, 'Glutes', 'Dumbbell', 'Hypertrophy', 3, 12, 40, 60);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_fields`
--

CREATE TABLE `exercise_fields` (
  `id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `field_label` varchar(100) DEFAULT NULL,
  `field_type` varchar(50) NOT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `default_value` varchar(100) DEFAULT NULL,
  `step` varchar(10) DEFAULT '1',
  `order_index` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `user_id`, `name`, `tag`, `created_at`) VALUES
(1, 1, 'Push Day A', 'Push', '2025-06-19 18:23:17');

-- --------------------------------------------------------

--
-- Table structure for table `routine_exercises`
--

CREATE TABLE `routine_exercises` (
  `id` int(11) NOT NULL,
  `routine_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `position` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `routine_exercise_fields`
--

CREATE TABLE `routine_exercise_fields` (
  `id` int(11) NOT NULL,
  `routine_exercise_id` int(11) NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `field_label` varchar(100) DEFAULT NULL,
  `field_type` varchar(50) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `step` varchar(20) DEFAULT NULL,
  `order_index` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, '', '', 'jare@example.com', 'password123'),
(2, 'jerad', 'beauregard', 'jeradbeauregard@gmail.com', '$2y$10$eprZrW8JfcYf.uAmWaNsCeuQqOH6Wu/HTqKvIwnjmlg.tcLH3Wbt6'),
(3, 'olivia', 'bell', 'olivia@gmail.com', '$2y$10$Bue6tTO0LQWsyK7XKGGqzu2jNyDBFG9zXVUXkpFGjL6/rTBzgcESa'),
(4, 'olivia', 'bell', 'oliviabell@gmail.com', '$2y$10$VI7/I8Y36kfppzlv7jfg.uScp60F3PWaz94NFQ4MKaeuYkdp4CA5O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_fields`
--
ALTER TABLE `exercise_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercise_id` (`exercise_id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `routine_exercises`
--
ALTER TABLE `routine_exercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routine_id` (`routine_id`),
  ADD KEY `exercise_id` (`exercise_id`);

--
-- Indexes for table `routine_exercise_fields`
--
ALTER TABLE `routine_exercise_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routine_exercise_id` (`routine_exercise_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exercise_fields`
--
ALTER TABLE `exercise_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `routine_exercises`
--
ALTER TABLE `routine_exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routine_exercise_fields`
--
ALTER TABLE `routine_exercise_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exercise_fields`
--
ALTER TABLE `exercise_fields`
  ADD CONSTRAINT `exercise_fields_ibfk_1` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `routines`
--
ALTER TABLE `routines`
  ADD CONSTRAINT `routines_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `routine_exercises`
--
ALTER TABLE `routine_exercises`
  ADD CONSTRAINT `routine_exercises_ibfk_1` FOREIGN KEY (`routine_id`) REFERENCES `routines` (`id`),
  ADD CONSTRAINT `routine_exercises_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`);

--
-- Constraints for table `routine_exercise_fields`
--
ALTER TABLE `routine_exercise_fields`
  ADD CONSTRAINT `routine_exercise_fields_ibfk_1` FOREIGN KEY (`routine_exercise_id`) REFERENCES `routine_exercises` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
