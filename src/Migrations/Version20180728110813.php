<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180728110813 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE albums ADD CONSTRAINT FK_F4E2474FB7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id)');
        $this->addSql('ALTER TABLE albums ADD CONSTRAINT FK_F4E2474FBACD6074 FOREIGN KEY (style_id) REFERENCES styles (id)');
        $this->addSql('CREATE INDEX IDX_F4E2474FB7970CF8 ON albums (artist_id)');
        $this->addSql('CREATE INDEX IDX_F4E2474FBACD6074 ON albums (style_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE albums DROP FOREIGN KEY FK_F4E2474FB7970CF8');
        $this->addSql('ALTER TABLE albums DROP FOREIGN KEY FK_F4E2474FBACD6074');
        $this->addSql('DROP INDEX IDX_F4E2474FB7970CF8 ON albums');
        $this->addSql('DROP INDEX IDX_F4E2474FBACD6074 ON albums');
    }
}
