<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250428080739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE payment (id INT AUTO_INCREMENT NOT NULL, insurance_period_from DATE DEFAULT NULL, insurance_period_to DATE DEFAULT NULL, vehicle_number VARCHAR(255) DEFAULT NULL, policy_number INT DEFAULT NULL, remarks VARCHAR(255) DEFAULT NULL, amount_rs DOUBLE PRECISION DEFAULT NULL, mode_of_payment VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_children (id INT AUTO_INCREMENT NOT NULL, payment_id INT DEFAULT NULL, mode_of_payment VARCHAR(255) DEFAULT NULL, amount_to_allocate DOUBLE PRECISION DEFAULT NULL, INDEX IDX_E151F3D24C3A3BB (payment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE payment_children ADD CONSTRAINT FK_E151F3D24C3A3BB FOREIGN KEY (payment_id) REFERENCES payment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payment_children DROP FOREIGN KEY FK_E151F3D24C3A3BB');
        $this->addSql('DROP TABLE payment');
        $this->addSql('DROP TABLE payment_children');
    }
}
