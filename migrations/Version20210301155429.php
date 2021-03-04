<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210301155429 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles (id INT NOT NULL, categories_url VARCHAR(50) NOT NULL, title VARCHAR(200) NOT NULL, text MEDIUMTEXT NOT NULL, create_date DATE NOT NULL, INDEX fk_articles_categories1_idx (categories_url), PRIMARY KEY(id, categories_url)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_images (id INT AUTO_INCREMENT NOT NULL, articles_categories_url VARCHAR(50) DEFAULT NULL, articles_id INT DEFAULT NULL, title VARCHAR(200) NOT NULL, alt VARCHAR(200) DEFAULT NULL, INDEX fk_articles_images_articles1_idx (articles_id, articles_categories_url), INDEX IDX_5A276A4745A4DCA21EBAF6CC (articles_categories_url, articles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_music (id INT AUTO_INCREMENT NOT NULL, articles_categories_url VARCHAR(50) DEFAULT NULL, articles_id INT DEFAULT NULL, artist_name VARCHAR(200) NOT NULL, play_time TIME NOT NULL, INDEX fk_articles_music_articles1_idx (articles_id, articles_categories_url), INDEX IDX_25B00ABE45A4DCA21EBAF6CC (articles_categories_url, articles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE articles_videos (id INT AUTO_INCREMENT NOT NULL, articles_categories_url VARCHAR(50) DEFAULT NULL, articles_id INT DEFAULT NULL, title VARCHAR(200) NOT NULL, alt VARCHAR(200) DEFAULT NULL, main TINYTEXT NOT NULL, INDEX fk_articles_videos_articles1_idx (articles_id, articles_categories_url), INDEX IDX_9392B01F45A4DCA21EBAF6CC (articles_categories_url, articles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (url VARCHAR(50) NOT NULL, name VARCHAR(50) NOT NULL, description MEDIUMTEXT NOT NULL, UNIQUE INDEX name_UNIQUE (name), PRIMARY KEY(url)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, articles_categories_url VARCHAR(50) DEFAULT NULL, articles_id INT DEFAULT NULL, comments_id INT DEFAULT NULL, users_id1 INT DEFAULT NULL, text MEDIUMTEXT NOT NULL, added DATETIME NOT NULL, users_id VARCHAR(200) DEFAULT NULL, users_login VARCHAR(200) DEFAULT NULL, parent_id INT DEFAULT NULL, INDEX fk_comments_articles1_idx (articles_id, articles_categories_url), INDEX fk_comments_comments1_idx (comments_id), INDEX fk_comments_users1_idx (users_id1), INDEX IDX_5F9E962A45A4DCA21EBAF6CC (articles_categories_url, articles_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_avatars (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(300) NOT NULL, alt VARCHAR(300) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, user_avatars_id INT DEFAULT NULL, email VARCHAR(200) NOT NULL, password VARCHAR(200) NOT NULL, name VARCHAR(200) NOT NULL, login VARCHAR(200) NOT NULL, birthdate DATE NOT NULL, about TINYTEXT NOT NULL, INDEX fk_users_user_avatars1_idx (user_avatars_id), UNIQUE INDEX email_UNIQUE (email), UNIQUE INDEX login_UNIQUE (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168CA051906 FOREIGN KEY (categories_url) REFERENCES categories (url)');
        $this->addSql('ALTER TABLE articles_images ADD CONSTRAINT FK_5A276A4745A4DCA21EBAF6CC FOREIGN KEY (articles_categories_url, articles_id) REFERENCES articles (categories_url, id)');
        $this->addSql('ALTER TABLE articles_music ADD CONSTRAINT FK_25B00ABE45A4DCA21EBAF6CC FOREIGN KEY (articles_categories_url, articles_id) REFERENCES articles (categories_url, id)');
        $this->addSql('ALTER TABLE articles_videos ADD CONSTRAINT FK_9392B01F45A4DCA21EBAF6CC FOREIGN KEY (articles_categories_url, articles_id) REFERENCES articles (categories_url, id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A45A4DCA21EBAF6CC FOREIGN KEY (articles_categories_url, articles_id) REFERENCES articles (categories_url, id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A63379586 FOREIGN KEY (comments_id) REFERENCES comments (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962ADBD31012 FOREIGN KEY (users_id1) REFERENCES users (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E95D275396 FOREIGN KEY (user_avatars_id) REFERENCES user_avatars (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles_images DROP FOREIGN KEY FK_5A276A4745A4DCA21EBAF6CC');
        $this->addSql('ALTER TABLE articles_music DROP FOREIGN KEY FK_25B00ABE45A4DCA21EBAF6CC');
        $this->addSql('ALTER TABLE articles_videos DROP FOREIGN KEY FK_9392B01F45A4DCA21EBAF6CC');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A45A4DCA21EBAF6CC');
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168CA051906');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A63379586');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E95D275396');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962ADBD31012');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE articles');
        $this->addSql('DROP TABLE articles_images');
        $this->addSql('DROP TABLE articles_music');
        $this->addSql('DROP TABLE articles_videos');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_avatars');
        $this->addSql('DROP TABLE users');
    }
}
