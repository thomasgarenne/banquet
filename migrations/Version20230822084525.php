<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230822084525 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE3256915B');
        $this->addSql('DROP INDEX UNIQ_E52FFDEE3256915B ON orders');
        $this->addSql('ALTER TABLE orders ADD firstname VARCHAR(50) NOT NULL, ADD lastname VARCHAR(50) NOT NULL, ADD email VARCHAR(100) NOT NULL, ADD phone VARCHAR(15) NOT NULL, ADD is_agree TINYINT(1) NOT NULL, DROP relation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders ADD relation_id INT DEFAULT NULL, DROP firstname, DROP lastname, DROP email, DROP phone, DROP is_agree');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE3256915B FOREIGN KEY (relation_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E52FFDEE3256915B ON orders (relation_id)');
    }
}
