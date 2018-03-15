-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 15 2018 г., 21:49
-- Версия сервера: 5.7.11
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', NULL),
('admin', '2', 1494336505);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Администратор', NULL, NULL, 1494335450, 1494335450);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Компьютеры'),
(2, 'Бытовая техника'),
(3, 'Телефоны');

-- --------------------------------------------------------

--
-- Структура таблицы `characteristics`
--

CREATE TABLE IF NOT EXISTS `characteristics` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `characteristics`
--

INSERT INTO `characteristics` (`id`, `title`) VALUES
(1, 'Процессор'),
(2, 'Диагональ экрана'),
(3, 'Объем оперативной памяти'),
(4, 'Операционная система'),
(5, 'Объём накопителя'),
(6, 'Оптический привод'),
(7, 'Цвет'),
(8, 'Вес'),
(9, 'Клавиатура'),
(10, 'Количество слотов для оперативной памяти'),
(11, 'Батарея'),
(12, 'Тип оперативной памяти'),
(13, 'Графический адаптер'),
(14, 'Сетевые адаптеры'),
(15, 'Разъемы и порты ввода-вывода'),
(16, 'Характеристики батареи'),
(17, 'Габариты (Ш х Г х В)'),
(18, 'Гарантия'),
(19, 'Разрешение дисплея'),
(20, 'Тип матрицы'),
(21, 'Количество точек касания'),
(22, 'Материал экрана'),
(23, 'Количество СИМ-карт'),
(24, 'Встроенная память'),
(25, 'Тест');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `description` varchar(4096) NOT NULL,
  `price` float NOT NULL,
  `rating` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` smallint(2) DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `manufactory_id` int(11) DEFAULT NULL,
  `small_description` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `category_id`, `tags`, `description`, `price`, `rating`, `quantity`, `status`, `created_at`, `updated_at`, `image`, `manufactory_id`, `small_description`) VALUES
(1, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 1, 'Ноутбук Asus VivoBook Max X541SA (X541SA-XO041D) Black', 'ASUS VivoBook Max X541. Великолепный звук. Взрывная сила.\r\nНоутбук ASUS серии VivoBook X отличается великолепными мультимедийными возможностями. Оснащенный мощным процессором Intel, он справится с самыми ресурсоемкими задачами. Эксклюзивная аудиотехнология SonicMaster с программными средствами ICEpower обеспечивает беспрецедентное для мобильных компьютеров качество звучания.\r\n\r\nСозданный для цифровых развлечений\r\nНоутбук ASUS серии X может похвастаться великолепными мультимедийными возможностями. Эксклюзивная аудиотехнология SonicMaster с программными средствами ICEpower, а также фирменные технологии ASUS Splendid и ASUS Tru2Life Video, обеспечивают беспрецедентное для мобильных компьютеров качество звучания и отличное изображение.\r\n\r\nАудиотехнология ASUS SonicMaster\r\nАудиотехнология SonicMaster с программными средствами ICEpower обеспечивает кристально чистый звук. В данной модели ноутбука используются 3-ваттные динамики с увеличенной резонансной камерой и специальной трансмиссионной линией для мощного и чистого звучания в широком частотном диапазоне. Кроме того, динамики ноутбука подвергаются высокоточной настройке для гарантированно высокого качества звучания.\r\n\r\nТонкая настройка\r\nДля настройки звучания служит функция AudioWizard, предлагающая выбрать один из пяти вариантов работы аудиосистемы, каждый из которых идеально подходит для определенного типа приложений (музыка, фильмы, игры и т.д.).\r\n\r\nБеспрецедентный уровень детализации\r\nТехнология ASUS TruLife Video оптимизирует резкость и контрастность видео на уровне отдельных пикселей для более точной передачи оттенков и улучшения качества изображения в целом.\r\n\r\nТехнология ASUS Eye Care для комфорта ваших глаз\r\nКороткие электромагнитные волны, соответствующие пурпурно-синему краю спектра, обладают большей энергией, поэтому оказывают более сильный эффект на сетчатку глаза. В режиме ASUS Eye Care реализована фильтрация этой составляющей видимого спектра для повышения комфорта при чтении и снижения вредного влияния синего света на зрение.\r\n\r\nВысокоскоростной и компактный порт USB Type-C\r\nНоутбук ASUS серии X оборудован разъемом USB 3.1 Type-C, HDMI и VGA, а также кардридером "3-в-1" для полной совместимости с широким спектром периферийных устройств. Компактный разъем USB Type-C имеет специальную конструкцию, которая позволяет подключать USB-кабель к ноутбуку любой стороной. При этом этот порт работает на скорости до 5 Гбит/с, то есть в 10 раз быстрее, чем USB 2.0. Это означает быструю передачу больших объемов информации, например видеофайлов.\r\n\r\nКомфортная работа\r\nVivoBook оснащается эргономичной клавиатурой и высокоточным тачпадом, снабженным защитой от случайных прикосновений.\r\n\r\nНабор текста\r\nНоутбук оснащен полноразмерной клавиатурой с эргономичными клавишами. Оптимальный ход клавиш (2.3 мм) способствует точному отклику на нажатие, а благодаря цельной конструкции клавиатура не прогибается.\r\n\r\nБольшой тачпад\r\nНоутбук с большим тачпадом (106x74 мм), который обладает защитой от случайных прикосновений.\r\n\r\nДолговечный аккумулятор\r\nНоутбук серии X оснащается литий-полимерной батареей, которая поддерживает свыше 700 циклов зарядки, то есть в 3 раза больше, чем у стандартных литий-ионных аккумуляторов.', 250.5, 0, 20, NULL, 1492036111, 1492036111, '', 1, 'Экран 15.6" (1366x768) HD, матовый / Intel Celeron N3060 (1.6 - 2.48 ГГц) / RAM 4 ГБ / HDD 500 ГБ / Intel HD Graphics 400 / DVD SuperMulti / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2 кг / черный'),
(2, 'Lenovo A Plus (A1010a20) White', 3, 'Lenovo A Plus (A1010a20) White', 'ОС Android 5.1 (Lollipop)\r\nБлагодаря новым функциям, радикальным визуальным изменениям и системным улучшением, операционная система Android 5.1 работает еще быстрее и эффективнее, а также потребляет меньше заряда аккумулятора по сравнению с прошлыми версиями. В результате, смартфон A Plus отличается скоростью, мощностью и бесперебойность работы.\r\n\r\nСкорость 3G\r\nБудьте в курсе всех последних событий, делайте снимки и сразу делитесь ими с друзьями благодаря поддержке сетей 3G на вашем A Plus. Поддержка стандарта HSPA + и скорость загрузки в 21 Мб/с обеспечивают мгновенный онлайн-доступ к социальным сетям, видео и музыке.\r\n\r\nБезупречная работа процессора\r\nБлагодаря четырехъядерному процессору с тактовой частотой 1.3 ГГц, смартфон A Plus отличается быстрой работой в режиме многозадачности, идеальной работой ОС Android и бесперебойным воспроизведением видео и игр.\r\n\r\nУдобное управление одной рукой\r\nВесом всего 146 г, смартфон A Plus с 4.5-дюймовым сенсорным дисплеем прекрасно помещается в вашей ладони. Встроенные фронтальная и основная камеры. Делайте четкие снимки и снимайте качественное видео на смартфон A Plus благодаря основной камере 5 Мп с LED-вспышкой, а фронтальная камера превратит видеочат на легкий и веселый процесс.\r\n\r\nGPS работающий в автономном режиме\r\nНаходить дорогу никогда еще не было так просто. Смартфон A Plus оснащен модулем спутниковой навигации GPS, позволяет проложить точный маршрут даже без доступа к сети Интернет.\r\n\r\nВозможность расширения хранилища данных\r\nВнутреннюю память A Plus можно с легкостью увеличить на дополнительные 32 ГБ, установив карту microSD: теперь вам всегда хватит места для фотографий, музыки, видео и других файлов.\r\n\r\nПоддержка двух SIM-карт\r\nСмартфон поддерживает две SIM-карты: вы сможете с легкостью разделить рабочее и личное общение, сэкономить на разговорах в зарубежной поездке или просто воспользоваться наиболее выгодным тарифом.', 300.75, 0, 45, 1, 1492066653, 1492066653, '', 2, 'Экран (4.5", TN, 480x854)/ MediaTek MT6580M (1.3 ГГц)/ основная камера: 5 Мп, фронтальная камера: 2 Мп/ RAM 1 ГБ/ 8 ГБ встроенной памяти + microSD/SDHC (до 32 ГБ)'),
(3, 'Nord', 2, 'Холодильник', 'Холодильник Nord', 100, 0, 50, 1, 1492549542, 1492549542, NULL, NULL, ''),
(4, 'Lenovo', 1, 'Lenovo Idea pad G50-30', 'Леново ноутбук', 650, 0, 50, 0, 1493275879, 1493275879, '', 2, ''),
(5, 'Test', 1, 'Test', 'test', 1000, 0, 20, NULL, 1495114375, 1495114375, '', 1, 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(1, 'Goods/Goods1/2c6602.jpg', 1, 1, 'Goods', '98db814914-1', ''),
(3, 'Goods/Goods4/94d8c4.jpg', 4, 1, 'Goods', '127db9176a-1', ''),
(4, 'Goods/Goods2/4b84f6.jpg', 2, 1, 'Goods', '7c5df573ae-2', ''),
(5, 'Goods/Goods2/6853cd.png', 2, NULL, 'Goods', '2c1a84f66c-3', ''),
(6, 'Goods/Goods2/0bb089.png', 2, NULL, 'Goods', 'ce39cf43b5-4', ''),
(7, 'Goods/Goods1/5736fb.jpg', 1, NULL, 'Goods', '71b16105f9-2', ''),
(8, 'Goods/Goods5/515fc0.jpg', 5, 1, 'Goods', 'bcf1aa9230-1', ''),
(9, 'Goods/Goods1/6a2959.jpg', 1, NULL, 'Goods', '7520c6a486-3', ''),
(10, 'Goods/Goods1/691000.jpg', 1, NULL, 'Goods', '6eab65915e-4', '');

-- --------------------------------------------------------

--
-- Структура таблицы `manufactory`
--

CREATE TABLE IF NOT EXISTS `manufactory` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manufactory`
--

INSERT INTO `manufactory` (`id`, `title`) VALUES
(1, 'Asus'),
(2, 'Lenovo');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1491949979),
('m140506_102106_rbac_init', 1492008675),
('m140622_111540_create_image_table', 1493246922),
('m140622_111545_add_name_to_image_table', 1493246922),
('m170411_220342_create_user_table', 1491949991),
('m170411_223500_create_category_table', 1491950226),
('m170411_223517_create_goods_table', 1491950836),
('m170426_231710_add_image_in_goods_table', 1493248755),
('m170504_110224_create_manufactory_table', 1493895839),
('m170504_110541_add_manufactory_id_in_goods_table', 1493896235),
('m170507_231655_create_order_table', 1494199409),
('m170507_232344_create_order_goods_table', 1494199488),
('m170507_232508_add_goods_id_in_order_goods_table', 1494199825),
('m170507_232545_add_order_id_in_order_goods_table', 1494199826),
('m170508_015745_add_name_in_order_goods_table', 1494208901),
('m170508_015923_add_price_in_order_goods_table', 1494208902),
('m170508_015958_add_quantity_in_order_goods_table', 1494208904),
('m170510_004418_create_profile_table', 1494377208),
('m170510_004926_add_user_id_in_profile_table', 1494377528),
('m170510_005335_add_image_in_profile_table', 1494377720),
('m170515_224205_create_profile_order_table', 1494889606),
('m170515_224959_add_goods_id_in_profile_order_table', 1494889607),
('m170515_225422_add_profile_id_in_profile_order_table', 1494889608),
('m170516_004933_add_status_in_order_goods_table', 1494895928),
('m170516_011610_alter_insert_status_to_order_goods_table', 1494897566),
('m170516_053235_add_order_id_in_profile_order_table', 1494912870),
('m170517_235223_add_small_description_in_goods_table', 1495065496),
('m170517_235348_add_characteristics_in_goods_table', 1495065497),
('m170518_001708_create_characteristics_table', 1495066842),
('m170518_005516_add_characteristics_in_goods_table', 1495068976),
('m170518_120307_drop_column_characteristics_in_goods_table', 1495109113),
('m170518_121038_create_characteristics_table', 1495110211),
('m170518_121610_create_values_characteristics_table', 1495110211),
('m170518_123001_add_characteristics_id_in_values_characteristics_table', 1495111621),
('m170518_124554_add_goods_id_in_values_characteristics_table', 1495112953);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `first_name`, `last_name`, `phone`, `address`) VALUES
(47, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(48, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(49, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(50, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(51, 'Сергей', 'Потапов', '09538', 'ул. Победы'),
(52, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(53, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(54, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(55, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(56, 'Test', 'Test', 'Test', 'Test'),
(57, 'Test', 'Test', 'Test', 'Test'),
(58, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(59, 'ds', 'ds', '656456456', 'dsaasd'),
(60, 'ds', 'ds', '656456456', 'dsaasd'),
(61, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(62, 'dsad', 'dads', '45645d', 'dsad'),
(63, 'dsad', 'dads', '45645d', 'dsad'),
(64, 'Сергей', 'Потапов', '09538', 'ул. Победы'),
(65, 'f', 'g', 'g', 'g'),
(66, 'f', 'g', 'g', 'g'),
(67, 'Сергей', 'Потапов', '09538', 'ул. Победы'),
(68, 'Сергей', 'Потапов', '09538', 'ул. Победы'),
(69, 'ss', 'ss', 'sss', 'sss'),
(70, 'ss', 'ss', 'sss', 'sss'),
(71, 'Sergey', 'Potapov', '0953899000', 'st. Victory'),
(72, 'Сергей', 'Потапов', '09538', 'ул. Победы'),
(73, 'Сергей', 'Потапов', '09538', 'ул. Победы'),
(74, 'Сергей', 'Потапов', '09538', 'ул. Победы');

-- --------------------------------------------------------

--
-- Структура таблицы `order_goods`
--

CREATE TABLE IF NOT EXISTS `order_goods` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_goods`
--

INSERT INTO `order_goods` (`id`, `goods_id`, `order_id`, `name`, `price`, `quantity`, `status`) VALUES
(50, 1, 47, 'Asus', 250.5, 1, 'Обрабатывается'),
(51, 2, 47, 'Lenovo', 300.75, 1, 'Доставлен'),
(52, 3, 47, 'Nord', 100, 1, 'Обработан'),
(53, 2, 48, 'Lenovo', 300.75, 1, 'Обрабатывается'),
(54, 1, 49, 'Asus', 250.5, 1, 'Обработан'),
(55, 1, 50, 'Asus', 250.5, 1, 'Доставлен'),
(56, 1, 51, 'Asus', 250.5, 1, 'Доставлен'),
(57, 2, 51, 'Lenovo', 300.75, 1, 'Не обработан'),
(58, 3, 51, 'Nord', 100, 1, 'Доставлен'),
(59, 2, 52, 'Lenovo', 300.75, 1, 'Доставлен'),
(60, 1, 53, 'Asus', 250.5, 5, 'Доставлен'),
(61, 1, 54, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 'Обработан'),
(62, 1, 55, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 'Обработан'),
(63, 2, 55, 'Lenovo', 300.75, 1, 'Обработан'),
(64, 1, 57, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 8, 'Обрабатывается'),
(65, 1, 58, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 19, 'Обработан'),
(66, 1, 60, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 7, 'Обрабатывается'),
(67, 1, 61, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 'Не обработан'),
(68, 2, 61, 'Lenovo A Plus (A1010a20) White', 300.75, 1, 'Обрабатывается'),
(69, 1, 63, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 3, 'Не обработан'),
(70, 3, 64, 'Nord', 100, 1, 'Не обработан'),
(71, 1, 64, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 4, 'Доставлен'),
(72, 1, 66, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 6, 'Не обработан'),
(73, 1, 67, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 'Доставлен'),
(74, 1, 68, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 4, 'Не обработан'),
(75, 5, 68, 'Test', 1000, 1, 'Доставлен'),
(76, 1, 70, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 9, 'Не обработан'),
(77, 2, 70, 'Lenovo A Plus (A1010a20) White', 300.75, 1, 'Не обработан'),
(78, 1, 71, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 'Не обработан'),
(79, 1, 72, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 'Доставлен'),
(80, 1, 73, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 8, 'Доставлен'),
(81, 1, 74, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 'Не обработан'),
(82, 2, 74, 'Lenovo A Plus (A1010a20) White', 300.75, 1, 'Не обработан'),
(83, 3, 74, 'Nord', 100, 1, 'Не обработан');

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `first_name`, `last_name`, `phone`, `address`, `user_id`, `image`) VALUES
(1, 'Сергей', 'Потапов', '09538', 'ул. Победы', 3, ''),
(2, 'Sergey', 'Potapov', '0953899000', 'st. Victory', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `profile_order`
--

CREATE TABLE IF NOT EXISTS `profile_order` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile_order`
--

INSERT INTO `profile_order` (`id`, `name`, `price`, `quantity`, `goods_id`, `profile_id`, `status`, `order_id`) VALUES
(1, 'Asus', 250.5, 1, 1, 1, 'Обрабатывается', 50),
(2, 'Lenovo', 300.75, 1, 2, 1, 'Доставлен', 51),
(3, 'Nord', 100, 1, 3, 1, 'Обработан', 52),
(4, 'Lenovo', 300.75, 1, 2, 1, 'Обрабатывается', 53),
(5, 'Asus', 250.5, 1, 1, 1, 'Обработан', 54),
(6, 'Asus', 250.5, 1, 1, 1, 'Доставлен', 55),
(7, 'Asus', 250.5, 1, 1, 3, 'Доставлен', 56),
(8, 'Lenovo', 300.75, 1, 2, 3, 'Не обработан', 57),
(9, 'Nord', 100, 1, 3, 3, 'Доставлен', 58),
(10, 'Lenovo', 300.75, 1, 2, 1, 'Доставлен', 59),
(11, 'Asus', 250.5, 5, 1, 1, 'Доставлен', 60),
(12, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 1, 1, 'Обработан', 61),
(13, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 1, 1, 'Обработан', 62),
(14, 'Lenovo', 300.75, 1, 2, 1, 'Обработан', 63),
(15, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 8, 1, NULL, 'Обрабатывается', 64),
(16, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 19, 1, 1, 'Обработан', 65),
(17, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 7, 1, NULL, 'Обрабатывается', 66),
(18, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 1, 1, 'Не обработан', 67),
(19, 'Lenovo A Plus (A1010a20) White', 300.75, 1, 2, 1, 'Обрабатывается', 68),
(20, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 3, 1, NULL, 'Не обработан', 69),
(21, 'Nord', 100, 1, 3, 3, 'Не обработан', 70),
(22, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 4, 1, 3, 'Доставлен', 71),
(23, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 6, 1, NULL, 'Не обработан', 72),
(24, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 1, 3, 'Доставлен', 73),
(25, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 4, 1, 3, 'Не обработан', 74),
(26, 'Test', 1000, 1, 5, 3, 'Доставлен', 75),
(27, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 9, 1, NULL, 'Не обработан', 76),
(28, 'Lenovo A Plus (A1010a20) White', 300.75, 1, 2, NULL, 'Не обработан', 77),
(29, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 1, 1, 'Не обработан', 78),
(30, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 1, 3, 'Доставлен', 79),
(31, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 8, 1, 3, 'Доставлен', 80),
(32, 'Asus VivoBook Max X541SA (X541SA-XO041D) Black', 250.5, 1, 1, 3, 'Не обработан', 81),
(33, 'Lenovo A Plus (A1010a20) White', 300.75, 1, 2, 3, 'Не обработан', 82),
(34, 'Nord', 100, 1, 3, 3, 'Не обработан', 83);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `status`, `auth_key`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$13$LPNdKesr5QmQ5tfmHQZkKerijycxAU9SxGQX0Cgc3J7Hj9/4o.DRe', 10, 'CiYoPgP6KT8CUaqrk5It0I0fE_dqF38f', 1492032507, 1492032507),
(2, 'user', 'user@user.com', '$2y$13$DmSndTO115rDY5Dh97VfuuoEKqEw1Nez7gRhOx4Gr.Zzfg8bBi7GS', 10, 'EC-YXqujTmAUsgHQak2tC8sv-3CGgFMW', 1494336471, 1494336471),
(3, 'test', 'test@test.test', '$2y$13$DfMwR0ORhqHbaJGyeVmDJ.sVEhgcyULlL4ehcbOPYz9YdS9oQhbgm', 10, 'EA9eQ1CFiX0bCGNLEMkOa_M16cYj48Tn', 1494338203, 1494338203),
(7, 'new', 'new@new.new', '$2y$13$eeW6hfguULLT7UH.fdorIeTbr1B4pSKgem1dPYfh95nhrJNS.YzxC', 10, 'xMTXD0f-DyGu0yLIWv7Kitj-O2vFOoKp', 1494902328, 1494902328),
(8, 'test_user', 'test@dsad.loc', '$2y$13$iaYUKKMlCahp3E0JMBewsOWrV2vJNxZSyCcH5UkbplFyIyXE6Rw0y', 10, 'KP5RWTenLTs-x3M4E4_PpohnptRNtnsd', 1495989787, 1495989787);

-- --------------------------------------------------------

--
-- Структура таблицы `values_characteristics`
--

CREATE TABLE IF NOT EXISTS `values_characteristics` (
  `id` int(11) NOT NULL,
  `values` varchar(512) NOT NULL,
  `characteristics_id` int(11) DEFAULT NULL,
  `goods_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `values_characteristics`
--

INSERT INTO `values_characteristics` (`id`, `values`, `characteristics_id`, `goods_id`) VALUES
(1, 'test', 1, 5),
(2, '15.6" (1366x768) WXGA HD', 2, 5),
(3, 'Двухъядерный Intel Celeron N3060 (1.6 - 2.48 ГГц)', 1, 1),
(4, '15.6" (1366x768) WXGA HD', 2, 1),
(5, '4 ГБ', 3, 1),
(6, 'DOS', 4, 1),
(7, '500 ГБ', 5, 1),
(8, 'DOS', 4, 5),
(9, 'dsa', 5, 5),
(10, 'DVD Super Multi', 6, 1),
(11, 'Черный', 7, 1),
(12, '2 кг', 8, 1),
(13, 'Без подсветки', 9, 1),
(14, '1', 10, 1),
(15, 'Несъемная', 11, 1),
(16, 'DDR3-1600 МГц', 12, 1),
(17, 'Интегрированный, Intel HD Graphics 400', 13, 1),
(18, 'Wi-Fi 802.11 b/g/n Bluetooth 4.0 Fast Ethernet ', 14, 1),
(19, '1 х USB 2.0 / 1 х USB 3.0 / 1 х USB 3.1 Type-C / VGA / HDMI / LAN (RJ-45) / комбинированный аудио разъем для наушников/микрофона / кардридер ', 15, 1),
(20, '3-х ячеечная, 36 Вт*ч', 16, 1),
(21, '381.4 x 251.5 x 27.6 мм', 17, 1),
(22, '12 месяцев', 18, 1),
(23, '4.5', 2, 2),
(24, '854x480', 19, 2),
(25, 'TN', 20, 2),
(26, '2', 21, 2),
(27, 'Оргстекло', 22, 2),
(28, '2', 23, 2),
(29, '1', 3, 2),
(30, '8 ГБ', 24, 2),
(31, '111', 9, 3),
(32, '111', 11, 3),
(33, 'красный', 7, 5),
(34, 'тест', 25, 5),
(35, '45645', 25, 5),
(36, '12', 18, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goods_category` (`category_id`),
  ADD KEY `goods_manu` (`manufactory_id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manufactory`
--
ALTER TABLE `manufactory`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_goods`
--
ALTER TABLE `order_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_goods_order` (`goods_id`),
  ADD KEY `order_goods_order_tab` (`order_id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user` (`user_id`);

--
-- Индексы таблицы `profile_order`
--
ALTER TABLE `profile_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_profile` (`goods_id`),
  ADD KEY `order_profile_profile` (`profile_id`),
  ADD KEY `order_profile_order` (`order_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `values_characteristics`
--
ALTER TABLE `values_characteristics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `val_characteristics_goods` (`characteristics_id`),
  ADD KEY `val_characteristics_goodss` (`goods_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `manufactory`
--
ALTER TABLE `manufactory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT для таблицы `order_goods`
--
ALTER TABLE `order_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `profile_order`
--
ALTER TABLE `profile_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `values_characteristics`
--
ALTER TABLE `values_characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goods_manu` FOREIGN KEY (`manufactory_id`) REFERENCES `manufactory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_goods`
--
ALTER TABLE `order_goods`
  ADD CONSTRAINT `order_goods_order` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_goods_order_tab` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile_order`
--
ALTER TABLE `profile_order`
  ADD CONSTRAINT `order_profile` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`),
  ADD CONSTRAINT `order_profile_order` FOREIGN KEY (`order_id`) REFERENCES `order_goods` (`id`),
  ADD CONSTRAINT `order_profile_profile` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `values_characteristics`
--
ALTER TABLE `values_characteristics`
  ADD CONSTRAINT `val_characteristics` FOREIGN KEY (`characteristics_id`) REFERENCES `characteristics` (`id`),
  ADD CONSTRAINT `val_characteristics_goodss` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
