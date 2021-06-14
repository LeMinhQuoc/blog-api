<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210607041004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (id INT AUTO_INCREMENT NOT NULL, id_tag_id INT DEFAULT NULL, id_owner_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, view INT NOT NULL, timestamp DATETIME NOT NULL, INDEX IDX_C01551439CE5D6FC (id_tag_id), INDEX IDX_C01551432EE78D6C (id_owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_post_id INT DEFAULT NULL, parent_id_id INT DEFAULT NULL, comment VARCHAR(255) NOT NULL, timestamp DATETIME NOT NULL, INDEX IDX_9474526C79F37AE5 (id_user_id), INDEX IDX_9474526C9514AA5C (id_post_id), INDEX IDX_9474526CB3750AF4 (parent_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, id_blog_id INT DEFAULT NULL, image_link VARCHAR(255) NOT NULL, image_name VARCHAR(255) NOT NULL, INDEX IDX_C53D045F47DD7E7 (id_blog_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `like` (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, id_post_id INT DEFAULT NULL, INDEX IDX_AC6340B379F37AE5 (id_user_id), INDEX IDX_AC6340B39514AA5C (id_post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, full_name VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C01551439CE5D6FC FOREIGN KEY (id_tag_id) REFERENCES tag (id)');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C01551432EE78D6C FOREIGN KEY (id_owner_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9514AA5C FOREIGN KEY (id_post_id) REFERENCES blog (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB3750AF4 FOREIGN KEY (parent_id_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F47DD7E7 FOREIGN KEY (id_blog_id) REFERENCES blog (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B379F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE `like` ADD CONSTRAINT FK_AC6340B39514AA5C FOREIGN KEY (id_post_id) REFERENCES blog (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9514AA5C');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F47DD7E7');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B39514AA5C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CB3750AF4');
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C01551439CE5D6FC');
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C01551432EE78D6C');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C79F37AE5');
        $this->addSql('ALTER TABLE `like` DROP FOREIGN KEY FK_AC6340B379F37AE5');
        $this->addSql('DROP TABLE blog');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE `like`');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE `user`');
    }
}
