-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2021 lúc 11:45 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`id`, `name`, `slug`, `birthday`, `avatar`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Nhật Ánh', 'nguyen-nhat-anh-720', '1955-05-07', '616d0a39473e5-nguyen-nhat-anh.jpg', 0, '<p><strong>Nguyễn Nhật Ánh</strong>&nbsp;(sinh ngày&nbsp;<a href=\"https://vi.wikipedia.org/wiki/7_th%C3%A1ng_5\" title=\"7 tháng 5\">7 tháng 5</a>&nbsp;năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1955\" title=\"1955\">1955</a>)<sup><a href=\"https://vi.wikipedia.org/wiki/Nguy%E1%BB%85n_Nh%E1%BA%ADt_%C3%81nh#cite_note-1\">[1]</a></sup>&nbsp;là một nhà văn Việt Nam. Ông được biết đến qua nhiều tác phẩm văn học về đề tài tuổi trẻ, các tác phẩm của ông rất được độc giả ưa chuộng và nhiều tác phẩm đã được chuyển thể thành phim.</p>\r\n\r\n<p>Ông lần lượt viết về sân khấu, phụ trách mục tiểu phẩm, phụ trách trang thiếu nhi và hiện nay là bình luận viên thể thao trên báo&nbsp;<em>Sài Gòn Giải phóng Chủ nhật</em>&nbsp;với bút danh&nbsp;<em>Chu Đình Ngạn</em>. Ngoài ra, ông còn có những bút danh khác như Anh Bồ Câu, Lê Duy Cật, Đông Phương Sóc, Sóc Phương Đông,...</p>\r\n\r\n<h2>Cuộc đời và sự nghiệp</h2>\r\n\r\n<p>Nguyễn Nhật Ánh sinh ngày 7 tháng 5 năm 1955 tại&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=L%C3%A0ng_%C4%90o_%C4%90o&amp;action=edit&amp;redlink=1\" title=\"Làng Đo Đo (trang chưa được viết)\">làng Đo Đo</a>, xã&nbsp;<a href=\"https://vi.wikipedia.org/wiki/B%C3%ACnh_Qu%E1%BA%BF\" title=\"Bình Quế\">Bình Quế</a>, huyện&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Th%C4%83ng_B%C3%ACnh\" title=\"Thăng Bình\">Thăng Bình</a>, tỉnh&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Qu%E1%BA%A3ng_Nam\" title=\"Quảng Nam\">Quảng Nam</a>. Thuở nhỏ ông theo học tại các trường&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=THPT_Ti%E1%BB%83u_La&amp;action=edit&amp;redlink=1\" title=\"THPT Tiểu La (trang chưa được viết)\">THPT Tiểu La</a>,&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=THPT_chuy%C3%AAn_ban_Tr%E1%BA%A7n_Cao_V%C3%A2n&amp;action=edit&amp;redlink=1\" title=\"THPT chuyên ban Trần Cao Vân (trang chưa được viết)\">THPT chuyên ban Trần Cao Vân</a>&nbsp;và&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=THCS_Phan_Ch%C3%A2u_Trinh&amp;action=edit&amp;redlink=1\" title=\"THCS Phan Châu Trinh (trang chưa được viết)\">THCS Phan Châu Trinh</a>. Từ năm 1973, ông chuyển vào sống tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Th%C3%A0nh_ph%E1%BB%91_H%E1%BB%93_Ch%C3%AD_Minh\" title=\"Thành phố Hồ Chí Minh\">Sài Gòn</a>, theo học&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Ng%C3%A0nh_s%C6%B0_ph%E1%BA%A1m&amp;action=edit&amp;redlink=1\" title=\"Ngành sư phạm (trang chưa được viết)\">ngành sư phạm</a>. Ông đã từng tham gia&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Thanh_ni%C3%AAn_xung_phong\" title=\"Thanh niên xung phong\">Thanh niên xung phong</a>, dạy học môn&nbsp;<a href=\"https://vi.wikipedia.org/wiki/V%C4%83n_h%E1%BB%8Dc\" title=\"Văn học\">Văn</a>&nbsp;tại trường&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=THCS_B%C3%ACnh_T%C3%A2y&amp;action=edit&amp;redlink=1\" title=\"THCS Bình Tây (trang chưa được viết)\">THCS Bình Tây</a>&nbsp;(<a href=\"https://vi.wikipedia.org/wiki/Qu%E1%BA%ADn_6\" title=\"Quận 6\">Quận 6</a>) từ năm 1983-1985.</p>\r\n\r\n<p>Năm 13 tuổi, ông đăng&nbsp;<a href=\"https://vi.wikipedia.org/wiki/B%C3%A1o_vi%E1%BA%BFt\" title=\"Báo viết\">báo</a>&nbsp;<a href=\"https://vi.wikipedia.org/wiki/B%C3%A0i_th%C6%A1\" title=\"Bài thơ\">bài thơ</a>&nbsp;đầu tiên. Tác phẩm đầu tiên in thành sách là một tập thơ tên&nbsp;<em>Thành phố tháng tư</em>&nbsp;(Nhà xuất bản Tác phẩm mới, 1984, in chung với Lê Thị Kim). Truyện dài đầu tiên của ông là tác phẩm&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/Tr%C6%B0%E1%BB%9Bc_v%C3%B2ng_chung_k%E1%BA%BFt\" title=\"Trước vòng chung kết\">Trước vòng chung kết</a></em>&nbsp;(Nhà xuất bản Măng Non, 1984)<sup><a href=\"https://vi.wikipedia.org/wiki/Nguy%E1%BB%85n_Nh%E1%BA%ADt_%C3%81nh#cite_note-2\">[2]</a></sup>. Hai mươi năm trở lại đây, ông tập trung viết văn xuôi, chuyên sáng tác về đề tài&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Thanh_thi%E1%BA%BFu_ni%C3%AAn\" title=\"Thanh thiếu niên\">thanh thiếu niên</a>.</p>\r\n\r\n<p>Năm 1990, truyện dài&nbsp;<em>Chú bé rắc rối</em>&nbsp;của ông được&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Trung_%C6%B0%C6%A1ng_%C4%90o%C3%A0n_Thanh_ni%C3%AAn_C%E1%BB%99ng_s%E1%BA%A3n_H%E1%BB%93_Ch%C3%AD_Minh\" title=\"Trung ương Đoàn Thanh niên Cộng sản Hồ Chí Minh\">Trung ương Đoàn Thanh niên Cộng sản Hồ Chí Minh</a>&nbsp;trao giải thưởng&nbsp;<em>Văn học Trẻ</em>&nbsp;hạng A. Năm 1995, ông được bình chọn là nhà văn được yêu thích nhất trong 20 năm (1975-1995) qua cuộc trưng cầu ý kiến bạn đọc về các gương mặt trẻ tiêu biểu trên mọi lĩnh vực của Thành Đoàn Thành phố Hồ Chí Minh và báo&nbsp;<em>Tuổi Trẻ</em>, đồng thời được Hội Nhà Văn Thành phố Hồ Chí Minh bình chọn là một trong 20 nhà văn trẻ tiêu biểu trong 20 năm (1975-1995).</p>\r\n\r\n<p>Năm 1998, ông được&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nh%C3%A0_xu%E1%BA%A5t_b%E1%BA%A3n_Kim_%C4%90%E1%BB%93ng\" title=\"Nhà xuất bản Kim Đồng\">Nhà xuất bản Kim Đồng</a>&nbsp;trao giải Nhà văn có sách bán chạy nhất. Năm 2003, bộ truyện nhiều tập&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/K%C3%ADnh_v%E1%BA%A1n_hoa_(truy%E1%BB%87n)\" title=\"Kính vạn hoa (truyện)\">Kính vạn hoa</a></em>&nbsp;được Trung ương Đoàn Thanh niên Cộng sản Hồ Chí Minh trao huy chương&nbsp;<em>Vì thế hệ trẻ</em>&nbsp;và được Hội Nhà Văn Việt Nam trao giải thưởng. Đến nay ông đã xuất bản gần 100 tác phẩm và từ lâu đã trở thành nhà văn thân thiết của các bạn đọc nhỏ tuổi ở Việt Nam.</p>\r\n\r\n<p>Năm 2004, Nhật Ánh ký hợp đồng với Nhà xuất bản Kim Đồng tiếp tục cho xuất bản bộ truyện dài gồm 4 phần mang tên&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/Chuy%E1%BB%87n_x%E1%BB%A9_Lang_Biang\" title=\"Chuyện xứ Lang Biang\">Chuyện xứ Lang Biang</a></em>&nbsp;nói về hai cậu bé lạc vào thế giới phù thủy. Đây là lần đầu tiên ông viết một bộ truyện hoàn toàn dựa trên trí tưởng tượng. Vì vậy, để chuẩn bị cho tác phẩm này, ông đã phải mất 6 tháng nghiên cứu tài liệu và đọc sách báo liên quan như Phù thủy và Pháp sư, Các huyền thoại phương Đông, Ma thuật và thuật phù thủy...<sup><a href=\"https://vi.wikipedia.org/wiki/Nguy%E1%BB%85n_Nh%E1%BA%ADt_%C3%81nh#cite_note-3\">[3]</a></sup></p>\r\n\r\n<p>Sau&nbsp;<em>Chuyện xứ Lang Biang</em>, tác phẩm tiếp theo của ông là bút ký của một chú cún có tên&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/T%C3%B4i_l%C3%A0_B%C3%AAt%C3%B4\" title=\"Tôi là Bêtô\">Tôi là Bêtô</a></em>.<sup><a href=\"https://vi.wikipedia.org/wiki/Nguy%E1%BB%85n_Nh%E1%BA%ADt_%C3%81nh#cite_note-4\">[4]</a></sup></p>\r\n\r\n<p>Năm 2008, ông cho ra đời tác phẩm&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/Cho_t%C3%B4i_xin_m%E1%BB%99t_v%C3%A9_%C4%91i_tu%E1%BB%95i_th%C6%A1\" title=\"Cho tôi xin một vé đi tuổi thơ\">Cho tôi xin một vé đi tuổi thơ</a></em>, được báo&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_lao_%C4%91%E1%BB%99ng_(b%C3%A1o)\" title=\"Người lao động (báo)\">Người lao động</a>&nbsp;bình chọn là tác phẩm hay nhất năm 2008.</p>\r\n\r\n<p>Năm 2012, Nhật Ánh cho ra mắt truyện dài&nbsp;<em><a href=\"https://vi.wikipedia.org/w/index.php?title=C%C3%B3_hai_con_m%C3%A8o_ng%E1%BB%93i_b%C3%AAn_c%E1%BB%ADa_s%E1%BB%95&amp;action=edit&amp;redlink=1\" title=\"Có hai con mèo ngồi bên cửa sổ (trang chưa được viết)\">Có hai con mèo ngồi bên cửa sổ</a></em>. Các tác phẩm ra đời gần đây nhất là&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/Ng%E1%BB%93i_kh%C3%B3c_tr%C3%AAn_c%C3%A2y\" title=\"Ngồi khóc trên cây\">Ngồi khóc trên cây</a></em>&nbsp;(tháng 6 năm 2013),&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/Ch%C3%BAc_m%E1%BB%99t_ng%C3%A0y_t%E1%BB%91t_l%C3%A0nh\" title=\"Chúc một ngày tốt lành\">Chúc một ngày tốt lành</a></em>&nbsp;(tháng 3 năm 2014),&nbsp;<em>Bảy bước tới mùa hè</em>&nbsp;(tháng 3 năm 2015),&nbsp;<em>Con chó nhỏ mang giỏ hoa hồng</em>&nbsp;(28 tháng 2 năm 2016),&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/C%C3%A2y_chu%E1%BB%91i_non_%C4%91i_gi%C3%A0y_xanh\" title=\"Cây chuối non đi giày xanh\">Cây chuối non đi giày xanh</a></em>&nbsp;(7 tháng 1 năm 2018) và &lsquo;&rsquo; Làm bạn với bầu trời &lsquo;&rsquo; (tháng 9 năm 2019), Con chim xanh biếc bay về (2020).</p>\r\n', '2021-09-29 15:04:07', '2021-10-18 05:46:33'),
(2, 'Robert Kiyosaki', 'robert-kiyosaki-588', '1947-08-08', '616c4a7ba7d33-Robert-Kiyosaki-1.jpg', 0, '<p><strong>Robert Toru Kiyosaki</strong>&nbsp;(sinh ngày 8 tháng 4 năm 1947) là một nhà đầu tư, doanh nhân đồng thời là một tác giả&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_M%E1%BB%B9\" title=\"Người Mỹ\">người Mỹ</a>. Kiyosaki nổi tiếng bởi cuốn sách&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/Rich_Dad,_Poor_Dad\" title=\"Rich Dad, Poor Dad\">Rich Dad, Poor Dad</a></em>&nbsp;(Cha Giàu, Cha Nghèo)<sup><a href=\"https://vi.wikipedia.org/wiki/Robert_Kiyosaki#cite_note-1\">[1]</a></sup>. Ông đã viết 18 cuốn sách, bán tổng cộng 26 triệu bản&nbsp;<a href=\"http://abcnews.go.com/2020/story?id=1982669&amp;page=1\" rel=\"nofollow\">[3]</a>. Ba trong số các cuốn sách của ông là&nbsp;<em>Rich Dad Poor Dad</em>,&nbsp;<em>Rich Dad&#39;s CASHFLOW Quadrant</em>&nbsp;và&nbsp;<em>Rich Dad&#39;s Guide to Investing</em>&nbsp;đã từng được xếp vào số 10 cuốn sách bán chạy nhất một lúc trên&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/The_Wall_Street_Journal\" title=\"The Wall Street Journal\">The Wall Street Journal</a></em>,&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/USA_Today\" title=\"USA Today\">USA Today</a></em>&nbsp;và&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/The_New_York_Times\" title=\"The New York Times\">New York Times</a></em>. Cuốn&nbsp;<em>Rich Kid Smart Kid</em>&nbsp;xuất bản năm 2001, với mục đích giúp cha mẹ dạy con cái quan niệm về tài chính của họ. Ông đã sáng chế ra trò chơi &quot;Cashflow&quot; dành cho người lớn và trẻ em cùng với tập băng &quot;Rich Dad&quot;, xuất bản tin tức thường kỳ hàng tháng và tham gia các bài phát biểu trên khắp thế giới, đồng thời viết một chuyên mục hàng tuần trên trang Yahoo Tài chính&nbsp;<sup><a href=\"https://vi.wikipedia.org/wiki/Robert_Kiyosaki#cite_note-2\">[2]</a></sup>.</p>\r\n\r\n<h2>Các cuốn sách</h2>\r\n\r\n<p>Kiyosaki nổi tiếng với cuốn sách&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/Rich_Dad,_Poor_Dad\" title=\"Rich Dad, Poor Dad\">Rich Dad, Poor Dad</a></em>, cuốn sách bán chạy nhất được tạp chí&nbsp;<em>New York Times</em>&nbsp;bình chọn. Hiện nay tác giả có ít nhất mười hai cuốn sách đã được phát hành. Một phần trong số đó được liệt kê dưới đây&nbsp;<a href=\"http://www.richdad.com/biography-of-robert-kiyosaki.html\" rel=\"nofollow\">[4]</a>.</p>\r\n\r\n<p><a href=\"https://vi.wikipedia.org/wiki/T%E1%BA%ADp_tin:Richdadpoordad.jpg\"><img alt=\"\" src=\"https://upload.wikimedia.org/wikipedia/vi/thumb/2/29/Richdadpoordad.jpg/200px-Richdadpoordad.jpg\" style=\"height:335px; width:200px\" /></a></p>\r\n\r\n<p>Bìa cuốn sách&nbsp;<em>Rich Dad, Poor Dad</em></p>\r\n\r\n<ul>\r\n	<li><em>Rich Dad, Poor Dad</em>: Người giàu dạy con cái họ về tiền bạc - người nghèo và tầng lớp trung lưu thì không! (2000)</li>\r\n</ul>\r\n\r\n<p>Bài chi tiết:&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Rich_Dad,_Poor_Dad\" title=\"Rich Dad, Poor Dad\">Rich Dad, Poor Dad</a></p>\r\n\r\n<p>Cuốn sách do tác giả tự xuất bản trước khi trở thành một trong những cuốn sách bán chạy nhất, nội dung chủ yếu tập trung vào câu chuyện so sánh giữa &quot;hai người cha&quot;. &quot;Người cha nghèo&quot; của ông là người cha đẻ, giữ chức vụ cao ở phòng giáo dục bang Hawaii. Đối lập với nhân vật đó (người ta cho là hư cấu, xem phần &quot;chỉ trích và tranh luận&quot; trong bài này), &quot;người cha giàu&quot;, bố của người bạn tốt nhất, trở thành &quot;người giàu nhất ở Hawaii&quot; nhờ biết cách đầu tư. Vấn đề chính trong sách là nhằm giúp người đọc suy ngẫm lại về tư tưởng của họ về tiền bạc và đặc biệt là quan niệm của họ tự biến mình thành người làm thuê, nhận phần thưởng tài chính nhờ tuân theo sự giáo dục sẵn có. Kiyosaki sử dụng &quot;rich dad, poor dad&quot; để so sánh giữa hai hình ảnh mà đa số mọi người đang mắc kẹt ở một bên, từ đó dẫn tới &quot;vòng chuột&quot; - cuộc sống của người dành hết thời gian làm việc để trả các món thuế, nợ, đó là do mọi người quá phụ thuộc vào yếu tố &quot;an toàn&quot;, ngại học hỏi về tài chính để thay đổi bản thân mình.</p>\r\n\r\n<ul>\r\n	<li><em>Cashflow Quadrant</em>: Hướng dẫn của người cha giàu tới sự tự do về tài chính (2000)</li>\r\n</ul>\r\n\r\n<p><em>Cashflow Quadrant</em>&nbsp;là cuốn sách viết về vấn đề tài chính cá nhân và đầu tư mà tác giả viết cùng với&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Sharon_Lechter&amp;action=edit&amp;redlink=1\" title=\"Sharon Lechter (trang chưa được viết)\">Sharon Lechter</a>, C.P.A, được coi là phần tiếp theo của cuốn&nbsp;<em>Rich Dad, Poor Dad</em>. Trong đó Kiyosaki thảo luận về cái ông ta gọi là &quot;kim tứ đồ Cashflow&quot;: một sơ đồ chia ra làm bốn với các chữ E, S, B và I. Kim tứ đồ là công cụ mô tả sự khác nhau giữa người làm công ăn lương (<strong>E</strong>mployee), người làm tư, chủ doanh nghiệp nhỏ (<strong>S</strong>elf employed/Small business owner), chủ doanh nghiệp (<strong>B</strong>usiness owner) (không trực tiếp hoạt động với công ty hết ngày này qua ngày khác) và nhà đầu tư (<strong>I</strong>nvestor). Kiyosaki đã thảo luận về sự khác nhau giữa tư tưởng giữa các nhóm phần tư đó, đặc biệt liên quan tới thu nhập thụ động và thuế giảm giá. Tác giả muốn mọi người suy nghĩ về tư tưởng của chính mình về tiền bạc.</p>\r\n\r\n<ul>\r\n	<li><em>Hướng dẫn đầu tư của Người Cha Giàu</em>: Những gì người giàu đầu tư vào, còn người nghèo và trung lưu thì không! (2000)</li>\r\n</ul>\r\n\r\n<p><em>Hướng dẫn đầu tư của Người Cha Giàu</em>&nbsp;mang đến cho người đọc một sơ đồ để trở thành nhà đầu tư cơ bản, một người sử dụng tiền của người khác để tạo sự đầu tư. Trong khi hai cuốn sách đầu tiên như một đòn đánh, thì cuốn sách này đi vào chi tiết hơn vào các chiến lược.</p>\r\n\r\n<ul>\r\n	<li><em>Con giàu, con thông minh</em>&nbsp;(2001)</li>\r\n</ul>\r\n\r\n<p><em>Con giàu, con thông minh</em>&nbsp;thuật lại những tư tưởng của Kiyosaki, được viết rất cô đọng và súc tích nhằm cố gắng giúp các bậc cha mẹ hiểu và dạy con cái họ tốt hơn về các tư tưởng tài chính. Nó gồm có một loạt các hành động mà một bậc cha mẹ cần làm với con họ để giúp chúng nhận thức được thế nào là tài sản, tài chính và nhiều cách kiếm tiền.</p>\r\n\r\n<ul>\r\n	<li><em>Lời tiên đoán của người cha giàu</em>&nbsp;(2002)</li>\r\n</ul>\r\n\r\n<p><em>Lời tiên đoán của người cha giàu</em>&nbsp;dự báo rằng thị trường sẽ sụp đổ khi...</p>\r\n\r\n<ul>\r\n	<li><em>Tại sao chúng tôi muốn bạn giàu có</em>, đồng tác giả với&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Donald_Trump\" title=\"Donald Trump\">Donald Trump</a>&nbsp;(2006)</li>\r\n</ul>\r\n\r\n<p><em>Tại sao chúng tôi muốn bạn giàu có</em>&nbsp;là một cuốn sách được cả Robert Kiyosaki và Donal Trump cùng viết. Nó động viên mọi người hãy trang bị kiến thức về tài chính&nbsp;<a href=\"http://www.whywewantyoutoberich.com/\" rel=\"nofollow\">[5]</a>&nbsp;<a href=\"https://web.archive.org/web/20091212051431/http://www.whywewantyoutoberich.com/\" rel=\"nofollow\">Lưu trữ</a>&nbsp;2009-12-12 tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Wayback_Machine\" title=\"Wayback Machine\">Wayback Machine</a>.</p>\r\n\r\n<p>Các cuốn sách khác:</p>\r\n\r\n<ul>\r\n	<li>Nếu bạn muốn giàu có và hạnh phúc mà không phải đến trường? (1992)</li>\r\n	<li>Nghỉ hưu sớm, nghỉ hưu giàu có (2001)</li>\r\n	<li>Trường học kinh doanh của người cha giàu (2003)</li>\r\n	<li>Ai lấy tiền của tôi (2004)</li>\r\n	<li>Cha giàu, cha nghèo&nbsp;<em>dành cho tuổi teen</em>&nbsp;(2004)</li>\r\n	<li>Trước khi từ bỏ công việc của bạn (2005)</li>\r\n</ul>\r\n', '2021-09-29 15:07:50', '2021-10-17 16:08:27'),
(3, 'Dale Carnegie', 'dale-carnegie-631', '1888-08-24', '616c4a8140dd6-Dale-Carnegie.jpg', 0, '<p><strong>Dale Breckenridge Carnegie</strong>&nbsp;(trước kia là&nbsp;<strong>Carnagey</strong>&nbsp;cho tới năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1922\" title=\"1922\">1922</a>&nbsp;và có thể một thời gian muộn hơn) (<a href=\"https://vi.wikipedia.org/wiki/24_th%C3%A1ng_11\" title=\"24 tháng 11\">24 tháng 11</a>&nbsp;năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1888\" title=\"1888\">1888</a>&nbsp;&ndash;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1_th%C3%A1ng_11\" title=\"1 tháng 11\">1 tháng 11</a>&nbsp;năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1955\" title=\"1955\">1955</a>) là một&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nh%C3%A0_v%C4%83n\" title=\"Nhà văn\">nhà văn</a>&nbsp;và&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Nh%C3%A0_thuy%E1%BA%BFt_tr%C3%ACnh&amp;action=edit&amp;redlink=1\" title=\"Nhà thuyết trình (trang chưa được viết)\">nhà thuyết trình</a>&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Hoa_K%E1%BB%B3\" title=\"Hoa Kỳ\">Mỹ</a>&nbsp;và là người phát triển các lớp&nbsp;<a href=\"https://vi.wikipedia.org/wiki/T%E1%BB%B1_l%E1%BB%B1c\" title=\"Tự lực\">tự giáo dục</a>, nghệ thuật&nbsp;<a href=\"https://vi.wikipedia.org/wiki/B%C3%A1n_h%C3%A0ng\" title=\"Bán hàng\">bán hàng</a>,&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Hu%E1%BA%A5n_luy%E1%BB%87n_v%C3%A0_ph%C3%A1t_tri%E1%BB%83n&amp;action=edit&amp;redlink=1\" title=\"Huấn luyện và phát triển (trang chưa được viết)\">huấn luyện đoàn thể</a>, nói trước công chúng và các kỹ năng giao tiếp giữa mọi người. Ra đời trong cảnh nghèo đói tại một trang trại ở&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Missouri\" title=\"Missouri\">Missouri</a>, ông là tác giả cuốn&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/%C4%90%E1%BA%AFc_nh%C3%A2n_t%C3%A2m\" title=\"\">Đắc Nhân Tâm</a></em>, được xuất bản lần đầu năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1936\" title=\"1936\">1936</a>, một cuốn sách thuộc hàng bán chạy nhất và được biết đến nhiều nhất cho đến tận ngày nay, nội dung nói về cách ứng xử, cư xử trong cuộc sống. Ông cũng viết một cuốn tiểu sử&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Abraham_Lincoln\" title=\"Abraham Lincoln\">Abraham Lincoln</a>, với tựa đề&nbsp;<em><a href=\"https://vi.wikipedia.org/w/index.php?title=Lincoln_con_ng%C6%B0%E1%BB%9Di_ch%C6%B0a_bi%E1%BA%BFt&amp;action=edit&amp;redlink=1\" title=\"Lincoln con người chưa biết (trang chưa được viết)\">Lincoln con người chưa biết</a></em>, và nhiều cuốn sách khác.</p>\r\n\r\n<p>Carnegie là một trong những người đầu tiên đề xuất cái ngày nay được gọi là&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=%C4%90%E1%BA%A3m_%C4%91%C6%B0%C6%A1ng_tr%C3%A1ch_nhi%E1%BB%87m&amp;action=edit&amp;redlink=1\" title=\"Đảm đương trách nhiệm (trang chưa được viết)\">đảm đương trách nhiệm</a>, dù nó chỉ được đề cập tỉ mỉ trong tác phẩm viết của ông. Một trong những ý tưởng chủ chốt trong những cuốn sách của ông là có thể thay đổi thái độ của người khác khi thay đổi sự đối xử của ta với họ.</p>\r\n\r\n<h2>Tiểu sử</h2>\r\n\r\n<p>Dale Carnegie sinh năm 1888 tại&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Maryville,_Missouri&amp;action=edit&amp;redlink=1\" title=\"Maryville, Missouri (trang chưa được viết)\">Maryville</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Missouri\" title=\"Missouri\">Missouri</a>, trong một gia đình nông dân, con trai thứ hai của James William Carnagey (sinh tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Indiana\" title=\"Indiana\">Indiana</a>, tháng 2 năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1852\" title=\"1852\">1852</a>&nbsp;&ndash;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1910\" title=\"1910\">1910</a>) và vợ là Amanda Elizabeth Harbison (sinh tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Missouri\" title=\"Missouri\">Missouri</a>, tháng 2 năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1858\" title=\"1858\">1858</a>&nbsp;&ndash;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1910\" title=\"1910\">1910</a>).<sup><a href=\"https://vi.wikipedia.org/wiki/Dale_Carnegie#cite_note-1\">[1]</a></sup>&nbsp;Tuổi thanh niên, dù phải dậy từ bốn giờ sáng mỗi ngày để vắt sữa bò cho gia đình, ông vẫn cố gắng tốt nghiệp&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=%C4%90%E1%BA%A1i_h%E1%BB%8Dc_Trung_t%C3%A2m_Bang_Missouri&amp;action=edit&amp;redlink=1\" title=\"Đại học Trung tâm Bang Missouri (trang chưa được viết)\">State Teacher&#39;s College</a>&nbsp;tại&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Warrensburg,_Missouri&amp;action=edit&amp;redlink=1\" title=\"Warrensburg, Missouri (trang chưa được viết)\">Warrensburg</a>. Công việc đầu tiên của ông sau khi tốt nghiệp là bán phiếu theo học các lớp hàm thụ cho những người nông dân; sau đó ông chuyển sang bán&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Th%E1%BB%8Bt_l%E1%BB%A3n_x%C3%B4ng_kh%C3%B3i&amp;action=edit&amp;redlink=1\" title=\"Thịt lợn xông khói (trang chưa được viết)\">thịt lợn xông khói</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/X%C3%A0_ph%C3%B2ng\" title=\"Xà phòng\">xà phòng</a>&nbsp;và&nbsp;<a href=\"https://vi.wikipedia.org/wiki/M%E1%BB%A1_l%E1%BB%A3n\" title=\"Mỡ lợn\">mỡ lợn</a>&nbsp;cho&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Armour_%26_Company&amp;action=edit&amp;redlink=1\" title=\"Armour &amp; Company (trang chưa được viết)\">Armour &amp; Company</a>. Ông đã thành công trong việc thiết lập thị trường tiêu thụ tại&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Nam_Omaha&amp;action=edit&amp;redlink=1\" title=\"Nam Omaha (trang chưa được viết)\">Nam Omaha</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nebraska\" title=\"Nebraska\">Nebraska</a>&nbsp;trở thành thị trường chính của công ty.<sup><a href=\"https://vi.wikipedia.org/wiki/Dale_Carnegie#cite_note-2\">[2]</a></sup></p>\r\n\r\n<p>Sau khi để giành được $500, Carnegie bỏ nghề bán hàng năm 1911 để theo đuổi giấc mơ từ lâu là trở thành một nhà thuyết trình&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Chautauqua&amp;action=edit&amp;redlink=1\" title=\"Chautauqua (trang chưa được viết)\">Chautauqua</a>. Nhưng cuối cùng ông lại theo học Học viện Nghệ thuật Kịch Mỹ tại New York, nhưng hầu như không có thành công với tư cách một diễn viên, dù có tài liệu ghi lại ông đã đảm nhiệm vai Dr. Hartley trong một chuyến biểu diễn lưu động của&nbsp;<em><a href=\"https://vi.wikipedia.org/w/index.php?title=G%C3%A1nh_xi%E1%BA%BFc_Polly&amp;action=edit&amp;redlink=1\" title=\"Gánh xiếc Polly (trang chưa được viết)\">Gánh xiếc Polly</a></em>.<sup>[<em><a href=\"https://vi.wikipedia.org/wiki/Wikipedia:Ch%C3%BA_th%C3%ADch_ngu%E1%BB%93n_g%E1%BB%91c\" title=\"Wikipedia:Chú thích nguồn gốc\">cần dẫn nguồn</a></em>]</sup>&nbsp;Khi công việc chấm dứt, ông quay trở về New York, thất nghiệp, gần phá sản, và sống tại YMCA ở Phố 125. Chính tại đây ông nảy sinh ý tưởng giảng dạy môn nói trước công chúng, và ông đã theo đuổi một vị quản lý &quot;Y&quot; nhằm cho phép ông mở một lớp học và trao cho họ 80% lợi nhuận. Trong khóa học đầu tiên, ông hầu như không có tài liệu để dạy: ứng tác, ông đề nghị các sinh viên nói về &quot;điều đã khiến họ nổi giận&quot;, và phát hiện ra rằng kỹ thuật này khiến diễn giả không cảm thấy sợ khi nói trước đám đông.<sup><a href=\"https://vi.wikipedia.org/wiki/Dale_Carnegie#cite_note-3\">[3]</a></sup>&nbsp;Từ khởi đầu năm 1912 này, các khóa học của Dale Carnegie bắt đầu phát triển. Carnegie đưa được vào trong mỗi người Mỹ một tham vọng phát triển tự tin hơn, và tới năm 1914, ông đã kiếm được $500 - con số tương đương $10.000 ngày nay - mỗi tuần.</p>\r\n\r\n<p>Có lẽ một trong những hành động marketing thành công nhất của Carnegie là thay đổi cách đánh vần họ của ông từ &quot;Carnegey&quot; thành Carnegie, ở thời điểm khi&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Andrew_Carnegie\" title=\"Andrew Carnegie\">Andrew Carnegie</a>, ông vua thép, một người không hề có họ hàng với ông đang nổi tiếng và được ngưỡng mộ khắp nơi. Tới năm 1916, Dale đã có khả năng thuê Carnegie Hall để diễn thuyết.<sup><a href=\"https://vi.wikipedia.org/wiki/Dale_Carnegie#cite_note-ReferenceA-4\">[4]</a></sup>. Tuyển tập các bài viết đầu tiên của Carnegie là&nbsp;<em>Nói trước Công chúng: một khóa học Thiết thực cho Người làm Kinh doanh</em>&nbsp;(1926), sau này được lấy tựa đề&nbsp;<em>Nói trước Công chúng và Gây ảnh hưởng tới mọi Người trong Kinh doanh</em>&nbsp;(1932). Tuy nhiên, thành tựu lớn nhất của ông chính là cuốn&nbsp;<em>Đắc Nhân Tâm</em>&nbsp;do Simon &amp; Schuster xuất bản. Cuốn sách trở thành một&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Bestseller\" title=\"Bestseller\">bestseller</a>&nbsp;từ khi xuất hiện năm 1937, và được tái bản tới lần thứ 17 chỉ trong vài tháng.<sup><a href=\"https://vi.wikipedia.org/wiki/Dale_Carnegie#cite_note-ReferenceA-4\">[4]</a></sup>. Khi Carnegie mất, cuốn sách của ông đã được bán tới con số 5 triệu bản bằng 31 ngôn ngữ, và đã có 450.000 người tốt nghiệp các khóa học tại Học viện Dale Carnegie&nbsp;<sup><a href=\"https://vi.wikipedia.org/wiki/Dale_Carnegie#cite_note-5\">[5]</a></sup>&nbsp;Cuốn sách nói rằng ông đã nghiên cứu hơn 150.000 bài phát biểu trong phong trào giáo dục cho người lớn ở thời điểm đó.<sup><a href=\"https://vi.wikipedia.org/wiki/Dale_Carnegie#cite_note-6\">[6]</a></sup>&nbsp;Trong&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Chi%E1%BA%BFn_tranh_th%E1%BA%BF_gi%E1%BB%9Bi_th%E1%BB%A9_nh%E1%BA%A5t\" title=\"Chiến tranh thế giới thứ nhất\">Thế chiến I</a>&nbsp;ông phục vụ trong&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Qu%C3%A2n_%C4%91%E1%BB%99i_Hoa_K%E1%BB%B3\" title=\"Quân đội Hoa Kỳ\">Quân đội Mỹ</a>.<sup><a href=\"https://vi.wikipedia.org/wiki/Dale_Carnegie#cite_note-7\">[7]</a></sup></p>\r\n\r\n<p>Ông ly hôn người vợ đầu năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1931\" title=\"1931\">1931</a>. Ngày&nbsp;<a href=\"https://vi.wikipedia.org/wiki/5_th%C3%A1ng_11\" title=\"5 tháng 11\">5 tháng 11</a>&nbsp;năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1944\" title=\"1944\">1944</a>, tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Tulsa\" title=\"Tulsa\">Tulsa, Oklahoma</a>, ông cưới Dorothy Price Vanderpool, người cũng đã một lần ly dị. Vanderpool có hai con gái; Rosemary, từ cuộc hôn nhân đầu tiên, và Donna Dale từ cuộc hôn nhân với Dale Carnegie.</p>\r\n\r\n<p>Tiểu sử chính thức do Dale Carnegie &amp; Associates, Inc. nói rằng ông mất vì bệnh Hodgkin ngày&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1_th%C3%A1ng_11\" title=\"1 tháng 11\">1 tháng 11</a>&nbsp;năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1955\" title=\"1955\">1955</a>.<sup><a href=\"https://vi.wikipedia.org/wiki/Dale_Carnegie#cite_note-8\">[8]</a></sup>&nbsp;Có lời đồn đại từ lâu rằng Dale Carnegie đã tự tử. Nhiều người cho rằng lời đồn này xuất phát từ Irving Tressler, tác giả cuốn, &quot;How to Lose Friends and Alienate People&quot;, một cuốn sách nhại không được phép cuốn sách kinh điển của Dale Carnegie.<sup>[<em><a href=\"https://vi.wikipedia.org/wiki/Wikipedia:Ch%C3%BA_th%C3%ADch_ngu%E1%BB%93n_g%E1%BB%91c\" title=\"Wikipedia:Chú thích nguồn gốc\">cần dẫn nguồn</a></em>]</sup>&nbsp;Ông mất tại&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Forest_Hills,_New_York&amp;action=edit&amp;redlink=1\" title=\"Forest Hills, New York (trang chưa được viết)\">Forest Hills</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Th%C3%A0nh_ph%E1%BB%91_New_York\" title=\"Thành phố New York\">New York</a>, và được hỏa thiêu tại nghĩa trang Belton, Cass County, Missouri.</p>\r\n', '2021-09-29 15:09:59', '2021-10-17 16:08:33'),
(4, 'J. K. Rowling', 'j.-k.-rowling380311740', '1965-07-31', '616c4a8710371-J._K._Rowling.jpg', 0, '<p><strong>Joanne Rowling</strong>&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Companion_of_Honour\" title=\"Companion of Honour\">CH</a>&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Officer_of_the_Order_of_the_British_Empire\" title=\"Officer of the Order of the British Empire\">OBE</a>&nbsp;&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Fellow_of_the_Royal_College_of_Physicians_of_Edinburgh&amp;action=edit&amp;redlink=1\" title=\"Fellow of the Royal College of Physicians of Edinburgh (trang chưa được viết)\">FRCPE</a>&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Hi%E1%BB%87p_h%E1%BB%99i_V%C4%83n_h%E1%BB%8Dc_Ho%C3%A0ng_gia_Anh&amp;action=edit&amp;redlink=1\" title=\"Hiệp hội Văn học Hoàng gia Anh (trang chưa được viết)\">FRSL</a>&nbsp;(sinh ngày&nbsp;<a href=\"https://vi.wikipedia.org/wiki/31_th%C3%A1ng_7\" title=\"31 tháng 7\">31 tháng 7</a>&nbsp;năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1965\" title=\"1965\">1965</a><sup><a href=\"https://vi.wikipedia.org/wiki/J._K._Rowling#cite_note-2\">[2]</a></sup>), thường được mọi người biết với bút danh&nbsp;<strong>J. K. Rowling</strong>,<sup><a href=\"https://vi.wikipedia.org/wiki/J._K._Rowling#cite_note-telegraph-3\">[3]</a></sup>&nbsp;là một nhà văn, nhà từ thiện, nhà sản xuất phim và truyền hình, kiêm nhà viết kịch bản người Anh. Bà nổi tiếng là tác giả của bộ truyện giả tưởng&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/Harry_Potter\" title=\"Harry Potter\">Harry Potter</a></em>&nbsp;từng đoạt nhiều giải thưởng và bán được hơn 500 triệu bản,<sup><a href=\"https://vi.wikipedia.org/wiki/J._K._Rowling#cite_note-4\">[4]</a></sup><sup><a href=\"https://vi.wikipedia.org/wiki/J._K._Rowling#cite_note-5\">[5]</a></sup>&nbsp;trở thành bộ&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Danh_s%C3%A1ch_s%C3%A1ch_b%C3%A1n_ch%E1%BA%A1y_nh%E1%BA%A5t\" title=\"Danh sách sách bán chạy nhất\">sách bán chạy nhất</a>&nbsp;trong lịch sử.<sup><a href=\"https://vi.wikipedia.org/wiki/J._K._Rowling#cite_note-6\">[6]</a></sup>&nbsp;Bộ sách đã được chuyển thể thành một&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Harry_Potter_(lo%E1%BA%A1t_phim)\" title=\"Harry Potter (loạt phim)\">loạt phim ăn khách</a>&nbsp;mà chính bà đã phê duyệt kịch bản<sup><a href=\"https://vi.wikipedia.org/wiki/J._K._Rowling#cite_note-7\">[7]</a></sup>&nbsp;và cũng là nhà sản xuất của hai phần cuối.<sup><a href=\"https://vi.wikipedia.org/wiki/J._K._Rowling#cite_note-8\">[8]</a></sup>&nbsp;Bà cũng viết tiểu thuyết trinh thám hình sự dưới bút danh&nbsp;<strong>Robert Galbraith</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-09-29 15:12:46', '2021-10-17 16:08:39'),
(5, 'Philip Kotler', 'philip-kotler-956405', '1931-05-27', '616c4a8d3868e-Philip-Kotler.jpg', 0, '<p><strong>Philip Kotler</strong>&nbsp;(sinh ngày&nbsp;<a href=\"https://vi.wikipedia.org/wiki/27_th%C3%A1ng_5\" title=\"27 tháng 5\">27 tháng 5</a>&nbsp;năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/1931\" title=\"1931\">1931</a>&nbsp;tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Chicago\" title=\"Chicago\">Chicago</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Hoa_K%E1%BB%B3\" title=\"Hoa Kỳ\">Hoa Kỳ</a>) là giáo sư&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Marketing\" title=\"Marketing\">marketing</a>&nbsp;nổi tiếng thế giới;&nbsp;<em>&quot;cha đẻ&quot;</em>&nbsp;của marketing hiện đại, được xem là huyền thoại duy nhất về marketing, ông tổ của tiếp thị hiện đại thế giới, một trong bốn&nbsp;<em>&quot;Nhà quản trị vĩ đại nhất mọi thời đại&quot;</em>&nbsp;cùng với&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Peter_Drucker\" title=\"Peter Drucker\">Peter Drucker</a>,&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Jack_Welch&amp;action=edit&amp;redlink=1\" title=\"Jack Welch (trang chưa được viết)\">Jack Welch</a>&nbsp;và&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Bill_Gates\" title=\"Bill Gates\">Bill Gates</a>&nbsp;(theo bình chọn của&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Financial_Times\" title=\"Financial Times\">Financial Times</a>). Ông là giáo sư của&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Tr%C6%B0%E1%BB%9Dng_%C4%90%E1%BA%A1i_h%E1%BB%8Dc_Northwestern&amp;action=edit&amp;redlink=1\" title=\"Trường Đại học Northwestern (trang chưa được viết)\">Trường Đại học Northwestern</a>, Hoa Kỳ; là chuyên gia hàng đầu của Tập đoàn tiếp thị Kotler trong lĩnh vực hoạch định chiến lược marketing, và là giáo sư tại các trường đại học như Johnson &amp; son, Viện Marketing Kellogg. Ông đã từng tư vấn cho nhiều chính phủ và các công ty nổi tiếng trên thế giới như&nbsp;<a href=\"https://vi.wikipedia.org/wiki/IBM\" title=\"IBM\">IBM</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/General_Electric\" title=\"General Electric\">General Electric</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/AT%26T\" title=\"AT&amp;T\">AT&amp;T</a>,&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Honeywell&amp;action=edit&amp;redlink=1\" title=\"Honeywell (trang chưa được viết)\">Honeywell</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Bank_of_America\" title=\"Bank of America\">Bank of America</a>, v.v... Những nguyên lý và phương pháp tiếp thị của ông được tiếp nhận, áp dụng rộng rãi trong giới kinh doanh toàn cầu.<sup><a href=\"https://vi.wikipedia.org/wiki/Philip_Kotler#cite_note-1\">[1]</a></sup></p>\r\n\r\n<p>Cái tên của Philip Kotler đã trở nên đồng nghĩa với tiếp thị, một chuyên gia hàng đầu của&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Kotler_Marketing_Group&amp;action=edit&amp;redlink=1\" title=\"Kotler Marketing Group (trang chưa được viết)\">Kotler Marketing Group</a>&nbsp;trong lĩnh vực hoạch định chiến lược marketing. Ông được hàng triệu người trên thế giới biết đến như một chuyên gia cừ khôi trong lĩnh vực marketing, một thuyết trình viên cao cấp, tác giả hoặc đồng tác giả của hơn 100 cuốn sách và bài báo chuyên về marketing và quản trị kinh doanh; trong đó có&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Marketing_Management&amp;action=edit&amp;redlink=1\" title=\"Marketing Management (trang chưa được viết)\">Marketing Management</a>&nbsp;(ấn hành lần đầu năm 1967), một trong những cuốn sách kinh điển nhất của ngành tiếp thị và gối đầu giường giới quản trị kinh doanh thế giới. Những cuốn sách của ông đã được bán trên ba triệu bản bằng 20 thứ tiếng và được coi như kinh thánh về tiếp thị tại 58 quốc gia trên thế giới.</p>\r\n\r\n<h2>Sự nghiệp</h2>\r\n\r\n<p>Philip Kotler tốt nghiệp Thạc sĩ Kinh tế tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C4%90%E1%BA%A1i_h%E1%BB%8Dc_Chicago\" title=\"Đại học Chicago\">Đại học Chicago</a>&nbsp;và Tiến sĩ Kinh tế tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/H%E1%BB%8Dc_vi%E1%BB%87n_C%C3%B4ng_ngh%E1%BB%87_Massachusetts\" title=\"Học viện Công nghệ Massachusetts\">học viện Công nghệ Massachusetts</a>&nbsp;(MIT), sau đó ông làm postdoc về Toán học tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C4%90%E1%BA%A1i_h%E1%BB%8Dc_Harvard\" title=\"Đại học Harvard\">Đại học Harvard</a>&nbsp;và về Hành vi học tại Đại học Chicago. Ông nghiên cứu nhiều công trình về đề tài liên quan (Principles of marketing; Marketing models; Strategic marketing for non-profit organizations; The new competition; High visibility; Social marketing; Marketing places; Marketing for congregations; Marketing for hospitality and tourism; The marketing of nations; Kotler on marketing,...); và là người đầu tiên nhận giải nhà giáo dục tiếp thị xuất sắc (1985) của Hiệp hội Tiếp thị Hoa Kỳ (AMA).</p>\r\n\r\n<p>Kotler là người đi tiên phong trong việc phổ biến khái niệm&nbsp;<em>&quot;marketing xã hội&quot;</em>&nbsp;(social marketing) và&nbsp;<em>&quot;trách nhiệm xã hội của marketing&quot;</em>&nbsp;- Những tư tưởng này có ảnh hưởng rất sâu rộng đến giới kinh doanh trên toàn thế giới trong suốt nhiều thập niên. Qua đó cũng đã góp phần xây dựng một nền kinh doanh nhân bản hơn và kiến tạo một xã hội toàn cầu tốt đẹp hoàn hảo hơn.<sup><a href=\"https://vi.wikipedia.org/wiki/Philip_Kotler#cite_note-2\">[2]</a></sup></p>\r\n', '2021-09-29 15:17:48', '2021-10-17 16:08:45'),
(7, 'Đại học FPT', 'dai-hoc-fpt-365', '0000-00-00', '616c4a92b306a-fpt-university.png', 0, '', '2021-10-09 10:10:09', '2021-10-17 16:08:50'),
(12, 'Tinh Tinh', 'tinh-tinh-1634438930', '0000-00-00', 'default-author.png', 1, '', '2021-10-17 02:48:50', '2021-10-17 02:48:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `percent` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `special` tinyint(1) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `view` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`id`, `name`, `slug`, `price`, `percent`, `sale`, `image`, `description`, `special`, `cate_id`, `author_id`, `status`, `view`, `created_at`, `updated_at`) VALUES
(1, 'Tôi thấy hoa vàng trên cỏ xanh', 'toi-thay-hoa-vang-tren-co-xanh-325-559', 120000, 5, 114000, '616c4aa6e8f9e-toi-thay-hoa-vang-tren-co-xanh.jpg', '<p><em><strong>Tôi thấy hoa vàng trên cỏ xanh</strong></em>&nbsp;là một&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ti%E1%BB%83u_thuy%E1%BA%BFt\" title=\"Tiểu thuyết\">tiểu thuyết</a>&nbsp;dành cho thanh thiếu niên của nhà văn&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nguy%E1%BB%85n_Nh%E1%BA%ADt_%C3%81nh\" title=\"Nguyễn Nhật Ánh\">Nguyễn Nhật Ánh</a>, xuất bản lần đầu tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Vi%E1%BB%87t_Nam\" title=\"Việt Nam\">Việt Nam</a>&nbsp;vào ngày&nbsp;<a href=\"https://vi.wikipedia.org/wiki/9_th%C3%A1ng_12\" title=\"9 tháng 12\">9 tháng 12</a>&nbsp;năm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/2010\" title=\"2010\">2010</a>&nbsp;bởi&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nh%C3%A0_xu%E1%BA%A5t_b%E1%BA%A3n_Tr%E1%BA%BB\" title=\"Nhà xuất bản Trẻ\">Nhà xuất bản Trẻ</a>, với phần tranh minh họa do Đỗ Hoàng Tường thực hiện. Đây là một trong các truyện dài của Nguyễn Nhật Ánh, ra đời sau&nbsp;<em><a href=\"https://vi.wikipedia.org/w/index.php?title=%C4%90%E1%BA%A3o_m%E1%BB%99ng_m%C6%A1&amp;action=edit&amp;redlink=1\" title=\"Đảo mộng mơ (trang chưa được viết)\">Đảo mộng mơ</a></em>&nbsp;và trước&nbsp;<em><a href=\"https://vi.wikipedia.org/w/index.php?title=L%C3%A1_n%E1%BA%B1m_trong_l%C3%A1&amp;action=edit&amp;redlink=1\" title=\"Lá nằm trong lá (trang chưa được viết)\">Lá nằm trong lá</a></em>.&nbsp;<a href=\"https://vi.wikipedia.org/wiki/T%C3%A1c_ph%E1%BA%A9m_v%C4%83n_h%E1%BB%8Dc\" title=\"Tác phẩm văn học\">Tác phẩm</a>&nbsp;như một tập&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Nh%E1%BA%ADt_k%C3%BD&amp;action=edit&amp;redlink=1\" title=\"Nhật ký (trang chưa được viết)\">nhật ký</a>&nbsp;xoay quanh cuộc sống của những đứa trẻ ở một vùng quê Việt Nam nghèo khó, nổi bật lên là thông điệp về tình anh em, tình làng nghĩa xóm và những tâm tư của&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Tu%E1%BB%95i_m%E1%BB%9Bi_l%E1%BB%9Bn\" title=\"Tuổi mới lớn\">tuổi mới lớn</a>. Theo Nguyễn Nhật Ánh, đây là lần đầu tiên ông đưa vào truyện của mình những nhân vật phản diện, đặt ra vấn đề đạo đức như sự vô tâm hay&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C3%81c\" title=\"Ác\">cái ác</a></p>\r\n\r\n<p><br />\r\nLà một trong những quyển sách Việt Nam bán chạy nhất năm 2010,&nbsp;<em>Tôi thấy hoa vàng trên cỏ xanh</em>&nbsp;đã được tái bản ngay trong ngày phát hành đầu tiên, với tổng số bản in lên đến hơn 20.000 bản. Đây cũng là cuốn sách mở đầu cho phương thức in nhiều dạng ấn bản trên một tác phẩm ở Việt Nam, với ấn bản bìa mềm và bìa cứng được bán ra song song.&nbsp;<em>Tôi thấy hoa vàng trên cỏ xanh</em>&nbsp;được chuyển thể thành một bộ&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Phim_%C4%91i%E1%BB%87n_%E1%BA%A3nh\" title=\"Phim điện ảnh\">phim điện ảnh</a>&nbsp;cùng tên bởi đạo diễn&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Victor_V%C5%A9\" title=\"Victor Vũ\">Victor Vũ</a>, công chiếu vào tháng 10 năm 2015 với doanh thu phòng vé rất cao và gây được nhiều sự chú ý trong công chúng. Như một ảnh hưởng từ sức ảnh hưởng tích cực của bộ phim, tiểu thuyết đã trở thành quyển sách bán chạy nhất trong Hội sách&nbsp;<a href=\"https://vi.wikipedia.org/wiki/H%C3%A0_N%E1%BB%99i\" title=\"Hà Nội\">Hà Nội</a>&nbsp;năm 2015. Tính đến tháng 10 năm 2015,&nbsp;<em>Tôi thấy hoa vàng trên cỏ xanh</em>&nbsp;đã trải qua 28 lần tái phát hành với tổng số bản in lên đến hơn 130.000 bản.</p>\r\n', 1, 1, 1, 0, 13, '2021-09-29 15:21:48', '2021-10-17 16:09:10'),
(2, 'Đắc nhân tâm', 'dac-nhan-tam-507', 100000, 5, 95000, '616c4aae16f43-dac-nhan-tam.jpg', '<p><strong>Đắc nhân tâm</strong>&nbsp;(<em>được lòng người</em>), tên tiếng Anh là&nbsp;<em>How to Win Friends and Influence People</em>&nbsp;là một quyển sách nhằm tự giúp bản thân (self-help) bán chạy nhất từ trước đến nay. Quyển sách này do&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Dale_Carnegie\" title=\"Dale Carnegie\">Dale Carnegie</a>&nbsp;viết và đã được xuất bản lần đầu vào năm 1936, nó đã được bán 15 triệu bản trên khắp thế giới.<sup><a href=\"https://vi.wikipedia.org/wiki/%C4%90%E1%BA%AFc_nh%C3%A2n_t%C3%A2m#cite_note-1\">[1]</a></sup><sup><a href=\"https://vi.wikipedia.org/wiki/%C4%90%E1%BA%AFc_nh%C3%A2n_t%C3%A2m#cite_note-Answers.com-2\">[2]</a></sup>&nbsp;Nó cũng là quyển sách bán chạy nhất của&nbsp;<a href=\"https://vi.wikipedia.org/wiki/New_York_Times\" title=\"New York Times\">New York Times</a>&nbsp;trong 10 năm. Tác phẩm được đánh giá là cuốn sách đầu tiên và hay nhất trong thể loại này, có ảnh hưởng thay đổi cuộc đời đối với hàng triệu người trên thế giới.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 6, 3, 0, 12, '2021-09-29 15:38:58', '2021-10-17 16:09:18'),
(3, 'Cha giàu cha nghèo', 'cha-giau-cha-ngheo-441', 54000, 0, 54000, '616c4ab4f01c8-cha-giau-cha-ngheo.jpg', '<p><em><strong>Rich Dad, Poor Dad</strong></em>&nbsp;(<em>Cha giàu, Cha nghèo</em>) là cuốn sách bán chạy nhất của&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Robert_Kiyosaki\" title=\"Robert Kiyosaki\">Robert Kiyosaki</a>. Trong đó, ông bày tỏ thái độ ủng hộ cho sự độc lập về tài chính nhờ đầu tư, bất động sản, kinh doanh và sử dụng tài chính hợp lý.</p>\r\n\r\n<p><em>Rich Dad, Poor Dad</em>&nbsp;được viết theo lối kể những câu chuyện của chính tác giả nhằm làm người đọc thấy vấn đề tài chính thật thú vị. Vấn đề chính mà Kiyosaki muốn nói là làm chủ một hệ thống kinh doanh còn tốt hơn làm một nhân viên làm thuê cho người khác.</p>\r\n', 1, 4, 2, 0, 113, '2021-09-29 15:40:42', '2021-10-17 16:09:24'),
(4, 'Marketing Trong Cuộc Cách Mạng Công Nghệ 4.0', 'marketing-trong-cuoc-cach-mang-cong-nghe-4.0-139-729', 98000, 15, 83300, '616c4abc61847-Marketing-Trong-Cuộc-Cách-Mạng-Công-Nghệ-4.0.jpg', '<p>Trong kỷ nguyên 4.0, khi hàng loạt đổi thay đang diễn ra từng phút; mọi doanh nghiệp và tổ chức đều phải chịu tác động của những xu thế lớn. Vì vậy, công việc marketing - tiếp thị&nbsp;cũng&nbsp;buộc phải thay đổi nhanh chóng, để hoạt động kinh doanh và phát triển không bị thụt lùi.</p>\r\n\r\n<p>Philip Kotler, người được mệnh danh là &quot;cha đẻ của marketing hiện đại&quot;, đã cùng các cộng sự viết nên tác phẩm&nbsp;<strong>&quot;Marketing trong cuộc cách mạng công nghệ 4.0&quot;</strong>&nbsp;để kịp thời định hướng kinh doanh cho các tổ chức. Cuốn sách mô tả các nguyên tắc marketing trong thế kỷ 21 và chỉ ra cách các doanh nghiệp có thể đạt được sự bền vững trên thị trường thông qua tiếp thị bằng phương tiện truyền thông mới &ndash;&nbsp;những bí quyết&nbsp;marketing phong cách 4.0.</p>\r\n\r\n<p>Đọc cuốn sách này, mọi nhà tiếp thị sẽ phải suy nghĩ lại về triết lý marketing, từ đó xây dựng một phương pháp tiếp cận toàn diện và bền vững hơn, phát triển hướng tới mọi bộ phận, mọi chức năng và mọi vị trí nhân sự.&nbsp;<strong>&quot;Marketing trong cuộc cách mạng công nghệ 4.0&quot;</strong>&nbsp;là cuốn cẩm nang không thể thiếu cho những chuyên gia marketing trong kỷ nguyên mới - những người đang cố gắng tận dụng các tiềm năng để cải tổ doanh nghiệp từ bên trong&nbsp;và kết nối sâu sắc hơn với khách hàng.</p>\r\n', 1, 4, 5, 0, 7, '2021-09-29 15:43:13', '2021-10-17 16:09:32'),
(43, 'Harry Potter', 'harry-potter-755-281-472', 190000, 20, 152000, '616c4ac302e6a-Harry-Potter.jpg', '<p><em><strong>Harry Potter</strong></em>&nbsp;là tên của series&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ti%E1%BB%83u_thuy%E1%BA%BFt\" title=\"Tiểu thuyết\">tiểu thuyết</a>&nbsp;huyền bí gồm bảy phần của nữ&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nh%C3%A0_v%C4%83n\" title=\"Nhà văn\">nhà văn</a>&nbsp;<a href=\"https://vi.wikipedia.org/wiki/V%C6%B0%C6%A1ng_qu%E1%BB%91c_Li%C3%AAn_hi%E1%BB%87p_Anh_v%C3%A0_B%E1%BA%AFc_Ireland\" title=\"Vương quốc Liên hiệp Anh và Bắc Ireland\">Anh Quốc</a>&nbsp;<a href=\"https://vi.wikipedia.org/wiki/J._K._Rowling\" title=\"J. K. Rowling\">J. K. Rowling</a>. Bộ truyện viết về những cuộc phiêu lưu phù thủy của cậu bé&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Harry_Potter_(nh%C3%A2n_v%E1%BA%ADt)\" title=\"Harry Potter (nhân vật)\">Harry Potter</a>&nbsp;cùng hai người bạn thân là&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ron_Weasley\" title=\"Ron Weasley\">Ronald Weasley</a>&nbsp;và&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Hermione_Granger\" title=\"Hermione Granger\">Hermione Granger</a>, lấy bối cảnh tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Hogwarts\" title=\"Hogwarts\">Trường Phù thủy và Pháp sư Hogwarts</a>&nbsp;nước&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Anh\" title=\"Anh\">Anh</a>. Những cuộc phiêu lưu tập trung vào cuộc chiến của Harry Potter trong việc chống lại tên Chúa tể hắc ám&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ch%C3%BAa_t%E1%BB%83_Voldemort\" title=\"Chúa tể Voldemort\">Voldemort</a>&nbsp;&ndash; người có tham vọng muốn trở nên bất tử, thống trị thế giới phù thủy, nô dịch hóa những người phi pháp thuật và tiêu diệt những ai cản đường hắn, đặc biệt là Harry Potter.</p>\r\n\r\n<p>Bộ truyện kết hợp nhiều thể loại, bao gồm cả giả tưởng và giai đoạn tuổi mới lớn (với các yếu tố huyền bí, kinh dị, phiêu lưu và lãng mạn), nhiều ý nghĩa về văn hóa và tư liệu tham khảo. Cũng theo tác giả&nbsp;<a href=\"https://vi.wikipedia.org/wiki/J._K._Rowling\" title=\"J. K. Rowling\">J. K. Rowling</a>, chủ đề chính xuyên suốt là&nbsp;<a href=\"https://vi.wikipedia.org/wiki/C%C3%A1i_ch%E1%BA%BFt\" title=\"Cái chết\">Cái chết</a><sup><a href=\"https://vi.wikipedia.org/wiki/Harry_Potter#cite_note-1\">[1]</a></sup>.</p>\r\n\r\n<p>Ngay từ khi xuất bản phần một (<em><a href=\"https://vi.wikipedia.org/wiki/Harry_Potter_v%C3%A0_H%C3%B2n_%C4%91%C3%A1_Ph%C3%B9_th%E1%BB%A7y\" title=\"Harry Potter và Hòn đá Phù thủy\">Harry Potter and the Philosopher&#39;s Stone</a></em>&nbsp;&ndash; ấn bản&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Anh\" title=\"Anh\">Anh</a>;&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/Harry_Potter_v%C3%A0_H%C3%B2n_%C4%91%C3%A1_Ph%C3%B9_th%E1%BB%A7y\" title=\"Harry Potter và Hòn đá Phù thủy\">Harry Potter and the Sorcerer&#39;s Stone</a></em>&nbsp;- ấn bản&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Hoa_K%E1%BB%B3\" title=\"Hoa Kỳ\">Mỹ</a>;&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/Harry_Potter_v%C3%A0_H%C3%B2n_%C4%91%C3%A1_Ph%C3%B9_th%E1%BB%A7y\" title=\"Harry Potter và Hòn đá Phù thủy\">Harry Potter và Hòn đá Phù thủy</a></em>&nbsp;&ndash; bản dịch&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ti%E1%BA%BFng_Vi%E1%BB%87t\" title=\"Tiếng Việt\">tiếng Việt</a>) vào ngày 30 tháng 6 năm 1997, bộ truyện ngày càng nổi tiếng trên toàn thế giới, được giới phê bình hoan nghênh và rất thành công về mặt thương mại<sup><a href=\"https://vi.wikipedia.org/wiki/Harry_Potter#cite_note-2\">[2]</a></sup>. Bộ truyện cũng nhận được một số lời chỉ trích, bao gồm cả việc lo ngại về vẻ đen tối ngày càng tăng. Đến tháng 2 năm 2018, cả bảy quyển đã bán được hơn 500 triệu bản, trở thành bộ&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Bestseller\" title=\"Bestseller\">sách bán chạy nhất</a>&nbsp;trong lịch sử và được dịch sang 67&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ng%C3%B4n_ng%E1%BB%AF\" title=\"Ngôn ngữ\">ngôn ngữ</a><sup><a href=\"https://vi.wikipedia.org/wiki/Harry_Potter#cite_note-Harry_Potter_copies-3\">[3]</a></sup>. Phần bảy, và cũng là phần cuối cùng,&nbsp;<em>Harry Potter and the Deathly Hallows</em>&nbsp;(<em><a href=\"https://vi.wikipedia.org/wiki/Harry_Potter_v%C3%A0_B%E1%BA%A3o_b%E1%BB%91i_T%E1%BB%AD_th%E1%BA%A7n\" title=\"Harry Potter và Bảo bối Tử thần\">Harry Potter và Bảo bối Tử thần</a></em>) xuất bản vào ngày 21 tháng 7 năm 2007. Hơn 11 triệu quyển đã được bán trong 24 giờ đầu tiên<sup><a href=\"https://vi.wikipedia.org/wiki/Harry_Potter#cite_note-sales-4\">[4]</a></sup>.</p>\r\n\r\n<p>Nhờ vào sự thành công của bộ truyện,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/J._K._Rowling\" title=\"J. K. Rowling\">J. K. Rowling</a>&nbsp;đã trở thành nhà văn giàu nhất trong lịch sử văn học. Những bản in bằng&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ti%E1%BA%BFng_Anh\" title=\"Tiếng Anh\">tiếng Anh</a>&nbsp;được phát hành bởi nhà xuất bản&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Bloomsbury\" title=\"Bloomsbury\">Bloomsbury</a>&nbsp;ở&nbsp;<a href=\"https://vi.wikipedia.org/wiki/V%C6%B0%C6%A1ng_qu%E1%BB%91c_Li%C3%AAn_hi%E1%BB%87p_Anh_v%C3%A0_B%E1%BA%AFc_Ireland\" title=\"Vương quốc Liên hiệp Anh và Bắc Ireland\">Vương quốc Liên hiệp Anh và Bắc Ireland</a>,&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Scholastic_Press&amp;action=edit&amp;redlink=1\" title=\"Scholastic Press (trang chưa được viết)\">Scholastic Press</a>&nbsp;ở&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Hoa_K%E1%BB%B3\" title=\"Hoa Kỳ\">Mỹ</a>,&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Allen_%26_Unwin&amp;action=edit&amp;redlink=1\" title=\"Allen &amp; Unwin (trang chưa được viết)\">Allen &amp; Unwin</a>&nbsp;ở&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C3%9Ac\" title=\"Úc\">Úc</a>&nbsp;và&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=Raincoast_Books&amp;action=edit&amp;redlink=1\" title=\"Raincoast Books (trang chưa được viết)\">Raincoast Books</a>&nbsp;ở&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Canada\" title=\"Canada\">Canada</a>. Tại&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Vi%E1%BB%87t_Nam\" title=\"Việt Nam\">Việt Nam</a>, bộ truyện này được&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nh%C3%A0_xu%E1%BA%A5t_b%E1%BA%A3n_Tr%E1%BA%BB\" title=\"Nhà xuất bản Trẻ\">Nhà xuất bản Trẻ</a>&nbsp;xuất bản từ bản dịch của dịch giả&nbsp;<a href=\"https://vi.wikipedia.org/wiki/L%C3%BD_Lan\" title=\"Lý Lan\">Lý Lan</a>.</p>\r\n\r\n<p>Cả bộ truyện 7 quyển, với quyển thứ 7 được chia thành 2 phần, dựng thành 8 bộ trong loạt phim cùng tên bởi hãng&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Warner_Bros.\" title=\"Warner Bros.\">Warner Bros. Pictures</a>, trở thành loạt phim có doanh thu cao nhất mọi thời đại, kéo theo thương hiệu Harry Potter có giá trị hơn 15 tỉ USD<sup><a href=\"https://vi.wikipedia.org/wiki/Harry_Potter#cite_note-5\">[5]</a></sup>.</p>\r\n', 1, 3, 4, 0, 21, '2021-10-01 08:58:44', '2021-10-17 16:09:39'),
(44, 'Thiết Kế Web Với Dreamweaver', 'thiet-ke-web-voi-dreamweaver-875', 70000, 0, 70000, '616c4ac86a4af-Thiết-Kế-Web-Với-Dreamweaver.jpg', '<p>Thời đại của công nghệ đang phát triển, việc trao đổi mua bán, tìm kiếm thông tin dịch vụ đều chuyển hướng sang thị trường trực tuyến. Vì thế thiết kế cho mình một website để kinh doanh, quảng bá sản phẩm dịch vụ là điều hết sức cần thiết. Làm sao để có thể tự thiết kế được một website khi bạn không biết gì về lĩnh vực này và cũng&nbsp;không&nbsp;muốn dùng tới dịch vụ&nbsp;<a href=\"https://www.webico.vn/\" rel=\"noopener\" target=\"_blank\">thiết kế web</a>&nbsp;chuyên nghiệp hiện nay. Câu trả lời sẽ nằm trong bài viết này, chúng tôi sẽ hướng dẫn bạn cách&nbsp;<strong>tự học thiết kế web với Dreamweaver từ A- Z</strong></p>\r\n\r\n<p>Dreamweaver là một phần mềm hỗ trợ thiết kế web được rất nhiều người ưa chuộng và sử dụng để làm công cụ thiết kế web hữu ích. Nó được đánh giá là ứng dụng thiết kế web số 1 hiện nay, để giúp các bạn có thể&nbsp;<strong>tự học thiết kế web với Dreamweaver từ A-Z</strong>&nbsp;thì trọn bộ video hướng dẫn này sẽ là tài liệu thiết thực nhất cho bạn.</p>\r\n\r\n<h3><strong>Trọn bộ video tài liệu hướng dẫn tự học thiết kế web với Dreamweaver</strong></h3>\r\n\r\n<p><strong><em>Thiết kế web với Dreamweaver&nbsp;</em></strong></p>\r\n\r\n<p>Video này sẽ giúp các bạn làm quen với ứng dụng Dreamweaver và thiết kế web với Dreamweaver như thế nào.</p>\r\n', 1, 5, 7, 0, 33, '2021-10-02 08:07:49', '2021-10-17 16:09:44'),
(46, 'demo', 'demo-1634487390', 1111111, 12, 977778, 'default.png', '<p>q123</p>\r\n', 1, 3, 4, 1, NULL, '2021-10-17 16:16:30', '2021-10-17 16:16:30'),
(49, 'demo seac', 'demo-seac-1634487741', 123, 0, 123, 'default.png', '', 1, 2, 3, 1, NULL, '2021-10-17 16:22:21', '2021-10-18 08:05:04'),
(53, 'Tinh Hoa Kinh Tế Học (Essentials Of Economics)', 'tinh-hoa-kinh-te-hoc-essentials-of-economics-1634543160', 465, 15, 395, '616d2638a3630-tinh-hoa-kinh-te-hoc-01-247x247.jpg', '', 1, 4, 5, 0, NULL, '2021-10-18 07:46:00', '2021-10-18 08:05:01'),
(54, 'Naked Forex – Phương Pháp Price Action Tinh Gọn', 'naked-forex-–-phuong-phap-price-action-tinh-gon-1634544168', 350000, 20, 280000, '616d2aa98df28-default.png', '<p><strong>Là một trong những quyển sách được đánh giá cao hàng đầu về chủ đề Price Action (hành động giá/hành vi giá) trên toàn cầu (theo xếp hạng Amazon),&nbsp;Naked Forex &ndash; Phương pháp Price Action Tinh gọn&nbsp;dẫn bạn vào một hành trình quay trở về với cội nguồn, với thứ thuần khiết nhất dành cho một nhà giao dịch tài chính (trader), đó là Giá. Mục tiêu của Naked Forex không gì khác ngoài chủ đề &ldquo;Giúp nghệ thuật đọc hiểu biểu đồ và hành vi giá trở nên vĩ đại một lần nữa&rdquo;.</strong></p>\r\n', 1, 4, 2, 0, NULL, '2021-10-18 08:02:48', '2021-10-18 08:04:57'),
(55, 'Kinh tế học dành cho đại chúng', 'kinh-te-hoc-danh-cho-dai-chung-1634544240', 400000, 30, 280000, '616d2abf68df4-default.png', '', 1, 4, 5, 0, NULL, '2021-10-18 08:04:00', '2021-10-18 08:05:19'),
(56, 'Cách Nền Kinh Tế Vận Hành', 'cach-nen-kinh-te-van-hanh-1634544373', 250000, 14, 215000, '616d2b7b6d7ba-cach-nen-kinh-te-van-hanh.jpg', '', 1, 4, 5, 0, NULL, '2021-10-18 08:06:13', '2021-10-18 08:08:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tiểu thuyết', 'tieu-thuyet', '616c4a2979ffe-tieu-thuyet.jpg', 0, '2021-09-29 14:35:07', '2021-10-17 16:07:05'),
(2, 'Kinh dị', 'kinh-di', '616c4a2e88f3b-sach-kinh-di-hay-780x401.jpg', 0, '2021-09-29 14:37:32', '2021-10-17 16:07:10'),
(3, 'Trinh thám-Phiêu lưu', 'trinh-tham-phieu-luu', '616c4a3619f65-sach-hay-ve-phieu-luu.jpg', 0, '2021-09-29 14:39:43', '2021-10-17 16:07:18'),
(4, 'Kinh tế', 'kinh-te', '616c4a3c93852-sach-kinh-te-1.jpg', 0, '2021-09-29 14:41:34', '2021-10-17 16:07:24'),
(5, 'Công nghệ thông tin', 'cong-nghe-thong-tin', '616c4a43c7858-images.jpg', 0, '2021-09-29 14:45:35', '2021-10-17 16:07:31'),
(6, 'Giao tiếp-Ứng xử', 'giao-tiep-ung-xu', '616c4a4a2711d-d85e86ac003df0017ea5ce1925f3b6b3.jpg', 0, '2021-09-29 15:36:45', '2021-10-17 16:07:38'),
(10, 'Gia đình', 'gia-dinh-1634438852', '616c4a5d757f6-default.png', 1, '2021-10-17 02:47:32', '2021-10-17 16:07:57'),
(11, 'Khoa học-Viễn tưởng', 'khoa-hoc-vien-tuong-1634438866', '616c4a632e9f5-default.png', 1, '2021-10-17 02:47:46', '2021-10-17 16:08:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `book_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 44, 'Sách rất có ích', NULL, '2021-10-03 15:01:18', NULL),
(3, 1, 43, 'mình đang cần tìm thể loại như này', NULL, '2021-10-03 15:02:24', NULL),
(4, 1, 43, 'mình đang cần tìm thể loại như này', NULL, '2021-10-03 15:02:37', NULL),
(5, 1, 2, 'Sách nói về chiết lí rất hay', NULL, '2021-10-03 15:08:44', NULL),
(6, 1, 2, 'mình đang cần tìm thể loại như này', NULL, '2021-10-03 15:09:52', NULL),
(7, 1, 44, 'mình đang cần tìm thể loại như này', NULL, '2021-10-03 15:13:47', NULL),
(8, 1, 44, NULL, NULL, '2021-10-13 15:50:55', NULL),
(9, 1, 3, 'Bài viết khá bổ ích', NULL, '2021-10-06 15:51:47', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_posts`
--

CREATE TABLE `comment_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment_posts`
--

INSERT INTO `comment_posts` (`id`, `user_id`, `post_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 9, 'Bài viết khá bổ ích', NULL, '2021-10-06 15:58:59', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `logo`
--

INSERT INTO `logo` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '616c49dccb6d6-logo.png', 0, '2021-10-17 02:44:36', '2021-10-17 16:05:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image`, `content`, `view`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Top 10 cuốn sách hay', 'top-10-cuon-sach-hay', '616c4e465b3c0-top-10-sach.jpg', '<p>Kinh doanh thành công là cả một quá trình đầu tư và tích lũy cả về kiến thức, kỹ năng lẫn kinh nghiệm. Những quyển&nbsp;<strong>sách hay về kinh doanh&nbsp;</strong>là con đường rút gọn khoảng cách đi đến thành công của mỗi người. Là người thầy dạy bạn<strong>&nbsp;</strong>những khái niệm, cho bạn cái nhìn tổng quan, rõ ràng hơn. Để bạn có thể tự sáng tạo ra những chiến lược, đúc kết những bài học giá trị cho sự nghiệp của mình.</p>\r\n\r\n<h2><strong>1.Đọc vị bất kỳ ai-Để không bị lừa dối và lợi dụng là sách hay về kinh doanh.</strong></h2>\r\n\r\n<p>Mọi lời nói, mọi cử chỉ, mọi hành động của một người nào đó đều có thể được thể hiện qua ngôn ngữ cơ thể. Nếu như bạn nắm được, hiểu được tâm lý của đối phương, thì bạn tìm ra được cách giải quyết tốt nhất. Giống như câu nói &ldquo; Hiểu mình, hiểu người trăm trận trăm thắng&rdquo;. Cuốn sách Đọc vị bất kỳ ai là một trong những công cụ quan trọng, thú vị. Giúp bạn có thể thâm nhập vào trong suy nghĩ của người khác để biết họ đang nghĩ gì.</p>\r\n\r\n<p><strong>Sách dạy kinh doanh</strong>&nbsp;đọc vị bất kỳ ai giúp bạn nhìn nhận. Đưa ra kết luận một cách logic mà không phải chỉ dựa vào cảm tính hay lý tính. Hiểu được tâm lý, hiểu được hành động của người đối diện sẽ cho bạn khả năng đưa ra những chiến lược, chiến thuật hiệu quả nhất. Đây quả là một cuốn sách quan trọng giúp bạn hoàn thiện nhiều kỹ năng. Giúp kỹ năng đàm phán trong kinh doanh của bạn sẽ thành công và hiệu quả hơn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://topreview.vn/wp-content/uploads/2019/09/doc-vi-bat-ky-ai.jpg\" style=\"height:469px; width:800px\" /></p>\r\n\r\n<p><em>Đọc vị bất kỳ ai-Để không bị lừa dối và lợi dụng.</em></p>\r\n\r\n<h2><strong>2. Từ tốt đến vĩ đại, cuốn sách kinh tế bán chạy hàng đầu.</strong></h2>\r\n\r\n<p>Được tạp chí&nbsp;<strong>Forbes&nbsp;</strong>bình chọn là một trong những quyển&nbsp;<strong>sách kinh điển trong lĩnh vực quản trị kinh doanh</strong>. Là một trong<strong>&nbsp;top 20 cuốn sách có ảnh hưởng nhất thế giới</strong>. Sách từ tốt đến vĩ đại giúp bạn đúc kết được nhiều kinh nghiệm. Tìm ra phương hướng hiệu quả trong việc trở thành một nhà lãnh đạo, một người kinh doanh có tầm ảnh hưởng. Tạo ra những bước nhảy vọt tăng trưởng cho công ty.&nbsp;</p>\r\n\r\n<p>Sau khi đúc kết kinh nghiệm từ cuốn sách này. Bạn sẽ có thể sáng tạo những chiến lược quan trọng. Đưa công ty từ tốt trở nên vĩ đại hơn để có thể trường tồn. Và phát triển một cách nhanh chóng. Đây là một&nbsp;<strong>cuốn sách có ý nghĩa lớn, quan trọng ở nhiều thời điểm</strong>. Để giúp bạn đưa ra những quyết định đúng đắn trong kinh doanh.</p>\r\n\r\n<p><img alt=\"\" src=\"https://topreview.vn/wp-content/uploads/2019/09/tu-tot-den-vi-dai.jpg\" style=\"height:469px; width:800px\" /></p>\r\n\r\n<p><em>Từ tốt đến vĩ đại, cuốn sách bán chạy mọi thời đại.</em></p>\r\n\r\n<h2><strong>3. 13 nguyên tắc nghĩ giàu làm giàu, sách kinh doanh hay nhất mọi thời đại.</strong></h2>\r\n\r\n<p>13 nguyên tắc nghĩ giàu làm giàu là kho báu cho những ai mong muốn được thành công. Đây chính là cuốn sách không bao giờ lỗi thời đồng thời cũng là một trong&nbsp;<strong>những quyển sách bán chạy nhất mọi thời đại</strong>. Cuốn sách này chính là kim chỉ nam, chỉ dẫn con đường cho bạn đi đến thành công. Làm giàu cho toàn phương diện của bạn chứ không chỉ là vật chất hoặc suy nghĩ.</p>\r\n\r\n<p>Là một trong những&nbsp;<strong>cuốn sách truyền cảm hứng</strong>&nbsp;cho hàng ngàn người trên thế giới trở thành triệu phú. Quyển sách 13 nguyên tắc nghĩ giàu làm giàu chứa đựng những thông điệp phi thường. Những thông điệp mang sức thuyết phục và mang tính thời đại. Giúp bạn có thể phát triển, thành công dựa trên nguồn lực của bản thân mình. Là cuốn sách cần thiết cho những ai mong muốn mình trở nên &ldquo;giàu&rdquo; có hơn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://topreview.vn/wp-content/uploads/2019/09/13-nguyen-tac-nghi-giau-lam-giau.jpg\" style=\"height:469px; width:800px\" /></p>\r\n\r\n<p><em>13 nguyên tắc nghĩ giàu làm giàu, sách kinh doanh đáng đọc.</em></p>\r\n', 11, 0, '2021-10-05 16:00:17', '2021-10-17 16:24:38'),
(11, 'Đi một ngày đàng học một sàng khôn', 'di-mot-ngay-dang-hoc-mot-sang-khon-435', '616c4e4c886a3-tuc-ngu-di-mot-ngay-dang-hoc-mot-sang-khon.jpg', '<p>Cuộc sống giống như một hành trình dài vô tận đòi hỏi con người phải tự mình khám phá. Bởi vây, ông cha ta đã có lời khuyên quý giá: &quot;Đi một ngày đàng học một sàng khôn&quot;. Sau đây, Download.vn sẽ giới thiệu&nbsp;<strong><a href=\"https://download.vn/van7\">Bài văn mẫu lớp 7</a>: Giải thích câu tục ngữ Đi một ngày đàng học một sàng khôn</strong>, nhằm giúp học sinh giải thích ý nghĩa của câu tục ngữ trên.</p>\r\n\r\n<p><img alt=\"\" src=\"https://o.rada.vn/data/image/2021/02/25/di-mot-ngay-dang-hoc-mot-sang-khon.jpg\" style=\"height:336px; width:640px\" /></p>\r\n\r\n<h2>Đi một ngày đàng học một sàng khôn</h2>\r\n\r\n<p>Cuộc sống là một hành trình dài, với nhiều những thử thách. Bởi vậy mà câu tục ngữ &ldquo;Đi một ngày đàng, học một sàng khôn&rdquo; đã đem đến một bài học quý giá dành cho mỗi người.</p>\r\n\r\n<p>Câu tục ngữ bao gồm hai vế câu &ldquo;đi một ngày đàng&rdquo; và &ldquo;học một sàng khôn&rdquo;. Ở vế câu đầu tiên, &ldquo;đi&rdquo; là một hành động, sử dụng đôi chân để di chuyển từ nơi này sang nơi khác. Còn &ldquo;đàng&rdquo; có nghĩa là đường, do con người tạo ra để thuận tiện cho việc di chuyển. Hiểu sâu xa hơn thì đi một ngày đàng có nghĩa là đi ra bên ngoài học hỏi, khám phá. Đến vế thứ hai, &ldquo;học&rdquo; có nghĩa là học hỏi, thu nhận kiến thức rèn luyện kĩ năng; &ldquo;sàng&rdquo; là dụng cụ làm gạo của người nông dân xưa có hình tròn, đan bằng tre chứa được từng mẻ thóc sau khi xay, để thưa đáy đủ lọt hạt gạo. &ldquo;Học một sàng khôn&rdquo; có nghĩa là học hỏi được nhiều điều bổ ích. Như vậy, câu trên muốn nói rằng trên hành trình khám phá thế giới bên ngoài, con người sẽ học được nhiều điều bổ ích. Chúng ta càng đi nhiều sẽ càng học hỏi được nhiều, chỉ cần bước ra ngoài xã hội học hỏi chắc chắn sẽ thu được những tri thức mới mẻ, đó chính là thành quả của quá trình học tập. Không chỉ vậy, câu tục ngữ cũng là lời động viên, khích lệ tinh thần học hỏi, khám phá của con người. Nên đi đến những chân trời tri thức mới để mở mang kiến thức, mở rộng tầm mắt và thu nhặt cho mình những tri thức của nhân loại.</p>\r\n\r\n<p>Mỗi hành trình đều đem đến cho con người những bài học vô cùng quý giá. Từ những bước đi đầu tiên, chúng ta cũng sẽ học hỏi được một điều gì đó. Dân tộc Việt Nam sẽ không quên được những bước đi đầu tiên của chủ tịch Hồ Chí Minh - vị lãnh tụ của dân tộc Việt Nam trên hành trình ra đi tìm đường cứu nước. Ngày 5 tháng 6 năm 1911, tại bến cảng Nhà Rồng, trên con tàu Đô đốc Latouche Tréville, Người ra đi tìm đường cứu nước với hai bàn tay trắng. Trong suốt &ldquo;hành trình ngàn dặm&rdquo; đó, Người đã đi qua nhiều nước phương Tây, phải làm nhiều nghề để kiếm sống. Con đường ấy tuy đầy khó khăn và trắc trở. Nhưng đến cuối cùng, Bác cũng tìm đến được với ánh sáng của chủ nghĩa Mác - Lênin.</p>\r\n\r\n<p>Nếu như không chịu bước đi, vị trí của con người sẽ mãi ở vạch xuất phát. Mỗi bước đi cho dù có nhỏ bé, ngắn ngủi nhưng từ những bước đi nhỏ ấy chúng ta mới đi qua một cuộc hành trình ngàn dặm. Tục ngữ có câu: &ldquo;Đi một ngày đàng, học một sàng khôn&rdquo;. Thành công của con người được tích lũy từ những trải nghiệm trong cuộc sống.</p>\r\n\r\n<p>Bên cạnh đó vẫn có những người sống thụ động, hèn nhát. Họ không dám tiến bước về phía trước, thoát khỏi vùng an toàn của mình để chinh phục mục tiêu của bản thân. Ngược lại họ chỉ trông chờ vào những điều may mắn theo tâm lý: &ldquo;Ăn cỗ đi trước, lội nước theo sau&rdquo; hay &ldquo;Há miệng chờ sung&rdquo;. Đó quả thật là lối sống đáng phê phán trong xã hội hiện đại.</p>\r\n\r\n<p>Đối với một học sinh, chúng ta cần phải tích cực trải nghiệm nhiều hơn. Mỗi một hành trình đều sẽ giúp nâng cao kiến thức, tích lũy kỹ năng cần thiết để tiến tới thành công.</p>\r\n\r\n<p>Như vậy, câu tục ngữ &ldquo;Đi một ngày đàng học một sàng khôn&rdquo; đã đem đến một lời khuyên quý giá cho mỗi người. Không ngừng học tập, khám phá tri thức là một điều vô cùng quan trọng để vươn tới thành công.</p>\r\n', 5, 0, '2021-10-08 14:40:11', '2021-10-17 16:24:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'slider-1', '616c49f332a73-aapi_Korean_1200x628.jpg', 0, '2021-10-05 14:25:59', '2021-10-17 16:06:11'),
(2, 'Slider-2', '616c49f8f3bec-2020Booklist-Image.jpg', 0, '2021-10-01 14:29:41', '2021-10-17 16:06:16'),
(3, 'Slider-3', '616c49fe3d33f-Untitled-design.jpg', 0, '2021-09-29 14:29:57', '2021-10-17 16:06:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `avatar`, `email`, `password`, `role_id`, `birthday`, `gender`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Khương', 'khuong1542', '617129deb618b-46ugpa91zex3jodzjs8afdp7m.jpg', 'khuong1542@gmail.com', '$2y$10$w1D0Ugn4uskZzZYgfMzw8eucUcjjED5clIvwoNFQvzRs8VV3NODH6', 1, '2000-04-15', 0, 'Thôn Phú Vinh, Xã Phú Nghĩa, Huyện Chương Mỹ, TP Hà Nội', 366178611, '2021-10-21 08:50:38', '2021-10-21 08:50:38'),
(2, 'KhuongNguyen111111', 'khuong1542abc123', '617122317ae81-default-author.png', 'tinhtinh@gmail.com', '$2y$10$1nFKg0xlgX.To1n4R1dKHefBjlj74n2eQtoXVrNnMBmGXT8m6ANQ2', 0, '2021-10-12', 0, 'Thôn Phú Vinh, Xã Phú Nghĩa, Huyện Chương Mỹ, TP Hà Nội', 266178611, '2021-10-21 08:18:28', '2021-10-21 08:18:28'),
(3, 'KhuongNguyen', 'khuong1542abc', '617120b076fec-147144.png', 'khuongnvph07998@fpt.edu.vn', '$2y$10$3yz126ILebDmgDM/2K/Wfe2rxTPjN0/nsMBbBDFGj.xmPXAprDbFi', 0, '0000-00-00', 0, 'Đ. Ven Sông Lừ, Kim Liên, Đống Đa, Hà Nội, Vietnam', 0, '2021-10-21 08:16:41', '2021-10-21 08:16:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `book_id`, `post_id`, `status`, `created_at`, `updated_at`) VALUES
(49, 2, 54, NULL, 'Đã thích', '2021-10-20 14:32:56', '2021-10-20 14:32:56'),
(53, 2, 44, NULL, 'Đã thích', '2021-10-20 14:59:23', '2021-10-20 14:59:23'),
(54, 2, 43, NULL, 'Đã thích', '2021-10-20 14:59:26', '2021-10-20 14:59:26'),
(57, 1, 53, NULL, 'Đã thích', '2021-10-20 16:13:27', '2021-10-20 16:13:27'),
(58, 1, 56, NULL, 'Đã thích', '2021-10-20 16:22:09', '2021-10-20 16:22:09'),
(59, 1, 44, NULL, 'Đã thích', '2021-10-20 16:22:13', '2021-10-20 16:22:13'),
(60, 2, 55, NULL, 'Đã thích', '2021-10-21 08:21:50', '2021-10-21 08:21:50'),
(61, 2, 53, NULL, 'Đã thích', '2021-10-21 08:21:58', '2021-10-21 08:21:58'),
(62, 2, 56, NULL, 'Đã thích', '2021-10-21 08:22:04', '2021-10-21 08:22:04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`,`author_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Chỉ mục cho bảng `comment_posts`
--
ALTER TABLE `comment_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`title`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`book_id`,`post_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `post_id` (`post_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comment_posts`
--
ALTER TABLE `comment_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `comment_posts`
--
ALTER TABLE `comment_posts`
  ADD CONSTRAINT `comment_posts_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comment_posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlists_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
