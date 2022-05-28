<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220527100730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398BBB3772B');
        $this->addSql('DROP INDEX IDX_F5299398BBB3772B ON `order`');
        $this->addSql('ALTER TABLE `order` DROP customer_user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD customer_user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398BBB3772B FOREIGN KEY (customer_user_id) REFERENCES customer_user (id)');
        $this->addSql('CREATE INDEX IDX_F5299398BBB3772B ON `order` (customer_user_id)');
    }
}
