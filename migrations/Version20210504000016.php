<?php
declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210504000016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add users table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(
            <<<'SQL'
CREATE TABLE users (
	id varchar(50) NOT NULL,
	name varchar(100) NOT NULL,
	password varchar(100) NOT NULL,
	email varchar(255) NOT NULL,
	roles varchar(255) NOT NULL,
	CONSTRAINT users_pk PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
CREATE INDEX users_name_IDX USING BTREE ON users (name);
CREATE UNIQUE INDEX users_email_IDX USING BTREE ON users (email);
SQL
        );
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS users;');
    }
}
