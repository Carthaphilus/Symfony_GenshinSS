<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210505110707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arme (arme_id INT AUTO_INCREMENT NOT NULL, arme_type_id INT DEFAULT NULL, nom_arme VARCHAR(150) NOT NULL, image_arme VARCHAR(150) NOT NULL, rarete INT NOT NULL, INDEX FK_Arme_Arme_Type (arme_type_id), PRIMARY KEY(arme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arme_niveau (arme_id INT NOT NULL, niveau_id INT NOT NULL, INDEX IDX_12C6AE0B21D9C0A (arme_id), INDEX IDX_12C6AE0BB3E9C81 (niveau_id), PRIMARY KEY(arme_id, niveau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arme_type (arme_type_id INT AUTO_INCREMENT NOT NULL, label_type VARCHAR(150) NOT NULL, PRIMARY KEY(arme_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arme_type_statistique (arme_type_statistique_id INT AUTO_INCREMENT NOT NULL, arme_id INT NOT NULL, type_statistique_id INT NOT NULL, valeur_stat INT NOT NULL, raffinement VARCHAR(2) NOT NULL, PRIMARY KEY(arme_type_statistique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE competence (competence_id INT AUTO_INCREMENT NOT NULL, personnage_id INT DEFAULT NULL, type_competence_id INT DEFAULT NULL, personnage_competence_label VARCHAR(150) NOT NULL, ascension INT NOT NULL, pourcentage_degats DOUBLE PRECISION NOT NULL, INDEX FK_Personnage_Personnage_competence (personnage_id), INDEX FK_Type_competence_Personnage_competence (type_competence_id), PRIMARY KEY(competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE element (element_id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(element_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (equipe_id INT AUTO_INCREMENT NOT NULL, joueur_id INT DEFAULT NULL, nom VARCHAR(150) NOT NULL, INDEX FK_Equipe_Joueur (joueur_id), PRIMARY KEY(equipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe_personnage (equipe_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_40D9129C6D861B89 (equipe_id), INDEX IDX_40D9129C5E315342 (personnage_id), PRIMARY KEY(equipe_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueur (joueur_id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(50) DEFAULT NULL, mail VARCHAR(150) NOT NULL, login VARCHAR(50) NOT NULL, mdp VARCHAR(255) NOT NULL, PRIMARY KEY(joueur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (niveau_id INT AUTO_INCREMENT NOT NULL, nb_niveau INT NOT NULL, PRIMARY KEY(niveau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (personnage_id INT AUTO_INCREMENT NOT NULL, arme_type_id INT DEFAULT NULL, element_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, rarete INT NOT NULL, image VARCHAR(150) NOT NULL, INDEX FK_Personnage_Arme_type (arme_type_id), INDEX FK_Personnage_Element (element_id), PRIMARY KEY(personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_niveau (personnage_id INT NOT NULL, niveau_id INT NOT NULL, INDEX IDX_8D7979D55E315342 (personnage_id), INDEX IDX_8D7979D5B3E9C81 (niveau_id), PRIMARY KEY(personnage_id, niveau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_competence (type_competence_id INT AUTO_INCREMENT NOT NULL, type_competence_label VARCHAR(100) NOT NULL, PRIMARY KEY(type_competence_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_statistique (type_statistiques_id INT AUTO_INCREMENT NOT NULL, label_type_stat VARCHAR(150) NOT NULL, PRIMARY KEY(type_statistiques_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE arme ADD CONSTRAINT FK_1820737988A7F496 FOREIGN KEY (arme_type_id) REFERENCES arme_type (arme_type_id)');
        $this->addSql('ALTER TABLE arme_niveau ADD CONSTRAINT FK_12C6AE0B21D9C0A FOREIGN KEY (arme_id) REFERENCES arme (arme_id)');
        $this->addSql('ALTER TABLE arme_niveau ADD CONSTRAINT FK_12C6AE0BB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (niveau_id)');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (personnage_id)');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F659BAA9E FOREIGN KEY (type_competence_id) REFERENCES type_competence (type_competence_id)');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA15A9E2D76C FOREIGN KEY (joueur_id) REFERENCES joueur (joueur_id)');
        $this->addSql('ALTER TABLE equipe_personnage ADD CONSTRAINT FK_40D9129C6D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (equipe_id)');
        $this->addSql('ALTER TABLE equipe_personnage ADD CONSTRAINT FK_40D9129C5E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (personnage_id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D88A7F496 FOREIGN KEY (arme_type_id) REFERENCES arme_type (arme_type_id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D1F1F2A24 FOREIGN KEY (element_id) REFERENCES element (element_id)');
        $this->addSql('ALTER TABLE personnage_niveau ADD CONSTRAINT FK_8D7979D55E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (personnage_id)');
        $this->addSql('ALTER TABLE personnage_niveau ADD CONSTRAINT FK_8D7979D5B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (niveau_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arme_niveau DROP FOREIGN KEY FK_12C6AE0B21D9C0A');
        $this->addSql('ALTER TABLE arme DROP FOREIGN KEY FK_1820737988A7F496');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D88A7F496');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D1F1F2A24');
        $this->addSql('ALTER TABLE equipe_personnage DROP FOREIGN KEY FK_40D9129C6D861B89');
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA15A9E2D76C');
        $this->addSql('ALTER TABLE arme_niveau DROP FOREIGN KEY FK_12C6AE0BB3E9C81');
        $this->addSql('ALTER TABLE personnage_niveau DROP FOREIGN KEY FK_8D7979D5B3E9C81');
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687F5E315342');
        $this->addSql('ALTER TABLE equipe_personnage DROP FOREIGN KEY FK_40D9129C5E315342');
        $this->addSql('ALTER TABLE personnage_niveau DROP FOREIGN KEY FK_8D7979D55E315342');
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687F659BAA9E');
        $this->addSql('DROP TABLE arme');
        $this->addSql('DROP TABLE arme_niveau');
        $this->addSql('DROP TABLE arme_type');
        $this->addSql('DROP TABLE arme_type_statistique');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE element');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE equipe_personnage');
        $this->addSql('DROP TABLE joueur');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE personnage_niveau');
        $this->addSql('DROP TABLE type_competence');
        $this->addSql('DROP TABLE type_statistique');
    }
}
