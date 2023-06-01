<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230601201410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE console (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(100) NOT NULL, manufacturer VARCHAR(100) NOT NULL, release_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', country VARCHAR(100) NOT NULL, acquisition_price VARCHAR(100) DEFAULT NULL, acquisition_date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', accessories LONGTEXT DEFAULT NULL, conservation_and_commentaries LONGTEXT DEFAULT NULL, INDEX IDX_3603CFB6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6A76ED395');
        $this->addSql('DROP TABLE console');
    }
}
