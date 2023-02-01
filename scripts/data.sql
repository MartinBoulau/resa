INSERT INTO `persons` (`id`, `firstname`, `lastname`, `user`, `tel`, `mail`, `password`, `token`, `token_expire`)
    VALUES (NULL, 'Axel', 'Blanchard', 'axel.blanchard', '(+33)6.12.23.34.45', 'axel.blanchard@mail.com', 'AXELAXEL', NULL, NULL);

INSERT INTO `vehicules` (`id`, `immat`, `brand`, `model`, `nb_places`, `km`, `description`)
    VALUES (1, 'AB-123-CD', 'Ferrari', 'Enzo', 2, 53670, "C'est une supercar du constructeur automobile italien Ferrari, pourvue d'un moteur V12 de 660 chevaux, inspirée de l'univers de la Formule 1 et construite à 400 exemplaires, entre 2002 et 2004, dont un offert au Vatican.");

INSERT INTO `reservations` (`id`, `id_vehicule`, `id_person`, `id_person_resa`, `date_start`, `date_start_real`, `date_end`, `date_end_real`, `km_end`, `description_issue`, `nb_week`, `cancel`, `date_cancel`)
    VALUES (NULL, '1', '1', '1', '2023-02-01 00:00:00', NULL, '2023-02-03 12:00:00', NULL, NULL, NULL, '5', '0', NULL);

UPDATE `reservations`
    SET `date_start_real` = '2023-02-01 08:24:52', `date_end_real` = '2023-02-03 10:38:32', `km_end` = '53922'
    WHERE `reservations`.`id` = 1;