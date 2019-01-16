<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181105123205 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE has_role ADD employee_id INT DEFAULT NULL, ADD role_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE has_role ADD CONSTRAINT FK_A3551358C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE has_role ADD CONSTRAINT FK_A355135D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_A3551358C03F15C ON has_role (employee_id)');
        $this->addSql('CREATE INDEX IDX_A355135D60322AC ON has_role (role_id)');
        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A4BF396750');
        $this->addSql('ALTER TABLE account ADD employee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A48C03F15C FOREIGN KEY (employee_id) REFERENCES employee (id)');
        $this->addSql('CREATE INDEX IDX_7D3656A48C03F15C ON account (employee_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE account DROP FOREIGN KEY FK_7D3656A48C03F15C');
        $this->addSql('DROP INDEX IDX_7D3656A48C03F15C ON account');
        $this->addSql('ALTER TABLE account DROP employee_id');
        $this->addSql('ALTER TABLE account ADD CONSTRAINT FK_7D3656A4BF396750 FOREIGN KEY (id) REFERENCES employee (id)');
        $this->addSql('ALTER TABLE has_role DROP FOREIGN KEY FK_A3551358C03F15C');
        $this->addSql('ALTER TABLE has_role DROP FOREIGN KEY FK_A355135D60322AC');
        $this->addSql('DROP INDEX IDX_A3551358C03F15C ON has_role');
        $this->addSql('DROP INDEX IDX_A355135D60322AC ON has_role');
        $this->addSql('ALTER TABLE has_role DROP employee_id, DROP role_id');
    }
}
