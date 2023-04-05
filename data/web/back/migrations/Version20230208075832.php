<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230208075832 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP INDEX half_day ON days');
        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY issues_fk0');
        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY issues_fk1');
        $this->addSql('DROP INDEX issues_fk1 ON issues');
        $this->addSql('DROP INDEX issues_fk0 ON issues');
        $this->addSql('ALTER TABLE issues ADD id_vehicule_id INT NOT NULL, ADD id_reservation_id INT NOT NULL, DROP id_vehicule, DROP id_reservation, CHANGE issue issue LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F835258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F8385542AE1 FOREIGN KEY (id_reservation_id) REFERENCES reservations (id)');
        $this->addSql('CREATE INDEX IDX_DA7D7F835258F8E6 ON issues (id_vehicule_id)');
        $this->addSql('CREATE INDEX IDX_DA7D7F8385542AE1 ON issues (id_reservation_id)');
        $this->addSql('DROP INDEX user ON persons');
        $this->addSql('DROP INDEX mail ON persons');
        $this->addSql('ALTER TABLE persons DROP password, DROP token, DROP token_expire');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY reservations_fk1');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY reservations_fk2');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY reservations_fk0');
        $this->addSql('DROP INDEX reservations_fk1 ON reservations');
        $this->addSql('DROP INDEX reservations_fk0 ON reservations');
        $this->addSql('DROP INDEX reservations_fk2 ON reservations');
        $this->addSql('ALTER TABLE reservations ADD id_vehicule_id INT NOT NULL, ADD id_person_id INT NOT NULL, ADD id_person_resa_id INT NOT NULL, DROP id_vehicule, DROP id_person, DROP id_person_resa, DROP description_issue, CHANGE cancel cancel TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2395258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A14E0760 FOREIGN KEY (id_person_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2395B29841 FOREIGN KEY (id_person_resa_id) REFERENCES persons (id)');
        $this->addSql('CREATE INDEX IDX_4DA2395258F8E6 ON reservations (id_vehicule_id)');
        $this->addSql('CREATE INDEX IDX_4DA239A14E0760 ON reservations (id_person_id)');
        $this->addSql('CREATE INDEX IDX_4DA2395B29841 ON reservations (id_person_resa_id)');
        $this->addSql('ALTER TABLE unavailables DROP FOREIGN KEY unavailables_fk0');
        $this->addSql('DROP INDEX unavailables_fk0 ON unavailables');
        $this->addSql('ALTER TABLE unavailables DROP nb_half_day, CHANGE description description LONGTEXT NOT NULL, CHANGE undetermined undetermined TINYINT(1) NOT NULL, CHANGE id_vehicule id_vehicule_id INT NOT NULL');
        $this->addSql('ALTER TABLE unavailables ADD CONSTRAINT FK_A06DD2C35258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('CREATE INDEX IDX_A06DD2C35258F8E6 ON unavailables (id_vehicule_id)');
        $this->addSql('ALTER TABLE vehicules_days DROP FOREIGN KEY vehicules_days_fk0');
        $this->addSql('ALTER TABLE vehicules_days DROP FOREIGN KEY vehicules_days_fk1');
        $this->addSql('DROP INDEX vehicules_days_fk0 ON vehicules_days');
        $this->addSql('DROP INDEX vehicules_days_fk1 ON vehicules_days');
        $this->addSql('ALTER TABLE vehicules_days ADD id_day_id INT NOT NULL, ADD id_vehicule_id INT NOT NULL, DROP id_day, DROP id_vehicule');
        $this->addSql('ALTER TABLE vehicules_days ADD CONSTRAINT FK_F676B1622FF5F4CB FOREIGN KEY (id_day_id) REFERENCES days (id)');
        $this->addSql('ALTER TABLE vehicules_days ADD CONSTRAINT FK_F676B1625258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('CREATE INDEX IDX_F676B1622FF5F4CB ON vehicules_days (id_day_id)');
        $this->addSql('CREATE INDEX IDX_F676B1625258F8E6 ON vehicules_days (id_vehicule_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('CREATE UNIQUE INDEX half_day ON days (half_day)');
        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY FK_DA7D7F835258F8E6');
        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY FK_DA7D7F8385542AE1');
        $this->addSql('DROP INDEX IDX_DA7D7F835258F8E6 ON issues');
        $this->addSql('DROP INDEX IDX_DA7D7F8385542AE1 ON issues');
        $this->addSql('ALTER TABLE issues ADD id_vehicule INT NOT NULL, ADD id_reservation INT NOT NULL, DROP id_vehicule_id, DROP id_reservation_id, CHANGE issue issue TEXT NOT NULL');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT issues_fk0 FOREIGN KEY (id_vehicule) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT issues_fk1 FOREIGN KEY (id_reservation) REFERENCES reservations (id)');
        $this->addSql('CREATE INDEX issues_fk1 ON issues (id_reservation)');
        $this->addSql('CREATE INDEX issues_fk0 ON issues (id_vehicule)');
        $this->addSql('ALTER TABLE persons ADD password VARCHAR(255) NOT NULL, ADD token VARCHAR(255) DEFAULT NULL, ADD token_expire DATETIME DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX user ON persons (user)');
        $this->addSql('CREATE UNIQUE INDEX mail ON persons (mail)');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA2395258F8E6');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239A14E0760');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA2395B29841');
        $this->addSql('DROP INDEX IDX_4DA2395258F8E6 ON reservations');
        $this->addSql('DROP INDEX IDX_4DA239A14E0760 ON reservations');
        $this->addSql('DROP INDEX IDX_4DA2395B29841 ON reservations');
        $this->addSql('ALTER TABLE reservations ADD id_vehicule INT NOT NULL, ADD id_person INT NOT NULL, ADD id_person_resa INT NOT NULL, ADD description_issue TEXT DEFAULT NULL, DROP id_vehicule_id, DROP id_person_id, DROP id_person_resa_id, CHANGE cancel cancel TINYINT(1) DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT reservations_fk1 FOREIGN KEY (id_person) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT reservations_fk2 FOREIGN KEY (id_person_resa) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT reservations_fk0 FOREIGN KEY (id_vehicule) REFERENCES vehicules (id)');
        $this->addSql('CREATE INDEX reservations_fk1 ON reservations (id_person)');
        $this->addSql('CREATE INDEX reservations_fk0 ON reservations (id_vehicule)');
        $this->addSql('CREATE INDEX reservations_fk2 ON reservations (id_person_resa)');
        $this->addSql('ALTER TABLE unavailables DROP FOREIGN KEY FK_A06DD2C35258F8E6');
        $this->addSql('DROP INDEX IDX_A06DD2C35258F8E6 ON unavailables');
        $this->addSql('ALTER TABLE unavailables ADD nb_half_day INT DEFAULT NULL, CHANGE description description TEXT NOT NULL, CHANGE undetermined undetermined TINYINT(1) DEFAULT 0 NOT NULL, CHANGE id_vehicule_id id_vehicule INT NOT NULL');
        $this->addSql('ALTER TABLE unavailables ADD CONSTRAINT unavailables_fk0 FOREIGN KEY (id_vehicule) REFERENCES vehicules (id)');
        $this->addSql('CREATE INDEX unavailables_fk0 ON unavailables (id_vehicule)');
        $this->addSql('ALTER TABLE vehicules_days DROP FOREIGN KEY FK_F676B1622FF5F4CB');
        $this->addSql('ALTER TABLE vehicules_days DROP FOREIGN KEY FK_F676B1625258F8E6');
        $this->addSql('DROP INDEX IDX_F676B1622FF5F4CB ON vehicules_days');
        $this->addSql('DROP INDEX IDX_F676B1625258F8E6 ON vehicules_days');
        $this->addSql('ALTER TABLE vehicules_days ADD id_day INT NOT NULL, ADD id_vehicule INT NOT NULL, DROP id_day_id, DROP id_vehicule_id');
        $this->addSql('ALTER TABLE vehicules_days ADD CONSTRAINT vehicules_days_fk0 FOREIGN KEY (id_day) REFERENCES days (id)');
        $this->addSql('ALTER TABLE vehicules_days ADD CONSTRAINT vehicules_days_fk1 FOREIGN KEY (id_vehicule) REFERENCES vehicules (id)');
        $this->addSql('CREATE INDEX vehicules_days_fk0 ON vehicules_days (id_day)');
        $this->addSql('CREATE INDEX vehicules_days_fk1 ON vehicules_days (id_vehicule)');
    }
}
