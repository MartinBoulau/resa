CREATE USER IF NOT EXISTS 'user_api'@'%' IDENTIFIED BY 'tEjwuj-vypbo6-xykvos';

GRANT SELECT ON resa_vehicule.* TO 'user_api'@'%';

GRANT INSERT ON resa_vehicule.reservations TO 'user_api'@'%';
GRANT INSERT ON resa_vehicule.issues TO 'user_api'@'%';

GRANT UPDATE ON resa_vehicule.reservations TO 'user_api'@'%';
GRANT UPDATE ON resa_vehicule.vehicules TO 'user_api'@'%';

GRANT DELETE ON resa_vehicule.reservations TO 'user_api'@'%';