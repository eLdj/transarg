<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190726173633 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE utilisateur ADD cin BIGINT NOT NULL, DROP adresse, DROP cni, CHANGE nom nom VARCHAR(60) NOT NULL, CHANGE prenom prenom VARCHAR(60) NOT NULL, CHANGE email email VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE profil CHANGE libelle libelle VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE compte ADD date_depot DATETIME NOT NULL, DROP datedepot, CHANGE montant montant INT NOT NULL');
        $this->addSql('ALTER TABLE partenaire ADD nom_entreprise VARCHAR(60) NOT NULL, ADD raison_socilale VARCHAR(60) NOT NULL, ADD numero_compte BIGINT NOT NULL, DROP nomentreprise, DROP raisonsocial, DROP numerocompte, CHANGE ninea ninea VARCHAR(60) NOT NULL, CHANGE adresse adresse VARCHAR(60) NOT NULL, CHANGE email email VARCHAR(60) NOT NULL');
        $this->addSql('ALTER TABLE statut CHANGE libelle libelle VARCHAR(60) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compte ADD datedepot DATE NOT NULL, DROP date_depot, CHANGE montant montant VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE partenaire ADD nomentreprise VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD raisonsocial VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD numerocompte INT NOT NULL, DROP nom_entreprise, DROP raison_socilale, DROP numero_compte, CHANGE ninea ninea VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE adresse adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE profil CHANGE libelle libelle VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE statut CHANGE libelle libelle VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE utilisateur ADD adresse VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD cni INT NOT NULL, DROP cin, CHANGE nom nom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE prenom prenom VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE email email VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
