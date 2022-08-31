-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: יולי 14, 2022 בזמן 07:30 AM
-- גרסת שרת: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `components`
--

CREATE TABLE `components` (
  `idcomponet` int(11) NOT NULL,
  `id_formula` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `components`
--

INSERT INTO `components` (`idcomponet`, `id_formula`, `description`) VALUES
(1, 'Cheese Cake', '2 כוסות או 280 גרם קמח לבן '),
(2, 'Cheese Cake', 'שתי כפיות אבקת אפייה'),
(3, 'Cheese Cake', 'שליש כוס סוכר לבן'),
(4, 'Cheese Cake', 'שקית סוכר וניל'),
(5, 'Cheese Cake', '200 גרם חמאה קרה'),
(6, 'Cheese Cake', 'ארבעה חלבונים'),
(7, 'Cheese Cake', '200 גרם שוקולד');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `formulas`
--

CREATE TABLE `formulas` (
  `id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `href` varchar(100) NOT NULL,
  `publishDate` date NOT NULL,
  `publishName` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `pagetitle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `formulas`
--

INSERT INTO `formulas` (`id`, `title`, `body`, `image`, `href`, `publishDate`, `publishName`, `description`, `pagetitle`) VALUES
('Cheese Cake', 'עוגת גבינה פירורים', 'We implement this!!', 'images/cheese-cake.jpg', 'recipe.php?id=\'Cheese Cake\'', '2017-07-17', 'Naor', 'עוגת גבינה פירורים מדהימה וקלה מאוד להכנה עם בסיס פריך, <br>\r\nמלית גבינה עשירה ורכה במיוחד בניחוח וניל עם תוספת של שמנת חמוצה ומעל הכל פירורים פריכים וזהובים', 'מתכון עוגת גבינה'),
('Chocolate Cake', 'Chocolate Cake', 'Easy chocolate cake to make', 'images/choco-cake.jpg', '', '2018-07-18', 'Yazan', NULL, 'מתכון עוגת שוקולד'),
('Pea Soup', 'Pea Soups', 'Healthy soup for a cool day', 'images/marak.jpg', '', '2016-04-05', 'Yazan', NULL, 'מתכון מרק'),
('Pizza', 'Pizza', 'Home made pizza', 'images/pizza.jpg', '', '2013-07-16', 'Yazan', NULL, 'מתכון פיצה'),
('Rice', 'White Rice', 'Simple white rice', 'images/orez.jpg', '', '2020-07-15', 'Yotam', NULL, 'מתכון אורז'),
('Spicy Flakes', 'Spicy flakes', 'Flakes in herbs', 'images/petitim.jpg', '', '2020-07-20', 'Naor', NULL, 'מתכון פתיתים');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `instructions`
--

CREATE TABLE `instructions` (
  `inst_id` int(11) NOT NULL,
  `id_formula` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `instructions`
--

INSERT INTO `instructions` (`inst_id`, `id_formula`, `description`) VALUES
(1, 'Cheese Cake', 'בצק עוגת גבינה פירורים: מחממים תנור ל-180 מעלות'),
(2, 'Cheese Cake', 'במעבד מזון מעבדים קמח, אבקת אפייה, 1/3 כוס סוכר, סוכר וניל וקוביות חמאה לתערובת פירורית. מוסיפים חלמונים ומעבדים בלחיצות קצרות (פולסים) רק עד לקבלת בצק פירורי'),
(3, 'Cheese Cake', 'לתחתית - משמנים את תבנית העוגה. מהדקים בידיים מחצית מהבצק בשכבה אחידה לתחתית התבנית.'),
(4, 'Cheese Cake', 'מנמיכים את מהירות המיקסר, מוסיפים גבינה ומקציפים עוד כמה שניות לאיחוד.'),
(5, 'Cheese Cake', 'משטחים את תערובת הגבינה בתבנית העוגה, מעל התחתית האפויה.'),
(6, 'Cheese Cake', 'מעבירים למקרר ל-4 שעות לפחות, להתייצבות'),
(7, 'Cheese Cake', 'פורסים בסכין טבולה במים רותחים ומגישים');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `users`
--

CREATE TABLE `users` (
  `email` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- הוצאת מידע עבור טבלה `users`
--

INSERT INTO `users` (`email`, `fullname`, `username`, `birthdate`, `active`, `password`) VALUES
('naor117@gmail.com', 'נאור ברזילי', 'naor2424', '2022-06-28', 1, '123456'),
('naor12@gmail.com', 'נאור ברזילי', 'naor12', '2022-07-19', 0, '123456'),
('naor2225@gmail.com', 'נאור ברזילי', 'czxcxc', '2022-07-02', 1, '1234567'),
('test@test.com', 'test user', 'testuser', '2016-07-05', 1, '1234');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`idcomponet`,`id_formula`);

--
-- אינדקסים לטבלה `formulas`
--
ALTER TABLE `formulas`
  ADD PRIMARY KEY (`id`);

--
-- אינדקסים לטבלה `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`inst_id`);

--
-- אינדקסים לטבלה `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
