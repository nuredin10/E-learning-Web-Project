-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 08:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e learning`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `uspDeleteDepartment` (IN `depid` INT)  begin 
delete from tbldepartment
where id = depid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspDeleteLogin` (IN `loginid` INT)  begin 
delete from tbllogin 
where id =loginid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspInsertCourse` (IN `depname` VARCHAR(30), IN `coursesID` VARCHAR(30), IN `cname` VARCHAR(30), IN `hr` INT)  begin 
declare depIDs INT unsigned DEFAULT 0; 
DECLARE cID INT unsigned DEFAULT 0;

set depIDs = (select id from tbldepartment
where name = depname);
if( depIDs != 0)
	then 
    insert into  tblcourse(courseid,name,credithr) 		values(coursesid,cname,hr);
     END if;
set cID = (select id tblcourse from tblcourse
where name = cname and courseid = coursesid);

if(cid != 0)
	then
    insert into has (depid,courseid) 
    values(depids,cid);
    end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspInsertDepartment` (IN `dname` VARCHAR(30))  BEGIN
insert into tbldepartment(name) values(dname);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspInsertLogin` (IN `username` VARCHAR(30), IN `pwd` VARCHAR(30))  begin 
insert into tbllogin(username,password) values(username,pwd);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspSearchDepartment` (IN `depchar` VARCHAR(30))  begin 
select * from tbldepartment
where name like depchar+'%';
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspUpdateDepartment` (IN `depID` INT, IN `Nname` VARCHAR(30))  begin 
update tbldepartment set name = Nname
where id = depid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspUpdateLogin` (IN `loID` INT, IN `uname` VARCHAR(30), IN `pwd` VARCHAR(30))  begin 
update tbllogin set username = uname,password = pwd
where id = loid;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspViewDepartment` ()  begin 
select * from tbldepartment;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `LoginID` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `has`
--

CREATE TABLE `has` (
  `id` int(11) NOT NULL,
  `depID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `has`
--

INSERT INTO `has` (`id`, `depID`, `courseID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `id` int(11) NOT NULL,
  `courseId` varchar(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `creditHr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`id`, `courseId`, `name`, `creditHr`) VALUES
(1, 'CS343', 'System Anaylsis and Design', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`id`, `name`) VALUES
(1, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `tblenroll`
--

CREATE TABLE `tblenroll` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `courseID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblinstructor`
--

CREATE TABLE `tblinstructor` (
  `id` int(11) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `loginID` int(11) NOT NULL,
  `highschool` varchar(100) NOT NULL,
  `Degree` varchar(100) NOT NULL,
  `collegeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblonlinematerials`
--

CREATE TABLE `tblonlinematerials` (
  `id` int(11) NOT NULL,
  `materials` blob NOT NULL,
  `type` varchar(100) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `Fname` varchar(30) NOT NULL,
  `Lname` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `loginNo` int(11) NOT NULL,
  `depID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teach`
--

CREATE TABLE `teach` (
  `id` int(11) NOT NULL,
  `depid` int(11) NOT NULL,
  `instructorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkChat` (`LoginID`);

--
-- Indexes for table `has`
--
ALTER TABLE `has`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkhasCourse` (`depID`),
  ADD KEY `fkHasdep` (`courseID`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblenroll`
--
ALTER TABLE `tblenroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkenrollCourse` (`courseID`),
  ADD KEY `fkenrollStudent` (`studentID`);

--
-- Indexes for table `tblinstructor`
--
ALTER TABLE `tblinstructor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkInstructLogin` (`loginID`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblonlinematerials`
--
ALTER TABLE `tblonlinematerials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCourseMaterials` (`courseID`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkStudLogn` (`loginNo`),
  ADD KEY `fkStudentDep` (`depID`);

--
-- Indexes for table `teach`
--
ALTER TABLE `teach`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkteachdepartment` (`depid`),
  ADD KEY `fkteachInstructor` (`instructorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `has`
--
ALTER TABLE `has`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblenroll`
--
ALTER TABLE `tblenroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblinstructor`
--
ALTER TABLE `tblinstructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblonlinematerials`
--
ALTER TABLE `tblonlinematerials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teach`
--
ALTER TABLE `teach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fkChat` FOREIGN KEY (`LoginID`) REFERENCES `tbllogin` (`id`);

--
-- Constraints for table `has`
--
ALTER TABLE `has`
  ADD CONSTRAINT `fkHasdep` FOREIGN KEY (`courseID`) REFERENCES `tblcourse` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fkhasCourse` FOREIGN KEY (`depID`) REFERENCES `tbldepartment` (`id`);

--
-- Constraints for table `tblenroll`
--
ALTER TABLE `tblenroll`
  ADD CONSTRAINT `fkenrollCourse` FOREIGN KEY (`courseID`) REFERENCES `tblcourse` (`id`),
  ADD CONSTRAINT `fkenrollStudent` FOREIGN KEY (`studentID`) REFERENCES `tblstudents` (`id`);

--
-- Constraints for table `tblinstructor`
--
ALTER TABLE `tblinstructor`
  ADD CONSTRAINT `fkInstructLogin` FOREIGN KEY (`loginID`) REFERENCES `tbllogin` (`id`);

--
-- Constraints for table `tblonlinematerials`
--
ALTER TABLE `tblonlinematerials`
  ADD CONSTRAINT `fkCourseMaterials` FOREIGN KEY (`courseID`) REFERENCES `tblcourse` (`id`);

--
-- Constraints for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD CONSTRAINT `fkStudLogn` FOREIGN KEY (`loginNo`) REFERENCES `tbllogin` (`id`),
  ADD CONSTRAINT `fkStudentDep` FOREIGN KEY (`depID`) REFERENCES `tbldepartment` (`id`);

--
-- Constraints for table `teach`
--
ALTER TABLE `teach`
  ADD CONSTRAINT `fkteachInstructor` FOREIGN KEY (`instructorID`) REFERENCES `tblinstructor` (`id`),
  ADD CONSTRAINT `fkteachdepartment` FOREIGN KEY (`depid`) REFERENCES `tbldepartment` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
