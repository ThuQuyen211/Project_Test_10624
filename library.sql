-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 11:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `au_id` int(11) NOT NULL,
  `au_name` varchar(50) NOT NULL,
  `date` year(4) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`au_id`, `au_name`, `date`, `image`, `note`) VALUES
(1, 'Nam Cao', '1917', 'Nha-van-Nam-Cao.png', 'Nam Cao là một nhà văn, nhà thơ, nhà báo và cũng là một chiến sĩ, liệt sỹ người Việt Nam. Ông là nhà văn hiện thực lớn, một nhà báo kháng chiến, một trong những nhà văn tiêu biểu nhất thế kỷ 20.'),
(2, 'Hồ Anh Thái', '1960', 'Tac-Gia-Ho-Anh-Thai.jpg', 'Hồ Anh Thái là một nhà văn đương đại của Việt Nam, ông được xem như một hiện tượng văn chương của thế hệ văn nhân thời hậu chiến sau 1975. Ông được bầu là chủ tịch Hội Nhà văn Hà Nội hai nhiệm kỳ'),
(4, 'Nguyễn Duy Cần', '1907', 'Tac-Gia-Nguyen_Duy_Can.jpg', 'Nguyễn Duy Cần (1907-1998), hiệu Thu Giang, là một học giả, nhà văn, nhà biên khảo và trước tác kỳ cựu vào bậc nhất Việt Nam giữa thế kỷ 20.Ông làm nghề viết sách, dạy học, lương y, nghiên cứu Đạo học, Kinh Dịch, với các biệt hiệu: Thu Giang, Hoàng Hạc, Bảo Quang Tử, Linh Chi… Ông sống cùng thời với các học giả và nhà văn như: Nguyễn Hiến Lê, Giản Chi, Hoàng Xuân Việt, Phạm Cao Tùng…Ông nổi bật không chỉ về số lượng tác phẩm đồ sộ mà còn ở độ sâu học thuật và sức ảnh hưởng về mặt tư tưởng đến các tầng lớp thanh niên trí thức của ông.'),
(6, 'Dale Carnegie', '0000', 'Tac-Gia-carnegie.jpg', 'Dale Breckenridge Carnegie (trước kia là Carnagey cho tới năm 1922 và có thể một thời gian muộn hơn) (24 tháng 11 năm 1888 – 1 tháng 11 năm 1955) là một nhà văn và nhà thuyết trình Mỹ và là người phát triển các lớp tự giáo dục, nghệ thuật bán hàng, huấn luyện đoàn thể, nói trước công chúng và các kỹ năng giao tiếp giữa mọi người. Ra đời trong cảnh nghèo đói tại một trang trại ở Missouri, ông là tác giả cuốn Đắc Nhân Tâm, được xuất bản lần đầu năm 1936, một cuốn sách hàng bán chạy nhất và được biết đến nhiều nhất cho đến tận ngày nay, nội dung nói về cách ứng xử, cư xử trong cuộc sống. Ông cũng viết một cuốn tiểu sử Abraham Lincoln, với tựa đề Lincoln con người chưa biết, và nhiều cuốn sách khác.'),
(8, 'Paulo Coelho', '1947', 'Tac-gia-pcbio.png', 'Paulo Coelho sinh tại Rio de Janeiro (Brasil). Ông học đại học trường luật, nhưng đã bỏ học năm 1970 để du lịch qua México, Peru, Bolivia và Chile, cũng như châu Âu và Bắc Phi. Hai năm sau, ông trở về Brasil và bắt đầu soạn lời nhạc pop. Ông cộng tác với những nhạc sĩ pop như Raul Seixas. Năm 1974, ông bị bắt giam một thời gian ngắn vì những hoạt động chống lại chế độ độc tài thời đó ở Brazil.Sách của ông đã bán ra hơn 86 triệu bản trên 150 nước và được dịch ra 56 thứ tiếng. Ông đã nhận được nhiều giải thưởng của nhiều nước, trong đó tác phẩm Veronika quyết chết (Veronika decide morrer) được đề cử cho Giải Văn chương Dublin IMPAC Quốc tế.'),
(10, 'Nguyễn Nhật Ánh', '1955', 'Tac-Gia-Nguyen-Nhat-Anh.jpg', 'Nguyễn Nhật Ánh (sinh ngày 7 tháng 5 năm 1955)[1] là một nam nhà văn người Việt Nam. Được xem là một trong những nhà văn hiện đại xuất sắc nhất Việt Nam hiện nay, ông được biết đến qua nhiều tác phẩm văn học về đề tài tuổi trẻ. Nhiều tác phẩm của ông được độc giả và giới chuyên môn đánh giá cao, đa số đều đã được chuyển thể thành phim.  Ông lần lượt viết về sân khấu, phụ trách mục tiểu phẩm, phụ trách trang thiếu nhi và hiện nay là bình luận viên thể thao trên báo Sài Gòn Giải phóng Chủ nhật với bút danh Chu Đình Ngạn. Ngoài ra, ông còn có những bút danh khác như Anh Bồ Câu, Lê Duy Cật, Đông Phương Sóc, Sóc Phương Đông.'),
(13, 'Harper Lee', '1926', 'Tac-gia-Lee.jpg', 'Nelle Harper Lee (28 tháng 4 năm 1926 – 19 tháng 2 năm 2016), thường được biết tới với tên Harper Lee, là một nữ nhà văn người Mỹ. Bà được biết tới nhiều nhất qua tiểu thuyết đầu tay Giết con chim nhại (To Kill a Mockingbird). Ngày 5 tháng 11 năm 2007, Harper Lee đã được tổng thống George W. Bush trao Huân chương Tự do Tổng thống Hoa Kỳ (Presidential Medal of Freedom), huân chương cao quý nhất dành cho công dân Hoa Kỳ, vì những đóng góp của bà cho văn học Mỹ.[1]  Vào tháng 2 năm 2015, luật sư của Lee xác nhận xuất bản cuốn tiểu thuyết thứ 2, Đặt người vọng canh (Go Set a Watchman). Được sáng tác vào giữa thập niên 1950, quyển sách phát hành vào tháng 7 năm 2015 như là phần tiếp theo của Giết con chim nhại.[2][3][4]'),
(17, 'Robert Kiyosaki', '1955', 'Tac-Gia-Robert-Kiyosaki.jpg', ''),
(31, 'Thạch Lam', '1910', 'Tac-Gia-Thach-Lam.jpg', ''),
(32, 'Vũ Trọng Phụng', '0000', 'Tac-Gia-Vu-Trong-Phung.jpg', ''),
(36, 'Xuân Diệu', '1916', 'Tac-Gia-Xuan-Dieu.jpg', 'Ngô Xuân Diệu (2 tháng 2 năm 1916 — 18 tháng 12 năm 1985), là nhà thơ, nhà báo, nhà văn viết truyện ngắn, nhà phê bình văn học và chính khách người Việt Nam. Ông là một trong những nhà thơ tiêu biểu trong phong trào Thơ mới đầu thế kỷ XX.  Được đánh giá là '),
(37, 'Chế Lan Viên', '1920', 'Tac-Gia-Che-Lan-Vien.jpg', 'Phan Ngọc Hoan, sinh ngày 20 tháng 10 năm 1920 (tức ngày 9 tháng 9 năm Canh Thân) tại xã Cam An, huyện Cam Lộ, tỉnh Quảng Trị.[1]  Ông lớn lên và theo học ở Quy Nhơn, đỗ bằng Thành chung (THCS hay cấp II hiện nay) thì thôi học, đi dạy tư kiếm sống. Có thể xem Quy Nhơn, Bình Định là quê hương thứ hai của Chế Lan Viên, nơi đã để lại những dấu ấn sâu sắc trong tâm hồn của thi sĩ tài ba.'),
(46, 'Test12', '2024', 'Compte à rebours du Nouvel An (1).png', 'test1'),
(48, 'Cao Minh', '1974', 'download.png', 'Sinh năm 1974 tại Bắc Kinh, Trung Quốc. Trước đó, Cao Minh có cuốn Thiên tài bên trái, kẻ điên bên phải (đã xuất bản ở Việt Nam), ghi ghép quan sát của những người mắc bệnh tâm thần. Năm 2016, tác phẩm nằm trong bảng xếp hạng sách giấy bán chạy của Amazon.');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `au_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `pub_id` int(11) NOT NULL,
  `page` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `summary` varchar(1000) NOT NULL,
  `creat_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `au_id`, `cate_id`, `pub_id`, `page`, `status`, `image`, `summary`, `creat_at`) VALUES
(1, 'Lão Hạc', 1, 1, 1, 206, 'Còn', 'lao-hac-nam-cao.jpg', 'Lão Hạc là một truyện ngắn của nhà văn Nam Cao được viết năm 1943. Tác phẩm được đánh giá là một trong những truyện ngắn khá tiêu biểu của dòng văn học hiện thực, nội dung truyện đã phần nào phản ánh được hiện trạng xã hội Việt Nam trong giai đoạn trước Cách mạng tháng Tám.Lão Hạc, một người nông dân chất phác, hiền lành. Lão góa vợ và có một người con trai nhưng vì quá nghèo nên không thể lấy vợ cho người con trai của mình. Người con trai lão vì thế đã rời bỏ quê hương để đến đồn điền cao su làm ăn kiếm tiền. Lão luôn trăn trở, suy nghĩ về tương lai của đứa con. Lão sống bằng nghề làm vườn, mảnh vườn mà vợ lão đã mất bao công sức để mua về và để lại cho con trai lão. So với những người khác lúc đó, gia cảnh của lão khá đầy đủ, tuy nhiên do ốm yếu hơn hai tháng và cũng vì trận bão mà lão không có việc gì để làm. Lão đã rất dằn vặt bản thân mình khi mang một', '2024-10-15 12:47:16'),
(2, 'Điêu tàn', 37, 1, 1, 56, 'Còn', 'dieu-tan.jpg', 'Chế Lan Viên thì lại viết thêm rằng: “Làm thơ là làm sự phi thường. Thi sĩ không phải là Người. Nó là Người mơ, Người say, Người điên. Nó là Tiên, là Ma, là Quỷ, là Tinh, là Yêu. Nó thoát hiện tại. Nó xối trộn Dĩ vãng. Nó ôm trùm tương lai… Thế mà có người tự cho là hiểu được nó, rồi đem nó so sánh với Người, và chê nó là giả dối, không chân thật. Vâng, nó không chân thật, nó giả dối với Người. Với nó, cái gì nó nói đều có cả”. Đó chính là lý do để thơ Chế Lan Viên lại hấp dẫn độc giả đến thế, và cũng chính là lý do để nhiều người viết về thơ ông.', '2024-10-15 12:47:16'),
(3, 'Thơ Xuân Diệu', 36, 1, 2, 180, 'Còn', 'tho-xuan-dieu.jpg', 'Trong sự nghiệp sáng tác thơ văn của mình, Xuân Diệu được biết đến như là một nhà thơ lãng mạn trữ tình, “Nhà thơ mới nhất trong các nhà thơ mới” (Hoài Thanh), “Ông hoàng của thơ tình”. Xuân Diệu là thành viên của Tự Lực Văn Đoàn và cũng đã là một trong những chủ soái của phong trào “Thơ Mới”. Tác phẩm tiêu biểu của ông ở giai đoạn này: Thơ Thơ (1938), Gửi hương cho gió (1945), truyện ngắn Phấn thông vàng (1939), Trường ca (1945).  Xuân Diệu tham gia ban chấp hành, nhiều năm là ủy viên thường vụ Hội Nhà văn Việt Nam. Từ đó, Xuân Diệu trở thành một trong những nhà thơ hàng đầu ca ngợi Cách mạng, một “dòng thơ công dân”. Bút pháp của ông chuyển biến phong phú về giọng vẻ: có giọng trầm hùng, tráng ca, có giọng chính luận, giọng thơ tự sự trữ tình. Tiêu biểu là: Ngọn quốc kỳ (1945), Một khối hồng (1964), Thanh ca (1982), Tuyển tập Xuân Diệu (1983).  Mã hàng	8935095627370 Tên Nhà Cung Cấp	Huy Hoang Bookstore Tác giả	Xuân Diệu NXB	NXB Văn học Năm XB	2019 Trọng lượng (gr)	200 Kích Thước Bao', '2024-10-15 12:47:16'),
(4, 'Chí Phèo', 1, 1, 2, 208, 'Hết', 'Chi-Pheo.jpg', 'Chí Phèo phản ánh một hiện tượng xã hội ở nông thôn Việt Nam trước năm 1945, nông dân lao động lương thiện bị đẩy vào con đường tha hoá, lưu manh hoá. Anh Chí - nạn nhân điển hình cho số phận của những người nông dân lao động lương thiện khi chịu đựng sự tàn bạo của xã hội ngày ấy. Xã hội đó không chỉ tàn phá thể xác mà còn dằn vặt, cấu nghiến tâm hồn con người. Cuối cùng, những con người lương thiện ấy bị vùi dập đến mất cả nhân hình, nhân tính.  Chủ đề của tác phẩm là phê phán xã hội phong kiến xưa cũ lúc bấy giờ. Nhân vật trong truyện chính là con người, mà con người lại chính là nhân vật. Nhà văn Nam Cao cũng đã đề cao, khẳng định và trân trọng những phẩm chất tốt đẹp, cao quý của Chí Phèo, Thị Nở. Chí Phèo là một tác phẩm có giá trị hiện thực và giá trị nhân đạo sâu sắc, mới mẻ.', '2024-10-15 12:47:16'),
(5, 'Cho tôi xin một vé đi tuổi thơ', 10, 2, 6, 218, 'Còn', 've-di-tuoi-tho.jpg', '&quot;Cho tôi xin một vé đi tuổi thơ&quot; là một đầu truyện ngắn của nhà văn Nguyễn Nhật Ánh. Tác phẩm là một trong những sáng tác thành công nhất của ông và nhận được Giải thưởng Văn học ASEAN của năm 2010.  Nguyễn Nhật Ánh viết ở mặt sau cuốn sách: &quot;Tôi viết cuốn sách này không dành cho trẻ em. Tôi viết cho những ai từng là trẻ em&quot;. Trả lời phỏng vấn của báo Người lao động, ông nói &quot;đối tượng cảm thụ mà tôi muốn nhắm tới là người lớn&quot;, với Cho tôi xin một vé đi tuổi thơ ông &quot;cho phép mình mở rộng biên độ đề tài và hình ảnh đến tối đa vì tôi viết về trẻ em nhưng là cho những ai từng là trẻ em đọc&quot;.', '2024-10-15 12:47:16'),
(6, 'Cái Dũng Của Thánh Nhân', 4, 1, 1, 168, 'Còn', 'Cai-dung-cua-thanh-nhan.jpg', 'Quan niệm cái “Dũng” của tác giả Thu Giang không phải là cái dũng cơ bắp, cái dũng sức mạnh hay cái dũng thấy chuyện bất bình giữa đường ra tay nghĩa hiệp. Cái dũng của thánh nhân đề cập ở đây là cái dũng về sự chiến thắng bản thân, chiến thắng sự nhỏ nhen ích kỷ để mong cầu một cái dũng thật sự mạnh mẽ xuất phát từ nội tâm, ái dũng siêu thoát khỏi những ràng buộc yếu hèn với thế giới vật chất. Cái dũng ở đây bàn đến cách ứng xử của con người trong xã hội và các phương pháp tu dưỡng để đạt đến một tinh thần điềm đạm, an nhiên trước mọi hoàn cảnh khó khăn sóng gió của cuộc đời.  Nội dung của nó không chỉ kể về những câu chuyện kể về sự dũng cảm của người xưa mà còn bàn phương pháp cụ thể để rèn luyện đến một tinh thần điềm đạm. Do đó, cuốn cẩm nang này cần được đem ứng dụng vào chính bản thân mỗi người và đời sống hàng ngày.  Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khá', '2024-10-15 12:47:16'),
(11, 'Thiên tài bên trái kẻ điên bên phải', 48, 6, 1, 424, 'Còn', '50908574.jpg', 'NẾU MỘT NGÀY ANH THẤY TÔI ĐIÊN, THỰC RA CHÍNH LÀ ANH ĐIÊN ĐẤY!  Hỡi những con người đang oằn mình trong cuộc sống, bạn biết gì về thế giới của mình? Là vô vàn thứ lý thuyết được các bậc vĩ nhân kiểm chứng, là luật lệ, là cả nghìn thứ sự thật bọc trong cái lốt hiển nhiên, hay những triết lý cứng nhắc của cuộc đời?', '2024-10-15 12:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(30) NOT NULL,
  `note` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `note`) VALUES
(1, 'Văn học Việt Nam 1', 'Văn học dân gian là nền tảng của văn học viết, là chặng đầu của nền văn học dân tộc. Khi chưa có chữ viết, nền văn học Việt Nam chỉ có văn học dân gian; khi có chữ viết, nền văn học Việt Nam mới bao gồm hai bộ phận: văn học dân gian và văn học viết.'),
(2, 'Sách tâm lý, tình cảm', 'Sách tâm lý tình cảm thường là những cuốn truyện ngắn hay những cuốn tiểu thuyết dài kỳ. Trong các thể loại sách thì thể loại sách tâm lí tình cảm có lẽ là một trong những cuốn sách có doanh số cao nhất. Có lẽ bởi con người luôn tìm kiếm, mưu cầu về chuyện yêu thương và tình cảm vì vậy mà lựa chọn thể loại sách này.\r\n\r\nVà nội dung mà mọi người hay tìm kiếm nhất ở thể loại này là về những mối quan hệ tình cảm yêu đương, tình cảm giữa con cái và cha mẹ. Nhưng được kể dưới nhiều góc độ và hoàn cảnh khác nhau mà cho ra đời hàng vạn câu chuyện chưa bao giờ bị chung đụng.'),
(3, 'Sách tôn giáo', 'Sách tôn giáo là sách nói về tư tưởng tôn giáo, nguồn gốc ra đời. Đây nơi ghi chép các giáo lý, nguyên tắc và lời dạy bảo. Trong đó nêu rõ về những đạo lý và triết lý đạo đức, xã hội đến từ đâu. Và cách mà ta có thể sử dụng chúng, áp dụng chúng vào cuộc sống hàng ngày. Đôi khi nó còn là con đường để dẫn bạn đến lối suy nghĩ an lành và tích cực hơn. Sách tôn giáo thường hướng thiện, chỉ dẫn cho con người cách để hoà nhịp vào cuộc sống một cách nhẹ nhàng, an yên.'),
(4, 'Sách lịch sử', 'Để có được con người, đời sống, xã hội ngày nay thì cần phải có cả một quá trình. Vậy quá trình đã qua này được gọi là gì? Nó chính là lịch sử và để lịch sử không bị quên đi thì người ta phải ghi chép lại. Đây chính là nguồn gốc ra đời của sách lịch sử.\r\n\r\nSách lịch sử nói về những dấu mốc những sự kiện lịch sử đã qua. Nó vừa là bài học vừa là lời khuyên dạy để chúng ta học những cái tốt và lược bỏ đi những cái xấu không đi lại vào vết xe đổ.\r\n\r\nSách lịch sử có những dấu mốc thời gian và thời điểm cụ thể. Tại mỗi thời điểm lại có những con người, sự việc và sự kiện xảy ra khác nhau. Những cuốn sách này rất phù hợp cho những người yêu thích tìm hiểu lịch sử con người, văn hoá khắp nơi trên thế giới.'),
(6, 'Sách tự lực', 'Là thể loại sách được viết với mục đích hướng dẫn độc giả giải quyết những vấn đề cá nhân.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(5, 'PhamThiThuQuyen', 'tq09385599@gmail.com', '123', '2024-06-20 02:03:02'),
(6, 'PhamThiThuQuyen', 'tq09385599@gmail.com', '123', '2024-06-20 02:04:55'),
(7, 'PhamThiThuQuyen', 'tq09385599@gmail.com', '123', '2024-06-20 02:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `author`, `created_at`) VALUES
(1, 'Sách mới', 'Những cuốn sách thú vị 1234', 'Cô Hải', '2024-06-20 02:34:16'),
(2, 'Những cuốn sách tháng 06', 'Chí Phèo\r\nSố Đỏ', 'Cô Hải', '2024-06-20 03:29:26'),
(3, 'dsdf', 'dfsfds', 'dsfds', '2024-10-08 17:46:33'),
(4, 'dsdf', 'dfsfds', 'dsfds', '2024-10-08 17:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `pub_id` int(11) NOT NULL,
  `pub_name` varchar(30) NOT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`pub_id`, `pub_name`, `year`) VALUES
(1, 'Kim Đồng1', '1999'),
(2, 'Văn Học', '1957'),
(3, 'Giáo dục Việt Nam', '1957'),
(4, 'Giáo dục Việt Nam', '1957'),
(6, ' Nhà xuất bản Trẻ', '1981'),
(8, 'Nhà xuất bản Nhã Nam ', '2005');

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `read_id` int(11) NOT NULL,
  `read_name` varchar(50) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reader`
--

INSERT INTO `reader` (`read_id`, `read_name`, `address`, `phone`, `mail`) VALUES
(4, 'Hồ Ngọc Hà', 'Quảng Ninh12', '0938559966', 'ha@gmail.com'),
(5, 'Trần Quốc Đạt', 'Quảng Ninh', '0938559955', 'dat@gmail.com'),
(6, 'Long', 'Hải Phòng', '0985667867', 'long@gmail.com'),
(7, 'Uyên', 'Hà Nội', '0111111111', 'uyen@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `action` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `title`, `image`, `action`) VALUES
(1, 'Lợi ích đọc sách', 'slide1.png', 1),
(2, 'Những cuốn sách nên đọc', 'slide2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `read_id` int(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `read_id`, `username`, `password`, `level`) VALUES
(5, NULL, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(6, NULL, 'hai', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`au_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `matacgia` (`au_id`,`cate_id`),
  ADD KEY `matheloai` (`cate_id`),
  ADD KEY `manhaxuatban` (`pub_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`pub_id`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`read_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `madocgia` (`read_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `au_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reader`
--
ALTER TABLE `reader`
  MODIFY `read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`au_id`) REFERENCES `author` (`au_id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`pub_id`) REFERENCES `publisher` (`pub_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`read_id`) REFERENCES `reader` (`read_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
