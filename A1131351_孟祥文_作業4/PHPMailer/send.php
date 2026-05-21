<?php
declare(strict_types=1);

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/src/Exception.php';
require_once __DIR__ . '/src/PHPMailer.php';
require_once __DIR__ . '/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

function send_email(string $to, string $subject, string $body): bool
{
    $mail = new PHPMailer(true);

    try {
        $mail->CharSet = 'UTF-8';

        if (SMTP_HOST !== '') {
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->Port = SMTP_PORT;
            $mail->SMTPAuth = SMTP_USERNAME !== '';
            $mail->Username = SMTP_USERNAME;
            $mail->Password = SMTP_PASSWORD;

            if (SMTP_SECURE !== '') {
                $mail->SMTPSecure = SMTP_SECURE;
            }
        } else {
            $mail->isMail();
        }

        $mail->setFrom(MAIL_FROM_EMAIL, MAIL_FROM_NAME);
        $mail->addAddress($to);
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $body;
        return $mail->send();
    } catch (Throwable $e) {
        return false;
    }
}

function print_progress(int $percent, string $line): void
{
    echo '<script>';
    echo 'document.getElementById("percent").textContent = "' . $percent . '%";';
    echo 'document.getElementById("bar").style.width = "' . $percent . '%";';
    echo 'document.getElementById("log").insertAdjacentHTML("beforeend", "<div>' . h($line) . '</div>");';
    echo '</script>';
    echo str_repeat(' ', 4096);
    flush();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$subject = trim((string)($_POST['subject'] ?? ''));
$body = trim((string)($_POST['body'] ?? ''));
$sendMode = (string)($_POST['send_mode'] ?? 'all');
$randomCount = max(1, (int)($_POST['random_count'] ?? 1));
$intervalSeconds = max(0, min(60, (int)($_POST['interval_seconds'] ?? 0)));

if ($subject === '' || $body === '') {
    exit('郵件標題與內容不可空白');
}

$pdo = get_pdo();

if ($sendMode === 'random') {
    $stmt = $pdo->prepare('SELECT no, email FROM email_list ORDER BY RAND() LIMIT :limit_count');
    $stmt->bindValue(':limit_count', $randomCount, PDO::PARAM_INT);
    $stmt->execute();
    $emails = $stmt->fetchAll();
} else {
    $emails = $pdo->query('SELECT no, email FROM email_list ORDER BY no ASC')->fetchAll();
}

$total = count($emails);
?>
<!doctype html>
<html lang="zh-Hant">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>寄送進度</title>
    <style>
        body {
            font-family: Arial, "Microsoft JhengHei", sans-serif;
            max-width: 760px;
            margin: 32px auto;
            padding: 0 16px;
            color: #222;
            background: #f6f6f6;
        }
        .box {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 18px;
        }
        .progress {
            width: 100%;
            height: 24px;
            background: #e5e5e5;
            border-radius: 4px;
            overflow: hidden;
            margin: 12px 0;
        }
        #bar {
            width: 0;
            height: 100%;
            background: #2563eb;
            transition: width .2s;
        }
        #percent {
            font-size: 28px;
            font-weight: bold;
        }
        #log {
            margin-top: 16px;
            line-height: 1.8;
        }
        a {
            display: inline-block;
            margin-top: 18px;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>寄送進度</h1>
        <div id="percent">0%</div>
        <div class="progress"><div id="bar"></div></div>
        <div id="log"></div>
        <a href="index.php">回首頁</a>
    </div>
<?php
if ($total === 0) {
    print_progress(100, '沒有 email 可以寄送');
} else {
    $sent = 0;
    foreach ($emails as $row) {
        $ok = send_email($row['email'], $subject, $body);
        $sent++;
        $percent = (int)round(($sent / $total) * 100);
        $status = $ok ? '成功' : '失敗';
        print_progress($percent, 'No.' . $row['no'] . ' ' . $row['email'] . '：' . $status);

        if ($intervalSeconds > 0 && $sent < $total) {
            sleep($intervalSeconds);
        }
    }
}
?>
</body>
</html>
