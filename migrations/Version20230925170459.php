<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230925170459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE add_comment (id INT AUTO_INCREMENT NOT NULL, staff_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, comment LONGTEXT NOT NULL, rating INT NOT NULL, post_date DATE NOT NULL, INDEX IDX_A640E0CED4D57CD (staff_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_form (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(10) DEFAULT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE opening_time (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, day_of_week INT NOT NULL, opening_time TIME NOT NULL, closing_time TIME NOT NULL, additional_info VARCHAR(255) DEFAULT NULL, INDEX IDX_89115E6E642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, INDEX IDX_7332E169642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, admin_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_426EF392E7927C74 (email), INDEX IDX_426EF392642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_contact (id INT AUTO_INCREMENT NOT NULL, vehicle_listing_id INT DEFAULT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(10) DEFAULT NULL, message LONGTEXT NOT NULL, INDEX IDX_5311BB5751F31287 (vehicle_listing_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_listing (id INT AUTO_INCREMENT NOT NULL, staff_id INT NOT NULL, brand VARCHAR(255) NOT NULL, year INT NOT NULL, mileage INT NOT NULL, price DOUBLE PRECISION NOT NULL, pictures LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', description LONGTEXT NOT NULL, INDEX IDX_D47315BBD4D57CD (staff_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE add_comment ADD CONSTRAINT FK_A640E0CED4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
        $this->addSql('ALTER TABLE opening_time ADD CONSTRAINT FK_89115E6E642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE staff ADD CONSTRAINT FK_426EF392642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE vehicle_contact ADD CONSTRAINT FK_5311BB5751F31287 FOREIGN KEY (vehicle_listing_id) REFERENCES vehicle_listing (id)');
        $this->addSql('ALTER TABLE vehicle_listing ADD CONSTRAINT FK_D47315BBD4D57CD FOREIGN KEY (staff_id) REFERENCES staff (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE add_comment DROP FOREIGN KEY FK_A640E0CED4D57CD');
        $this->addSql('ALTER TABLE opening_time DROP FOREIGN KEY FK_89115E6E642B8210');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169642B8210');
        $this->addSql('ALTER TABLE staff DROP FOREIGN KEY FK_426EF392642B8210');
        $this->addSql('ALTER TABLE vehicle_contact DROP FOREIGN KEY FK_5311BB5751F31287');
        $this->addSql('ALTER TABLE vehicle_listing DROP FOREIGN KEY FK_D47315BBD4D57CD');
        $this->addSql('DROP TABLE add_comment');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE contact_form');
        $this->addSql('DROP TABLE opening_time');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE staff');
        $this->addSql('DROP TABLE vehicle_contact');
        $this->addSql('DROP TABLE vehicle_listing');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
