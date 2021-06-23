<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623203451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE amenities (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE holiday_home_amenities (holiday_home_id INT NOT NULL, amenities_id INT NOT NULL, INDEX IDX_B14946731A108D92 (holiday_home_id), INDEX IDX_B1494673B92D5262 (amenities_id), PRIMARY KEY(holiday_home_id, amenities_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE holiday_home_amenities ADD CONSTRAINT FK_B14946731A108D92 FOREIGN KEY (holiday_home_id) REFERENCES holiday_home (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE holiday_home_amenities ADD CONSTRAINT FK_B1494673B92D5262 FOREIGN KEY (amenities_id) REFERENCES amenities (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE holiday_home_amenities DROP FOREIGN KEY FK_B1494673B92D5262');
        $this->addSql('DROP TABLE amenities');
        $this->addSql('DROP TABLE holiday_home_amenities');
    }
}
