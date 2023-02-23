<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230222092534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE orderdetail (id INT AUTO_INCREMENT NOT NULL, oid_id INT DEFAULT NULL, pid_id INT DEFAULT NULL, quantity INT NOT NULL, INDEX IDX_27A0E7F2F1067566 (oid_id), INDEX IDX_27A0E7F2386C528 (pid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orderdetail ADD CONSTRAINT FK_27A0E7F2F1067566 FOREIGN KEY (oid_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE orderdetail ADD CONSTRAINT FK_27A0E7F2386C528 FOREIGN KEY (pid_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orderdetail DROP FOREIGN KEY FK_27A0E7F2F1067566');
        $this->addSql('ALTER TABLE orderdetail DROP FOREIGN KEY FK_27A0E7F2386C528');
        $this->addSql('DROP TABLE orderdetail');
    }
}
