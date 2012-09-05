-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 05, 2012 at 09:12 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ls_text_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `citations`
--

CREATE TABLE IF NOT EXISTS `citations` (
  `Keycode` int(11) NOT NULL,
  `Journal` text NOT NULL,
  `Year` int(11) NOT NULL,
  `Volume` text NOT NULL,
  `Page` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citations`
--


-- --------------------------------------------------------

--
-- Table structure for table `judgements`
--

CREATE TABLE IF NOT EXISTS `judgements` (
  `Keycode` int(11) NOT NULL AUTO_INCREMENT,
  `COURT` text NOT NULL,
  `Judges` text NOT NULL,
  `Bench` int(11) NOT NULL,
  `CaseNo` text NOT NULL,
  `Appellant` text NOT NULL,
  `Respondent` text NOT NULL,
  `Date` datetime NOT NULL,
  `Advocates` text NOT NULL,
  `Headnote` longtext NOT NULL,
  `CasesReferred` longtext NOT NULL,
  `Judgement` longtext NOT NULL,
  `FileName` text NOT NULL,
  PRIMARY KEY (`Keycode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `judgements`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
