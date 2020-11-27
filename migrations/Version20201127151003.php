<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201127151003 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C16B5BAFE');
        $this->addSql('DROP INDEX IDX_9474526C16B5BAFE ON comment');
        $this->addSql('ALTER TABLE comment CHANGE game_comment_id game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_9474526CE48FD905 ON comment (game_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CE48FD905');
        $this->addSql('DROP INDEX IDX_9474526CE48FD905 ON comment');
        $this->addSql('ALTER TABLE comment CHANGE game_id game_comment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C16B5BAFE FOREIGN KEY (game_comment_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_9474526C16B5BAFE ON comment (game_comment_id)');
    }
}
