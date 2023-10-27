<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230924165458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE reviews_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE reviews (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, games VARCHAR(100) NOT NULL, rate DOUBLE PRECISION NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, comments TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6970EB0FE7927C74 ON reviews (email)');
        $this->addSql('COMMENT ON COLUMN reviews.date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE reviews_users (reviews_id INT NOT NULL, users_id INT NOT NULL, PRIMARY KEY(reviews_id, users_id))');
        $this->addSql('CREATE INDEX IDX_1CD05D5D8092D97F ON reviews_users (reviews_id)');
        $this->addSql('CREATE INDEX IDX_1CD05D5D67B3B43D ON reviews_users (users_id)');
        $this->addSql('ALTER TABLE reviews_users ADD CONSTRAINT FK_1CD05D5D8092D97F FOREIGN KEY (reviews_id) REFERENCES reviews (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reviews_users ADD CONSTRAINT FK_1CD05D5D67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE reviews_id_seq CASCADE');
        $this->addSql('ALTER TABLE reviews_users DROP CONSTRAINT FK_1CD05D5D8092D97F');
        $this->addSql('ALTER TABLE reviews_users DROP CONSTRAINT FK_1CD05D5D67B3B43D');
        $this->addSql('DROP TABLE reviews');
        $this->addSql('DROP TABLE reviews_users');
    }
}
