CREATE TABLE `vehicules` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`immat` VARCHAR(255) NOT NULL,
	`brand` VARCHAR(255) NOT NULL,
	`model` VARCHAR(255) NOT NULL,
	`nb_places` INT NOT NULL,
	`km` FLOAT NOT NULL,
	`description` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `reservations` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_vehicule` INT NOT NULL,
	`id_person` INT NOT NULL,
	`id_person_resa` INT NOT NULL,
	`half_date_start` INT NOT NULL,
	`date_start_real` DATETIME,
	`half_date_end` INT NOT NULL,
	`date_end_real` DATETIME,
	`km_end` FLOAT,
	`description_issue` TEXT,
	`nb_week` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `persons` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`firstname` VARCHAR(255) NOT NULL,
	`lastname` VARCHAR(255) NOT NULL,
	`user` VARCHAR(255) NOT NULL UNIQUE,
	`tel` VARCHAR(255) NOT NULL,
	`mail` VARCHAR(255) NOT NULL UNIQUE,
	`password` VARCHAR(255) NOT NULL,
	`token` VARCHAR(16),
	`token_expire` DATETIME,
	PRIMARY KEY (`id`)
);

CREATE TABLE `unavaiables` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_vehicule` INT NOT NULL,
	`date_start` DATETIME NOT NULL,
	`date_end` DATETIME,
	`nb_half_day` INT NOT NULL,
	`description` TEXT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `days` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`half_day` VARCHAR(255) NOT NULL UNIQUE,
	PRIMARY KEY (`id`)
);

CREATE TABLE `vehicules_days` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_day` INT NOT NULL,
	`id_vehicule` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `issues` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_vehicule` INT NOT NULL,
	`id_reservation` INT NOT NULL,
	`issue` TEXT NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `reservations` ADD CONSTRAINT `reservations_fk0` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules`(`id`);

ALTER TABLE `reservations` ADD CONSTRAINT `reservations_fk1` FOREIGN KEY (`id_person`) REFERENCES `persons`(`id`);

ALTER TABLE `reservations` ADD CONSTRAINT `reservations_fk2` FOREIGN KEY (`id_person_resa`) REFERENCES `persons`(`id`);

ALTER TABLE `reservations` ADD CONSTRAINT `reservations_fk3` FOREIGN KEY (`half_date_start`) REFERENCES `days`(`id`);

ALTER TABLE `reservations` ADD CONSTRAINT `reservations_fk4` FOREIGN KEY (`half_date_end`) REFERENCES `days`(`id`);

ALTER TABLE `unavaiables` ADD CONSTRAINT `unavaiables_fk0` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules`(`id`);

ALTER TABLE `vehicules_days` ADD CONSTRAINT `vehicules_days_fk0` FOREIGN KEY (`id_day`) REFERENCES `days`(`id`);

ALTER TABLE `vehicules_days` ADD CONSTRAINT `vehicules_days_fk1` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules`(`id`);

ALTER TABLE `issues` ADD CONSTRAINT `issues_fk0` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicules`(`id`);

ALTER TABLE `issues` ADD CONSTRAINT `issues_fk1` FOREIGN KEY (`id_reservation`) REFERENCES `reservations`(`id`);
