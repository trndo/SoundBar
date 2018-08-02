<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180730115012 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE songs DROP FOREIGN KEY FK_BAECB19B1137ABCF');
        $this->addSql('DROP TABLE albums');
        $this->addSql('DROP INDEX IDX_BAECB19B1137ABCF ON songs');
        $this->addSql('ALTER TABLE songs DROP album_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE albums (id INT AUTO_INCREMENT NOT NULL, artist_id INT NOT NULL, style_id INT NOT NULL, album_name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, year INT NOT NULL, image VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_F4E2474FB7970CF8 (artist_id), INDEX IDX_F4E2474FBACD6074 (style_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE albums ADD CONSTRAINT FK_F4E2474FB7970CF8 FOREIGN KEY (artist_id) REFERENCES artists (id)');
        $this->addSql('ALTER TABLE albums ADD CONSTRAINT FK_F4E2474FBACD6074 FOREIGN KEY (style_id) REFERENCES styles (id)');
        $this->addSql('ALTER TABLE songs ADD album_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE songs ADD CONSTRAINT FK_BAECB19B1137ABCF FOREIGN KEY (album_id) REFERENCES albums (id)');
        $this->addSql('CREATE INDEX IDX_BAECB19B1137ABCF ON songs (album_id)');
    }
}
