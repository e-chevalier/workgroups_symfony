<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220515051513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, workgroup_id_id INT DEFAULT NULL, role_id_id INT NOT NULL, name VARCHAR(80) NOT NULL, lastname VARCHAR(80) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(45) NOT NULL, INDEX IDX_8D93D6495740E89B (workgroup_id_id), INDEX IDX_8D93D64988987678 (role_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workgroup (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(80) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workshift (id INT AUTO_INCREMENT NOT NULL, workgroup_id_id INT DEFAULT NULL, date DATE NOT NULL, start SMALLINT NOT NULL, end SMALLINT NOT NULL, INDEX IDX_1EDFA665740E89B (workgroup_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495740E89B FOREIGN KEY (workgroup_id_id) REFERENCES workgroup (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64988987678 FOREIGN KEY (role_id_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE workshift ADD CONSTRAINT FK_1EDFA665740E89B FOREIGN KEY (workgroup_id_id) REFERENCES workgroup (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64988987678');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495740E89B');
        $this->addSql('ALTER TABLE workshift DROP FOREIGN KEY FK_1EDFA665740E89B');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE workgroup');
        $this->addSql('DROP TABLE workshift');
    }
}
