<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220317235450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acceso (id INT AUTO_INCREMENT NOT NULL, cinta_accede_id INT DEFAULT NULL, supervisada_por_id INT DEFAULT NULL, socio_accede_id INT DEFAULT NULL, hora_entrada DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', hora_salida DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', peso INT DEFAULT NULL, INDEX IDX_1268771BA25694FC (cinta_accede_id), INDEX IDX_1268771B71B45C6 (supervisada_por_id), INDEX IDX_1268771B991BE76F (socio_accede_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cinta (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, grupo_cintas INT NOT NULL, disponible TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE empleado (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellidos VARCHAR(255) NOT NULL, dni VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, es_supervisor TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE socio (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apellidos VARCHAR(255) NOT NULL, dni VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acceso ADD CONSTRAINT FK_1268771BA25694FC FOREIGN KEY (cinta_accede_id) REFERENCES cinta (id)');
        $this->addSql('ALTER TABLE acceso ADD CONSTRAINT FK_1268771B71B45C6 FOREIGN KEY (supervisada_por_id) REFERENCES empleado (id)');
        $this->addSql('ALTER TABLE acceso ADD CONSTRAINT FK_1268771B991BE76F FOREIGN KEY (socio_accede_id) REFERENCES socio (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE acceso DROP FOREIGN KEY FK_1268771BA25694FC');
        $this->addSql('ALTER TABLE acceso DROP FOREIGN KEY FK_1268771B71B45C6');
        $this->addSql('ALTER TABLE acceso DROP FOREIGN KEY FK_1268771B991BE76F');
        $this->addSql('DROP TABLE acceso');
        $this->addSql('DROP TABLE cinta');
        $this->addSql('DROP TABLE empleado');
        $this->addSql('DROP TABLE socio');
    }
}
