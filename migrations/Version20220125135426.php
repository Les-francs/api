<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125135426 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE control (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE era (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, start_at DATETIME NOT NULL, end_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_user (id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, user_id INT NOT NULL, participation VARCHAR(255) NOT NULL, INDEX IDX_92589AE271F7E88B (event_id), INDEX IDX_92589AE2A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE house (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit (id INT AUTO_INCREMENT NOT NULL, type_unit_id INT NOT NULL, era_id INT NOT NULL, name VARCHAR(255) NOT NULL, influence INT NOT NULL, INDEX IDX_DCBB0C53D09C1FF8 (type_unit_id), INDEX IDX_DCBB0C53707300A1 (era_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE unit_user (id INT AUTO_INCREMENT NOT NULL, unit_id INT NOT NULL, user_id INT NOT NULL, control_id INT NOT NULL, level INT NOT NULL, INDEX IDX_1553713F8BD700D (unit_id), INDEX IDX_1553713A76ED395 (user_id), INDEX IDX_155371332BEC70E (control_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weapon (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_user ADD CONSTRAINT FK_92589AE271F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE event_user ADD CONSTRAINT FK_92589AE2A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C53D09C1FF8 FOREIGN KEY (type_unit_id) REFERENCES type_unit (id)');
        $this->addSql('ALTER TABLE unit ADD CONSTRAINT FK_DCBB0C53707300A1 FOREIGN KEY (era_id) REFERENCES era (id)');
        $this->addSql('ALTER TABLE unit_user ADD CONSTRAINT FK_1553713F8BD700D FOREIGN KEY (unit_id) REFERENCES unit (id)');
        $this->addSql('ALTER TABLE unit_user ADD CONSTRAINT FK_1553713A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE unit_user ADD CONSTRAINT FK_155371332BEC70E FOREIGN KEY (control_id) REFERENCES control (id)');
        $this->addSql('ALTER TABLE user ADD weapon_id INT NOT NULL, ADD house_id INT DEFAULT NULL, ADD influence INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64995B82273 FOREIGN KEY (weapon_id) REFERENCES weapon (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6496BB74515 FOREIGN KEY (house_id) REFERENCES house (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64995B82273 ON user (weapon_id)');
        $this->addSql('CREATE INDEX IDX_8D93D6496BB74515 ON user (house_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE unit_user DROP FOREIGN KEY FK_155371332BEC70E');
        $this->addSql('ALTER TABLE unit DROP FOREIGN KEY FK_DCBB0C53707300A1');
        $this->addSql('ALTER TABLE event_user DROP FOREIGN KEY FK_92589AE271F7E88B');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6496BB74515');
        $this->addSql('ALTER TABLE unit DROP FOREIGN KEY FK_DCBB0C53D09C1FF8');
        $this->addSql('ALTER TABLE unit_user DROP FOREIGN KEY FK_1553713F8BD700D');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D64995B82273');
        $this->addSql('DROP TABLE control');
        $this->addSql('DROP TABLE era');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_user');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP TABLE type_unit');
        $this->addSql('DROP TABLE unit');
        $this->addSql('DROP TABLE unit_user');
        $this->addSql('DROP TABLE weapon');
        $this->addSql('DROP INDEX IDX_8D93D64995B82273 ON `user`');
        $this->addSql('DROP INDEX IDX_8D93D6496BB74515 ON `user`');
        $this->addSql('ALTER TABLE `user` DROP weapon_id, DROP house_id, DROP influence');
    }
}
