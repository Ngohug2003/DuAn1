-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2024 lúc 02:18 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_nhom1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_cart`
--

CREATE TABLE `bill_cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `madh` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double(10,0) NOT NULL DEFAULT 0,
  `name_sanpham` varchar(255) DEFAULT NULL,
  `image_sanpham` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_order`
--

CREATE TABLE `bill_order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) DEFAULT 0,
  `order_name` varchar(255) NOT NULL,
  `order_diachi` varchar(255) NOT NULL,
  `order_phone` varchar(50) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `tongtienthanhtoan` double(10,0) NOT NULL DEFAULT 0,
  `madh` varchar(100) NOT NULL,
  `ngaydathang` datetime NOT NULL,
  `phuongthucthanhtoan` tinyint(1) NOT NULL DEFAULT 1,
  `trangthaidonhang` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 chờ xác nhận , 1 đã xác nhận , 2 đang giao hàng , 3 giao hàn thành công'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(11) NOT NULL,
  `noidung_binhluan` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `ngaybinhluan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_binhluan`, `noidung_binhluan`, `id_user`, `id_sanpham`, `ngaybinhluan`) VALUES
(11, 'Hello dự án 1', 2, 2, '2024-04-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `name_danhmuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `name_danhmuc`) VALUES
(1, 'Macbook'),
(2, 'HP'),
(3, 'Asus'),
(4, 'Lenovo'),
(5, 'Dell'),
(6, 'Acer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `name_sanpham` varchar(255) NOT NULL,
  `gia_sanpham` int(255) NOT NULL,
  `image_sanpham` varchar(255) NOT NULL,
  `subtitle_sanpham` text NOT NULL,
  `description_sanpham` varchar(255) NOT NULL,
  `luotxem_sanpham` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `name_sanpham`, `gia_sanpham`, `image_sanpham`, `subtitle_sanpham`, `description_sanpham`, `luotxem_sanpham`, `id_danhmuc`) VALUES
(1, 'MacBook Air 13 inch M1 2020 7-core GPU', 17690000, 'macbook-air-m1-2020-gray-600x600.jpg', 'Hàng chính hãng', 'Giao diện trang nhã, hiện đại Với những mẫu laptop HP thuộc dạng cơ bản như sản phẩm này thì mình cũng không nhận thấy có quá nhiều điểm nổi trội hay cải tiến về mặt ngoại hình. Nhìn chung, tuy mẫu thiết kế kiểu cũ nhưng đâu đó kiểu dáng máy vẫn khá phù h', 10, 1),
(2, 'MacBook Air 13 inch M2 2022 8-core CPU', 29990000, 'apple-macbook-air-m2-2022-16gb-256gb-thumb-600x600.jpg', 'Hàng chính hãng', '', 111, 1),
(3, 'HP Pavilion 14 dv2073TU i5 1235U (7C0P2PA)', 16490000, 'hp-pavilion-14-dv2073tu-i5-7c0p2pa-thumb-1-600x600.jpg', 'Hàng chính hãng', '', 21, 2),
(5, 'HP Gaming VICTUS 15 fb1022AX R5 7535HS (94F19PA)', 19990000, 'hp-victus-15-fb1022ax-r5-94f19pa-thumb-1-600x600.jpg', 'Khuyến mãi trị giá 900.000₫\r\nGiá và khuyến mãi dự kiến áp dụng đến 23:00 | 31/03', 'Phong cách thiết kế tối giản nhưng vẫn toát lên rõ nét khí thế mạnh mẽ của một mẫu máy chiến game thời thượng, laptop HP Gaming VICTUS 15 fb1022AX R5 7535HS (94F19PA) với những sự trang bị về cấu hình vượt trội sẽ cùng bạn chinh chiến trên mọi đấu trường ', 325, 2),
(17, 'HP Gaming VICTUS 15 fa1139TX i5 12450H (8Y6W3PA)', 18990000, 'hp-victus-15-fa1139tx-i5-8y6w3pa.jpg', '(*) Giá hoặc khuyến mãi không áp dụng trả góp lãi suất đặc biệt (0%, 0.5%, 1%, 1.5%, 2%)', 'Dòng Gaming Victus là một mẫu laptop gaming độc đáo từ thiết kế đến hiệu năng của nhà HP. Chỉ với một mức giá tầm trung là bạn có thể sở hữu ngay chiếc laptop HP Gaming VICTUS 15 fa1139TX i5 12450H (8Y6W3PA) có thể cân mượt các tựa game cũng như hỗ trợ là', 54, 2),
(18, 'HP Envy X360 13 bf0090TU i7 1250U (76B13PA)', 27690000, 'hp-envy-x360-13-bf0090tu-i7-76b13pa-101122-093057-600x600.jpg', 'Hư gì đổi nấy 12 tháng tại 3160 siêu thị toàn quốc (miễn phí tháng đầu) ', 'Laptop HP Envy X360 13 bf0090TU i7 (76B13PA) - một siêu phẩm laptop cao cấp - sang trọng đến từ nhà HP khi sở hữu những thông số kỹ thuật ấn tượng từ cấu hình mạnh mẽ, màn hình sắc nét cho đến ngoại hình tinh tế, độc đáo với thiết kế gập 360 độ linh hoạt,', 12, 2),
(19, 'HP Pavilion X360 14 ek1048TU i5 1335U (80R26PA)', 20390000, 'hp-pavilion-x360-14-ek1048tu-i5-80r26pa-thumb-lap-600x600.jpg', 'Bộ sản phẩm gồm: Thùng máy, Sạc Laptop HP ( 65W ), Sách hướng dẫn, Bút cảm ứng', 'Laptop HP Pavilion X360 14 ek1048TU i5 1335U (80R26PA) có khả năng đáp ứng mượt mà mọi tác vụ văn phòng cũng như giải trí đa phương tiện. Laptop có thể trở thành một chiếc tablet tùy theo nhu cầu sử dụng của bản thân thật thuận tiện nhờ khả năng gập 360 đ', 212, 2),
(20, 'MacBook Pro 16 inch M3 Pro 2023 12-core', 79990000, 'apple-macbook-pro-16-inch-m3-pro-2023-12-core-cpu-36gb-1tb-090124-103108-600x600.jpg', 'Mẫu vi xử lý được trang bị trên thế hệ Macbook mới lần này là Apple M3 Pro được sản xuất theo tiến trình 3 nm mới nhất, sở hữu cấu trúc gồm 12 nhân CPU và 18 nhân GPU mang lại tốc độ băng thông bộ nhớ tuyệt vời là 150 GB/s.', 'Apple lại một lần nữa khuấy đảo giới công nghệ trong không không khí đón chào một năm mới với Apple MacBook Pro 16 inch M3 Pro 2023 12-core CPU sở hữu thế hệ chip M3 Pro hoàn toàn mới, hiệu suất cao hơn cùng sự cải tiến ưu việt về nhiều mặt, hứa hẹn sẽ ma', 998, 1),
(21, 'MacBook Air 15 inch M2 2023 10-core GPU Sạc 35W', 29990000, 'apple-macbook-air-15-inch-m2-2023-midnight-thumb-600x600.jpg', 'Màn hình Retina 15 inch lớn ấn tượng ', 'MacBook Air 15 inch M2 2023 đã có phiên bản cải tiến vừa được nhà Apple cho ra mắt, thêm không gian cho những điều bạn yêu với màn hình Liquid Retina 15 inch ấn tượng. Với người dùng yêu thích hiệu năng \"nhanh như chớp\" trong một thiết kế siêu gọn nhẹ của', 213, 1),
(22, 'Asus TUF Gaming F17 FX706HF i5 11400H (HX390W)', 17490000, 'asus-tuf-gaming-f17-fx706hf-i5-hx390w-thumb-600x600.jpg', 'Được bao phủ bởi lớp vỏ đen ấn tượng cùng thiết kế hầm hố chuẩn gaming\r\n', 'Laptop Asus TUF Gaming F17 FX706HF i5 11400H (HX390W) - chiếc laptop chiến game đến từ nhà Asus mang diện mạo cực chất, hiệu năng cao ấn tượng được gói gọn trong phân khúc giá 18 triệu ấn tượng, đặc biệt với nhiều nhu cầu sử dụng từ giải trí đến làm việc ', 12, 3),
(23, 'Asus Vivobook X515EA i3 1115G4 (EJ3948W)', 9490000, 'asus-vivobook-x515ea-i3-ej3948w-thumb-600x600.jpg', 'Laptop Asus Vivobook X515EA i3 1115G4 (EJ3948W) là một trong những mẫu laptop học tập - văn phòng ', 'Laptop Asus Vivobook X515EA i3 1115G4 (EJ3948W) là một trong những mẫu laptop học tập - văn phòng đáng để bạn cân nhắc chọn mua nhờ sở hữu lối thiết kế thanh lịch, hiệu năng ổn định và bộ nhớ lưu trữ đủ dùng.\r\n• Laptop Asus Vivobook bộ vi xử lý Intel Core', 111, 3),
(24, 'Asus TUF Gaming F15 FX506HC i5 11400H (HN949W)', 17990000, 'asus-tuf-gaming-f15-fx506hc-i5-hn949w-thumb-600x600.jpg', '', 'Một sản phẩm laptop gaming đến từ nhà Asus sở hữu thông số cấu hình mạnh mẽ từ card RTX 30 series, tần số quét 144 Hz cùng thiết kế mạnh mẽ, nam tính. Laptop Asus TUF Gaming F15 FX506HC i5 11400H (HN949W) chắc chắn sẽ là trợ thủ đắc lực cùng bạn trong mọi', 0, 3),
(25, 'Laptop Lenovo Ideapad 1 15ALC7 R7 5700U/16GB/512GB/Win11', 12390000, 'lenovo1.jpg', 'Laptop Lenovo Ideapad 1 15ALC7 R7 5700U (82R400C1VN) không chỉ là một sản phẩm phù hợp cho sinh viên mà còn dành cho những người đi làm. Hội tụ từ cấu hình ổn định, thiết kế thanh lịch cùng vô vàn tính năng nổi bật. ', 'Với một cái nhìn tổng thể, thiết kế của laptop Lenovo có vẻ đơn giản nhưng không kém phần sang trọng và đẳng cấp. Mặc dù không có nhiều chi tiết phức tạp, chiếc máy vẫn thu hút sự chú ý với logo Lenovo duy nhất tinh tế nằm ở phía trên nắp máy, tạo ra sự ấ', 0, 4),
(26, 'Laptop Lenovo V14 G3 ABA R5 5625U/8GB/512GB/Win11', 8890000, 'lenovo2.jpg', ' Lenovo V14 G3 ABA R5 5625U (82TU006SVN) chắc chắn là sự lựa chọn tuyệt vời cho mọi đối tượng người dùng mà không cần cân nhắc thêm bất cứ điều kiện gì.', '• Laptop Lenovo được tích hợp bộ vi xử lý AMD Ryzen 5 - 5625U đi cùng card AMD Radeon Graphics mang đến hiệu suất ổn định để xử lý tốt công việc trên các ứng dụng như Word, Excel, PowerPoint,... giải trí cơ bản với những tựa game thịnh hành như LOL, Valor', 0, 4),
(28, 'Laptop Lenovo Yoga 7 14IRL8 i7 1360P/16GB/512GB/Touch/Pen/OfficeHS/Win11', 25990000, 'lenovo3.jpg', 'Laptop Lenovo Yoga 7 14IRL8 i7 1360P (82YL006BVN) được trang bị những tiện ích tân tiến cùng hiệu năng mạnh mẽ, sẽ mang đến cho người dùng những trải nghiệm sử dụng tối ưu nhất.', ' Laptop Lenovo Yoga được trang bị chip Intel Core i7 1360P thuộc thế hệ 13 hoàn toàn mới với xung nhịp tối đa lên đến 5.0 GHz kết hợp cùng card Intel Iris Xe Graphics giúp người dùng vận hành trơn tru các tác vụ từ văn phòng, học tập đến việc thiết kế các', 0, 4),
(29, 'Laptop Dell Inspiron 14 7430 2-in-1 i7 1355U/16GB/512GB/Touch/Pen/OfficeHS/Win11', 28410000, 'dell1.jpg', 'Laptop Dell Inspiron 14 7430 2-in-1 i7 1355U (i7U165W11SLU) sẽ mang đến cho người dùng trải nghiệm sử dụng thú vị với hiệu năng mạnh mẽ từ con chip Intel Gen 13, tính năng cảm ứng đa điểm, mở gập 360 độ cùng thiết kế bắt mắt. Chiếc laptop cao cấp này chắc chắn sẽ thỏa mãn mọi nhu cầu của bạn.', 'Máy được phủ bởi lớp sơn bạc trung tính, bộ khung nhỏ gọn cùng các đường viền mỏng được bo tròn, mặt lưng cũng không quá nhiều chi tiết với logo DELL quen thuộc được mạ chrome và đặt ngay ngắn ở chính giữa. Mình khá thích kiểu dáng thiết kế này của Dell I', 0, 5),
(30, 'Laptop Dell Inspiron 15 3530 i5 1335U/8GB/512GB/2GB MX550/120Hz/OfficeHS/Win11', 17790000, 'dell2.jpg', 'Laptop Dell Inspiron 15 3530 i5 1335U (71014840) sở hữu dáng vẻ hiện đại đầy sang trọng, hiệu năng miễn chê với chip Intel thế hệ 13 hoàn toàn mới cùng card đồ hoạ rời. Chiếc laptop học tập - văn phòng này chắc chắn là sẽ sự lựa chọn tuyệt vời giúp bạn đáp ứng đầy đủ mọi nhu cầu.', '• Laptop được trang bị bộ vi xử lý Intel Core i5 1335U thuộc thế hệ 13 có tốc độ xung nhịp tối đa lên đến 4.6 GHz nhờ công nghệ Turbo Boost, có hiệu năng xử lý vượt trội, giải quyết nhẹ nhàng cho bạn mọi tác vụ học tập, làm việc trên Office, Google,... ho', 0, 5),
(31, 'Laptop Dell Inspiron 15 3530 i5 1335U/16GB/512GB/120Hz/OfficeHS/Win11', 19490000, 'dell3.jpg', 'Với mức giá dưới 20 triệu, các bạn sinh viên và nhân viên văn phòng đã có thể sở hữu ngay một mẫu laptop học tập - văn phòng có con chip Intel thế hệ 13 mới nhất, RAM 16 GB cùng nhiều tính năng hiện đại khác. Laptop Dell Inspiron 15 3530 i5 1335U (N5I5791W1) chắc chắn sẽ thỏa mãn đầy đủ mọi nhu cầu của bạn dù làm việc hay giải trí. ', ' Laptop Dell được trang bị bộ vi xử lý Intel Core i5 Raptor Lake - 1335U hiệu năng mạnh mẽ, giúp xử lý đơn giản mọi công việc hàng ngày từ Word, Excel,... đến coding và đồ hoạ. Thêm nữa, với xung nhịp tối đa 4.6 GHz nhờ Turbo Boost, laptop có khả năng đáp', 0, 5),
(32, 'Laptop Acer Gaming Nitro 5 Tiger AN515 58 769J i7 12700H/8GB/512GB/4GB RTX3050/144Hz/Win11', 23490000, 'acer1.jpg', 'Trải nghiệm giải trí đỉnh cao nhờ hiệu năng từ con chip Intel Core i7 dòng H series hiệu năng cao cùng ngoại hình độc đáo, laptop Acer Gaming Nitro 5 AN515 58 769J i7 12700H (NH.QFHSV.003) chắc chắn sẽ trở thành trợ thủ đắc lực cho người dùng trong những chiến trường ảo đầy kịch tính hay những tác vụ văn phòng và đồ hoạ chuyên nghiệp.\r\nBứt phá giới hạn với hiệu năng mạnh mẽ', 'Laptop gaming sở hữu sức mạnh đến từ con chip Intel Core i7 12700H thuộc dòng H hiệu năng cao đạt tốc độ xung nhịp tối đa lên đến 4.7 GHz đem đến tốc độ xử lý nhanh chóng và hiệu quả cho mọi tác vụ từ văn phòng như Word, Excel, PowerPoint,... đến các ứng ', 0, 6),
(33, 'Laptop Acer Gaming Nitro V ANV15 51 53NE i5 13420H/16GB/512GB/4GB RTX2050/144Hz/Win11', 21490000, 'acer2.jpg', 'Laptop Acer Gaming Nitro V ANV15 51 53NE i5 13420H (NH.QNASV.002) sở hữu diện mạo \"thoát ly\" hoàn toàn so với thế hệ tiền nhiệm, sắc sảo và cá tính hơn, đi kèm với đó là hiệu năng vượt trội từ con chip Intel Gen 13 dòng H để bạn chinh phục các tựa game đỉnh cao.\r\nThiết kế đầy nổi bật, táo bạo hơn', 'Nhắc đến những mẫu laptop gaming thuộc dòng Nitro nhà Acer thì phải kể đến những mẫu máy có khung hầm hố khá đặc trưng, bản lề dày \"cộm\" hay những đường gân nổi. Tuy nhiên, với dòng Nitro V này thì hãng đã có sự tinh chỉnh khác đi rất nhiều, những đường c', 0, 5),
(34, 'Laptop Acer Gaming Aspire 7 A715 76G 5806 i5 12450H/16GB/512GB/4GB RTX3050/144Hz/Win11', 19990000, 'acer3.jpg', 'Laptop Acer Aspire 7 Gaming A715 76G 5806 i5 12450H (NH.QMFSV.002) đến từ nhà Acer với các thông số cấu hình đầy mạnh mẽ, card rời RTX 30 series cũng như sở hữu một mức giá thành lý tưởng, chắc chắn sẽ mang đến cho anh em những trải nghiệm tuyệt vời.', 'Bộ vi xử lý Intel Core i5 12450H cùng card đồ họa rời NVIDIA GeForce RTX 3050 4 GB mang lại hiệu suất xử lý vượt trội, cho bạn thỏa sức sáng tạo các thiết kế, đồ hoạ trên nền tảng Photoshop, AI,... đồng thời thoải mái chiến các tựa game hot như: LOL, PUBG', 0, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `fullname_user` varchar(255) NOT NULL,
  `phone_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `diachi_user` varchar(255) NOT NULL,
  `image_user` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 admin , 2 người dùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `username_user`, `password_user`, `fullname_user`, `phone_user`, `email_user`, `diachi_user`, `image_user`, `role`) VALUES
(1, 'admin', 'admin', 'Hoàng Văn A', '0988409422', 'ngocna11a1@gmail.com', 'Nam từ liêm - Hà nội', '', 1),
(2, 'user', 'user', 'Ngọ Hưng 2132', '09113634241', 'ngoviethung011100911@gmail.com', 'Nam từ liêm - Hà nội', 'anh12.jpg', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill_cart`
--
ALTER TABLE `bill_cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `FK_user_id` (`id_user`),
  ADD KEY `FK_order_id` (`id_order`),
  ADD KEY `FK_sanpham_id` (`id_sanpham`);

--
-- Chỉ mục cho bảng `bill_order`
--
ALTER TABLE `bill_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `FK_binhluan_sanpham_id` (`id_sanpham`),
  ADD KEY `FK_binhluan_user_id` (`id_user`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `FK_id_danhmuc` (`id_danhmuc`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill_cart`
--
ALTER TABLE `bill_cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `bill_order`
--
ALTER TABLE `bill_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill_cart`
--
ALTER TABLE `bill_cart`
  ADD CONSTRAINT `FK_order_id` FOREIGN KEY (`id_order`) REFERENCES `bill_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sanpham_id` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `FK_binhluan_sanpham_id` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_binhluan_user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_id_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
