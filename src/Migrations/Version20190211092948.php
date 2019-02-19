<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190211092948 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE artiste ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, ADD description LONGTEXT DEFAULT NULL, ADD oeuvres LONGTEXT DEFAULT NULL, DROP nomartiste, DROP prenomartiste, DROP descriptionartistefr, DROP descriptionartisteen, DROP descriptionartistecn');
        $this->addSql('ALTER TABLE exposition ADD titre LONGTEXT NOT NULL, ADD description LONGTEXT NOT NULL, DROP titreexpo, DROP descriptionexpofr, DROP descriptionexpoen, DROP descriptionexpocn');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE artiste ADD nomartiste VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD prenomartiste VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD descriptionartistefr LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD descriptionartisteen LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD descriptionartistecn LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP nom, DROP prenom, DROP description, DROP oeuvres');
        $this->addSql('ALTER TABLE exposition ADD titreexpo LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD descriptionexpofr LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD descriptionexpoen LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD descriptionexpocn LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, DROP titre, DROP description');
    }
}
