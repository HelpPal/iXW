-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2014 at 10:08 PM
-- Server version: 5.5.33-31.1
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `suzaid_xplor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_business`
--

CREATE TABLE IF NOT EXISTS `tb_business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_num` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `allow` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `tb_business`
--

INSERT INTO `tb_business` (`id`, `name`, `email`, `phone_num`, `icon`, `allow`) VALUES
(49, 'METRO', '', '', 'metro-sign.png', 1),
(50, 'BUS STATION', '', '', 'bus-icon.png', 1),
(52, 'TRAINS', '', '', 'train-icon.png', 1),
(48, 'HOSPITAL ', 'test@test.com', '', 'hospital.png', 1),
(53, 'Clinic', '', '', 'clinic-100.png', 0),
(54, 'test', 'pp@gmail.com', '123456789', 'home.png', 1),
(57, 'zaid', 'info@q8webdesign.com', '97400744', '', 0),
(58, 'test ipa2.1', 'test@test.com', '97400754', 'Adonis.png', 0),
(59, 'omda', 'omda@omda.com', '5149008515', '', 0),
(73, 'programming', 'client@gmail.com', '37247238742', 'addButton.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `name`, `icon`) VALUES
(18, 'Public Transportation', 'train-100.png'),
(19, 'Hospitals', 'hospitals.png'),
(20, 'Pharmacies', 'pharmacy.png'),
(21, 'Restaurants ', 'restaurant-100.png'),
(22, 'Coffee', 'coffee_to_go-100.png'),
(23, 'Bars and Pubs', 'beer-100.png'),
(24, 'Banks', 'money_bag-128.png'),
(25, 'Malls', 'shopping_bag-100.png'),
(26, 'Groceries', 'shopping_cart_loaded-100.png'),
(27, 'Clinics', 'clinic-100.png'),
(28, 'Daycares', 'babyroom-100.png'),
(29, 'Hairstyles', 'Hairstyles-icon.png'),
(30, 'Spa and Salon', 'spa-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_position`
--

CREATE TABLE IF NOT EXISTS `tb_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `kind` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vicinity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `call_num` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `allow` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=148 ;

--
-- Dumping data for table `tb_position`
--

INSERT INTO `tb_position` (`id`, `client_id`, `kind`, `name`, `vicinity`, `call_num`, `description`, `latitude`, `longitude`, `allow`) VALUES
(2, 34, 5, 'Café Bistro', '', '1234567890', '602, boulevard Curé-Labelle, Laval QC H7V 2T6\n602, boulevard Curé-Labelle, Laval QC H7V 2T6\n602, boulevard Curé-Labelle, Laval QC H7V 2T6\n602, boulevard Curé-Labelle, Laval QC H7V 2T6\n602, boulevard Curé-Labelle, Laval QC H7V 2T6\n602, boulevard Curé-Labelle, Laval QC H7V 2T6\n602, boulevard Curé-Labelle, Laval QC H7V 2T6\n602, boulevard Curé-Labelle, Laval QC H7V 2T6\n602, boulevard Curé-Labelle, Laval QC H7V 2T6\n602, boulevard Curé-Labelle, Laval QC H7V 2T6', '45.5507853', '-73.780689', 0),
(4, 35, 2, 'Marché Adonis', '', '13928942823423423423', 'Marché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché AdonisMarché Adonis', '24354646', '-46575567577', 0),
(5, 36, 3, 'Rib and Reef', '', '1800800', 'Test Reb and Reef', '45.500164', '-73.662789', 1),
(21, 48, 19, 'The Montreal General Hospital', '', '(514) 934-1934', 'The Montreal General Hospital\n1650 Cedar Ave\nMontreal, QC H3G 1A4\nCanada\nOpen today\nOpen 24 hours', '45.4972876', '-73.589317', 1),
(22, 49, 18, 'Station Montmorency', '', '', '1420 Rue Lucien-Paiement\nLaval, QC H7N 0B5, Canada\n\nLine: Orange ', '45.55833', '-73.72182', 1),
(23, 49, 18, 'Station De la Concorde', '', '', '1292 Boulevard de la Concorde Ouest\nLaval, QC H7N, Canada\n\nLine: Orange\n\n\n', '45.560519', '-73.709604', 1),
(28, 50, 18, 'De La Concorde', '', '', 'De La Concorde  Laval 41380\n\nBuses from this station:\n\nTerminus Henri-Bourassa 40102\n1:51 am - 2:31 am\n\nMétro Cartier 47133\n7:32 am 9:02 am\n\nMétro Cartier 47137\n7:17 am 7:46 am\n\nChartrand -  Déry 49042\n8:34 am 9:04 am\n\nstl.laval.qc.ca', '45.55079', '-73.78069', 1),
(27, 52, 18, 'gare De la Concorde', '', '', 'Trains from this station:\n\nDirection Saint-Jérôme\n\n8:55 am 10:55 am\n', '45.560279', '-73.71010209999997', 1),
(20, 48, 19, 'Hôpital de la Cité-de-la-Santé', '', '450-668-1010', 'Hôpital de la Cité-de-la-Santé\n1755 Boulevard René Laennec\nLaval, QC H7M 3L9\nCanada', '45.603333', '-73.71073849999999', 1),
(125, 54, 19, 'test2', '', '', 'Test Position2', '41.369525', '123.517012', 1),
(127, 54, 19, 'test4', '', '222', 'test 4 asfjo mwa oi;evaw;eo ira weouw;oerijaweo nviowe ;nfoawiefji;oawvweinv;awenif;awefin ;weafin;awenfi a;weofiawej f;oawei jf;waeiofja;weoneoi voeafjalwoeif aweuroaewovniewa;f wejfaowefj aewfnia;owefnia;wefawieoutaoiwgjnonifwetest 4 asfjo mwa oi;evaw;eo ira weouw;oerijaweo nviowe ;nfoawiefji;oawvweinv;awenif;awefin ;weafin;awenfi a;weofiawej f;oawei jf;waeiofja;weoneoi voeafjalwoeif aweuroaewovniewa;f wejfaowefj aewfnia;owefnia;wefawieoutaoiwgjnonifwetest 4 asfjo mwa oi;evaw;eo ira weouw;oerijaweo nviowe ;nfoawiefji;oawvweinv;awenif;awefin ;weafin;awenfi a;weofiawej f;oawei jf;waeiofja;weoneoi voeafjalwoeif aweuroaewovniewa;f wejfaowefj aewfnia;owefnia;wefawieoutaoiwgjnonifwetest 4 asfjo mwa oi;evaw;eo ira weouw;oerijaweo nviowe ;nfoawiefji;oawvweinv;awenif;awefin ;weafin;awenfi a;weofiawej f;oawei jf;waeiofja;weoneoi voeafjalwoeif aweuroaewovniewa;f wejfaowefj aewfnia;owefnia;wefawieoutaoiwgjnonifwetest 4 asfjo mwa oi;evaw;eo ira weouw;oerijaweo nviowe ;nfoawiefji;oawvweinv;awenif;awefin ;weafin;awenfi a;weofiawej f;oawei jf;waeiofja;weoneoi voeafjalwoeif aweuroaewovniewa;f wejfaowefj aewfnia;owefnia;wefawieoutaoiwgjnonifwe', '41.84953', '123.39701', 1),
(31, 52, 18, 'Train test', '', '', 'test test', '45.55422220000001', '-73.7768393', 1),
(32, 49, 18, 'Station Cartier', '', '', 'Subway services from this station\n2\nStation Côte-Vertu\n7:34 am *\n7:34 am *\n', '45.560398', '-73.68171799999999', 1),
(33, 49, 18, 'Station Henri-Bourassa', '', '', 'Station Henri-Bourassa, Montreal, QC H2C, Canada\nline orange \ndirection: station cote-vertu ', '45.55611', '-73.66745', 1),
(35, 49, 18, 'Station Sauvé', '', '', ' Montreal, QC H3L, Canada \n\nline orange \ndirection : station cote-vertu\n\n', '45.550714', '-73.65646199999998', 1),
(36, 49, 18, 'Station Crémazie ', '', '', 'Montreal, QC H2M, Canada \n\nline orange \ndirection : station cote-vertu\n', '45.54599', '-73.638758', 1),
(37, 49, 18, 'Station Jarry', '', '', 'Montreal, QC H2P, Canada \nline orange \ndirection : station cote-vertu\n', '45.543308', '-73.62853000000001', 1),
(38, 49, 18, 'Station Jean-Talon  ', '', '', 'Montreal, QC H2R, Canada \nline orange \ndirection : station cote-vertu', '45.5387', '-73.61391', 1),
(39, 49, 18, 'Station Beaubien ', '', '', 'Montreal, QC H2S, Canada\nline orange \ndirection : station cote-vertu', '45.535584', '-73.60450700000001', 1),
(40, 49, 18, 'Station Rosemont ', '', '', 'Montreal, QC H2S, Canada \nline orange \ndirection : station cote-vertu', '45.531243', '-73.59784400000001', 1),
(41, 49, 18, 'Station Laurier ', '', '', 'Montreal, QC H2J, Canada \nline orange \ndirection : station cote-vertu', '45.52704199999999', '-73.58624199999997', 1),
(42, 49, 18, 'Station Mont-Royal ', '', '', 'line orange ', '45.524561', '-73.58177599999999', 1),
(43, 49, 18, 'Station Sherbrooke ', '', '', 'line orange ', '45.518345', '-73.56825100000003', 1),
(44, 49, 18, 'Station Berri-UQAM ', '', '', 'line orange , acces to line green and yellow ', '45.514851', '-73.55965400000002', 1),
(45, 49, 18, 'Station Champ-de-Mars', '', '', 'line orange ', '45.51019', '-73.55633499999999', 1),
(46, 49, 18, 'Station Square-Victoria', '', '', 'line orange', '45.50156', '-73.563647', 1),
(47, 49, 18, 'Station Bonaventure', '', '', 'line orange ', '45.498046', '-73.566892', 1),
(48, 49, 18, 'Station Georges-Vanier', '', '', 'line orange ', '45.488962', '-73.576435', 1),
(49, 49, 18, 'Station Lionel-Groulx', '', '', 'line orange and acces to green line ', '45.48287999999999', '-73.579611', 1),
(50, 49, 18, 'Station Place-Saint-Henri', '', '', 'line orange ', '45.477202', '-73.58662600000002', 1),
(51, 49, 18, 'Station Vendôme', '', '', 'line orange ', '45.473986', '-73.60402199999999', 1),
(52, 49, 18, 'Station Villa-Maria', '', '', 'line orange ', '45.479501', '-73.61988400000001', 1),
(53, 49, 18, 'Station Snowdon', '', '', 'line orange and acces to blue line ', '45.485432', '-73.62793699999997', 1),
(54, 49, 18, 'Station Côte-Sainte-Catherine', '', '', 'line orange ', '45.492459', '-73.63280600000002', 1),
(55, 49, 18, 'Station Plamondon', '', '', 'line orange ', '45.494353', '-73.63788799999998', 1),
(56, 49, 18, 'Station Namur, Montreal', '', '', 'line orange ', '45.49497', '-73.65310799999997', 1),
(57, 49, 18, 'Station De la Savane', '', '', 'line orange ', '45.500345', '-73.66179', 1),
(58, 49, 18, 'Station Du Collège', '', '', 'line orange ', '45.509446', '-73.674781', 1),
(59, 49, 18, 'Station Côte-Vertu', '', '', 'line orange ', '45.514233', '-73.683063', 1),
(64, 49, 18, 'Station Lucien-L Allier', '', '', 'line orange', '45.494944', '-73.57108900000003', 1),
(63, 49, 18, 'Place d-Armes', '', '', '\n\nline orange ', '45.50611', '-73.55973', 1),
(65, 49, 18, 'Station Côte-des-Neiges', '', '', 'line blue ', '45.496306', '-73.62253399999997', 1),
(66, 49, 18, 'Station Université-de-Montréal', '', '', 'line blue ', '45.50341', '-73.61782199999999', 1),
(67, 49, 18, 'Station Édouard-Montpetit', '', '', 'line blue', '45.510089', '-73.61262399999998', 1),
(68, 49, 18, 'Station Outremont', '', '', 'line blue', '45.520103', '-73.61509899999998', 1),
(69, 49, 18, 'Station Acadie', '', '', 'line blue', '45.523487', '-73.62372700000003', 1),
(70, 49, 18, 'Station Parc', '', '', 'line blue', '45.530223', '-73.62393199999997', 1),
(71, 49, 18, 'Station De Castelnau', '', '', 'line blue ', '45.53523999999999', '-73.61989599999998', 1),
(72, 49, 18, 'Station Jean-Drapeau', '', '', 'Line : yellow', '45.512289', '-73.53337099999999', 1),
(73, 49, 18, 'Station Longueuil-Université de Sherbrooke', '', '', '\nLine: yellow\n\nStation Longueuil-Université de Sherbrooke', '45.525191', '-73.52196099999997', 1),
(74, 49, 18, 'Station Fabre', '', '', 'Line: blue', '45.547917', '-73.60740899999996', 1),
(75, 49, 18, 'Station D Iberville', '', '', 'Line: blue', '45.55378', '-73.6021', 1),
(76, 49, 18, 'Station Saint-Michel', '', '', 'Line: blue', '45.559798', '-73.600077', 1),
(77, 49, 18, 'Station Angrignon', '', '', 'Line: green ', '45.44629399999999', '-73.60375199999998', 1),
(78, 49, 18, 'Station Monk', '', '', 'line: Green ', '45.451007', '-73.59338000000002', 1),
(79, 49, 18, 'Station Jolicoeur', '', '', 'Line:green', '45.456787', '-73.58211499999999', 1),
(80, 49, 18, 'Station Verdun', '', '', 'Line: green ', '45.459222', '-73.57183299999997', 1),
(81, 49, 18, 'Station De L Église', '', '', 'Line:green', '45.461818', '-73.56721600000003', 1),
(82, 49, 18, 'Station LaSalle', '', '', 'Line:green', '45.470736', '-73.56613500000003', 1),
(83, 49, 18, 'Station Charlevoix', '', '', 'Line:green', '45.47831799999999', '-73.56934899999999', 1),
(84, 49, 18, 'Station Atwater', '', '', 'Line:green', '45.489345', '-73.584202', 1),
(85, 49, 18, 'Station Atwater', '', '', 'Line:green', '45.489345', '-73.584202', 1),
(86, 49, 18, 'Station Guy-Concordia', '', '', 'Line:green', '45.495678', '-73.57905599999998', 1),
(87, 49, 18, 'Station Peel', '', '', 'Line:green', '45.50089000000001', '-73.574971', 1),
(89, 49, 18, 'Station McGill', '', '', 'Line:green', '45.504117', '-73.57130999999998', 1),
(90, 49, 18, 'Station Place-des-Arts', '', '', 'Line:green', '45.508211', '-73.56812200000001', 1),
(91, 49, 18, 'Station Saint-Laurent', '', '', 'Line:green', '45.510773', '-73.56489899999997', 1),
(92, 49, 18, 'Station Beaudry', '', '', 'line:green', '45.518977', '-73.55584999999996', 1),
(93, 49, 18, 'Station Papineau', '', '', 'Line:green', '45.523643', '-73.55197099999998', 1),
(94, 49, 18, 'Station Frontenac', '', '', 'Line:green', '45.53309', '-73.552325', 1),
(95, 49, 18, 'Station Préfontaine', '', '', 'Line:green', '45.541529', '-73.55441200000001', 1),
(96, 49, 18, 'Station Joliette', '', '', 'Line:green', '45.546963', '-73.55150800000001', 1),
(97, 49, 18, 'Station Pie-IX', '', '', 'Line:green', '45.553901', '-73.55184700000001', 1),
(98, 49, 18, 'Station Viau', '', '', 'Line:green', '45.560894', '-73.547215', 1),
(99, 49, 18, 'Station Assomption', '', '', 'Line:green', '45.56923', '-73.54678799999999', 1),
(100, 49, 18, 'Station Cadillac', '', '', 'line:green', '45.577005', '-73.54635999999999', 1),
(101, 49, 18, 'Station Langelier', '', '', 'line:green', '45.582963', '-73.54272000000003', 1),
(102, 49, 18, 'Station Radisson', '', '', 'line:green', '45.589306', '-73.53957100000002', 1),
(103, 49, 18, 'Station Honoré-Beaugrand', '', '', 'Line: green', '45.596865', '-73.53448600000001', 1),
(104, 48, 19, 'Lakeshore General Hospital', '', '(514) 630-2225', '160 Stillview Ave\nPointe-Claire, QC H9R 2Y2', '45.4486514', '-73.83335729999999', 1),
(105, 48, 19, 'Centre Hospitalier De St-Mary', '', '(514) 345-3511', '3830 Avenue Lacombe\nMontreal, QC H3T 1M7', '45.4949572', '-73.62431379999998', 1),
(107, 48, 19, 'Hôpital Général Juif', '', '(514) 340-8222', '3755 Côte-Sainte-Catherine Road\nMontreal, QC H3T 1E2', '45.4979553', '-73.6292138', 1),
(108, 48, 19, 'Centre hospitalier universitaire Sainte-Justine', '', '(514) 345-4931', '3175 Chemin de la Côte-Sainte-Catherine\nMontreal, QC H3T 1C5', '45.5032787', '-73.62422859999998', 1),
(109, 48, 19, 'The Montreal Children s Hospital', '', '(514) 412-4400', 'Hôpital de Montréal pour enfants du CUSM, 2300 Rue Tupper, Montréal, QC H3H 1P3, Canada', '45.4887478', '-73.58218720000002', 1),
(110, 48, 19, 'The Montreal General Hospital', '', '(514) 934-1934', 'Hôpital général de Montréal, 1650 Avenue Cedar, Montréal, QC H3G 1A4, Canada', '45.4972958', '-73.5889919', 1),
(111, 48, 19, 'Hôtel-Dieu de Montréal', '', '(514) 890-8000', 'Hôtel-Dieu de Montréal, 3840 St Urbain St, Montréal, QC H2W 1T8, Canada', '45.5144335', '-73.5778568', 1),
(112, 48, 19, 'Shriners Hospital for Children', '', '(514) 842-4464', ' 1529 Avenue Cedar, Montréal, QC H3G 1A6, Canada', '45.49958', '-73.58822', 1),
(113, 48, 19, 'Montreal Heart Institute', '', '514) 376-3330', ' 5000 Bélanger Street, Montréal, QC H1T 1C8, Canada', '45.5738498', '-73.578147', 1),
(114, 48, 19, 'Centre Hospitalier Mont-Sinaï', '', '(514) 369-2222', '5690 Boulevard Cavendish, Côte Saint-Luc, QC H4W 1S7, Canada', '45.4739765', '-73.65746899999999', 1),
(115, 48, 19, 'Richardson Hospital', '', '(514) 484-7878', 'Hôpital Richardson, Montréal, QC H4V, Canada', '45.4719211', '-73.6458217', 1),
(116, 48, 19, 'Hospital De Verdun', '', '(514) 362-1000', '4000 Boulevard Lasalle\nVerdun, QC H4G 2A3', '45.4640898', '-73.56396699999999', 1),
(126, 54, 19, 'test3', '', '11', 'test3', '42.869525', '122.417012', 1),
(117, 54, 19, 'Santaizi, Huanggu, Shenyang, China, 110000', '', '23423 afhbweb awe', 'sdbabfwe wae fawefbawefb aw e', '41.869525', '123.417012', 1),
(128, 54, 19, 'test5', '', '333', 'test5', '41.369525', '123.497012', 1),
(129, 54, 19, 'test6', '', '444', 'test6', '41.809525', '123.407012', 1),
(130, 57, 0, '', '', '', '', '45.536869', '-73.741419', 0),
(131, 58, 26, 'Adonis', '', '1324354646', 'test adonis', '45.5575', '-73.76645', 1),
(132, 59, 0, '', '', '', '', '45.5393938', '-73.7467123', 0),
(145, 73, 18, 'Home Job', '', '2374928429', 'This is my client home job.\nPlease check this.', '33.0787152', '-96.80830630000003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
(3, 'zaid', 'suzaid3072011', 'z', 'j'),
(6, 'zaid', 'Cwa5147068582', 'admin', 'admin'),
(5, 'zaid', 'Cwa9008515', 'zaid', 'jaber');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
