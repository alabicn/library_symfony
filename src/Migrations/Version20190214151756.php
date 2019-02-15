<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190214151756 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE price (id INT AUTO_INCREMENT NOT NULL, books_id INT NOT NULL, editions_id INT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_CAC822D97DD8AC20 (books_id), INDEX IDX_CAC822D96BD6E9CC (editions_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D97DD8AC20 FOREIGN KEY (books_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE price ADD CONSTRAINT FK_CAC822D96BD6E9CC FOREIGN KEY (editions_id) REFERENCES edition (id)');
        $this->addSql('DROP TABLE edition_book');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE edition_book (edition_id INT NOT NULL, book_id INT NOT NULL, INDEX IDX_7BD2482F74281A5E (edition_id), INDEX IDX_7BD2482F16A2B381 (book_id), PRIMARY KEY(edition_id, book_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE edition_book ADD CONSTRAINT FK_7BD2482F16A2B381 FOREIGN KEY (book_id) REFERENCES book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE edition_book ADD CONSTRAINT FK_7BD2482F74281A5E FOREIGN KEY (edition_id) REFERENCES edition (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE price');
    }
}
