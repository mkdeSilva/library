-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2016 at 09:35 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorID` int(11) NOT NULL,
  `authorName` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorID`, `authorName`, `website`) VALUES
(1, 'Alex Dally', 'aDally@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `bookAuthor` varchar(255) NOT NULL,
  `bookPrice` float NOT NULL,
  `bookGenre` varchar(45) NOT NULL,
  `pubDate` date NOT NULL,
  `stock` int(11) NOT NULL,
  `imageLink` varchar(255) NOT NULL,
  `authorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `description`, `bookName`, `bookAuthor`, `bookPrice`, `bookGenre`, `pubDate`, `stock`, `imageLink`, `authorID`) VALUES
(1, 'A young man is destined to be a dragon rider', 'Eragon', 'Christopher Paolini', 50, 'Fantasy', '2001-11-01', 2, 'pictures/eragon.jpg', 0),
(2, 'A demigod that must learn about his destiny', 'Percy Jackson: The Lightning Thief', 'Rick Riordan', 250, 'Fantasy', '2010-11-22', 2, 'http://vignette3.wikia.nocookie.net/olympians/images/1/15/LightningThief2014.jpg/revision/latest?cb=20140218183347', 0),
(3, 'Percy Jackson goes on another journey', 'Percy Jackson: The Sea of Monsters', 'Rick Riordan', 499, 'Fantasy', '2006-05-01', 2, 'https://images-na.ssl-images-amazon.com/images/I/51bmcaOTUaL._SY344_BO1,204,203,200_.jpg', 0),
(4, 'Eragon must join the Varden and Ronan must journey south', 'Eldest', 'Christopher Paolini', 400, 'Fantasy', '2005-08-23', 4, 'https://upload.wikimedia.org/wikipedia/en/e/e0/Eldest_book_cover.png', 0),
(5, 'Eragon must visit the elves and forge his true sword', 'Brisingr', 'Christopher Paolini', 400, 'Fantasy', '2008-09-02', 4, 'https://upload.wikimedia.org/wikipedia/en/7/70/Brisingr_book_cover.png', 0),
(6, 'Galbatorix is preparing and Eragon must face him', 'Inheritance', 'Christopher Paolini', 500, 'Fantasy', '2011-11-08', 4, 'https://upload.wikimedia.org/wikipedia/en/2/2b/Inheritance2011.JPG', 0),
(9, 'Who is the person that opens the chamber of secrets?', 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 400, 'Fantasy', '1998-07-02', 6, 'https://upload.wikimedia.org/wikipedia/en/a/a7/Harry_Potter_and_the_Chamber_of_Secrets_(US_cover).jpg', 0),
(10, 'The story of Sonea, a young girl from the slums, as she discovers her magical potential', 'The Magician''s Guild', 'Trudi Canavan', 200, 'Fantasy', '2001-09-02', 1, 'https://upload.wikimedia.org/wikipedia/en/thumb/e/e7/TrudiCanavan_TheMagiciansGuild.jpg/220px-TrudiCanavan_TheMagiciansGuild.jpg', 0),
(13, 'The story follows Harry Potter, a wizard in his fourth year at Hogwarts School of Witchcraft and Wizardry and the mystery surrounding the entry of Harry''s name into the Triwizard Tournament, in which he is forced to compete.', 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 500, 'Fantasy', '2008-09-12', 5, 'https://upload.wikimedia.org/wikipedia/en/c/c7/Harry_Potter_and_the_Goblet_of_Fire.jpg', 0);

--
-- Triggers `book`
--
DELIMITER $$
CREATE TRIGGER `Add Book` AFTER INSERT ON `book` FOR EACH ROW BEGIN
declare x int ;
IF (new.stock>0) THEN
SET x=1;
WHILE x<=new.stock DO
INSERT INTO bookCopies(bookID) VALUES(NEW.bookID);
SET x=x+1;
END WHILE;
END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete book` BEFORE DELETE ON `book` FOR EACH ROW BEGIN

DELETE FROM bookcopies WHERE bookcopies.bookID=old.bookID;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bookcopies`
--

CREATE TABLE `bookcopies` (
  `bookCopyID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `available` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookcopies`
--

INSERT INTO `bookcopies` (`bookCopyID`, `bookID`, `available`) VALUES
(41, 1, 0),
(103, 9, 0),
(129, 5, 0),
(153, 2, 0),
(209, 10, 0),
(222, 4, 0),
(247, 1, 1),
(248, 1, 1),
(249, 2, 1),
(250, 2, 1),
(251, 3, 1),
(252, 3, 1),
(253, 4, 1),
(254, 4, 1),
(255, 4, 1),
(256, 4, 1),
(257, 5, 1),
(258, 5, 1),
(259, 5, 1),
(260, 5, 1),
(261, 6, 1),
(262, 6, 1),
(263, 6, 1),
(264, 6, 1),
(265, 9, 1),
(266, 9, 1),
(267, 9, 1),
(268, 9, 1),
(269, 9, 1),
(270, 9, 1),
(271, 10, 1),
(272, 13, 1),
(273, 13, 1),
(274, 13, 1),
(275, 13, 1),
(276, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobID` int(11) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `jobDescription` varchar(255) NOT NULL,
  `jobSalary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobID`, `jobTitle`, `jobDescription`, `jobSalary`) VALUES
(1, 'Director', 'Main leadership in the library, takes care of budget and policies.', 60000),
(2, 'Manager', 'Head of a specific department', 20000),
(3, 'Librarian', 'Helps around the library regarding all aspects', 40000),
(4, 'Assistant', 'Assists the various heads of departments, librarians', 10000),
(5, 'Pages', 'Stock books and update them, the day to day small tasks ', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `rentdetails`
--

CREATE TABLE `rentdetails` (
  `rentID` int(11) NOT NULL,
  `dateOfIssue` date NOT NULL,
  `dateOfReturn` date NOT NULL,
  `deposit` float NOT NULL,
  `bookCopyID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentdetails`
--

INSERT INTO `rentdetails` (`rentID`, `dateOfIssue`, `dateOfReturn`, `deposit`, `bookCopyID`, `studentID`, `active`) VALUES
(12, '2016-11-29', '2016-12-06', 5, 41, 14, 1),
(13, '2016-11-29', '2016-12-06', 40, 103, 14, 1),
(14, '2016-11-29', '2016-12-06', 40, 129, 1, 1),
(15, '2016-11-29', '2016-12-06', 25, 153, 1, 1),
(16, '2016-11-29', '2016-12-06', 20, 209, 1, 1),
(17, '2016-11-29', '2016-12-06', 40, 222, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `jobID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `fName`, `lName`, `username`, `passwd`, `gender`, `jobID`) VALUES
(1, 'Rebecca', 'Liverdale', 'rLiverdale', '123', 'female', '2'),
(2, 'Ben', 'Affleck', 'batman', 'joker', 'Male', '1'),
(3, 'Ra''s', 'Al Ghul', 'demon', 'lazarus', 'Male', '2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `fName` varchar(45) NOT NULL,
  `lName` varchar(45) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `anyRent` tinyint(1) NOT NULL,
  `overduePay` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `fName`, `lName`, `faculty`, `email`, `username`, `passwd`, `gender`, `age`, `anyRent`, `overduePay`) VALUES
(1, 'Mihindu', 'de Silva', 'Computer Engineering', 'mihindu@gmail.com', 'mdesilva', '123', 'male', 19, 1, 0),
(3, 'Michael', 'Dawson', 'Dragons', 'mDawson@gmail.com', 'mDawson', 'ryu', 'Male', 19, 0, 0),
(13, 'Alex', 'Dally', 'Art', 'aDally@gmail.com', 'aDally', 'alex', 'Male', 20, 1, 0),
(14, 'Barry', 'Allen', 'Speed Force', 'flash@gmail.com', 'flash', 'reverse', 'Male', 201, 1, 0),
(15, 'Oliver', 'Queen', 'Caves', 'arrowCave@arrow.com', 'arrow', 'green', 'Male', 42, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `bookcopies`
--
ALTER TABLE `bookcopies`
  ADD PRIMARY KEY (`bookCopyID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobID`);

--
-- Indexes for table `rentdetails`
--
ALTER TABLE `rentdetails`
  ADD PRIMARY KEY (`rentID`),
  ADD KEY `bookID` (`bookCopyID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD KEY `jobID` (`jobID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `bookcopies`
--
ALTER TABLE `bookcopies`
  MODIFY `bookCopyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rentdetails`
--
ALTER TABLE `rentdetails`
  MODIFY `rentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
