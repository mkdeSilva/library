-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2016 at 10:42 AM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `website` varchar(255) NOT NULL,
  `publisher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorID`, `authorName`, `website`, `publisher`) VALUES
(1, 'Alex Dally', 'aDally@gmail.com', 1);

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
  `imageLink` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `description`, `bookName`, `bookAuthor`, `bookPrice`, `bookGenre`, `pubDate`, `stock`, `imageLink`) VALUES
(1, 'A young man is destined to be a dragon rider', 'Eragon', 'Christopher Paolini', 50, 'Fantasy', '2001-11-01', 0, 'pictures/eragon.jpg'),
(2, 'A demigod that must learn about his destiny', 'Percy Jackson: The Lightning Thief', 'Rick Riordan', 250, 'Fantasy', '2010-11-22', 3, 'http://vignette3.wikia.nocookie.net/olympians/images/1/15/LightningThief2014.jpg/revision/latest?cb=20140218183347'),
(3, 'Percy Jackson goes on another journey', 'Percy Jackson: The Sea of Monsters', 'Rick Riordan', 499, 'Fantasy', '2006-05-01', 2, 'https://images-na.ssl-images-amazon.com/images/I/51bmcaOTUaL._SY344_BO1,204,203,200_.jpg'),
(4, 'Eragon must join the Varden and Ronan must journey south', 'Eldest', 'Christopher Paolini', 400, 'Fantasy', '2005-08-23', 5, 'https://upload.wikimedia.org/wikipedia/en/e/e0/Eldest_book_cover.png'),
(5, 'Eragon must visit the elves and forge his true sword', 'Brisingr', 'Christopher Paolini', 400, 'Fantasy', '2008-09-02', 5, 'https://upload.wikimedia.org/wikipedia/en/7/70/Brisingr_book_cover.png'),
(6, 'Galbatorix is preparing and Eragon must face him', 'Inheritance', 'Christopher Paolini', 500, 'Fantasy', '2011-11-08', 6, 'https://upload.wikimedia.org/wikipedia/en/2/2b/Inheritance2011.JPG'),
(9, 'Who is the person that opens the chamber of secrets?', 'Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 400, 'Fantasy', '1998-07-02', 7, 'https://upload.wikimedia.org/wikipedia/en/a/a7/Harry_Potter_and_the_Chamber_of_Secrets_(US_cover).jpg'),
(10, 'The story of Sonea, a young girl from the slums, as she discovers her magical potential', 'The Magician\'s Guild', 'Trudi Canavan', 200, 'Fantasy', '2001-09-02', 2, 'https://upload.wikimedia.org/wikipedia/en/thumb/e/e7/TrudiCanavan_TheMagiciansGuild.jpg/220px-TrudiCanavan_TheMagiciansGuild.jpg'),
(13, 'The story follows Harry Potter, a wizard in his fourth year at Hogwarts School of Witchcraft and Wizardry and the mystery surrounding the entry of Harry\'s name into the Triwizard Tournament, in which he is forced to compete.', 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 500, 'Fantasy', '2008-09-12', 5, 'https://upload.wikimedia.org/wikipedia/en/c/c7/Harry_Potter_and_the_Goblet_of_Fire.jpg'),
(14, 'The story follows Harry Potter, a wizard in his fourth year at Hogwarts School of Witchcraft and Wizardry and the mystery surrounding the entry of Harry\'s name into the Triwizard Tournament, in which he is forced to compete.', 'Harry Potter and the Goblet of Fire', 'J.K. Rowling', 500, 'Fantasy', '2008-09-12', 5, 'https://upload.wikimedia.org/wikipedia/en/c/c7/Harry_Potter_and_the_Goblet_of_Fire.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookCopies`
--

CREATE TABLE `bookCopies` (
  `bookCopyID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `available` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookCopies`
--

INSERT INTO `bookCopies` (`bookCopyID`, `bookID`, `available`) VALUES
(1, 1, 0),
(43, 1, 0),
(84, 2, 1),
(85, 2, 1),
(86, 2, 1),
(87, 3, 1),
(88, 3, 1),
(89, 4, 1),
(90, 4, 1),
(91, 4, 1),
(92, 4, 1),
(93, 4, 1),
(94, 5, 1),
(95, 5, 1),
(96, 5, 1),
(97, 5, 1),
(98, 5, 1),
(99, 6, 1),
(100, 6, 1),
(101, 6, 1),
(102, 6, 1),
(103, 6, 1),
(104, 6, 1),
(105, 9, 1),
(106, 9, 1),
(107, 9, 1),
(108, 9, 1),
(109, 9, 1),
(110, 9, 1),
(111, 9, 1),
(112, 10, 1),
(113, 10, 1),
(114, 13, 1),
(115, 13, 1),
(116, 13, 1),
(117, 13, 1),
(118, 13, 1),
(119, 14, 1),
(120, 14, 1),
(121, 14, 1),
(122, 14, 1),
(123, 14, 1);

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
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `pubID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`pubID`, `name`, `location`) VALUES
(2, 'Scholastic', 'United States of America');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE `purchaseorders` (
  `orderID` int(11) NOT NULL,
  `pricePerBook` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `bookISBN` int(11) NOT NULL,
  `publisher` int(11) NOT NULL,
  `staffMember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(3, 'Ra\'s', 'Al Ghul', 'demon', 'lazarus', 'Male', '2');

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
(1, 'Mihindu', 'de Silva', 'Art', 'mihindu@gmail.com', 'mdesilva', '123', 'male', 19, 0, 0),
(3, 'Michael', 'Dawson', 'Dragons', 'mDawson@gmail.com', 'mDawson', 'ryu', 'Male', 19, 0, 0),
(13, 'Alex', 'Dally', '', 'aDally@gmail.com', 'aDally', 'alex', 'Male', 20, 0, 0),
(14, 'Barry', 'Allen', '', 'flash@gmail.com', 'flash', 'reverse', 'Male', 201, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorID`),
  ADD KEY `publisher` (`publisher`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `bookCopies`
--
ALTER TABLE `bookCopies`
  ADD PRIMARY KEY (`bookCopyID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobID`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`pubID`);

--
-- Indexes for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `bookISBN` (`bookISBN`),
  ADD KEY `publisher` (`publisher`),
  ADD KEY `staffMember` (`staffMember`);

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
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `bookCopies`
--
ALTER TABLE `bookCopies`
  MODIFY `bookCopyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `pubID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rentdetails`
--
ALTER TABLE `rentdetails`
  MODIFY `rentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD CONSTRAINT `order_book_fk` FOREIGN KEY (`bookISBN`) REFERENCES `book` (`bookID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `order_publisher_fk` FOREIGN KEY (`publisher`) REFERENCES `publishers` (`pubID`),
  ADD CONSTRAINT `order_staff` FOREIGN KEY (`staffMember`) REFERENCES `staff` (`staffID`);

--
-- Constraints for table `rentdetails`
--
ALTER TABLE `rentdetails`
  ADD CONSTRAINT `rent_book_fk` FOREIGN KEY (`bookCopyID`) REFERENCES `book` (`bookID`),
  ADD CONSTRAINT `rent_student_fk` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);
