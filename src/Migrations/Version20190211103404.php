<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190211103404 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, surname VARCHAR(100) NOT NULL, about LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, src_image VARCHAR(255) NOT NULL, alt_image VARCHAR(255) NOT NULL, title_image VARCHAR(255) NOT NULL, details VARCHAR(255) NOT NULL, publication_date DATE NOT NULL, publisher VARCHAR(255) NOT NULL, original_title VARCHAR(255) NOT NULL, edition_language VARCHAR(255) NOT NULL, pages INT NOT NULL, first_published DATE NOT NULL, price DOUBLE PRECISION NOT NULL, sku INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE library (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, adresse VARCHAR(100) NOT NULL, latitude VARCHAR(100) NOT NULL, longitude VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shopping_cart (id INT AUTO_INCREMENT NOT NULL, creation_date DATETIME NOT NULL, ip_adress VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD birthdate DATE NOT NULL, ADD registration_date DATETIME NOT NULL, ADD gender TINYINT(1) NOT NULL, ADD src_photo VARCHAR(255) NOT NULL, ADD alt_photo VARCHAR(255) NOT NULL, ADD title_photo VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE library');
        $this->addSql('DROP TABLE shopping_cart');
        $this->addSql('DROP TABLE type');
        $this->addSql('ALTER TABLE user DROP birthdate, DROP registration_date, DROP gender, DROP src_photo, DROP alt_photo, DROP title_photo');
    }
}
