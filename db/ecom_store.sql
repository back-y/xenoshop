-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 11:43 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'n', 'bereketgezha99@gmail.com', '1', 'DV.png', 'ethiopia', 'admin user', '0973033007', 'web development');

-- --------------------------------------------------------

--
-- Table structure for table `boxes_section`
--

CREATE TABLE `boxes_section` (
  `box_id` int(10) NOT NULL,
  `box_title` text NOT NULL,
  `box_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `boxes_section`
--

INSERT INTO `boxes_section` (`box_id`, `box_title`, `box_desc`) VALUES
(1, 'Best Products    ', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio ratione illo, autem fuga quos numquam ullam laborum, repellat tempora alias iure repellendus ipsum est quasi quisquam aliquid dolor? Ducimus, sunt.'),
(2, 'Best Offers   ', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio ratione illo, autem fuga quos numquam ullam laborum,  repellat tempora alias iure repellendus ipsum est quasi quisquam aliquid dolor? Ducimus, sunt.'),
(3, '100% Satisfy ', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio ratione illo, autem fuga quos numquam ullam laborum, repellat tempora alias iure repellendus ipsum est quasi quisquam aliquid dolor? Ducimus, sunt.'),
(5, 'newBox  ', 'bbbbbbb'),
(6, 'new 1', 'mmmmmm');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(1, 'Accessories', 'yes', '3.png');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `coupon_title` varchar(255) NOT NULL,
  `coupon_price` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_limit` int(100) NOT NULL,
  `coupon_used` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES
(2, 47, 'New Men jacket 1', '22', '282918274', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'nnn', 'n@gmail.com', '1', 'Ethiopia', 'Addis Ababa', '4444', 'Addis Ababa, Ethiopia', 'cat_image.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 1, 33, 646456104, 1, 'Small', '2021-12-27', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(1, 'Name_1', 'yes', 'image3.jpg'),
(2, 'Name_2', 'no', 'product-3.jpg'),
(3, 'Name_3', 'yes', 'product-1.jpg'),
(4, 'Name_4', 'no', 'product-2.jpg'),
(5, 'Name_5', 'no', 'j.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(2, 1718751537, 333, 'Back Code', 3434, 145, '07/08/2021'),
(3, 111111, 2846, 'Western Union', 1111, 111, '7/4/2014'),
(4, 1718751537, 123, 'Western Union', 3434, 1234, '7/8/2021'),
(5, 1718751537, 7, 'Back Code', 8, 1234, '07/08/2021');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(1, 1, 646456104, '53', 1, 'Small', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL,
  `product_features` text NOT NULL,
  `product_video` text NOT NULL,
  `product_label` text NOT NULL,
  `product_sale` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_keywords`, `product_desc`, `product_features`, `product_video`, `product_label`, `product_sale`) VALUES
(22, 4, 1, 1, '2021-12-27 08:08:07', 'Black Blouse Versace Coat', 'product_6', 'Black Blouse Versace Coat3.jpg', '', '', 123, 'BB Versace Coat', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', '<p>n</p>', 'c', 'new', 55),
(23, 7, 1, 2, '2021-12-27 06:33:39', 'Printer', 'product_4', '3.png', '', '', 500, 'PT', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 100),
(26, 7, 1, 2, '2021-12-27 06:33:59', 'Security Camera', 'product_8', 'exclusive__product05.jpg', '', '', 1000, 'SC', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 10),
(27, 2, 4, 0, '2021-12-27 06:34:01', 'Apple Desktop', 'product_9', 'f13.jpg', '', '', 1022, 'ADT', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(28, 2, 4, 0, '2021-12-27 06:34:03', 'Samsung Phone', 'product_10', 'e2.jpg', '', '', 1234, 'SJ3', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(31, 3, 1, 4, '2021-12-27 06:33:36', 'Mens Jacket', 'product_3', 'cat_image.jpg', '', '', 644, 'MJ', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 200),
(32, 1, 1, 0, '2021-12-27 06:33:48', 'Mens Jacket', 'product_7', 'image3.jpg', '', '', 763, 'MJ', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 40),
(33, 1, 1, 0, '2021-12-27 06:34:10', 'Mens Jacket', 'product_11', 'image11.jpg', '', '', 234, 'MJ', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(34, 1, 1, 0, '2021-12-27 06:34:13', 'Mens Jacket', 'product_12', 'jacket-3.jpg', '', '', 879, 'MJ', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(35, 1, 1, 0, '2021-12-27 06:34:15', 'Mens Jacket', 'product_13', 'jacket-2.jpg', '', '', 876, 'MJ', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(36, 3, 1, 2, '2021-12-27 06:34:20', 'Mens Shoes', 'product_14', 'exclusive__product03.jpg', '', '', 109, 'MS', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(37, 5, 1, 5, '2021-12-27 06:33:51', 'Mens Shoes', 'product_7', 's_exclusive__product03.png', '', '', 209, 'MS', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 35),
(38, 5, 1, 2, '2021-12-27 06:33:42', 'Women Shoes', 'product_5', 's_exclusive__product06.png', '', '', 609, 'WS', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 95),
(39, 5, 1, 4, '2021-12-27 06:34:23', 'Women Shoes', 'product_15', 's_exclusive_product06.png', '', '', 300, 'WS', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 0),
(40, 5, 1, 4, '2021-12-27 06:34:25', 'Men Shoes', 'product_16', 'exclusive_product03.jpg', '', '', 609, 'MS', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(43, 5, 1, 3, '2021-12-27 06:34:29', 'Men Tshirt', 'product_17', 'product.jpg', '', '', 856, 'MT', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(44, 5, 1, 4, '2021-12-27 06:34:31', 'Men Tshirt', 'product_18', 'tshirt1.jpg', '', '', 596, 'MT', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(45, 5, 1, 3, '2021-12-27 06:34:36', 'Men Tshirt', 'product_19', 'T-shirt1.jpg', '', '', 846, 'MT', '<p>The form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create nextThe form above sends data to a file called \"upload.php\", which we will create next</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 0),
(46, 3, 1, 3, '2021-12-27 06:34:40', 'new new new new new', 'product_20', 'cat_image.jpg', 'image3.jpg', 'product-m1.jpg', 0, 'addis', '<p>addis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addis</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 0),
(47, 1, 1, 2, '2021-12-27 06:34:44', 'New Men jacket 1', 'product_21', 'jacket-3.jpg', 'jacket-3.jpg', 'jacket-3.jpg', 222, 'Lather', '<p><strong>new men jacket for sell</strong></p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(48, 5, 1, 2, '2021-12-27 06:34:46', 'Men Tshirt', 'product_22', 'product.jpg', 'product.jpg', 'product.jpg', 111, 'TS', '<p>new t-shirt</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'new', 0),
(49, 3, 1, 1, '2021-12-27 06:33:33', 'newwwwww', 'product_2111111', 'image11.jpg', 'image11.jpg', 'image11.jpg', 33, 'mm', '<p>new fashion</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 444),
(50, 3, 1, 1, '2021-12-27 06:33:27', 'addddddd', 'product_1111', 'cat_image.jpg', 'cat_image.jpg', 'cat_image.jpg', 402, 'MSss', '<p>newne new new eeneew</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 3333),
(53, 3, 1, 1, '2021-12-27 06:33:54', 'Mens Jacket', 'jacket_1', 'product-m1.jpg', 'product-m1.jpg', 'product-m1.jpg', 123, 'MJ', '<p>ne nw ne wnene</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.                                  Porro natus vel alias a rem, labore ipsum sit omnis corrupti ea aut.                                  Animi perspiciatis, optio officia doloremque veritatis sed aspernatur enim.', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/XBj_le81sAc\"                                  title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay;                                  clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen>                             </iframe>', 'sale', 33);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(3, 'jacket', 'no', 'jacket-3.jpg'),
(4, 'coat', 'yes', 'fur coat with button1.jpg'),
(5, 'shoes', 'yes', 's_exclusive__product03.png'),
(6, ' T-shirt ', 'no', 's_exclusive_product06.png'),
(7, 'Accessories', 'no', 'e3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_url`) VALUES
(12, '1', '2.jpg', 'http://localhost/xenoshop/checkout.php'),
(13, '2', 'slide-2.jpg', 'http://localhost/xenoshop/shop.php'),
(14, '3', 'slide-3.jpg', 'http://localhost/xenoshop/contact.php'),
(17, '4', 'slide-4.jpg', 'http://youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'Terms & Conditions', 'termLink', '<p>addis addisaddis addisaddis addis addisaddis addisaddis addis addisaddis addisaddis addis addisaddis addisaddis addis addisaddis addisaddis addis addisaddis addisaddis addis addisaddis addisaddis addis addisaddis addisaddis addis addisaddis addisaddis addis addisaddis addisaddis addis addisaddis addisaddis addis addisaddis addisaddis&nbsp;</p>'),
(2, 'Refund Policy', 'RedunfLink', 'addis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addis'),
(3, 'Promo & Other Term Conditions', 'PromoTermConditionLink', 'addis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addisaddis addis'),
(8, 'New Terms', 'http://xenoshop.com', 'zzzzzz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `boxes_section`
--
ALTER TABLE `boxes_section`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `boxes_section`
--
ALTER TABLE `boxes_section`
  MODIFY `box_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
