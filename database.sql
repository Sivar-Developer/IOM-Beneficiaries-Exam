/*
 Navicat Premium Data Transfer

 Source Server         : Homestead
 Source Server Type    : MySQL
 Source Server Version : 50728
 Source Host           : 127.0.0.1:3306
 Source Schema         : demo

 Target Server Type    : MySQL
 Target Server Version : 50728
 File Encoding         : 65001

 Date: 05/10/2020 19:06:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for approvals
-- ----------------------------
DROP TABLE IF EXISTS `approvals`;
CREATE TABLE `approvals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `beneficiary_id` bigint(20) unsigned NOT NULL,
  `is_approved` tinyint(1) NOT NULL,
  `justification` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `approvals_beneficiary_id_foreign` (`beneficiary_id`),
  CONSTRAINT `approvals_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of approvals
-- ----------------------------
BEGIN;
INSERT INTO `approvals` VALUES (1, 3, 1, '', '2020-10-05 12:40:44', '2020-10-05 12:47:46');
INSERT INTO `approvals` VALUES (2, 5, 0, 'this is not capable.', '2020-10-05 12:48:31', '2020-10-05 12:48:31');
INSERT INTO `approvals` VALUES (3, 2, 0, 'what ever', '2020-10-05 12:55:27', '2020-10-05 12:55:27');
COMMIT;

-- ----------------------------
-- Table structure for beneficiaries
-- ----------------------------
DROP TABLE IF EXISTS `beneficiaries`;
CREATE TABLE `beneficiaries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id_number` bigint(20) DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `martial_status` enum('Single','Married','Divorced') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_status` tinyint(1) DEFAULT NULL,
  `monthly_income` decimal(10,2) DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `beneficiaries_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of beneficiaries
-- ----------------------------
BEGIN;
INSERT INTO `beneficiaries` VALUES (1, 'Dr. Brigitte Raynor IV', '2008-03-05', 'Female', '(309) 810-9875', 19320237, 'Bessie Hammes V', 'Single', 1, 1624.25, 'https://lorempixel.com/500/500/?94001', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (2, 'Stuart Stracke', '2011-08-07', 'Female', '798-712-2841', 59128293, 'Leanne Romaguera III', 'Single', 0, 862.87, 'https://lorempixel.com/500/500/?68857', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (3, 'Fiona Schinner', '1996-12-26', 'Female', '401-869-8098 x63490', 15185038, 'Elinore Corwin', 'Divorced', 1, 727.38, 'https://lorempixel.com/500/500/?28621', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (4, 'Karelle Bayer', '1949-10-03', 'Female', '671.819.8977 x6919', 18665127, 'Hannah Will', 'Divorced', 0, 1903.70, 'https://lorempixel.com/500/500/?82831', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (5, 'Dr. Jaren Mraz', '1980-12-14', 'Male', '1-856-382-7427 x2159', 59998826, 'Ada Kling', 'Married', 0, 1346.97, 'https://lorempixel.com/500/500/?54944', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (6, 'Linda Larkin', '2016-12-12', 'Female', '(401) 988-2234 x75388', 6388511, 'Erna Jaskolski', 'Single', 0, 1327.05, 'https://lorempixel.com/500/500/?18267', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (7, 'Milan Muller', '1992-02-16', 'Female', '475.843.5822', 34092218, 'Dixie Sauer', 'Single', 0, 1528.46, 'https://lorempixel.com/500/500/?16796', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (8, 'Jon Grant', '1985-08-15', 'Female', '759-568-9295 x377', 56619799, 'Carmella O\'Reilly', 'Divorced', 1, 1924.71, 'https://lorempixel.com/500/500/?42805', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (9, 'Stephen Jerde', '1929-03-29', 'Male', '(953) 930-7846', 72944578, 'Rosina Boyle', 'Married', 1, 1533.99, 'https://lorempixel.com/500/500/?60071', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (10, 'Tillman Hermiston', '1988-06-08', 'Female', '1-847-209-9382', 89707064, 'Mrs. Kathryne Klein MD', 'Single', 1, 1482.28, 'https://lorempixel.com/500/500/?78575', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (11, 'Sally Schiller', '2008-01-30', 'Female', '1-210-913-9940 x257', 20634299, 'Margret Pfeffer', 'Single', 1, 1547.68, 'https://lorempixel.com/500/500/?67771', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (12, 'Mitchell Marvin', '1950-08-11', 'Female', '+15317771004', 78041428, 'Prof. Kamille Zieme DVM', 'Married', 0, 1339.21, 'https://lorempixel.com/500/500/?94145', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (13, 'Ansley Wilderman', '1961-03-18', 'Male', '876.392.7271', 57574270, 'Mrs. Delia Howell', 'Married', 1, 1014.45, 'https://lorempixel.com/500/500/?24022', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (14, 'Finn Wolff', '2016-10-06', 'Female', '1-941-824-0675 x063', 50688778, 'Ozella Rosenbaum II', 'Single', 1, 1659.34, 'https://lorempixel.com/500/500/?55589', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (15, 'Dr. Anastacio Frami V', '1974-08-12', 'Male', '+1 (963) 751-9307', 84729851, 'Jena Baumbach MD', 'Divorced', 1, 1686.74, 'https://lorempixel.com/500/500/?38751', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (16, 'Melvin White', '2001-05-10', 'Female', '+1-359-376-8858', 58176392, 'Bianka Gutkowski', 'Married', 1, 1225.43, 'https://lorempixel.com/500/500/?56277', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (17, 'Ms. Amya Marvin I', '1995-04-23', 'Male', '760-734-9483 x162', 62982608, 'Elenor Crona', 'Divorced', 1, 866.96, 'https://lorempixel.com/500/500/?49831', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (18, 'Prof. Arno Borer', '1975-11-03', 'Female', '1-672-604-1691 x5060', 16394204, 'Ms. Gladyce Windler II', 'Married', 1, 1923.74, 'https://lorempixel.com/500/500/?10679', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (19, 'Miss Velva Kunde IV', '1971-09-04', 'Male', '257.403.7810', 32166816, 'Ms. Winnifred Johnson MD', 'Divorced', 0, 769.23, 'https://lorempixel.com/500/500/?15442', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (20, 'Josie Waelchi', '1970-05-22', 'Female', '1-792-318-3957 x3828', 7990365, 'Krista Hamill', 'Single', 1, 513.94, 'https://lorempixel.com/500/500/?46309', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (21, 'Miss Albertha Bartell', '1966-05-26', 'Female', '256-544-4383 x7958', 1410525, 'Dana Pagac', 'Single', 1, 553.46, 'https://lorempixel.com/500/500/?30206', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (22, 'Ericka Schultz Jr.', '2017-12-19', 'Male', '1-521-435-5523 x71462', 49439197, 'Mrs. Carolyne Stark I', 'Single', 0, 804.75, 'https://lorempixel.com/500/500/?62470', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (23, 'Dr. Immanuel Leannon', '1969-05-04', 'Female', '881.487.7428 x6296', 18667455, 'Meda Leuschke', 'Single', 1, 1819.53, 'https://lorempixel.com/500/500/?75953', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (24, 'Mr. Avery Walter', '1944-05-22', 'Male', '(541) 331-9862', 49071057, 'Adelia Prosacco', 'Single', 0, 1606.90, 'https://lorempixel.com/500/500/?59426', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (25, 'Dr. Lucy Franecki', '2000-12-08', 'Male', '1-714-295-6158 x55477', 43047426, 'Lavonne Jacobs', 'Single', 1, 1492.66, 'https://lorempixel.com/500/500/?51472', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (26, 'Casimir Emard', '1939-01-31', 'Female', '898-509-3712 x131', 21639012, 'Ms. Patsy Daniel II', 'Single', 1, 1815.15, 'https://lorempixel.com/500/500/?14936', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (27, 'Rosella Gulgowski', '1924-08-20', 'Male', '1-714-299-4359 x09619', 73378040, 'Lyda Prohaska', 'Married', 0, 848.41, 'https://lorempixel.com/500/500/?80044', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (28, 'Eldred Cole', '1949-12-06', 'Male', '1-848-682-9048', 25297255, 'Dakota Larson', 'Single', 1, 519.25, 'https://lorempixel.com/500/500/?88200', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (29, 'Dr. Elnora Crooks Sr.', '1926-03-17', 'Male', '284-774-3235', 90785862, 'Giovanna Strosin', 'Single', 1, 964.31, 'https://lorempixel.com/500/500/?22458', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (30, 'Marcus Kuhn Sr.', '1980-07-07', 'Female', '1-246-502-3841 x97297', 15423666, 'Miss Nyasia Balistreri', 'Married', 1, 1756.41, 'https://lorempixel.com/500/500/?66611', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (31, 'Josiah Williamson', '1958-09-15', 'Male', '(462) 923-8828', 92922182, 'Ophelia Beahan', 'Single', 0, 1925.15, 'https://lorempixel.com/500/500/?39290', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (32, 'Dr. Irwin Hackett IV', '2001-06-22', 'Male', '(808) 241-7854 x871', 35672147, 'Claudie Kutch Jr.', 'Divorced', 0, 896.68, 'https://lorempixel.com/500/500/?47922', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (33, 'Luella Rodriguez', '1969-10-19', 'Female', '224.426.6313 x9085', 43335807, 'Marquise Friesen', 'Single', 0, 590.89, 'https://lorempixel.com/500/500/?40010', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (34, 'Vicenta Kunde', '2000-07-08', 'Female', '(778) 638-2301', 28619238, 'Ms. Allene Harris', 'Married', 0, 1954.22, 'https://lorempixel.com/500/500/?99106', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (35, 'Prof. Shanie Reinger I', '1932-11-09', 'Female', '834.560.4242 x97441', 66173413, 'Ashleigh Collier III', 'Single', 1, 842.66, 'https://lorempixel.com/500/500/?66668', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (36, 'Cooper Goyette', '1950-01-07', 'Female', '989-640-5707 x1603', 52152679, 'Kelsie Gutmann', 'Single', 1, 1138.21, 'https://lorempixel.com/500/500/?65628', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (37, 'Dr. Jude Mante', '1926-01-02', 'Female', '(349) 751-8684 x46026', 64669800, 'Anne Jacobi', 'Married', 1, 1427.89, 'https://lorempixel.com/500/500/?74394', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (38, 'Hildegard O\'Hara IV', '1962-05-20', 'Female', '+1-804-786-0741', 92955695, 'Prof. Mallie Dooley', 'Single', 1, 610.71, 'https://lorempixel.com/500/500/?48771', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (39, 'Prof. Carolina Breitenberg DVM', '1981-06-20', 'Female', '203-322-5175 x92814', 63567391, 'Madelyn Johns Sr.', 'Married', 0, 1801.74, 'https://lorempixel.com/500/500/?48784', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (40, 'Jude Stark', '1928-07-06', 'Female', '+1 (965) 407-1868', 46740130, 'Lurline Goyette PhD', 'Single', 0, 1124.32, 'https://lorempixel.com/500/500/?82091', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (41, 'Dr. Emerald Wolf DVM', '2001-06-29', 'Female', '501-703-4561', 52574548, 'Desiree Romaguera', 'Married', 1, 1770.71, 'https://lorempixel.com/500/500/?48309', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (42, 'Ethan Hegmann MD', '1948-08-12', 'Male', '424-798-0809 x2738', 97308583, 'Miss Name Rowe', 'Single', 1, 958.83, 'https://lorempixel.com/500/500/?21053', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (43, 'Prof. Delaney Schuster', '1940-04-07', 'Male', '+1 (262) 585-7284', 33900622, 'Sarina Pollich', 'Divorced', 1, 1239.28, 'https://lorempixel.com/500/500/?13224', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (44, 'Emilie Abernathy', '1961-06-10', 'Female', '791.507.4507', 75336264, 'Mrs. Freda Wiza Jr.', 'Single', 1, 1450.88, 'https://lorempixel.com/500/500/?31350', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (45, 'Rory Stamm', '1983-02-27', 'Male', '716-398-1442 x842', 33844267, 'Ms. Ellie Cassin', 'Married', 0, 746.44, 'https://lorempixel.com/500/500/?34128', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (46, 'Alice Bruen', '1981-12-12', 'Female', '686.508.8265 x9637', 25599238, 'Dr. Orie Krajcik', 'Married', 1, 1165.85, 'https://lorempixel.com/500/500/?21285', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (47, 'Dr. Aron Barrows I', '1970-01-08', 'Male', '+1-441-954-8555', 66994242, 'Ms. Linnie Beahan Sr.', 'Married', 1, 1504.76, 'https://lorempixel.com/500/500/?25542', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (48, 'Thaddeus Leannon', '1945-05-19', 'Female', '786-501-2146 x989', 72582680, 'Dr. Jolie Little III', 'Married', 0, 599.67, 'https://lorempixel.com/500/500/?11210', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (49, 'Julien Gislason', '1989-12-03', 'Female', '+1.979.716.0098', 84298792, 'Miss Ressie Fay', 'Married', 0, 717.75, 'https://lorempixel.com/500/500/?69503', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (50, 'Janelle Schamberger', '1966-06-16', 'Male', '+1-873-353-9016', 28408494, 'Tamara Morar', 'Divorced', 1, 1352.28, 'https://lorempixel.com/500/500/?88609', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (51, 'Coby Johnston', '1992-04-11', 'Male', '(421) 793-3575 x765', 86591236, 'Ashlynn Schmitt', 'Single', 1, 1153.63, 'https://lorempixel.com/500/500/?37189', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (52, 'Jacklyn Schimmel', '1933-10-01', 'Female', '281-213-3589', 59519344, 'Josefina Kris', 'Single', 1, 689.74, 'https://lorempixel.com/500/500/?56976', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (53, 'Drake Hartmann V', '2006-08-09', 'Female', '591-748-6631 x530', 36074887, 'Brooke Hauck', 'Single', 0, 886.72, 'https://lorempixel.com/500/500/?24630', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (54, 'Prof. Christophe Gislason PhD', '2010-12-29', 'Male', '553.850.6911 x700', 94413039, 'Dr. Maryam Hettinger', 'Single', 1, 703.99, 'https://lorempixel.com/500/500/?58364', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (55, 'Darius Stark', '1980-11-03', 'Female', '608.988.6456', 51623231, 'Kali Lynch', 'Divorced', 0, 518.81, 'https://lorempixel.com/500/500/?93588', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (56, 'Prof. Porter Brakus', '1934-12-21', 'Male', '+1.213.521.1712', 45488392, 'Elena Metz PhD', 'Married', 0, 961.92, 'https://lorempixel.com/500/500/?90796', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (57, 'Nichole Deckow II', '1993-10-06', 'Male', '280-265-0491', 76364314, 'Jaclyn Parisian', 'Divorced', 0, 1822.48, 'https://lorempixel.com/500/500/?19695', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (58, 'Kayden Altenwerth', '1984-03-11', 'Female', '304.656.2258 x9966', 11048702, 'Elody Howe PhD', 'Divorced', 1, 1117.69, 'https://lorempixel.com/500/500/?26667', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (59, 'Gwen Mueller', '1934-06-17', 'Male', '994.975.7224', 70141091, 'Ms. Shanon Dooley PhD', 'Married', 1, 619.77, 'https://lorempixel.com/500/500/?86301', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (60, 'Norval Robel', '1940-08-07', 'Male', '838-220-5636', 10564010, 'Dr. Burnice VonRueden', 'Single', 0, 945.80, 'https://lorempixel.com/500/500/?93606', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (61, 'Christy Gusikowski', '1980-12-27', 'Female', '1-575-746-9430 x096', 9044331, 'Prof. Lizeth Abshire I', 'Married', 0, 1578.63, 'https://lorempixel.com/500/500/?77870', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (62, 'Prof. Maddison Schamberger III', '1924-07-01', 'Female', '813.566.0867 x601', 66596468, 'Chelsea Langosh DDS', 'Married', 0, 1658.43, 'https://lorempixel.com/500/500/?55863', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (63, 'Dr. Manley Zieme MD', '1958-12-07', 'Female', '395.488.0943 x17901', 98405098, 'Mariam Hintz', 'Married', 1, 989.46, 'https://lorempixel.com/500/500/?47883', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (64, 'Meagan O\'Kon', '1954-02-07', 'Male', '352.755.2181 x60925', 93466649, 'Eleanore Brekke', 'Married', 1, 1993.87, 'https://lorempixel.com/500/500/?29231', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (65, 'Dr. Kianna Rosenbaum', '1923-03-11', 'Female', '+15102906237', 93889933, 'Kirsten Klocko', 'Single', 1, 1914.57, 'https://lorempixel.com/500/500/?25828', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (66, 'Jovanny Zieme', '1988-08-20', 'Male', '+1.452.648.7630', 17165294, 'Ms. Ettie Wolff DDS', 'Single', 1, 566.82, 'https://lorempixel.com/500/500/?93253', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (67, 'Ashlee Keeling', '1989-06-02', 'Male', '816-892-1651', 38118928, 'Prof. Bethel Bogan', 'Divorced', 1, 1079.32, 'https://lorempixel.com/500/500/?34143', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (68, 'Andreanne Metz', '1977-02-12', 'Male', '1-456-782-8056 x1681', 82720207, 'Kiara Legros MD', 'Married', 1, 1071.14, 'https://lorempixel.com/500/500/?47370', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (69, 'Arnold Stamm', '1932-03-19', 'Male', '(740) 609-1897 x40265', 98960311, 'Kaylah Rogahn', 'Single', 1, 916.37, 'https://lorempixel.com/500/500/?52176', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (70, 'Dorothy Hansen', '1961-07-21', 'Female', '+13982088800', 56308185, 'Lavonne Stoltenberg', 'Married', 0, 1025.32, 'https://lorempixel.com/500/500/?37546', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (71, 'Dr. Scotty Emard', '1990-07-07', 'Female', '+1-230-467-5654', 23097258, 'Ms. Thelma Deckow Sr.', 'Divorced', 0, 957.86, 'https://lorempixel.com/500/500/?11034', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (72, 'Stephania McLaughlin MD', '1944-03-18', 'Male', '547-584-0578', 27719371, 'Dr. Magali Okuneva', 'Single', 1, 1818.49, 'https://lorempixel.com/500/500/?29342', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (73, 'Dr. Americo Grimes PhD', '1994-07-14', 'Female', '345-440-9087 x65918', 74671462, 'Lisa Dare', 'Divorced', 0, 865.02, 'https://lorempixel.com/500/500/?21459', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (74, 'Otha Jenkins', '2018-09-27', 'Male', '(504) 916-8101 x749', 31759756, 'Mrs. Margaret Von', 'Single', 1, 1878.99, 'https://lorempixel.com/500/500/?93785', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (75, 'Manuela Botsford', '1980-11-06', 'Female', '1-939-850-5467', 3046536, 'Ms. Rosina Grady', 'Married', 1, 648.14, 'https://lorempixel.com/500/500/?53239', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (76, 'Felipa Walker', '1924-09-08', 'Female', '370-624-4901', 264361, 'Felicity Ratke', 'Married', 1, 1143.73, 'https://lorempixel.com/500/500/?74299', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (77, 'Alvina Gorczany', '1977-01-03', 'Female', '783-784-5865 x21346', 9373654, 'Emily Dickinson', 'Divorced', 0, 1368.14, 'https://lorempixel.com/500/500/?69299', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (78, 'Ms. Velda Flatley', '2012-10-08', 'Female', '(956) 919-3253 x592', 66344193, 'Everette Bernhard', 'Single', 1, 1877.69, 'https://lorempixel.com/500/500/?52506', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (79, 'Prof. Karianne Wolff', '1930-04-13', 'Female', '619-509-3175', 77571857, 'Hattie Pouros', 'Married', 0, 1630.87, 'https://lorempixel.com/500/500/?71667', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (80, 'Prof. Bell Gutkowski DDS', '2014-01-17', 'Male', '+1-568-812-9087', 67270336, 'Edwina Jones', 'Single', 1, 696.15, 'https://lorempixel.com/500/500/?50633', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (81, 'Mr. Ed Schinner', '1992-10-21', 'Female', '(582) 828-0639 x77609', 41283383, 'Eulalia Yundt', 'Single', 0, 1257.72, 'https://lorempixel.com/500/500/?83252', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (82, 'Jaime Kohler', '1950-12-03', 'Male', '+14387610500', 6720502, 'Amalia Larson', 'Divorced', 1, 1300.32, 'https://lorempixel.com/500/500/?79532', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (83, 'Cassidy Predovic', '1943-08-04', 'Female', '(301) 472-7323', 59993448, 'Maci O\'Reilly III', 'Divorced', 0, 1375.67, 'https://lorempixel.com/500/500/?86146', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (84, 'Cristina Halvorson', '2006-10-15', 'Male', '382.543.1809 x32206', 79323008, 'Velma Klocko', 'Single', 0, 625.66, 'https://lorempixel.com/500/500/?54690', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (85, 'Vivien Bednar', '1955-09-22', 'Female', '813-208-0122 x1718', 24513670, 'Julianne Dare', 'Married', 0, 1177.17, 'https://lorempixel.com/500/500/?81284', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (86, 'Fausto Weber DDS', '2009-03-07', 'Female', '1-819-782-9465 x34244', 74788197, 'Vernie Corwin', 'Single', 1, 1838.82, 'https://lorempixel.com/500/500/?23303', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (87, 'Preston Heathcote', '2018-09-19', 'Female', '(802) 924-9680 x1903', 62719857, 'Pearlie Zboncak', 'Single', 1, 1927.25, 'https://lorempixel.com/500/500/?12208', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (88, 'Anais O\'Hara', '1977-01-04', 'Male', '527-520-5463 x389', 68911511, 'Freeda Paucek', 'Divorced', 1, 918.94, 'https://lorempixel.com/500/500/?14435', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (89, 'Meta Ruecker', '1998-01-26', 'Female', '891.281.1080 x8548', 62903244, 'Madilyn Carter', 'Divorced', 0, 1475.90, 'https://lorempixel.com/500/500/?15708', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (90, 'Beatrice Feest', '1971-04-01', 'Female', '742-386-4270 x095', 91233057, 'Molly Johnston', 'Divorced', 1, 1830.90, 'https://lorempixel.com/500/500/?36478', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (91, 'Mr. Johnny Gorczany MD', '1973-02-10', 'Male', '(308) 500-5649 x397', 54950235, 'Prof. Ernestine Bahringer', 'Married', 1, 1061.23, 'https://lorempixel.com/500/500/?33891', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (92, 'Sadie Beatty', '1970-11-01', 'Female', '1-321-544-9207', 20581151, 'Kyra Denesik', 'Married', 1, 1339.74, 'https://lorempixel.com/500/500/?50063', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (93, 'Clement Krajcik', '1955-03-30', 'Female', '+1-953-320-1476', 22791978, 'Micaela Schulist DVM', 'Single', 0, 1143.39, 'https://lorempixel.com/500/500/?12670', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (94, 'Jayce Johnson', '1934-04-12', 'Female', '363.546.8617 x443', 33684108, 'Prof. Vivian Wilkinson', 'Married', 0, 1890.80, 'https://lorempixel.com/500/500/?79990', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (95, 'Isai Murazik', '1997-06-30', 'Female', '(398) 606-3488 x071', 42885600, 'Vickie Jenkins', 'Single', 0, 730.74, 'https://lorempixel.com/500/500/?58553', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (96, 'Flo Rempel', '1940-04-14', 'Female', '938-790-7548', 26412045, 'Prof. Myah Pfannerstill MD', 'Divorced', 0, 1396.01, 'https://lorempixel.com/500/500/?57797', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (97, 'Dr. Meggie Walker IV', '2015-10-21', 'Female', '+1-296-308-5915', 39674645, 'Ally Stroman', 'Single', 1, 1117.06, 'https://lorempixel.com/500/500/?21483', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (98, 'Orlando Maggio', '1991-06-25', 'Male', '1-627-354-9446 x52543', 23806831, 'Mrs. Jennifer Hayes', 'Married', 0, 1152.55, 'https://lorempixel.com/500/500/?90745', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (99, 'Prof. Anna Gerlach V', '1934-03-01', 'Male', '530-691-7503 x657', 20887287, 'Mrs. Violet Carroll', 'Single', 1, 815.64, 'https://lorempixel.com/500/500/?61672', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
INSERT INTO `beneficiaries` VALUES (100, 'Mrs. Madelynn Ebert', '1968-05-06', 'Female', '+1.637.635.8703', 59788057, 'Delphine Hayes PhD', 'Single', 1, 1986.09, 'https://lorempixel.com/500/500/?62346', '2020-10-05 12:19:59', '2020-10-05 12:19:59');
COMMIT;

-- ----------------------------
-- Table structure for beneficiary_service
-- ----------------------------
DROP TABLE IF EXISTS `beneficiary_service`;
CREATE TABLE `beneficiary_service` (
  `beneficiary_id` bigint(20) unsigned NOT NULL,
  `service_id` bigint(20) unsigned NOT NULL,
  `mark` enum('Ongoing','Cancelled','Delivered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ongoing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `beneficiary_service_beneficiary_id_foreign` (`beneficiary_id`),
  KEY `beneficiary_service_service_id_foreign` (`service_id`),
  CONSTRAINT `beneficiary_service_beneficiary_id_foreign` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiaries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `beneficiary_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of beneficiary_service
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_10_05_071306_create_beneficiaries_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_10_05_105355_create_services_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_10_05_113842_create_approvals_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of services
-- ----------------------------
BEGIN;
INSERT INTO `services` VALUES (1, 'Training Session', '2020-10-05 13:00:28', '2020-10-05 13:00:28');
INSERT INTO `services` VALUES (2, 'Shelter Rehabilitation', '2020-10-05 13:00:28', '2020-10-05 13:00:28');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'Sivar Sarkawt', 'info@sivarsarkawt.com', NULL, '$2y$10$rw40p6IsDt0ILRPy.M1ud.uTNfI0z9Wk/NVEHGqTqoR9XF9KrmnRW', NULL, '2020-10-05 12:20:15', '2020-10-05 12:20:15');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
