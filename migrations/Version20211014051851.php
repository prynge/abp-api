<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211014051851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auto (id INT AUTO_INCREMENT NOT NULL, marque_id INT NOT NULL, fournisseur_id INT NOT NULL, modele_id INT NOT NULL, energie_id INT NOT NULL, carrosserie_id INT NOT NULL, segment_id INT DEFAULT NULL, porte_id INT NOT NULL, genre_id INT NOT NULL, boite_vitesse_id INT NOT NULL, nombre_rapport_id INT NOT NULL, t_vaachat_id INT NOT NULL, type_garantie_id INT DEFAULT NULL, cylindree_id INT NOT NULL, provenance_id INT NOT NULL, parc_id INT DEFAULT NULL, immatriculation VARCHAR(255) NOT NULL, date_mec DATE DEFAULT NULL, annee VARCHAR(5) DEFAULT NULL, vin VARCHAR(255) NOT NULL, version VARCHAR(255) NOT NULL, place INT NOT NULL, puissance_fiscale INT NOT NULL, kms BIGINT DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, couleur_interieure VARCHAR(255) DEFAULT NULL, sellerie VARCHAR(255) DEFAULT NULL, date_achat DATE DEFAULT NULL, date_entree DATE DEFAULT NULL, date_heure_vente DATETIME DEFAULT NULL, puissance_din INT NOT NULL, prix_achat VARCHAR(255) DEFAULT NULL, prix_particulier VARCHAR(255) DEFAULT NULL, tva_vente VARCHAR(255) DEFAULT NULL, prix_professionnel VARCHAR(255) DEFAULT NULL, code_radio VARCHAR(255) DEFAULT NULL, equipement_serie VARCHAR(255) DEFAULT NULL, equipement_option VARCHAR(255) DEFAULT NULL, consommation_co2 INT DEFAULT NULL, poids_vide VARCHAR(255) DEFAULT NULL, duree INT DEFAULT NULL, type_cnit VARCHAR(255) DEFAULT NULL, date_entree_arrivage DATE NOT NULL, livraison_prevue_bc DATE DEFAULT NULL, livraison_prevue_bt DATE DEFAULT NULL, disponibilite DATE DEFAULT NULL, INDEX IDX_66BA25FA4827B9B2 (marque_id), INDEX IDX_66BA25FA670C757F (fournisseur_id), INDEX IDX_66BA25FAAC14B70A (modele_id), INDEX IDX_66BA25FAB732A364 (energie_id), INDEX IDX_66BA25FAC9FED38E (carrosserie_id), INDEX IDX_66BA25FADB296AAD (segment_id), INDEX IDX_66BA25FA6BCC8323 (porte_id), INDEX IDX_66BA25FA4296D31F (genre_id), INDEX IDX_66BA25FA1BA2F125 (boite_vitesse_id), INDEX IDX_66BA25FAE06897F6 (nombre_rapport_id), INDEX IDX_66BA25FA9C273B40 (t_vaachat_id), INDEX IDX_66BA25FAEFA0B7BE (type_garantie_id), INDEX IDX_66BA25FAA235527B (cylindree_id), INDEX IDX_66BA25FAC24AFBDB (provenance_id), INDEX IDX_66BA25FA812D24CA (parc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boite_vitesse (id INT AUTO_INCREMENT NOT NULL, boite_vitesse_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carrosserie (id INT AUTO_INCREMENT NOT NULL, carrosserie_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cylindree (id INT AUTO_INCREMENT NOT NULL, nb_cylindree INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE energie (id INT AUTO_INCREMENT NOT NULL, energie_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file_object (id INT AUTO_INCREMENT NOT NULL, file_path VARCHAR(255) DEFAULT NULL, createdat DATETIME DEFAULT NULL, createdby VARCHAR(255) DEFAULT NULL, updatedat DATETIME DEFAULT NULL, updatedby VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, frs_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE frais (id INT AUTO_INCREMENT NOT NULL, frais_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE frais_reels (id INT AUTO_INCREMENT NOT NULL, auto_id INT NOT NULL, frais_name_id INT NOT NULL, valeur INT NOT NULL, UNIQUE INDEX UNIQ_440C5FA91D55B925 (auto_id), INDEX IDX_440C5FA97CE867FA (frais_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, genre_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lot_achat (id INT AUTO_INCREMENT NOT NULL, numero_lot VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, marque_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, modele_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nombre_rapport (id INT AUTO_INCREMENT NOT NULL, nombre_rapport INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parc (id INT AUTO_INCREMENT NOT NULL, parc_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE porte (id INT AUTO_INCREMENT NOT NULL, nb_porte INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provenance (id INT AUTO_INCREMENT NOT NULL, provenance_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE segment (id INT AUTO_INCREMENT NOT NULL, segment_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tvaachat (id INT AUTO_INCREMENT NOT NULL, tva_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_garantie (id INT AUTO_INCREMENT NOT NULL, garantie_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, importer TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FA4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FA670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FAAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FAB732A364 FOREIGN KEY (energie_id) REFERENCES energie (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FAC9FED38E FOREIGN KEY (carrosserie_id) REFERENCES carrosserie (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FADB296AAD FOREIGN KEY (segment_id) REFERENCES segment (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FA6BCC8323 FOREIGN KEY (porte_id) REFERENCES porte (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FA4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FA1BA2F125 FOREIGN KEY (boite_vitesse_id) REFERENCES boite_vitesse (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FAE06897F6 FOREIGN KEY (nombre_rapport_id) REFERENCES nombre_rapport (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FA9C273B40 FOREIGN KEY (t_vaachat_id) REFERENCES tvaachat (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FAEFA0B7BE FOREIGN KEY (type_garantie_id) REFERENCES type_garantie (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FAA235527B FOREIGN KEY (cylindree_id) REFERENCES cylindree (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FAC24AFBDB FOREIGN KEY (provenance_id) REFERENCES provenance (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FA812D24CA FOREIGN KEY (parc_id) REFERENCES parc (id)');
        $this->addSql('ALTER TABLE frais_reels ADD CONSTRAINT FK_440C5FA91D55B925 FOREIGN KEY (auto_id) REFERENCES auto (id)');
        $this->addSql('ALTER TABLE frais_reels ADD CONSTRAINT FK_440C5FA97CE867FA FOREIGN KEY (frais_name_id) REFERENCES frais (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE frais_reels DROP FOREIGN KEY FK_440C5FA91D55B925');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FA1BA2F125');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FAC9FED38E');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FAA235527B');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FAB732A364');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FA670C757F');
        $this->addSql('ALTER TABLE frais_reels DROP FOREIGN KEY FK_440C5FA97CE867FA');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FA4296D31F');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FA4827B9B2');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FAAC14B70A');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FAE06897F6');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FA812D24CA');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FA6BCC8323');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FAC24AFBDB');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FADB296AAD');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FA9C273B40');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FAEFA0B7BE');
        $this->addSql('DROP TABLE auto');
        $this->addSql('DROP TABLE boite_vitesse');
        $this->addSql('DROP TABLE carrosserie');
        $this->addSql('DROP TABLE cylindree');
        $this->addSql('DROP TABLE energie');
        $this->addSql('DROP TABLE file_object');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE frais');
        $this->addSql('DROP TABLE frais_reels');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE lot_achat');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE nombre_rapport');
        $this->addSql('DROP TABLE parc');
        $this->addSql('DROP TABLE porte');
        $this->addSql('DROP TABLE provenance');
        $this->addSql('DROP TABLE segment');
        $this->addSql('DROP TABLE tvaachat');
        $this->addSql('DROP TABLE type_garantie');
        $this->addSql('DROP TABLE user');
    }
}
