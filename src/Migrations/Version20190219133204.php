<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190219133204 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE artiste_oeuvre (artiste_id INT NOT NULL, oeuvre_id INT NOT NULL, INDEX IDX_6F8FD8FF21D25844 (artiste_id), INDEX IDX_6F8FD8FF88194DE8 (oeuvre_id), PRIMARY KEY(artiste_id, oeuvre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artiste_oeuvre ADD CONSTRAINT FK_6F8FD8FF21D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artiste_oeuvre ADD CONSTRAINT FK_6F8FD8FF88194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE oeuvre_artiste');
        $this->addSql('ALTER TABLE artiste DROP oeuvres');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE oeuvre_artiste (oeuvre_id INT NOT NULL, artiste_id INT NOT NULL, INDEX IDX_DB75DF1421D25844 (artiste_id), INDEX IDX_DB75DF1488194DE8 (oeuvre_id), PRIMARY KEY(oeuvre_id, artiste_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE oeuvre_artiste ADD CONSTRAINT FK_DB75DF1421D25844 FOREIGN KEY (artiste_id) REFERENCES artiste (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE oeuvre_artiste ADD CONSTRAINT FK_DB75DF1488194DE8 FOREIGN KEY (oeuvre_id) REFERENCES oeuvre (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE artiste_oeuvre');
        $this->addSql('ALTER TABLE artiste ADD oeuvres LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
