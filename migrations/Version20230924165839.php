<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230924165839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE news_users (news_id INT NOT NULL, users_id INT NOT NULL, PRIMARY KEY(news_id, users_id))');
        $this->addSql('CREATE INDEX IDX_6E3C22B7B5A459A0 ON news_users (news_id)');
        $this->addSql('CREATE INDEX IDX_6E3C22B767B3B43D ON news_users (users_id)');
        $this->addSql('ALTER TABLE news_users ADD CONSTRAINT FK_6E3C22B7B5A459A0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE news_users ADD CONSTRAINT FK_6E3C22B767B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE news_users DROP CONSTRAINT FK_6E3C22B7B5A459A0');
        $this->addSql('ALTER TABLE news_users DROP CONSTRAINT FK_6E3C22B767B3B43D');
        $this->addSql('DROP TABLE news_users');
    }
}
