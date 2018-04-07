-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2018 at 09:29 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khdms`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosis_id` int(11) NOT NULL,
  `diagnosis_Patid` int(11) NOT NULL,
  `diagnosis_des` varchar(1000) NOT NULL,
  `diagnosis_persid` int(11) NOT NULL,
  `diagnosis_facilid` int(11) NOT NULL,
  `diagnosis_date` datetime NOT NULL,
  `diagnosis_for` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`diagnosis_id`, `diagnosis_Patid`, `diagnosis_des`, `diagnosis_persid`, `diagnosis_facilid`, `diagnosis_date`, `diagnosis_for`) VALUES
(6, 1, 'Acute Sickle Cell', 1, 15, '2018-03-31 09:06:16', 'Sickle Cell'),
(7, 1, 'Temperal Sickle cell with 200 milligrams of assoteric haemolytes', 1, 15, '2018-04-04 06:20:07', 'Sickle Cell'),
(8, 1, 'The patient may require more blood', 1, 15, '2018-04-04 06:20:48', 'Sickle Cell');

--
-- Triggers `diagnosis`
--
DELIMITER $$
CREATE TRIGGER `timeline_diagnosis` AFTER INSERT ON `diagnosis` FOR EACH ROW INSERT INTO timeline 
SET timeline.timeline_patid = NEW.diagnosis_Patid,
timeline.timeline_descr = NEW.diagnosis_des,
timeline.timeline_date=NEW.diagnosis_date,
timeline.timeline_for="diag"
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(100) NOT NULL,
  `facility_ward` varchar(100) NOT NULL,
  `facility_location` varchar(100) NOT NULL,
  `facility_address` varchar(100) NOT NULL,
  `facility_type` varchar(100) NOT NULL,
  `facility_website` varchar(100) NOT NULL,
  `facility_phoneno` varchar(20) NOT NULL,
  `facility_email` varchar(100) NOT NULL,
  `facility_reg_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facility_id`, `facility_name`, `facility_ward`, `facility_location`, `facility_address`, `facility_type`, `facility_website`, `facility_phoneno`, `facility_email`, `facility_reg_id`) VALUES
(15, 'Maseno Univeristy Hospital', 'Maseno', 'Maseno', 'P.O. Box 35 Maseno', 'Hospital', 'www.masenohospital.com', '0770389362', 'hospital@maseno.ac.ke', '58762752');

-- --------------------------------------------------------

--
-- Table structure for table `issued_meds`
--

CREATE TABLE `issued_meds` (
  `issue_id` int(11) NOT NULL,
  `issue_patid` int(11) NOT NULL,
  `issue_medid` int(11) NOT NULL,
  `issue_persid` int(11) NOT NULL,
  `issue_facility` int(11) NOT NULL,
  `issue_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_meds`
--

INSERT INTO `issued_meds` (`issue_id`, `issue_patid`, `issue_medid`, `issue_persid`, `issue_facility`, `issue_date`) VALUES
(1, 1, 1, 1, 15, '2018-04-05 11:50:00');

--
-- Triggers `issued_meds`
--
DELIMITER $$
CREATE TRIGGER `timeline_issuedmeds` AFTER INSERT ON `issued_meds` FOR EACH ROW INSERT INTO timeline 
SET timeline.timeline_patid = NEW.issue_patid,
timeline.timeline_descr ="Medication issued",
timeline.timeline_date=NEW.issue_date,
timeline.timeline_for="issue"
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `medication_id` int(11) NOT NULL,
  `medication_name` varchar(200) NOT NULL,
  `medication_manuf` varchar(200) NOT NULL,
  `medication_description` varchar(10000) NOT NULL,
  `medication_type` varchar(100) NOT NULL,
  `medication_treats` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`medication_id`, `medication_name`, `medication_manuf`, `medication_description`, `medication_type`, `medication_treats`) VALUES
(1, 'BrothTintis Handrole', 'Kem Pharmacies', 'Yellow, tablet 300ccmg', 'talet', 'cancer'),
(2, 'tintius Plomacrude', 'btHealth india.', 'red 500ccmg', 'injection', 'sicklecell'),
(3, 'Jsuneunjun', 'Hysjwnu', 'ddefe', 'tefr', 'cancer');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pat_id` int(11) NOT NULL,
  `pat_name` varchar(100) NOT NULL,
  `pat_natid` int(11) NOT NULL,
  `pat_nhifid` int(11) DEFAULT NULL,
  `pat_gender` varchar(6) NOT NULL,
  `pat_dob` date NOT NULL,
  `pat_phoneno` varchar(20) NOT NULL,
  `pat_email` varchar(50) NOT NULL,
  `pat_username` varchar(100) NOT NULL,
  `pat_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pat_id`, `pat_name`, `pat_natid`, `pat_nhifid`, `pat_gender`, `pat_dob`, `pat_phoneno`, `pat_email`, `pat_username`, `pat_password`) VALUES
(1, 'Joseph Smith', 1234567, 987456, 'male', '2018-03-04', '0712345678', 'smith@gmail.com', '', ''),
(2, 'John Kungu', 658428, 25884, 'Male', '2018-02-06', '5795752785', 'kungu@gmai.com', '', ''),
(5, 'Oscar Mureti', 34188162, 8957581, 'male', '1996-08-28', '0707817900', 'oscarmureti75@gmail.com', '0707817900', '34188162'),
(8, 'clobber', 34585125, 34254852, 'male', '1982-01-01', '0725621863', 'jaoei@gmail.com', '0725621863', '34585125');

--
-- Triggers `patients`
--
DELIMITER $$
CREATE TRIGGER `delete_all_affairs` AFTER DELETE ON `patients` FOR EACH ROW DELETE FROM diagnosis WHERE diagnosis.diagnosis_Patid = patients.pat_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `personnel_id` int(11) NOT NULL,
  `personnel_name` varchar(100) NOT NULL,
  `personnel_natid` int(20) NOT NULL,
  `personnel_nhifid` int(20) NOT NULL,
  `personnel_facility` varchar(100) NOT NULL,
  `personnel_facilityid` int(11) NOT NULL,
  `personnel_gender` varchar(6) NOT NULL,
  `personnel_designation` varchar(100) NOT NULL,
  `personnel_dob` date NOT NULL,
  `personnel_phoneno` varchar(20) NOT NULL,
  `personnel_email` varchar(100) NOT NULL,
  `personnel_username` varchar(100) NOT NULL,
  `personnel_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`personnel_id`, `personnel_name`, `personnel_natid`, `personnel_nhifid`, `personnel_facility`, `personnel_facilityid`, `personnel_gender`, `personnel_designation`, `personnel_dob`, `personnel_phoneno`, `personnel_email`, `personnel_username`, `personnel_password`) VALUES
(1, 'Karim Karanja Kanji', 34241316, 123456, 'Maseno Univeristy', 15, 'male', 'doctor', '1997-10-06', '0703756325', 'karimkanji101@gmail.com', 'kanji-karanja', 'infinity1997');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `pres_id` int(11) NOT NULL,
  `pres_patid` int(11) NOT NULL,
  `pres_medid` int(11) NOT NULL,
  `pres_persid` int(11) NOT NULL,
  `pres_facility` int(11) NOT NULL,
  `pres_dosage` varchar(1000) NOT NULL,
  `pres_date` datetime NOT NULL,
  `pres_issued_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`pres_id`, `pres_patid`, `pres_medid`, `pres_persid`, `pres_facility`, `pres_dosage`, `pres_date`, `pres_issued_state`) VALUES
(4, 1, 2, 1, 15, '3X4', '2018-03-31 09:09:53', 0),
(5, 1, 2, 1, 15, '4x3', '2018-04-04 06:21:51', 0);

--
-- Triggers `prescription`
--
DELIMITER $$
CREATE TRIGGER `timeline_prescription` AFTER INSERT ON `prescription` FOR EACH ROW INSERT INTO timeline 
SET timeline.timeline_patid = NEW.pres_patid,
timeline.timeline_descr ="Drug Prescribed",
timeline.timeline_date= NEW.pres_date,
timeline.timeline_for="pres"
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `test_name` varchar(100) NOT NULL,
  `test_for` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `test_type`, `test_name`, `test_for`) VALUES
(1, 'Cancer', 'Cancer Links', 'cancer');

-- --------------------------------------------------------

--
-- Table structure for table `test_rec`
--

CREATE TABLE `test_rec` (
  `test_recid` int(11) NOT NULL,
  `test_testid` int(11) NOT NULL,
  `test_recpatid` int(11) NOT NULL,
  `test_recpersid` int(11) NOT NULL,
  `test_recfacility` int(11) NOT NULL,
  `test_rec_date` datetime NOT NULL,
  `test_performed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_rec`
--

INSERT INTO `test_rec` (`test_recid`, `test_testid`, `test_recpatid`, `test_recpersid`, `test_recfacility`, `test_rec_date`, `test_performed`) VALUES
(1, 1, 1, 1, 15, '2018-04-05 03:28:31', 1),
(2, 1, 2, 1, 15, '2018-04-05 03:56:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `testres_id` int(11) NOT NULL,
  `test_patid` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `test_performed_id` int(11) NOT NULL,
  `test_persid` int(11) NOT NULL,
  `test_facility` int(11) NOT NULL,
  `test_date` datetime NOT NULL,
  `test_result` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`testres_id`, `test_patid`, `test_id`, `test_performed_id`, `test_persid`, `test_facility`, `test_date`, `test_result`) VALUES
(1, 1, 1, 0, 1, 15, '2018-04-05 03:28:44', 'No links found'),
(2, 2, 2, 0, 1, 15, '2018-04-05 03:57:05', 'There is a lump on the chest 40mm showing cancer links and attributes');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `timeline_id` int(11) NOT NULL,
  `timeline_patid` int(11) NOT NULL,
  `timeline_descr` varchar(10000) NOT NULL,
  `timeline_date` datetime NOT NULL,
  `timeline_for` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`timeline_id`, `timeline_patid`, `timeline_descr`, `timeline_date`, `timeline_for`) VALUES
(3, 1, 'Acute Sickle Cell', '2018-03-31 09:06:16', 'diag'),
(4, 1, 'Drug Prescribed', '2018-03-31 09:09:53', 'pres'),
(5, 1, 'Temperal Sickle cell with 200 milligrams of assoteric haemolytes', '2018-04-04 06:20:07', 'diag'),
(6, 1, 'The patient may require more blood', '2018-04-04 06:20:48', 'diag'),
(7, 1, 'Drug Prescribed', '2018-04-04 06:21:51', 'pres'),
(8, 1, 'Medication issued', '2018-04-05 11:50:00', 'issue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosis_id`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `issued_meds`
--
ALTER TABLE `issued_meds`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`medication_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`personnel_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`pres_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_rec`
--
ALTER TABLE `test_rec`
  ADD PRIMARY KEY (`test_recid`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`testres_id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`timeline_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `issued_meds`
--
ALTER TABLE `issued_meds`
  MODIFY `issue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `medication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `personnel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `pres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `test_rec`
--
ALTER TABLE `test_rec`
  MODIFY `test_recid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `testres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `timeline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
