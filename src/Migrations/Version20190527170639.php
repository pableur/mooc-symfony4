<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190527170639 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, picture_id INT NOT NULL, name VARCHAR(255) NOT NULL, mail LONGTEXT NOT NULL, password LONGTEXT DEFAULT NULL, registration DATETIME NOT NULL, INDEX IDX_8D93D649EE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentary (id INT AUTO_INCREMENT NOT NULL, shop_id INT DEFAULT NULL, item_id INT DEFAULT NULL, user_id INT DEFAULT NULL, comment LONGTEXT DEFAULT NULL, note INT DEFAULT NULL, INDEX IDX_1CAC12CA4D16C4DD (shop_id), INDEX IDX_1CAC12CA126F525E (item_id), INDEX IDX_1CAC12CAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tunning (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, shop_id INT NOT NULL, INDEX IDX_57698A6AA76ED395 (user_id), INDEX IDX_57698A6A4D16C4DD (shop_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EE45BDBF FOREIGN KEY (picture_id) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE commentary ADD CONSTRAINT FK_1CAC12CA4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE commentary ADD CONSTRAINT FK_1CAC12CA126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE commentary ADD CONSTRAINT FK_1CAC12CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6A4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('ALTER TABLE item CHANGE price price NUMERIC(10, 0) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE commentary DROP FOREIGN KEY FK_1CAC12CAA76ED395');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AA76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE commentary');
        $this->addSql('DROP TABLE tunning');
        $this->addSql('DROP TABLE role');
        $this->addSql('ALTER TABLE item CHANGE price price DOUBLE PRECISION DEFAULT NULL');
    }
}
