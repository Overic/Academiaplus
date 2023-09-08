<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230908182320 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, specialite_id INT NOT NULL, sexe_id INT NOT NULL, matricule VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_717E22E3B3E9C81 (niveau_id), INDEX IDX_717E22E32195E0F0 (specialite_id), INDEX IDX_717E22E3448F3B3C (sexe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, sigle VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sexe (id INT AUTO_INCREMENT NOT NULL, sigle VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, sigle VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E32195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3448F3B3C FOREIGN KEY (sexe_id) REFERENCES sexe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3B3E9C81');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E32195E0F0');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3448F3B3C');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE sexe');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
