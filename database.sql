
CREATE TABLE IF NOT EXISTS `shoppings` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE IF NOT EXISTS `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `email` varchar(255),
  `password` varchar(255)
);

CREATE TABLE IF NOT EXISTS `cines` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `shopping_id` int
);

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `capacity` int,
  `is_three_dimentions` boolean,
  `cine_id` int
);

CREATE TABLE IF NOT EXISTS `specialEquipaments` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `quantity` int,
  `room_id` int
);

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `room_id` int,
  `date_time` datetime,
  `film_id` int
);

CREATE TABLE IF NOT EXISTS `films` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `duration` int,
  `director` varchar(255),
  `age_rating` int,
  `main_actor` varchar(255),
  `is_three_dimentions` boolean,
  `category` varchar(255)
);

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `price` float4,
  `date_time` datetime,
  `is_student` boolean,
  `session_id` int,
  `user_id` int,
  `room_id` int,
  `is_three_dimentions` boolean, 
  `deleted_at` datetime
);


ALTER TABLE `cines` ADD FOREIGN KEY (`shopping_id`) REFERENCES `shoppings` (`id`);

ALTER TABLE `rooms` ADD FOREIGN KEY (`cine_id`) REFERENCES `cines` (`id`);

ALTER TABLE `specialEquipaments` ADD FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

ALTER TABLE `sessions` ADD FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

ALTER TABLE `sessions` ADD FOREIGN KEY (`film_id`) REFERENCES `films` (`id`);

ALTER TABLE `tickets` ADD FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`);

ALTER TABLE `tickets` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);


-- Resetando id das tabelas
ALTER TABLE `users` AUTO_INCREMENT = 1;
ALTER TABLE `cines` AUTO_INCREMENT = 1;
ALTER TABLE `rooms` AUTO_INCREMENT = 1;
ALTER TABLE `sessions` AUTO_INCREMENT = 1;
ALTER TABLE `shoppings` AUTO_INCREMENT = 1;
ALTER TABLE `specialEquipaments` AUTO_INCREMENT = 1;