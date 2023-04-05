<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230208090549 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY FK_DA7D7F835258F8E6');
        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY FK_DA7D7F8385542AE1');
        $this->addSql('DROP INDEX IDX_DA7D7F8385542AE1 ON issues');
        $this->addSql('DROP INDEX IDX_DA7D7F835258F8E6 ON issues');
        $this->addSql('ALTER TABLE issues ADD vehicule_id INT NOT NULL, ADD reservation_id INT NOT NULL, DROP id_vehicule_id, DROP id_reservation_id');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F834A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F83B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservations (id)');
        $this->addSql('CREATE INDEX IDX_DA7D7F834A4A3511 ON issues (vehicule_id)');
        $this->addSql('CREATE INDEX IDX_DA7D7F83B83297E7 ON issues (reservation_id)');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239A14E0760');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA2395258F8E6');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA2395B29841');
        $this->addSql('DROP INDEX IDX_4DA239A14E0760 ON reservations');
        $this->addSql('DROP INDEX IDX_4DA2395B29841 ON reservations');
        $this->addSql('DROP INDEX IDX_4DA2395258F8E6 ON reservations');
        $this->addSql('ALTER TABLE reservations ADD vehicule_id INT NOT NULL, ADD person_id INT NOT NULL, ADD person_resa_id INT NOT NULL, DROP id_vehicule_id, DROP id_person_id, DROP id_person_resa_id');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2394A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239217BBB47 FOREIGN KEY (person_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA23938D42547 FOREIGN KEY (person_resa_id) REFERENCES persons (id)');
        $this->addSql('CREATE INDEX IDX_4DA2394A4A3511 ON reservations (vehicule_id)');
        $this->addSql('CREATE INDEX IDX_4DA239217BBB47 ON reservations (person_id)');
        $this->addSql('CREATE INDEX IDX_4DA23938D42547 ON reservations (person_resa_id)');
        $this->addSql('ALTER TABLE unavailables DROP FOREIGN KEY FK_A06DD2C35258F8E6');
        $this->addSql('DROP INDEX IDX_A06DD2C35258F8E6 ON unavailables');
        $this->addSql('ALTER TABLE unavailables CHANGE id_vehicule_id vehicule_id INT NOT NULL');
        $this->addSql('ALTER TABLE unavailables ADD CONSTRAINT FK_A06DD2C34A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('CREATE INDEX IDX_A06DD2C34A4A3511 ON unavailables (vehicule_id)');
        $this->addSql('ALTER TABLE vehicules_days DROP FOREIGN KEY FK_F676B1625258F8E6');
        $this->addSql('ALTER TABLE vehicules_days DROP FOREIGN KEY FK_F676B1622FF5F4CB');
        $this->addSql('DROP INDEX IDX_F676B1622FF5F4CB ON vehicules_days');
        $this->addSql('DROP INDEX IDX_F676B1625258F8E6 ON vehicules_days');
        $this->addSql('ALTER TABLE vehicules_days ADD day_id INT NOT NULL, ADD vehicule_id INT NOT NULL, DROP id_day_id, DROP id_vehicule_id');
        $this->addSql('ALTER TABLE vehicules_days ADD CONSTRAINT FK_F676B1629C24126 FOREIGN KEY (day_id) REFERENCES days (id)');
        $this->addSql('ALTER TABLE vehicules_days ADD CONSTRAINT FK_F676B1624A4A3511 FOREIGN KEY (vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('CREATE INDEX IDX_F676B1629C24126 ON vehicules_days (day_id)');
        $this->addSql('CREATE INDEX IDX_F676B1624A4A3511 ON vehicules_days (vehicule_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY FK_DA7D7F834A4A3511');
        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY FK_DA7D7F83B83297E7');
        $this->addSql('DROP INDEX IDX_DA7D7F834A4A3511 ON issues');
        $this->addSql('DROP INDEX IDX_DA7D7F83B83297E7 ON issues');
        $this->addSql('ALTER TABLE issues ADD id_vehicule_id INT NOT NULL, ADD id_reservation_id INT NOT NULL, DROP vehicule_id, DROP reservation_id');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F835258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F8385542AE1 FOREIGN KEY (id_reservation_id) REFERENCES reservations (id)');
        $this->addSql('CREATE INDEX IDX_DA7D7F8385542AE1 ON issues (id_reservation_id)');
        $this->addSql('CREATE INDEX IDX_DA7D7F835258F8E6 ON issues (id_vehicule_id)');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA2394A4A3511');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239217BBB47');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA23938D42547');
        $this->addSql('DROP INDEX IDX_4DA2394A4A3511 ON reservations');
        $this->addSql('DROP INDEX IDX_4DA239217BBB47 ON reservations');
        $this->addSql('DROP INDEX IDX_4DA23938D42547 ON reservations');
        $this->addSql('ALTER TABLE reservations ADD id_vehicule_id INT NOT NULL, ADD id_person_id INT NOT NULL, ADD id_person_resa_id INT NOT NULL, DROP vehicule_id, DROP person_id, DROP person_resa_id');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A14E0760 FOREIGN KEY (id_person_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2395258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2395B29841 FOREIGN KEY (id_person_resa_id) REFERENCES persons (id)');
        $this->addSql('CREATE INDEX IDX_4DA239A14E0760 ON reservations (id_person_id)');
        $this->addSql('CREATE INDEX IDX_4DA2395B29841 ON reservations (id_person_resa_id)');
        $this->addSql('CREATE INDEX IDX_4DA2395258F8E6 ON reservations (id_vehicule_id)');
        $this->addSql('ALTER TABLE unavailables DROP FOREIGN KEY FK_A06DD2C34A4A3511');
        $this->addSql('DROP INDEX IDX_A06DD2C34A4A3511 ON unavailables');
        $this->addSql('ALTER TABLE unavailables CHANGE vehicule_id id_vehicule_id INT NOT NULL');
        $this->addSql('ALTER TABLE unavailables ADD CONSTRAINT FK_A06DD2C35258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('CREATE INDEX IDX_A06DD2C35258F8E6 ON unavailables (id_vehicule_id)');
        $this->addSql('ALTER TABLE vehicules_days DROP FOREIGN KEY FK_F676B1629C24126');
        $this->addSql('ALTER TABLE vehicules_days DROP FOREIGN KEY FK_F676B1624A4A3511');
        $this->addSql('DROP INDEX IDX_F676B1629C24126 ON vehicules_days');
        $this->addSql('DROP INDEX IDX_F676B1624A4A3511 ON vehicules_days');
        $this->addSql('ALTER TABLE vehicules_days ADD id_day_id INT NOT NULL, ADD id_vehicule_id INT NOT NULL, DROP day_id, DROP vehicule_id');
        $this->addSql('ALTER TABLE vehicules_days ADD CONSTRAINT FK_F676B1625258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE vehicules_days ADD CONSTRAINT FK_F676B1622FF5F4CB FOREIGN KEY (id_day_id) REFERENCES days (id)');
        $this->addSql('CREATE INDEX IDX_F676B1622FF5F4CB ON vehicules_days (id_day_id)');
        $this->addSql('CREATE INDEX IDX_F676B1625258F8E6 ON vehicules_days (id_vehicule_id)');
    }
}
