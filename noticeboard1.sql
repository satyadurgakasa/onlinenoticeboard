-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2018 at 05:01 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noticeboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `adminid` varchar(20) NOT NULL,
  `adname` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`adminid`, `adname`, `password`) VALUES
('administrator', 'manoj', 'manoj@94');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `regno` varchar(15) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `father` varchar(40) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `year` varchar(7) DEFAULT NULL,
  `branch` varchar(5) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `mobile` varchar(14) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `profile` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`regno`, `name`, `father`, `gender`, `dob`, `year`, `branch`, `email`, `mobile`, `address`, `password`, `profile`) VALUES
('315175710094', 'Manoj', 'Subhakara Rao', 'male', '1997-08-31', '3', 'CSE', 'manojkare.94@gmail.com', '9642434686', 'Nagapuram, Krishna dist., A.P.', 'manoj@94', 0x61646d696e69636f6e2e706e67),
('315175710097', 'satya durga', 'venkateswararao', 'female', '1998-08-24', '3', 'CSE', 'satya.kasa9@gmail.com', '9912070679', 'pkl', 'satya123', ''),
('315175710104', 'konde suharsha', 'konde china subba rao', 'male', '1998-08-23', '3', 'CSE', 'havichells1968@gmail.com', '7893975242', 'gopalapuram west godawari', 'mounika@46', 0x6261636b672e6a7067),
('315175710130', 'koteswararao', 'srinivasarao', 'male', '1998-02-28', '3', 'CSE', 'melamkoteswararao45@gmail.com', '8897720608', 'ongole', 'koti@130', 0x68616d6c65742d48656e72795f53656c6f75735f3138363863742e676966),
('315175720162', 'Sekhar', 'Eswara Rao', 'male', '1997-05-05', '3', 'MECH', 'marapirajasekhar@gmail.com', '9133756988', 'Mudnepalli', 'sekhar@m', ''),
('315175720166', 'MATTA VENKATA MUTYA SURYA', 'Matta umamaheswara rao', 'male', '1998-01-10', '3', 'MECH', 'venkatamutyasurya@gmail.com', '9502244656 ', 'Opp svs clinic, jangareddy gudem road, koyyalagude', 'suryamatta', ''),
('345214578905', 'niougdi', 'nioufhi', 'male', '2018-03-08', '1', 'ECE', 'ukbyascguyfa@ubygsdf.efoih', '9876543210', 'waekcnuwgeuic', 'uisydgcfiye', '');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `txtfield` varchar(400) NOT NULL,
  `img` mediumblob NOT NULL,
  `timing` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`txtfield`, `img`, `timing`) VALUES
('Sagi Ramakrishnam Raju Engineering College Bhimavaram is an Engineering College in Bhimavaram, Andhra Pradesh, India. Sagi Ramakrishnam Raju Engineering College, is a co-educational, independent and a private Engineering college.', 0x4453435f303735372e4a5047, '2018-03-22 07:35:13'),
('1. On 6th November 2008 TCS, Hyderabad conducted TCS-SRKREC Campus Club Program for TCS selected students.\r\n2. On 27th November 2008, Data Point Ltd, Hyderabad, conducted Seminar on â€œCampus Recruitment and Trainingâ€.\r\n3. Purpleleap (A Pearson Educomp Joint venture Company), Bangalore team addressed the 4 year students on Campus Recruitment.\r\n', 0x494d475f32303135313032375f3131323532312e6a7067, '2018-03-22 07:37:51'),
('hello hi\r\n', '', '2018-03-22 08:08:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`regno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
