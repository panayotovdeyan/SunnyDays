SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `daymonitoring` (
  `reportId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `Date` datetime(6) NOT NULL,
  `time_production` varchar(11) DEFAULT NULL,
  `TTLproduction` varchar(11) DEFAULT NULL,
  `time_consumption` varchar(100) DEFAULT NULL,
  `TTLconsumption` varchar(11) DEFAULT NULL,
  `UoM_online` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `daymonitoring` (`reportId`, `userId`, `Date`, `time_production`, `TTLproduction`, `time_consumption`, `TTLconsumption`, `UoM_online`) VALUES
(1, 7, '2023-04-26 00:05:00.000000', '0', '0', '860', '860', 'W'),
(2, 8, '2023-04-26 00:05:00.000000', '0', '0', '960', '960', 'W'),
(3, 7, '2023-04-26 03:05:00.000000', '0', '0', '1140', '2000', 'W'),
(4, 8, '2023-04-26 03:05:00.000000', '0', '0', '1240', '2200', 'W'),
(5, 7, '2023-04-26 06:05:00.000000', '400', '400', '3500', '5500', 'W'),
(6, 8, '2023-04-26 06:05:00.000000', '500', '500', '3600', '5800', 'W'),
(7, 7, '2023-04-26 09:05:00.000000', '2000', '2400', '4500', '10000', 'W'),
(8, 8, '2023-04-26 09:05:00.000000', '2100', '2600', '4600', '10400', 'W'),
(9, 7, '2023-04-26 12:05:00.000000', '4000', '6400', '4600', '14600', 'W'),
(10, 8, '2023-04-26 12:05:00.000000', '4100', '6700', '4700', '15100', 'W');

CREATE TABLE `gallery` (
  `imageId` int(11) NOT NULL,
  `image` blob NOT NULL COMMENT 'Снимки, които ще се използват за страниците с услуги и проекти'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `newsletter` (
  `newsId` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `newsletter` (`newsId`, `email`) VALUES
(1, 'test1@mail.com'),
(2, 'test2@mail.com'),
(6, ''),
(7, 'te@st.bg'),
(8, 't*R@re.com'),
(9, 'test@gmail.com'),
(10, 'test@gmail.com'),
(11, 'test1@mail.bg'),
(12, 'test1@mail.bg'),
(13, 'test1@mail.bg'),
(14, 'stoyan_der@abv.bg'),
(15, 'plam_ivanov@email.com'),
(16, 'plam_ivanov@email.com'),
(17, 'kalopetrov@mail.com'),
(18, 'lkdf@lkfa.com'),
(19, 'krasimir@mail.com');

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `published` tinyint(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `offer` (`id`, `title`, `subtitle`, `text`, `image`, `published`) VALUES
(1, 'ПОПИТАЙ ЗА ОФЕРТА', 'Стани независим от електроразпределителните дружества', 'Попълнете формата и до 2 работни дни нашият екип ще се свърже с Вас, и ще обсъдим най-доброто решение за изграждане на вашата система.', '/assets/img/services/services-background.gif', 1);

CREATE TABLE `pageabout` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `published` tinyint(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pageabout` (`id`, `userId`, `title`, `subtitle`, `text`, `image`, `published`) VALUES
(1, 1, 'Мислим глобално, действаме локалнo', 'За един по-добър живот, заслужава си!', 'Имайки предвид колко е актуална темата за глобалното затопляне и общото замърсяване на околната среда малко хора биха били безразлични. Като добавим поскъпването на електроенергията и горивата към това, нямаме оправдание да не предприемем действие. Каквито и да са Вашите мотиви, ние сме тук, за да Ви съдействаме!', '/assets/img/about/about1.mp4', 0),
(2, 4, 'Ние предоставяме:', 'Широка гама продукти за соларни системи', 'Търсите висококачествени соларни системи и компоненти за захранване на вашия дом или бизнес. Разгледайте нашата изчерпателна селекция от фотоволтаични слънчеви системи извън мрежата и в мрежата! Ние предлагаме всичко необходимо, за да инсталирате и поддържате надеждна, рентабилна слънчева система, от слънчеви панели и инвертори до батерии, крепежни елементи и др. Нашите продукти се доставят от водещи производители в бранша, което гарантира, че получавате добро качество и производителност. Независимо дали искате да намалите въглеродния си отпечатък, да спестите пари от сметки за енергия или да се насладите на надеждно захранване в отдалечени местоположения, ние имаме решенията, от които се нуждаете. Опознайте нашата селекция днес и открийте предимствата на слънчевата енергия!', '/assets/img/about/about2.jpg', 1),
(3, 2, 'Качествено обслужване на достъпни цени', 'Нашите висококвалифицирани услуги можете да видите тук', '', '/assets/img/about/about3.jpeg', 1),
(4, 4, 'Тема 4', 'Подзаглавие на тема 4', 'Текст на тема 4', '/assets/img/about/about4.jpg', 0);

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `image` text DEFAULT NULL COMMENT 'от таблица gallery',
  `published` tinyint(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `projects` (`id`, `title`, `subtitle`, `text`, `image`, `published`) VALUES
(1, 'Самостоятелна соларна система върху покрив на къща', 'Система на обект без централно захранване, която се използва за осветление, климатизация, телевизор и други малки консуматори.', 'Монтирана е на индустриален обект без централно захранване и се използва за осветление, климатизация, телевизор и други малки консуматори.rnrnСистемата е изпълнена със соларни панели Sharp 270Wp, MPPT контролер, гелови необслужваеми акумулатори и инвертор с висока степен на защита.rnrnКъм системата има устройство за наблюдение на състоянието на заряд и разряд на акумулаторите, както и мониторинг на инверторa по интернет.', '/assets/img/projects/project1(1).jpg', 1),
(2, 'Самостоятелна соларна система върху покрив на блок', 'Система на обект без централно захранване, която се използва за осветление, климатизация, телевизор и други малки консуматори.', 'Соларните панели са монтирани на конструкция с противотежести. Това позволява бързо преместване на конструкцията (при необходимост) и бърз монтаж, без необходимост от допълнителна техника.\r\n\r\nСистемата е оборудвана с инвертор и литиеви батерии.', '/assets/img/projects/project2(1).jpg', 1);

CREATE TABLE `reporting` (
  `reportId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `month_production` varchar(100) DEFAULT NULL,
  `UoMMP` varchar(11) DEFAULT NULL,
  `TTLproduction` varchar(11) DEFAULT NULL,
  `UoMTP` varchar(11) DEFAULT NULL,
  `month_consumption` varchar(100) DEFAULT NULL,
  `UoMMC` varchar(11) DEFAULT NULL,
  `TTLconsumption` varchar(11) DEFAULT NULL,
  `UoMTC` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `reporting` (`reportId`, `userId`, `Date`, `month_production`, `UoMMP`, `TTLproduction`, `UoMTP`, `month_consumption`, `UoMMC`, `TTLconsumption`, `UoMTC`) VALUES
(1, 8, '2022-11-01 01:05:00', '780', 'KWh', '5.6', 'MWh', '1.2', 'MWh', '8.4', 'MWh'),
(2, 7, '2022-11-01 01:10:01', '670', 'KWh', '4.6', 'MWh', '1.2', 'MWh', '7.4', 'MWh'),
(3, 8, '2022-12-01 01:05:00', '810', 'KWh', '6.2', 'MWh', '980', 'KWh', '9.7', 'MWh'),
(4, 7, '2022-12-01 01:10:01', '610', 'KWh', '5.2', 'MWh', '970', 'KWh', '9.7', 'MWh'),
(5, 8, '2023-01-01 01:05:00', '805', 'KWh', '7.4', 'MWh', '1.4', 'MWh', '10.4', 'MWh'),
(6, 7, '2023-01-01 01:10:01', '610', 'KWh', '6.4', 'MWh', '1.4', 'MWh', '10.4', 'MWh'),
(7, 8, '2023-02-01 01:05:00', '750', 'KWh', '8.7', 'MWh', '1.2', 'MWh', '11.8', 'MWh'),
(8, 7, '2023-02-01 01:10:01', '650', 'KWh', '6.7', 'MWh', '1.2', 'MWh', '11.7', 'MWh'),
(9, 8, '2023-03-01 01:05:00', '1.1', 'MWh', '9.8', 'MWh', '1.3', 'MWh', '13.1', 'MWh'),
(10, 7, '2023-03-01 01:10:01', '910', 'KWh', '8.7', 'MWh', '1.3', 'MWh', '13.1', 'MWh'),
(11, 8, '2023-04-01 01:05:00', '1.3', 'MWh', '10.4', 'MWh', '1.6', 'MWh', '15.2', 'MWh'),
(12, 7, '2023-04-01 01:10:01', '930', 'KWh', '9.4', 'MWh', '1.6', 'MWh', '15.2', 'MWh');

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_subname` text DEFAULT NULL,
  `service_description` text DEFAULT NULL,
  `service_image` text DEFAULT NULL COMMENT 'from image gallery',
  `published` tinyint(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `services` (`id`, `service_name`, `service_subname`, `service_description`, `service_image`, `published`) VALUES
(1, 'Изграждане на Фотоволтаични системи!', 'Изчислете колко енергия използва вашият дом', 'Размерите на слънчевата система се измерват в киловати. В зависимост от това къде и в каква посока е обърнат покривът, соларната система Homric 5000W ще генерира между 5 и 15 kWh чиста, възобновяема енергия на ден.rnrnrnЗа да определите грубо колко слънчеви панели ви трябват без професионална оценка, ще трябва да разберете две основни неща: каква е вашата консумация на енергия и колко енергия ще произведат вашите панели. Ние се впускаме в тях по-подробно по-долу, но ето общите стъпки:rnrnИзчислете колко енергия използва вашият домrnОценете вашето покривно пространство и количеството слънчева светлина, което вашият дом получаваrnИзчислете специфичния добив на слънчеви панели във вашия район, за да оцените размера на систематаrn rnРазделете годишното си потребление на електроенергия на годишните пикови слънчеви часове във вашия район, за да намерите необходимия размер на системата в kW. За средностатистически дом в ЕС изчислението би изглеждало по следния начин:rnrn8000 kWh консумирани / 1600 годишни пикови слънчеви часа = 5 kW слънчева енергияrnrnСтандартният комплект Homeric 5000W е оборудван със слънчеви панели с мощност 2340w. Вземайки Париж като пример, годишната продължителност на слънчевото греене на града е 1630h, така че всеки омиров слънчев комплект в тази област може да генерира 2340w*1630h*0,85=3240kwh на година. Съответно, всеки соларен комплект от 5000 W може да спести на вашето семейство около 650 евро сметки за електричество на година.', '/assets/img/services/service1.jpg', 0),
(2, 'Мониторинг', 'Наблюдаване производството и консумацията в реално време', 'Софтуер – WEB базиран сървър за данните и наблюдение в реално време, генериране на периодични доклади, възможност за сигнализиране при констатирано потребление на енергия извън предварително зададени граници, дистанционен достъп, безжично предаване на данни, измерване в реално време и събиране на регулярна информация за действителната консумация и/или производство на енергия и данни за микроклимата като температура, влажност и СО2. Данните са напълно защитени (криптирани) и се съхраняват за неограничен период от време в облак. Хардуер – сензори, които четат данни от търговските прибори, трансмитери, които приемат данните от сензорите и Gateway, която позволява предаване и преобразуване на данните в ясен и разбираем графичен и табличен вид.', '/assets/img/profile/online_monitoring.mp4', 0),
(3, 'Поддръжка и ремонт на фотоволтаични системи', 'Сервиз и следгаранционна поддръжка', 'За всички изградени от нас системи ние предлагаме сервиз и следгаранционна поддръжка. Обслужването при нас гарантира бързо разрешване на евентуални проблеми с оборудването.  Европейските и американските елементи, които предлагаме, са (предимно) с 5 годишна гаранция.\\r\\n\\r\\nЧаст от услугите, които предлагаме, включват:\\r\\n\\r\\n\\r\\n    планирани посещения на обекти;\\r\\n    непланирани посещения на соларни системи при повреди или по желание на клиента;\\r\\n    подмяна на инвертор и/или ремонт (ако такъв е възможен);\\r\\n    инспекция на основните компоненти в дадена система;\\r\\n    диагностика на единични фотоволтаици и търсене на повредени такива;\\r\\n    софтуерно наблюдение производителността на соларни панели и откриване на повреди (ако тази опция е налична);\\r\\n    наблюдение с термовизионна камера на електрическите връзки и обединителните кутии на фотоволтаични панели;\\r\\n    ежедневно наблюдение по интернет производителността на фотоволтаични системи и реакция при съобщения от инвертор за проблем (ако тази опция е налична).', '/assets/img/services/service3.webp', 0),
(4, 'Service 4', NULL, '', '0', 0);

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `memberName` varchar(255) DEFAULT NULL,
  `memberPosition` text DEFAULT NULL,
  `memberDescription` text DEFAULT NULL,
  `memberImage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `team` (`id`, `memberName`, `memberPosition`, `memberDescription`, `memberImage`) VALUES
(1, 'Константин Градинаров', 'Ръководител отдел Продажби', 'Описание на дейността', '/assets/img/team/team-1.png'),
(2, 'Мениджър2', 'Отдел: Проектиране', 'Описание на дейността', '/assets/img/team/team-2.png'),
(3, 'Мениджър3', 'Отдел: Маркетинг и бизнес стратегии', 'Описание на дейността', '/assets/img/team/team-3.png'),
(4, 'Мениджър4', 'Отдел: Изграждане и монтаж', 'Описание на дейността', '/assets/img/team/team-4.png'),
(5, 'Служетел1', 'Отдел: Изграждане и монтаж', 'Описание на дейността', '/assets/img/team/team-5.png'),
(6, 'Служетел2', 'Отдел: Изграждане и монтаж', 'Описание на дейността', '/assets/img/team/team-6.png');

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `family` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `avatar` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`userId`, `admin`, `name`, `family`, `email`, `password`, `city`, `avatar`) VALUES
(1, 1, 'Iva', 'Ivanova', 'iivanova@mail.com', '$2y$10$U7ILazro9twjlAE3uIoQZeF4rrUBcxpEhVun6IRxrd/uSguaRyE5K', '', ''),
(2, 0, 'Georgi', 'Georgiev', 'ggeorgiev@mail.com', '*E0985F4E42797CE9D7F83070287B968D0127834C', '', ''),
(3, 0, 'Daniel', 'Dalev', 'dan@asd.rr', '$2y$10$vwkyToB8vDR/AO0UHqezcOizlayU1fIQfkyU6uIXuuAljwxvsQ7WO', '', ''),
(4, 1, 'Deyan', 'Panayotov', 'dpanayotov@mail.com', '$2y$10$eGHap281NVJQOGgYOAL0I.cGvezPCw//e4BP40KyiSmOR3RFi5cW6', '', ''),
(5, 0, 'deyan', 'deyanov', 'dd@mail.com', '$2y$10$V55OWwd/oUSHvu4CtutFDetAtvBL2RnpJnvAVfH937ZgSbGI7fv86', '', ''),
(7, 0, 'krasen', 'dimitrov', 'krasi@mail.com', '$2y$10$7uxVGSM4fMBlCgK0wOhDauK69IQ9CspoJ2X5NzqLGZtv6VV.giMlm', '', ''),
(8, 0, 'Петър', 'Горанов', 'PGoranov@mail.bg', '$2y$10$pPIIfyuBIJAPGWfE3RhiHedDSROtqeQGc2FJU7OI22QhiEdh7e7n2', '', ''),
(9, 1, 'Admin', 'Admin', 'admin@mail.com', '$2y$10$y67BZoCQLst/O7mCSkLGCunoZMMIZ6amBEOxL7r73uI7DezltivTC', '', ''),
(10, 0, 'Калоян', 'Петров', 'kalopetrov@mail.com', '$2y$10$8u/iGRr8bDzJd6wuukb7AOGpfePDuvdBscIwi7Me6lCjpJLwa8dv6', NULL, NULL),
(22, 0, 'Пламен', 'Иванов', 'plam_ivanov@email.com', '$2y$10$oZlsoUAUP9TcGn47bWIuPeu1MmkFjukdqBRRHQCr.WDYh63dI9CF6', NULL, NULL),
(23, 0, 'Стоян', 'Дерменджиев', 'stoyan_der@abv.bg', '$2y$10$pCzIF3G.QFjKULEROqD4gubpsiXssVbo2y5b2Ea/yExqkkbALJQoa', NULL, NULL);


ALTER TABLE `daymonitoring`
  ADD PRIMARY KEY (`reportId`);

ALTER TABLE `gallery`
  ADD PRIMARY KEY (`imageId`);

ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsId`);

ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `pageabout`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `projects`
  ADD UNIQUE KEY `projectId` (`id`);

ALTER TABLE `reporting`
  ADD PRIMARY KEY (`reportId`);

ALTER TABLE `services`
  ADD UNIQUE KEY `serviceId` (`id`);

ALTER TABLE `team`
  ADD UNIQUE KEY `memberId` (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `daymonitoring`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `gallery`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `newsletter`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `pageabout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `reporting`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
