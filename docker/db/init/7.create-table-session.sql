CREATE TABLE `sessions` (
  `session_id`   VARCHAR(255) NOT NULL,
  `session_data` TEXT,
  `created`      DATETIME,
  `updated`      DATETIME,
  CONSTRAINT PRIMARY KEY (session_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_bin;