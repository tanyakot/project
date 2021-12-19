<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201212909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
//        $this->addSql('CREATE TABLE attendance (id INT AUTO_INCREMENT NOT NULL, student INT NOT NULL, student_id INT NOT NULL, date_time DATETIME NOT NULL, state TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE TABLE attendance_attendance_attendance (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_B723AF33CB944F1A ON student (student_id)');
//        $this->addSql('CREATE UNIQUE INDEX UNIQ_B723AF33E7927C74 ON student (email)');
//        $this->addSql('ALTER TABLE user CHANGE roles roles JSON DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE attendance');
        $this->addSql('DROP TABLE attendance_attendance_attendance');
        $this->addSql('DROP INDEX UNIQ_B723AF33CB944F1A ON student');
        $this->addSql('DROP INDEX UNIQ_B723AF33E7927C74 ON student');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }
}
