<?php
require_once __DIR__ . '/common.php';

$user = currentUser();
if ($user) {
    redirect('home.php');
}

$flash = getFlash();
$savedCookieId = cookieUserId();
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>角色登入系統</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="page-shell">
        <div class="card hero-card">
            <div>
                
                <h1>學生、教師與管理者網站</h1>
               
            </div>

            <div class="role-grid">
                <div class="role-item">
                    <h2>學生</h2>
                    <p>帳號：student01</p>
                    <p>密碼：1234</p>
                </div>
                <div class="role-item">
                    <h2>教師</h2>
                    <p>帳號：teacher01</p>
                    <p>密碼：1234</p>
                </div>
                <div class="role-item">
                    <h2>管理者</h2>
                    <p>帳號：admin01</p>
                    <p>密碼：1234</p>
                </div>
            </div>
        </div>

        <div class="card login-card">
            <h2>登入</h2>

            <?php if ($flash): ?>
                <div class="alert"><?= htmlspecialchars($flash, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>

            <form action="login.php" method="post" class="login-form">
                <label for="user_id">使用者 ID</label>
                <input
                    type="text"
                    name="user_id"
                    id="user_id"
                    placeholder="例如 student01"
                    value="<?= htmlspecialchars($savedCookieId ?? '', ENT_QUOTES, 'UTF-8') ?>"
                    required
                >

                <label for="password">密碼</label>
                <input type="password" name="password" id="password" placeholder="請輸入密碼" required>

                <button type="submit">登入網站</button>
            </form>

            <div class="cookie-box">
                <p>目前 Cookie 儲存的使用者 ID：
                    <strong><?= htmlspecialchars($savedCookieId ?? '尚未儲存', ENT_QUOTES, 'UTF-8') ?></strong>
                </p>
                <div class="action-row">
                    <a class="secondary-btn" href="delete_cookie.php">刪除 Cookie</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

