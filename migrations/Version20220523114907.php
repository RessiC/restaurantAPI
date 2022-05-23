<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220523114907 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE restaurant_entity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employee_user ADD restaurant_entity_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE employee_user ADD CONSTRAINT FK_384A9C0EB1B0277A FOREIGN KEY (restaurant_entity_id) REFERENCES restaurant_entity (id)');
        $this->addSql('CREATE INDEX IDX_384A9C0EB1B0277A ON employee_user (restaurant_entity_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee_user DROP FOREIGN KEY FK_384A9C0EB1B0277A');
        $this->addSql('DROP TABLE restaurant_entity');
        $this->addSql('DROP INDEX IDX_384A9C0EB1B0277A ON employee_user');
        $this->addSql('ALTER TABLE employee_user DROP restaurant_entity_id');
    }
}
