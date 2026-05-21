CREATE DATABASE IF NOT EXISTS spam_mail_homework
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE spam_mail_homework;

CREATE TABLE IF NOT EXISTS email_list (
    no INT UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (no),
    UNIQUE KEY unique_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
