<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190109104655 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, publish TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_140AB620989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_page_block (page_id INT NOT NULL, page_block_id INT NOT NULL, INDEX IDX_EE7A596AC4663E4 (page_id), INDEX IDX_EE7A596A6972852C (page_block_id), PRIMARY KEY(page_id, page_block_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_block (id INT AUTO_INCREMENT NOT NULL, gallery INT DEFAULT NULL, media_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, body LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_E59A68F4472B783A (gallery), INDEX IDX_E59A68F4EA9FDD75 (media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE page_page_block ADD CONSTRAINT FK_EE7A596AC4663E4 FOREIGN KEY (page_id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_page_block ADD CONSTRAINT FK_EE7A596A6972852C FOREIGN KEY (page_block_id) REFERENCES page_block (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_block ADD CONSTRAINT FK_E59A68F4472B783A FOREIGN KEY (gallery) REFERENCES media__gallery (id)');
        $this->addSql('ALTER TABLE page_block ADD CONSTRAINT FK_E59A68F4EA9FDD75 FOREIGN KEY (media_id) REFERENCES media__media (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE page_page_block DROP FOREIGN KEY FK_EE7A596AC4663E4');
        $this->addSql('ALTER TABLE page_page_block DROP FOREIGN KEY FK_EE7A596A6972852C');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE page_page_block');
        $this->addSql('DROP TABLE page_block');
    }
}
