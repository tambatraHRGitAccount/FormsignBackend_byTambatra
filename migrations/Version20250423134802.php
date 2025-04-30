<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250423134802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE policy (id INT AUTO_INCREMENT NOT NULL, date DATE DEFAULT NULL, acc_month DATE DEFAULT NULL, placing_number INT DEFAULT NULL, qb_number INT DEFAULT NULL, policy_number INT DEFAULT NULL, date_from DATE DEFAULT NULL, date_to DATE NOT NULL, make_and_model VARCHAR(255) DEFAULT NULL, hp VARCHAR(255) DEFAULT NULL, body_type VARCHAR(255) DEFAULT NULL, month INT DEFAULT NULL, year INT DEFAULT NULL, registration_number INT DEFAULT NULL, sum_insured DOUBLE PRECISION DEFAULT NULL, excess DOUBLE PRECISION DEFAULT NULL, risk_description VARCHAR(500) DEFAULT NULL, driver_at_fault TINYINT(1) DEFAULT NULL, not_at_fault_excess TINYINT(1) DEFAULT NULL, aic TINYINT(1) DEFAULT NULL, rodent TINYINT(1) DEFAULT NULL, loss_of_use TINYINT(1) DEFAULT NULL, passive_terrorism TINYINT(1) DEFAULT NULL, alloy_wheel TINYINT(1) DEFAULT NULL, net_premium DOUBLE PRECISION DEFAULT NULL, rate DOUBLE PRECISION DEFAULT NULL, gross_premium DOUBLE PRECISION DEFAULT NULL, leasing VARCHAR(255) DEFAULT NULL, lien VARCHAR(255) DEFAULT NULL, transaction_type VARCHAR(255) DEFAULT NULL, insurance_type VARCHAR(255) DEFAULT NULL, mode_of_payment VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE policy');
    }
}
