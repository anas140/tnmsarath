-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 12:55 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dr_moinu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(11) NOT NULL,
  `about_success_valley` text NOT NULL,
  `about_postedby` varchar(50) NOT NULL,
  `about_postedon` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `about_status` tinyint(4) NOT NULL,
  `about_delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `about_success_valley`, `about_postedby`, `about_postedon`, `about_status`, `about_delete_status`) VALUES
(1, '<p>about success valley</p>\r\n', 'admin', '0000-00-00 00:00:00', 0, 0),
(2, '', '', '2018-03-15 11:14:12', 0, 1),
(3, '', '', '2018-03-15 11:15:46', 0, 1),
(4, '', '', '2018-03-15 11:17:11', 0, 1),
(5, '', '', '2018-04-04 11:01:59', 0, 1),
(6, '', '', '2018-04-04 11:05:22', 0, 1),
(7, '', '', '2018-04-04 11:11:05', 0, 1),
(8, '', '', '2018-04-04 11:25:55', 0, 0),
(9, '', '', '2018-04-04 11:25:58', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'successvalley', 'successvalley@tnm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_description` text NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_status` tinyint(4) NOT NULL,
  `blog_delete_status` tinyint(4) NOT NULL DEFAULT '0',
  `blog_postedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `blog_postedby` varchar(50) NOT NULL,
  `blog_modifiedon` date NOT NULL,
  `blog_modifiedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `blog_title`, `blog_description`, `blog_image`, `blog_status`, `blog_delete_status`, `blog_postedon`, `blog_postedby`, `blog_modifiedon`, `blog_modifiedby`) VALUES
(2, 'sharafu', '<p>huwuihff</p>\r\n', 'direc1521104460.jpg', 0, 0, '2018-03-15 09:01:00', 'sarathvv', '0000-00-00', ''),
(3, 'new blog', '', 'movers.jpg', 0, 0, '2018-03-15 09:16:35', 'sarath', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` bigint(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_postedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_postedby` varchar(50) DEFAULT NULL,
  `category_modifiedon` date DEFAULT NULL,
  `category_modifiedby` varchar(50) DEFAULT NULL,
  `category_status` tinyint(4) NOT NULL,
  `category_delete_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-ON,1-OFF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_postedon`, `category_postedby`, `category_modifiedon`, `category_modifiedby`, `category_status`, `category_delete_status`) VALUES
(1, 'cat 1', '2018-03-15 09:46:00', 'admin', NULL, NULL, 0, 0),
(2, 'cat2', '2018-03-17 05:11:11', 'admin', NULL, NULL, 1, 0),
(3, 'latest category', '2018-03-17 04:45:02', NULL, NULL, NULL, 0, 0),
(4, 'uhuehghguhiu', '2018-03-17 06:30:55', NULL, NULL, NULL, 0, 0),
(5, 'testcatsarath', '2018-03-17 07:00:54', NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chapters`
--

CREATE TABLE `tbl_chapters` (
  `chapter_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `chapter_language_id` int(11) NOT NULL,
  `content` varchar(150) NOT NULL,
  `content_type` tinytext NOT NULL COMMENT '0=pdf, 1= url',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chapters`
--

INSERT INTO `tbl_chapters` (`chapter_id`, `module_id`, `course_id`, `chapter_language_id`, `content`, `content_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'first module first chapter url', '1', '2018-04-11 05:13:15', '2018-04-11 05:13:15'),
(3, 1, 1, 1, 'download1523425696.jpg', '0', '2018-04-11 05:48:16', '2018-04-11 05:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_image` varchar(200) NOT NULL,
  `course_duration` varchar(200) NOT NULL,
  `course_language` varchar(200) NOT NULL,
  `course_top_status` varchar(50) NOT NULL,
  `course_rate` float NOT NULL,
  `course_renewal_rate` float NOT NULL,
  `course_description` text NOT NULL,
  `course_postedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `course_status` tinyint(4) NOT NULL,
  `course_delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `course_image`, `course_duration`, `course_language`, `course_top_status`, `course_rate`, `course_renewal_rate`, `course_description`, `course_postedon`, `course_status`, `course_delete_status`) VALUES
(1, 'spoken english', '15129761665.jpg', '', '1,2', '1', 200, 200, '<p>riioohi</p>\r\n', '2018-03-21 06:34:46', 0, 0),
(2, 'spoken hindi', 'images_(1).jpg', '1yr', '1,4', '0', 205, 185, '<p>fuufhhiuohguhuhuhueguhughiug</p>\r\n', '2018-03-21 06:38:39', 1, 1),
(3, 'test course', 'water.jpg', '2yr', '1,4,2', '1', 300, 250, '<p>wqiofioioqio</p>\r\n', '2018-03-21 09:23:41', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `enquiry_id` int(11) NOT NULL,
  `enquiry_name` varchar(200) NOT NULL,
  `enquiry_mobile` int(15) NOT NULL,
  `enquiry_email` varchar(255) NOT NULL,
  `enquiry_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `enquiry_status` tinyint(4) NOT NULL,
  `enquiry_delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`enquiry_id`, `enquiry_name`, `enquiry_mobile`, `enquiry_email`, `enquiry_added_date`, `enquiry_status`, `enquiry_delete_status`) VALUES
(2, 'sarath', 123, 'sa@gmail.com', '2018-03-08 10:35:28', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL,
  `event_category` varchar(100) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_start_time` varchar(15) NOT NULL,
  `event_end_date` date NOT NULL,
  `event_end_time` varchar(15) NOT NULL,
  `event_location` text NOT NULL,
  `event_location_lat` varchar(50) NOT NULL,
  `event_location_lng` varchar(50) NOT NULL,
  `event_contact_person` varchar(100) NOT NULL,
  `event_contact_phone` bigint(20) NOT NULL,
  `event_contact_email` varchar(100) NOT NULL,
  `event_description` text NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `event_postedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_postedby` varchar(50) NOT NULL,
  `event_status` tinyint(4) NOT NULL,
  `event_delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`event_id`, `event_category`, `event_name`, `event_start_date`, `event_start_time`, `event_end_date`, `event_end_time`, `event_location`, `event_location_lat`, `event_location_lng`, `event_contact_person`, `event_contact_phone`, `event_contact_email`, `event_description`, `event_image`, `featured_image`, `event_postedon`, `event_postedby`, `event_status`, `event_delete_status`) VALUES
(7, '', 'new event', '2018-03-04', '02:15 PM', '2018-03-07', '04:00 PM', 'tnm\r\nsouth bazar\r\nkanur', '0', '0', 'sarath', 147852, 'kel@gmail.com', '<p>new description da ..........</p>\r\n', 'direc1520322447.jpg', '', '2018-03-07 04:57:56', 'admin', 0, 0),
(8, '1', 'testeventuu', '2018-03-07', '02:15 PM', '2018-03-10', '02:15 PM', 'hotel royal omars kannur', '11.8683957', '75.36979689999998', 'sachin', 1111111111111, 'kel@gmail.comf', '<p>amazing event conducted by pgss teamds</p>\r\n', 'direc1520406940.jpg', 'a:2:{i:0;s:18:\"SUS_1523522556.jpg\";i:1;s:18:\"SUS_1523522585.jpg\";}', '2018-03-07 07:15:40', 'admin', 1, 0),
(9, '3', 'lsevent', '2018-03-27', '10:21 AM', '2018-03-30', '10:21 AM', 'thalap kannur', '11.878912441047069', '75.3686618846557', 'sarath', 147852, 'raj@gmail.com', '<p>test event description</p>\r\n', 'direc1522127435.jpg', '', '2018-03-27 05:10:35', 'admin', 0, 0),
(10, '1', 'cat event', '2018-03-29', '11:12 AM', '2018-03-31', '11:12 AM', 'kannur thalap', '11.8793744', '75.36870479999993', 'sharafu', 147852, 'raizeiv@gmail.com', '<p>hai new des</p>\r\n', 'direc1522302212.jpg', 'a:3:{i:0;s:18:\"SUS_1522307855.jpg\";i:1;s:18:\"SUS_1522308762.jpg\";i:2;s:18:\"SUS_1522308803.jpg\";}', '2018-03-29 05:43:32', 'admin', 0, 0),
(17, '2', 'sh', '1970-01-01', '12:27 PM', '1970-01-01', '12:27 PM', 'kannur', '11.8744775', '75.37036620000003', '', 0, '', '', 'direc1522307431.jpg', 'a:2:{i:0;s:18:\"SUS_1522307479.jpg\";i:1;s:18:\"SUS_1522308991.jpg\";}', '2018-03-29 06:58:02', 'admin', 0, 0),
(18, '3', 'sss', '1970-01-01', '01:12 PM', '1970-01-01', '01:12 PM', 'kannur', '11.8744775', '75.37036620000003', '', 0, '', '', 'direc1522311786.png', 'a:3:{i:0;s:18:\"SUS_1522311786.jpg\";i:1;s:18:\"SUS_1522311786.gif\";i:2;s:18:\"SUS_1522311862.jpg\";}', '2018-03-29 07:42:54', 'admin', 0, 0),
(19, '1', 'nw', '2018-03-30', '10:07 AM', '2018-03-31', '10:07 AM', 'kannur thalap', '11.8793744', '75.36870479999993', 'checkmno', 9874566666, 'keltronsarutty3@gmail.com', '<p>desc test</p>\r\n', 'direc1522384798.jpg', 'a:1:{i:0;s:18:\"SUS_1522384799.jpg\";}', '2018-03-30 04:39:59', 'admin', 0, 0),
(20, '4', 'shr', '1970-01-01', '10:14 AM', '1970-01-01', '10:14 AM', 'kannur', '11.8744775', '75.37036620000003', '', 0, '', '', '', '', '2018-03-30 04:45:21', 'admin', 0, 0),
(21, '5', 'fgt', '1970-01-01', '10:18 AM', '1970-01-01', '10:18 AM', 'kannur', '11.8744775', '75.37036620000003', 'ansu', 0, '', '', 'direc1523514296.jpg', 'a:1:{i:1;s:18:\"SUS_1522914474.jpg\";}', '2018-03-30 04:49:08', 'admin', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(100) NOT NULL,
  `faq_description` text NOT NULL,
  `faq_addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `faq_status` tinyint(4) NOT NULL,
  `faq_delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_title`, `faq_description`, `faq_addedon`, `faq_status`, `faq_delete_status`) VALUES
(2, 'faq1', '<p>yfgygfggfgogf fg</p>\r\n', '2018-03-08 07:21:59', 0, 0),
(3, 'new', '<p>????????&nbsp;</p>\r\n', '2018-03-09 04:48:39', 0, 1),
(4, 'qwe', '<p>r3wr</p>\r\n', '2018-03-16 09:58:56', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instructor_profile`
--

CREATE TABLE `tbl_instructor_profile` (
  `profile_id` int(11) NOT NULL,
  `profile_title` varchar(200) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `profile_description` text NOT NULL,
  `profile_addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_status` tinyint(4) NOT NULL,
  `profile_delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_instructor_profile`
--

INSERT INTO `tbl_instructor_profile` (`profile_id`, `profile_title`, `profile_image`, `profile_description`, `profile_addedon`, `profile_status`, `profile_delete_status`) VALUES
(1, 'Engineer to Spiritual Teachers', 'sa.jpg', '<p>A decade ago, Jeffrey was living what we in the west would call a &lsquo;successful&rsquo; life as a software engineer with a great job, six-figure salary, big house, and all the toys he desired. Yet, external success came with a price&hellip; a constant nagging that he wasn&rsquo;t fulfilling his true purpose. Few people knew Jeffrey&rsquo;s true passion for helping others through energy healing, teaching &amp; intuition. For 15 years, he had apprenticed with with leading psychics, healers, and mediums in the United States. He quietly served on the&nbsp;<strong>board of directors for a spiritual development center,</strong>&nbsp;yet he worried his passion was too &ldquo;out there&rdquo; and could damage his professional career.</p>\r\n\r\n<p>Through a remarkable set of coincidences in 2005, Jeffrey found himself teaching graduate spiritual studies in Uganda, Africa to a talented group of advanced students. Fearing his students would find out he was &ldquo;an engineer pretending to be a spiritual teacher&rdquo;, it was Jeffrey who discovered he was &ldquo;a spiritual teacher pretending to be an engineer&rdquo;. This experience gave Jeffrey the courage to step out of hiding and into the spotlight.</p>\r\n', '2018-03-13 05:54:46', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_languages`
--

CREATE TABLE `tbl_languages` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(200) NOT NULL,
  `language_delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_languages`
--

INSERT INTO `tbl_languages` (`language_id`, `language_name`, `language_delete_status`) VALUES
(1, 'english', 0),
(2, 'malayalam', 0),
(3, 'hindi', 0),
(4, 'arabic', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `module_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `module_language` varchar(255) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`module_id`, `course_id`, `module_language`, `module_name`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 'first module', '2018-04-11 05:13:15', '2018-04-11 05:13:15'),
(2, 1, '2', 'Second Module', '2018-04-11 05:13:15', '2018-04-11 05:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(200) NOT NULL,
  `package_description` text NOT NULL,
  `package_image` varchar(200) NOT NULL,
  `package_price` float NOT NULL,
  `package_postedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `package_status` tinyint(4) NOT NULL,
  `package_delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_name`, `package_description`, `package_image`, `package_price`, `package_postedon`, `package_status`, `package_delete_status`) VALUES
(1, 'test package', '<p>hai test desc</p>\r\n', '1512976166.jpg', 255, '2018-03-20 04:58:04', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seats`
--

CREATE TABLE `tbl_seats` (
  `seat_id` int(11) NOT NULL,
  `seat_type` varchar(100) NOT NULL,
  `seat_rate` float NOT NULL,
  `seat_total` float NOT NULL,
  `seat_status` tinyint(4) NOT NULL,
  `seat_delete_status` tinyint(4) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seats`
--

INSERT INTO `tbl_seats` (`seat_id`, `seat_type`, `seat_rate`, `seat_total`, `seat_status`, `seat_delete_status`, `event_id`) VALUES
(2, 'vvp', 200, 20, 0, 0, 8),
(11, 'm', 10, 100, 0, 0, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_text` varchar(100) NOT NULL,
  `slider_image` varchar(200) NOT NULL,
  `slider_postedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slider_status` tinyint(4) NOT NULL,
  `slider_delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_text`, `slider_image`, `slider_postedon`, `slider_status`, `slider_delete_status`) VALUES
(1, 'simple text da', 'direc1520833194.jpg', '2018-03-12 05:20:07', 0, 0),
(2, 'dummy text', 'profile-banner.jpg', '2018-03-12 05:46:48', 0, 0),
(3, 'slider1', 'shirt.jpg', '2018-03-15 06:24:05', 0, 1),
(4, 'tday slider', 'com.jpg', '2018-03-17 05:55:39', 0, 0),
(5, 'simple text da', 'bb.jpg', '2018-03-17 06:04:16', 0, 0),
(6, 'wqr', 'mob.jpg', '2018-03-17 06:14:49', 0, 0),
(7, 'njnjf', 'bag.jpg', '2018-03-17 06:16:55', 0, 0),
(8, 'ghfdgg', 'banner.jpg', '2018-03-17 06:32:00', 1, 0),
(9, 'saddfsdfsd', 'direc-banner.jpg', '2018-03-17 06:58:02', 0, 0),
(10, 'ewtt', 'gemax-lotte-ha-noi-1.png', '2018-03-17 06:58:22', 0, 0),
(11, 'et', 'login.png', '2018-03-17 07:05:59', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_modules`
--

CREATE TABLE `tbl_sub_modules` (
  `sub_module_id` int(11) NOT NULL,
  `parent_module_id` int(11) NOT NULL,
  `sub_module_title` varchar(100) NOT NULL,
  `sub_module_pdf` varchar(100) NOT NULL,
  `sub_module_url` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `testimonial_name` varchar(255) NOT NULL,
  `testimonial_image` varchar(50) NOT NULL,
  `testimonial_review` text NOT NULL,
  `testimonial_type` tinyint(2) NOT NULL COMMENT '1=text, 2=video, 3=corporate',
  `testimonial_title` varchar(200) NOT NULL,
  `testimonial_youtube_link` varchar(255) NOT NULL,
  `testimonial_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `testimonial_status` tinyint(4) NOT NULL,
  `testimonial_delete_status` tinyint(2) NOT NULL,
  `testimonial_visibility` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`testimonial_id`, `testimonial_name`, `testimonial_image`, `testimonial_review`, `testimonial_type`, `testimonial_title`, `testimonial_youtube_link`, `testimonial_added_date`, `testimonial_status`, `testimonial_delete_status`, `testimonial_visibility`) VALUES
(4, 'sarath', 'direc1520322493.jpg', '<p>test reviewffgg edff</p>\r\n', 1, '', '', '0000-00-00 00:00:00', 0, 0, 0),
(5, '', '', '', 2, 'test testimonial', 'www.testimonials.com', '2018-03-06 05:05:29', 0, 0, 0),
(6, '', '', '', 2, 'ew', 'res', '2018-03-16 07:38:26', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_registration`
--

CREATE TABLE `tbl_user_registration` (
  `register_id` int(11) NOT NULL,
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `register_status` int(1) NOT NULL DEFAULT '0',
  `register_firstname` varchar(200) DEFAULT NULL,
  `register_lastname` varchar(100) DEFAULT NULL,
  `register_nationality` varchar(200) DEFAULT NULL,
  `register_location` varchar(250) DEFAULT NULL,
  `register_dob` date NOT NULL,
  `register_gender` varchar(100) NOT NULL,
  `register_mobile` bigint(20) DEFAULT NULL,
  `register_email` varchar(150) DEFAULT NULL,
  `register_username` varchar(150) DEFAULT NULL,
  `register_password` varchar(250) DEFAULT NULL,
  `register_image` varchar(250) DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `register_logout_url` varchar(100) DEFAULT NULL,
  `register_modified` datetime DEFAULT NULL,
  `register_lastlogin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_registration`
--

INSERT INTO `tbl_user_registration` (`register_id`, `register_time`, `register_status`, `register_firstname`, `register_lastname`, `register_nationality`, `register_location`, `register_dob`, `register_gender`, `register_mobile`, `register_email`, `register_username`, `register_password`, `register_image`, `register_date`, `register_logout_url`, `register_modified`, `register_lastlogin`) VALUES
(11, '2018-03-07 10:03:44', 0, 'sarath', 'vv', 'indian', 'kannur', '1990-01-02', 'male', 1478569852, 'kel@gmail.com', 'roseadmin', '$2y$10$34zeIV/FUkWAvib8SfA02OE8pOAOuyYYTwWV8NqkxdAIFB/Q.hLYq', NULL, '2018-03-07', NULL, NULL, NULL),
(12, '2018-03-13 06:44:28', 0, 'saru', 'vv', 'indian', 'iritty', '1990-01-02', 'male', 2586547856, 'kel@gmail.com', 'saru', '$2y$10$qHc4SjEs3WfzqwKGPEUAJuk6s/u4flkwGLAfODuX1HvmDrClStI96', NULL, '2018-03-13', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_chapters`
--
ALTER TABLE `tbl_chapters`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tbl_instructor_profile`
--
ALTER TABLE `tbl_instructor_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_seats`
--
ALTER TABLE `tbl_seats`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_sub_modules`
--
ALTER TABLE `tbl_sub_modules`
  ADD PRIMARY KEY (`sub_module_id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `tbl_user_registration`
--
ALTER TABLE `tbl_user_registration`
  ADD PRIMARY KEY (`register_id`),
  ADD KEY `register_id` (`register_id`,`register_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_chapters`
--
ALTER TABLE `tbl_chapters`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_instructor_profile`
--
ALTER TABLE `tbl_instructor_profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_seats`
--
ALTER TABLE `tbl_seats`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_sub_modules`
--
ALTER TABLE `tbl_sub_modules`
  MODIFY `sub_module_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_registration`
--
ALTER TABLE `tbl_user_registration`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
