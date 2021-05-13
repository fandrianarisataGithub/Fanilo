<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210513161920 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD etabissement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66CC60A37D FOREIGN KEY (etabissement_id) REFERENCES etablissement (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66CC60A37D ON article (etabissement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66CC60A37D');
        $this->addSql('DROP INDEX IDX_23A0E66CC60A37D ON article');
        $this->addSql('ALTER TABLE article DROP etabissement_id');
    }
}
