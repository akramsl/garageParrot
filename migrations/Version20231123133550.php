<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231123133550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vehicle_picture (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT NOT NULL, name VARCHAR(255) NOT NULL, size INT NOT NULL, update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9A812E6545317D1 (vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vehicle_picture ADD CONSTRAINT FK_9A812E6545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle_listing (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicle_picture DROP FOREIGN KEY FK_9A812E6545317D1');
        $this->addSql('DROP TABLE vehicle_picture');
    }
}
