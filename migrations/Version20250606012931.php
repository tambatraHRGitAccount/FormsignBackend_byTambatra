<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250606012931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE documents CHANGE initial initial_settings JSON DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests DROP FOREIGN KEY FK_531A8D4162CB942
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests DROP FOREIGN KEY FK_531A8D4F624B39D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests ADD CONSTRAINT FK_531A8D4162CB942 FOREIGN KEY (folder_id) REFERENCES folders (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests ADD CONSTRAINT FK_531A8D4F624B39D FOREIGN KEY (sender_id) REFERENCES senders (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE documents CHANGE initial_settings initial JSON DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests DROP FOREIGN KEY FK_531A8D4F624B39D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests DROP FOREIGN KEY FK_531A8D4162CB942
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests ADD CONSTRAINT FK_531A8D4F624B39D FOREIGN KEY (sender_id) REFERENCES senders (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signaturerequests ADD CONSTRAINT FK_531A8D4162CB942 FOREIGN KEY (folder_id) REFERENCES folders (id) ON UPDATE CASCADE ON DELETE CASCADE
        SQL);
    }
}
