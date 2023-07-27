-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2014 at 02:49 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `news_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `title`, `heading`, `status`) VALUES
(9, '1414459870-news1.jpg', 'new1', 'narendramodi', 'Yes'),
(14, '1414516359-news1.jpg', 'news1', 'news1', 'Yes'),
(15, '1414516399-news2.jpg', 'news2', 'news2', 'Yes'),
(16, '1414516456-news3.jpg', 'news3', 'news3', 'Yes'),
(17, '1414516595-news4.jpg', 'news4', 'news4', 'Yes'),
(18, '1414632808-1555396_1050485068307180_2294610285971307131_n.jpg', 'asd', 'sda', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'shailesh', '12345'),
(3, 'dharmendra', '12345'),
(4, 'vivek', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `name` varchar(20) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`name`, `mobile_no`, `email`, `message`) VALUES
('shailesh', '7698861788', 'sk.limbadiyashailesh.1010@gmail.com', 'hello hi...');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `subtype` varchar(255) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `details` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `type`, `subtype`, `headline`, `date`, `image`, `details`, `status`) VALUES
(5, 'Sports', 'cricket', 'Mumbai To Host Deheradun Trophy', '', '1414517122-cricket.JPG', 'Mumbai: Mumbai would play host to the Deodhar Trophy inter-zonal One-Day domestic tournament from November 29 to December 3, as per the calendar chalked out by the BCCI. South Zone would take on Central Zone in the first game on November 29 with the winne', 'Yes'),
(6, 'Sports', 'football', 'Atlantico de Kolkata Vs Kerala Blaster FC', '', '1414517431-football.JPG', 'Kerala Blasters FC''s Iain Hume attacks against Atletico de Kolkata during their Indian Super League match at the Salt Lake Stadium in Kolkata. (TOI Photo', 'Yes'),
(7, 'Sports', 'hockey', 'HI appoints Kaushik as Central Zone''s High Performance Manager', '', '1414517635-hockey.JPG', 'NEW DELHI: Hockey India on Monday appointed former India coach MK Kaushik as the High Performance Manager for the Central Zone.\r\n\r\n"Mr. Kaushik, who was the coach of the Indian Men Hockey team that won Gold medal at the recently concluded 17th Asian Games', 'Yes'),
(8, 'Bussiness', 'market', 'JSPL top loser on Nifty; stock slips nearly 15% in October', '', '1414518021-market.JPG', 'The probe is for alleged irregularities in granting clearance to JSPL for diversion of Saranda forest land in Jharkhand for mining purposes.', 'Yes'),
(9, 'Bussiness', 'personal finnance', 'Investors can save on tax with ELSS, create wealth by using market volatility: Experts', '', '1414518218-personal_finnance.JPG', 'MUMBAI: Come December, the finance department of your company may start pushing you to submit proof for tax-saving investments. But, you need not wait till the last day to invest in a tax-saving instrument. With markets off their highs and many on Dalal S', 'Yes'),
(10, 'Bussiness', 'real_Estate', 'HSBC buys duplex for Rs 60 crore in South Mumbai locality', '', '1414518394-real_Estate.JPG', 'MUMBAI: HSBC has bought a luxury duplex apartment overlooking the Arabian Sea in south Mumbai''s Mahalaxmi locality for around Rs 60 crore, said two persons familiar with the development, making it one of the most expensive such purchases in the country. W', 'Yes'),
(11, 'Politics', 'political', 'Winter session of Parliament to begin on 24 November, end on December 23', '', '1414518895-political.JPG', '\r\n\r\nA meeting of Cabinet Committee on Parliamentary Affairs on Monday recommended that the winter session of Parliament to begin on November 24 and will be concluded on December 23.\r\n\r\nThe winter session will have 22 sittings. There are 67 bills pending b', 'Yes'),
(12, 'Politics', 'political', 'On either path he takes, Uddhav can gain some, lose some ', '', '1414519045-political1.JPG', 'The Shiv Sena is at possibly the most uncertain stage of its 48-year history as it debates whether it should join the BJP-led government. Party insiders say the top leadership and the circle around Uddhav Thackeray are keen to join, but many among the ran', 'Yes'),
(14, 'Politics', 'political', ' Modi-Shah think beyond caste-region in making state picks', '', '1414519213-political2.JPG', 'Choice of Khattar, Fadnavis suggests new premium on hard work and organisational ability.', 'Yes'),
(16, 'Entertainment', 'picture', 'Rajnikanth up Comming Movie', '', '1414519713-rajni.JPG', 'Lingaa is an upcoming Tamil action thriller film being directed by K. S. Ravikumar, who also scripted the film in collaboration with the film''s dialgoue writer, Pon Kumaran. The film stars Rajinikanth plays dual role, Jagapati Babu, Anushka Shetty and Sonakshi Sinha in the lead roles.', 'Yes'),
(17, 'Entertainment', 'Entertainment', 'Are Sidharth and Alia more than just good friends?', '', '1414519953-sidharth_alia.JPG', 'Their close circle of friends are in on a secret. But no one is willing to talk. One hears that there''s more than just friendship brewing between Alia Bhatt and Sidharth Malhotra. Apparently, the Student Of The Year co-actors hang around a lot together and are even joined by filmmaker Ayan Mukerji sometimes. Ayan, who is making his next film with Alia, is her new best friend and Sidharth, her SOTY co-star, is someone whom she has grown close to in recent months.', 'Yes'),
(19, 'Entertainment', 'boollywood', 'Amitabh Bachchan looking forward to shooting Piku in Kolkata', '', '1414520435-big-b.JPG', 'Megastar Amitabh Bachchan is excited to visit Kolkata for the second shooting schedule of director ... Always," Bachchan posted on his.', 'Yes'),
(20, 'Technology', 'It-Technology', 'TCS sees digital services as over $5 bn opportunity', '', '1414520647-tata.JPG', ' NEW DELHI: Country''s largest IT services firm Tata Consultancy Services (TCS) expects digital platforms like cloud, Big Data and mobility solutions to bring in cumulative revenues of over $5 billion in next few years.\r\n\r\nEarlier, the Mumbai-based firm had said that it expects to do $5 billion cumulative business over the next three to four years from the "digital opportunity".\r\n\r\n"The way to look at it is that, when I originally said it, I said that over the next three to four years we will do ', 'Yes'),
(21, 'Technology', 'It-Technology', 'IBM struggles to reinvent itself in an age of cloud', '', '1414520758-ibm.JPG', 'WASHINGTON: When IBM Corp CEO Ginni Rometty was asked recently for her tips on how to transform companies, she spoke of "relentless reinvention" and not protecting the past.\r\n\r\nApplying those precepts to IBM is proving particularly tricky as many of the company''s old-line businesses have already been shut down or sold, while the units that are supposed to push future growth, such as cloud and security, face stiff competition.\r\n\r\nEarlier on Monday, IBM reported a marked slowdown in business in Se', 'Yes'),
(22, 'Technology', 'It-Technology', 'Google cuts Cloud Compute Engine prices by 10%', '', '1414520883-goo.JPG', 'Google has cut cloud compute prices by 10% effective immediately, the company said. The move represents an opportunity for Google to edge itself into the cloud leadership position ahead of competitors Amazon and Microsoft.\r\n\r\nThe announcement applies to all Google Compute Engine instances across all regions.\r\n\r\nEarlier this year, Google dropped its cloud storage prices 68%. The same week, Amazon and Microsoft cut storage prices 10 to 68% and up to 20%, respectively.', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `sort` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `shortde` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `advertisements` text NOT NULL,
  `valuable` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `place`, `url`, `sort`, `title`, `shortde`, `detail`, `image`, `advertisements`, `valuable`) VALUES
(5, 'About Us', '--Select--', '', '', '', '                                                                                                                                ', '<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px"><strong>About Us :-</strong></span></p>\r\n\r\n<ul>\r\n	<li>The News Publishing portal provides an easy way to professionally publish an online news publication, corporate press releases, or manage other content without technical expertise. It is most often used as an online newspaper.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Our News Publishing system provides flexible, easy-to-use content management focused on minimizing. It combines content creation, graphics, and publication controls.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Design a website with wide range of custom modules like top stories section, breaking news section, advance search option, photo gallery, video uploading services etc.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Authorized contributing writers can submit stories for editorial review and publication.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Unlimited category tree system for adding news stories and special features. Unlimited number of dynamic news sections.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Publishes a photo gallery with a story.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Features and Importance :- </strong></p>\r\n\r\n<ul>\r\n	<li>To design a website that has multimedia features to display the current affairs and information about the hot topics. The site should contain features that would help people to surf through important news and also news related to their interests.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>website design with unlimited number of feature categories like top stories section, breaking news section, advance search option, photo gallery, video uploads etc.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;Old news are autometicaly removed from the site automatically.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Interactive website design offering extensive usability and functionality.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>It contain other more features like :-</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Top Stories Section-</strong>\r\n\r\n	<ul>\r\n		<li>&nbsp;Features the hottest news articles in this module.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Breaking News-</strong>\r\n\r\n	<ul>\r\n		<li>This column on the website features the breaking news section revealing the top most news to the site visitors.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Advertisement-</strong>\r\n\r\n	<ul>\r\n		<li>Advertisement module can be controlled from admin section and display flash and static images, adding onto the revenue of the client.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Photo Gallery-</strong>\r\n\r\n	<ul>\r\n		<li>Photo gallery can be managed by admin section and can be categorize into different sections like on sport section photo gallery related to sport will be displayed and so on.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li><strong>Video-</strong>\r\n\r\n	<ul>\r\n		<li>Video can be uploaded in news stories, interviews, photo gallery &amp; advertisement. For example, in Food &amp; Drinks section, video related to f&amp;b will be displayed. Video can be embedded from You Tube or uploaded as flv.</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n', '1413433267-', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `todayimage`
--

CREATE TABLE IF NOT EXISTS `todayimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `sortdesc` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `todayimage`
--

INSERT INTO `todayimage` (`id`, `image`, `title`, `sortdesc`, `status`) VALUES
(3, '1414461452-uploaded_image (1).jpg', 'football', 'olampica', 'Yes'),
(4, '1414461482-uploaded_image (2).jpg', 'football', 'football', 'Yes'),
(5, '1414461519-uploaded_image (3).jpg', 'football', 'football', 'Yes'),
(6, '1414461549-uploaded_image (7).jpg', 'football', 'football', 'Yes'),
(7, '1414461606-uploaded_image (6).jpg', 'football', 'football', 'Yes'),
(8, '1414612806-1545737_708845409171181_8826676121821442742_n.png', 'INDIA', 'Small Information About India', 'Yes'),
(9, '1414632742-10689812_1050276031661417_7972945978086714012_n.jpg', 'sfas', 'afs', 'Yes'),
(10, '1414633058-ent.jpg', 'afas', 'weeweqwe', 'Yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
