-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 06:15 AM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspInsertAssignment` (IN `assign` LONGTEXT, IN `types` TEXT, IN `stat` VARCHAR(100), IN `title` VARCHAR(100), IN `user` VARCHAR(100))  begin 
insert into tblactivities(assignment,type,status,title,username)
values(assign,types,stat,title,user);
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspInsertInstructor` (IN `fnames` VARCHAR(30), IN `lnames` VARCHAR(30), IN `addresss` VARCHAR(30), IN `DOBs` DATE, IN `emails` VARCHAR(30), IN `phones` VARCHAR(30), IN `Uname` VARCHAR(30), IN `pwd` VARCHAR(30), IN `depNAme` VARCHAR(30), IN `hschool` VARCHAR(100), IN `degrees` VARCHAR(100), IN `collegeNames` VARCHAR(100))  begin 
  declare depID int unsigned default 0;
    declare LoginID int unsigned default 0;
    declare instructorID int unsigned default 0;
    
    set depID = (select id from tbldepartment where name = depname);
     set LoginID  = (select id from tbllogin where username = Uname and password = pwd ); 
    
    insert into tblinstructor(fname,lname,address,DOB,email,phone,loginID,highschool,degree,collegeName)
  values(fnames,lnames,addresss,DOBs,emails,phones,LoginID,hschool,degrees,collegeNames);
     
    
   
    
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspInsertLogin` (IN `uname` VARCHAR(30), IN `pwd` VARCHAR(30))  begin 
  declare loginIDs int unsigned DEFAULT 10;
  declare status int unsigned DEFAULT 10;
  declare type varchar(30)  DEFAULT null;
  
  
  
  if exists(select * from tbllogin where username=uname and password = pwd)
  then 
   set status =1;
   set loginIDs = (select id from tbllogin where username=uname and password = pwd);
  end if;
  
  if exists( select * from tblstudents where loginNO =loginIDs)
  THEN
   set type = 'student';
  else if EXISTS(select * from tblinstructor where loginID =loginIDs)
  then 
  set type = 'instructor';
  end if;
  end if;
  select status as Status , type as Type;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspInsertSignup` (IN `username` VARCHAR(30), IN `pwd` VARCHAR(30))  begin 
insert into tbllogin(username,password) values(username,pwd);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspInsertStudent` (IN `fnames` VARCHAR(30), IN `lnames` VARCHAR(30), IN `addresss` VARCHAR(30), IN `DOBs` DATE, IN `emails` VARCHAR(30), IN `phones` VARCHAR(30), IN `Uname` VARCHAR(30), IN `pwd` VARCHAR(30), IN `depNAme` VARCHAR(30))  begin 
  declare depID int unsigned default 0;
    declare LoginID int unsigned default 0;
    
    set depID = (select id from tbldepartment where name = depname);
     set LoginID  = (select id from tbllogin where username = Uname and password = pwd ); 
    if(depID != 0 and LoginID != 0 )
    then 
    insert into tblstudents(fname,lname,address,DOB,email,phone,loginNO,depID)
  values(fnames,lnames,addresss,DOBs,emails,phones,loginID,depID);
    end if;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspViewAssigmnet` (IN `type` VARCHAR(100))  BEGIN
 select * from tblactivities
 where status = type;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspViewDepartment` ()  begin 
select * from tbldepartment;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspViewPeople` ()  begin
SELECT s.Fname AS S_Fname, s.Lname AS S_Lname, i.Fname AS I_Fname, i.Lname AS I_Lname
FROM tblinstructor AS i
JOIN teach AS t
on i.id =  t.instructorID
join tbldepartment as d
on t.depid = d.id
join has as h
on d.id = h.depID
join tblcourse as c
on h.courseID = c.id
join tblenroll as e 
on c.id = e.courseID
join tblstudents as s
on e.studentID = s.id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `uspViewStudentAndTeacher` ()  SELECT s.Fname AS S_Fname, s.Lname AS S_Lname, i.Fname AS I_Fname, i.Lname AS I_Lname
FROM tblstudents AS s
JOIN tblinstructor AS i
on s.loginNo = i.loginID$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `LoginID` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `LoginID`, `message`, `time`, `user`) VALUES
(46, 20, 'Hello I\'m Edu', '2022-01-27 18:13:57', 'Edu'),
(47, 20, 'Its nice to meet you guys😃', '2022-01-27 18:14:19', 'Edu'),
(49, 20, 'Hello everyone👋 This is your instructor Anthonio', '2022-01-27 18:16:27', 'Anthonio');

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
-- Table structure for table `tblactivities`
--

CREATE TABLE `tblactivities` (
  `id` int(11) NOT NULL,
  `assignment` longtext NOT NULL,
  `type` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblactivities`
--

INSERT INTO `tblactivities` (`id`, `assignment`, `type`, `status`, `title`, `username`) VALUES
(4, '5403-javascript.pptx', 'pptx', 'upload', 'This assignment is about java script', ''),
(5, '2474-css.pptx', 'pptx', 'upload', 'This assignment is about css', ''),
(6, '2526-Chapter 2.pptx', 'pptx', 'upload', 'dscasdcadscasdc', ''),
(7, '6647-five.pptx', 'pptx', 'upload', 'adscasdc', 'asdcasd');

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

--
-- Dumping data for table `tblinstructor`
--

INSERT INTO `tblinstructor` (`id`, `Fname`, `Lname`, `address`, `DOB`, `email`, `phone`, `loginID`, `highschool`, `Degree`, `collegeName`) VALUES
(1, 'edasd', 'asdc', 'asdcasd', '0000-00-00', 'adsca@gmail.com', '1231234', 11, 'adc', 'java', 'unity'),
(2, 'edasd', 'asdc', 'asdcasd', '0000-00-00', 'adsca@gmail.com', '1231234', 9, 'adc', 'java', 'unity'),
(3, 'edasd', 'asdc', 'asdcasd', '0000-00-00', 'adsca@gmail.com', '1231234', 9, 'adc', 'java', 'unity'),
(5, 'Josi', 'ann', 'addis ababa', '2022-01-08', 'josi@gmail.com', '1234123412', 17, 'MSH', 'Java', 'Unknown'),
(6, 'nureddin', 'asdc', 'addis ababa', '2022-01-19', 'nuredinibrahim18@gmail.com', '09123941234', 19, 'MSH', 'Java', 'Unknown'),
(7, 'new', 'newa', 'addis ababa', '2022-01-14', 'nuredinibrahim18@gmail.com', '09123941234', 21, 'MSH', 'Java', 'Unknown'),
(8, 'lidya', 'zeleke', 'Addis ababa', '2022-01-03', 'lidya@gmail.com', '12341234123', 23, 'SWH', 'Java', 'HiLCoE');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`id`, `username`, `password`) VALUES
(1, 'timaj', '1234'),
(3, 'casdcasdca', '123'),
(7, 'abebe', 'abe123'),
(8, 'lidya', '123'),
(9, 'Edu', 'hi'),
(10, 'Jhon', 'jhon123'),
(11, 'Anthonio', 'Anthonio123'),
(12, 'Peter', 'peter123'),
(14, 'nuredin', 'nure123'),
(17, 'josi', 'josi123'),
(18, 'Abebe', 'abe123'),
(19, 'kebede', '123'),
(20, 'medki', 'medki123'),
(21, 'new', 'new123'),
(22, 'kalkidan', 'kali123'),
(23, 'Lidya', 'lidy123');

-- --------------------------------------------------------

--
-- Table structure for table `tblonlinematerials`
--

CREATE TABLE `tblonlinematerials` (
  `id` int(11) NOT NULL,
  `materials` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `courseID` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblonlinematerials`
--

INSERT INTO `tblonlinematerials` (`id`, `materials`, `type`, `courseID`, `title`) VALUES
(33, '3984-chapter one.ppt', 'ppt', 0, 'This material is chapter one system analysis and design '),
(34, '6570-Chapter One.pptx', 'pptx', 0, 'Web development chapter one, introduction to web'),
(35, '6022-Chapter 1 PPT.pptx', 'pptx', 0, 'Geography chapter one, Introduction to Geography of ethiopia'),
(36, '9129-css.pptx', 'pptx', 0, 'This material is chapter three of web development and its about css');

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

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `Fname`, `Lname`, `address`, `DOB`, `email`, `phone`, `loginNo`, `depID`) VALUES
(2, 'nuredin', 'ibrahim', 'addis ababa', '0000-00-00', 'nuredin@gmail.com', '09901230991', 1, 1),
(3, 'Peter', 'Parker', 'addis ababa', '2022-01-20', 'aaaaa@gmail.com', '09102349123', 12, 1),
(4, 'Edelawit', 'zeleke', 'addis ababa', '2022-01-20', 'aaaaa@gmail.com', '09102349123', 9, 1),
(5, 'kalkidan', 'haile', 'Addis ababa', '2022-01-19', 'kalkidan@gmail.com', '901239401', 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teach`
--

CREATE TABLE `teach` (
  `id` int(11) NOT NULL,
  `Courseid` int(11) NOT NULL,
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
-- Indexes for table `tblactivities`
--
ALTER TABLE `tblactivities`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `fkteachdepartment` (`Courseid`),
  ADD KEY `fkteachInstructor` (`instructorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `has`
--
ALTER TABLE `has`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblactivities`
--
ALTER TABLE `tblactivities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblonlinematerials`
--
ALTER TABLE `tblonlinematerials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teach`
--
ALTER TABLE `teach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD CONSTRAINT `fkStudLogn` FOREIGN KEY (`loginNo`) REFERENCES `tbllogin` (`id`),
  ADD CONSTRAINT `fkStudentDep` FOREIGN KEY (`depID`) REFERENCES `tbldepartment` (`id`);

--
-- Constraints for table `teach`
--
ALTER TABLE `teach`
  ADD CONSTRAINT `fktachsCourse` FOREIGN KEY (`Courseid`) REFERENCES `tblcourse` (`id`),
  ADD CONSTRAINT `fkteachInstructor` FOREIGN KEY (`instructorID`) REFERENCES `tblinstructor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
