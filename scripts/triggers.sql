DELIMITER $$
CREATE TRIGGER `Chiffrement SHA` BEFORE INSERT ON `persons`
 FOR EACH ROW BEGIN
	if LENGTH(NEW.password) >= 8 THEN
    	SET NEW.password = SHA1(NEW.password);
    ELSE
    	SIGNAL SQLSTATE '45001' SET MESSAGE_TEXT = 'Length password < 8';
    END IF;
END$$

CREATE TRIGGER `Update Km Vehicule` AFTER UPDATE ON `reservations`
 FOR EACH ROW BEGIN
    IF NEW.cancel = 0 THEN
        IF NEW.date_end_real IS NOT NULL and NEW.km_end IS NOT NULL = 0 THEN
            UPDATE vehicules
                SET vehicules.km = NEW.km_end
                WHERE vehicules.id = OLD.id_vehicule;
        #ELSE 
            #SIGNAL SQLSTATE '45002' SET MESSAGE_TEXT = 'Date de fin manquante';
        END IF;
	END IF;
END$$

CREATE TRIGGER `Change State Insert resa.cancel` BEFORE INSERT ON `unavailables`
 FOR EACH ROW BEGIN
IF NEW.date_end IS NOT NULL THEN
    UPDATE reservations
        SET reservations.cancel = 1, reservations.date_cancel = now()
        WHERE reservations.id_vehicule = NEW.id_vehicule && ((reservations.date_start BETWEEN NEW.date_start and NEW.date_end) OR (reservations.date_end BETWEEN NEW.date_start and NEW.date_end));
ELSEIF NEW.date_end IS NULL THEN
	SET NEW.undetermined = 1;
	UPDATE reservations
    	SET reservations.cancel = 1, reservations.date_cancel = now()
        WHERE reservations.id_vehicule = NEW.id_vehicule && ((NEW.date_start BETWEEN reservations.date_start and reservations.date_end) OR (NEW.date_start <= reservations.date_start));
ELSE
	SIGNAL SQLSTATE '45003' SET MESSAGE_TEXT = 'ERROR TEST';
END IF;
END$$

CREATE TRIGGER `Change State Update resa.cancel` BEFORE UPDATE ON `unavailables`
 FOR EACH ROW BEGIN
IF NEW.date_end IS NOT NULL THEN
	SET NEW.undetermined = 0;
    UPDATE reservations
            SET reservations.cancel = 0
            WHERE reservations.id_vehicule = NEW.id_vehicule && reservations.date_start >= NEW.date_end;
ELSEIF NEW.date_end IS NULL THEN
	SET NEW.undetermined = 1;
	UPDATE reservations
    	SET reservations.cancel = 1
        WHERE reservations.id_vehicule = NEW.id_vehicule && ((NEW.date_start BETWEEN reservations.date_start and reservations.date_end) OR (NEW.date_start <= reservations.date_start));
ELSE
	SIGNAL SQLSTATE '45004' SET MESSAGE_TEXT = 'ERROR TEST 2';
END IF;
END$$