-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 05:53 AM
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
-- Database: `hww`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_table`
--

CREATE TABLE `app_table` (
  `app_id` int(11) NOT NULL,
  `auser_id` int(11) NOT NULL,
  `ajob_noti_id` int(11) NOT NULL,
  `arelevent_experience` varchar(255) DEFAULT NULL,
  `pre_salary` varchar(20) DEFAULT NULL,
  `expected_salary` varchar(20) DEFAULT NULL,
  `aresume` varchar(255) DEFAULT NULL,
  `astatus` varchar(50) DEFAULT NULL,
  `anotice_period` varchar(50) DEFAULT NULL,
  `acreated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_expe`
--

CREATE TABLE `emp_expe` (
  `emp_expe_id` int(50) NOT NULL,
  `join_id` int(11) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `emp_documents` varchar(100) NOT NULL,
  `emp_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp_table`
--

CREATE TABLE `emp_table` (
  `emp_id` int(11) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `join_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pri_number` text NOT NULL,
  `sec_number` text NOT NULL,
  `blood` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `graduation_year` int(5) NOT NULL,
  `10th` varchar(100) NOT NULL,
  `12th` varchar(100) NOT NULL,
  `ug` varchar(100) NOT NULL,
  `pg` varchar(100) NOT NULL,
  `aadhar` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `sign` varchar(100) NOT NULL,
  `exp` int(11) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expe_doc`
--

CREATE TABLE `expe_doc` (
  `expe_id` int(11) NOT NULL,
  `euser_id` int(11) NOT NULL,
  `ejoin_id` int(11) NOT NULL,
  `documents` varchar(500) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_notifi`
--

CREATE TABLE `job_notifi` (
  `job_noti_id` int(20) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `openings` int(10) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `no_of_exp` int(10) NOT NULL,
  `location` varchar(100) NOT NULL,
  `app_start_date` date NOT NULL,
  `app_end_date` date NOT NULL,
  `craeteat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `join_table`
--

CREATE TABLE `join_table` (
  `joining_id` int(11) NOT NULL,
  `vuser_id` int(11) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `vemail` varchar(50) NOT NULL,
  `primary_number` varchar(15) DEFAULT NULL,
  `secondary_number` varchar(15) DEFAULT NULL,
  `10th_mark_sheet` varchar(255) DEFAULT NULL,
  `12th_mark_sheet` varchar(255) DEFAULT NULL,
  `ug_certificate` varchar(255) DEFAULT NULL,
  `pg_certificate` varchar(255) DEFAULT NULL,
  `aadhar_card` varchar(255) DEFAULT NULL,
  `pan_card` varchar(255) DEFAULT NULL,
  `blood_group` varchar(10) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `versatus` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `user_id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `primary_contact` varchar(11) NOT NULL,
  `secondary_contact` varchar(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `dp_storage_path` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `school_10th_name` varchar(60) NOT NULL,
  `school_10th_year` int(4) NOT NULL,
  `school_10th_percentage` decimal(5,2) NOT NULL,
  `school_12th_name` varchar(60) NOT NULL,
  `school_12th_year` int(5) NOT NULL,
  `school_12th_percentage` decimal(5,2) NOT NULL,
  `college_name` varchar(60) NOT NULL,
  `university_name` varchar(60) NOT NULL,
  `graduation_percentage` decimal(5,2) NOT NULL,
  `graduation_year` int(4) NOT NULL,
  `stream` varchar(60) NOT NULL,
  `experience` varchar(60) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `certifications` varchar(500) NOT NULL,
  `languages` text NOT NULL,
  `backlog` int(10) NOT NULL,
  `no_of_expe` int(20) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`user_id`, `name`, `last_name`, `primary_contact`, `secondary_contact`, `email`, `password`, `confirm_password`, `dp_storage_path`, `dob`, `address`, `gender`, `state`, `city`, `nationality`, `school_10th_name`, `school_10th_year`, `school_10th_percentage`, `school_12th_name`, `school_12th_year`, `school_12th_percentage`, `college_name`, `university_name`, `graduation_percentage`, `graduation_year`, `stream`, `experience`, `skills`, `certifications`, `languages`, `backlog`, `no_of_expe`, `createdat`) VALUES
(30, 'Rameshkannan', 'S', '9025245915', '9025245916', 'rameshkas1502@gmail.com', '6fc42c4388ed6f0c5a91257f096fef3c', '6fc42c4388ed6f0c5a91257f096fef3c', 'user_profile/WhatsApp Image 2023-12-06 at 5.58.48 PM.jpeg', '2023-12-23', 'tharamangalam', 'male', 'tamilnadu', 'Salem', 'indian', 'sengunthar', 2015, 71.20, 'vethathiri', 2017, 81.10, 'dhirajlal', 'anna university', 74.00, 2021, 'ECE', 'experience', 'java, web development', 'internship', 'tamil,english', 0, 4, '2023-12-13 09:39:55'),
(32, 'Sasikumar', 'S', '9025026409', '96968962198', 'sasi@gmail.com', '1f2411b2f93b1342d5c06ebf4a7893e7', '1f2411b2f93b1342d5c06ebf4a7893e7', 'user_profile/bb7.jpeg', '2023-12-31', 'Banglore', 'male', 'tamilnadu', 'Tharamangalam,Salem', 'indian', 'GBHSS', 2018, 80.00, 'GBHSS', 2020, 70.00, 'Mahendra Arts And Sciene College,namakkal', 'Periyar', 65.00, 2023, 'Bsc,CS', 'experience', 'Html,Css,javascript,React js.', 'Internship', 'Tamil,English', 0, 5, '2023-12-19 15:36:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_table`
--
ALTER TABLE `app_table`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `emp_expe`
--
ALTER TABLE `emp_expe`
  ADD PRIMARY KEY (`emp_expe_id`);

--
-- Indexes for table `emp_table`
--
ALTER TABLE `emp_table`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `expe_doc`
--
ALTER TABLE `expe_doc`
  ADD PRIMARY KEY (`expe_id`);

--
-- Indexes for table `job_notifi`
--
ALTER TABLE `job_notifi`
  ADD PRIMARY KEY (`job_noti_id`);

--
-- Indexes for table `join_table`
--
ALTER TABLE `join_table`
  ADD PRIMARY KEY (`joining_id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_table`
--
ALTER TABLE `app_table`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `emp_expe`
--
ALTER TABLE `emp_expe`
  MODIFY `emp_expe_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `emp_table`
--
ALTER TABLE `emp_table`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `expe_doc`
--
ALTER TABLE `expe_doc`
  MODIFY `expe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `job_notifi`
--
ALTER TABLE `job_notifi`
  MODIFY `job_noti_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `join_table`
--
ALTER TABLE `join_table`
  MODIFY `joining_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
