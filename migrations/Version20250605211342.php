<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250605211342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE documents (id VARCHAR(36) NOT NULL, signature_request_id VARCHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, is_signable TINYINT(1) NOT NULL, initial_hash VARCHAR(64) NOT NULL, signed_hash VARCHAR(64) DEFAULT NULL, signature_settings JSON DEFAULT NULL, initial JSON DEFAULT NULL, insert_after_id VARCHAR(36) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_A2B07288BB7BB225 (signature_request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE folders (id VARCHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE senders (id VARCHAR(36) NOT NULL, email VARCHAR(255) NOT NULL, status VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_108A1060E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE signaturerequests (id VARCHAR(36) NOT NULL, sender_id VARCHAR(36) NOT NULL, folder_id VARCHAR(36) DEFAULT NULL, name VARCHAR(255) NOT NULL, email_message LONGTEXT DEFAULT NULL, expiration_date DATE DEFAULT NULL, timezone VARCHAR(50) NOT NULL, signers_allowed_to_decline TINYINT(1) NOT NULL, status VARCHAR(50) NOT NULL, reminder_settings JSON NOT NULL, webhooks JSON NOT NULL, audit_events JSON NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_531A8D4F624B39D (sender_id), INDEX IDX_531A8D4162CB942 (folder_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE signers (id VARCHAR(36) NOT NULL, signature_request_id VARCHAR(36) NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(20) DEFAULT NULL, signature_authentication_mode VARCHAR(50) NOT NULL, insert_after_id VARCHAR(36) DEFAULT NULL, sms_message LONGTEXT DEFAULT NULL, has_signed TINYINT(1) NOT NULL, ip_address VARCHAR(45) DEFAULT NULL, authentication_datetime DATETIME DEFAULT NULL, signature_datetime DATETIME DEFAULT NULL, status VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_5E5520EE7927C74 (email), INDEX IDX_5E5520EBB7BB225 (signature_request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE useraccounts (id VARCHAR(36) NOT NULL, folder_id VARCHAR(36) NOT NULL, api_token VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_E68D61DB7BA2F5EB (api_token), INDEX IDX_E68D61DB162CB942 (folder_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE documents ADD CONSTRAINT FK_A2B07288BB7BB225 FOREIGN KEY (signature_request_id) REFERENCES signaturerequests (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests ADD CONSTRAINT FK_531A8D4F624B39D FOREIGN KEY (sender_id) REFERENCES senders (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests ADD CONSTRAINT FK_531A8D4162CB942 FOREIGN KEY (folder_id) REFERENCES folders (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signers ADD CONSTRAINT FK_5E5520EBB7BB225 FOREIGN KEY (signature_request_id) REFERENCES signaturerequests (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE useraccounts ADD CONSTRAINT FK_E68D61DB162CB942 FOREIGN KEY (folder_id) REFERENCES folders (id) ON DELETE RESTRICT
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE documents DROP FOREIGN KEY FK_A2B07288BB7BB225
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests DROP FOREIGN KEY FK_531A8D4F624B39D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests DROP FOREIGN KEY FK_531A8D4162CB942
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signers DROP FOREIGN KEY FK_5E5520EBB7BB225
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE useraccounts DROP FOREIGN KEY FK_E68D61DB162CB942
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE documents
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE folders
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE senders
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE signaturerequests
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE signers
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE useraccounts
        SQL);
    }
}
