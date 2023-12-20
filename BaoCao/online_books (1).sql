-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 19, 2023 lúc 10:40 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `online_books`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_name` char(20) NOT NULL,
  `admin_email` char(30) NOT NULL,
  `admin_pass` char(15) NOT NULL,
  `display_name` varchar(30) NOT NULL,
  `admin_status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pass`, `display_name`, `admin_status`) VALUES
(1, 'Vonguyenvippro123', 'wwwdoanvonguyen@gmail.com', '123456', 'Nguyên admin', 1),
(2, 'Nhathuy2', 'nhathuy2443@gmail.com', '123456', 'Huy FE', 1),
(3, 'Vyz123', 'dinhvy215@gmail.com', '123456', 'Vỹ handsome', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Don Gabor'),
(2, 'TS. Nguyễn Văn Hậu'),
(3, 'Jack London'),
(4, 'Elliott'),
(5, 'Alice A. Bailey'),
(6, 'John Gray'),
(7, 'Donald J. Trump and  Tony Schwartz'),
(8, 'John Vũ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author_id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `description`, `cover`, `category_id`, `file`) VALUES
(3, 'Tiếng gọi nơi hoang dã', 3, 'Tiếng Gọi Nơi Hoang Dã là một tiểu thuyết của nhà văn Mỹ Jack London. Cốt truyện kể về một con chó tên là Buck đã được thuần hóa, cưng chiều.\r\n\r\nĐến với tiếng gọi nơi hoang dã, Jack London mới thể hiện tất cả sức mạnh của ngòi bút và tư tưởng của mình. Ngược với Nanh trắng, chú chó Buck đã từ thế giới văn minh tìm ngược về nơi hoang dã, đi theo tiếng gọi tự do chân chính của giống nòi.\r\n\r\nTuy nhiên, thẳm sâu trong Buck vẫn vương vấn tình cảm với con người duy nhất mà nó yêu thương yêu. Buck tồn tại độc lập với tính cách độc đáo, như một nhân vật không thể bị che lấp.\r\n\r\nTình yêu nhiệt thành với cuộc sống đã tạo nên những trang viết đầy sức cuốn hút của Jack London và khiến các tác phẩm của ông được yêu mến trên toàn thế giới.', 'TCTW.jpg', 3, 'TCTW.pdf'),
(4, 'Elliott', 4, 'Cuốn sách Hướng Dẫn Giao Dịch Theo Sóng Elliott pdf giả định bạn đọc là những người đã quen thuộc với Nguyên Lý Sóng Elliott và cách thức ứng dụng lý thuyết này. Giống như nhiều cuốn sách dạy chiến thuật đánh cờ tướng (luôn giả định bạn phải có những kiến thức cơ bản về cách chơi cờ), cuốn sách này cũng giả định bạn đọc đã nắm sơ lược các kiến thức cơ bản về một số mẫu hình Sóng Elliott và làm thế nào để kết hợp chúng lại với nhau.', 'Elliott.jpg', 4, 'Elliott.pdf'),
(1, 'Words that win', 1, 'Sách Sức mạnh của Ngôn từ sẽ mang đến cho bạn câu trả lời thỏa đáng đối với câu hỏi trên đồng thời sẽ tặng bạn rất nhiều từ ngữ kỳ diệu, những câu chữ tinh tế, những cách mở đầu thu hút cử tọa đến không ngờ, các ngữ cảnh giao tiếp và ví dụ minh họa cực kỳ sinh động…', 'WTW.jpg', 1, 'WTW.pdf'),
(2, 'Python', 2, 'Cuốn sách này dành cho người mới học lập trình và mong muốn học Python từ đầu. Nó cung cấp một cơ sở vững chắc trong lập trình Python và cung cấp kiến thức và kỹ năng cần thiết để bắt đầu phát triển ứng dụng Python đơn giản.\r\n\r\nNếu bạn đã có kiến thức cơ bản về Python và muốn nâng cao kỹ năng lập trình, có thể bạn nên tìm các cuốn sách giới thiệu về chủ đề cụ thể hoặc thư viện Python như web development, machine learning, data science, và nhiều lĩnh vực khác.', 'Python.jpg', 2, 'Python.pdf'),
(5, 'Chiêm Tinh Học', 5, 'Sách Chiêm Tinh Học là một thể loại sách chuyên về nghiên cứu và khám phá về việc đoán trước tương lai, dự đoán sự kiện, và hiểu về tính cách của con người thông qua các phương pháp chiêm tinh. Chiêm tinh học liên quan đến việc xem xét các yếu tố như sao chổi, các hành tinh, các vị trí của các ngôi sao và các sự kiện thiên văn để đưa ra những thông tin và dự đoán về cuộc sống của con người.', 'CTH.jpg', 5, 'CTH.pdf'),
(6, 'Đàn ông sao hỏa đàn bà sao kim', 6, 'Sách Đàn Ông Sao Hỏa Đàn Bà Sao Kim  là một trong những cuốn sách tâm lý tình yêu, gia đình xuất sắc mà bạn thực sự nên có trên tủ sách. Ngoài việc bàn về sự khác biệt giới tính, dẫn tới hai giới hiểu lầm nhau. Cuốn sách còn giúp chúng ta tự hiểu hơn về chính mình. Và lý giải hành động của mình trong một mối quan hệ.\r\nSách Đàn Ông Sao Hỏa Đàn Bà Sao Kim giúp bạn đọc phần nào có thể lý giải được tâm tư tình cảm của nửa còn lại, từ đó 2 người thấu hiểu nhau hơn, xây dựng nên một mối quan hệ bền chặt hơn trong tình yêu, và đặc biệt là hôn nhân.', 'DOSH.jpg', 6, 'DOSH.pdf'),
(7, 'The Art of the Deal', 7, 'Sách Nghệ Thuật Đàm Phán - The Art of the Deal là một tác phẩm quan trọng trong lĩnh vực kinh doanh và tự phát triển cá nhân, được viết bởi Donald J. Trump và Tony Schwartz. Cuốn sách này được xuất bản lần đầu vào năm 1987 và nhanh chóng trở thành một trong những quyển sách kinh doanh nổi tiếng nhất của thập kỷ đó.', 'Ebook.jpg', 7, 'Ebook.pdf'),
(8, 'Muôn Kiếp Nhân Sinh', 8, 'Cuốn sách là câu chuyện về những tiền kiếp mà một người bạn của GS John Vũ (Nguyên Phong) kể lại. Trong hành trình đó và trong giới hạn của cuốn sách, người này được trải nghiệm bản thân mình ở 2 tiền kiếp, một là ở nền văn minh Atlantis đã từng xuất hiện trên trái đất và cuối cùng bị huỷ diệt, chìm sâu dưới đáy đại dương; hai là ở những kỳ cuối của nền văn minh Ai Cập cổ.\r\nCuốn sách mở đầu bằng cuộc gặp gỡ giữa những nhà khoa học danh tiếng và một vị hoà thượng. Từ những trang đầu, cuốn sách đã hấp dẫn vì chính những nhà khoa học đã hoài nghi về nền khoa học thực nghiệm, đánh đổ giả thuyết về sự hình thành vũ trụ qua vụ nổ Big Bang, và cả thuyết tiến hoá của Darwin.', 'MKNS.jpg', 8, 'MKNS.pdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'IT'),
(2, 'English'),
(3, 'Film'),
(4, 'Kinh doanh'),
(5, 'Tâm Linh'),
(6, 'Vỹ Mô'),
(7, 'Giải trí'),
(8, 'Giáo Khoa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'huy123', 'nhathuy123@gmail.com', '123'),
(2, 'huy456', 'nhathuy456@gmail.com', '456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
