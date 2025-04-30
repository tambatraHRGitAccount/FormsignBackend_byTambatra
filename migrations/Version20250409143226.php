<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250409143226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer ADD person_to_contact_id INT DEFAULT NULL, ADD status VARCHAR(255) DEFAULT NULL, ADD remark VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE customer ADD CONSTRAINT FK_81398E09C81CF4FA FOREIGN KEY (person_to_contact_id) REFERENCES person (id)');
        $this->addSql('CREATE INDEX IDX_81398E09C81CF4FA ON customer (person_to_contact_id)');
        $this->addSql('ALTER TABLE person CHANGE zip_code zip_code VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person CHANGE zip_code zip_code VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE customer DROP FOREIGN KEY FK_81398E09C81CF4FA');
        $this->addSql('DROP INDEX IDX_81398E09C81CF4FA ON customer');
        $this->addSql('ALTER TABLE customer DROP person_to_contact_id, DROP status, DROP remark');
    }
}
