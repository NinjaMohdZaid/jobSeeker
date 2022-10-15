-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 10:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobseeker`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `fullName` text NOT NULL,
  `phoneNumber` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`fullName`, `phoneNumber`, `email`, `password`, `type`) VALUES
('Mohd Zaid', '9759955376', 'nmzaid376@gmail.com', 'Zaid@123', 'user'),
('Samsung', '8445540486', 'samsung@info.in', 'Samsung@123', 'company'),
('Mohd Ashad Mehta', '9045437715', 'mohdasadjmi@gmail.com', 'Asad@123', 'user'),
('Mohd Arsh', '8859420817', 'arsh@gmail.com', 'Arsh@123', 'user'),
('Mohd Asad', '8532873569', 'masadmehta@gmail.com', 'Asad@123', 'user'),
('Wipro Limited', '9084748064', 'wipro@wipro.info', 'Wipro@123', 'company'),
('HCL Technologies', '9719936355', 'hcl@hcl.info', 'Hcl@123', 'company'),
('Samreen Akhtar', '9821917620', 'samreen@gmail.com', 'Samreen@123', 'user'),
('Rajesh Kumar', '7983692149', 'rajesh@gmail.com', 'Rajesh@123', 'user'),
('Noorain Ashraf', '9719527486', 'noorain@gmail.com', 'Noorain@123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `companybasicdetails`
--

CREATE TABLE `companybasicdetails` (
  `phoneNumber` text NOT NULL,
  `logoCompany` varchar(255) NOT NULL,
  `website` text NOT NULL,
  `headquarterAddress` text NOT NULL,
  `aboutCompany` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companybasicdetails`
--

INSERT INTO `companybasicdetails` (`phoneNumber`, `logoCompany`, `website`, `headquarterAddress`, `aboutCompany`) VALUES
('8445540486', 'img_3984139867.png', 'https://www.samsung.com/', 'Head Office Samsung India Electronics Pvt. Ltd. 20th to 24th Floor, Two Horizon Centre, Golf Course Road, Sector-43, DLF PH-V, Gurgaon, Haryana – 122202', 'Samsung is a South Korean company originally founded as a grocery trading store by Lee Byung-Chull in March 1938. ... Soon, the company also started exporting its products and became a major electronic manufacturer in its home country. In 1970, the company acquired a 50 per cent stake in Korea Semiconductor.'),
('9084748064', 'img_5811438839.png', 'https://www.wipro.com', 'Sarjapur Road, Bengaluru, Karnataka, India', 'Wipro Limited is an Indian multinational corporation that provides information technology, consulting and business process services.The Fortune India 500 ranks it the 29th largest Indian company by total revenue. It is also ranked the 9th largest employer in India with nearly 195,000 employees.'),
('9719936355', 'img_7549700684.jpg', 'https://www.hcltech.com', 'HCL Technologies Ltd. Technology Hub, SEZ. Plot No. 3A, Sector 126. Noida – 201304, India.', 'HCL Technologies is an Indian multinational information technology services and consulting company, headquartered in Noida, Uttar Pradesh, India. It is a subsidiary of HCL Enterprise. ');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `sno` int(11) NOT NULL,
  `phoneNumber` text NOT NULL,
  `numberOfVaccancies` bigint(20) NOT NULL,
  `typeOfJob` text NOT NULL,
  `jobTitle` text NOT NULL,
  `salary` text NOT NULL,
  `minimumEducationAndSkillsRequired` longtext NOT NULL,
  `jobDescription` longtext NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `pinCode` text NOT NULL,
  `nearbyPlace` text NOT NULL,
  `interviewDate` date NOT NULL,
  `interviewTime` time NOT NULL,
  `interviewMode` text NOT NULL,
  `jobTimeFrom` time NOT NULL,
  `jobTimeTo` time NOT NULL,
  `monday` text NOT NULL,
  `tuesday` text NOT NULL,
  `wednesday` text NOT NULL,
  `thursday` text NOT NULL,
  `friday` text NOT NULL,
  `saturday` text NOT NULL,
  `jobMode` text NOT NULL,
  `status` text NOT NULL,
  `state` text NOT NULL,
  `InRecycleBin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`sno`, `phoneNumber`, `numberOfVaccancies`, `typeOfJob`, `jobTitle`, `salary`, `minimumEducationAndSkillsRequired`, `jobDescription`, `country`, `city`, `pinCode`, `nearbyPlace`, `interviewDate`, `interviewTime`, `interviewMode`, `jobTimeFrom`, `jobTimeTo`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `jobMode`, `status`, `state`, `InRecycleBin`) VALUES
(1, '8445540486', 20, 'Web Developer', 'Web Developer Required', '20000', 'Diploma', 'Web developers required to design and build websites.  They are typically responsible for the appearance, of the site and technical aspects, such as site speed and how much traffic the site can handle. Web developers may also create site content that requires technical features.', 'India', 'New Delhi', '122202', '20th to 24th Floor, Two Horizon Centre, Golf Course Road, Sector-43, DLF PH-V', '2021-08-26', '10:30:00', 'offline', '10:00:00', '17:30:00', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'offline', 'step4Clear', 'Haryana', ''),
(5, '8445540486', 2, 'Programmer', 'Senior Software Engineer Required', '100000', 'Mtech(Computer Engineering)', 'Senior software engineer required which can work on java programming and comfortable in management.', 'India', 'Noida', '110096', 'Sector 63', '2021-08-28', '00:15:00', 'offline', '11:00:00', '05:30:00', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'offline', 'step4Clear', 'Uttar Pradesh', ''),
(6, '8445540486', 30, 'Front End Developer', 'Fron End Developer Required', '32400', 'Diploma In Computer Engineering', 'Front End developer required which can works on Bootstrap,css and javascript.', 'India', 'Gurugram', '122202', '	 20th to 24th Floor, Two Horizon Centre, Golf Cours...', '2021-08-05', '01:20:00', 'online', '00:20:00', '18:20:00', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'offline', 'step4Clear', 'Haryana', ''),
(7, '8445540486', 3, 'Computer Architect', 'Computer Architect Required', '500000', 'Mtech(Computer Engineering)', 'Computer Architect Required which can work on hardware tools and drivers of the company database.', 'India', 'Noida', '110045', 'Sector 63 ,Near Rama Hotel', '2021-07-13', '04:22:00', 'offline', '00:25:00', '17:28:00', 'yes', 'yes', 'yes', 'yes', '', 'yes', 'online', 'step4Clear', 'Uttar Pradesh', ''),
(8, '9084748064', 4, 'Backend Developer', 'PHP Backend Developer required', '45000', 'Diploma In Computer Engineering', 'Backend Developer which can works on php backend', 'India', 'New Delhi', '110026', 'Near Nehru Enclave', '2021-07-14', '00:30:00', 'offline', '00:30:00', '16:35:00', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'offline', 'step4Clear', 'Delhi', ''),
(9, '9084748064', 3, 'Architect', 'Computer Architect Required ', '20000', 'Btech ', 'Comnputer Architect required which can works on hardawre manipulation and repairing of disks ', 'India', 'Noida', '110024', 'Near sector 63', '2021-07-31', '00:35:00', 'offline', '13:40:00', '05:40:00', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'offline', 'step4Clear', 'Uttar Pradesh', ''),
(10, '9084748064', 30, 'Full Stack Developer ', 'Full Stack Developer Required', '32000', 'Diploma In Computer', 'Full Stack Developer required which can works on all web technologies like bootstrap,html5,css,nodeJs and reactJs', 'India', 'Gurugram', '110024', 'Near Jayanti Hospital', '2021-07-06', '02:40:00', 'online', '00:40:00', '18:40:00', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'offline', 'step4Clear', 'Haryan', ''),
(11, '9719936355', 1, 'Project Manager', 'Project Manager Required', '30000', 'Mtech', 'Project Manager Required to manage project .', 'India', 'Moradabad', '244301', 'Near MDA caloni', '2021-08-06', '15:10:00', 'offline', '10:10:00', '18:05:00', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'offline', 'step4Clear', 'Uttar Pradesh', ''),
(12, '9719936355', 50, 'Programmer', 'Senior Software Engineer Required', '40000', 'Mtech', 'Senior software engineer required to develop java application and can manage project.', 'India', 'Noida', '112033', 'Near Sector 63 metro', '0000-00-00', '00:00:00', '', '00:00:00', '00:00:00', '', '', '', '', '', '', '', 'step2Clear', 'Uttar Pradesh', '');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `sno` bigint(20) NOT NULL,
  `phoneNumber` text NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`sno`, `phoneNumber`, `rate`) VALUES
(1, '9759955376', 4),
(1, '9045437715', 4),
(1, '8859420817', 3),
(1, '8532873569', 3),
(5, '9759955376', 3),
(8, '9759955376', 4),
(9, '9759955376', 2),
(10, '9759955376', 2),
(11, '9759955376', 1),
(12, '9759955376', 3),
(5, '9045437715', 3),
(6, '9045437715', 1),
(11, '9045437715', 2),
(12, '9045437715', 4),
(8, '9045437715', 3),
(9, '9045437715', 3),
(10, '9045437715', 3),
(11, '8859420817', 3),
(12, '8859420817', 3),
(8, '8859420817', 3),
(9, '8859420817', 3),
(10, '8859420817', 2),
(5, '8859420817', 3),
(6, '8859420817', 3),
(7, '8859420817', 4),
(5, '8532873569', 3),
(6, '8532873569', 2),
(7, '8532873569', 3),
(8, '8532873569', 3),
(9, '8532873569', 3),
(10, '8532873569', 2),
(8, '9821917620', 3),
(10, '9821917620', 4),
(9, '9821917620', 2),
(1, '9821917620', 2),
(5, '9821917620', 4),
(6, '9821917620', 1),
(7, '9821917620', 5),
(11, '9821917620', 1),
(12, '9821917620', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userbasicdetails`
--

CREATE TABLE `userbasicdetails` (
  `sno` int(11) NOT NULL,
  `phoneNumber` text NOT NULL,
  `userImage` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `dateOfBirth` date NOT NULL,
  `age` int(11) NOT NULL,
  `city` text NOT NULL,
  `educationInstitute` text NOT NULL,
  `digreeOrCertification` text NOT NULL,
  `fieldOfStudy` text NOT NULL,
  `instituteLocation` text NOT NULL,
  `percentage` text NOT NULL,
  `passingYear` text NOT NULL,
  `experienceYears` text NOT NULL,
  `experiencePlace` text NOT NULL,
  `skills` text NOT NULL,
  `strengths` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userbasicdetails`
--

INSERT INTO `userbasicdetails` (`sno`, `phoneNumber`, `userImage`, `gender`, `dateOfBirth`, `age`, `city`, `educationInstitute`, `digreeOrCertification`, `fieldOfStudy`, `instituteLocation`, `percentage`, `passingYear`, `experienceYears`, `experiencePlace`, `skills`, `strengths`) VALUES
(1, '9759955376', 'img_8156223637.jpg', 'Male', '2000-04-28', 21, 'Moradabad', 'Jamia Millia Islamia', 'Diploma', 'Computer Engineering', 'New Delhi', '84', '2021', '', '', 'Full Stack Developer', 'Leadership'),
(2, '9045437715', 'img_616347978.jpg', 'Male', '2000-07-27', 21, 'Bulandshehar', 'Jamia Millia Islamia', 'Diploma', 'Computer Engineering', 'New Delhi', '80', '2021', '', '', 'Web Developer', 'Management'),
(3, '8859420817', 'img_9818083743.jpg', 'Male', '2000-02-28', 21, 'Moradabad', 'Jamia Millia Islamia', 'Diploma', 'Computer Engineering', 'New Delhi', '72', '2020', '', '', 'Software Developer', 'Hard Working'),
(4, '8532873569', 'img_4419297550.jpg', 'Male', '1998-09-27', 20, 'Bulandsehar', 'Jamia Millia Islamia', 'Diploma', 'Computer Engineering', 'New Delhi', '83', '2021', '', '', 'Developer of backend', 'Management'),
(5, '9821917620', 'img_4657577809.jpeg', 'Female', '2000-06-28', 21, 'New Delhi', 'Jamia Millia Islamia', 'High School', 'Computer Engineering', 'New Delhi', '88', '2021', '', '', 'Full stack developer', 'Management'),
(6, '7983692149', 'img_566619725.jpg', 'Male', '1995-06-28', 25, 'Ramnagar', 'Uttrakhand University', 'Diploma', 'Computer Engineering', 'Ramnagar', '67', '2020', '1', 'HCL', 'Software Developer', 'Managemet,Leadership'),
(7, '9719527486', 'img_2165724938.jpg', 'Male', '2000-07-07', 21, 'Moradabad', 'Moradabad Polytechnic Institute', 'Diploma', 'Computer Engineering', 'Moradabad', '77', '2020', '', '', 'Software Developer', 'Leadership');

-- --------------------------------------------------------

--
-- Table structure for table `usersappliedforjobs`
--

CREATE TABLE `usersappliedforjobs` (
  `sno` bigint(20) NOT NULL,
  `phoneNumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersappliedforjobs`
--

INSERT INTO `usersappliedforjobs` (`sno`, `phoneNumber`) VALUES
(1, '9759955376'),
(5, '9759955376'),
(8, '9821917620');

-- --------------------------------------------------------

--
-- Table structure for table `usersavedjob`
--

CREATE TABLE `usersavedjob` (
  `sno` bigint(20) NOT NULL,
  `phoneNumber` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersavedjob`
--

INSERT INTO `usersavedjob` (`sno`, `phoneNumber`) VALUES
(8, '9759955376'),
(8, '9045437715'),
(11, '8859420817'),
(6, '8859420817'),
(9, '8532873569'),
(8, '9821917620'),
(12, '9821917620');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `userbasicdetails`
--
ALTER TABLE `userbasicdetails`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `userbasicdetails`
--
ALTER TABLE `userbasicdetails`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
