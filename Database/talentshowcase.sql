-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 10:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talentshowcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fullname` text DEFAULT NULL,
  `profile_pic` text DEFAULT 'user.png',
  `email` text NOT NULL,
  `createdat` date NOT NULL,
  `gender` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `contactno` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `password`, `fullname`, `profile_pic`, `email`, `createdat`, `gender`, `dob`, `address`, `role_id`, `contactno`) VALUES
(1, '$2y$10$4J3nLZvNmHVGrSuGw9xAOOO.cA0hWQUqOKryvTiRT8iAz0TAHE5OK', 'Philipo Deus', '21560ff720ef5c73fa38ae6923adf1c5shreemangal.jpg', 'philipodeus@gmail.com', '0000-00-00', 'Male', '1999-06-06', 'Dar es salaam', 3, '0712345678');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobposts`
--

CREATE TABLE `applied_jobposts` (
  `id_applied` int(11) NOT NULL,
  `id_jobpost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_jobposts`
--

INSERT INTO `applied_jobposts` (`id_applied`, `id_jobpost`, `id_user`, `id_company`, `createdat`) VALUES
(0, 13, 11, 10, '2025-03-13 00:00:00'),
(0, 13, 12, 10, '2025-03-13 00:00:00'),
(0, 25, 11, 10, '2025-03-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `name`) VALUES
(1, 'High School Student'),
(2, 'Undergraduate'),
(3, 'Graduate'),
(4, 'Senior Executive(President, CFO, etc)'),
(5, 'Manager/Supervisor of Staff'),
(6, 'Executive(SVP, VP, Department Head, etc)');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `companyname` text NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `address` text DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `contactno` text DEFAULT NULL,
  `website` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `aboutme` text DEFAULT NULL,
  `hash` varchar(255) NOT NULL,
  `createdAt` date NOT NULL,
  `active` int(3) DEFAULT 0,
  `esta_date` date DEFAULT NULL,
  `empno` int(11) DEFAULT NULL,
  `profile_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `industry_id`, `companyname`, `role_id`, `address`, `state_id`, `city_id`, `contactno`, `website`, `email`, `password`, `aboutme`, `hash`, `createdAt`, `active`, `esta_date`, `empno`, `profile_pic`) VALUES
(10, 3, 'mico', 2, 'Dar es salaam', 6, 25, '0678932100', 'www.web.com', 'danmico@gmail.com', '$2y$10$PHc1AgvPlP2w1oa0BQAj0O2Wm5jYp2ANz7yKFQVa1Wq7UXHAKAM9y', 'i am a cool guy', '', '2025-03-12', 0, '0000-00-00', 0, '5e454b60e12b34ca92a3ca4ee74c2affq3.png');

-- --------------------------------------------------------

--
-- Table structure for table `company_reviews`
--

CREATE TABLE `company_reviews` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `review` text NOT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_reviews`
--

INSERT INTO `company_reviews` (`id`, `company_id`, `createdby`, `review`, `createdat`) VALUES
(9, 4, 8, 'This company is superb. it has a very good working culture.', '2023-08-10 00:00:00'),
(10, 10, 11, 'good', '2025-03-12 00:00:00'),
(11, 10, 11, 'good', '2025-03-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `districts_or_cities`
--

CREATE TABLE `districts_or_cities` (
  `id` int(11) NOT NULL,
  `division_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts_or_cities`
--

INSERT INTO `districts_or_cities` (`id`, `division_id`, `name`) VALUES
(1, 1, 'Ilala'),
(2, 1, 'Kinondoni'),
(3, 1, 'Ubungo'),
(4, 1, 'Temeke'),
(5, 1, 'Kigamboni'),
(6, 2, 'Ilemela'),
(7, 2, 'Nyamagana'),
(8, 2, 'Sengerema'),
(9, 2, 'Misungwi'),
(10, 2, 'Ukerewe'),
(11, 2, 'Magu'),
(12, 2, 'Kwimba'),
(13, 3, 'Arusha District'),
(14, 3, 'Arumeru'),
(15, 3, 'Karatu'),
(16, 3, 'Longido'),
(17, 3, 'Monduli'),
(18, 3, 'Ngorongoro'),
(19, 4, 'Dodoma Municipal'),
(20, 4, 'Bahi'),
(21, 4, 'Chamwino'),
(22, 4, 'Chemba'),
(23, 4, 'Kondoa'),
(24, 4, 'Kongwa'),
(25, 4, 'Mpwapwa'),
(26, 5, 'Mbeya City'),
(27, 5, 'Mbeya District'),
(28, 5, 'Chunya'),
(29, 5, 'Kyela'),
(30, 5, 'Rungwe'),
(31, 5, 'Mbarali'),
(32, 5, 'Busokelo'),
(33, 6, 'Tanga City'),
(34, 6, 'Handeni District'),
(35, 6, 'Handeni Town Council'),
(36, 6, 'Kilindi'),
(37, 6, 'Korogwe District'),
(38, 6, 'Korogwe Town Council'),
(39, 6, 'Lushoto'),
(40, 6, 'Muheza'),
(41, 6, 'Mkinga'),
(42, 6, 'Pangani'),
(43, 7, 'Geita District'),
(44, 7, 'Bukombe District'),
(45, 7, 'Chato'),
(46, 7, 'Mbogwe'),
(47, 7, 'Nyang\'hwale'),
(48, 8, 'Iringa Municipal'),
(49, 8, 'Iringa District'),
(50, 8, 'Kilolo'),
(51, 8, 'Mufindi'),
(52, 9, 'Mtwara District'),
(53, 9, 'Mtwara Municipal'),
(54, 9, 'Nanyumbu'),
(55, 9, 'Masasi'),
(56, 9, 'Newala'),
(57, 9, 'Tandahimba'),
(58, 9, 'Ruhuwiko'),
(59, 10, 'Tabora Municipal'),
(60, 10, 'Tabora District'),
(61, 10, 'Igunga'),
(62, 10, 'Nzega'),
(63, 10, 'Urambo'),
(64, 10, 'Kaliua'),
(65, 10, 'Sikonge'),
(66, 11, 'Morogoro Municipal'),
(67, 11, 'Morogoro District'),
(68, 11, 'Kilombero'),
(69, 11, 'Mvomero '),
(70, 11, 'Ulanga '),
(71, 11, 'Gairo '),
(72, 11, 'Rufiji '),
(73, 11, 'Malinyi'),
(74, 11, 'Ifakara'),
(75, 12, 'Bukoba Municipal'),
(76, 12, 'Bukoba District'),
(77, 12, 'Karagwe'),
(78, 12, 'Biharamulo'),
(79, 12, 'Misenyi'),
(80, 12, 'Ngara'),
(81, 12, 'Muleba'),
(82, 12, 'Kyerwa');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`) VALUES
(1, 'Diploma Degree'),
(2, 'Bachelor\'s Degree'),
(3, 'Master\'s Degree'),
(4, 'Professional Degree'),
(5, 'Doctoral Degree'),
(6, 'Higher Secondary Education'),
(7, 'Undergraduate'),
(8, 'Secondary Education');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`) VALUES
(1, 'Performing Arts'),
(2, 'Music & Audio'),
(3, 'Visual Arts & Design'),
(4, 'Writing & Storytelling'),
(5, 'Digital & Media Arts'),
(6, 'Sports & Athletics'),
(7, 'Public Speaking & Hosting'),
(8, 'Technology & Innovation'),
(9, 'Culinary Arts'),
(10, 'Social Media & Influencing');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `jobtitle` text NOT NULL,
  `industry_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `state_id` int(3) NOT NULL,
  `city_id` int(3) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `experience` int(2) NOT NULL,
  `skills_ability` text NOT NULL,
  `deadline` date NOT NULL,
  `media_path` varchar(255) DEFAULT NULL,
  `media_type` enum('image','video') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id_jobpost`, `id_company`, `jobtitle`, `industry_id`, `description`, `state_id`, `city_id`, `createdat`, `experience`, `skills_ability`, `deadline`, `media_path`, `media_type`) VALUES
(25, 10, 'ooooooo', 4, 'o', 1, 1, '2025-03-13 17:18:28', 3, 'o', '2025-03-26', '../assets/images/ddbac82a201a23d4737376af67b8e79d.jpg', 'image'),
(28, 10, 'Motivation', 3, 'I speak, you get knowledge', 7, 43, '2025-03-13 18:02:37', 1, 'public speaker', '2025-04-15', '../assets/images/c076e4fd1559721e171432e66b70a487.mp4', 'video'),
(29, 10, 'Music', 2, 'I sing, everyone become blessed!', 4, 19, '2025-03-13 18:09:31', 2, 'dancing', '2025-05-15', '../assets/images/47dcbd834e669233d7eb8a51456ed217.mp4', 'video'),
(30, 10, 'drawing', 3, 'Resilience helps me to solve complex problems by easy ways', 1, 3, '2025-03-13 18:18:41', 2, 'resilience', '2025-06-18', '../assets/images/d8eb87629476878cb0ec2349ae109cde.mp4', 'video'),
(31, 10, 'Drawing Cartoons', 10, 'cool', 3, 13, '2025-03-13 18:39:16', 1, 'cool', '2025-05-09', '../assets/images/b02891878ecf6f3908a30208a5bbaeae.mp4', 'video'),
(32, 10, 'p', 3, 'p', 1, 1, '2025-03-14 07:42:38', 3, 'p', '2025-03-02', '../assets/images/83878c91171338902e0fe0fb97a8c47a.png', 'image'),
(33, 10, 'this is it', 3, 'm', 1, 1, '2025-03-14 08:21:57', 5, 'm', '2025-04-05', '../assets/images/75429ca6672f64684f72ab35558ce4d5.mp4', 'video');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `type`) VALUES
(1, 'Full Time'),
(2, 'Part Time'),
(3, 'Internship');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobposts`
--

CREATE TABLE `saved_jobposts` (
  `id_saved` int(11) NOT NULL,
  `id_jobpost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createdat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_jobposts`
--

INSERT INTO `saved_jobposts` (`id_saved`, `id_jobpost`, `id_user`, `createdat`) VALUES
(6, 5, 8, '2023-07-17 00:00:00'),
(7, 6, 0, '2023-07-28 00:00:00'),
(8, 4, 0, '2023-07-28 00:00:00'),
(9, 6, 8, '2023-07-28 00:00:00'),
(10, 11, 11, '2025-03-12 00:00:00'),
(11, 9, 11, '2025-03-12 00:00:00'),
(12, 10, 11, '2025-03-12 00:00:00'),
(13, 13, 11, '2025-03-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Dar es Salaam'),
(2, 'Mwanza'),
(3, 'Arusha'),
(4, 'Dodoma'),
(5, 'Mbeya '),
(6, 'Tanga'),
(7, 'Geita'),
(8, 'Iringa'),
(9, 'Mtwara'),
(10, 'Tabora'),
(11, 'Morogoro'),
(12, 'Kagera');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` text DEFAULT NULL,
  `headline` text DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `city_id` int(3) DEFAULT NULL,
  `state_id` int(3) DEFAULT NULL,
  `contactno` varchar(15) DEFAULT NULL,
  `education_id` int(3) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `resume` text DEFAULT NULL,
  `hash` text DEFAULT NULL,
  `active` int(3) DEFAULT 0,
  `aboutme` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `profile_pic` text DEFAULT 'user.png',
  `createdat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `fullname`, `email`, `password`, `address`, `headline`, `role_id`, `city_id`, `state_id`, `contactno`, `education_id`, `dob`, `age`, `resume`, `hash`, `active`, `aboutme`, `skills`, `gender`, `profile_pic`, `createdat`) VALUES
(11, 'Blb Blb', 'noone@gmail.com', '$2y$10$JAjUv1cH8ZrAF6OzNjyMnuMbL.n62ZTxChjvk1onC6zGLDzmrgx.C', 'Dar', 'Computer engineer', 1, 1, 7, '0753499377', 2, '2025-03-12', NULL, 'a7fff991982875211e148fbdac247edeProject Tittle.pdf', NULL, 0, 'Talented', 'Coder', 'male', 'user.png', '2025-03-12'),
(12, 'coolguy', 'cool@gmail.com', '$2y$10$/IkHjZ5sCrzikzywjR8Vcej8n.s31cY49ah45MUkacv9kExYy7Bnm', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'c8cf085e17dcdd4bba2b3eb2913a9d02WebApp-G5.pdf', NULL, 0, NULL, NULL, NULL, 'user.png', '2025-03-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `company_reviews`
--
ALTER TABLE `company_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts_or_cities`
--
ALTER TABLE `districts_or_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id_jobpost`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_jobposts`
--
ALTER TABLE `saved_jobposts`
  ADD PRIMARY KEY (`id_saved`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company_reviews`
--
ALTER TABLE `company_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id_jobpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saved_jobposts`
--
ALTER TABLE `saved_jobposts`
  MODIFY `id_saved` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
