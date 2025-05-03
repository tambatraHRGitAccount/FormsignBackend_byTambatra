<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250503064953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE interaction (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, date_rdv DATE NOT NULL, comment LONGTEXT DEFAULT NULL, request_origin VARCHAR(255) NOT NULL, operation_type VARCHAR(255) NOT NULL, follow_up_status VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_378DFDA79395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE interaction ADD CONSTRAINT FK_378DFDA79395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE payment ADD customer_id INT DEFAULT NULL, CHANGE amount_rs amount_rs NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE payment ADD CONSTRAINT FK_6D28840D9395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_6D28840D9395C3F3 ON payment (customer_id)');
        $this->addSql('ALTER TABLE person CHANGE zip_code zip_code VARCHAR(20) DEFAULT NULL, CHANGE phone1 phone1 VARCHAR(20) DEFAULT NULL');
        $this->addSql('ALTER TABLE policy ADD customer_id INT DEFAULT NULL, CHANGE sum_insured sum_insured NUMERIC(10, 2) DEFAULT NULL, CHANGE excess excess NUMERIC(10, 2) DEFAULT NULL, CHANGE net_premium net_premium NUMERIC(10, 2) DEFAULT NULL, CHANGE rate rate NUMERIC(10, 2) DEFAULT NULL, CHANGE gross_premium gross_premium NUMERIC(10, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE policy ADD CONSTRAINT FK_F07D05169395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('CREATE INDEX IDX_F07D05169395C3F3 ON policy (customer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE interaction DROP FOREIGN KEY FK_378DFDA79395C3F3');
        $this->addSql('DROP TABLE interaction');
        $this->addSql('ALTER TABLE payment DROP FOREIGN KEY FK_6D28840D9395C3F3');
        $this->addSql('DROP INDEX IDX_6D28840D9395C3F3 ON payment');
        $this->addSql('ALTER TABLE payment DROP customer_id, CHANGE amount_rs amount_rs DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE person CHANGE zip_code zip_code VARCHAR(255) DEFAULT NULL, CHANGE phone1 phone1 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE policy DROP FOREIGN KEY FK_F07D05169395C3F3');
        $this->addSql('DROP INDEX IDX_F07D05169395C3F3 ON policy');
        $this->addSql('ALTER TABLE policy DROP customer_id, CHANGE sum_insured sum_insured DOUBLE PRECISION DEFAULT NULL, CHANGE excess excess DOUBLE PRECISION DEFAULT NULL, CHANGE net_premium net_premium DOUBLE PRECISION DEFAULT NULL, CHANGE rate rate DOUBLE PRECISION DEFAULT NULL, CHANGE gross_premium gross_premium DOUBLE PRECISION DEFAULT NULL');
    }
}
