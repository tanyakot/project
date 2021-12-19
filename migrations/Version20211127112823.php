<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211127112823 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, teacher_id VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, bithday DATE NOT NULL, phone VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, department VARCHAR(255) NOT NULL, email VARCHAR(180) NOT NULL, photo VARCHAR(255) DEFAULT NULL, roles JSON DEFAULT NULL, UNIQUE INDEX UNIQ_B0F6A6D541807E1D (teacher_id), UNIQUE INDEX UNIQ_B0F6A6D5E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_B723AF33CB944F1A ON student (student_id)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_B723AF33E7927C74 ON student (email)');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE teacher');
//        $this->addSql('DROP INDEX UNIQ_B723AF33CB944F1A ON student');
//        $this->addSql('DROP INDEX UNIQ_B723AF33E7927C74 ON student');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }
}
