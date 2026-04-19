<?php
session_start();

const USERS = [
    'student01' => [
        'password' => '1234',
        'role' => 'student',
        'name' => '孟祥文',
        'label' => '學生',
    ],
    'teacher01' => [
        'password' => '1234',
        'role' => 'teacher',
        'name' => 'X老師',
        'label' => '教師',
    ],
    'admin01' => [
        'password' => '1234',
        'role' => 'admin',
        'name' => '系統管理員',
        'label' => '管理者',
    ],
];

function redirect(string $path): void
{
    header("Location: {$path}");
    exit;
}

function currentUser(): ?array
{
    return $_SESSION['user'] ?? null;
}

function requireLogin(?string $role = null): array
{
    $user = currentUser();

    if (!$user) {
        $_SESSION['flash'] = '請先登入後再使用網站功能。';
        redirect('index.php');
    }

    if ($role !== null && $user['role'] !== $role) {
        $_SESSION['flash'] = '您沒有權限瀏覽該頁面。';
        redirect('home.php');
    }

    return $user;
}

function setFlash(string $message): void
{
    $_SESSION['flash'] = $message;
}

function getFlash(): ?string
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }

    $message = $_SESSION['flash'];
    unset($_SESSION['flash']);

    return $message;
}

function cookieUserId(): ?string
{
    return $_COOKIE['user_id'] ?? null;
}

function roleHome(string $role): string
{
    return match ($role) {
        'student' => 'student.php',
        'teacher' => 'teacher.php',
        'admin' => 'admin.php',
        default => 'index.php',
    };
}

