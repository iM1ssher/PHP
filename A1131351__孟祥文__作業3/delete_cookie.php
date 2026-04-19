<?php
require_once __DIR__ . '/common.php';

setcookie('user_id', '', time() - 3600, '/');
setFlash('使用者 ID Cookie 已刪除。');

$user = currentUser();
redirect($user ? roleHome($user['role']) : 'index.php');

