<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230626205122 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE console (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(100) NOT NULL, manufacturer VARCHAR(100) NOT NULL, release_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', country VARCHAR(100) NOT NULL, model VARCHAR(50) DEFAULT NULL, acquisition_price VARCHAR(100) DEFAULT NULL, acquisition_date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', accessories LONGTEXT DEFAULT NULL, conservation_and_commentaries LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_3603CFB6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, user_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video_game (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, developer VARCHAR(255) DEFAULT NULL, publisher VARCHAR(255) DEFAULT NULL, console VARCHAR(255) NOT NULL, conservation LONGTEXT DEFAULT NULL, commentary LONGTEXT DEFAULT NULL, release_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', acquisition_date DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', acquisition_price VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', image_name VARCHAR(255) DEFAULT NULL, country VARCHAR(100) NOT NULL, INDEX IDX_24BC6C50A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE console ADD CONSTRAINT FK_3603CFB6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE video_game ADD CONSTRAINT FK_24BC6C50A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE console DROP FOREIGN KEY FK_3603CFB6A76ED395');
        $this->addSql('ALTER TABLE video_game DROP FOREIGN KEY FK_24BC6C50A76ED395');
        $this->addSql('DROP TABLE console');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE video_game');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
