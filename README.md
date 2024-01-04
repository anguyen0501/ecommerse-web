# e-commerce-learning-web


CREATE TABLE IF NOT EXISTS `hanghoa` (
  `mahh` varchar(50) NOT NULL,
  `tenhh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dvt` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dongia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `hanghoa` CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
