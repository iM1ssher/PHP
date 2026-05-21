<?php
declare(strict_types=1);

const DB_HOST = 'localhost';
const DB_NAME = 'spam_mail_homework';
const DB_USER = 'root';
const DB_PASS = '';
const DB_CHARSET = 'utf8mb4';

const MAIL_FROM_EMAIL = 'jasonmeng0912@gmail.com';
const MAIL_FROM_NAME = 'Homework Mail System';
const SMTP_HOST = 'smtp.gmail.com';
const SMTP_PORT = 587;
const SMTP_USERNAME = 'jasonmeng0912@gmail.com';
const SMTP_PASSWORD = 'humijikxdcxbrspc';
const SMTP_SECURE = 'tls';

function get_pdo(): PDO
{
    static $pdo = null;

    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $serverDsn = 'mysql:host=' . DB_HOST . ';charset=' . DB_CHARSET;
    $serverPdo = new PDO($serverDsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    $serverPdo->exec(
        'CREATE DATABASE IF NOT EXISTS `' . DB_NAME . '` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci'
    );
    $serverPdo->exec('USE `' . DB_NAME . '`');
    $serverPdo->exec(
        'CREATE TABLE IF NOT EXISTS email_list (
            no INT UNSIGNED NOT NULL AUTO_INCREMENT,
            email VARCHAR(255) NOT NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (no),
            UNIQUE KEY unique_email (email)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci'
    );

    $pdo = $serverPdo;
    return $pdo;
}

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
