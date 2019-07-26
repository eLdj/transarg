<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190726015927 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE statut CHANGE libelle libelle VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE nom nom VARCHAR(60) NOT NULL, CHANGE prenom prenom VARCHAR(60) NOT NULL, CHANGE email email VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE partenaire CHANGE nom_entreprise nom_entreprise VARCHAR(60) NOT NULL, CHANGE ninea ninea VARCHAR(60) NOT NULL, CHANGE adresse adresse VARCHAR(60) NOT NULL, CHANGE raison_socilale raison_socilale VARCHAR(60) NOT NULL, CHANGE email email VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE profil CHANGE libelle libelle VARCHAR(60) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE partenaire CHANGE nom_entreprise nom_entreprise VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE ninea ninea VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE raison_socilale raison_socilale VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE profil CHANGE libelle libelle LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE statut CHANGE libelle libelle LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE utilisateur CHANGE nom nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
