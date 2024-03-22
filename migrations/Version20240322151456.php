<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240322151456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, candidates_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_AC74095A7D5FB314 (candidates_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidates (id INT AUTO_INCREMENT NOT NULL, notes_candidates_id INT DEFAULT NULL, notes_jobs_id INT DEFAULT NULL, user_id INT DEFAULT NULL, f_name VARCHAR(255) DEFAULT NULL, l_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, available TINYINT(1) DEFAULT NULL, dt_inscription DATETIME DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, has_passport TINYINT(1) DEFAULT NULL, birthdate DATE DEFAULT NULL, description VARCHAR(4095) DEFAULT NULL, gender TINYINT(1) DEFAULT NULL, dt_updated DATETIME DEFAULT NULL, dt_deleted DATETIME DEFAULT NULL, INDEX IDX_6A77F80C747CAAF8 (notes_candidates_id), INDEX IDX_6A77F80C48A60A73 (notes_jobs_id), UNIQUE INDEX UNIQ_6A77F80CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, jobs_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_3AF3466848704627 (jobs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, notes_candidates_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, contact VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, INDEX IDX_C82E74747CAAF8 (notes_candidates_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experiences (id INT AUTO_INCREMENT NOT NULL, candidates_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_82020E707D5FB314 (candidates_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_candidates (id INT AUTO_INCREMENT NOT NULL, id_job_id INT DEFAULT NULL, id_candidate_id INT DEFAULT NULL, aproved TINYINT(1) NOT NULL, dt_creation DATETIME NOT NULL, INDEX IDX_68112DD7FB44 (id_job_id), INDEX IDX_6811B27CF2F3 (id_candidate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jobs (id INT AUTO_INCREMENT NOT NULL, job_candidates_id INT DEFAULT NULL, notes_jobs_id INT DEFAULT NULL, type_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, description VARCHAR(4095) NOT NULL, active TINYINT(1) NOT NULL, title VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, salary INT NOT NULL, dt_closing DATE NOT NULL, dt_creation DATETIME NOT NULL, INDEX IDX_A8936DC5D681EDD8 (job_candidates_id), INDEX IDX_A8936DC548A60A73 (notes_jobs_id), INDEX IDX_A8936DC5C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nationalities (id INT AUTO_INCREMENT NOT NULL, candidates_id INT DEFAULT NULL, country VARCHAR(255) NOT NULL, INDEX IDX_D92CA7707D5FB314 (candidates_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notes_candidates (id INT AUTO_INCREMENT NOT NULL, note INT NOT NULL, dt_note DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notes_jobs (id INT AUTO_INCREMENT NOT NULL, note INT NOT NULL, dt_note DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE postes (id INT AUTO_INCREMENT NOT NULL, clients_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_5A763C64AB014612 (clients_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_jobs (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A7D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('ALTER TABLE candidates ADD CONSTRAINT FK_6A77F80C747CAAF8 FOREIGN KEY (notes_candidates_id) REFERENCES notes_candidates (id)');
        $this->addSql('ALTER TABLE candidates ADD CONSTRAINT FK_6A77F80C48A60A73 FOREIGN KEY (notes_jobs_id) REFERENCES notes_jobs (id)');
        $this->addSql('ALTER TABLE candidates ADD CONSTRAINT FK_6A77F80CA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF3466848704627 FOREIGN KEY (jobs_id) REFERENCES jobs (id)');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E74747CAAF8 FOREIGN KEY (notes_candidates_id) REFERENCES notes_candidates (id)');
        $this->addSql('ALTER TABLE experiences ADD CONSTRAINT FK_82020E707D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('ALTER TABLE job_candidates ADD CONSTRAINT FK_68112DD7FB44 FOREIGN KEY (id_job_id) REFERENCES jobs (id)');
        $this->addSql('ALTER TABLE job_candidates ADD CONSTRAINT FK_6811B27CF2F3 FOREIGN KEY (id_candidate_id) REFERENCES candidates (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5D681EDD8 FOREIGN KEY (job_candidates_id) REFERENCES job_candidates (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC548A60A73 FOREIGN KEY (notes_jobs_id) REFERENCES notes_jobs (id)');
        $this->addSql('ALTER TABLE jobs ADD CONSTRAINT FK_A8936DC5C54C8C93 FOREIGN KEY (type_id) REFERENCES type_jobs (id)');
        $this->addSql('ALTER TABLE nationalities ADD CONSTRAINT FK_D92CA7707D5FB314 FOREIGN KEY (candidates_id) REFERENCES candidates (id)');
        $this->addSql('ALTER TABLE postes ADD CONSTRAINT FK_5A763C64AB014612 FOREIGN KEY (clients_id) REFERENCES clients (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A7D5FB314');
        $this->addSql('ALTER TABLE candidates DROP FOREIGN KEY FK_6A77F80C747CAAF8');
        $this->addSql('ALTER TABLE candidates DROP FOREIGN KEY FK_6A77F80C48A60A73');
        $this->addSql('ALTER TABLE candidates DROP FOREIGN KEY FK_6A77F80CA76ED395');
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF3466848704627');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E74747CAAF8');
        $this->addSql('ALTER TABLE experiences DROP FOREIGN KEY FK_82020E707D5FB314');
        $this->addSql('ALTER TABLE job_candidates DROP FOREIGN KEY FK_68112DD7FB44');
        $this->addSql('ALTER TABLE job_candidates DROP FOREIGN KEY FK_6811B27CF2F3');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5D681EDD8');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC548A60A73');
        $this->addSql('ALTER TABLE jobs DROP FOREIGN KEY FK_A8936DC5C54C8C93');
        $this->addSql('ALTER TABLE nationalities DROP FOREIGN KEY FK_D92CA7707D5FB314');
        $this->addSql('ALTER TABLE postes DROP FOREIGN KEY FK_5A763C64AB014612');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE candidates');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE clients');
        $this->addSql('DROP TABLE experiences');
        $this->addSql('DROP TABLE job_candidates');
        $this->addSql('DROP TABLE jobs');
        $this->addSql('DROP TABLE nationalities');
        $this->addSql('DROP TABLE notes_candidates');
        $this->addSql('DROP TABLE notes_jobs');
        $this->addSql('DROP TABLE postes');
        $this->addSql('DROP TABLE type_jobs');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
