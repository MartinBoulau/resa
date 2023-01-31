CREATE TRIGGER `Chiffrement SHA` BEFORE INSERT ON `persons`
 FOR EACH ROW BEGIN
	if LENGTH(NEW.password) >= 8 THEN
    	SET NEW.password = SHA1(NEW.password);
    ELSE
    	SIGNAL SQLSTATE `45001` SET MESSAGE_TEXT = `Length password < 8`;
    END IF;
END

CREATE TRIGGER `Update Km Vehicule` BEFORE UPDATE ON `reservations`
 FOR EACH ROW BEGIN
	IF NEW.date_end_real IS NOT NULL THEN
    	UPDATE vehicules
        	SET vehicules.km = NEW.km_end
            WHERE vehicules.id = OLD.id_vehicule;
    ELSE 
    	SIGNAL SQLSTATE `45002` SET MESSAGE_TEXT = `Date de fin manquante`;
     END IF;
END