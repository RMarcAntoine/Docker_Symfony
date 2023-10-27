<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231010150608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE news_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reviews_id_seq CASCADE');
        $this->addSql('ALTER TABLE news_users DROP CONSTRAINT fk_6e3c22b7b5a459a0');
        $this->addSql('ALTER TABLE news_users DROP CONSTRAINT fk_6e3c22b767b3b43d');
        $this->addSql('ALTER TABLE reviews_users DROP CONSTRAINT fk_1cd05d5d8092d97f');
        $this->addSql('ALTER TABLE reviews_users DROP CONSTRAINT fk_1cd05d5d67b3b43d');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE news_users');
        $this->addSql('DROP TABLE reviews_users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE news_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reviews_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE reviews (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, games VARCHAR(100) NOT NULL, rate DOUBLE PRECISION NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, comments TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_6970eb0fe7927c74 ON reviews (email)');
        $this->addSql('COMMENT ON COLUMN reviews.date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE news (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, games VARCHAR(100) NOT NULL, type VARCHAR(100) NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, text TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX uniq_1dd39950e7927c74 ON news (email)');
        $this->addSql('COMMENT ON COLUMN news.date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE news_users (news_id INT NOT NULL, users_id INT NOT NULL, PRIMARY KEY(news_id, users_id))');
        $this->addSql('CREATE INDEX idx_6e3c22b767b3b43d ON news_users (users_id)');
        $this->addSql('CREATE INDEX idx_6e3c22b7b5a459a0 ON news_users (news_id)');
        $this->addSql('CREATE TABLE reviews_users (reviews_id INT NOT NULL, users_id INT NOT NULL, PRIMARY KEY(reviews_id, users_id))');
        $this->addSql('CREATE INDEX idx_1cd05d5d67b3b43d ON reviews_users (users_id)');
        $this->addSql('CREATE INDEX idx_1cd05d5d8092d97f ON reviews_users (reviews_id)');
        $this->addSql('ALTER TABLE news_users ADD CONSTRAINT fk_6e3c22b7b5a459a0 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE news_users ADD CONSTRAINT fk_6e3c22b767b3b43d FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reviews_users ADD CONSTRAINT fk_1cd05d5d8092d97f FOREIGN KEY (reviews_id) REFERENCES reviews (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reviews_users ADD CONSTRAINT fk_1cd05d5d67b3b43d FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
