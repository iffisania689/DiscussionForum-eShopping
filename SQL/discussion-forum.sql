-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2021 at 03:21 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discussion-forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

DROP TABLE IF EXISTS `forums`;
CREATE TABLE IF NOT EXISTS `forums` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`forum_id`, `name`, `description`) VALUES
(1, 'PHP', 'General Discussion of different programming topics'),
(2, 'Java Programming', 'Discussion about Programming and concept'),
(3, 'Object Oriented Programming', 'Discussion about object oriented approach, its features and articles.');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE IF NOT EXISTS `forum_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `post_text` text,
  `post_create_time` datetime DEFAULT NULL,
  `post_owner` varchar(150) DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `topic_id`, `post_text`, `post_create_time`, `post_owner`, `forum_id`) VALUES
(30, 17, 'Looping is used in programming to execute a statement or a block of statement repeatedly. There are three types of loops in Java:\r\n1) For Loops\r\nFor loops are used in java to execute statements repeatedly for a given number of times. For loops are used when number of times to execute the statements is known to programmer.\r\n2) While Loops\r\nWhile loop is used when certain statements need to be executed repeatedly until a condition is fulfilled. In while loops, condition is checked first before execution of statements.\r\n3) Do While Loops\r\nDo While Loop is same as While loop with only difference that condition is checked after execution of block of statements. Hence in case of do while loop, statements are executed at least once.\r\n', '2021-11-16 01:38:44', 'henryQuinlal@yahoo.com', 2),
(29, 16, 'In Java, access specifiers are the keywords used before a class name which defines the access scope. The types of access specifiers for classes are:\r\n1. Public : Class,Method,Field is accessible from anywhere.\r\n2. Protected:Method,Field can be accessed from the same class to which they belong or from the sub-classes,and from the class of same package,but not from outside.\r\n3. Default: Method,Field,class can be accessed only from the same package and not from outside of it’s native package.\r\n4. Private: Method,Field can be accessed from the same class to which they belong.\r\n', '2021-11-16 01:37:36', 'john.doe@yahoo.com', 2),
(27, 14, 'We use the operator ‘==’ to test if two objects are instanced from the same class and have same attributes and equal values. We can also test if two objects are referring to the same instance of the same class by the use of the identity operator ‘===’.', '2021-11-16 01:35:05', 'henryQuinlal@yahoo.com', 1),
(28, 15, 'It might be surprising, but there is no reverse() utility method in the String class. But, it’s a very simple task. We can create a character array from the string and then iterate it from the end to start. We can append the characters to a string builder and finally return the reversed string.\r\npublic class StringPrograms {\r\n	public static void main(String[] args) {\r\n		String str = \"123\";\r\n		System.out.println(reverse(str));\r\n	}\r\n	public static String reverse(String in) {\r\n		if (in == null)\r\n			throw new IllegalArgumentException(\"Null is not valid input\");\r\n		StringBuilder out = new StringBuilder();\r\n		char[] chars = in.toCharArray();\r\n		for (int i = chars.length - 1; i >= 0; i--)\r\n			out.append(chars[i]);\r\n		return out.toString();\r\n	}\r\n}\r\n', '2021-11-16 01:36:17', 'iffat@yahoo.com', 2),
(26, 13, 'There are 3 types of Arrays in PHP:\r\n1.	Indexed Array – An array with a numeric index is known as the indexed array. Values are stored and accessed in linear fashion.\r\n2.	Associative Array – An array with strings as index is known as the associative array. This stores element values in association with key values rather than in a strict linear index order.\r\n3.	Multidimensional Array – An array containing one or more arrays is known as multidimensional array. The values are accessed using multiple indices.\r\n', '2021-11-16 01:33:48', 'iffat@yahoo.com', 1),
(25, 12, 'A session is a global variable stored on the server. Each session is assigned a unique id which is used to retrieve stored values. Sessions have the capacity to store relatively large data compared to cookies. The session values are automatically deleted when the browser is closed.\r\nFollowing example shows how to create a cookie in PHP-\r\n<?php \r\n$cookie_value = \"edureka\"; setcookie(\"edureka\", $cookie_value, time()+3600, \"/your_usename/\", \"edureka.co\", 1, 1); if (isset($_COOKIE[\'cookie\'])) echo $_COOKIE[\"edureka\"]; \r\n?>>\r\n\r\nFollowing example shows how to start a session in PHP-\r\n<?php \r\nsession_start(); if( isset( $_SESSION[\'counter\'] ) ) { $_SESSION[\'counter\'] += 1; }else { $_SESSION[\'counter\'] = 1; } $msg = \"You have visited this page\". $_SESSION[\'counter\']; $msg.= \"in this session.\";?>\r\n', '2021-11-16 01:33:00', 'john.doe@yahoo.com', 1),
(23, 10, 'PEAR is a framework and repository for reusable PHP components. PEAR stands for PHP Extension and Application Repository. It contains all types of PHP code snippets and libraries. It also provides a command line interface to install “packages” automatically.', '2021-11-16 01:31:37', 'john.doe@yahoo.com', 1),
(24, 11, 'PHP constructor and destructor are special type functions which are automatically called when a PHP class object is created and destroyed. The constructor is the most useful of the two because it allows you to send parameters along when creating a new object, which can then be used to initialize variables on the object.\r\n<?php \r\nclass Foo { \r\nprivate $name; \r\nprivate $link; \r\npublic function __construct($name) { \r\n$this->name = $name;\r\n}\r\n \r\npublic function setLink(Foo $link){\r\n$this->;link = $link;\r\n}\r\n \r\npublic function __destruct() {\r\necho \'Destroying: \', $this->name, PHP_EOL;\r\n}\r\n', '2021-11-16 01:32:12', 'henryQuinlal@yahoo.com', 1),
(31, 18, 'In Java, package is a collection of classes and interfaces which are bundled together as they are related to each other. Use of packages helps developers to modularize the code and group the code for proper re-use. Once code has been packaged in Packages, it can be imported in other classes and used.', '2021-11-16 01:40:05', 'iffat@yahoo.com', 2),
(32, 19, 'Multi threaded applications can be developed in Java by using any of the following two methodologies:\r\n1. By using Java.Lang.Runnable Interface. Classes implement this interface to enable multi threading. There is a Run() method in this interface which is implemented.\r\n2. By writing a class that extend Java.Lang.Thread class.\r\n', '2021-11-16 01:41:23', 'john.smith@yahoo.com', 2),
(33, 20, 'In Java, if we define a new class inside a particular block, it’s called a local class. Such a class has local scope and isn’t usable outside the block where its defined.', '2021-11-16 01:42:19', 'john.smith@yahoo.com', 2),
(34, 21, 'A class is like a blueprint of data member and functions and object is an instance of class. For example, lets say we have a class Car which has data members (variables) such as speed, weight, price and functions such as gearChange(), slowDown(), brake() etc. Now lets say I create a object of this class named FordFigo which uses these data members and functions and give them its own values. Similarly we can create as many objects as we want using the blueprint(class).\r\n\r\n//Class name is Car\r\nclass Car\r\n{\r\n    //Data members\r\n    char name[20];\r\n    int speed;\r\n    int weight;\r\n \r\npublic:\r\n    //Functions\r\n    void brake(){\r\n    }\r\n    void slowDown(){\r\n    }\r\n};\r\n \r\nint main()\r\n{\r\n   //ford is an object\r\n   Car ford; \r\n}', '2021-11-16 01:50:39', 'john.doe@yahoo.com', 3),
(35, 12, 'This is useful. I test in my code and its working fine.', '2021-11-16 01:51:59', 'sam@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

DROP TABLE IF EXISTS `forum_topics`;
CREATE TABLE IF NOT EXISTS `forum_topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_title` varchar(150) DEFAULT NULL,
  `topic_create_time` datetime DEFAULT NULL,
  `topic_owner` varchar(150) DEFAULT NULL,
  `forum_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`topic_id`, `topic_title`, `topic_create_time`, `topic_owner`, `forum_id`) VALUES
(13, 'What are the different types of Array in PHP?', '2021-11-16 01:33:48', 'iffat@yahoo.com', 1),
(12, 'What is the use of session and cookies in PHP?', '2021-11-16 01:33:00', 'john.doe@yahoo.com', 1),
(11, 'What are constructor and destructor in PHP?', '2021-11-16 01:32:12', 'henryQuinlal@yahoo.com', 1),
(10, 'What is PEAR in PHP?', '2021-11-16 01:31:37', 'john.doe@yahoo.com', 1),
(14, ' How can you compare objects in PHP?', '2021-11-16 01:35:05', 'henryQuinlal@yahoo.com', 1),
(15, 'How to reverse a String in Java?', '2021-11-16 01:36:17', 'iffat@yahoo.com', 2),
(16, 'What are the various access specifiers for Java classes?', '2021-11-16 01:37:36', 'john.doe@yahoo.com', 2),
(17, 'What are Loops in Java? What are three types of loops?', '2021-11-16 01:38:44', 'henryQuinlal@yahoo.com', 2),
(18, ' What are Java Packages? What’s the significance of packages?', '2021-11-16 01:40:05', 'iffat@yahoo.com', 2),
(19, 'What are the two ways of implementing multi-threading in Java?', '2021-11-16 01:41:23', 'john.smith@yahoo.com', 2),
(20, 'What is a Local class in Java?', '2021-11-16 01:42:19', 'john.smith@yahoo.com', 2),
(21, 'Class and Objects', '2021-11-16 01:50:39', 'john.doe@yahoo.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

DROP TABLE IF EXISTS `store_categories`;
CREATE TABLE IF NOT EXISTS `store_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(50) DEFAULT NULL,
  `cat_desc` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cat_title` (`cat_title`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `cat_title`, `cat_desc`) VALUES
(1, 'Hats', 'Funky hats in all shapes and sizes!'),
(2, 'Shirts', 'From t-shirts to\r\nsweatshirts to polo shirts and beyond.'),
(3, 'Books', 'Paperback, hardback,\r\nbooks for school or play.');

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

DROP TABLE IF EXISTS `store_items`;
CREATE TABLE IF NOT EXISTS `store_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `item_title` varchar(75) DEFAULT NULL,
  `item_price` float(8,2) DEFAULT NULL,
  `item_desc` text,
  `item_stock` int(25) NOT NULL,
  `item_image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `cat_id`, `item_title`, `item_price`, `item_desc`, `item_stock`, `item_image`) VALUES
(1, 1, 'Baseball Hat', 12.00, 'Fancy, low-profile baseball hat.', 10, 'baseballhat.gif'),
(2, 1, 'Cowboy Hat', 52.00, '10 gallon variety', 10, 'cowboyhat.gif'),
(3, 1, 'Top Hat', 102.00, 'Good for costumes.', 8, 'tophat.jpg'),
(4, 1, 'Panama', 52.00, 'Good for costumes.', 5, 'panama.jpg'),
(5, 2, 'Short-Sleeved T-Shirt', 12.00, '100% cotton, pre-shrunk.', 11, 'short_sleeved.jpg'),
(6, 2, 'Long-Sleeved T-Shirt', 15.00, 'Just like the short-sleeved shirt, with longer sleeves.', 12, 'long_sleeved.jpg'),
(7, 2, 'Sweatshirt', 22.00, 'Heavy and warm.', 13, 'sweatshirt.jpg'),
(8, 3, 'Jane’s Self-Help Book', 12.00, 'Jane gives advice.', 5, 'selfhelpbook.jpg'),
(9, 3, 'Generic Academic Book', 35.00, 'Some required reading for school, will put you to sleep.', 4, 'boringbook.gif'),
(10, 3, 'Chicago Manual of Style', 9.99, 'Good for copywriters.', 8, 'chicagostyle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_color`
--

DROP TABLE IF EXISTS `store_item_color`;
CREATE TABLE IF NOT EXISTS `store_item_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_color` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_color`
--

INSERT INTO `store_item_color` (`id`, `item_id`, `item_color`) VALUES
(1, 1, 'red'),
(2, 1, 'black'),
(3, 1, 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_size`
--

DROP TABLE IF EXISTS `store_item_size`;
CREATE TABLE IF NOT EXISTS `store_item_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `item_size` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_size`
--

INSERT INTO `store_item_size` (`id`, `item_id`, `item_size`) VALUES
(1, 1, 'One Size Fits All'),
(2, 1, 'One Size Fits All'),
(3, 2, 'One Size Fits All'),
(4, 2, 'One Size Fits All'),
(5, 3, 'One Size Fits All'),
(6, 3, 'One Size Fits All'),
(7, 4, 'S'),
(8, 4, 'S'),
(9, 4, 'M'),
(10, 4, 'M'),
(11, 4, 'L'),
(12, 4, 'L'),
(13, 4, 'XL'),
(14, 4, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `store_orders`
--

DROP TABLE IF EXISTS `store_orders`;
CREATE TABLE IF NOT EXISTS `store_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` datetime DEFAULT NULL,
  `order_name` varchar(100) DEFAULT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `order_city` varchar(50) DEFAULT NULL,
  `order_state` varchar(25) DEFAULT NULL,
  `order_postcode` varchar(10) DEFAULT NULL,
  `order_tel` varchar(25) DEFAULT NULL,
  `order_email` varchar(100) DEFAULT NULL,
  `item_total` float(6,2) DEFAULT NULL,
  `cc_cardName` varchar(255) NOT NULL,
  `cc_month` varchar(50) NOT NULL,
  `cc_year` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_orders`
--

INSERT INTO `store_orders` (`id`, `order_date`, `order_name`, `order_address`, `order_city`, `order_state`, `order_postcode`, `order_tel`, `order_email`, `item_total`, `cc_cardName`, `cc_month`, `cc_year`) VALUES
(17, '2021-11-16 13:31:11', 'Iffat Sania Kabir', 'Unit 9, 1-3 Gordon St', 'Bankstown', 'NSW', '2200', '0197873434', 'iffat@yahoo.com', 48.00, 'Iffat S Kabir', '11', '2024'),
(18, '2021-11-16 13:34:51', 'Henry Quinlan', '9/1-3 Gordon St', 'Bankstown', 'New South Wales', '2200', '0256764323', 'henryQuinlal@yahoo.com', 260.00, 'Henry Quinlan', '2', '2022'),
(15, '2021-11-16 13:20:26', 'Sara Jaker', '13 Salwyn pl', 'Blacktown', 'NSW', '2347', '0287673454', 'sarajaker@yahoo.com', 204.00, 'Sara Jaker', '11', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `store_orders_items`
--

DROP TABLE IF EXISTS `store_orders_items`;
CREATE TABLE IF NOT EXISTS `store_orders_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `sel_item_id` int(11) DEFAULT NULL,
  `sel_item_qty` smallint(6) DEFAULT NULL,
  `sel_item_size` varchar(25) DEFAULT NULL,
  `sel_item_color` varchar(25) DEFAULT NULL,
  `sel_item_price` float(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_orders_items`
--

INSERT INTO `store_orders_items` (`id`, `order_id`, `sel_item_id`, `sel_item_qty`, `sel_item_size`, `sel_item_color`, `sel_item_price`) VALUES
(150, 0, 2, 5, 'One Size Fits All', '', 52.00),
(149, 0, 5, 4, '', '', 12.00),
(148, 0, 22, 2, 'One Size Fits All', '', 102.00);

-- --------------------------------------------------------

--
-- Table structure for table `store_shoppertrack`
--

DROP TABLE IF EXISTS `store_shoppertrack`;
CREATE TABLE IF NOT EXISTS `store_shoppertrack` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(32) DEFAULT NULL,
  `sel_item_id` int(11) DEFAULT NULL,
  `sel_item_qty` smallint(6) DEFAULT NULL,
  `sel_item_size` varchar(25) DEFAULT NULL,
  `sel_item_color` varchar(25) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(55) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(55) COLLATE latin1_general_ci NOT NULL,
  `firstName` varchar(55) COLLATE latin1_general_ci NOT NULL,
  `lastName` varchar(55) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `password`, `firstName`, `lastName`) VALUES
(1, 'joe', '', 'Joe', 'Jones'),
(2, 'sue', '', 'Sue', 'Merlin'),
(3, 'jim', '', 'Jim', 'Markson'),
(4, 'june', '', 'June', 'July');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
