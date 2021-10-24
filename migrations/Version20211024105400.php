<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211024105400 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE post');
        $this->addSql('ALTER TABLE suggest ADD COLUMN created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, url VARCHAR(255) NOT NULL COLLATE BINARY, email VARCHAR(255) NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE TEMPORARY TABLE __temp__suggest AS SELECT id, title, url, email, instagram, youtube FROM suggest');
        $this->addSql('DROP TABLE suggest');
        $this->addSql('CREATE TABLE suggest (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, instagram VARCHAR(255) DEFAULT NULL, youtube VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO suggest (id, title, url, email, instagram, youtube) SELECT id, title, url, email, instagram, youtube FROM __temp__suggest');
        $this->addSql('DROP TABLE __temp__suggest');
    }
}
