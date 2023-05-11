-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 03:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `rest_tips`
--

CREATE TABLE `rest_tips` (
  `tip_id` bigint(20) UNSIGNED NOT NULL,
  `tip_text` text NOT NULL,
  `tip_category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rest_tips`
--

INSERT INTO `rest_tips` (`tip_id`, `tip_text`, `tip_category`) VALUES
(1, 'Naudokite poilsio pertraukas iš tikrųjų pailsėti nuo darbų - tiek fiziškai, tiek emociškai, nes per poilsio intervalus jūsų organizmas atsigaus greičiau ir jūsų smegenys bus pasirengusios atlikti darbą dar efektyviau.', 'work'),
(2, 'Prasitampykite raumenis: ištempkite kojas ir rankas, ištiesinkite nugarą, kad pagerintumėte kraujotaką.', 'rest'),
(3, 'Atsistokite ir padarykite kelis lengvus jogos ar jėgos pratimus - jie suteiks energijos, tapsite žvalesni.', 'work'),
(4, 'Pertraukas galite išnaudoti meditacijai: medituokite 5-10 minučių, kad atsipalaiduotumėte ir sutelktumėte savo mintis.', 'rest'),
(5, 'Gerkite daugiau vandens, nes dehidratacija, be daugybės kitų minusų,  gali sutrikdyti jūsų koncentraciją.', 'work'),
(6, 'Giliai įkvėpkite ir iškvėpkite kelis kartus, sutelkite dėmesį į savo kūną, pailsėkite.', 'rest'),
(7, 'Ar sėdite tiesiai? Atkreipkite dėmesį į savo laikyseną.', 'rest'),
(8, 'Atsigulkite ant grindų ir padarykite keletą lengvų pratimų, kad ištiesintumėte savo stuburą ir sumažintumėte įtampos jausmą.', 'rest'),
(9, 'Pramankštinkite savo kaklą, pasukite pečius, iįtieskite nugarą, kad atsipalaiduotumėte.', 'rest'),
(10, 'Nuplaukite veidą šaltu vandeniu, kad suteiktumėte sau energijos ir atgaivintumėte odą.', 'rest'),
(11, 'Paskaitykite kelis puslapius knygos, kurią jau ilgą laiką norite  skaityti ir vis atidėliojate - taip atitrauksite akis ir mintis nuo darbo, praplėsite savo žinias ir išmoksite naujų dalykų.', 'work'),
(12, 'Paklausykite muzikos, kuri padeda sumažinti stresą ir pagerinti nuotaiką.', 'rest'),
(13, 'Peržvelkite savo darbo vietą: galbūt reikia pakeisti klaviatūros poziciją, kad ji būtų patogesnė, o gal jau seniai galvojate apie patogesnį darbo stalą ar kėdę? Patogi darbo vieta užtikrins, kad nepatiriate diskomforto ir leis geriau susitelkti į darbus.', 'work'),
(14, 'Nuolat priminkite sau savo tikslus ir motyvaciją, kad pasiektumėte juos dar efektyviau - itin padeda juos ne tik turėti omenyje, bet ir užsirašyti', 'work'),
(15, 'Paskambinkite savo draugui ar šeimos nariui trumpam pokalbiui,, kad atsipalaiduotumėte ir sumažintumėte stresą.', 'work'),
(16, 'Pertrauką skirkite gražiems dalykams: gal užteks pažvelgti per langą, galbūt peržiūrėti mėgstamas nuotraukas, galbūt paieškoti įkvėpimo internete -taip pagerinsite savo nuotaiką, nusiteiksite pozityviau ir sumažinsite darbo metu patiriamą stresą.', 'rest'),
(17, 'Pasižiūrėkite vaizdo įrašą, kaip pagerinti savo laikyseną ir sumažinti įtampos jausmą.', 'rest'),
(18, 'Per pertrauką atsistokite, palikite darbo vietą ir pasivaikščiokite - sveika ir kūnui, ir protui', 'rest'),
(19, 'Galbūt yra kokia nors nedidelė, greitai atliekama užduotis, kurią vis atidėliojate?Atlikite ją per petrauką, kad pagerintumėte savo produktyvumą ir motyvaciją.', 'work'),
(20, 'Sumažinkite savo žarnyno apkrovą, valgydami lengvą maistą ir gerdami daugiau skysčių, ypač vandens - lengvumo jausmas padeda ir mintims neapsikrauti.', 'work'),
(21, 'Pasiruoškite savo užduočiai per pertrauką, kad išvengtumėte streso ir nesiblaškytumėte - suplanuokite tikslą, būsimus darbus', 'work'),
(22, 'Susikurkite savo \"To- do\" sąrašą, kad galėtumėte sekti savo užduotis ir progresą, planuoti laiką', 'work'),
(23, 'Kad pagrindinio darbo metu nesiblaškytumėte, per pertauką galite peržiūrėti gautus elektroninius laiškus ar žinutes.', 'work'),
(24, 'Pareto principas teigia, kad 20 % pastangų duoda 80 % rezultatų, o likę 80 % pastangų – tik 20 % rezultatų. Peržiūrėkite savo atliekamus darbus - ar daugiausiai laiko skiriate svarbiausiems darbams?', 'work'),
(25, 'Vadinamoji Eizenhauerio matrica jums gali padėti susiplanuoti būsimus darbus: suskirstykite darbus į 4 grupes pagal 2 kriterijus: svarbumą ir skubumą. Skubius ir svarbius darbus atlikite kaip įmanoma greičiau, svarbiems ir neskubiems parinkite tinkamą laiką ateityje, nesvarbius, bet skubius pamėginkite perleisti atlikti kitiems, o jei darbą priskyrėte nesvarbiam ir neskubiam, gal reikėtų jo visai atsisakyti?', 'work'),
(26, 'Išbandykite naršyklės papildinius ar svetaines, blokuojančius dėmesį blaškančius puslapius, pavyzdžiui, Freedom, StayFocused ar RescueTime.', 'work');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'test', 'test@example.com', 'password123'),
(2, 'test2', 'test2@example.com', '$2y$10$TIYIelaQmxtDROtLc3zOae9/pJc4bzXyBPDvoDT78MSeXjLsR9RHy'),
(3, 'test3', 'test3@example.com', '$2y$10$3LAS7RuQ/UeEs5oBbt.Ube98FYNPvgfxkdh6j6OgqA1wSJj6mkG3C'),
(4, 'test4', 'test4@example.com', '$2y$10$HJ2eInrftDfrzmQsOIJN8.pNdj1nYXnhCfxrfE.QyA4jAtz.ZKkVa'),
(5, 'test5', 'test5@example.com', '$2y$10$7i6bjvQ3WDWykiZsInEkxO/AzTa.c3H96HmrfYhIr7aY8Kr49OWia'),
(6, 'test6', 'test6@example.com', '$2y$10$u9Jhx8H34j6kbTT2sEvSjOQrxkzJjB9k3DZSScWyC46vbmdMg.jha'),
(7, 'test7', 'test7@example.com', '$2y$10$q1PZT/asw1z/S0Rn71nV/.AsfLMVpdji6XWQUlfIXEZMSriVHr1wK'),
(8, 'test8', 'test8@example.com', '$2y$10$YJrdEc9xJobSv1S2CLNgcuX3lg.KijKCXIYzYxeCHJfQvLq5qSwAu'),
(9, 'test9', 'test9@example.com', '$2y$10$yoQYRRvBcxB/j3OZP1.wK.5zlwaab/ieg42BQckfspUZOFrnXaIzG'),
(10, 'test10', 'test10@example.com', '$2y$10$EeIawjd8lJ8DvuebNA8u1.bWN2bD9TLPGSsSSla5paS1iq0yTV1KS'),
(11, 'test11', 'test11@example.com', '$2y$10$Low8xjo0pqjvPaPKAzt4EOx3UXjEwDfIfdeDS5.0e1vIsbGDz7jti'),
(12, 'test12', 'test12@example.com', '$2y$10$e.aygWBg1MvtCBvz1BybkujSzFgq5SVNnT9bUeRc4OBgAv5lTst.y'),
(13, 'test13', 'test13@example.com', '$2y$10$R0dn9YL9FSjPlsUzoNRIq.MfKc/E1cKjDk4zSJ0BcLbziK/CbOoXG'),
(14, '', '', '$2y$10$DDXx1FNJxxyOsmX/EitdzuYwq7P1PiTXSd7ZS8HVINCrHrVpDkfyy'),
(15, 'test14', 'test14@example.com', '$2y$10$8dhLl3m0DTfZFRb.FuHGVODmz3wiPTGQ2MbP0ORH0bQDoarAezqNW'),
(20, 'test15', 'test15@example.com', '$2y$10$735/.8cZfxgkTffJ4mIh7ug6PcaNaQ5wDicRExGauWirRgnQevxKC'),
(21, 'test16', 'test16@example.com', '$2y$10$lk7jh5YEexqk9JPYAsgvy.ZcbV/FVhXfCrfXHkPsasd2PfSoipoVe'),
(22, 'test17', 'test17@example.com', '$2y$10$qeCy2Dvvp8YMfHUP7SsqdeBnJSNGc8xR4BeopUSjCLUGLJIbbgOTu'),
(23, 'test22', 'test22@example.com', '$2y$10$jeNh5bglOm3HLYU1KLtWwuZih2YiN1d1dx2/26emWMpZPuACXNBE6'),
(24, 'test23', 'test23@gmail.com', '$2y$10$aA8/7NcrZiBRw5GG/QYYi.TtqPNpQanjRNkOXbP4lwTFDu8vlD7bW'),
(25, 'test24', 'test24@gmail.com', '$2y$10$jGNZCyY02kaDhHLlKtPuV.h2RVfDmNtLTP4RWW4HePswX.zxEOq1O'),
(26, 'test55', 'test55@example.com', '$2y$10$l4BPBquCLz/4gT91W9Me9uG6jALDiiZ0D/Kegphn6tH9kUmZJtW36'),
(27, 'test66', 'test66@example.com', '$2y$10$jYiqSl/0/jJ6uBvmOYb0c.RmrsMDD1FrNHAQOILdZH8DSHVE3mDLe'),
(28, 'test23', 'test23@example.com', '$2y$10$QScfdzrLf.ppKfvJSaAXfuIh.mZ84HufWUQIcbdo.ohE35StXf7Ci'),
(29, 'test12', 'test12@gmail.com', '$2y$10$eSgd6Tz7sYbPBs.rY5wzxOSqj5aKWwyJEGYKVteQxQ.Q2N24yPaLG'),
(30, 'test88', 'test88@example.com', '$2y$10$EPb7Pxe6vkNoNyCctv9vD.uWBZolGkMwPcB33MyVNjOPe2SXAJvp2');

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `setting_id` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timer_mode` varchar(20) NOT NULL,
  `work_interval` int(20) NOT NULL,
  `rest_interval` int(20) NOT NULL,
  `color_theme` varchar(20) NOT NULL,
  `work_color` varchar(20) NOT NULL,
  `rest_color` varchar(20) NOT NULL,
  `week_goal` int(1) NOT NULL,
  `minutes_goal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_settings`
--

INSERT INTO `user_settings` (`setting_id`, `user_id`, `timer_mode`, `work_interval`, `rest_interval`, `color_theme`, `work_color`, `rest_color`, `week_goal`, `minutes_goal`) VALUES
(11, 12, '90-20', 90, 20, 'Pasirinktinė', '#c4ea5d', '#eea0c6', 3, 1),
(12, 27, 'Pasirinktinis', 55, 10, 'Pasirinktinė', '#9f4b1e', '#073b12', 0, 0),
(13, 22, 'Pomodoro(25-5)', 25, 5, 'Pasirinktinė', '#ff5900', '#00ff37', 0, 0),
(14, 28, 'Pomodoro(25-5)', 25, 5, 'Pasirinktinė', '#df8bad', '#6bccc1', 1, 0),
(15, 30, 'Pomodoro(25-5)', 25, 5, 'Numatytoji', '#fba271', '#6acc80', 5, 420);

-- --------------------------------------------------------

--
-- Table structure for table `user_stats`
--

CREATE TABLE `user_stats` (
  `stat_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `stat_date` date NOT NULL,
  `stat_full_day` tinyint(1) NOT NULL,
  `stat_minutes` int(10) NOT NULL,
  `stat_rounds` int(10) NOT NULL,
  `week_start` date DEFAULT NULL,
  `week_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_stats`
--

INSERT INTO `user_stats` (`stat_id`, `user_id`, `stat_date`, `stat_full_day`, `stat_minutes`, `stat_rounds`, `week_start`, `week_end`) VALUES
(1, 2, '2023-05-07', 0, 0, 0, '2023-05-01', '2023-05-07'),
(2, 2, '2023-05-07', 0, 6, 0, '2023-05-01', '2023-05-07'),
(3, 28, '2023-05-07', 0, 3, 0, '2023-05-01', '2023-05-07'),
(4, 28, '2023-05-07', 0, 3, 0, '2023-05-01', '2023-05-07'),
(5, 28, '2023-05-07', 0, 6, 0, '2023-05-01', '2023-05-07'),
(6, 28, '2023-05-07', 0, 6, 0, '2023-05-01', '2023-05-07'),
(7, 2, '2000-11-06', 0, 10, 0, '2000-11-06', '2000-11-12'),
(8, 2, '2000-11-06', 1, 10, 0, '2000-11-06', '2000-11-12'),
(9, 28, '2023-05-07', 0, 6, 0, '2023-05-01', '2023-05-07'),
(10, 28, '2023-05-07', 1, 6, 0, '2023-05-01', '2023-05-07'),
(11, 28, '2023-05-07', 1, 6, 0, '2023-05-01', '2023-05-07'),
(12, 28, '2023-05-07', 0, 21, 0, '2023-05-01', '2023-05-07'),
(13, 28, '2023-05-07', 0, 6, 0, '2023-05-01', '2023-05-07'),
(14, 21, '2023-05-07', 0, 3, 0, '2023-05-01', '2023-05-07'),
(15, 21, '2023-05-07', 1, 6, 0, '2023-05-01', '2023-05-07'),
(16, 21, '2023-05-07', 0, 6, 0, '2023-05-01', '2023-05-07'),
(17, 21, '2023-05-07', 0, 0, 1, '2023-05-01', '2023-05-07'),
(18, 21, '2023-05-07', 1, 6, 3, '2023-05-01', '2023-05-07'),
(19, 21, '2023-05-07', 0, 3, 2, '2023-05-01', '2023-05-07'),
(20, 21, '2023-05-07', 0, 3, 2, '2023-05-01', '2023-05-07'),
(21, 21, '2023-05-07', 0, 15, 6, '2023-05-01', '2023-05-07'),
(22, 21, '2023-05-07', 0, 30, 11, '2023-05-01', '2023-05-07'),
(23, 21, '2023-05-07', 0, 6, 3, '2023-05-01', '2023-05-07'),
(24, 21, '2023-05-07', 0, 9, 4, '2023-05-01', '2023-05-07'),
(30, 12, '2023-05-08', 1, 30, 12, '2023-05-02', '2023-05-08'),
(31, 30, '2023-05-09', 0, 0, 1, '2023-05-08', '2023-05-14'),
(32, 12, '2023-05-09', 0, 1, 8, '2023-05-08', '2023-05-14'),
(33, 12, '2023-05-10', 0, 0, 1, '2023-05-08', '2023-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `user_tasks`
--

CREATE TABLE `user_tasks` (
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_rounds` int(11) NOT NULL,
  `task_date` date DEFAULT NULL,
  `week_start` date DEFAULT NULL,
  `week_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tasks`
--

INSERT INTO `user_tasks` (`task_id`, `user_id`, `task_name`, `task_rounds`, `task_date`, `week_start`, `week_end`) VALUES
(14, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(15, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(16, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(17, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(18, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(19, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(20, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(21, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(22, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(23, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(24, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(25, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(26, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(27, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(28, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(29, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(30, 28, 'hhh', 22, '2023-05-07', '2023-05-01', '2023-05-07'),
(31, 28, 'task1', 1, '2023-05-02', '2023-05-01', '2023-05-07'),
(32, 28, 'task2', 1, '2023-05-03', '2023-05-01', '2023-05-07'),
(33, 28, 'task3', 1, '2023-05-04', '2023-05-01', '2023-05-07'),
(34, 28, 'task4', 1, '2023-05-05', '2023-05-01', '2023-05-07'),
(35, 28, 'task5', 1, '2023-05-06', '2023-05-01', '2023-05-07'),
(36, 28, 'task6', 1, '2023-05-08', '2023-05-08', '2023-05-14'),
(37, 28, 'task7', 1, '2023-05-09', '2023-05-08', '2023-05-14'),
(49, 12, 'aaa', 1, '2023-05-08', '2023-05-08', '2023-05-14'),
(54, 12, 'Rašyti bakalaurą', 1, '2023-05-09', '2023-05-08', '2023-05-14'),
(55, 12, 'Išnešti šiukšles', 2, '2023-05-09', '2023-05-08', '2023-05-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rest_tips`
--
ALTER TABLE `rest_tips`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_stats`
--
ALTER TABLE `user_stats`
  ADD PRIMARY KEY (`stat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rest_tips`
--
ALTER TABLE `rest_tips`
  MODIFY `tip_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `setting_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_stats`
--
ALTER TABLE `user_stats`
  MODIFY `stat_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_tasks`
--
ALTER TABLE `user_tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD CONSTRAINT `user_settings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_stats`
--
ALTER TABLE `user_stats`
  ADD CONSTRAINT `user_stats_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_tasks`
--
ALTER TABLE `user_tasks`
  ADD CONSTRAINT `user_tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
