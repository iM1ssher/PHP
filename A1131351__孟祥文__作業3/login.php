<?php
require_once __DIR__ . '/common.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('index.php');
}

$userId = trim($_POST['user_id'] ?? '');
$password = $_POST['password'] ?? '';

if ($userId === '' || $password === '') {
    setFlash('請輸入使用者 ID 與密碼。');
    redirect('index.php');
}

$account = USERS[$userId] ?? null;

if (!$account || $account['password'] !== $password) {
    setFlash('登入失敗，請確認帳號與密碼。');
    redirect('index.php');
}

$_SESSION['user'] = [
    'id' => $userId,
    'name' => $account['name'],
    'role' => $account['role'],
    'label' => $account['label'],
];

setcookie('user_id', $userId, time() + 86400 * 7, '/');
setFlash("歡迎 {$account['label']} {$account['name']} 登入。");

redirect('home.php');

