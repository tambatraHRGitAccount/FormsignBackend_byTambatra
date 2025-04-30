<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250410135314 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer ADD swan_client_ref VARCHAR(50) DEFAULT NULL, ADD dtclient_ref VARCHAR(255) DEFAULT NULL, ADD job_title VARCHAR(150) DEFAULT NULL, ADD vanilla_lovers_ltd VARCHAR(150) DEFAULT NULL, ADD employer_address VARCHAR(150) DEFAULT NULL, ADD brn VARCHAR(150) DEFAULT NULL, ADD source_of_funds VARCHAR(255) DEFAULT NULL, ADD average_montly_income INT DEFAULT NULL, ADD driving_licence INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE customer DROP swan_client_ref, DROP dtclient_ref, DROP job_title, DROP vanilla_lovers_ltd, DROP employer_address, DROP brn, DROP source_of_funds, DROP average_montly_income, DROP driving_licence');
    }
}
