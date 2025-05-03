<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250503084135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE receipt (id INT AUTO_INCREMENT NOT NULL, customer_id INT NOT NULL, policy_id INT NOT NULL, date DATE NOT NULL, receipt_no VARCHAR(50) NOT NULL, amount NUMERIC(10, 2) NOT NULL, mode VARCHAR(255) NOT NULL, trans_ref VARCHAR(255) DEFAULT NULL, remark LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_5399B6459395C3F3 (customer_id), INDEX IDX_5399B6452D29E3C6 (policy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE receipt ADD CONSTRAINT FK_5399B6459395C3F3 FOREIGN KEY (customer_id) REFERENCES customer (id)');
        $this->addSql('ALTER TABLE receipt ADD CONSTRAINT FK_5399B6452D29E3C6 FOREIGN KEY (policy_id) REFERENCES policy (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE receipt DROP FOREIGN KEY FK_5399B6459395C3F3');
        $this->addSql('ALTER TABLE receipt DROP FOREIGN KEY FK_5399B6452D29E3C6');
        $this->addSql('DROP TABLE receipt');
    }
}
