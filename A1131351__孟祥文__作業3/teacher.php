<?php
require_once __DIR__ . '/common.php';
$user = requireLogin('teacher');
$flash = getFlash();
$cookieId = cookieUserId();
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>教師頁面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard teacher-theme">
        <div class="card">
            <p class="eyebrow">教師專區</p>
            <h1>歡迎，<?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></h1>

            <?php if ($flash): ?>
                <div class="alert"><?= htmlspecialchars($flash, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>

            <p>這個頁面只有教師能進入，網站會利用 session 檢查角色後才放行。</p>
            <div class="info-grid">
                <div class="info-box">
                    <span>角色</span>
                    <strong><?= htmlspecialchars($user['label'], ENT_QUOTES, 'UTF-8') ?></strong>
                </div>
                <div class="info-box">
                    <span>Session 使用者 ID</span>
                    <strong><?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?></strong>
                </div>
                <div class="info-box">
                    <span>Cookie 使用者 ID</span>
                    <strong><?= htmlspecialchars($cookieId ?? '尚未儲存', ENT_QUOTES, 'UTF-8') ?></strong>
                </div>
            </div>

            <ul class="feature-list">
                <li>查看授課班級</li>
                <li>管理成績與作業公告</li>
                <li>示範角色權限與 cookie 顯示</li>
            </ul>

            <div class="action-row">
                <a href="delete_cookie.php">刪除 Cookie</a>
                <a href="logout.php" class="secondary-btn">登出</a>
            </div>
        </div>
    </div>
</body>
</html>

