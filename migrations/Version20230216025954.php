<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230216025954 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prosup (id INT AUTO_INCREMENT NOT NULL, pro_id INT DEFAULT NULL, sup_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_E4DD21EC3B7E4BA (pro_id), INDEX IDX_E4DD21EFF790DCD (sup_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prosup ADD CONSTRAINT FK_E4DD21EC3B7E4BA FOREIGN KEY (pro_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE prosup ADD CONSTRAINT FK_E4DD21EFF790DCD FOREIGN KEY (sup_id) REFERENCES supplier (id)');
        $this->addSql('ALTER TABLE cart ADD CONSTRAINT FK_BA388B7F2415B3E FOREIGN KEY (proid_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prosup DROP FOREIGN KEY FK_E4DD21EC3B7E4BA');
        $this->addSql('ALTER TABLE prosup DROP FOREIGN KEY FK_E4DD21EFF790DCD');
        $this->addSql('DROP TABLE prosup');
        $this->addSql('ALTER TABLE cart DROP FOREIGN KEY FK_BA388B7F2415B3E');
    }
}
