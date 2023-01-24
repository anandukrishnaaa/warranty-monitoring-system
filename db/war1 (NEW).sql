-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 09:29 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `war1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_bank`
--

CREATE TABLE IF NOT EXISTS `account_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `aadhar_no` varchar(50) NOT NULL,
  `id_proof` varchar(25) NOT NULL,
  `photo` varchar(25) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `account_bank`
--

INSERT INTO `account_bank` (`id`, `name`, `address`, `contact`, `gender`, `aadhar_no`, `id_proof`, `photo`, `account_no`, `amount`, `status`) VALUES
(28, 'Mathew M', 'kjnkjsdvjsbdv<br />\r\nsvjbsjhvbsv<br />\r\nsvskvjnskjvnkjsvn', '9638527415', 'Male', '123123123123123', '1.jpg', '1.jpg', '266387', '454301830000', 1),
(29, 'Meena M', 'jncjabjchbasc<br />\r\nacbjajcbajsc<br />\r\nacacjhasbcj', '9638527414', 'Female', '123456', '29.jpg', '29.jpg', '209725', '16360000000', 1),
(30, 'Soumya M', 'asischvahgcv<br />\r\nacka bc acv ', '963555444.8', 'Female', '1234567', '30.1302.jpg', '30.jpg', '521957', '200000000000', 1),
(31, 'Pritha ', 'jvdcvdhgcvd<br />\r\ncsldjkbcjhdsbcjhdbsc<br />\r\ndclkjsdbchjb', '9638527412', 'Female', '90375424', '31.1302.jpg', '31.jpg', '494985', '108978170000', 1),
(32, 'anu', 'anu nivas', '9876543210', 'Female', '12345678', '32.1302.jpg', '32.jpg', '646762', '30000000000', 1),
(33, 'Meera', 'bcjhb cjhwb cjhwbc ', '9874563210', 'Female', '123123123123123', '33.png', '33.png', '856134', '100000000000', 1),
(34, 'Asha', 'hjbhjdbsjhcbdsjchb', '89754621345', 'Female', '123456789789', '34.txt', '34.jpg', '151718', '5000000000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(150) NOT NULL,
  `cid` varchar(150) NOT NULL,
  `sid` varchar(150) NOT NULL,
  `qnty` varchar(150) NOT NULL,
  `prc` varchar(150) NOT NULL,
  `tot` varchar(150) NOT NULL,
  `st` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `pid`, `cid`, `sid`, `qnty`, `prc`, `tot`, `st`) VALUES
(6, '5', 'sam@gmail.com', 'rs@gmail.com', '5', '57000', '285000', '1'),
(7, '6', 'sam@gmail.com', 'rs@gmail.com', '1', '15000', '15000', '1'),
(10, '6', 'sam@gmail.com', 'rs@gmail.com', '2', '15000', '30000', '2'),
(11, '6', 'sam@gmail.com', 'rs@gmail.com', '1', '15000', '15000', '0'),
(12, '7', 'sam@gmail.com', 'rs@gmail.com', '5', '80000', '400000', '0'),
(13, '12', 'sam@gmail.com', 'rs@gmail.com', '3', '75000', '225000', '1'),
(14, '11', 'sam@gmail.com', 'rs@gmail.com', '3', '80000', '240000', '0'),
(16, '12', 'sam@gmail.com', 'rs@gmail.com', '4', '75000', '300000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(150) NOT NULL,
  `qnt` varchar(150) NOT NULL,
  `uid` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pid`, `qnt`, `uid`, `st`) VALUES
(4, '8', '1', 'ma@gmail.com', 0),
(5, '6', '1', 'ma@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cash_deposit`
--

CREATE TABLE IF NOT EXISTS `cash_deposit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount_from` varchar(25) NOT NULL,
  `amount_to` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `cash_deposit`
--

INSERT INTO `cash_deposit` (`id`, `amount_from`, `amount_to`, `amount`, `date`, `status`) VALUES
(3, 'self', 8333, 8222, '2016-12-02', 1),
(6, 'self', 465465, 1000, '2016-12-02', 1),
(7, 'self', 8333, 5444, '2016-12-02', 1),
(8, 'self', 8333, 1000, '2016-12-02', 1),
(9, 'self', 8333, 1000, '2016-12-02', 1),
(10, 'self', 8333, 1000, '2016-12-02', 1),
(11, 'self', 8333, 10000, '2016-12-02', 1),
(12, 'self', 8333, 70000, '2016-12-03', 1),
(13, 'self', 9471, 400, '2016-12-03', 1),
(14, 'self', 9471, 1000, '2016-12-03', 1),
(15, 'self', 8333, 100, '2016-12-06', 1),
(16, 'self', 3688, 2000, '2016-12-16', 1),
(17, 'self', 3688, 1000, '2016-12-16', 1),
(18, 'self', 2109, 1000, '2016-12-16', 1),
(19, 'self', 2109, 15000, '2016-12-19', 1),
(20, 'self', 3392, 1000, '2016-12-21', 1),
(21, 'self', 5410, 1000, '2016-12-21', 1),
(22, 'self', 4843, 2000, '2016-12-29', 1),
(23, 'self', 9970, 500, '2016-12-30', 1),
(24, 'self', 2955, 4000, '2017-01-10', 1),
(25, 'self', 7874, 2000, '2017-03-01', 1),
(26, 'self', 639318, 2000, '2017-03-01', 1),
(27, 'self', 639318, 2000, '2017-03-02', 1),
(28, 'self', 639318, 4000, '2017-03-09', 1),
(29, 'self', 557608, 9000, '2017-03-14', 1),
(30, 'self', 945974, 9000, '2017-03-20', 1),
(31, 'self', 683483, 3000, '2017-05-15', 1),
(32, 'self', 919305, 40000, '2017-05-15', 1),
(33, 'self', 633605, 40000, '2017-05-17', 1),
(34, 'self', 127822, 50000, '2017-05-20', 1),
(35, 'self', 441180, 50000, '2017-05-29', 1),
(36, 'self', 322006, 4000, '2017-06-09', 1),
(37, 'self', 711389, 3000, '2017-06-24', 1),
(38, 'self', 809991, 5000, '2017-06-24', 1),
(39, 'self', 266387, 50000, '2017-06-24', 1),
(40, 'self', 209725, 20000, '2017-06-24', 1),
(41, 'self', 521957, 2000, '2017-07-17', 1),
(42, 'self', 494985, 9000, '2017-07-28', 1),
(43, 'self', 494985, 2000, '2017-10-06', 1),
(44, 'self', 494985, 100000, '2017-10-13', 1),
(45, 'self', 646762, 1000, '2017-10-14', 1),
(46, 'self', 856134, 2000, '2017-12-26', 1),
(47, 'self', 856134, 4000, '2018-01-10', 1),
(48, 'self', 856134, 1000, '2018-01-18', 1),
(49, 'self', 856134, 2000, '2018-02-11', 1),
(50, 'self', 646762, 2000, '2018-03-22', 1),
(51, 'self', 856134, 1000, '2018-03-26', 1),
(52, 'self', 266387, 2000, '2018-10-16', 1),
(53, 'self', 266387, 5000, '2019-03-15', 1),
(54, 'self', 151718, 50000, '2019-03-15', 1),
(55, 'self', 266387, 500000, '2019-10-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cate`
--

CREATE TABLE IF NOT EXISTS `cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cate`
--

INSERT INTO `cate` (`id`, `nme`, `st`) VALUES
(1, 'Laptop', 0),
(2, 'Mobile', 0),
(3, 'TV', 0),
(4, 'Tablet', 0),
(5, 'AC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comp`
--

CREATE TABLE IF NOT EXISTS `comp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `con` varchar(150) NOT NULL,
  `em` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `ac` varchar(150) NOT NULL,
  `ph` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comp`
--

INSERT INTO `comp` (`id`, `nme`, `con`, `em`, `pass`, `ac`, `ph`, `st`) VALUES
(1, 'Samsung', '7984651325', 'sam@gmail.com', '123', '266387', '1700653.docx', 1),
(2, 'Apple', '9784568555', 'ap@gmail.com', '123', '266387', '4224761.docx', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comt`
--

CREATE TABLE IF NOT EXISTS `comt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg` varchar(150) NOT NULL,
  `dt` varchar(150) NOT NULL,
  `uid` varchar(150) NOT NULL,
  `pid` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comt`
--

INSERT INTO `comt` (`id`, `msg`, `dt`, `uid`, `pid`, `st`) VALUES
(1, 'Good Phone', '2022-03-22', 'ma@gmail.com', '8', 0),
(2, 'very good', '2022-03-22', 'ma@gmail.com', '8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ext`
--

CREATE TABLE IF NOT EXISTS `ext` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ext` varchar(150) NOT NULL,
  `pid` varchar(150) NOT NULL,
  `uid` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ext`
--

INSERT INTO `ext` (`id`, `ext`, `pid`, `uid`, `st`) VALUES
(1, '2', '107', 'ma@gmail.com', 1),
(2, '2', '147', 'rk@gmail.com', 1),
(3, '2', '110', 'ma@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `cont` varchar(150) NOT NULL,
  `addr` varchar(150) NOT NULL,
  `des` varchar(150) NOT NULL,
  `ph` varchar(150) NOT NULL,
  `pid` varchar(150) NOT NULL,
  `cid` varchar(150) NOT NULL,
  `uid` varchar(150) NOT NULL,
  `typ` varchar(150) NOT NULL,
  `se_id` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  `typ1` varchar(150) NOT NULL,
  `wid` varchar(150) NOT NULL,
  `ser` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `nme`, `cont`, `addr`, `des`, `ph`, `pid`, `cid`, `uid`, `typ`, `se_id`, `st`, `typ1`, `wid`, `ser`) VALUES
(12, 'Ajay Kumar', '7894653125', 'Nalanchira Trivandrum', 'Touch not working', '9776977.docx', '8', 'sam@gmail.com', 'ma@gmail.com', '1', 'sam1@gmail.com', 1, 'Repair', 'S56781063114797', '1'),
(13, 'Rahul Krishna', '7842648962', 'Pullimood, Trivandrum', 'Screen is broken.', '8676971.pdf', '11', 'sam@gmail.com', 'rk@gmail.com', '1', '0', 0, '0', 'SMN19217424107', '0'),
(14, 'Manu', '1222223567', 'Neyyatinkara, Trivandrum', 'It turnsoff automatically.', '6991668.pdf', '12', 'sam@gmail.com', 'ma@gmail.com', '1', '0', 0, '0', 'UA58AU-579308648', '0');

-- --------------------------------------------------------

--
-- Table structure for table `new_st`
--

CREATE TABLE IF NOT EXISTS `new_st` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `cont` varchar(150) NOT NULL,
  `em` varchar(150) NOT NULL,
  `pid` varchar(150) NOT NULL,
  `sid` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `new_st`
--

INSERT INTO `new_st` (`id`, `nme`, `cont`, `em`, `pid`, `sid`, `st`) VALUES
(1, 'Vishnu Patel', '7894653214', 'ma@gmail.com', '6', 'sam1@gmail.com', 0),
(2, 'Robin', '7895643215', 'ma@gmail.com', '8', 'sam1@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pro`
--

CREATE TABLE IF NOT EXISTS `pro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate` varchar(150) NOT NULL,
  `nme` varchar(150) NOT NULL,
  `pid` varchar(150) NOT NULL,
  `des` text NOT NULL,
  `war` varchar(150) NOT NULL,
  `war_des` text NOT NULL,
  `sh_prc` varchar(150) NOT NULL,
  `sa_prc` varchar(150) NOT NULL,
  `qnty` varchar(150) NOT NULL,
  `ph` varchar(150) NOT NULL,
  `sid` varchar(150) NOT NULL,
  `st` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pro`
--

INSERT INTO `pro` (`id`, `cate`, `nme`, `pid`, `des`, `war`, `war_des`, `sh_prc`, `sa_prc`, `qnty`, `ph`, `sid`, `st`) VALUES
(5, '1', 'Galaxy Tab S7 | Tab S7+', 'TRE786', '<ul>\n	<li>108+12+12MP triple rear camera | 10MP front camera</li>\n	<li>17.45 centimeters (6.9-inch) WQHD+ dynamic Amoled display with 3088 x 1440 pixels resolution</li>\n	<li>Memory, Storage &amp; SIM: 12GB RAM | 256GB internal memory expandable up to 1TB | Dual SIM (nano+nano) dual-standby (4G+4G)</li>\n	<li>Android v10.0 operating system with Exynos 990 octa core processor</li>\n	<li>4500mAH lithium-ion battery (Non-removable)</li>\n	<li>1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase</li>\n	<li>Box also includes: Adaptor, Sim ejector pin, user manual, charging cable</li>\n</ul>\n', '1', 'Display and Battery Replace is included', '57000', '65000', '9', '4707611.jpg', 'sam@gmail.com', 'May 2020'),
(6, '3', 'Samsung 32 inches Wondertainment Series', 'STY2345', '<ul>\n	<li>Resolution: HD Ready (1366x768) | Refresh Rate: 60 hertz</li>\n	<li>Connectivity: 2 HDMI ports to connect set top box, Blu Ray players, gaming console | 1 USB ports to connect hard drives and other USB devices</li>\n	<li>Sound : 20 Watts Output | Dolby Digital Plus</li>\n	<li>Smart TV Features : Voice Assistants | SmartThings App | Personal Computer | Home Cloud | Live Cast | Screen Share | Music System</li>\n	<li>Display : LED Panel | Mega Contrast | PurColor | HD Picture Quality | Slim &amp; Stylish Design</li>\n	<li>Alexa Built-in: Voice control your TV and your day. Just ask Alexa to search for movies, play music, control smart home devices, get sports updates and more</li>\n	<li>1 Year Comprehesive and&nbsp;2 Year&nbsp;Additional Warranty on Panel. Offer validity is basis date of invoice from 10th Oct till 10th Nov</li>\n</ul>\n\n<ul>\n	<li>Installation: For requesting installation/wall mounting/demo of this product once delivered, please directly call Samsung support on [1800407267864 / 180057267864] and provide product&#39;s model name as well as seller&#39;s details mentioned on the invoice</li>\n	<li>Easy returns: This product is eligible for replacement within 10 days of delivery in case of any product defects, damage or features not matching the description provided</li>\n</ul>\n', '1', 'All Damage will be covered', '15000', '20000', '20', '2570770.jpg', 'sam@gmail.com', 'May 2020'),
(7, '2', 'Samsung Galaxy Z Flip', 'SAM4456', '<ul>\n	<li>108+12+12MP triple rear camera | 10MP front camera</li>\n	<li>17.45 centimeters (6.9-inch) WQHD+ dynamic Amoled display with 3088 x 1440 pixels resolution</li>\n	<li>Memory, Storage &amp; SIM: 12GB RAM | 256GB internal memory expandable up to 1TB | Dual SIM (nano+nano) dual-standby (4G+4G)</li>\n	<li>Android v10.0 operating system with Exynos 990 octa core processor</li>\n	<li>4500mAH lithium-ion battery (Non-removable)</li>\n	<li>1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase</li>\n	<li>Box also includes: Adaptor, Sim ejector pin, user manual, charging cable</li>\n</ul>\n', '2', 'All Damage will be covered', '80000', '99999', '31', '2256011.jpg', 'sam@gmail.com', 'May 2020'),
(8, '2', 'SAMSUNG Galaxy S10 Plus', 'S5678', '<ul>\r\n	<li>12 GB RAM | 1 TB ROM | Expandable Upto 512 GB</li>\r\n	<li>16.26 cm (6.4 inch) Quad HD+ Display</li>\r\n	<li>16MP + 12MP | 10MP + 8MP Dual Front Camera</li>\r\n	<li>4100 mAh Lithium-ion Battery</li>\r\n	<li>Exynos 9 9820 Processor</li>\r\n</ul>\r\n', '1', 'Water damage will take warranty', '130000', '110000', '8', '9439971.jpg', 'sam@gmail.com', 'May 2020'),
(10, '1', 'Samsung Galaxy Book Go', 'SRE789', '<ul>\r\n	<li>Keep your cool with a powerful Qualcomm Snapdragon 7c Gen 2 compute platform that delivers responsive, instant-on performance that runs without a fan &amp;mdash; for a lightweight device that&amp;rsquo;s fast and quiet</li>\r\n	<li>&nbsp;&nbsp; &nbsp;Email, hold virtual meetings, stream videos, check social media and more; Samsung Galaxy Book Go helps you stay connected and cordless with up to 18 hours on a fully charged battery*</li>\r\n	<li>&nbsp;&nbsp; &nbsp;Durably designed and shockproof with a convenient 180-degree hinge, this compact and light laptop computer spells sophistication in Silver</li>\r\n	<li>&nbsp;&nbsp; &nbsp;Easily jump from work to personal life with your paired Galaxy devices; Set it up as a second screen with your phone and tablet, share documents with Quick Share, play mobile games on a larger display, and connect your Galaxy Buds Pro earbuds</li>\r\n	<li>&nbsp;&nbsp; &nbsp;Make WFH work for you with tools that help you look, sound, and do your best, including its camera beauty filter, background noise removal, and more.<br />\r\n	&nbsp;</li>\r\n</ul>\r\n', '2', '<p>All damages will be covered.</p>\r\n', '21000', '25000', '10', '6336608.jpg', 'sam@gmail.com', '2022-01'),
(11, '2', 'Samsung Galaxy S22', 'SMN192', '<ul>\r\n	<li>Pro-grade Camera that lets you make your nights epic with Nightography: It&rsquo;s our brightest innovation yet. The sensor pulls in more light, the Super Clear Glass dials down lens flare, and fast-acting AI delivers near-instant intelligent processing.</li>\r\n	<li>VisionBooster outshines the sun: Stunning 120Hz Dynamic AMOLED 2X display is crafted specifically for high outdoor visibility, keeping the view clear in bright daylight</li>\r\n	<li>4nm processor, our fastest chip yet: Our fastest, most powerful chip ever. That means, a faster CPU and GPU compared to Galaxy S21 Ultra. It&rsquo;s an epic leap for smartphone technology.</li>\r\n	<li>Sleek design in a range of colors lets you express yourself how you like. The slim bezels flow into a symmetrical polished frame for an expansive, balanced display. Corning Gorilla Glass Victus+ on the screen and back panels.<br />\r\n	&nbsp;</li>\r\n</ul>\r\n', '1', '<p>All damages will be covered.</p>\r\n', '80000', '90000', '9', '2912445.jpg', 'sam@gmail.com', '2022-03'),
(12, '3', 'Samsung (58 inches) Crystal 4K Pro Series LED TV', 'UA58AU', '<ul>\r\n	<li>Resolution : Crystal 4K Pro UHD (3840 x 2160) resolution | Refresh Rate : 60 Hertz</li>\r\n	<li>Connectivity: 3 HDMI ports to connect set top box, Blu-ray speakers or a gaming console | 1 USB ports to connect hard drives or other USB devices</li>\r\n	<li>Display: Ultra HD (4k) LED Panel | One Billion Colors | Air Slim Design | Supports HDR 10+ | PurColor | Mega Contarst | UHD Dimming | Auto Game Mode</li>\r\n	<li>Sound: 20 Watts Output | Powerful Speakers with Dolby Digital Plus | Q Symphony</li>\r\n	<li>Smart TV Features : Prime Video, Hotstar, Netflix, Zee5 and more | Voice Assistant - Bixby &amp; Alexa | Tap View | PC Mode | Universal Guide | Web Browser | Screen Mirroring</li>\r\n</ul>\r\n', '2', '<p>All damages will be covered except water damage.</p>\r\n', '75000', '80000', '10', '9971710.jpg', 'sam@gmail.com', '2022-02');

-- --------------------------------------------------------

--
-- Table structure for table `pro1`
--

CREATE TABLE IF NOT EXISTS `pro1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` varchar(150) NOT NULL,
  `pro_id` varchar(150) NOT NULL,
  `cid` varchar(150) NOT NULL,
  `sid` varchar(150) NOT NULL,
  `uid` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  `dt` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

--
-- Dumping data for table `pro1`
--

INSERT INTO `pro1` (`id`, `pid`, `pro_id`, `cid`, `sid`, `uid`, `st`, `dt`) VALUES
(12, '5', 'TRE786762702580', 'sam@gmail.com', '0', 'rk@gmail.com', 2, '2022-05-09'),
(13, '5', 'TRE786408268348', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(14, '5', 'TRE786182158639', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(15, '5', 'TRE786-265731900', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(16, '5', 'TRE786251539274', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(17, '5', 'TRE786-536494273', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(18, '5', 'TRE7861039157723', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(19, '5', 'TRE7861212727908', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(20, '5', 'TRE7862243387', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(21, '5', 'TRE786-141558355', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(22, '5', 'TRE786245253507', 'sam@gmail.com', 'rs@gmail.com', 'ma@gmail.com', 2, '2021-10-28'),
(23, '5', 'TRE786-432245423', 'sam@gmail.com', 'rs@gmail.com', 'ma@gmail.com', 2, '2022-04-07'),
(24, '5', 'TRE786-653136759', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(25, '5', 'TRE786682232904', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(26, '5', 'TRE786-438590489', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(27, '5', 'TRE786203684426', 'sam@gmail.com', 'rs@gmail.com', 'ma@gmail.com', 2, '2021-07-14'),
(28, '5', 'TRE786532145395', 'sam@gmail.com', 'rs@gmail.com', 'ma@gmail.com', 2, '2021-07-14'),
(29, '5', 'TRE78652470223', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(30, '5', 'TRE786-222976826', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(31, '5', 'TRE786-219240945', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(32, '6', 'STY2345407141654', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2021-03-22'),
(33, '6', 'STY2345879107867', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2021-03-22'),
(34, '6', 'STY2345-110781817', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2021-10-28'),
(35, '6', 'STY2345229776288', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2022-04-12'),
(36, '6', 'STY2345-267214393', 'sam@gmail.com', 'rs@gmail.com', 'ma@gmail.com', 2, '2022-03-22'),
(37, '6', 'STY2345-365473975', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(38, '6', 'STY23451099169007', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(39, '6', 'STY2345-625799603', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(40, '6', 'STY2345-376088619', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(41, '6', 'STY2345-209634396', 'sam@gmail.com', 'sam1@gmail.com', 'ma@gmail.com', 2, '0000-00-00'),
(102, '7', 'SAM4456-334223039', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2021-07-12'),
(103, '7', 'SAM4456892509596', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2022-04-12'),
(104, '7', 'SAM4456803500765', 'sam@gmail.com', 'rs@gmail.com', 'ma@gmail.com', 2, '2021-01-19'),
(105, '7', 'SAM4456-488342927', 'sam@gmail.com', 'rs@gmail.com', 'ma@gmail.com', 2, '2002-12-10'),
(106, '7', 'SAM445693920704', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(107, '8', 'S56781063114797', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2022-03-22'),
(108, '8', 'S5678302121907', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2022-04-07'),
(109, '8', 'S5678696049731', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2022-04-07'),
(110, '8', 'S56781037082234', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2022-04-12'),
(111, '8', 'S5678348909361', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2022-04-12'),
(112, '8', 'S5678-428213044', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2022-04-12'),
(113, '8', 'S5678636512845', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(114, '8', 'S5678741295393', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(115, '8', 'S567848378544', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(117, '9', 'SGS20769166246', 'ma@gmail.com', '0', '0', 0, '0000-00-00'),
(118, '9', 'SGS20-10565345', 'ma@gmail.com', '0', '0', 0, '0000-00-00'),
(119, '9', 'SGS201134096523', 'ma@gmail.com', '0', '0', 0, '0000-00-00'),
(120, '9', 'SGS201086360274', 'ma@gmail.com', '0', '0', 0, '0000-00-00'),
(121, '9', 'SGS20649855275', 'ma@gmail.com', '0', '0', 0, '0000-00-00'),
(122, '9', 'SGS20465018149', 'ma@gmail.com', '0', '0', 0, '0000-00-00'),
(123, '9', 'SGS20872466302', 'ma@gmail.com', '0', '0', 0, '0000-00-00'),
(124, '9', 'SGS20622636718', 'ma@gmail.com', '0', '0', 0, '0000-00-00'),
(125, '9', 'SGS2018195003', 'ma@gmail.com', '0', '0', 0, '0000-00-00'),
(126, '9', 'SGS20-497771578', 'ma@gmail.com', '0', '0', 0, '0000-00-00'),
(127, '10', 'SRE789894644385', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(128, '10', 'SRE789914746979', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(129, '10', 'SRE789343038692', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(130, '10', 'SRE789237425948', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(131, '10', 'SRE789-192437487', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(132, '10', 'SRE789832439012', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(133, '10', 'SRE789-491663710', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(134, '10', 'SRE789-510936108', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(135, '10', 'SRE7891183552462', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(136, '10', 'SRE7891072721346', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(137, '11', 'SMN19217424107', 'sam@gmail.com', '0', 'rk@gmail.com', 2, '2022-05-09'),
(138, '11', 'SMN192-429992035', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(139, '11', 'SMN192-103903053', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(140, '11', 'SMN192372332737', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(141, '11', 'SMN192-395064519', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(142, '11', 'SMN192-334875336', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(143, '11', 'SMN192-544855529', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(144, '11', 'SMN192279588026', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(145, '11', 'SMN1921033109155', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(146, '11', 'SMN192249819583', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(147, '12', 'UA58AU694033542', 'sam@gmail.com', '0', 'rk@gmail.com', 2, '2022-05-09'),
(148, '12', 'UA58AU-579308648', 'sam@gmail.com', '0', 'ma@gmail.com', 2, '2022-05-09'),
(149, '12', 'UA58AU319378116', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(150, '12', 'UA58AU-671697561', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(151, '12', 'UA58AU1118382106', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(152, '12', 'UA58AU375416321', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(153, '12', 'UA58AU-666182690', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(154, '12', 'UA58AU1081912798', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(155, '12', 'UA58AU741947689', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(156, '12', 'UA58AU-457388490', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(157, '12', 'UA58AU-236141356', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(158, '12', 'UA58AU-257548543', 'sam@gmail.com', '0', '0', 0, '0000-00-00'),
(159, '12', 'UA58AU-617438347', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(160, '12', 'UA58AU383481078', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00'),
(161, '12', 'UA58AU-30015643', 'sam@gmail.com', 'rs@gmail.com', '0', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pro3`
--

CREATE TABLE IF NOT EXISTS `pro3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` varchar(150) NOT NULL,
  `pid` varchar(150) NOT NULL,
  `qnty` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pro3`
--

INSERT INTO `pro3` (`id`, `sid`, `pid`, `qnty`, `st`) VALUES
(4, 'rs@gmail.com', '7', '2', 0),
(5, 'rs@gmail.com', '6', '4', 0),
(6, 'rs@gmail.com', '5', '6', 0),
(7, 'rs@gmail.com', '12', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `cont` varchar(150) NOT NULL,
  `em` varchar(150) NOT NULL,
  `pid` varchar(150) NOT NULL,
  `prc` varchar(150) NOT NULL,
  `qnty` varchar(150) NOT NULL,
  `tot` varchar(150) NOT NULL,
  `dt` date NOT NULL,
  `sid` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `nme`, `cont`, `em`, `pid`, `prc`, `qnty`, `tot`, `dt`, `sid`, `st`) VALUES
(8, 'VIshnu Patel', '7895643214', 'patel@gmail.com', '7', '99999', '1', '99999', '2020-12-30', 'rs@gmail.com', 0),
(11, 'Manu Krishna', '7984565467', 'ma@gmail.com', '7', '99999', '1', '99999', '2021-01-19', 'rs@gmail.com', 0),
(12, 'Vishnu Patel', '8794561325', 'ma@gmail.com', '5', '65000', '2', '130000', '2021-07-14', 'rs@gmail.com', 0),
(13, 'Manu Krishna', '7896451325', 'ma@gmail.com', '5', '65000', '1', '65000', '2021-10-28', 'rs@gmail.com', 0),
(14, 'Manu Krishna', '7896452315', 'ma@gmail.com', '6', '20000', '1', '20000', '2022-03-22', 'rs@gmail.com', 0),
(15, 'Manu Krishna', '7985462135', 'ma@gmail.com', '5', '65000', '1', '65000', '2022-04-07', 'rs@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale1`
--

CREATE TABLE IF NOT EXISTS `sale1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `cont` varchar(150) NOT NULL,
  `em` varchar(150) NOT NULL,
  `pid` varchar(150) NOT NULL,
  `prc` varchar(150) NOT NULL,
  `qnty` varchar(150) NOT NULL,
  `tot` varchar(150) NOT NULL,
  `dt` date NOT NULL,
  `cid` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  `addr` text NOT NULL,
  `uid` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sale1`
--

INSERT INTO `sale1` (`id`, `nme`, `cont`, `em`, `pid`, `prc`, `qnty`, `tot`, `dt`, `cid`, `st`, `addr`, `uid`) VALUES
(1, 'Raj Kumar', '7896543125', 'rak@gmail.com', '6', '20000', '2', '40000', '2021-03-22', 'sam@gmail.com', 0, 'Nalanchira TVM', 'ma@gmail.com'),
(2, 'Vishnu Patel', '7894651325', 'ma@gmail.com', '7', '99999', '1', '99999', '2021-07-12', 'sam@gmail.com', 0, 'Nalanchira', 'ma@gmail.com'),
(9, 'Rahul Krishna', '7842648962', 'rk@gmail.com', '5', '65000', '1', '65000', '2022-05-09', 'sam@gmail.com', 0, 'Trivandrum', 'rk@gmail.com'),
(10, 'Manu', '1222223567', 'ma@gmail.com', '7', '99999', '1', '99999', '2022-05-09', 'sam@gmail.com', 0, 'Trivandrum', 'ma@gmail.com'),
(11, 'Rahul Krishna', '7842648962', 'rk@gmail.com', '12', '80000', '1', '80000', '2022-05-09', 'sam@gmail.com', 0, 'Trivandrum', 'rk@gmail.com'),
(12, 'Rahul Krishna', '7842648962', 'rk@gmail.com', '11', '90000', '1', '90000', '2022-05-09', 'sam@gmail.com', 0, 'Pullimood, Trivandrum', 'rk@gmail.com'),
(13, 'Manu', '1222223567', 'ma@gmail.com', '12', '80000', '1', '80000', '2022-05-09', 'sam@gmail.com', 0, 'Neyyatinkara, Trivandrum', 'ma@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ser`
--

CREATE TABLE IF NOT EXISTS `ser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `man` varchar(150) NOT NULL,
  `cont` varchar(150) NOT NULL,
  `addr` text NOT NULL,
  `la` float NOT NULL,
  `lo` float NOT NULL,
  `em` varchar(150) NOT NULL,
  `pas` varchar(150) NOT NULL,
  `ph` varchar(150) NOT NULL,
  `cid` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ser`
--

INSERT INTO `ser` (`id`, `nme`, `man`, `cont`, `addr`, `la`, `lo`, `em`, `pas`, `ph`, `cid`, `st`) VALUES
(1, 'Samsung Service Center Pulimoode', 'Hari kumar', '7894561324', 'Pulimoodu, Thiruvananthapuram, Kerala, India', 8.49633, 76.9461, 'sam1@gmail.com', '123', '3059387.jpg', 'sam@gmail.com', 0),
(2, 'Samsung Service Center, Killipalam', 'Ashok Kumar', '8759616546', 'PNRA 40, Killipalam, Karamana, Thiruvananthapuram, Kerala, India', 8.48069, 76.9627, 'sam2@gmail.com', '123', '5655456.jpg', 'sam@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `man` varchar(150) NOT NULL,
  `cont` varchar(150) NOT NULL,
  `addr` text NOT NULL,
  `la` float NOT NULL,
  `lo` float NOT NULL,
  `em` varchar(150) NOT NULL,
  `pas` varchar(150) NOT NULL,
  `ph` varchar(150) NOT NULL,
  `acc` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `nme`, `man`, `cont`, `addr`, `la`, `lo`, `em`, `pas`, `ph`, `acc`, `st`) VALUES
(1, 'RS Mobile Shop', 'Ravi kumar', '7896543124', 'Pulimoodu, Thiruvananthapuram, Kerala, India', 8.49022, 76.9492, 'rs@gmail.com', '123', '5828491.jpg', '494985', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_data`
--

CREATE TABLE IF NOT EXISTS `staff_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `cont` varchar(150) NOT NULL,
  `em` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `se_id` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `staff_data`
--

INSERT INTO `staff_data` (`id`, `nme`, `cont`, `em`, `pass`, `se_id`, `st`) VALUES
(1, 'Aneesh Kumar', '8796543125', 'ank@gmail.com', '123', 'sam1@gmail.com', 1),
(2, 'Abin', '8492198615', 'abin@gmail.com', '123', 'sam2@gmail.com', 2),
(3, 'Arum', '8465979164', 'arun@gmail.com', '123', 'sam2@gmail.com', 1),
(4, 'Varun', '9841547254', 'varun@gmail.com', '123', 'sam1@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nme` varchar(150) NOT NULL,
  `cont` varchar(150) NOT NULL,
  `em` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `nme`, `cont`, `em`, `pass`, `st`) VALUES
(1, 'Manu Krishna', '7895643214', 'ma@gmail.com', '123', 0),
(2, 'Rahul Krishna', '7842648962', 'rk@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `utyp` varchar(15) NOT NULL,
  `st` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `uid`, `pwd`, `utyp`, `st`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin', 1),
(2, 'sam@gmail.com', '123', 'comp', 1),
(3, 'sam1@gmail.com', '123', 'ser', 1),
(5, 'rs@gmail.com', '123', 'shop', 1),
(6, 'ma@gmail.com', '123', 'user', 1),
(7, 'ank@gmail.com', '123', 'staff', 1),
(8, 'ap@gmail.com', '123', 'comp', 0),
(9, 'rk@gmail.com', '123', 'user', 1),
(10, 'sam2@gmail.com', '123', 'ser', 1),
(11, 'abin@gmail.com', '123', 'staff', 2),
(12, 'arun@gmail.com', '123', 'staff', 1),
(13, 'varun@gmail.com', '123', 'staff', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
