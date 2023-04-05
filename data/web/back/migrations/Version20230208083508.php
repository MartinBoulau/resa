<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230208083508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `days` (id INT AUTO_INCREMENT NOT NULL, half_day VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE issues (id INT AUTO_INCREMENT NOT NULL, id_vehicule_id INT NOT NULL, id_reservation_id INT NOT NULL, issue LONGTEXT NOT NULL, INDEX IDX_DA7D7F835258F8E6 (id_vehicule_id), INDEX IDX_DA7D7F8385542AE1 (id_reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE persons (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, user VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, id_vehicule_id INT NOT NULL, id_person_id INT NOT NULL, id_person_resa_id INT NOT NULL, date_start DATETIME NOT NULL, date_start_real DATETIME DEFAULT NULL, date_end DATETIME NOT NULL, date_end_real DATETIME DEFAULT NULL, km_end DOUBLE PRECISION DEFAULT NULL, nb_week INT NOT NULL, cancel TINYINT(1) NOT NULL, date_cancel DATETIME DEFAULT NULL, INDEX IDX_4DA2395258F8E6 (id_vehicule_id), INDEX IDX_4DA239A14E0760 (id_person_id), INDEX IDX_4DA2395B29841 (id_person_resa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unavailables (id INT AUTO_INCREMENT NOT NULL, id_vehicule_id INT NOT NULL, date_start DATETIME NOT NULL, date_end DATETIME DEFAULT NULL, description LONGTEXT NOT NULL, undetermined TINYINT(1) NOT NULL, INDEX IDX_A06DD2C35258F8E6 (id_vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicules (id INT AUTO_INCREMENT NOT NULL, immat VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, nb_places INT NOT NULL, km DOUBLE PRECISION NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicules_days (id INT AUTO_INCREMENT NOT NULL, id_day_id INT NOT NULL, id_vehicule_id INT NOT NULL, INDEX IDX_F676B1622FF5F4CB (id_day_id), INDEX IDX_F676B1625258F8E6 (id_vehicule_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F835258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE issues ADD CONSTRAINT FK_DA7D7F8385542AE1 FOREIGN KEY (id_reservation_id) REFERENCES reservations (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2395258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA239A14E0760 FOREIGN KEY (id_person_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE reservations ADD CONSTRAINT FK_4DA2395B29841 FOREIGN KEY (id_person_resa_id) REFERENCES persons (id)');
        $this->addSql('ALTER TABLE unavailables ADD CONSTRAINT FK_A06DD2C35258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
        $this->addSql('ALTER TABLE vehicules_days ADD CONSTRAINT FK_F676B1622FF5F4CB FOREIGN KEY (id_day_id) REFERENCES days (id)');
        $this->addSql('ALTER TABLE vehicules_days ADD CONSTRAINT FK_F676B1625258F8E6 FOREIGN KEY (id_vehicule_id) REFERENCES vehicules (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY FK_DA7D7F835258F8E6');
        $this->addSql('ALTER TABLE issues DROP FOREIGN KEY FK_DA7D7F8385542AE1');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA2395258F8E6');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA239A14E0760');
        $this->addSql('ALTER TABLE reservations DROP FOREIGN KEY FK_4DA2395B29841');
        $this->addSql('ALTER TABLE unavailables DROP FOREIGN KEY FK_A06DD2C35258F8E6');
        $this->addSql('ALTER TABLE vehicules_days DROP FOREIGN KEY FK_F676B1622FF5F4CB');
        $this->addSql('ALTER TABLE vehicules_days DROP FOREIGN KEY FK_F676B1625258F8E6');
        $this->addSql('DROP TABLE days');
        $this->addSql('DROP TABLE issues');
        $this->addSql('DROP TABLE persons');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE unavailables');
        $this->addSql('DROP TABLE vehicules');
        $this->addSql('DROP TABLE vehicules_days');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
