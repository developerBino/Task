-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 07:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `Page_Menu`
--

CREATE TABLE `Page_Menu` (
  `pm_id_pk` int(11) NOT NULL,
  `pm_menu_name` varchar(50) DEFAULT NULL,
  `pm_menu_url` varchar(100) DEFAULT NULL,
  `pm_active` smallint(6) NOT NULL,
  `pm_added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `pm_added_by` bigint(20) DEFAULT NULL,
  `pm_modified_by` bigint(20) DEFAULT NULL,
  `pm_modified_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `pm_display_order` int(11) DEFAULT NULL,
  `pm_menu_icon` varchar(50) DEFAULT NULL,
  `pm_parent_menu` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Page_Menu`
--

INSERT INTO `Page_Menu` (`pm_id_pk`, `pm_menu_name`, `pm_menu_url`, `pm_active`, `pm_added_on`, `pm_added_by`, `pm_modified_by`, `pm_modified_on`, `pm_display_order`, `pm_menu_icon`, `pm_parent_menu`) VALUES
(1, 'Masters', '#', 10, '2023-12-01 16:28:15', NULL, NULL, '2023-12-01 16:28:15', 1, 'fas fa-fw fa-user', NULL),
(2, 'Add Task', 'Masters', 10, '2023-12-01 16:28:15', NULL, NULL, '2023-12-01 16:28:15', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Task_Details`
--

CREATE TABLE `Task_Details` (
  `tt_id_pk` int(11) NOT NULL,
  `tt_TaskTitle` varchar(100) DEFAULT NULL,
  `tt_TaskDescription` varchar(255) DEFAULT NULL,
  `tt_TaskDueDate` date DEFAULT NULL,
  `tt_active` int(11) DEFAULT 10,
  `tt_added_by` int(11) DEFAULT NULL,
  `tt_added_on` datetime DEFAULT current_timestamp(),
  `tt_is_completed` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Task_Details`
--

INSERT INTO `Task_Details` (`tt_id_pk`, `tt_TaskTitle`, `tt_TaskDescription`, `tt_TaskDueDate`, `tt_active`, `tt_added_by`, `tt_added_on`, `tt_is_completed`) VALUES
(1, 'Task 1', 'Task 1 Description', '2023-12-02', 10, 1, '2023-12-01 21:08:02', 1),
(2, 'Task 2', 'Task 2 Description', '2023-12-19', 10, 1, '2023-12-01 21:26:04', 1),
(3, 'Task 3', 'Task 3 Description', '2023-12-05', 10, 1, '2023-12-01 21:41:24', 0),
(5, 'Task 101', 'Task 101 Description', '2023-12-08', 10, 3, '2023-12-02 01:35:57', 0),
(6, 'Task 1002', 'Task 1002 Description', '2023-12-19', 10, 3, '2023-12-02 01:43:28', 1),
(7, 'Task 10034', 'Task Description 222', '2023-12-12', 10, 3, '2023-12-02 02:08:00', 1),
(8, 'Task 4', 'Task 4 Description', '2023-12-30', 10, 1, '2023-12-02 10:49:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `User_Details`
--

CREATE TABLE `User_Details` (
  `u_id_pk` int(11) NOT NULL,
  `u_fullname` varchar(255) DEFAULT NULL,
  `u_user_name` varchar(100) DEFAULT NULL,
  `u_password` varchar(255) DEFAULT NULL,
  `u_confirm_password` varchar(255) DEFAULT NULL,
  `u_active` int(11) DEFAULT 10,
  `u_added_on` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User_Details`
--

INSERT INTO `User_Details` (`u_id_pk`, `u_fullname`, `u_user_name`, `u_password`, `u_confirm_password`, `u_active`, `u_added_on`) VALUES
(1, 'bino', 'bino@gmail.com', '123', '123', 10, '2023-12-01 17:04:59'),
(3, 'jitu', 'jithu@gmail.com', '1234', '1234', 10, '2023-12-01 17:07:17'),
(4, 'bijo', 'bijo@gamil.com', '1234', '1234', 10, '2023-12-01 17:10:38'),
(5, 'binu', 'bbb@gmail.com', '123', '123', 10, '2023-12-01 17:33:45'),
(6, 'binoooo', 'bin@gmail.com', '1234', '1234', 10, '2023-12-01 17:42:23'),
(7, 'athul', 'athul@gmail.com', '123', '123', 10, '2023-12-01 17:48:01'),
(8, 'kevin', 'kevin@gmail.com', '4567', '4567', 10, '2023-12-01 17:51:46'),
(9, 'Joel Victor', 'joel@gmail.com', '123', '123', 10, '2023-12-02 02:22:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Page_Menu`
--
ALTER TABLE `Page_Menu`
  ADD PRIMARY KEY (`pm_id_pk`);

--
-- Indexes for table `Task_Details`
--
ALTER TABLE `Task_Details`
  ADD PRIMARY KEY (`tt_id_pk`);

--
-- Indexes for table `User_Details`
--
ALTER TABLE `User_Details`
  ADD PRIMARY KEY (`u_id_pk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Page_Menu`
--
ALTER TABLE `Page_Menu`
  MODIFY `pm_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Task_Details`
--
ALTER TABLE `Task_Details`
  MODIFY `tt_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `User_Details`
--
ALTER TABLE `User_Details`
  MODIFY `u_id_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
