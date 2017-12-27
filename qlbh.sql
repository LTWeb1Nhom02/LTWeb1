-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 27 Décembre 2017 à 03:34
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `qlbh`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `CatID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `CatName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CatID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`CatID`, `CatName`) VALUES
(1, 'Học tập - Văn phòng'),
(2, 'Đồ họa - Kỹ thuật'),
(3, 'Chơi game khủng'),
(4, 'Mõng nhẹ - Thời trang'),
(5, 'Cao cấp - Sang trọng');

-- --------------------------------------------------------

--
-- Structure de la table `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `ManID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ManName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ManID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `manufacturer`
--

INSERT INTO `manufacturer` (`ManID`, `ManName`) VALUES
(1, 'Dell'),
(2, 'Asus'),
(3, 'Hp'),
(4, 'Acer'),
(5, 'Lenovo'),
(6, 'Apple');

-- --------------------------------------------------------

--
-- Structure de la table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) NOT NULL,
  `ProID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` bigint(20) NOT NULL,
  `Amount` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `orderdetails`
--

INSERT INTO `orderdetails` (`ID`, `OrderID`, `ProID`, `Quantity`, `Price`, `Amount`) VALUES
(7, 11, 73, 7, 7490000, 52430000),
(6, 10, 77, 2, 10990000, 21980000),
(5, 10, 72, 3, 7690000, 23070000);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `OrderDate` datetime NOT NULL,
  `UserID` int(11) NOT NULL,
  `Total` bigint(20) NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderDate`, `UserID`, `Total`) VALUES
(11, '2017-12-26 02:03:11', 1, 52430000),
(10, '2017-12-26 00:35:35', 1, 45050000);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ProID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ProName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TinyDes` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FullDes` text COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `CatID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ManID` int(11) NOT NULL,
  PRIMARY KEY (`ProID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=78 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`ProID`, `ProName`, `TinyDes`, `FullDes`, `Price`, `CatID`, `Quantity`, `ManID`) VALUES
(73, 'Acer ES1 533 P6L2 N4200', 'Acer ES1 533 N4200 mang lại hiệu năng sử dụng đơn giản để học tập hay giải trí cho bạn.', '<h3 style="margin: 1.5em auto 0.3em; padding: 0px; border: 0px; vertical-align: baseline; font-weight: normal; font-stretch: normal; font-size: 22px; line-height: 1.4em; font-family: Arial, Helvetica, sans-serif; color: #333333; outline: none; zoom: 1;"><span style="font-size: 10pt;">Thiết kế gọn nhẹ &nbsp;thuộc trong ph&acirc;n kh&uacute;c gi&aacute; rẻ th&iacute;ch hợp cho học sinh, sinh vi&ecirc;n n&ecirc;n c&oacute; thiết kế kh&aacute; cơ bản, vỏ nhựa nhẹ nh&agrave;ng v&agrave; c&aacute;c họa tiết in ch&igrave;m chống b&aacute;m v&acirc;n tay hiệu quản. M&aacute;y c&oacute; trọng lượng 2.4 kg, tương đối gọn nhẹ cho nhiều điều kiện sử dụng v&agrave; di chuyển dễ d&agrave;ng.&nbsp;M&agrave;n h&igrave;nh lớn 15.6 inch độ ph&acirc;n giải HD mang lại nhiều kh&ocirc;ng gian hiển thị, l&agrave;m việc v&agrave; chơi game hay giải tr&iacute; trải nghiệm đều tốt hơn. B&ecirc;n cạnh đ&oacute; l&agrave; webcam, độ ph&acirc;n giải 0.3 MP tiện &iacute;ch trong việc chat video qua Facebook, Skype tiện lợi. B&agrave;n ph&iacute;m k&iacute;ch thước lớn, độ nẩy tốt, khoảng c&aacute;ch ph&iacute;m vừa phải gi&uacute;p cho thao t&aacute;c thoải m&aacute;i v&agrave; ch&iacute;nh x&aacute;c c&ugrave;ng rất nhiều bộ ph&iacute;m tắt tiện dụng. Touchpad nhạy, thao t&aacute;c dễ d&agrave;ng. M&aacute;y được trang bị CPU Intel Pentium N4200, tốc độ 1.1 Ghz, c&oacute; thể n&acirc;ng l&ecirc;n tối đa 2.5 Ghz khi cần thực hiện t&aacute;c vụ nặng, đủ tốt để xử l&yacute; c&aacute;c nhu cầu cơ bản v&agrave; nhẹ nh&agrave;ng. M&aacute;y kh&ocirc;ng th&iacute;ch hợp để chơi game hay c&oacute; nhu cầu đồ họa cao. Bộ nhớ RAM 4 GB đủ tốt để thực hiện nhiều t&aacute;c vụ c&ugrave;ng l&uacute;c, c&oacute; thể n&acirc;ng l&ecirc;n 8 GB nếu bạn c&oacute; nhu cầu cao hơn.&nbsp;</span></h3>\r\n<p><span style="color: #333333; font-family: Arial, Helvetica, sans-serif; font-size: 10pt;">M&aacute;y được trang bị nhiều cổng kết nối hữu &iacute;ch cho người d&ugrave;ng. Bao gồm USB 2.0, USB 3.0 tốc độ cao, khe cắm thẻ nhớ để trao đổi dữ liệu. Cổng LAN v&agrave; wifi để kết nối mạng. Xuất h&igrave;nh ảnh qua kết nối HDMI v&agrave; &acirc;m thanh qua jack cắm 3.5 mm.</span></p>', 7490000, 1, 50, 4),
(72, 'HP 15 bs578TU N3710', 'Là sự lựa chọn của các bạn có nhu cầu giải trí đơn giản hay cho các phần mềm văn', '<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; -webkit-margin-before: 0px; -webkit-margin-after: 0px; -webkit-padding-start: 0px; text-rendering: geometricPrecision; font-size: 16px; color: #333333; font-family: Arial, Helvetica, sans-serif;"><span style="font-size: 10pt;">HP 15 bs578TU N3710&nbsp;thuộc d&ograve;ng sản phẩm gi&aacute; rẻ của HP, bỏ qua những t&iacute;nh năng cao cấp để tập trung v&agrave;o những điểm thiết yếu nhất cho nhu cầu người d&ugrave;ng như m&agrave;n h&igrave;nh lớn đến 15.6 inch, chạy Windows 10 bản quyền, bộ nhớ lớn, RAM 4GB v&agrave; dung lượng 500 GB. Thiết kế cơ bản nhưng chất lượng ho&agrave;n thiện kh&aacute; tốt, m&aacute;y cũng c&oacute; khối lượng dưới 2 kg nhẹ nh&agrave;ng. HP 15 bs578TU ph&ugrave; hợp với những người cần m&agrave;n h&igrave;nh lớn để giải tr&iacute; hay l&agrave;m việc. K&iacute;ch thước m&agrave;n h&igrave;nh đến 15.6 inch v&agrave; độ ph&acirc;n giải đạt HD. Tuy nhi&ecirc;n đ&acirc;y cũng l&agrave; hạn chế, v&igrave; m&aacute;y kh&aacute; lớn, k&eacute;m linh hoạt, nhất l&agrave; những bạn cần d&ugrave;ng mọi l&uacute;c, mọi nơi.&nbsp;</span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; -webkit-margin-before: 0px; -webkit-margin-after: 0px; -webkit-padding-start: 0px; text-rendering: geometricPrecision; font-size: 16px; color: #333333; font-family: Arial, Helvetica, sans-serif;"><span style="font-size: 10pt;">Cấu h&igrave;nh trung b&igrave;nh chỉ được trang bị vi xử l&yacute; trung b&igrave;nh đủ để giải tr&iacute; nhẹ nh&agrave;ng hay l&agrave;m việc văn ph&ograve;ng cơ bản. B&ugrave; lại bộ nhớ lớn với RAM 4GB v&agrave; ổ đĩa 500 GB gi&uacute;p bạn chạy nhiều ứng dụng c&ugrave;ng l&uacute;c cũng như lưu trữ nhiều dữ liệu.&nbsp;</span><span style="font-size: 10pt;">HP 15 tiện dụng với đầy đủ kết nối như USB 3.0 tốc độ cao, cổng HDMI để xuất h&igrave;nh ảnh ra m&agrave;n h&igrave;nh lớn, m&aacute;y chiếu. Kết nối mạng qua cổng LAN hoặc kh&ocirc;ng d&acirc;y wifi.&nbsp;B&ecirc;n cạnh đ&oacute; kết nối Bluetooth, khe thẻ SD, jack cắm 3.5 mm cũng được trang bị sẵn s&agrave;ng cho mọi nhu cầu.</span></p>', 7690000, 1, 50, 3),
(71, 'Acer Aspire ES1 432', 'Thuộc phân khúc giá rẻ rất phù hợp với sinh viên, học sinh hoặc người làm văn phòng', '<p><span style="font-size: 10pt;"><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">Acer Aspire ES1 432 thuộc ph&acirc;n kh&uacute;c gi&aacute; rẻ rất ph&ugrave; hợp với sinh vi&ecirc;n, học sinh hoặc người l&agrave;m văn ph&ograve;ng. Chất liệu nhựa cứng c&oacute; ưu điểm kh&aacute; cứng c&aacute;p, kh&ocirc;ng qu&aacute; nặng v&agrave; mặt lưng họa tiết v&acirc;n ch&igrave;m rất đẹp mắt.Đ</span><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">ược trang bị m&agrave;n h&igrave;nh&nbsp;14.0&nbsp;inch chuẩn độ ph&acirc;n giải HD (1366 x 768 px) cho chất lượng hiển thị kh&aacute; tốt. M&agrave;n h&igrave;nh chống l&oacute;a gi&uacute;p hiển thị tốt ngo&agrave;i trời nắng th&iacute;ch hợp cho cả những người hay di chuyển, điều kiện l&agrave;m việc ngo&agrave;i trời.&nbsp;</span><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">B&agrave;n ph&iacute;m được thiết kế th&ocirc;ng minh, độ nảy &ecirc;m gi&uacute;p g&otilde; ch&iacute;nh x&aacute;c, nhanh ch&oacute;ng, hạn chế g&otilde; nhầm. Touchpad rộng r&atilde;i gi&uacute;p thao t&aacute;c dễ d&agrave;ng hơn khi kh&ocirc;ng c&oacute; chuột kế b&ecirc;n.&nbsp;</span></span></p>\r\n<p><span style="font-size: 10pt;">Cấu h&igrave;nh cho hiệu năng ổn định&nbsp;<span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">phản hồi nhanh ch&oacute;ng với t&aacute;c vụ cơ bản. C&oacute; thể tăng tốc tối đa l&ecirc;n 2.4 GHz khi thực hiện t&aacute;c vụ nặng. M&aacute;y tiết tiệm pin rất hiệu quả v&igrave; t&aacute;c vụ nhẹ d&ugrave;ng xung nhịp CPU rất thấp. Ngo&agrave;i ra RAM&nbsp;</span><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">với dung lượng 2 GB đi k&egrave;m theo m&aacute;y gi&uacute;p giải quyết tốt t&aacute;c vụ nhẹ nh&agrave;ng. Ổ cứng HDD 500 GB gi&uacute;p bạn lưu trữ được nhiều dữ liệu hơn.</span></span></p>', 6290000, 1, 50, 4),
(70, 'Lenovo IdeaPad 120S 11IAP', 'Là dòng sản phẩm mới ra mắt và lên kệ trong quý 3/2017 hướng vào đối tượng', '<h3 style="margin: 1.5em auto 0.3em; padding: 0px; border: 0px; vertical-align: baseline; font-weight: normal; font-stretch: normal; font-size: 22px; line-height: 1.4em; font-family: Arial, Helvetica, sans-serif; color: #333333; outline: none; zoom: 1;"><span style="font-size: 10pt;">Gi&aacute; rẻ, nhỏ gọn l&agrave; d&ograve;ng sản phẩm mới ra mắt v&agrave; l&ecirc;n kệ trong qu&yacute; 3/2017 hướng v&agrave;o đối tượng người d&ugrave;ng b&igrave;nh d&acirc;n, gi&aacute; rẻ cần một chiếc laptop gọn nhẹ, cấu h&igrave;nh vừa đủ để phục vụ nhu cầu giải tr&iacute;, sử dụng.&nbsp;M&aacute;y nhỏ gọn với m&agrave;n h&igrave;nh chỉ 11.6 inch v&agrave; rất nhẹ với khối lượng chỉ 1.27 kg, cực k&igrave; thuận tiện để d&ugrave;ng mọi nơi, mọi l&uacute;c. Cấu h&igrave;nh cơ bản. Cấu h&igrave;nh r&uacute;t gọn tối đa cho gi&aacute; rẻ, vừa phục vụ nhu cầu sử dụng cơ bản vừa linh hoạt để người d&ugrave;ng n&acirc;ng cấp. Lenovo Ideapad 120s chỉ trang bị vi xử l&yacute; Intel Celeron N3350, tốc độ 1.1 GHz, c&oacute; thể n&acirc;ng l&ecirc;n đến 2.4 GHz. Tuy nhi&ecirc;n bộ nhớ RAM DDR4 l&agrave; một lợi thế, cho tốc độ xử l&yacute; mượt m&agrave;, b&ugrave; lại dung lượng chỉ 2 GB kh&aacute; hạn chế. Ổ cứng chỉ 32 GB kh&aacute; thấp nhưng bạn c&oacute; thể dễ d&agrave;ng lưu trữ dữ liệu với ổ cứng rời, USB qua cổng USB chuẩn 3.0 tốc độ cao đễ d&agrave;ng.&nbsp;</span></h3>\r\n<h3 style="margin: 1.5em auto 0.3em; padding: 0px; border: 0px; vertical-align: baseline; font-weight: normal; font-stretch: normal; font-size: 22px; line-height: 1.4em; font-family: Arial, Helvetica, sans-serif; color: #333333; outline: none; zoom: 1;"><span style="font-size: 10pt;">Kết nối hiện đại giảm tối thiếu cấu h&igrave;nh nhưng Lenovo Ideapad 120s vẫn sẽ l&agrave; chiếc m&aacute;y giải tr&iacute; tốt, thậm ch&iacute; hiện đại.Chiếc laptop n&agrave;y sở hữu nhiều kết nối hiện đại như cổng USB 3.0 tốc độ cao, cổng HDMI để xuất h&igrave;nh ảnh v&agrave; USB Type C đa năng. B&ecirc;n cạnh đ&oacute; l&agrave; wifi chuẩn AC ti&ecirc;n tiến gi&uacute;p bắt s&oacute;ng wifi rộng hơn, tốc độ ổn định hơn.</span></h3>\r\n<p>&nbsp;</p>', 5190000, 1, 50, 5),
(69, 'Dell Inspiron 15 N3567 C5I31120 ', 'Laptop Dell Inspiron 15 N3567 C5I31120 - Không gian rộng lớn, hiệu năng cực tốt', '<p><span style="font-size: 10pt;"><span style="color: #6d6e71; font-family: Arial, Helvetica, sans-serif; text-align: justify;">Laptop Dell Inspiron 15 N3567 C5I31120&nbsp;l&agrave; d&ograve;ng m&aacute;y t&iacute;nh x&aacute;ch tay cực kỳ ph&ugrave; hợp với c&aacute;c bạn học sinh, sinh vi&ecirc;n hay d&acirc;n văn ph&ograve;ng c&oacute; y&ecirc;u cầu cấu h&igrave;nh từ trung b&igrave;nh kh&aacute; trở l&ecirc;n. Hơn thế nữa, với kiểu d&aacute;ng mạnh mẽ, m&agrave;n h&igrave;nh lớn sắc n&eacute;t 15.6 inches, cho kh&ocirc;ng gian hiển thị thoải m&aacute;i hơn, d&ograve;ng Dell Inspiron 15 N3567 C5I31120&nbsp;hứa hẹn sẽ l&agrave; một trong những thiết bị học tập kh&ocirc;ng thể thiếu, l&agrave; lựa chọn tuyệt vời cho bạn.&nbsp;</span><span style="color: #6d6e71; font-family: Arial, Helvetica, sans-serif; text-align: justify;">Nhằm gi&uacute;p người d&ugrave;ng dễ d&agrave;ng mang m&aacute;y theo khi l&agrave;m việc ở m&ocirc;i trường b&ecirc;n ngo&agrave;i, nh&agrave; sản xuất đ&atilde; thiết kế chiếc Dell Inspiron 15 N3567 C5I31120&nbsp;theo phong c&aacute;ch mạnh mẽ, thiết kế trẻ trung, năng động. M&aacute;y c&oacute; trọng lượng chỉ</span><span style="color: #6d6e71; font-family: Arial, Helvetica, sans-serif; text-align: justify;">&nbsp;</span><span style="color: #6d6e71; font-family: Arial, Helvetica, sans-serif; text-align: justify; box-sizing: inherit;">2.24 Kg</span><span style="color: #6d6e71; font-family: Arial, Helvetica, sans-serif; text-align: justify;">, k&iacute;ch thước chiều d&agrave;i: 380 mm, chiều rộng: 260.3 mm c&ugrave;ng độ d&agrave;y: 23.65 mm, kh&ocirc;ng chiếm qu&aacute; nhiều diện t&iacute;ch để người d&ugrave;ng dễ d&agrave;ng mang theo.</span></span></p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 9px; color: #6d6e71; font-family: Arial, Helvetica, sans-serif; text-align: justify;"><span style="font-size: 10pt;">Một số c&aacute;c chi tiết kh&aacute;c cũng được h&atilde;ng Dell thiết kế kỹ lưỡng, phần khung b&ecirc;n ngo&agrave;i rất chắc chắn v&agrave; cứng c&aacute;p, nhằm đảm bảo độ bền v&agrave; gi&uacute;p m&aacute;y k&eacute;o d&agrave;i tuổi thọ&nbsp;<span style="box-sizing: inherit;">m&agrave;n h&igrave;nh 15.6 inches, kh&ocirc;ng gian hiển thị lớn&nbsp;</span><span style="box-sizing: inherit;">vi xử l&yacute; Intel Core i3-6006U&nbsp;mạnh mẽ, RAM 4GB, ổ cứng 1TB&nbsp;</span><span style="box-sizing: inherit;">pin tốt 4 Cell, ph&iacute;m bấm độ nảy tốt, Touchpad nhanh nhạy, nhiều kết nối</span></span></p>', 9470000, 1, 50, 1),
(68, 'Asus E402NA-GA034', 'Với thiết kế cổ điển và màu xanh đen ấn tượng bên ngoài nên thu hút được mọi ánh nhìn', '<h2 style="margin: 0px 0px 17px; padding: 0px; font-size: 16px; line-height: 2.4rem; color: #404040; font-family: Helvetica, Arial, sans-serif;"><span style="font-size: 10pt;"><span style="margin: 0px; padding: 0px;" data-spm-anchor-id="a2o4n.prod.0.i5.6967be73OxIqph">Với thiết kế cổ điển v&agrave; m&agrave;u xanh đen ấn tượng b&ecirc;n ngo&agrave;i, chiếc Laptop Asus E402NA-GA034 thu h&uacute;t người d&ugrave;ng, nhất l&agrave; c&aacute;c bạn trẻ ngay từ c&aacute;i nh&igrave;n đầu ti&ecirc;n. Đặc biệt, thiết bị n&agrave;y c&ograve;n sở hữu kiểu d&aacute;ng gọn g&agrave;ng c&ugrave;ng cấu h&igrave;nh cực kỳ mạnh mẽ b&ecirc;n trong, cho hiệu năng cực tốt, phục vụ nhu cầu học tập, l&agrave;m việc v&agrave; giải tr&iacute; đa phương tiện.&nbsp;</span>Phủ l&ecirc;n m&igrave;nh t&ocirc;ng m&agrave;u xanh đen mạnh mẽ v&agrave; ấn tượng, d&ograve;ng&nbsp;<span style="margin: 0px; padding: 0px;">Laptop Asus E402NA-GA034&nbsp;</span>được thiết kế theo phong c&aacute;ch tối giản phần lớn c&aacute;c chi tiết, c&aacute;c g&oacute;c cạnh được bo cong cực nhẹ, mang đến vẻ ngo&agrave;i hiện đại, thời trang nhưng cũng kh&ocirc;ng k&eacute;m phần tinh tế v&agrave; sang trọng.&nbsp;M&aacute;y c&oacute; trọng lượng kh&aacute; nhẹ, chỉ 1.65 Kg c&ugrave;ng k&iacute;ch thước chiều d&agrave;i: 339 mm, chiều rộng: 235 mm v&agrave; độ d&agrave;y: 21.9 mm, kh&ocirc;ng chiếm nhiều diện t&iacute;ch, gi&uacute;p bạn dễ d&agrave;ng xếp gọn trong giỏ x&aacute;ch hay t&uacute;i du lịch. Ngo&agrave;i ra, những chi tiết kh&aacute;c như bản lề, cổng kết nối... cũng được h&atilde;ng&nbsp;<span style="margin: 0px; padding: 0px;">Asus</span>&nbsp;ho&agrave;n thiện đ&aacute;ng kể, đảm bảo t&iacute;nh chắc chắn v&agrave; độ bền, k&eacute;o d&agrave;i tuổi thọ cho m&aacute;y.&nbsp;Laptop<span style="margin: 0px; padding: 0px;">&nbsp;E402NA-GA034</span>&nbsp;được nh&agrave; sản xuất trang bị m&agrave;n h&igrave;nh c&ocirc;ng nghệ HD Graphics, k&iacute;ch thước 14 inches, độ ph&acirc;n giải 1366 x 768 pixels, mang đến cho bạn những h&igrave;nh ảnh r&otilde; n&eacute;t, chi tiết, cực kỳ chất lượng, m&agrave;u sắc cũng hết sức trung thực v&agrave; sống động. Do đ&oacute;, khi sử dụng chiếc Laptop&nbsp;<span style="margin: 0px; padding: 0px;">Asus E402NA-GA034</span>, bạn ho&agrave;n to&agrave;n c&oacute; thể lướt web, soạn thảo văn bản, xử l&yacute; c&ocirc;ng việc hay giải tr&iacute;, xem phim, chơi game trong nhiều giờ liền m&agrave; kh&ocirc;ng cần phải lo ngại về t&igrave;nh trạng mỏi mắt hay chất lượng h&igrave;nh ảnh hiển thị.&nbsp;<span style="margin: 0px; padding: 0px;" data-spm-anchor-id="a2o4n.prod.0.i17.6967be73OxIqph">Một điểm thu h&uacute;t người d&ugrave;ng nữa của chiếc&nbsp;<span style="margin: 0px; padding: 0px;">laptop Asus E402NA-GA034</span>&nbsp;l&agrave; sở hữu hệ thống b&agrave;n ph&iacute;m hiện đại, ph&iacute;m rộng, &ecirc;m, khoảng c&aacute;ch giữa c&aacute;c ph&iacute;m cực kỳ hợp l&yacute;, gi&uacute;p người d&ugrave;ng đ&aacute;nh m&aacute;y nhanh ch&oacute;ng v&agrave; kh&ocirc;ng g&acirc;y tiếng ồn.&nbsp;</span><span style="margin: 0px; padding: 0px;">Hơn nữa, Touchpad của thiết bị n&agrave;y cũng c&oacute; diện t&iacute;ch rộng, cảm ứng kh&aacute; nhạy, để bạn thực thiện c&aacute;c thao t&aacute;c chuột hiệu quả hơn. M&aacute;y được trang bị dung lượng pin 2 Cell, c&ugrave;ng c&aacute;c kết nối th&ocirc;ng dụng kh&aacute;c.</span></span></h2>', 5790000, 1, 50, 2),
(74, 'Lenovo IdeaPad 110 15IBR N3710', 'Là chiếc laptop đơn giản hỗ trợ bạn công việc nhẹ nhàng và giải trí hằng ngày.\n', '<p><span style="font-size: 10pt;"><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">Lenovo IdeaPad 110 15IBR N3710&nbsp;</span><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">sở hữu cho m&igrave;nh m&agrave;n h&igrave;nh c&oacute; k&iacute;ch thước lớn 15.6 inch độ ph&acirc;n giải HD&nbsp;(1366 x 768 pixels), c&ugrave;ng c&ocirc;ng nghệ LED Backlit&nbsp;</span><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">mang lại cho bạn kh&ocirc;ng gian sử dụng thoải m&aacute;i cũng như cho chất lượng hiển thị tốt.&nbsp;</span><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">M&aacute;y sở hữu vỏ nhựa được l&agrave;m nh&aacute;m với c&aacute;c đường kẻ song song với nhau tạo sự mạnh mẽ v&agrave; c&aacute; t&iacute;nh cho người d&ugrave;ng. Ngo&agrave;i ra phần bản lề của m&aacute;y cũng được ho&agrave;n thiện chắc chắn gi&uacute;p m&aacute;y c&oacute; thể tr&aacute;nh được c&aacute;c hư hỏng do va chạm.&nbsp;</span><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">M&aacute;y được trang bị con chip Intel&nbsp;Pentium&nbsp;N3710 tốc độ 1.6 GHz kết hợp với RAM 4 GB DDR3 đem lại hiệu năng hoạt động kh&aacute; ổn định. Bạn c&oacute; thể sử dụng c&aacute;c ứng dụng văn ph&ograve;ng cơ bản hay chơi c&aacute;c tựa game nhẹ m&agrave; m&aacute;y kh&ocirc;ng xảy ra hiện tượng giật lag.</span></span></p>\r\n<p><span style="font-size: 10pt;"><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">Lenovo IdeaPad 110 15IBR N3710 được trang bị đầy đủ c&aacute;c cổng kết nối cần thiết tr&ecirc;n laptop với 1 cổng USB 2.0, 1 cổng USB 3.0, 1 cổng HDMI, cổng mạng LAN cũng như được t&iacute;ch hợp ổ đĩa quang tiện dụng.</span></span></p>', 6990000, 1, 50, 5),
(75, 'Asus X441NA N4200', 'Là sự lựa chọn giá tốt phù hợp với học sinh - sinh viên hoặc người dùng làm việc văn phòng, giải trí', '<p><span style="font-size: 10pt;"><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">Laptop ASUS X441NA c&oacute; thiết kế ph&ugrave; hợp cho người l&agrave;m văn ph&ograve;ng, hay đặc biệt l&agrave; sinh vi&ecirc;n v&agrave; học sinh. Chất liệu vỏ nhựa nhẹ nh&agrave;ng chỉ khoảng 1.7 kg th&iacute;ch hợp cho sử dụng cố định hay phải di chuyển đều thuận tiện. B&ugrave; lại m&aacute;y kh&aacute; d&agrave;y. Họa tiết v&acirc;n xước giả kim loại tr&ecirc;n lưng m&aacute;y được thể hiện đẹp mắt. M</span><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">&agrave;n h&igrave;nh k&iacute;ch thước 14 inch, c&ocirc;ng nghệ LED Backlit&nbsp;</span><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">độ ph&acirc;n giải HD cho khả năng hiển thị đủ tốt cho c&aacute;c nhu cầu c&ocirc;ng việc, học tập v&agrave; giải tr&iacute; cơ bản.&nbsp;</span><span style="color: #333333; font-family: Arial, Helvetica, sans-serif;">Laptop ASUS X441NA kh&ocirc;ng nổi bật về hiệu năng, c&aacute;c trang bị tr&ecirc;n thiết bị n&agrave;y ở mức đủ s&agrave;i cho c&aacute;c nhu cầu văn ph&ograve;ng, giải tr&iacute; nhẹ nh&agrave;ng. Bao gồm vi xử l&yacute; Petium&nbsp;N4200 tốc độ 1.10 GHz (xung nhịp tối đa 2.50 GHz khi thực hiện t&aacute;c vụ nặng). Tuy vậy nhờ tốc độ CPU tăng giảm theo hoạt động của m&aacute;y n&ecirc;n tiết kiệm pin m&aacute;y kh&aacute; hiệu quả nhưng vẫn đảm bảo hoạt động ở mức độ cao khi cần thiết.&nbsp;</span>Bộ nhớ RAM 4 GB (kh&ocirc;ng thể n&acirc;ng cấp th&ecirc;m) v&agrave; kh&ocirc;ng gian lưu trữ dữ liệu ổ cứng HDD 500 GB kh&aacute; dư giả.</span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; border: 0px; vertical-align: baseline; -webkit-margin-before: 0px; -webkit-margin-after: 0px; -webkit-padding-start: 0px; text-rendering: geometricPrecision; font-size: 16px; color: #333333; font-family: Arial, Helvetica, sans-serif;"><span style="font-size: 10pt;">B&agrave;n ph&iacute;m chiclet tr&ecirc;n ASUS X441NA thao t&aacute;c thoải m&aacute;i, dễ d&agrave;ng với độ nẩy cao, ph&iacute;m bấm &ecirc;m. Touchpad lớn thuận tiện hơn với hệ thống c&aacute;c cử chỉ th&ocirc;ng minh bằng nhiều ng&oacute;n tay. Đặc biệt, c&ocirc;ng nghệ &acirc;m thanh Sonic Master gi&uacute;p n&acirc;ng cao trải nghiệm &acirc;m thanh cho nhu cầu giải tr&iacute; tuyệt vời hơn. ASUS X441NA được trang bị đầy đủ kết nối từ th&ocirc;ng dụng đến ti&ecirc;n tiến như trao đổi dữ liệu qua cổng USB 2.0, USB 3.0 tốc độ cao, USB type C mới, khe đọc thẻ nhớ v&agrave; bluetooth v4.0. Xuất h&igrave;nh ảnh qua cổng VGA hoặc HDMI. Kết nối mạng th&ocirc;ng qua cổng LAN hoặc wifi. Cuối c&ugrave;ng l&agrave; xuất &acirc;m thanh qua jack cắm 3.5 mm phổ biến. B&ecirc;n cạnh đ&oacute;, camera 0.3 MP hỗ trợ gọi video call v&agrave; vi&ecirc;n pin 3 cell cho thời lượng sử dụng ở mức trung b&igrave;nh.</span></p>', 7690000, 1, 50, 2),
(77, 'HP 15 bs572TU i3 6006U', 'Là sự lựa chọn cho các bạn sinh viên , giáo viên, kế toán hay nhân viên văn phòng.', '<p style="box-sizing: border-box; margin: 0px; color: #747272; font-size: 0.9em; line-height: 1.8em; padding: 1.5em 0px; font-family: Exo, sans-serif;"><span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;"><span style="box-sizing: border-box; color: #333333;"><span style="box-sizing: border-box;">HP 15 bs572TU i3 6006U&nbsp;</span></span><span style="box-sizing: border-box; color: #333333;">thuộc d&ograve;ng sản phẩm gi&aacute; rẻ với nhưng t&iacute;nh năng cơ bản của HP b&ugrave; lại cấu h&igrave;nh tốt, nổi bật l&agrave; m&agrave;n h&igrave;nh 15.6 inch sắc n&eacute;t, vi xử l&yacute; Intel Core i3 thế hệ 6, ổ cứng đến 500 GB v&agrave; chạy Windows 10. M&aacute;ysử dụng vỏ nhựa v&agrave; nặng dưới 2 kg gi&uacute;p bạn thuận tiện khi di chuyển.&nbsp;</span><span style="box-sizing: border-box; color: #333333;">&nbsp;M</span><span style="box-sizing: border-box; color: #333333;">&agrave;n h&igrave;nh lớn đến 15.6 inch cho nhiều kh&ocirc;ng gian hoạt động để chơi game, xem phim hay l&agrave;m việc đều tốt, tấm nền độ ph&acirc;n giải FullHD hiển thị chi tiết, sắc n&eacute;t từng khung h&igrave;nh.&nbsp;</span><span style="box-sizing: border-box; color: #333333;">Trong tầm gi&aacute; 10 triệu phổ th&ocirc;ng, HP 15 bs572TU vẫn được trang bị CPU Intel Core i3 thế hệ thứ 6 đ&aacute;p ứng ở mức trung b&igrave;nh c&aacute;c c&ocirc;ng việc th&ocirc;ng thường của người d&ugrave;ng, thậm ch&iacute; chơi tốt một số game.&nbsp;</span>Laptop thế hệ mới n&ecirc;n cũng được sử dụng RAM DDR4 tốc độ cao với dung lượng đến 4 GB thoải m&aacute;i chạy nhiều phần mềm c&ugrave;ng l&uacute;c. Ổ cứng đến 500 GB lưu trữ được nhiều dữ liệu: h&igrave;nh ảnh, phim... HP 15 bs572TU chạy Windows 10 bản quyền theo m&aacute;y.</span></p>\r\n<p style="box-sizing: border-box; margin: 0px 0px 10px; color: #333333; font-size: 16px; line-height: 1.8em; padding: 0px; border: 0px; vertical-align: baseline; -webkit-margin-before: 0px; -webkit-margin-after: 0px; -webkit-padding-start: 0px; text-rendering: geometricPrecision; font-family: Arial, Helvetica, sans-serif;"><span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">HP 15 bs572TU c&oacute; đa dạng cổng kết nối từ USB 3.0, USB 2.0, khe thẻ nhớ để cắm chuột, b&agrave;n ph&iacute;m rời, USB... Cổng HDMI để xuất m&agrave;n h&igrave;nh, m&aacute;y chiếu. Cổng LAN để kết nối c&aacute;p mạng, wifi v&agrave; bluetooth kết nối kh&ocirc;ng d&acirc;y. HP 15 bs572TU c&oacute; b&agrave;n ph&iacute;m lớn với ph&iacute;m số ri&ecirc;ng một b&ecirc;n cho khả năng thao t&aacute;c nhanh ch&oacute;ng nhất l&agrave; những ng&agrave;nh nghề cần nhập liệu nhiều như kế to&aacute;n, h&agrave;nh ch&iacute;nh... HP 15 bs572TU d&ograve;ng gi&aacute; rẻ nhưng vẫn được trang bị một số t&iacute;nh năng kh&aacute; hay như HP Coolsense, điều chỉnh hoạt động, gi&uacute;p m&aacute;y hoạt động trong t&igrave;nh trạng m&aacute;t mẻ, tr&aacute;nh sinh nhiều nhiệt ảnh hưởng đến tuổi thọ phần cứng m&aacute;y.</span></p>', 10990000, 1, 50, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `f_ID` int(11) NOT NULL AUTO_INCREMENT,
  `f_Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f_Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f_Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f_DOB` date NOT NULL,
  `f_Permission` int(11) NOT NULL,
  PRIMARY KEY (`f_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`f_ID`, `f_Username`, `f_Password`, `f_Name`, `f_Email`, `f_DOB`, `f_Permission`) VALUES
(1, 'truongthuan', '25d55ad283aa400af464c76d713c07ad', 'Trương Thuận', 'truongthuan20041997@gmail.com', '1997-04-20', 0),
(2, 'minhson', 'e807f1fcf82d132f9bb018ca6738a19f', 'Trần Minh Sơn', 'tmson@gmail.com', '1997-12-08', 0),
(5, 'admin', '25d55ad283aa400af464c76d713c07ad', 'Quản Trị Viên', 'qtvien@gmail.com', '1997-12-06', 2),
(11, 'thu', '25d55ad283aa400af464c76d713c07ad', 'Lữ Thị Anh Thư', 'lathu290897@gmail.com.vn', '1997-08-29', 0),
(10, 'akira', '25d55ad283aa400af464c76d713c07ad', 'akirathuan', 'akira@facebook.com', '1997-03-02', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
