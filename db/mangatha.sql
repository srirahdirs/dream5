-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 12:44 PM
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
-- Database: `mangatha`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sridhar@omgtech.in', '$2y$13$5qdH.4URCN2tMrRphBDDt.rX2Uh.UsJyIqfJ1R9omxj7BRBzJNne2', NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'admin@tandem.network', '$2y$13$nTgS3.vKv/QzthooqO070.g6XyDfUfb9xpFcuH.tRC7yU5Mfa6QQC', NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'sri.rahdirs@gmail.com', '$2y$10$Y4MmoZBDvLT3noubTIgpIuCiCiRlOSSWmWkCFW6w36bThiUp2oGJq', NULL, 1, '2019-08-02 03:56:18', '2019-08-02 03:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `all_cities`
--

CREATE TABLE `all_cities` (
  `city_code` int(22) NOT NULL,
  `city_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_cities`
--

INSERT INTO `all_cities` (`city_code`, `city_name`, `state_code`) VALUES
(101, 'Alipur', '1'),
(102, 'Andaman Island', '1'),
(103, 'Anderson Island', '1'),
(104, 'Arainj-Laka-Punga', '1'),
(105, 'Austinabad', '1'),
(106, 'Bamboo Flat', '1'),
(107, 'Barren Island', '1'),
(108, 'Beadonabad', '1'),
(109, 'Betapur', '1'),
(110, 'Bindraban', '1'),
(111, 'Bonington', '1'),
(112, 'Brookesabad', '1'),
(113, 'Cadell Point', '1'),
(114, 'Calicut', '1'),
(115, 'Chetamale', '1'),
(116, 'Cinque Islands', '1'),
(117, 'Defence Island', '1'),
(118, 'Digilpur', '1'),
(119, 'Dolyganj', '1'),
(120, 'Flat Island', '1'),
(121, 'Geinyale', '1'),
(122, 'Great Coco Island', '1'),
(123, 'Haddo', '1'),
(124, 'Havelock Island', '1'),
(125, 'Henry Lawrence Island', '1'),
(126, 'Herbertabad', '1'),
(127, 'Hobdaypur', '1'),
(128, 'Ilichar', '1'),
(129, 'Ingoie', '1'),
(130, 'Inteview Island', '1'),
(131, 'Jangli Ghat', '1'),
(132, 'Jhon Lawrence Island', '1'),
(133, 'Karen', '1'),
(134, 'Kartara', '1'),
(135, 'KYD Islannd', '1'),
(136, 'Landfall Island', '1'),
(137, 'Little Andmand', '1'),
(138, 'Little Coco Island', '1'),
(139, 'Long Island', '1'),
(140, 'Maimyo', '1'),
(141, 'Malappuram', '1'),
(142, 'Manglutan', '1'),
(143, 'Manpur', '1'),
(144, 'Mitha Khari', '1'),
(145, 'Neill Island', '1'),
(146, 'Nicobar Island', '1'),
(147, 'North Brother Island', '1'),
(148, 'North Passage Island', '1'),
(149, 'North Sentinel Island', '1'),
(150, 'Nothen Reef Island', '1'),
(151, 'Outram Island', '1'),
(152, 'Pahlagaon', '1'),
(153, 'Palalankwe', '1'),
(154, 'Passage Island', '1'),
(155, 'Phaiapong', '1'),
(156, 'Phoenix Island', '1'),
(157, 'Port Blair', '1'),
(158, 'Preparis Island', '1'),
(159, 'Protheroepur', '1'),
(160, 'Rangachang', '1'),
(161, 'Rongat', '1'),
(162, 'Rutland Island', '1'),
(163, 'Sabari', '1'),
(164, 'Saddle Peak', '1'),
(165, 'Shadipur', '1'),
(166, 'Smith Island', '1'),
(167, 'Sound Island', '1'),
(168, 'South Sentinel Island', '1'),
(169, 'Spike Island', '1'),
(170, 'Tarmugli Island', '1'),
(171, 'Taylerabad', '1'),
(172, 'Titaije', '1'),
(173, 'Toibalawe', '1'),
(174, 'Tusonabad', '1'),
(175, 'West Island', '1'),
(176, 'Wimberleyganj', '1'),
(177, 'Yadita', '1'),
(201, 'Adilabad', '2'),
(202, 'Anantapur', '2'),
(203, 'Chittoor', '2'),
(204, 'Cuddapah', '2'),
(205, 'East Godavari', '2'),
(206, 'Guntur', '2'),
(207, 'Hyderabad', '2'),
(208, 'Karimnagar', '2'),
(209, 'Khammam', '2'),
(210, 'Krishna', '2'),
(211, 'Kurnool', '2'),
(212, 'Mahabubnagar', '2'),
(213, 'Medak', '2'),
(214, 'Nalgonda', '2'),
(215, 'Nellore', '2'),
(216, 'Nizamabad', '2'),
(217, 'Prakasam', '2'),
(218, 'Rangareddy', '2'),
(219, 'Srikakulam', '2'),
(220, 'Visakhapatnam', '2'),
(221, 'Vizianagaram', '2'),
(222, 'Warangal', '2'),
(223, 'West Godavari', '2'),
(301, 'Anjaw', '3'),
(302, 'Changlang', '3'),
(303, 'Dibang Valley', '3'),
(304, 'East Kameng', '3'),
(305, 'East Siang', '3'),
(306, 'Itanagar', '3'),
(307, 'Kurung Kumey', '3'),
(308, 'Lohit', '3'),
(309, 'Lower Dibang Valley', '3'),
(310, 'Lower Subansiri', '3'),
(311, 'Papum Pare', '3'),
(312, 'Tawang', '3'),
(313, 'Tirap', '3'),
(314, 'Upper Siang', '3'),
(315, 'Upper Subansiri', '3'),
(316, 'West Kameng', '3'),
(317, 'West Siang', '3'),
(401, 'Barpeta', '4'),
(402, 'Bongaigaon', '4'),
(403, 'Cachar', '4'),
(404, 'Darrang', '4'),
(405, 'Dhemaji', '4'),
(406, 'Dhubri', '4'),
(407, 'Dibrugarh', '4'),
(408, 'Goalpara', '4'),
(409, 'Golaghat', '4'),
(410, 'Guwahati', '4'),
(411, 'Hailakandi', '4'),
(412, 'Jorhat', '4'),
(413, 'Kamrup', '4'),
(414, 'Karbi Anglong', '4'),
(415, 'Karimganj', '4'),
(416, 'Kokrajhar', '4'),
(417, 'Lakhimpur', '4'),
(418, 'Marigaon', '4'),
(419, 'Nagaon', '4'),
(420, 'Nalbari', '4'),
(421, 'North Cachar Hills', '4'),
(422, 'Silchar', '4'),
(423, 'Sivasagar', '4'),
(424, 'Sonitpur', '4'),
(425, 'Tinsukia', '4'),
(426, 'Udalguri', '4'),
(501, 'Araria', '5'),
(502, 'Aurangabad', '5'),
(503, 'Banka', '5'),
(504, 'Begusarai', '5'),
(505, 'Bhagalpur', '5'),
(506, 'Bhojpur', '5'),
(507, 'Buxar', '5'),
(508, 'Darbhanga', '5'),
(509, 'East Champaran', '5'),
(510, 'Gaya', '5'),
(511, 'Gopalganj', '5'),
(512, 'Jamshedpur', '5'),
(513, 'Jamui', '5'),
(514, 'Jehanabad', '5'),
(515, 'Kaimur (Bhabua)', '5'),
(516, 'Katihar', '5'),
(517, 'Khagaria', '5'),
(518, 'Kishanganj', '5'),
(519, 'Lakhisarai', '5'),
(520, 'Madhepura', '5'),
(521, 'Madhubani', '5'),
(522, 'Munger', '5'),
(523, 'Muzaffarpur', '5'),
(524, 'Nalanda', '5'),
(525, 'Nawada', '5'),
(526, 'Patna', '5'),
(527, 'Purnia', '5'),
(528, 'Rohtas', '5'),
(529, 'Saharsa', '5'),
(530, 'Samastipur', '5'),
(531, 'Saran', '5'),
(532, 'Sheikhpura', '5'),
(533, 'Sheohar', '5'),
(534, 'Sitamarhi', '5'),
(535, 'Siwan', '5'),
(536, 'Supaul', '5'),
(537, 'Vaishali', '5'),
(538, 'West Champaran', '5'),
(601, 'Chandigarh', '6'),
(602, 'Mani Marja', '6'),
(701, 'Bastar', '7'),
(702, 'Bhilai', '7'),
(703, 'Bijapur', '7'),
(704, 'Bilaspur', '7'),
(705, 'Dhamtari', '7'),
(706, 'Durg', '7'),
(707, 'Janjgir-Champa', '7'),
(708, 'Jashpur', '7'),
(709, 'Kabirdham-Kawardha', '7'),
(710, 'Korba', '7'),
(711, 'Korea', '7'),
(712, 'Mahasamund', '7'),
(713, 'Narayanpur', '7'),
(714, 'Norh Bastar-Kanker', '7'),
(715, 'Raigarh', '7'),
(716, 'Raipur', '7'),
(717, 'Rajnandgaon', '7'),
(718, 'South Bastar-Dantewada', '7'),
(719, 'Surguja', '7'),
(801, 'Amal', '8'),
(802, 'Amli', '8'),
(803, 'Bedpa', '8'),
(804, 'Chikhli', '8'),
(805, 'Dadra & Nagar Haveli', '8'),
(806, 'Dahikhed', '8'),
(807, 'Dolara', '8'),
(808, 'Galonda', '8'),
(809, 'Kanadi', '8'),
(810, 'Karchond', '8'),
(811, 'Khadoli', '8'),
(812, 'Kharadpada', '8'),
(813, 'Kherabari', '8'),
(814, 'Kherdi', '8'),
(815, 'Kothar', '8'),
(816, 'Luari', '8'),
(817, 'Mashat', '8'),
(818, 'Rakholi', '8'),
(819, 'Rudana', '8'),
(820, 'Saili', '8'),
(821, 'Sili', '8'),
(822, 'Silvassa', '8'),
(823, 'Sindavni', '8'),
(824, 'Udva', '8'),
(825, 'Umbarkoi', '8'),
(826, 'Vansda', '8'),
(827, 'Vasona', '8'),
(828, 'Velugam', '8'),
(901, 'Brancavare', '9'),
(902, 'Dagasi', '9'),
(903, 'Daman', '9'),
(904, 'Diu', '9'),
(905, 'Magarvara', '9'),
(906, 'Nagwa', '9'),
(907, 'Pariali', '9'),
(908, 'Passo Covo', '9'),
(1001, 'Central Delhi', '10'),
(1002, 'East Delhi', '10'),
(1003, 'New Delhi', '10'),
(1004, 'North Delhi', '10'),
(1005, 'North East Delhi', '10'),
(1006, 'North West Delhi', '10'),
(1007, 'Old Delhi', '10'),
(1008, 'South Delhi', '10'),
(1009, 'South West Delhi', '10'),
(1010, 'West Delhi', '10'),
(1101, 'Canacona', '11'),
(1102, 'Candolim', '11'),
(1103, 'Chinchinim', '11'),
(1104, 'Cortalim', '11'),
(1105, 'Goa', '11'),
(1106, 'Jua', '11'),
(1107, 'Madgaon', '11'),
(1108, 'Mahem', '11'),
(1109, 'Mapuca', '11'),
(1110, 'Marmagao', '11'),
(1111, 'Panji', '11'),
(1112, 'Ponda', '11'),
(1113, 'Sanvordem', '11'),
(1114, 'Terekhol', '11'),
(1201, 'Ahmedabad', '12'),
(1202, 'Amreli', '12'),
(1203, 'Anand', '12'),
(1204, 'Banaskantha', '12'),
(1205, 'Baroda', '12'),
(1206, 'Bharuch', '12'),
(1207, 'Bhavnagar', '12'),
(1208, 'Dahod', '12'),
(1209, 'Dang', '12'),
(1210, 'Dwarka', '12'),
(1211, 'Gandhinagar', '12'),
(1212, 'Jamnagar', '12'),
(1213, 'Junagadh', '12'),
(1214, 'Kheda', '12'),
(1215, 'Kutch', '12'),
(1216, 'Mehsana', '12'),
(1217, 'Nadiad', '12'),
(1218, 'Narmada', '12'),
(1219, 'Navsari', '12'),
(1220, 'Panchmahals', '12'),
(1221, 'Patan', '12'),
(1222, 'Porbandar', '12'),
(1223, 'Rajkot', '12'),
(1224, 'Sabarkantha', '12'),
(1225, 'Surat', '12'),
(1226, 'Surendranagar', '12'),
(1227, 'Vadodara', '12'),
(1228, 'Valsad', '12'),
(1229, 'Vapi', '12'),
(1301, 'Ambala', '13'),
(1302, 'Bhiwani', '13'),
(1303, 'Faridabad', '13'),
(1304, 'Fatehabad', '13'),
(1305, 'Gurgaon', '13'),
(1306, 'Hisar', '13'),
(1307, 'Jhajjar', '13'),
(1308, 'Jind', '13'),
(1309, 'Kaithal', '13'),
(1310, 'Karnal', '13'),
(1311, 'Kurukshetra', '13'),
(1312, 'Mahendragarh', '13'),
(1313, 'Mewat', '13'),
(1314, 'Panchkula', '13'),
(1315, 'Panipat', '13'),
(1316, 'Rewari', '13'),
(1317, 'Rohtak', '13'),
(1318, 'Sirsa', '13'),
(1319, 'Sonipat', '13'),
(1320, 'Yamunanagar', '13'),
(1401, 'Bilaspur', '14'),
(1402, 'Chamba', '14'),
(1403, 'Dalhousie', '14'),
(1404, 'Hamirpur', '14'),
(1405, 'Kangra', '14'),
(1406, 'Kinnaur', '14'),
(1407, 'Kullu', '14'),
(1408, 'Lahaul & Spiti', '14'),
(1409, 'Mandi', '14'),
(1410, 'Shimla', '14'),
(1411, 'Sirmaur', '14'),
(1412, 'Solan', '14'),
(1413, 'Una', '14'),
(1501, 'Anantnag', '15'),
(1502, 'Baramulla', '15'),
(1503, 'Budgam', '15'),
(1504, 'Doda', '15'),
(1505, 'Jammu', '15'),
(1506, 'Kargil', '15'),
(1507, 'Kathua', '15'),
(1508, 'Kupwara', '15'),
(1509, 'Leh', '15'),
(1510, 'Poonch', '15'),
(1511, 'Pulwama', '15'),
(1512, 'Rajauri', '15'),
(1513, 'Srinagar', '15'),
(1514, 'Udhampur', '15'),
(1601, 'Bokaro', '16'),
(1602, 'Chatra', '16'),
(1603, 'Deoghar', '16'),
(1604, 'Dhanbad', '16'),
(1605, 'Dumka', '16'),
(1606, 'East Singhbhum', '16'),
(1607, 'Garhwa', '16'),
(1608, 'Giridih', '16'),
(1609, 'Godda', '16'),
(1610, 'Gumla', '16'),
(1611, 'Hazaribag', '16'),
(1612, 'Jamtara', '16'),
(1613, 'Koderma', '16'),
(1614, 'Latehar', '16'),
(1615, 'Lohardaga', '16'),
(1616, 'Pakur', '16'),
(1617, 'Palamu', '16'),
(1618, 'Ranchi', '16'),
(1619, 'Sahibganj', '16'),
(1620, 'Seraikela', '16'),
(1621, 'Simdega', '16'),
(1622, 'West Singhbhum', '16'),
(1701, 'Bagalkot', '17'),
(1702, 'Bangalore', '17'),
(1703, 'Bangalore Rural', '17'),
(1704, 'Belgaum', '17'),
(1705, 'Bellary', '17'),
(1706, 'Bhatkal', '17'),
(1707, 'Bidar', '17'),
(1708, 'Bijapur', '17'),
(1709, 'Chamrajnagar', '17'),
(1710, 'Chickmagalur', '17'),
(1711, 'Chikballapur', '17'),
(1712, 'Chitradurga', '17'),
(1713, 'Dakshina Kannada', '17'),
(1714, 'Davanagere', '17'),
(1715, 'Dharwad', '17'),
(1716, 'Gadag', '17'),
(1717, 'Gulbarga', '17'),
(1718, 'Hampi', '17'),
(1719, 'Hassan', '17'),
(1720, 'Haveri', '17'),
(1721, 'Hospet', '17'),
(1722, 'Karwar', '17'),
(1723, 'Kodagu', '17'),
(1724, 'Kolar', '17'),
(1725, 'Koppal', '17'),
(1726, 'Madikeri', '17'),
(1727, 'Mandya', '17'),
(1728, 'Mangalore', '17'),
(1729, 'Manipal', '17'),
(1730, 'Mysore', '17'),
(1731, 'Raichur', '17'),
(1732, 'Shimoga', '17'),
(1733, 'Sirsi', '17'),
(1734, 'Sringeri', '17'),
(1735, 'Srirangapatna', '17'),
(1736, 'Tumkur', '17'),
(1737, 'Udupi', '17'),
(1738, 'Uttara Kannada', '17'),
(1801, 'Alappuzha', '18'),
(1802, 'Alleppey', '18'),
(1803, 'Alwaye', '18'),
(1804, 'Ernakulam', '18'),
(1805, 'Idukki', '18'),
(1806, 'Kannur', '18'),
(1807, 'Kasargod', '18'),
(1808, 'Kochi', '18'),
(1809, 'Kollam', '18'),
(1810, 'Kottayam', '18'),
(1811, 'Kovalam', '18'),
(1812, 'Kozhikode', '18'),
(1813, 'Malappuram', '18'),
(1814, 'Palakkad', '18'),
(1815, 'Pathanamthitta', '18'),
(1816, 'Perumbavoor', '18'),
(1817, 'Thiruvananthapuram', '18'),
(1818, 'Thrissur', '18'),
(1819, 'Trichur', '18'),
(1820, 'Trivandrum', '18'),
(1821, 'Wayanad', '18'),
(1901, 'Agatti Island', '19'),
(1902, 'Bingaram Island', '19'),
(1903, 'Bitra Island', '19'),
(1904, 'Chetlat Island', '19'),
(1905, 'Kadmat Island', '19'),
(1906, 'Kalpeni Island', '19'),
(1907, 'Kavaratti Island', '19'),
(1908, 'Kiltan Island', '19'),
(1909, 'Lakshadweep Sea', '19'),
(1910, 'Minicoy Island', '19'),
(1911, 'North Island', '19'),
(1912, 'South Island', '19'),
(2001, 'Anuppur', '20'),
(2002, 'Ashoknagar', '20'),
(2003, 'Balaghat', '20'),
(2004, 'Barwani', '20'),
(2005, 'Betul', '20'),
(2006, 'Bhind', '20'),
(2007, 'Bhopal', '20'),
(2008, 'Burhanpur', '20'),
(2009, 'Chhatarpur', '20'),
(2010, 'Chhindwara', '20'),
(2011, 'Damoh', '20'),
(2012, 'Datia', '20'),
(2013, 'Dewas', '20'),
(2014, 'Dhar', '20'),
(2015, 'Dindori', '20'),
(2016, 'Guna', '20'),
(2017, 'Gwalior', '20'),
(2018, 'Harda', '20'),
(2019, 'Hoshangabad', '20'),
(2020, 'Indore', '20'),
(2021, 'Jabalpur', '20'),
(2022, 'Jagdalpur', '20'),
(2023, 'Jhabua', '20'),
(2024, 'Katni', '20'),
(2025, 'Khandwa', '20'),
(2026, 'Khargone', '20'),
(2027, 'Mandla', '20'),
(2028, 'Mandsaur', '20'),
(2029, 'Morena', '20'),
(2030, 'Narsinghpur', '20'),
(2031, 'Neemuch', '20'),
(2032, 'Panna', '20'),
(2033, 'Raisen', '20'),
(2034, 'Rajgarh', '20'),
(2035, 'Ratlam', '20'),
(2036, 'Rewa', '20'),
(2037, 'Sagar', '20'),
(2038, 'Satna', '20'),
(2039, 'Sehore', '20'),
(2040, 'Seoni', '20'),
(2041, 'Shahdol', '20'),
(2042, 'Shajapur', '20'),
(2043, 'Sheopur', '20'),
(2044, 'Shivpuri', '20'),
(2045, 'Sidhi', '20'),
(2046, 'Tikamgarh', '20'),
(2047, 'Ujjain', '20'),
(2048, 'Umaria', '20'),
(2049, 'Vidisha', '20'),
(2101, 'Ahmednagar', '21'),
(2102, 'Akola', '21'),
(2103, 'Amravati', '21'),
(2104, 'Aurangabad', '21'),
(2105, 'Beed', '21'),
(2106, 'Bhandara', '21'),
(2107, 'Buldhana', '21'),
(2108, 'Chandrapur', '21'),
(2109, 'Dhule', '21'),
(2110, 'Gadchiroli', '21'),
(2111, 'Gondia', '21'),
(2112, 'Hingoli', '21'),
(2113, 'Jalgaon', '21'),
(2114, 'Jalna', '21'),
(2115, 'Kolhapur', '21'),
(2116, 'Latur', '21'),
(2117, 'Mahabaleshwar', '21'),
(2118, 'Mumbai', '21'),
(2119, 'Mumbai City', '21'),
(2120, 'Mumbai Suburban', '21'),
(2121, 'Nagpur', '21'),
(2122, 'Nanded', '21'),
(2123, 'Nandurbar', '21'),
(2124, 'Nashik', '21'),
(2125, 'Osmanabad', '21'),
(2126, 'Parbhani', '21'),
(2127, 'Pune', '21'),
(2128, 'Raigad', '21'),
(2129, 'Ratnagiri', '21'),
(2130, 'Sangli', '21'),
(2131, 'Satara', '21'),
(2132, 'Sholapur', '21'),
(2133, 'Sindhudurg', '21'),
(2134, 'Thane', '21'),
(2135, 'Wardha', '21'),
(2136, 'Washim', '21'),
(2137, 'Yavatmal', '21'),
(2201, 'Bishnupur', '22'),
(2202, 'Chandel', '22'),
(2203, 'Churachandpur', '22'),
(2204, 'Imphal East', '22'),
(2205, 'Imphal West', '22'),
(2206, 'Senapati', '22'),
(2207, 'Tamenglong', '22'),
(2208, 'Thoubal', '22'),
(2209, 'Ukhrul', '22'),
(2301, 'East Garo Hills', '23'),
(2302, 'East Khasi Hills', '23'),
(2303, 'Jaintia Hills', '23'),
(2304, 'Ri Bhoi', '23'),
(2305, 'Shillong', '23'),
(2306, 'South Garo Hills', '23'),
(2307, 'West Garo Hills', '23'),
(2308, 'West Khasi Hills', '23'),
(2401, 'Aizawl', '24'),
(2402, 'Champhai', '24'),
(2403, 'Kolasib', '24'),
(2404, 'Lawngtlai', '24'),
(2405, 'Lunglei', '24'),
(2406, 'Mamit', '24'),
(2407, 'Saiha', '24'),
(2408, 'Serchhip', '24'),
(2501, 'Dimapur', '25'),
(2502, 'Kohima', '25'),
(2503, 'Mokokchung', '25'),
(2504, 'Mon', '25'),
(2505, 'Phek', '25'),
(2506, 'Tuensang', '25'),
(2507, 'Wokha', '25'),
(2508, 'Zunheboto', '25'),
(2601, 'Angul', '26'),
(2602, 'Balangir', '26'),
(2603, 'Balasore', '26'),
(2604, 'Baleswar', '26'),
(2605, 'Bargarh', '26'),
(2606, 'Berhampur', '26'),
(2607, 'Bhadrak', '26'),
(2608, 'Bhubaneswar', '26'),
(2609, 'Boudh', '26'),
(2610, 'Cuttack', '26'),
(2611, 'Deogarh', '26'),
(2612, 'Dhenkanal', '26'),
(2613, 'Gajapati', '26'),
(2614, 'Ganjam', '26'),
(2615, 'Jagatsinghapur', '26'),
(2616, 'Jajpur', '26'),
(2617, 'Jharsuguda', '26'),
(2618, 'Kalahandi', '26'),
(2619, 'Kandhamal', '26'),
(2620, 'Kendrapara', '26'),
(2621, 'Kendujhar', '26'),
(2622, 'Khordha', '26'),
(2623, 'Koraput', '26'),
(2624, 'Malkangiri', '26'),
(2625, 'Mayurbhanj', '26'),
(2626, 'Nabarangapur', '26'),
(2627, 'Nayagarh', '26'),
(2628, 'Nuapada', '26'),
(2629, 'Puri', '26'),
(2630, 'Rayagada', '26'),
(2631, 'Rourkela', '26'),
(2632, 'Sambalpur', '26'),
(2633, 'Subarnapur', '26'),
(2634, 'Sundergarh', '26'),
(2701, 'Bahur', '27'),
(2702, 'Karaikal', '27'),
(2703, 'Mahe', '27'),
(2704, 'Pondicherry', '27'),
(2705, 'Purnankuppam', '27'),
(2706, 'Valudavur', '27'),
(2707, 'Villianur', '27'),
(2708, 'Yanam', '27'),
(2801, 'Amritsar', '28'),
(2802, 'Bathinda', '28'),
(2803, 'Faridkot', '28'),
(2804, 'Fatehgarh Sahib', '28'),
(2805, 'Ferozepur', '28'),
(2806, 'Gurdaspur', '28'),
(2807, 'Hoshiarpur', '28'),
(2808, 'Jalandhar', '28'),
(2809, 'Kapurthala', '28'),
(2810, 'Ludhiana', '28'),
(2811, 'Mansa', '28'),
(2812, 'Moga', '28'),
(2813, 'Muktsar', '28'),
(2814, 'Nawanshahr', '28'),
(2815, 'Pathankot', '28'),
(2816, 'Patiala', '28'),
(2817, 'Rupnagar', '28'),
(2818, 'Sangrur', '28'),
(2819, 'SAS Nagar', '28'),
(2820, 'Tarn Taran', '28'),
(2821, 'Barnala', '28'),
(2901, 'Ajmer', '29'),
(2902, 'Alwar', '29'),
(2903, 'Banswara', '29'),
(2904, 'Baran', '29'),
(2905, 'Barmer', '29'),
(2906, 'Bharatpur', '29'),
(2907, 'Bhilwara', '29'),
(2908, 'Bikaner', '29'),
(2909, 'Bundi', '29'),
(2910, 'Chittorgarh', '29'),
(2911, 'Churu', '29'),
(2912, 'Dausa', '29'),
(2913, 'Dholpur', '29'),
(2914, 'Dungarpur', '29'),
(2915, 'Hanumangarh', '29'),
(2916, 'Jaipur', '29'),
(2917, 'Jaisalmer', '29'),
(2918, 'Jalore', '29'),
(2919, 'Jhalawar', '29'),
(2920, 'Jhunjhunu', '29'),
(2921, 'Jodhpur', '29'),
(2922, 'Karauli', '29'),
(2923, 'Kota', '29'),
(2924, 'Nagaur', '29'),
(2925, 'Pali', '29'),
(2926, 'Pilani', '29'),
(2927, 'Rajsamand', '29'),
(2928, 'Sawai Madhopur', '29'),
(2929, 'Sikar', '29'),
(2930, 'Sirohi', '29'),
(2931, 'Sri Ganganagar', '29'),
(2932, 'Tonk', '29'),
(2933, 'Udaipur', '29'),
(3001, 'Barmiak', '30'),
(3002, 'Be', '30'),
(3003, 'Bhurtuk', '30'),
(3004, 'Chhubakha', '30'),
(3005, 'Chidam', '30'),
(3006, 'Chubha', '30'),
(3007, 'Chumikteng', '30'),
(3008, 'Dentam', '30'),
(3009, 'Dikchu', '30'),
(3010, 'Dzongri', '30'),
(3011, 'Gangtok', '30'),
(3012, 'Gauzing', '30'),
(3013, 'Gyalshing', '30'),
(3014, 'Hema', '30'),
(3015, 'Kerung', '30'),
(3016, 'Lachen', '30'),
(3017, 'Lachung', '30'),
(3018, 'Lema', '30'),
(3019, 'Lingtam', '30'),
(3020, 'Lungthu', '30'),
(3021, 'Mangan', '30'),
(3022, 'Namchi', '30'),
(3023, 'Namthang', '30'),
(3024, 'Nanga', '30'),
(3025, 'Nantang', '30'),
(3026, 'Naya Bazar', '30'),
(3027, 'Padamachen', '30'),
(3028, 'Pakhyong', '30'),
(3029, 'Pemayangtse', '30'),
(3030, 'Phensang', '30'),
(3031, 'Rangli', '30'),
(3032, 'Rinchingpong', '30'),
(3033, 'Sakyong', '30'),
(3034, 'Samdong', '30'),
(3035, 'Singtam', '30'),
(3036, 'Sombari', '30'),
(3037, 'Soreng', '30'),
(3038, 'Sosing', '30'),
(3039, 'Tekhug', '30'),
(3040, 'Temi', '30'),
(3041, 'Tsetang', '30'),
(3042, 'Tsomgo', '30'),
(3043, 'Tumlong', '30'),
(3044, 'Yangang', '30'),
(3045, 'Yumtang', '30'),
(3046, 'Siniolchu', '30'),
(3101, 'Chennai', '31'),
(3102, 'Chidambaram', '31'),
(3103, 'Chingleput', '31'),
(3104, 'Coimbatore', '31'),
(3105, 'Courtallam', '31'),
(3106, 'Cuddalore', '31'),
(3107, 'Dharmapuri', '31'),
(3108, 'Dindigul', '31'),
(3109, 'Erode', '31'),
(3110, 'Hosur', '31'),
(3111, 'Kanchipuram', '31'),
(3112, 'Kanyakumari', '31'),
(3113, 'Karaikudi', '31'),
(3114, 'Karur', '31'),
(3115, 'Kodaikanal', '31'),
(3116, 'Kovilpatti', '31'),
(3117, 'Krishnagiri', '31'),
(3118, 'Kumbakonam', '31'),
(3119, 'Madurai', '31'),
(3120, 'Mayiladuthurai', '31'),
(3121, 'Nagapattinam', '31'),
(3122, 'Nagarcoil', '31'),
(3123, 'Namakkal', '31'),
(3124, 'Neyveli', '31'),
(3125, 'Nilgiris', '31'),
(3126, 'Ooty', '31'),
(3127, 'Palani', '31'),
(3128, 'Perambalur', '31'),
(3129, 'Pollachi', '31'),
(3130, 'Pudukkottai', '31'),
(3131, 'Rajapalayam', '31'),
(3132, 'Ramanathapuram', '31'),
(3133, 'Salem', '31'),
(3134, 'Sivaganga', '31'),
(3135, 'Sivakasi', '31'),
(3136, 'Thanjavur', '31'),
(3137, 'Theni', '31'),
(3138, 'Thoothukudi', '31'),
(3139, 'Tiruchirappalli', '31'),
(3140, 'Tirunelveli', '31'),
(3141, 'Tirupur', '31'),
(3142, 'Tiruvallur', '31'),
(3143, 'Tiruvannamalai', '31'),
(3144, 'Tiruvarur', '31'),
(3145, 'Trichy', '31'),
(3146, 'Tuticorin', '31'),
(3147, 'Vellore', '31'),
(3148, 'Villupuram', '31'),
(3149, 'Virudhunagar', '31'),
(3150, 'Yercaud', '31'),
(3201, 'Agartala', '32'),
(3202, 'Ambasa', '32'),
(3203, 'Bampurbari', '32'),
(3204, 'Belonia', '32'),
(3205, 'Dhalai', '32'),
(3206, 'Dharam Nagar', '32'),
(3207, 'Kailashahar', '32'),
(3208, 'Kamal Krishnabari', '32'),
(3209, 'Khopaiyapara', '32'),
(3210, 'Khowai', '32'),
(3211, 'Phuldungsei', '32'),
(3212, 'Radha Kishore Pur', '32'),
(3213, 'Tripura', '32');

-- --------------------------------------------------------

--
-- Table structure for table `all_states`
--

CREATE TABLE `all_states` (
  `state_code` int(11) NOT NULL,
  `state_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_states`
--

INSERT INTO `all_states` (`state_code`, `state_name`, `country_code`) VALUES
(1, 'Andaman & Nicobar [AN]', '+91'),
(2, 'Andhra Pradesh [AP]', '+91'),
(3, 'Arunachal Pradesh [AR]', '+91'),
(4, 'Assam [AS]', '+91'),
(5, 'Bihar [BH]', '+91'),
(6, 'Chandigarh [CH]', '+91'),
(7, 'Chhattisgarh [CG]', '+91'),
(8, 'Dadra & Nagar Haveli [DN]', '+91'),
(9, 'Daman & Diu [DD]', '+91'),
(10, 'Delhi [DL]', '+91'),
(11, 'Goa [GO]', '+91'),
(12, 'Gujarat [GU]', '+91'),
(13, 'Haryana [HR]', '+91'),
(14, 'Himachal Pradesh [HP]', '+91'),
(15, 'Jammu & Kashmir [JK]', '+91'),
(16, 'Jharkhand [JH]', '+91'),
(17, 'Karnataka [KR]', '+91'),
(18, 'Kerala [KL]', '+91'),
(19, 'Lakshadweep [LD]', '+91'),
(20, 'Madhya Pradesh [MP]', '+91'),
(21, 'Maharashtra [MH]', '+91'),
(22, 'Manipur [MN]', '+91'),
(23, 'Meghalaya [ML]', '+91'),
(24, 'Mizoram [MM]', '+91'),
(25, 'Nagaland [NL]', '+91'),
(26, 'Orissa [OR]', '+91'),
(27, 'Pondicherry [PC]', '+91'),
(28, 'Punjab [PJ]', '+91'),
(29, 'Rajasthan [RJ]', '+91'),
(30, 'Sikkim [SK]', '+91'),
(31, 'Tamil Nadu [TN]', '+91'),
(32, 'Tripura [TR]', '+91'),
(33, 'Uttar Pradesh [UP]', '+91'),
(34, 'Uttaranchal [UT]', '+91'),
(35, 'West Bengal [WB]', '+91');

-- --------------------------------------------------------

--
-- Table structure for table `cash_out`
--

CREATE TABLE `cash_out` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `cash_out` float NOT NULL,
  `updated_wallet_balance` float NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash_out`
--

INSERT INTO `cash_out` (`id`, `user_id`, `game_id`, `cash_out`, `updated_wallet_balance`, `created_at`, `updated_at`) VALUES
(1, 1, 60, 5000, 0, '2022-03-16 14:53:45', NULL),
(2, 4, 60, 1, 0, '2022-03-16 15:27:46', NULL),
(3, 1, 1, 1, 16999, '2022-03-19 06:53:27', NULL),
(4, 1, 1, 100, 16899, '2022-03-19 06:57:29', NULL),
(5, 1, 1, 100, 16799, '2022-03-19 06:58:07', NULL),
(6, 1, 2, 8000, 13799, '2022-03-19 08:58:04', NULL),
(7, 1, 3, 5000, 8799, '2022-03-19 09:18:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countryID` varchar(3) NOT NULL DEFAULT '',
  `countryName` varchar(52) NOT NULL DEFAULT '',
  `localName` varchar(45) NOT NULL,
  `webCode` varchar(2) NOT NULL,
  `region` varchar(26) NOT NULL,
  `continent` enum('Asia','Europe','North America','Africa','Oceania','Antarctica','South America') NOT NULL,
  `latitude` double NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `surfaceArea` float(10,2) NOT NULL DEFAULT 0.00,
  `population` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countryID`, `countryName`, `localName`, `webCode`, `region`, `continent`, `latitude`, `longitude`, `surfaceArea`, `population`) VALUES
('BRA', 'Brazil', 'Brasil', 'BR', 'South America', 'South America', -10, -55, 8547403.00, 170115000),
('CHN', 'China', 'Zhongquo', 'CN', 'Eastern Asia', 'Asia', 35, 105, 9572900.00, 1277558000),
('FRA', 'France', '', 'FR', 'Western Europe', 'Europe', 47, 2, 551500.00, 59225700),
('IND', 'India', 'Bharat/India', 'IN', 'Southern and Central Asia', 'Asia', 28.47, 77.03, 3287263.00, 1013662000),
('USA', 'USA', 'United States', 'US', 'North America', 'North America', 38, -97, 9363520.00, 278357000);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `category` varchar(55) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `team_a` varchar(255) NOT NULL,
  `team_b` varchar(255) NOT NULL,
  `match_date_time` datetime NOT NULL,
  `status` varchar(55) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `category`, `game_type`, `team_a`, `team_b`, `match_date_time`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cricket', 'T20', 'CSK', 'KKR', '2022-03-19 18:22:00', 'Upcoming', '2022-03-19 06:52:53', NULL, NULL),
(2, 'Cricket', 'T20', 'RR', 'BLR', '2022-03-19 17:27:00', 'Upcoming', '2022-03-19 08:57:45', NULL, NULL),
(3, 'Cricket', 'T20', 'DD', 'KKR', '2022-03-19 14:29:00', 'Upcoming', '2022-03-19 08:59:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1554983730),
('m130524_201442_init', 1554983734),
('m190124_110200_add_verification_token_column_to_user_table', 1554983734);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upi_id` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `amount`, `reference_id`, `payment_mode`, `upi_id`, `ordered_at`, `status`) VALUES
(1, 1, '5000', '123456789521', 'Gpay', 'sri.rahdirs@oksbi', '2022-03-16 02:52:36', 'Approved'),
(2, 4, '1', '207581364334', 'Gpay', 'sri.rahdirs@oksbi', '2022-03-16 03:25:23', 'Approved'),
(3, 1, '5000', '123456789521', 'Gpay', 'sri.rahdirs@oksbi', '2022-03-19 00:39:26', 'Approved'),
(4, 1, '5000', '', 'Gpay', 'sri.rahdirs@oksbi', '2022-03-19 00:48:42', 'Approved'),
(5, 1, '5000', '123456789521', 'Gpay', 'sri.rahdirs@oksbi', '2022-03-19 00:53:17', 'Approved'),
(6, 1, '2000', '123456789521', 'Gpay', 'sri.rahdirs@oksbi', '2022-03-19 00:58:30', 'Approved'),
(7, 1, '5000', '123456789521', 'Gpay', 'sri.rahdirs@oksbi', '2022-03-19 04:23:56', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `upi`
--

CREATE TABLE `upi` (
  `id` int(11) NOT NULL,
  `upi_id` text NOT NULL,
  `upi_method` varchar(255) NOT NULL,
  `status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upi`
--

INSERT INTO `upi` (`id`, `upi_id`, `upi_method`, `status`) VALUES
(1, '9789253515@ybl', 'Phonepe', 'Active'),
(2, 'sri.rahdirs@oksbi', 'Gpay', 'Active'),
(3, '9789253515@paytm', 'Paytm', 'Active'),
(4, '9789253515@upi', 'Bhim', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp_verified` smallint(6) DEFAULT 0,
  `email_verified` smallint(6) DEFAULT 0,
  `admin_verified` smallint(6) DEFAULT 0,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile_number`, `password`, `password_reset_token`, `gender`, `otp`, `otp_verified`, `email_verified`, `admin_verified`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'smssri', 'sri.rahdirs@gmail.com', '9789253515', '$2y$10$MwjRYQOjdfDXqRyru0e/FOg9ca29PBPCuNcpgPKaeiD63SZqEaSk2', NULL, 'Male', NULL, 0, 0, 0, 10, '2021-05-03 18:23:39', '2021-05-03 18:23:39', 'rJT6HDYwfc5P7qbQK1WAZxEB48dtXRSsMzhOoyGvCue9kagnjp'),
(2, 'Nowsee', 'jayaprathapbcab@gmail.com', '8618805220', '$2y$10$a.Ycb4sQeFVafitd.9Qmq.4rZ7LUo/S9f15G7UOIIE1Z2Xfqw.6/y', NULL, NULL, NULL, 0, 0, 0, 10, '2021-05-04 04:57:34', '2021-05-04 04:57:34', '2MzGmyecZ8iXBJrLRCxjdtphTl0YFQVuv7aKEwNOsDgIqb569S'),
(3, 'harshad', 'gujjubaba333@gmail.com', '9624604613', '$2y$10$u2fQ68m11oa5.f/BE35Ll.UTwwflDt1u5XCLyBZqMxuax5GE0eJIm', NULL, NULL, NULL, 0, 0, 0, 10, '2022-01-10 07:15:32', '2022-01-10 07:15:32', 'nRXTI7UgwY2G5B4otf8QxLm3yM1izFdj6Ab9pvDurklPVCJZNa'),
(4, 'jayaprathap', 'jayaprathapvcc@gmail.com', '9677651789', '$2y$10$s/Q1o2wBDxA44Ye8idR.UeJbyVq6QJq9gGracncf3SDD/IyvjZMui', NULL, NULL, NULL, 0, 0, 0, 10, '2022-03-16 15:18:42', '2022-03-16 15:18:42', 'EKoPwkZjFO6zxahyp8b7f9YJrqim3MCduvesSD05nLXBtIgHUW');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `pan_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pan_card_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_proof_file_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_proof_file_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'cheque,passbook,statement',
  `bank_proof_file` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_pan_verified` enum('Yes','Rejected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_address_proof_verified` enum('Yes','Rejected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_bank_account_verified` enum('Yes','Rejected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `address`, `state_id`, `city_id`, `pan_card`, `pan_card_file`, `address_proof`, `address_proof_file_1`, `address_proof_file_2`, `account_number`, `ifsc_code`, `bank_name`, `bank_proof`, `bank_proof_file`, `is_pan_verified`, `is_address_proof_verified`, `is_bank_account_verified`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sridhar', 'Vellingiri', 'VASANTHAM, U Block, Kovai Pudur\r\n2a', 31, 3104, 'EERER', 'b76e8764b5a495b72449ddc723a79ba5_download (1).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', NULL, NULL, '2021-05-03 18:23:39', '2022-03-19 10:59:38'),
(2, 2, 'Sridhar', 'Vellingiri', 'VASANTHAM, U Block, Kovai Pudur\r\n2a', 31, 3104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 04:57:34', '2022-03-19 09:30:12'),
(3, 3, 'Sridhar', 'Vellingiri', 'VASANTHAM, U Block, Kovai Pudur\r\n2a', 31, 3104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-10 07:15:32', '2022-03-19 09:30:12'),
(4, 4, 'Sridhar', 'Vellingiri', 'VASANTHAM, U Block, Kovai Pudur\r\n2a', 31, 3104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-16 15:18:42', '2022-03-19 09:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_games`
--

CREATE TABLE `user_games` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `betting_team` varchar(255) NOT NULL,
  `betting_amount` float NOT NULL,
  `final_amount` float NOT NULL,
  `status` varchar(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_games`
--

INSERT INTO `user_games` (`id`, `user_id`, `game_id`, `betting_team`, `betting_amount`, `final_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 60, 'CSK', 5000, 9000, 'placed', '2022-03-16 14:53:45', NULL),
(2, 4, 60, 'CSK', 1, 1.8, 'placed', '2022-03-16 15:27:46', NULL),
(3, 1, 1, 'CSK', 1, 1.8, 'placed', '2022-03-19 06:53:27', NULL),
(4, 1, 1, 'KKR', 100, 180, 'placed', '2022-03-19 06:57:29', NULL),
(5, 1, 1, 'KKR', 100, 180, 'placed', '2022-03-19 06:58:07', NULL),
(6, 1, 2, 'RR', 8000, 14400, 'placed', '2022-03-19 08:58:04', NULL),
(7, 1, 3, 'DD', 5000, 9000, 'placed', '2022-03-19 09:18:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet`
--

CREATE TABLE `user_wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `practice_cash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_wallet`
--

INSERT INTO `user_wallet` (`id`, `user_id`, `cash`, `practice_cash`, `created_at`, `updated_at`) VALUES
(1, 1, '8799', NULL, '2022-03-16 02:53:12', '2022-03-19 04:48:55'),
(2, 4, '0', NULL, '2022-03-16 03:26:06', '2022-03-16 03:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_history`
--

CREATE TABLE `withdrawal_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_old_cash` float NOT NULL,
  `withdrawal_amount` float NOT NULL,
  `wallet_balance` float DEFAULT NULL,
  `withdrawal_date` datetime DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_cities`
--
ALTER TABLE `all_cities`
  ADD PRIMARY KEY (`city_code`);

--
-- Indexes for table `all_states`
--
ALTER TABLE `all_states`
  ADD PRIMARY KEY (`state_code`);

--
-- Indexes for table `cash_out`
--
ALTER TABLE `cash_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`countryID`),
  ADD UNIQUE KEY `webCode` (`webCode`),
  ADD UNIQUE KEY `countryName` (`countryName`),
  ADD KEY `region` (`region`),
  ADD KEY `continent` (`continent`),
  ADD KEY `population` (`population`),
  ADD KEY `surfaceArea` (`surfaceArea`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `upi`
--
ALTER TABLE `upi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD UNIQUE KEY `otp` (`otp`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_games`
--
ALTER TABLE `user_games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallet`
--
ALTER TABLE `user_wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `withdrawal_history`
--
ALTER TABLE `withdrawal_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `all_cities`
--
ALTER TABLE `all_cities`
  MODIFY `city_code` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3214;

--
-- AUTO_INCREMENT for table `all_states`
--
ALTER TABLE `all_states`
  MODIFY `state_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cash_out`
--
ALTER TABLE `cash_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `upi`
--
ALTER TABLE `upi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_games`
--
ALTER TABLE `user_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_wallet`
--
ALTER TABLE `user_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdrawal_history`
--
ALTER TABLE `withdrawal_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_wallet`
--
ALTER TABLE `user_wallet`
  ADD CONSTRAINT `user_wallet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
