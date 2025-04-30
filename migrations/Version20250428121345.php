<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250428121345 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE policy_cover_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE policy ADD cover_type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE policy ADD CONSTRAINT FK_F07D0516CDA10D3B FOREIGN KEY (cover_type_id) REFERENCES policy_cover_type (id)');
        $this->addSql('CREATE INDEX IDX_F07D0516CDA10D3B ON policy (cover_type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE policy DROP FOREIGN KEY FK_F07D0516CDA10D3B');
        $this->addSql('DROP TABLE policy_cover_type');
        $this->addSql('DROP INDEX IDX_F07D0516CDA10D3B ON policy');
        $this->addSql('ALTER TABLE policy DROP cover_type_id');
    }
}
