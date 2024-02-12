-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 06:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iems`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep`) VALUES
(1, 'CEO'),
(2, 'Operation'),
(3, 'Finance'),
(4, 'Supply Chain'),
(5, 'Maintenance'),
(6, 'ICT'),
(7, 'HR'),
(9, 'Sales & Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dep` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `dep`, `email`) VALUES
(422, 'Weldegebriel Reda', 'CEO', 'weldegebrielr@nationaltransportplc.com'),
(423, 'Mekonen Ashene', 'Finance', 'mekonena@nationaltransportplc.com'),
(424, 'Getachew Kiros', 'Sales & Marketing', 'getachewk@nationaltransportplc.com'),
(425, 'Teklebrhan Gidey', 'Operation', 'teklebrhang@nationaltransportplc.com'),
(426, 'Wogaso Molta', 'Maintenance & Engineering', 'wogasom@nationaltransportplc.com'),
(427, 'Wegayehu Aragaw', 'Supply Chain', 'wegayehua@nationaltransportplc.com'),
(428, 'Mohammed Osman', 'Huma Resorce', 'mohammedo@nationaltransportplc.com'),
(429, 'Zantawi Ayalew', 'Planning,Kaizen, Safety and Insurance ', 'zantawia@nationaltransportplc.com'),
(430, 'Aiymro Tegegn', 'CEO', 'aiymrot@nationaltransportplc.com'),
(431, 'Alemayehu Goshime', 'Supply Chain', 'alemayehug@nationaltransportplc.com'),
(432, 'Alemnesh Negash', 'CEO', 'alemineshn@nationaltransportplc.com'),
(433, 'Anberber Ayele', 'Maintenance', 'anberbira@nationaltransportplc.com'),
(434, 'Asegid Kenea', 'Supply Chain', 'asegidk@nationaltransportplc.com'),
(435, 'Assefa Geremu', 'Sales & Marketing', 'assefag@nationaltransportplc.com'),
(436, 'Checkol Hunegnaw', 'Finance', 'chekolh@nationaltransportplc.com'),
(437, 'Demeke Mekuria', 'Maintenance', 'demekem@nationaltransportplc.com'),
(438, 'Mahilet Kassahun', 'Sales & Marketing', 'mahiletk@nationaltransportplc.com'),
(439, 'Major Gebresilassie', 'Operation', 'majorg@nationaltransportplc.com'),
(440, 'Masre Wodajnew', 'Operation', 'masrew@nationaltransportplc.com'),
(441, 'Nahom Juhar', 'ICT Service', 'nahomj@nationaltransportplc.com'),
(442, 'Seadedin Beyan', 'Sales & Marketing', 'seadedinb@nationaltransportplc.com'),
(443, 'Simeneh Lema', 'General Service', 'simenehl@nationaltransportplc.com'),
(444, 'Taye T', 'Maintenance', 'tayet@nationaltransportplc.com'),
(445, 'Teklay Hailu', 'Finance', 'teklayh@nationaltransportplc.com'),
(446, 'Tsegaye Niguse', 'HR', 'tsegayen@nationaltransportplc.com'),
(447, 'Abreham Kinfu', 'Operation', 'abrehamk@nationaltransportplc.com'),
(448, 'Achalu Negash', 'Maintenance', 'achalun@nationaltransportplc.com'),
(449, 'Addisu Bisrat', 'Finance', 'adissub@nationaltransportplc.com'),
(450, 'Aderayesus Abebe', 'Operation', 'aderaya@nationaltransportplc.com'),
(451, 'Almaz Tadesse Dadi', 'Supply Chain', 'alemazt@nationaltransportplc.com'),
(452, 'Anteneh Tadesse', 'Maintenance', 'anteneht@nationaltransportplc.com'),
(453, 'Begna Leggesse', 'Supply Chain', 'begnal@nationaltransportplc.com'),
(454, 'Birhan Tegegn', 'Operation', 'birhant@nationaltransportplc.com'),
(455, 'Dadi Shimels Damena', 'Maintenance', 'dadis@nationaltransportplc.com'),
(456, 'Dereje Arega Begna ', 'Finance', 'derejea@nationaltransportplc.com'),
(457, 'Firehiwot Teshome', 'Supply Chain', 'firehiwott@nationaltransportplc.com'),
(458, 'Fitsum Fettuh', 'Operation', 'fitsumf@nationaltransportplc.com'),
(459, 'Fuad Mehamed', 'Maintenance', 'fuadm@nationaltransportplc.com'),
(460, 'Genet Daniel', 'Supply Chain', 'genetd@nationaltransportplc.com'),
(461, 'Hana Tegegn', 'Finance', 'hanat@nationaltransportplc.com'),
(462, 'Hasna Mohammed', 'Executive Secretary', 'hasnam@nationaltransportplc.com'),
(463, 'Kelemwerk Adnew', 'Human Resource', 'kelemwerka@nationaltransportplc.com'),
(464, 'Kiva Amsalu', 'ICT', 'kivaa@nationaltransportplc.com'),
(465, 'Matiyas Abebaw', 'Supply Chain', 'matiasa@nationaltransportplc.com'),
(466, 'Mekdes Derese', 'Operation', 'mekdesd@nationaltransportplc.com'),
(467, 'Melat G/kidan', 'Finance', 'melatg@nationaltransportplc.com'),
(468, 'Mimi Tamiru', 'Operation', 'mimit@nationaltransportplc.com'),
(469, 'Sebsibe Edilu', 'Finance', 'sebsibeb@nationaltransportplc.com'),
(470, 'Semehar Samuel', 'Maintenance', 'semehars@nationaltransportplc.com'),
(471, 'Sisay Tariku', 'Operation', 'sisayt@nationaltransportplc.com'),
(472, 'Timar Ashiber', 'Operation', 'timara@nationaltransportplc.com'),
(473, 'Wegayehu Girma', 'Maintenance', 'wegayehug@nationaltransportplc.com'),
(474, 'Wekeneh Ababu', 'Supply Chain', 'werkeneha@nationaltransportplc.com'),
(475, 'Werku Getachew', 'Human Resource', 'werkug@nationaltransportplc.com'),
(476, 'Worknesh Simeneh', 'Finance', 'workineshse@nationaltransport.com'),
(477, 'Yared Bekele', 'Maintenance', 'yaredb@nationaltransportplc.com'),
(478, 'Yared Solomon', 'ICT', 'yareds@nationaltransportplc.com'),
(479, 'Yeshitela Lema', 'Safety & Insurance', 'yeshitilal@nationaltransportplc.com'),
(480, 'Yohannes Birhanu', 'Maintenance', 'yohanesb@nationaltransportplc.com'),
(481, 'Zelalem Honja', 'Maintenance', 'zelalemh@nationaltransportplc.com');

-- --------------------------------------------------------

--
-- Table structure for table `error`
--

CREATE TABLE `error` (
  `error_code` varchar(255) NOT NULL,
  `error_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `error`
--

INSERT INTO `error` (`error_code`, `error_type`) VALUES
('NT-IT-Error-01', 'Software Installation/Configuration'),
('NT-IT-Error-02', 'Software Licensing'),
('NT-IT-Error-03', ' Printer Troubleshooting'),
('NT-IT-Error-04', 'Network Connectivity problem'),
('NT-IT-Error-05', 'Virus/Malware problem'),
('NT-IT-Error-06', 'Mobile Device Support'),
('NT-IT-Error-07', 'Hardware Issues'),
('NT-IT-Error-08', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `helpdesk`
--

CREATE TABLE `helpdesk` (
  `issue_id` varchar(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `dep` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `create_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `screenshot` longtext NOT NULL,
  `error_type` varchar(255) NOT NULL,
  `work_start` varchar(255) NOT NULL,
  `work_end` varchar(255) NOT NULL,
  `cause` longtext NOT NULL,
  `by_who` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `helpdesk`
--

INSERT INTO `helpdesk` (`issue_id`, `fname`, `dep`, `subject`, `create_time`, `status`, `screenshot`, `error_type`, `work_start`, `work_end`, `cause`, `by_who`, `date`, `location`) VALUES
('Help-00313', 'Alemnesh Negash', 'CEO', 'mn', '2024-02-12 02:11:53', 'send', '', 'Software Installation/Configuration', '', '', '', 'all', '0000-00-00', ''),
('Help-03103', 'Aiymro Tegegn', 'CEO', 'HAcker', '2024-02-08 15:38:23', 'done', '', 'Other', '', '', '', '', '0000-00-00', ''),
('Help-03336', 'Alemnesh Negash', 'CEO', '', '2024-02-08 15:42:16', 'done', '', 'Mobile Device Support', '2024-02-08 20:35:24', '2024-02-08 20:35:28', '', '', '0000-00-00', ''),
('Help-22127', 'Alemnesh Negash', 'CEO', '', '2024-02-08 20:55:27', 'done', '', 'Virus/Malware problem', '', '2024-02-08 21:10:06', '', 'kiva amsalu', '0000-00-00', ''),
('Help-24114', 'Weldegebriel Reda', 'CEO', '', '2024-02-08 21:28:34', 'done', '', 'Software Installation/Configuration', '', '2024-02-08 21:45:54', '', '', '0000-00-00', ''),
('Help-25162', 'Weldegebriel Reda', 'CEO', '', '2024-02-08 21:46:02', 'done', '', 'Software Installation/Configuration', '2024-02-08 21:46:53', '2024-02-08 22:20:00', '', '', '0000-00-00', ''),
('Help-27351', 'Weldegebriel Reda', 'CEO', '', '2024-02-08 22:22:31', 'done', '', 'Software Installation/Configuration', '2024-02-08 22:22:45', '2024-02-08 23:24:19', 'no matrial and i wan buy', '', '0000-00-00', ''),
('Help-30841', 'Aiymro Tegegn', 'CEO', 'letgna nw', '2024-02-08 23:20:41', 'done', '', 'Software Installation/Configuration', '2024-02-09 12:38:38', '2024-02-10 10:42:37', 'tegna beqa bro', '', '0000-00-00', ''),
('Help-57005', 'Aiymro Tegegn', 'CEO', 'sani hacke do this', '2024-02-12 17:56:45', 'send', '', ' Printer Troubleshooting', '', '', '', 'all', '2024-02-12', 'Addis Abeba'),
('Help-81348', 'Alemnesh Negash', 'CEO', 'nmn', '2024-02-08 09:35:48', 'done', '', 'Software Licensing', '', '2024-02-12 02:07:10', '', 'nahom juhar', '0000-00-00', ''),
('Help-98809', 'Weldegebriel Reda', 'CEO', 'no error', '2024-02-12 01:46:49', 'done', '', 'Virus/Malware problem', '2024-02-12 02:06:48', '2024-02-12 02:07:32', '', 'kiva amsalu', '0000-00-00', ''),
('Help-99588', 'Weldegebriel Reda', 'CEO', 'hana', '2024-02-12 01:59:48', 'done', '', 'Software Installation/Configuration', '2024-02-12 02:06:40', '2024-02-12 02:07:42', '', 'nahom juhar', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item`, `date`) VALUES
(3, 'Printer', '2024-01-05 09:13:06'),
(5, 'Computer', '2024-01-05 09:13:31'),
(6, 'Network device ', '2024-01-05 09:13:44'),
(7, 'rj45', '2024-01-05 09:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `sn` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `employee` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `dep` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sn`, `product`, `employee`, `location`, `model`, `item`, `dep`, `date`, `price`) VALUES
('Sn-132wews', 'hp printer', 'Kiva j', 'adama', 'mode 32432', 'rj45', 'CEO', '2024-02-14', '23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `dep` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` char(1) NOT NULL DEFAULT '1',
  `profile` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `dep`, `last_login`, `status`, `profile`) VALUES
(8, '', 'c2318cee73c68b44c1de757339f43aa6', 'Operation', '2024-02-12 00:37:59', '1', ''),
(10, 'super', '1b3231655cebb7a1f783eddf27d254ca', 'super', '2024-02-10 10:16:45', '1', ''),
(13, 'kiva amsalu', 'bb47d4a27e4175312d0392fd9910201b', 'ICT', '2024-02-12 16:44:02', '1', '../Data/profile/glitter.png'),
(14, '', 'c2318cee73c68b44c1de757339f43aa6', 'CEO', '2024-02-12 00:44:57', '1', ''),
(16, 'nahom juhar', '21232f297a57a5a743894a0e4a801fc3', 'ICT', '2024-02-12 06:23:07', '1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error`
--
ALTER TABLE `error`
  ADD PRIMARY KEY (`error_code`);

--
-- Indexes for table `helpdesk`
--
ALTER TABLE `helpdesk`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sn`),
  ADD KEY `item` (`item`),
  ADD KEY `dep` (`dep`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
