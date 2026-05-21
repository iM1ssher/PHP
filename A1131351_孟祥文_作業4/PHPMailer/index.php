<?php
declare(strict_types=1);

require_once __DIR__ . '/db.php';

$pdo = get_pdo();
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim((string)($_POST['email'] ?? ''));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = '請輸入正確的 email 位址';
    } else {
        try {
            $stmt = $pdo->prepare('INSERT INTO email_list (email) VALUES (:email)');
            $stmt->execute(['email' => $email]);
            $message = 'email 已加入資料庫';
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                $error = '這個 email 已經存在';
            } else {
                throw $e;
            }
        }
    }
}

$emails = $pdo->query('SELECT no, email FROM email_list ORDER BY no ASC')->fetchAll();
$emailCount = count($emails);
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>垃圾郵件寄送系統</title>
    <style>
        body {
            font-family: Arial, "Microsoft JhengHei", sans-serif;
            max-width: 920px;
            margin: 32px auto;
            padding: 0 16px;
            color: #222;
            background: #f6f6f6;
        }
        h1, h2 {
            margin: 0 0 16px;
        }
        section {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 18px;
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin: 12px 0 6px;
            font-weight: bold;
        }
        input, textarea, select, button {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }
        textarea {
            min-height: 130px;
            resize: vertical;
        }
        button {
            margin-top: 14px;
            cursor: pointer;
            background: #2563eb;
            color: #fff;
            border: 0;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #eee;
        }
        .notice {
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 12px;
        }
        .success {
            background: #e8f7ee;
            color: #146c2e;
        }
        .error {
            background: #fdeaea;
            color: #a32020;
        }
        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        @media (max-width: 640px) {
            .row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <h1>垃圾郵件寄送系統</h1>

    <section>
        <h2>新增 email</h2>
        <?php if ($message !== ''): ?>
            <div class="notice success"><?= h($message) ?></div>
        <?php endif; ?>
        <?php if ($error !== ''): ?>
            <div class="notice error"><?= h($error) ?></div>
        <?php endif; ?>
        <form method="post" action="index.php">
            <label for="email">email 位址</label>
            <input id="email" name="email" type="email" required>
            <button type="submit">加入資料庫</button>
        </form>
    </section>

    <section>
        <h2>資料庫（No.、email）</h2>
        <p>目前共有 <?= $emailCount ?> 筆 email。</p>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($emailCount === 0): ?>
                    <tr>
                        <td colspan="2">尚無資料</td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($emails as $row): ?>
                    <tr>
                        <td><?= h((string)$row['no']) ?></td>
                        <td><?= h($row['email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section>
        <h2>寄信</h2>
        <form method="post" action="send.php">
            <label for="subject">郵件標題</label>
            <input id="subject" name="subject" type="text" required>

            <label for="body">郵件內容</label>
            <textarea id="body" name="body" required></textarea>

            <div class="row">
                <div>
                    <label for="send_mode">寄送方式</label>
                    <select id="send_mode" name="send_mode">
                        <option value="all">全部寄送</option>
                        <option value="random">隨機寄送</option>
                    </select>
                </div>
                <div>
                    <label for="random_count">隨機寄送筆數</label>
                    <input id="random_count" name="random_count" type="number" min="1" value="1">
                </div>
            </div>

            <label for="interval_seconds">寄送間隔秒數</label>
            <input id="interval_seconds" name="interval_seconds" type="number" min="0" max="60" value="0" required>

            <button type="submit">開始寄送</button>
        </form>
    </section>
</body>
</html>
