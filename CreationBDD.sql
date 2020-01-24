CREATE TABLE `classes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `hp` int,
  `degats` int,
  `defense` int,
  `esquive` int,
  `histoire` longtext,
  `created_at` timestamp
);

CREATE TABLE `classe_personnage` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `classe_id` int,
  `personnage_id` int
);

CREATE TABLE `equipements` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `personnage_id` int
);

CREATE TABLE `inventaires` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_slot` id,
  `nombre_item` id
);

CREATE TABLE `inventaire_items` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `item_id` int,
  `inventaire_id` int
);

CREATE TABLE `inventaire_personnage` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `inventaire_id` int,
  `personnage_id` int
);

CREATE TABLE `items` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `quantite` int,
  `hp` int,
  `degats` int,
  `defense` int,
  `esquive` int
);

CREATE TABLE `monstres` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `hp` int,
  `degats` int,
  `defense` int,
  `esquive` int
);

CREATE TABLE `personnages` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `pseudo` varchar(255),
  `lvl_perso` int,
  `hp_base` int,
  `hp_current` int,
  `hp_max` int,
  `degats_base` int,
  `degats_current` int,
  `degats_max` int,
  `defense_base` int,
  `defense_current` int,
  `defense_max` int,
  `esquive_base` int,
  `esquive_current` int,
  `esquive_max` int,
  `histoire_completed` int
);

CREATE TABLE `personnage_user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `personnage_id` int
);

CREATE TABLE `roles` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `roles_user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `role_id` int,
  `user_id` int
);

CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `email` email,
  `password` varchar(255)
);

ALTER TABLE `users` ADD FOREIGN KEY (`id`) REFERENCES `personnages` (`id`);

ALTER TABLE `users` ADD FOREIGN KEY (`id`) REFERENCES `roles` (`id`);

ALTER TABLE `personnages` ADD FOREIGN KEY (`id`) REFERENCES `inventaires` (`id`);

ALTER TABLE `classes` ADD FOREIGN KEY (`id`) REFERENCES `personnages` (`id`);

ALTER TABLE `inventaires` ADD FOREIGN KEY (`id`) REFERENCES `items` (`id`);

ALTER TABLE `personnages` ADD FOREIGN KEY (`id`) REFERENCES `classe_personnage` (`personnage_id`);

ALTER TABLE `classes` ADD FOREIGN KEY (`id`) REFERENCES `classe_personnage` (`classe_id`);

ALTER TABLE `items` ADD FOREIGN KEY (`id`) REFERENCES `inventaire_items` (`item_id`);

ALTER TABLE `inventaires` ADD FOREIGN KEY (`id`) REFERENCES `inventaire_items` (`inventaire_id`);

ALTER TABLE `personnages` ADD FOREIGN KEY (`id`) REFERENCES `inventaire_personnage` (`personnage_id`);

ALTER TABLE `inventaires` ADD FOREIGN KEY (`id`) REFERENCES `inventaire_personnage` (`inventaire_id`);

ALTER TABLE `personnages` ADD FOREIGN KEY (`id`) REFERENCES `personnage_user` (`personnage_id`);

ALTER TABLE `users` ADD FOREIGN KEY (`id`) REFERENCES `personnage_user` (`user_id`);

ALTER TABLE `roles` ADD FOREIGN KEY (`id`) REFERENCES `roles_user` (`role_id`);

ALTER TABLE `users` ADD FOREIGN KEY (`id`) REFERENCES `roles_user` (`user_id`);

ALTER TABLE `personnages` ADD FOREIGN KEY (`id`) REFERENCES `equipements` (`id`);
