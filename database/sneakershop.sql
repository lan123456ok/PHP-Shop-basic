-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 16, 2023 at 07:29 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sneakershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `sex` tinyint NOT NULL,
  `phone_number` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `date`, `sex`, `phone_number`, `avatar`, `level`) VALUES
(1, 'superadmin@example.com', 'Anchay@123', 'Tổng tài bá đạo', '1967-12-03', 1, '0412312242', NULL, 0),
(2, 'admin@example.com', 'Anchay@123', 'Dạ Lan Hương Tím', '2001-08-27', 0, '0412312242', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `b_date` date NOT NULL,
  `sex` tinyint NOT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `location` tinyint NOT NULL,
  `avatar` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cover` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone_number`, `b_date`, `sex`, `address`, `location`, `avatar`, `cover`, `token`) VALUES
(1, 'Lan', 'lan155ok@gmail.com', 'An@123456', NULL, '1999-03-05', 1, NULL, 1, NULL, NULL, NULL),
(8, 'Mỹ Nguyễn', 'bachomuonnam@gmail.com', 'An@123456', '00121234211', '2000-02-27', 0, 'Dan Giao Vinh Loi', 3, '1691642399.jpg', '1691643742.jpg', NULL),
(9, 'Grammarly', 'ahahhhahihi@gmail.com', 'An@123456', NULL, '2005-09-27', 0, NULL, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int NOT NULL,
  `name` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `address`, `photo`) VALUES
(1, 'Nike', 'One Bowerman Drive\r\nBeaverton, OR 97005\r\nUnited States', 'https://static.nike.com/a/images/f_jpg,q_auto:eco/61b4738b-e1e1-4786-8f6c-26aa0008e80b/swoosh-logo-black.png'),
(2, 'Adidas', '91074 Herzogenaurach,\r\nGermany', 'https://pbs.twimg.com/profile_images/1564299301123137545/d1yZqve6_400x400.png'),
(4, 'Vans', '1588 South Coast Drive Costa Mesa, CA 92626', 'https://logos-world.net/wp-content/uploads/2020/05/Vans-Logo-1966.png'),
(5, 'motdoigiay', '92A Trần Quốc Toản, phường Võ Thị Sáu,\r\nQuận 3, TP.HCM, Việt Nam', 'https://motdoigiay.vn/wp-content/uploads/2017/11/cropped-mot-favicon.png'),
(6, 'Converse', 'Boston, Massachusetts, Hoa Kỳ', 'https://1000logos.net/wp-content/uploads/2021/04/Converse-logo.png'),
(7, 'MLB', 'New York, United States', 'https://censor.vn/wp-content/uploads/2022/02/mlb-logo.jpg'),
(8, 'New Blalance', 'Boston, Massachusetts, United States', 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/New_Balance_logo.svg/2560px-New_Balance_logo.svg.png'),
(9, 'Ananas', '427 Đ. Sư Vạn Hạnh, Phường 12, Quận 10, Thành phố Hồ Chí Minh', 'https://brademar.com/wp-content/uploads/2022/09/Ananas-Logo-PNG-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `name_receiver` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_receiver` char(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address_receiver` text COLLATE utf8mb4_general_ci NOT NULL,
  `location` tinyint NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `location`, `status`, `created_at`, `total_price`) VALUES
(6, 8, 'Mỹ Nguyễn', '0634046381', 'Dan Giao Vinh Loi', 3, 0, '2023-08-14 02:37:34', 4156500),
(7, 8, 'Mỹ Nguyễn', '0684046381', 'Dan Giao Vinh Loi', 3, 0, '2023-08-14 02:38:28', 7470000),
(8, 9, 'Lanbeng', '332220022', '384/30/1 Lý Thái Tổ P.10 Q.10', 4, 0, '2023-08-14 02:43:37', 7338000),
(9, 9, 'Ông trủm bard vn', '233662201', 'Summoner Rift', 4, 0, '2023-08-14 02:45:54', 6577500),
(10, 1, 'Hai', '12345678', 'Hoang Sa', 1, 0, '2023-08-14 02:47:12', 1620000);

-- --------------------------------------------------------

--
-- Table structure for table `order_sneaker`
--

CREATE TABLE `order_sneaker` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_sneaker`
--

INSERT INTO `order_sneaker` (`order_id`, `product_id`, `quantity`) VALUES
(6, 1, 1),
(6, 12, 1),
(7, 17, 3),
(8, 2, 1),
(8, 3, 1),
(9, 8, 2),
(9, 10, 1),
(10, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sneakers`
--

CREATE TABLE `sneakers` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image_1` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_2` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_3` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_4` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `manufacturer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sneakers`
--

INSERT INTO `sneakers` (`id`, `name`, `price`, `description`, `image_1`, `image_2`, `image_3`, `image_4`, `manufacturer_id`) VALUES
(1, 'Nike Killshot 2 Leather', 2779000, 'Inspired by the original low-profile tennis shoe, the Nike Killshot 2 updates the upper with a variety of textured leathers to create a fresh look. From soft suedes to smooth leathers with the perfect sheen, it\'s court-side attitude with a modern touch. To prove you\'re on top, the rubber gum sole adds the cherry on bottom.', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/i1-3ad4c993-d4c1-4db8-908d-7b2828afd92b/killshot-2-leather-shoe-DqWZ4j.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/i1-cafee09a-c20e-4900-b5a7-908254dfad1b/killshot-2-leather-shoe-DqWZ4j.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/i1-03595241-364f-45c8-bb0d-7fed5bb058ef/killshot-2-leather-shoe-DqWZ4j.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/i1-d6cebfb5-71e7-4dc4-882f-5752c6508a72/killshot-2-leather-shoe-DqWZ4j.png', 1),
(2, 'Nike Air Max Pulse', 4409000, 'The Air Max Pulse pulls inspiration from the London music scene, bringing an underground touch to the iconic Air Max line. Its textile-wrapped midsole and vacuum-sealed accents keep \'em looking fresh and clean, while colours inspired by the London music scene give your look the edge. Point-loaded Air cushioning—revamped from the incredibly plush Air Max 270—delivers better bounce, helping you push past your limits.', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/671fc01d-5205-4a54-8349-0b9eae869dac/air-max-pulse-shoes-QShhG8.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/bea6e1fd-ef42-4e2d-847b-1de8006aebe2/air-max-pulse-shoes-QShhG8.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/56b277b4-c5d4-4a10-a220-4bbdc6add7e2/air-max-pulse-shoes-QShhG8.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/f34085ef-41b0-446f-b17b-068b7494135d/air-max-pulse-shoes-QShhG8.png', 1),
(3, 'Nike Air Force 1 ', 2929000, 'The radiance lives on in the Nike Air Force 1 \'07, the basketball original that puts a fresh spin on what you know best: durably stitched overlays, clean finishes and the perfect amount of flash to make you shine.', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b7d9211c-26e7-431a-ac24-b0540fb3c00f/air-force-1-07-shoes-WrLlWX.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/00375837-849f-4f17-ba24-d201d27be49b/air-force-1-07-shoes-WrLlWX.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/33533fe2-1157-4001-896e-1803b30659c8/air-force-1-07-shoes-WrLlWX.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/a0a300da-2e16-4483-ba64-9815cf0598ac/air-force-1-07-shoes-WrLlWX.png', 1),
(4, 'Nike Air Max 97', 4699000, 'Featuring the original ripple design inspired by Japanese bullet trains, the Nike Air Max 97 lets you push your style full-speed ahead.Taking the revolutionary full-length Nike Air unit that shook up the running world and adding fresh colours and crisp details, it lets you ride in first-class comfort.', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/2a17bae9-fd0a-4783-885e-5f398730f3d2/air-max-97-shoes-EBZrb8.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/93500a06-86a1-4dee-838e-0742eb81404e/air-max-97-shoes-EBZrb8.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/16d37601-d034-4f2e-81d8-7599ff4efcab/air-max-97-shoes-EBZrb8.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/b9372631-a5db-4d2b-a2ef-1145300fbdf0/air-max-97-shoes-EBZrb8.png', 1),
(5, 'Nike Go FlyEase', 3829000, 'Ditch the laces and get outside. These kicks feature Nike\'s revolutionary FlyEase technology, making on-and-off a breeze. With a heel that pivots open for a totally hands-free entry, they\'re great for people with limited mobility—or anyone who wants a quicker way to get going.', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/c76e2119-acb7-4944-9085-d4f5ae2bda4a/go-flyease-easy-on-off-shoes-3svRCL.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/75d6eab9-270c-485d-8edc-851408f5f86a/go-flyease-easy-on-off-shoes-3svRCL.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/e38ad395-18da-4d12-8b76-9336e12f7ab6/go-flyease-easy-on-off-shoes-3svRCL.png', 'https://static.nike.com/a/images/t_PDP_1728_v1/f_auto,q_auto:eco/bbe6f776-12d9-43b3-a8d0-338a95180a0c/go-flyease-easy-on-off-shoes-3svRCL.png', 1),
(6, 'ULTRA 4D', 6000000, 'Bất kể bạn di chuyển tới đâu, đôi giày này sẽ đảm bảo cảm giác thoải mái trên suốt hành trình. Sử dụng đế giữa adidas 4D in 3D, đôi giày này có khả năng hấp thụ lực tác động tối ưu và mang lại độ ổn định trên các bề mặt cứng hoặc không bằng phẳng. Thân giày adidas PRIMEKNIT ôm chân vừa vặn và nâng đỡ, thích ứng tự nhiên theo từng sải bước. Trên hết, đôi giày này còn sở hữu cá tính và phong cách nâng tầm mọi outfit.\r\n\r\nLàm từ một loạt chất liệu tái chế, thân giày có chứa tối thiểu 50% thành phần tái chế. Sản phẩm này đại diện cho một trong số rất nhiều các giải pháp của chúng tôi hướng tới chấm dứt rác thải nhựa.', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/8d57cf29bbe54bf691d1264b05213b31_9366/Giay_Ultra_4D_trang_IF0301_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/b09046138f454ef9ad69a70562e2a100_9366/Giay_Ultra_4D_trang_IF0301_02_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/3a08708eb2184e238a49e272562262f6_9366/Giay_Ultra_4D_trang_IF0301_03_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/90e73ef1ef6e46738b77b72ab0d4608a_9366/Giay_Ultra_4D_trang_IF0301_04_standard.jpg', 2),
(7, 'SUPERSTAR', 2600000, 'Thiết kế ban đầu dành cho sân bóng rổ vào thập niên 70. Được các ngôi sao hip hop tôn sùng vào thập niên 80. Đôi giày adidas Superstar giờ đây đã trở thành biểu tượng của các tín đồ thời trang đường phố. Thiết kế mũi giày vỏ sò nổi tiếng thế giới mang đến phong cách chất lừ và khả năng bảo vệ. Giống như những gì đôi giày này đã thể hiện trên sân bóng rổ trong quá khứ.    Giờ đây, bạn có thể tự tin tham gia lễ hội âm nhạc hay dạo phố mà không sợ bị dẫm lên chân. Chi tiết 3 Sọc viền răng cưa và logo adidas Superstar đóng khung mang đậm phong cách nguyên bản chính hiệu.', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/7ed0855435194229a525aad6009a0497_9366/Giay_Superstar_trang_EG4958_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/8a358bcd5e3d453da815aad6009a249e_9366/Giay_Superstar_trang_EG4958_02_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/3708ab90979a4ba59535aad6009a2fa8_9366/Giay_Superstar_trang_EG4958_03_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/ff2e419f1eda4ebab23faad6009a3a9e_9366/Giay_Superstar_trang_EG4958_04_standard.jpg', 2),
(8, 'STAN SMITH', 2600000, 'Vẻ đẹp kinh điển. Phong cách vốn dĩ. Đa năng hàng ngày. Suốt hơn 50 năm qua và chưa dừng ở đó, giày adidas Stan Smith luôn giữ vững vị trí là một biểu tượng. Đôi giày này là phiên bản cải biên mới mẻ, là một phần cam kết của adidas hướng tới chỉ sử dụng polyester tái chế bắt đầu từ năm 2024. Với thân giày vegan và đế ngoài làm từ cao su phế liệu, đôi giày này vẫn mang phong cách đầy tính biểu tượng, đồng thời thân thiện với môi trường.\r\n\r\nGiày sử dụng chất liệu vegan thay cho thành phần hoặc chất liệu có nguồn gốc từ động vật. Sản phẩm này may bằng vải công nghệ Primegreen, thuộc dòng chất liệu tái chế hiệu năng cao. Thân giày chứa 50% thành phần tái chế. Không sử dụng polyester nguyên sinh.', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/68ae7ea7849b43eca70aac1e00f5146d_9366/Giay_Stan_Smith_trang_FX5502_01_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/ac706d8555244a6e8ea7ac1e00f521d1_9366/Giay_Stan_Smith_trang_FX5502_02_standard_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/72a38538fd684788b5d9ac1e00f52860_9366/Giay_Stan_Smith_trang_FX5502_03_standard.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/f86168171d2a4644a8eeac1e00f52f85_9366/Giay_Stan_Smith_trang_FX5502_04_standard.jpg', 2),
(9, 'ULTRABOOST LIGHT', 5200000, 'Trải nghiệm nguồn năng lượng vượt trội với giày Ultraboost Light mới, phiên bản Ultraboost nhẹ nhất của chúng tôi. Sự kỳ diệu nằm ở đế giữa Light BOOST, thế hệ mới của đệm adidas BOOST. Thiết kế phân tử độc đáo của mẫu giày này đạt đến chất liệu mút xốp BOOST nhẹ nhất từ trước đến nay. Với hàng trăm hạt BOOST bùng nổ năng lượng cùng cảm giác êm ái và thoải mái tột đỉnh, đôi chân bạn thực sự sẽ được trải nghiệm tất cả.', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/3f2ad6a5b8ba493e8e8c8243dfb4933c_9366/Giay_Ultraboost_Light_trang_GY9350_HM1.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/f97d22f5b3af403ab63a5ba083e9edef_9366/Giay_Ultraboost_Light_trang_GY9350_HM3_hover.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/d72c46ba7c9b45ff9c743a8058f8a3ff_9366/Giay_Ultraboost_Light_trang_GY9350_HM4.jpg', 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/fc3c008b12a3441e886a2fccc4fe3338_9366/Giay_Ultraboost_Light_trang_GY9350_HM5.jpg', 2),
(10, 'VANS AUTHENTIC CLASSIC BLACK/WHITE', 1377500, 'Là phiên bản được ưa chuộng nhất trong bộ sưu tập Authentic của VANS với sự kết hợp 2 màu đen trắng dễ phối đồ và custom, đặc biệt là phiên bản cổ nhất có tuổi đời hơn 50 năm, dù vậy vẫn được fan hâm mộ săn đón và được sử dụng khá nhiều với những vận động viên trượt ván chuyên nghiệp. VANS CLASSIC AUTHENTIC BLACK/WHITE được đánh giá là một siêu phẩm cần có khi bạn quyết định sẽ trở thành một tín đồ của nhà VANS đấy!', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-authentic-classic-black-vn000ee3blk-1.png', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-authentic-classic-black-vn000ee3blk-2.png?v=1625925620597', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-authentic-classic-black-vn000ee3blk-3.png?v=1625925623543', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-authentic-classic-black-vn000ee3blk-4.png?v=1625925626347', 4),
(11, 'VANS OLD SKOOL CLASSIC BLACK/WHITE', 1665000, 'Được gọi vui một cách thân thuộc là \"giày VANS đen\" vốn là một sự phổ biến rất đặc biệt đối với các tín đồ của nhà VANS. Tới nay đôi giày chỉ với phối màu đen trắng này vẫn nằm trong top \"Best Seller\" của VANS trên toàn thế giới, với kiểu dáng cổ điển cùng \"sọc Jazz\" huyền thoại hợp thời trang khiến đôi VANS này thật sự trở thành mẫu giày classic bất bại, là fan hâm mộ của VANS nói chung và những skaters nói riêng đều nên có một đôi trong tủ giày. Được mệnh danh là phiên bản mang \"càng cũ càng đẹp\" và nhiều phiên bản custom  bậc nhất của nhà VANS. Cho đến tận bây giờ sau 44 năm ra mắt, thiết kế ấy đã được xem như dấu hiệu nhận biết chuyên biệt của VANS - OFF THE WALL chính là logo JAZZ STRIPE. VAN OLD SKOOL tuy cũng được xem như là một trong những dòng giày thế hệ đầu của thương hiệu, nhưng không vì thế mà nó cũ đi hay lỗi thời theo thời gian. Với tầm nhìn xa và sự chuyên nghiệp trong thiết kế của VANS hay cách riêng của PAUL VAN DOREN VANS OLD SKOOL chưa bao giờ cũ đi mà liên tục được đổi mới và lẽ dĩ nhiên vẫn giữ nguyên vẹn giá trị cốt lõi cùng những dấu ấn ban đầu. Đây chính là cách tạo nên VANS hay là cách mà VANS tỏ lòng kính trọng đến cực sáng lập thương hiệu PAUL VAN DOREN.', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-old-skool-black-white-vn000d3hy28-1.jpg', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-old-skool-black-white-vn000d3hy28-3.jpg?v=1661757331440', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-old-skool-black-white-vn000d3hy28-2.jpg?v=1661757331440', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-old-skool-black-white-vn000d3hy28-2.jpg?v=1661757331440', 4),
(12, 'VANS CHECKERBOARD SLIP-ON CLASSIC BLACK/OFF WHITE', 1377500, 'Bắt đầu trở nên nổi tiếng khi được Sean Penn sử dụng trong bộ phim Fast Times vào năm 1982 và từ phong trào trở thành một phong cách huyền thoại không hề lỗi thời và luôn nằm trong mục \"Best Seller\" của VANS cho tới thời điểm hiện tại.', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-slip-on-checkerboard-black-off-white-vn000eyebww-1.png', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-slip-on-checkerboard-black-off-white-vn000eyebww-2.png?v=1625923440187', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-slip-on-checkerboard-black-off-white-vn000eyebww-3.png?v=1625923334863', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/140/774/products/vans-slip-on-checkerboard-black-off-white-vn000eyebww-4.png?v=1625923337587', 4),
(13, 'vải Tùng có dây', 978000, 'Tùng là một trong “tuế hàn tam hữu” – ba người bạn chịu giá rét. Vì chịu lạnh, chịu rét mà vẫn mọc thẳng và xanh tốt quanh năm.\r\n\r\nTùng biểu trưng cho người trượng-phu, không vì hoàn cảnh cam go mà thay đổi mình', 'https://motdoigiay.vn/wp-content/uploads/2021/05/1500x1000_DM_tung_front.jpg', 'https://motdoigiay.vn/wp-content/uploads/2021/05/1500x1000_DM_tung_top.jpg', 'https://motdoigiay.vn/wp-content/uploads/2021/05/1500x1000_DM_tung_rear.jpg', 'https://motdoigiay.vn/wp-content/uploads/2021/05/1500x1000_DM_tung_profile.jpg', 5),
(14, 'vải Nước ngọt không dây', 790000, 'giày Nước ngọt mang màu cát mát mẻ dưới suối – Một tinh thần tự nhiên và lành mạnh cho dịp cuối hè\r\nhai dòng Đời-mới có dây và Đời-thường không dây : êm đẹp bất chấp !\r\nđể bạn mang nhẹ – chơi vui – không lo nghĩ !\r\n–\r\nvới chất liệu cotton bố 100%, Một đôi giày Nước ngọt có màu cát-ánh-xanh kết hợp với đế cao su đúc nguyên khối màu vỏ cây tiếp năng lượng cho Một mùa tận hưởng !', 'https://motdoigiay.vn/wp-content/uploads/2022/08/1500x1000_dt_nuoc-ngot_profile.jpg', 'https://motdoigiay.vn/wp-content/uploads/2022/08/1500x1000_dt_nuoc-ngot_front.jpg', 'https://motdoigiay.vn/wp-content/uploads/2022/08/1500x1000_dt_nuoc-ngot_rear.jpg', 'https://motdoigiay.vn/wp-content/uploads/2022/08/1500x1000_dt_nuoc-ngot_top-1.jpg', 5),
(15, 'Converse Chuck Taylor All Star Lift Denim Fashion', 1620000, 'Converse đã mang chất liệu denim cổ điển quay trở lại và thổi hồn vào thiết kế Converse Chuck Taylor All Star Lift Denim Fashion. Denim là sắc màu không bao giờ lỗi mốt kết hợp cùng dáng đế Platform thời thượng dự đoán sẽ là một item bùng nổ trong thời gian tới. Ngoài ra, đệm lót OrthoLite với những đặc tính ưu việt, mang lại bước đi êm ái cũng là một điểm sáng cho thiết kế lần này.', 'https://drake.vn/image/cache/catalog/Converse/A03821C/A03821C_1p-650x650.jpg', 'https://drake.vn/image/cache/catalog/Converse/A03821C/A03821C_2-650x650.jpg', 'https://drake.vn/image/cache/catalog/Converse/A03821C/A03821C_3-650x650.jpg', 'https://drake.vn/image/cache/catalog/Converse/A03821C/A03821C_3-650x650.jpg', 6),
(16, 'Chuck Taylor All Star Leather ', 1710000, 'Với thiết kế Converse Classic cổ điển được ưa chuộng đi kèm với chất liệu da mềm nhẹ, có độ bóng, phần để cao su bền chắc cùng đường viền đen đặc trưng. Phiên bản màu đen bằng da của mẫu giày cổ thấp chắc chắn là item đơn giản phù hợp với mọi phong cách đáng để bạn sở hữu.', 'https://drake.vn/image/cache/catalog/Hinh%20add%20dut%20size/132174_PL94-650x650.jpg', 'https://drake.vn/image/cache/catalog/Converse/GI%C3%80Y/132174/IMG_4657-650x650.jpg', 'https://drake.vn/image/cache/catalog/Converse/GI%C3%80Y/132174/IMG_4659-650x650.jpg', 'https://drake.vn/image/cache/catalog/Converse/GI%C3%80Y/132174/IMG_4661-150x150.jpg', 6),
(17, 'MLB BigBall Chunky P Boston Red Sox Ivory', 2490000, 'Đây là một trong những đôi giày làm nên tên tuổi của MLB ngay từ khi mới ra mắt, cách thiết kế độc đáo với phối màu trắng làm nền, cùng chữ “Boston” được in màu đỏ đơn giản nhưng nổi bật, khiến nó trở thành sản phẩm được nhiều khách hàng ưa chuộng. Đồng thời MLB cũng sử dụng ngôn ngữ thiết kế quen thuộc của dòng BigBall Chunky là bộ đế ăn gian chiều cao lên tới 6cm, khiến nó có được nhiều sự chú ý trong phụ kiện thời trang, bởi chiều cao là một yếu tố rất quan trọng. Với đôi giày MLB BigBall Chunky Boston Red sox Ivory, bộ outfit tổng thể của người dùng sẽ được hoàn thiện đáng kể.', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-bigball-chunky-p-boston-red-sox-ivory-32shc2111-43i-1.jpg?v=1653920227933', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-bigball-chunky-p-boston-red-sox-ivory-32shc2111-43i-3.jpg?v=1653920229877', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-bigball-chunky-p-boston-red-sox-ivory-32shc2111-43i-6.jpg?v=1653920229877', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-bigball-chunky-p-boston-red-sox-ivory-32shc2111-43i-8.jpg?v=1653920229877', 7),
(18, 'MLB Bigball Chunky A New York Yankees Ivory', 2490000, 'Đơn giản nhưng tinh tế, đó là những gì người ta thường nói khi bắt gặp mẫu giày MLB BigBall Chunky A New York Yankees Ivory, bởi nó sở hữu màu trắng ngà đặc trưng, là gam màu ấm áp nhưng vẫn có được chất tinh khiết của gam màu trắng. Khác với bề mặt thân giày, logo NY có phần sẫm màu hơn và được thiết kế tách biệt và nổi khối lên hẳn thân giày đơn sắc với nét viền màu đen, đồng thời là điểm nhấn có kích thước đủ lớn để làm toát lên vẻ đẹp tinh tế của cả đôi giày. Form dáng thể thao cùng bộ đế tạo hiệu ứng chiều cao lên tới 6cm chắc chắn cũng là một trong những điểm cộng hoàn hảo với những ai thích sự thay đổi về vóc dáng bản thân, giúp bạn tràn đầy tự tin với mọi phong cách mà bạn theo đuổi.', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-bigball-chunky-a-new-york-yankees-ivory-3ashc101n-50ivs-1.jpg?v=1649407860810', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-bigball-chunky-a-new-york-yankees-ivory-3ashc101n-50ivs-4.jpg?v=1649407861717', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-bigball-chunky-a-new-york-yankees-ivory-3ashc101n-50ivs-5.jpg?v=1649407862187', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-bigball-chunky-a-new-york-yankees-ivory-3ashc101n-50ivs-6.jpg?v=1649407862490', 7),
(19, 'MLB Mule Playball Origin New York Yankees Black', 1690000, 'Mang trên mình phối màu đen nguyên bản và kiểu thiết kế giày hở gót hiện đại, giày MLB Mule Playball Origin New York Yankees Black là lựa chọn vô cùng hợp lý dành cho khách hàng yêu thích sự trẻ trung, thuần túy và tiện lợi ở một mẫu giày đến từ thương hiệu thời trang MLB Korea. Có thể nói rằng đây là mẫu sản phẩm rất được ưa chuộng ở Việt Nam bởi không khó để bắt gặp một số bạn trẻ lựa chọn mẫu giày này để phối đồ thời trang khi xuống phố.\r\n\r\nKhông chỉ mang tính thẩm mỹ, với thiết kế Mule hở gót thì mẫu giày này còn mang đến tính tiện lợi, đây là điều mà những mẫu giày truyền thống như Bigball Chunky hay Playball không thể nào có được. Cách sử dụng thì tương tự như một đôi dép nhưng nó vẫn là một đôi giày với phần mũi kín, đồng thời phần thân giày cũng rất ôm chân, kháng bụi và kháng nước ở mức khá, vì thế đây chính là mẫu giày hoàn hảo để phục vụ cho nhiều mục đích khác nhau như đi du lịch hay dạo phố.', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-mule-playball-origin-new-york-yankees-3amuua11n-50bks-1.jpg?v=1668304460317', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-mule-playball-origin-new-york-yankees-3amuua11n-50bks-3.jpg?v=1668304460317', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-mule-playball-origin-new-york-yankees-3amuua11n-50bks-4.jpg?v=1668304460317', 'https://bizweb.dktcdn.net/100/446/974/products/giay-mlb-mule-playball-origin-new-york-yankees-3amuua11n-50bks-5.jpg?v=1668304460317', 7),
(20, '550', 2100000, 'The original 550 debuted in 1989 and made its mark on basketball courts from coast to coast. After its initial run, the 550 was filed away in the archives, before being reintroduced in limited-edition releases in late 2020, and returned to the full-time lineup in 2021, quickly becoming a global fashion favorite. The 550’s low top, streamlined silhouette offers a clean take on the heavy-duty designs of the late ‘80s, while the dependable leather, synthetic, and mesh upper construction is a classic look in any era.', 'https://nb.scene7.com/is/image/NB/bb550sta_nb_03_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/bb550sta_nb_04_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/bb550sta_nb_07_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/bb550sta_nb_06_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 8),
(21, 'Made in USA 998 Core', 3900000, 'A true embodiment of New Balance\'s timeless design and performance innovation returns to the MADE in USA lineup in 2023. The original 998, released in 1993, was the first shoe to utilize ABZORB cushioning. This revolutionary step forward in shock absorption was matched visually with a sleek update to the classic 99X series look. The MADE in USA 998 features an OG grey colorway in a premium pigskin suede and mesh upper construction.\r\n\r\nNew Balance MADE U.S. footwear contains a domestic value of 70% or more. MADE makes up a limited portion of New Balance’s US sales.', 'https://nb.scene7.com/is/image/NB/u998gr_nb_02_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/u998gr_nb_05_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/u998gr_nb_03_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 'https://nb.scene7.com/is/image/NB/u998gr_nb_04_i?$pdpflexf2$&qlt=80&fmt=webp&wid=440&hei=440', 8),
(22, 'URBAS SC - MULE - FOLIAGE', 580000, 'Dành cho người ăn chay', 'https://ananas.vn/wp-content/uploads/Pro_AV00201_1.jpg', 'https://ananas.vn/wp-content/uploads/Pro_AV00201_2.jpg', 'https://ananas.vn/wp-content/uploads/Pro_AV00201_3.jpg', 'https://ananas.vn/wp-content/uploads/Pro_AV00201_4.jpg', 9),
(23, 'URBAS SC - MULE - DUSTY BLUE', 580000, '', 'https://ananas.vn/wp-content/uploads/Pro_AV00196_1.jpg', 'https://ananas.vn/wp-content/uploads/Pro_AV00196_2.jpg', 'https://ananas.vn/wp-content/uploads/Pro_AV00196_3.jpg', 'https://ananas.vn/wp-content/uploads/Pro_AV00196_4.jpg', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_sneaker`
--
ALTER TABLE `order_sneaker`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_sneaker`
--
ALTER TABLE `order_sneaker`
  ADD CONSTRAINT `order_sneaker_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_sneaker_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sneakers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sneakers`
--
ALTER TABLE `sneakers`
  ADD CONSTRAINT `sneakers_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
