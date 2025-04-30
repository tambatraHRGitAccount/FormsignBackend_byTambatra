<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250411043823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer ADD spouse_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E098EEC5B5C FOREIGN KEY (spouse_id) REFERENCES person (id)');
        $this->addSql('CREATE INDEX IDX_81398E098EEC5B5C ON customer (spouse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E098EEC5B5C');
        $this->addSql('DROP INDEX IDX_81398E098EEC5B5C ON customer');
        $this->addSql('ALTER TABLE customer DROP spouse_id');
    }
}
