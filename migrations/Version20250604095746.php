<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250604095746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE auditlogs (id VARCHAR(36) NOT NULL, signature_request_id VARCHAR(36) NOT NULL, event_type VARCHAR(100) NOT NULL, event_data JSON NOT NULL, event_datetime DATETIME NOT NULL, INDEX IDX_C43A7796BB7BB225 (signature_request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE documents (id VARCHAR(36) NOT NULL, signature_request_id VARCHAR(36) NOT NULL, insert_after_id VARCHAR(36) DEFAULT NULL, file LONGTEXT NOT NULL, name VARCHAR(255) NOT NULL, is_signable TINYINT(1) NOT NULL, initial_hash VARCHAR(64) NOT NULL, signed_hash VARCHAR(64) NOT NULL, mime_type VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_A2B07288BB7BB225 (signature_request_id), INDEX IDX_A2B072888A61DAC2 (insert_after_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE folders (id VARCHAR(36) NOT NULL, user_account_id VARCHAR(36) NOT NULL, name VARCHAR(255) NOT NULL, mime_type VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_FE37D30F3C0C9956 (user_account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE initialsettings (id VARCHAR(36) NOT NULL, document_id VARCHAR(36) NOT NULL, alignment VARCHAR(50) NOT NULL, y INT NOT NULL, INDEX IDX_257F2B10C33F7837 (document_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE remindersettings (id VARCHAR(36) NOT NULL, signature_request_id VARCHAR(36) NOT NULL, interval_in_days INT NOT NULL, max_occurrences INT NOT NULL, INDEX IDX_3F1708E4BB7BB225 (signature_request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE senders (id VARCHAR(36) NOT NULL, email VARCHAR(255) NOT NULL, status VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE signaturerequests (id VARCHAR(36) NOT NULL, sender_id VARCHAR(36) NOT NULL, folder_id VARCHAR(36) DEFAULT NULL, email_message LONGTEXT NOT NULL, expiration_date DATE NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, name VARCHAR(255) NOT NULL, timezone VARCHAR(50) NOT NULL, signers_allowed_to_decline TINYINT(1) NOT NULL, status VARCHAR(50) NOT NULL, INDEX IDX_531A8D4F624B39D (sender_id), INDEX IDX_531A8D4162CB942 (folder_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE signaturesettings (id VARCHAR(36) NOT NULL, document_id VARCHAR(36) NOT NULL, page INT NOT NULL, x INT NOT NULL, y INT NOT NULL, height INT NOT NULL, width INT NOT NULL, INDEX IDX_9BF1DE40C33F7837 (document_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE signers (id VARCHAR(36) NOT NULL, signature_request_id VARCHAR(36) NOT NULL, insert_after_id VARCHAR(36) DEFAULT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(20) NOT NULL, signature_authentication_mode VARCHAR(50) NOT NULL, has_signed TINYINT(1) NOT NULL, ip_address VARCHAR(45) NOT NULL, authentication_datetime DATETIME DEFAULT NULL, signature_datetime DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_5E5520EE7927C74 (email), INDEX IDX_5E5520EBB7BB225 (signature_request_id), INDEX IDX_5E5520E8A61DAC2 (insert_after_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE smsnotifications (id VARCHAR(36) NOT NULL, signer_id VARCHAR(36) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_5D5F1B9E9588C067 (signer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE useraccounts (id VARCHAR(36) NOT NULL, email VARCHAR(255) NOT NULL, api_token VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_E68D61DBE7927C74 (email), UNIQUE INDEX UNIQ_E68D61DB7BA2F5EB (api_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE webhooks (id VARCHAR(36) NOT NULL, signature_request_id VARCHAR(36) NOT NULL, event VARCHAR(100) NOT NULL, url VARCHAR(255) NOT NULL, method VARCHAR(10) NOT NULL, INDEX IDX_998C4FDDBB7BB225 (signature_request_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE auditlogs ADD CONSTRAINT FK_C43A7796BB7BB225 FOREIGN KEY (signature_request_id) REFERENCES signaturerequests (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE documents ADD CONSTRAINT FK_A2B07288BB7BB225 FOREIGN KEY (signature_request_id) REFERENCES signaturerequests (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE documents ADD CONSTRAINT FK_A2B072888A61DAC2 FOREIGN KEY (insert_after_id) REFERENCES documents (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE folders ADD CONSTRAINT FK_FE37D30F3C0C9956 FOREIGN KEY (user_account_id) REFERENCES useraccounts (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE initialsettings ADD CONSTRAINT FK_257F2B10C33F7837 FOREIGN KEY (document_id) REFERENCES documents (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE remindersettings ADD CONSTRAINT FK_3F1708E4BB7BB225 FOREIGN KEY (signature_request_id) REFERENCES signaturerequests (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests ADD CONSTRAINT FK_531A8D4F624B39D FOREIGN KEY (sender_id) REFERENCES senders (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests ADD CONSTRAINT FK_531A8D4162CB942 FOREIGN KEY (folder_id) REFERENCES folders (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturesettings ADD CONSTRAINT FK_9BF1DE40C33F7837 FOREIGN KEY (document_id) REFERENCES documents (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signers ADD CONSTRAINT FK_5E5520EBB7BB225 FOREIGN KEY (signature_request_id) REFERENCES signaturerequests (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signers ADD CONSTRAINT FK_5E5520E8A61DAC2 FOREIGN KEY (insert_after_id) REFERENCES signers (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE smsnotifications ADD CONSTRAINT FK_5D5F1B9E9588C067 FOREIGN KEY (signer_id) REFERENCES signers (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE webhooks ADD CONSTRAINT FK_998C4FDDBB7BB225 FOREIGN KEY (signature_request_id) REFERENCES signaturerequests (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE auditlogs DROP FOREIGN KEY FK_C43A7796BB7BB225
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE documents DROP FOREIGN KEY FK_A2B07288BB7BB225
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE documents DROP FOREIGN KEY FK_A2B072888A61DAC2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE folders DROP FOREIGN KEY FK_FE37D30F3C0C9956
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE initialsettings DROP FOREIGN KEY FK_257F2B10C33F7837
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE remindersettings DROP FOREIGN KEY FK_3F1708E4BB7BB225
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests DROP FOREIGN KEY FK_531A8D4F624B39D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests DROP FOREIGN KEY FK_531A8D4162CB942
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturesettings DROP FOREIGN KEY FK_9BF1DE40C33F7837
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signers DROP FOREIGN KEY FK_5E5520EBB7BB225
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signers DROP FOREIGN KEY FK_5E5520E8A61DAC2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE smsnotifications DROP FOREIGN KEY FK_5D5F1B9E9588C067
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE webhooks DROP FOREIGN KEY FK_998C4FDDBB7BB225
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE auditlogs
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE documents
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE folders
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE initialsettings
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE remindersettings
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE senders
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE signaturerequests
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE signaturesettings
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE signers
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE smsnotifications
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE useraccounts
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE webhooks
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
