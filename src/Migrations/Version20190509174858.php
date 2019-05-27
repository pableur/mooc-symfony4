<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190509174858 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E12469DE2');
        $this->addSql('DROP INDEX IDX_1F1B251E12469DE2 ON item');
        $this->addSql('ALTER TABLE item CHANGE category_id shop_id INT NOT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E4D16C4DD FOREIGN KEY (shop_id) REFERENCES shop (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E4D16C4DD ON item (shop_id)');
        $this->addSql('ALTER TABLE item_category ADD CONSTRAINT FK_6A41D10A126F525E FOREIGN KEY (item_id) REFERENCES item (id)');
        $this->addSql('ALTER TABLE item_category ADD CONSTRAINT FK_6A41D10A12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE shop ADD picture_sticker_id INT NOT NULL, ADD picture_spotlight_id INT NOT NULL');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA261461A4A FOREIGN KEY (picture_sticker_id) REFERENCES picture (id)');
        $this->addSql('ALTER TABLE shop ADD CONSTRAINT FK_AC6A4CA23A99657E FOREIGN KEY (picture_spotlight_id) REFERENCES picture (id)');
        $this->addSql('CREATE INDEX IDX_AC6A4CA261461A4A ON shop (picture_sticker_id)');
        $this->addSql('CREATE INDEX IDX_AC6A4CA23A99657E ON shop (picture_spotlight_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE item DROP FOREIGN KEY FK_1F1B251E4D16C4DD');
        $this->addSql('DROP INDEX IDX_1F1B251E4D16C4DD ON item');
        $this->addSql('ALTER TABLE item CHANGE shop_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE item ADD CONSTRAINT FK_1F1B251E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_1F1B251E12469DE2 ON item (category_id)');
        $this->addSql('ALTER TABLE item_category DROP FOREIGN KEY FK_6A41D10A126F525E');
        $this->addSql('ALTER TABLE item_category DROP FOREIGN KEY FK_6A41D10A12469DE2');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA261461A4A');
        $this->addSql('ALTER TABLE shop DROP FOREIGN KEY FK_AC6A4CA23A99657E');
        $this->addSql('DROP INDEX IDX_AC6A4CA261461A4A ON shop');
        $this->addSql('DROP INDEX IDX_AC6A4CA23A99657E ON shop');
        $this->addSql('ALTER TABLE shop DROP picture_sticker_id, DROP picture_spotlight_id');
    }
}
