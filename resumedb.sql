-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2012 at 08:12 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resumedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_query`
--

CREATE TABLE IF NOT EXISTS `ci_query` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query_string` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `ci_query`
--

INSERT INTO `ci_query` (`id`, `query_string`) VALUES
(1, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(2, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(3, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(4, 'filter_input=electrical&filter_type=major&search_input=&search_type=interests'),
(5, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(6, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(7, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(8, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(9, 'filter_input=&filter_type=year&search_input=test&search_type=interests'),
(10, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(11, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(12, 'filter_input=Electrical&filter_type=major&search_input=&search_type=interests'),
(13, 'filter_input=&filter_type=year&search_input=TEST&search_type=interests'),
(14, 'filter_input=sfda&filter_type=year&search_input=&search_type=interests'),
(15, 'filter_input=2014&filter_type=year&search_input=&search_type=interests'),
(16, 'filter_input=2014&filter_type=major&search_input=&search_type=interests'),
(17, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(18, 'filter_input=&filter_type=year&search_input=&search_type=interests'),
(19, 'filter_input=&filter_type=year&search_input=test&search_type=interests'),
(20, 'filter_input=2022&filter_type=year&search_input=&search_type=interests'),
(21, 'filter_input=&filter_type=year&search_input=test&search_type=interests'),
(22, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(23, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(24, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(25, 'filter_input=20&filter_type=year&search_input=&search_type=interests'),
(26, 'filter_input=201&filter_type=year&search_input=&search_type=interests'),
(27, 'filter_input=20+11&filter_type=year&search_input=&search_type=interests'),
(28, 'filter_input=20+11&filter_type=year&search_input=&search_type=interests'),
(29, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(30, 'filter_input=2012&filter_type=year&search_input=&search_type=interests'),
(31, 'filter_input=2022&filter_type=year&search_input=&search_type=interests'),
(32, 'filter_input=20&filter_type=year&search_input=&search_type=interests'),
(33, 'filter_input=electrical&filter_type=major&search_input=&search_type=interests'),
(34, 'filter_input=engineering&filter_type=major&search_input=&search_type=interests'),
(35, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(36, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(37, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(38, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(39, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(40, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(41, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(42, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(43, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(44, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(45, 'filter_input=2011&filter_type=year&search_input=&search_type=interests'),
(46, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(47, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(48, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(49, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(50, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(51, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(52, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(53, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(54, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(55, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(56, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(57, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(58, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(59, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(60, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(61, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(62, 'filter_input=Electrical+Engineering&filter_type=year&search_input=&search_type=interests'),
(63, 'filter_input=Electrical+Engineering&filter_type=major&search_input=&search_type=interests'),
(64, 'filter_input=Electrical&filter_type=major&search_input=&search_type=interests'),
(65, 'filter_input=computer&filter_type=major&search_input=&search_type=interests'),
(66, 'filter_input=electrical+and+computer&filter_type=major&search_input=&search_type=interests'),
(67, 'filter_input=&filter_type=year&search_input=test&search_type=interests'),
(68, 'filter_input=&filter_type=year&search_input=TEST&search_type=interests');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('721da9b0a9a455d5b65a8b21906281f3', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/53', 1313553175, 'a:9:{s:12:"is_logged_in";b:1;s:8:"per_page";i:20;s:7:"sort_by";s:5:"netID";s:10:"sort_order";s:3:"asc";s:10:"total_rows";i:24;s:5:"limit";i:20;s:8:"username";s:2:"ge";s:8:"query_id";s:1:"0";s:6:"offset";i:0;}');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(4) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `company_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `activation_code` varchar(32) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `title`, `first_name`, `last_name`, `company_name`, `username`, `password`, `email`, `phone`, `activation_code`, `activated`, `created`) VALUES
(1, 'Mr.', 'John', 'Smith', 'Boeing', 'boeing', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'smith@boeing.com', '432324432', 'test', 1, '2011-08-11 16:52:39'),
(2, 'Mr.', 'Thomas', 'Anderson', 'General Electric', 'ge', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'neo@ge.com', '432324443', 'test1', 1, '2011-08-11 22:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE IF NOT EXISTS `resumes` (
  `netID` varchar(25) NOT NULL,
  `interests` text NOT NULL,
  `skills` text NOT NULL,
  `resume` text NOT NULL,
  PRIMARY KEY (`netID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`netID`, `interests`, `skills`, `resume`) VALUES
('32432sfd', '', '', ''),
('32sdff', '', '', ''),
('afds', '', '', ''),
('afdsafsd', 'test', 'test', 'test'),
('afsd', '', '', ''),
('afsdfads', '', '', ''),
('afsf', '', '', ''),
('c3ds', '', '', ''),
('cai19', 'test', 'test', 'test'),
('csdaf', '', '', ''),
('dfsada', '', '', ''),
('erwrw', '', '', ''),
('fadsfd', '', '', ''),
('fasd', '', '', ''),
('fdsa', 'test', 'test', 'test'),
('fdsaa', '', '', ''),
('fdsad', '', '', ''),
('fdsafu', '', '', ''),
('fljksfljk', '', '', ''),
('fsda', '', '', ''),
('fsfdaf', '', '', ''),
('ljkk', '', '', ''),
('lkjfl', '', '', ''),
('sdfsfda', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `netID` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `major` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `first_name`, `last_name`, `netID`, `password`, `email`, `phone`, `year`, `major`, `created`) VALUES
(53, 'Oliver', 'Cai', 'cai19', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'olivercai@gmail.com', '7143126541', 2010, 'Electrical Engineering', '2011-08-13 21:13:36'),
(56, 'Mike', 'Thompson', 'fdsa', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'adfssaf@fadfs.com', '32323423', 2010, 'Computer Engineering', '2011-08-14 17:50:09'),
(57, 'David', 'Copperfield', 'afdsafsd', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'dsfa@afsd.com', '34232343', 2011, 'Electrical Engineering', '2011-08-14 17:50:28'),
(58, 'afdadsfdf', 'afdsdfadsf', 'fadsfd', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'dsaf@fads.com', '342324342', 2013, 'Computer Engineering', '2011-08-14 17:50:48'),
(59, 'afsdafds', 'afdsadsf', 'afsd', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'fads@afds.com', '243432342', 2010, 'Electrical Engineering', '2011-08-14 17:51:03'),
(60, 'fdsa', 'dafs', 'dfsada', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'dfa@dfasdsfa.com', '3423234', 2012, 'Electrical Engineering', '2011-08-14 17:51:27'),
(61, 'adfssdfdf', 'asfdsdf', 'afsdfads', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'afdssafd@fads.com', '3243243243', 2011, 'Computer Engineering', '2011-08-14 17:51:42'),
(62, 'adsf', 'adfs', 'fdsad', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'afds@sdafdsfa.com', '2342343242', 2011, 'Computer Engineering', '2011-08-14 17:52:13'),
(63, 'lklkjadsf', 'sfdaljkasfd', 'ljkk', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'sdfa@kl.com', '2342323', 2013, 'Electrical Engineering', '2011-08-14 17:53:02'),
(64, 'dasfdsf', 'fdasads', 'afsf', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'dasffda@fa.com', '342324234', 2013, 'Electrical Engineering', '2011-08-14 17:53:17'),
(65, 'fsdadfssf', 'dfsasdf', 'fdsafu', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'dfasdasf@fassad.com', '24323443', 2020, 'Computer Engineering', '2011-08-14 17:54:04'),
(66, 'dasfdsfdfs', 'asfdff', 'fsfdaf', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'fkllsdk@sdaf.com', '3242323', 2011, 'Electrical Engineering', '2011-08-14 17:54:19'),
(67, 'sfdlkjaslfjk', 'fdljksasflkj', 'fljksfljk', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'dfsa@lkew.com', '2344322432', 2013, 'Electrical Engineering', '2011-08-14 17:54:36'),
(68, 'adfs', 'adsf', 'lkjfl', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'tasdf@adff.com', '342234234', 2010, 'Computer Engineering', '2011-08-14 20:19:39'),
(69, 'kldkljafd', 'sfdajkdaf', 'c3ds', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'asfd3@adsf.com', '323432423', 2011, 'Electrical Engineering', '2011-08-14 20:19:58'),
(70, 'adsfsdf', 'afsdfds', 'csdaf', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'dfasaf@afsfssf.com', '3242342343', 2013, 'Electrical Engineering', '2011-08-14 20:20:16'),
(71, 'sdafljksdf', 'sdfaljkasdf', 'fdsaa', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'sfdfds@werwr.com', '3422432332', 2011, 'Electrical Engineering', '2011-08-14 20:20:59'),
(72, 'adsfsdf', 'safdfds', 'fasd', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'fsda@werwre.com', '3424323243', 2011, 'Electrical Engineering', '2011-08-14 20:21:17'),
(73, 'dfsaasdf', 'sdfaasfd', 'sdfsfda', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'dsfsfa@wre.com', '2433242342', 2014, 'Computer Engineering', '2011-08-14 20:21:38'),
(74, 'sadfdsf', 'afdsfds', 'fsda', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'fdaafds@wrewr.com', '3253522325', 2011, 'Computer Engineering', '2011-08-14 20:21:53'),
(75, 'dasf', 'asdf', 'afds', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'fdas@wrewr.com', '324332423', 2011, 'Electrical Engineering', '2011-08-14 20:22:10'),
(76, 'dafs', 'asfd', 'erwrw', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'sfda@wer3.com', '234234243', 2010, 'Electrical Engineering', '2011-08-14 21:38:42'),
(77, 'sdaf', 'sdfaasfd', '32432sfd', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'sfdsfda@wre3.com', 's224423', 2022, 'Computer Engineering', '2011-08-14 21:39:04'),
(78, 'sfda', 'sfdajkdaf', '32sdff', 'dfd46dda499b62a9a6bb584ff78dc7f5', 'asfd@rwe.com', '2343423', 2011, 'Electrical Engineering', '2011-08-14 21:39:20');
