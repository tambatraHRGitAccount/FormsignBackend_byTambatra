<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250409125613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person ADD title VARCHAR(255) DEFAULT NULL, ADD forename VARCHAR(255) DEFAULT NULL, ADD crm_client_ref VARCHAR(255) DEFAULT NULL, ADD street VARCHAR(255) DEFAULT NULL, ADD street2 VARCHAR(255) DEFAULT NULL, ADD town VARCHAR(255) DEFAULT NULL, ADD zip_code INT DEFAULT NULL, ADD national_id VARCHAR(255) DEFAULT NULL, ADD date_of_birth DATE DEFAULT NULL, ADD nationality VARCHAR(255) DEFAULT NULL, ADD passport VARCHAR(255) DEFAULT NULL, ADD phone1 VARCHAR(255) DEFAULT NULL, ADD phone2 VARCHAR(100) DEFAULT NULL, ADD phone3 VARCHAR(100) DEFAULT NULL, ADD phone4 VARCHAR(100) DEFAULT NULL, ADD email VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person DROP title, DROP forename, DROP crm_client_ref, DROP street, DROP street2, DROP town, DROP zip_code, DROP national_id, DROP date_of_birth, DROP nationality, DROP passport, DROP phone1, DROP phone2, DROP phone3, DROP phone4, DROP email');
    }
}
