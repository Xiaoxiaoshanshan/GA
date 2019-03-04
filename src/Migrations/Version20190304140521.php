<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190304140521 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE artiste (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, pays VARCHAR(50) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artiste_oeuvre (artiste_id INT NOT NULL, oeuvre_id INT NOT NULL, INDEX IDX_6F8FD8FF21D25844 (artiste_id), INDEX IDX_6F8FD8FF88194DE8 (oeuvre_id), PRIMARY KEY(artiste_id, oeuvre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, libelleetat LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exposition (id INT AUTO_INCREMENT NOT NULL, poster LONGTEXT NOT NULL, titre LONGTEXT NOT NULL, description LONGTEXT NOT NULL, datedebut DATE NOT NULL, datefin DATE NOT NULL, nbvisiters INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, oeuvre_id INT DEFAULT NULL, libellemedia LONGTEXT DEFAULT NULL, typemedia LONGTEXT DEFAULT NULL, url LONGTEXT DEFAULT NULL, INDEX IDX_6A2CA10C88194DE8 (oeuvre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvre (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, etat_id INT DEFAULT NULL, position_id INT DEFAULT NULL, titre LONGTEXT NOT NULL, img LONGTEXT NOT NULL, description LONGTEXT NOT NULL, longueur DOUBLE PRECISION DEFAULT NULL, largeur DOUBLE PRECISION DEFAULT NULL, hauteur DOUBLE PRECISION DEFAULT NULL, diametre DOUBLE PRECISION DEFAULT NULL, periodcreation LONGTEXT NOT NULL, INDEX IDX_35FE2EFEC54C8C93 (type_id), INDEX IDX_35FE2EFED5E86FF (etat_id), INDEX IDX_35FE2EFEDD842E46 (position_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE oeuvre_exposition (oeuvre_id INT NOT NULL, exposition_id INT NOT NULL, INDEX IDX_C642377388194DE8 (oeuvre_id), INDEX IDX_C642377388ED476F (exposition_id), PRIMARY KEY(oeuvre_id, exposition_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position (id INT AUTO_INCREMENT NOT NULL, libelleposition LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, libelle LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', password VARCHAR(255) NOT NULL, pseudo LONGTEXT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, tel LONGTEXT NOT NULL, adresse LONGTEXT DEFAULT NULL, cp LONGTEXT DEFAULT NULL, ville LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste_oeuvre ADD CONSTRAINT FK_6F8FD8FF21D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_oeuvre ADD CONSTRAINT FK_6F8FD8FF88194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C88194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id)');
        $this->addSql('ALTER TABLE oeuvre ADD CONSTRAINT FK_35FE2EFEC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE oeuvre ADD CONSTRAINT FK_35FE2EFED5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE oeuvre ADD CONSTRAINT FK_35FE2EFEDD842E46 FOREIGN KEY (position_id) REFERENCES position (id)');
        $this->addSql('ALTER TABLE oeuvre_exposition ADD CONSTRAINT FK_C642377388194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oeuvre_exposition ADD CONSTRAINT FK_C642377388ED476F FOREIGN KEY (exposition_id) REFERENCES exposition (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE artiste_oeuvre DROP FOREIGN KEY FK_6F8FD8FF21D25844');
        $this->addSql('ALTER TABLE oeuvre DROP FOREIGN KEY FK_35FE2EFED5E86FF');
        $this->addSql('ALTER TABLE oeuvre_exposition DROP FOREIGN KEY FK_C642377388ED476F');
        $this->addSql('ALTER TABLE artiste_oeuvre DROP FOREIGN KEY FK_6F8FD8FF88194DE8');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C88194DE8');
        $this->addSql('ALTER TABLE oeuvre_exposition DROP FOREIGN KEY FK_C642377388194DE8');
        $this->addSql('ALTER TABLE oeuvre DROP FOREIGN KEY FK_35FE2EFEDD842E46');
        $this->addSql('ALTER TABLE oeuvre DROP FOREIGN KEY FK_35FE2EFEC54C8C93');
        $this->addSql('DROP TABLE artiste');
        $this->addSql('DROP TABLE artiste_oeuvre');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE exposition');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE oeuvre');
        $this->addSql('DROP TABLE oeuvre_exposition');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
    }
}
