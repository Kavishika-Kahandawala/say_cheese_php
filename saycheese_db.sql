-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 27, 2022 at 10:11 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saycheese_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carddetails`
--

DROP TABLE IF EXISTS `carddetails`;
CREATE TABLE IF NOT EXISTS `carddetails` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cardNum` int(11) NOT NULL,
  `noc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expMonth` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expYear` int(4) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productID` int(11) NOT NULL,
  `date` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payements`
--

DROP TABLE IF EXISTS `payements`;
CREATE TABLE IF NOT EXISTS `payements` (
  `payID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `products` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cdDigits` int(4) NOT NULL,
  PRIMARY KEY (`payID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payements`
--

INSERT INTO `payements` (`payID`, `username`, `amount`, `products`, `date`, `cdDigits`) VALUES
(1, 'test', 12, '', '', 1234),
(2, 'test', 12, '', '', 1234),
(3, 'test', 700, '', '', 1234),
(4, 'test', 0, '', '', 1234),
(5, 'test', 0, '', '', 1234),
(6, 'test', 700, '', '', 1234),
(7, 'test', 700, '', '', 1234),
(8, 'test', 700, '', '', 1234),
(9, 'test', 700, '', '', 2648),
(10, 'test', 700, '', '', 8999),
(11, 'test', 700, '56,8,', '2022/06/17', 8989),
(12, 'test', 700, '56,8,', '2022/06/17', 1234),
(13, 'test', 200, '56,', '2022/06/17', 1212),
(14, 'test', 200, '56,', '2022/06/19', 6785),
(15, 'test', 200, '56,', '2022/06/19', 8989),
(16, 'test', 200, '56,', '2022/06/19', 4545),
(17, 'test', 200, '56,', '2022/06/19', 1242),
(18, 'test', 200, '56,', '2022/06/19', 0),
(19, 'test', 200, '56,', '2022/06/19', 2323),
(20, 'Admin', 0, '', '2022/06/19', 7548),
(21, 'test', 300, '56,1,', '2022/06/20', 8745);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgPath` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `username`, `title`, `category`, `description`, `imgPath`, `published`, `price`, `date`) VALUES
(1, 'a', 'a', '', 'aaa', 'Products/giorgio-trovato-p0OlRAAYXLY-unsplash.jpg', 1, 100, ''),
(2, 'b', 'b', 'b', 'b', 'b', 1, 0, ''),
(8, 'test', 'title', 'Games', 'Description', 'Products/sobhan-joodi-SM9Ic-c1ZDQ-unsplash.jpg', 1, 500, ''),
(7, 'test', 'dfgfjj', 'Books', 'ttttttttt', 'Products/', 1, 0, ''),
(14, 'test', 'tt', 'Movies', 'tt', 'Products/joren-aranas-nmuyqgSOpEE-unsplash.jpg', 1, 0, ''),
(15, 'test', 'tt', 'Movies', 'tt', 'Products/joren-aranas-nmuyqgSOpEE-unsplash.jpg', 1, 0, ''),
(13, 'test', 'ab cd', 'Movies', '11', 'Products/stock-photo-full-body-young-smiling-happy-woman-of-asian-ethnicity-s-in-pink-sweater-stand-near-big-mobile-2131231295.jpg', 1, 0, ''),
(12, 'test', '11', 'Movies', '11', 'Products/stock-photo-full-body-young-smiling-happy-woman-of-asian-ethnicity-s-in-pink-sweater-stand-near-big-mobile-2131231295.jpg', 1, 0, ''),
(58, 'test', 'dasd', 'Books', 'ada', 'Products/helen-ast-wXCQCVpsRQ0-unsplash.jpg', 1, 120, ''),
(56, 'test', 'pricetitle', 'Movies', 'priceDec', 'Products/1_hero_image-bg.jpg', 1, 200, '2022/06/18'),
(57, 'test', 'hh', 'Books', 'hh', 'Products/stock-photo-full-body-young-smiling-happy-woman-of-asian-ethnicity-s-in-pink-sweater-stand-near-big-mobile-2131231295.jpg', 1, 120, ''),
(31, 'test', 'tt', 'BooksGamesMovies', 'tt', 'Products/stock-photo-full-body-young-smiling-happy-woman-of-asian-ethnicity-s-in-pink-sweater-stand-near-big-mobile-2131231295.jpg', 1, 0, ''),
(53, 'test', 'hh', 'Books.Games.Movies.', 'hh', 'Products/jassir-jonis-xQ2a8aAPbYc-unsplash.jpg', 1, 0, ''),
(52, 'test', 'hh', 'Books.Games.', 'hh', 'Products/', 1, 0, ''),
(51, 'test', 'ds', 'Books.Movies.', 'sd', 'Products/', 1, 0, ''),
(50, 'test', 'gh', 'Books.Movies.', 'ghg', 'Products/luna-hu-bUpFYpJgz5U-unsplash.jpg', 1, 0, ''),
(54, 'test', 'dd', 'Books', 'dd', 'Products/stock-photo-full-body-young-smiling-happy-woman-of-asian-ethnicity-s-in-pink-sweater-stand-near-big-mobile-2131231295.jpg', 0, 45, ''),
(55, 'test', 'fgdfg', 'Books', 'dg', 'Products/stock-photo-full-body-young-smiling-happy-woman-of-asian-ethnicity-s-in-pink-sweater-stand-near-big-mobile-2131231295.jpg', 1, 200, ''),
(59, 'test', '5656', 'Games', '5656', 'Products/stock-photo-full-body-young-smiling-happy-woman-of-asian-ethnicity-s-in-pink-sweater-stand-near-big-mobile-2131231295.jpg', 1, 251, '2022/06/18'),
(60, 'test', '5656', 'Games', '5656', 'Products/stock-photo-full-body-young-smiling-happy-woman-of-asian-ethnicity-s-in-pink-sweater-stand-near-big-mobile-2131231295.jpg', 1, 251, '2022/06/18'),
(63, 'Admin', 'check  6 20', 'Books,Movies,', 'check  6 20', 'Products/ezgif.com-gif-maker.webp', 1, 250, '2022/06/20'),
(64, 'Admin', 'animals', 'Nature,Animals,', 'animals', 'Products/ezgif.com-gif-maker.webp', 1, 250, '2022/06/20');

-- --------------------------------------------------------

--
-- Table structure for table `profit`
--

DROP TABLE IF EXISTS `profit`;
CREATE TABLE IF NOT EXISTS `profit` (
  `profID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`profID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profit`
--

INSERT INTO `profit` (`profID`, `productID`, `amount`, `date`) VALUES
(1, 56, 80, '2022/06/19'),
(2, 56, 80, '2022/06/19'),
(3, 56, 80, '2022/06/19'),
(4, 56, 80, '2022/06/19'),
(5, 1, 40, '2022/06/19'),
(6, 1, 40, '2022/06/19'),
(7, 1, 40, '2022/06/19'),
(8, 1, 40, '2022/06/19'),
(9, 56, 80, '2022/06/20'),
(10, 1, 40, '2022/06/20'),
(11, 1, 40, '2022/06/27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstName` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `firstName`, `lastName`, `email`, `password`, `level`) VALUES
('admin', 'john', 'williams', 'admin@admin.com', '123456', 1),
('sad', 'adada', 'fsddf', 'asdasd@sf.gf', '1234', 0),
('fefrwef', 'sfefesfe', 'sdfe', 'wefrw@DSAD.HJH', '1234', 0),
('fefrwefd', '12', 'sdfe', 'wefrwa@DSAD.HJH', '1234', 0),
('testsdsa', 'sfdfs', 'sfdfsd', 'fsdf', 'dfgdfg', 0),
('dgsdg', '232sfsd', 'dgf32w', 'dgdg', 'dgdgf', 0),
('test', 'test', 'test', 'asdf@sd', '123456', 0),
('', '', '', '', '', 0),
('kj', 'eds', 'ds', 'ada@sdf.cv', '', 0),
('ssssssss', 'dfdsf', 'fdf', 'dffsd@ds.ds', '1234', 0),
('adad', 'weaeaw', 'adsd', 'adad@fg.hjh', 'ada', 0),
('sfsfsfs', 'ehfksdf', 'sdffsfs', 'sfsf@sfd.sdfs', '1234', 0),
('gdgdg', 'gfsdgd', 'fgdgd', 'dgdg@sdfsd.df', 'sfsf', 0),
('dgdg', 'sdgfdg', 'dfgdfg', 'dgdg@dsd.sd', 'sgdsgfs', 0),
('sfsfsf', 'fsdfsd', 'fsfsf', 'sffsfsds@dsd.dfdf', 'fsdfsdf', 0),
('sfsf', 'asfasf', 'sfsf', 'sfsf', 'dfgd', 0),
('1234', '123123', '1231', 'shdg@dfd.df', '1234', 0),
('dfgfd', 'dfdfd', 'f', 'gdg', 'dgd', 0),
('d', 'd', 'sd', 'd', 'd', 0),
('sdsd', 'd', 'sdsdsd', 'sdsd', 'sds', 0),
('member', 'member', 'member', 'member@a', '123456', 0),
('ghgh', 'ghh', 'ghg', 'jkhjk@sdfs.f', '1234884865', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usercart`
--

DROP TABLE IF EXISTS `usercart`;
CREATE TABLE IF NOT EXISTS `usercart` (
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productID` int(11) NOT NULL,
  PRIMARY KEY (`cartID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usercart`
--

INSERT INTO `usercart` (`cartID`, `username`, `productID`) VALUES
(1, '77', 66),
(9, '88', 66),
(8, '8', 66),
(33, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userearnings`
--

DROP TABLE IF EXISTS `userearnings`;
CREATE TABLE IF NOT EXISTS `userearnings` (
  `ueID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `date` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ueID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userearnings`
--

INSERT INTO `userearnings` (`ueID`, `username`, `productID`, `Amount`, `date`) VALUES
(1, 'test', 56, 200, '2022/06/19'),
(2, 'test', 56, 120, '2022/06/19'),
(3, 'test', 56, 120, '2022/06/19'),
(4, 'test', 56, 120, '2022/06/19'),
(5, 'test', 56, 120, '2022/06/19'),
(6, 'test', 56, 120, '2022/06/19'),
(7, '', 1, 60, '2022/06/19'),
(8, '', 1, 60, '2022/06/19'),
(9, 'a', 1, 60, '2022/06/19'),
(10, 'a', 1, 60, '2022/06/19'),
(11, 'a', 1, 60, '2022/06/19'),
(12, 'a', 1, 60, '2022/06/19'),
(13, 'test', 56, 120, '2022/06/20'),
(14, 'a', 1, 60, '2022/06/20'),
(15, 'a', 1, 60, '2022/06/27');

-- --------------------------------------------------------

--
-- Table structure for table `userwishlist`
--

DROP TABLE IF EXISTS `userwishlist`;
CREATE TABLE IF NOT EXISTS `userwishlist` (
  `wishID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productID` int(11) NOT NULL,
  PRIMARY KEY (`wishID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userwishlist`
--

INSERT INTO `userwishlist` (`wishID`, `username`, `productID`) VALUES
(9, 'test', 8);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
