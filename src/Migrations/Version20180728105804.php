<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180728105804 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE songs ADD artist_id INT NOT NULL');
        $this->addSql('ALTER TABLE songs ADD CONSTRAINT FK_BAECB19BB7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id)');
        $this->addSql('ALTER TABLE songs ADD CONSTRAINT FK_BAECB19B1137ABCF FOREIGN KEY (album_id) REFERENCES albums (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BAECB19BB7970CF8 ON songs (artist_id)');
        $this->addSql('CREATE INDEX IDX_BAECB19B1137ABCF ON songs (album_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE songs DROP FOREIGN KEY FK_BAECB19BB7970CF8');
        $this->addSql('ALTER TABLE songs DROP FOREIGN KEY FK_BAECB19B1137ABCF');
        $this->addSql('DROP INDEX UNIQ_BAECB19BB7970CF8 ON songs');
        $this->addSql('DROP INDEX IDX_BAECB19B1137ABCF ON songs');
        $this->addSql('ALTER TABLE songs DROP artist_id');
    }
}
