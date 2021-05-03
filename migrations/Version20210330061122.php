<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210330061122 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arme CHANGE arme_type_id arme_type_id INT DEFAULT NULL, CHANGE nom_arme nom_arme VARCHAR(150) NOT NULL, CHANGE image_arme image_arme VARCHAR(150) NOT NULL');
        $this->addSql('ALTER TABLE arme_niveau DROP ATK, DROP Stat_secondaire');
        $this->addSql('ALTER TABLE arme_niveau RENAME INDEX fk_arme_niveau_niveau TO IDX_12C6AE0BB3E9C81');
        $this->addSql('ALTER TABLE competence CHANGE personnage_id personnage_id INT DEFAULT NULL, CHANGE type_competence_id type_competence_id INT DEFAULT NULL, CHANGE personnage_competence_label personnage_competence_label VARCHAR(150) NOT NULL, CHANGE pourcentage_degats pourcentage_degats DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE element CHANGE label label VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE equipe CHANGE joueur_id joueur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipe_personnage DROP niveau_personnage, DROP arme_id, DROP niveau_arme');
        $this->addSql('ALTER TABLE equipe_personnage RENAME INDEX fk_equipe_personnage_personnage TO IDX_40D9129C5E315342');
        $this->addSql('ALTER TABLE joueur CHANGE mail mail VARCHAR(150) NOT NULL, CHANGE login login VARCHAR(50) NOT NULL, CHANGE mdp mdp VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE personnage CHANGE arme_type_id arme_type_id INT DEFAULT NULL, CHANGE element_id element_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE personnage_niveau DROP ATK, DROP HP, DROP DEF, DROP Stat_ascension');
        $this->addSql('ALTER TABLE personnage_niveau RENAME INDEX fk_personnage_niveau_niveau TO IDX_8D7979D5B3E9C81');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE arme CHANGE arme_type_id arme_type_id INT NOT NULL, CHANGE nom_arme nom_arme VARCHAR(150) CHARACTER SET utf8 DEFAULT \'\' NOT NULL COLLATE `utf8_general_ci`, CHANGE image_arme image_arme VARCHAR(150) CHARACTER SET utf8 DEFAULT \'\' NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE arme_niveau ADD ATK INT NOT NULL, ADD Stat_secondaire VARCHAR(150) CHARACTER SET utf8 DEFAULT \'-\' NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE arme_niveau RENAME INDEX idx_12c6ae0bb3e9c81 TO FK_Arme_niveau_Niveau');
        $this->addSql('ALTER TABLE competence CHANGE personnage_id personnage_id INT NOT NULL, CHANGE type_competence_id type_competence_id INT NOT NULL, CHANGE personnage_competence_label personnage_competence_label VARCHAR(150) CHARACTER SET utf8 DEFAULT \'\' NOT NULL COLLATE `utf8_general_ci`, CHANGE pourcentage_degats pourcentage_degats DOUBLE PRECISION DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE element CHANGE label label VARCHAR(50) CHARACTER SET utf8 DEFAULT \'\' NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE equipe CHANGE joueur_id joueur_id INT NOT NULL');
        $this->addSql('ALTER TABLE equipe_personnage ADD niveau_personnage INT NOT NULL, ADD arme_id INT NOT NULL, ADD niveau_arme INT NOT NULL');
        $this->addSql('ALTER TABLE equipe_personnage RENAME INDEX idx_40d9129c5e315342 TO FK_Equipe_personnage_Personnage');
        $this->addSql('ALTER TABLE joueur CHANGE mail mail VARCHAR(150) CHARACTER SET utf8 DEFAULT \'\' NOT NULL COLLATE `utf8_general_ci`, CHANGE login login VARCHAR(50) CHARACTER SET utf8 DEFAULT \'\' NOT NULL COLLATE `utf8_general_ci`, CHANGE mdp mdp VARCHAR(255) CHARACTER SET utf8 DEFAULT \'\' NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE personnage CHANGE arme_type_id arme_type_id INT NOT NULL, CHANGE element_id element_id INT NOT NULL');
        $this->addSql('ALTER TABLE personnage_niveau ADD ATK INT NOT NULL, ADD HP INT NOT NULL, ADD DEF INT NOT NULL, ADD Stat_ascension VARCHAR(150) CHARACTER SET utf8 DEFAULT \'-\' NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE personnage_niveau RENAME INDEX idx_8d7979d5b3e9c81 TO FK_Personnage_niveau_Niveau');
    }
}
