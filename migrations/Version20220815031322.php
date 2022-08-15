<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220815031322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, admin_username VARCHAR(255) NOT NULL, admin_password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_management (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_management_class_student (class_management_id INT NOT NULL, class_student_id INT NOT NULL, INDEX IDX_C53012F32126B34 (class_management_id), INDEX IDX_C53012F37D99BDB8 (class_student_id), PRIMARY KEY(class_management_id, class_student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_management_subject (class_management_id INT NOT NULL, subject_id INT NOT NULL, INDEX IDX_B8D929BB2126B34 (class_management_id), INDEX IDX_B8D929BB23EDC87 (subject_id), PRIMARY KEY(class_management_id, subject_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_management_teacher (class_management_id INT NOT NULL, teacher_id INT NOT NULL, INDEX IDX_F3E1B1142126B34 (class_management_id), INDEX IDX_F3E1B11441807E1D (teacher_id), PRIMARY KEY(class_management_id, teacher_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_student (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_student_classroom (class_student_id INT NOT NULL, classroom_id INT NOT NULL, INDEX IDX_66F45EBF7D99BDB8 (class_student_id), INDEX IDX_66F45EBF6278D5A8 (classroom_id), PRIMARY KEY(class_student_id, classroom_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE class_student_student (class_student_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_C6DA927C7D99BDB8 (class_student_id), INDEX IDX_C6DA927CCB944F1A (student_id), PRIMARY KEY(class_student_id, student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classroom (id INT AUTO_INCREMENT NOT NULL, class_name VARCHAR(255) NOT NULL, class_description LONGTEXT NOT NULL, class_quantity INT NOT NULL, class_id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, stu_name VARCHAR(255) NOT NULL, stu_user VARCHAR(255) NOT NULL, stu_password VARCHAR(255) NOT NULL, stu_image VARCHAR(255) NOT NULL, stu_age INT NOT NULL, stu_gender VARCHAR(255) NOT NULL, stu_id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subject (id INT AUTO_INCREMENT NOT NULL, subject_name VARCHAR(255) NOT NULL, subject_description LONGTEXT NOT NULL, subject_code VARCHAR(255) NOT NULL, subject_id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, teacher_name VARCHAR(255) NOT NULL, teacher_user VARCHAR(255) NOT NULL, teacher_password VARCHAR(255) NOT NULL, teacher_age INT NOT NULL, teacher_gender VARCHAR(255) NOT NULL, teacher_image VARCHAR(255) NOT NULL, teacher_id VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE class_management_class_student ADD CONSTRAINT FK_C53012F32126B34 FOREIGN KEY (class_management_id) REFERENCES class_management (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_management_class_student ADD CONSTRAINT FK_C53012F37D99BDB8 FOREIGN KEY (class_student_id) REFERENCES class_student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_management_subject ADD CONSTRAINT FK_B8D929BB2126B34 FOREIGN KEY (class_management_id) REFERENCES class_management (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_management_subject ADD CONSTRAINT FK_B8D929BB23EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_management_teacher ADD CONSTRAINT FK_F3E1B1142126B34 FOREIGN KEY (class_management_id) REFERENCES class_management (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_management_teacher ADD CONSTRAINT FK_F3E1B11441807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_student_classroom ADD CONSTRAINT FK_66F45EBF7D99BDB8 FOREIGN KEY (class_student_id) REFERENCES class_student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_student_classroom ADD CONSTRAINT FK_66F45EBF6278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_student_student ADD CONSTRAINT FK_C6DA927C7D99BDB8 FOREIGN KEY (class_student_id) REFERENCES class_student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE class_student_student ADD CONSTRAINT FK_C6DA927CCB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE class_management_class_student DROP FOREIGN KEY FK_C53012F32126B34');
        $this->addSql('ALTER TABLE class_management_class_student DROP FOREIGN KEY FK_C53012F37D99BDB8');
        $this->addSql('ALTER TABLE class_management_subject DROP FOREIGN KEY FK_B8D929BB2126B34');
        $this->addSql('ALTER TABLE class_management_subject DROP FOREIGN KEY FK_B8D929BB23EDC87');
        $this->addSql('ALTER TABLE class_management_teacher DROP FOREIGN KEY FK_F3E1B1142126B34');
        $this->addSql('ALTER TABLE class_management_teacher DROP FOREIGN KEY FK_F3E1B11441807E1D');
        $this->addSql('ALTER TABLE class_student_classroom DROP FOREIGN KEY FK_66F45EBF7D99BDB8');
        $this->addSql('ALTER TABLE class_student_classroom DROP FOREIGN KEY FK_66F45EBF6278D5A8');
        $this->addSql('ALTER TABLE class_student_student DROP FOREIGN KEY FK_C6DA927C7D99BDB8');
        $this->addSql('ALTER TABLE class_student_student DROP FOREIGN KEY FK_C6DA927CCB944F1A');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE class_management');
        $this->addSql('DROP TABLE class_management_class_student');
        $this->addSql('DROP TABLE class_management_subject');
        $this->addSql('DROP TABLE class_management_teacher');
        $this->addSql('DROP TABLE class_student');
        $this->addSql('DROP TABLE class_student_classroom');
        $this->addSql('DROP TABLE class_student_student');
        $this->addSql('DROP TABLE classroom');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE teacher');
    }
}
