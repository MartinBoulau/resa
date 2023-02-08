CREATE USER IF NOT EXISTS 'user_auto_resa'@'%' IDENTIFIED BY 'tEjwuj-vypbo6-xykvos';

GRANT SELECT ON resa_vehicule.* TO 'user_auto_resa'@'%';

GRANT INSERT ON resa_vehicule.reservations TO 'user_auto_resa'@'%';
GRANT INSERT ON resa_vehicule.issues TO 'user_auto_resa'@'%';

GRANT UPDATE ON resa_vehicule.reservations TO 'user_auto_resa'@'%';
GRANT UPDATE ON resa_vehicule.vehicules TO 'user_auto_resa'@'%';
GRANT UPDATE ON resa_vehicule.persons TO 'user_auto_resa'@'%';

GRANT DELETE ON resa_vehicule.reservations TO 'user_auto_resa'@'%';