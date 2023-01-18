CREATE TABLE `Vehicules` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`immat` VARCHAR(255) NOT NULL,
	`brand` VARCHAR(255) NOT NULL,
	`model` VARCHAR(255) NOT NULL,
	`nb_places` INT NOT NULL,
	`km` FLOAT NOT NULL,
	`description` VARCHAR(255) NOT NULL,
	`state` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Reservations` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_vehicule` INT NOT NULL,
	`id_person` INT NOT NULL,
	`date_start` DATETIME NOT NULL,
	`date_start_real` DATETIME,
	`date_end` DATETIME,
	`date_end_real` DATETIME,
	`km_start` FLOAT NOT NULL,
	`km_end` FLOAT,
	`issue` BOOLEAN NOT NULL,
	`description_issue` TEXT,
	`nb_week` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `States` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`label` VARCHAR(255) NOT NULL UNIQUE,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Persons` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`firstname` VARCHAR(255) NOT NULL,
	`lastname` VARCHAR(255) NOT NULL,
	`user` VARCHAR(255) NOT NULL UNIQUE,
	`mail` VARCHAR(255) NOT NULL UNIQUE,
	`password` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `Unavaiables` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`id_vehicule` INT NOT NULL,
	`date_start` DATETIME NOT NULL,
	`date_end` DATETIME,
	`nb_half_day` INT NOT NULL,
	`description` TEXT NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `Vehicules` ADD CONSTRAINT `Vehicules_fk0` FOREIGN KEY (`state`) REFERENCES `States`(`id`);

ALTER TABLE `Reservations` ADD CONSTRAINT `Reservations_fk0` FOREIGN KEY (`id_vehicule`) REFERENCES `Vehicules`(`id`);

ALTER TABLE `Reservations` ADD CONSTRAINT `Reservations_fk1` FOREIGN KEY (`id_person`) REFERENCES `Persons`(`id`);

ALTER TABLE `Unavaiables` ADD CONSTRAINT `Unavaiables_fk0` FOREIGN KEY (`id_vehicule`) REFERENCES `Vehicules`(`id`);






