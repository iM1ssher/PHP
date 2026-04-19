<?php
$name = isset($_POST['name']) ? $_POST['name'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$emergency_name = isset($_POST['emergency_name']) ? $_POST['emergency_name'] : '';
$emergency_phone = isset($_POST['emergency_phone']) ? $_POST['emergency_phone'] : '';
$tired = isset($_POST['tired']) ? $_POST['tired'] : '';
$pay = isset($_POST['pay']) ? $_POST['pay'] : '';
$food = isset($_POST['food']) ? $_POST['food'] : [];
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>感謝您的報名！</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f8ff; }
        h1 { text-align: center; color: green; }
        table { margin: 20px auto; border-collapse: collapse; width: 90%; background-color: #fff; }
        td, th { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background-color: #add8e6; }
        p { text-align: center; font-size: 16px; }
        .section-title { text-align: center; color: #333; margin-top: 30px; font-size: 20px; }
    </style>
</head>
<body>
    <h1>感謝您的報名！</h1>
    <p>以下是您填寫的報名資料：</p>

    <table>
        <tr><th>欄位</th><th>內容</th></tr>
        <tr><td>姓名</td><td><?php echo htmlspecialchars($name); ?></td></tr>
        <tr><td>身分證字號</td><td><?php echo htmlspecialchars($id); ?></td></tr>
        <tr><td>出生年月日</td><td><?php echo htmlspecialchars($birthday); ?></td></tr>
        <tr><td>年級</td><td><?php echo htmlspecialchars($age); ?></td></tr>
        <tr><td>電話</td><td><?php echo htmlspecialchars($phone); ?></td></tr>
        <tr><td>Email</td><td><?php echo htmlspecialchars($email); ?></td></tr>
        <tr><td>性別</td><td><?php echo htmlspecialchars($gender); ?></td></tr>
        <tr><td>緊急聯絡人</td><td><?php echo htmlspecialchars($emergency_name); ?></td></tr>
        <tr><td>緊急聯絡人電話</td><td><?php echo htmlspecialchars($emergency_phone); ?></td></tr>
        <tr><td>欲報名梯次</td><td><?php echo htmlspecialchars($tired); ?></td></tr>
        <tr><td>繳費方式</td><td><?php echo htmlspecialchars($pay); ?></td></tr>
        <tr><td>用餐習慣</td><td>
            <?php 
            if(!empty($food)){
                echo htmlspecialchars(implode('、', $food));
            } else {
                echo '未選擇';
            }
            ?>
        </td></tr>
        <tr><td>對活動的意見</td><td><?php echo nl2br(htmlspecialchars($comment)); ?></td></tr>
    </table>

    <p class="section-title">四天營隊日程表摘要</p>
    <table>
        <tr><th>時間</th><th>Day 1</th><th>Day 2</th><th>Day 3</th><th>Day 4</th></tr>
        <tr><td>7:00-8:00</td><td colspan="4" style="text-align:center; background-color: lightpink;">早餐時間</td></tr>
        <tr><td>8:00-9:00</td>
            <td>集合報到、分隊認識</td>
            <td>晨跑 & 呼吸森林新鮮空氣</td>
            <td>晨光瑜伽 & 自然觀察</td>
            <td>營地整理</td>
        </tr>
        <tr><td>9:00-10:00</td>
            <td>前往營地</td>
            <td>繩索挑戰課程</td>
            <td>部落文化體驗</td>
            <td>營地清潔 & 帳篷拆除</td>
        </tr>
        <tr><td>10:00-11:00</td>
            <td>搭乘專車到營地</td>
            <td>小型攀岩體驗</td>
            <td>自然藝術創作</td>
            <td>營地清潔 & 帳篷拆除</td>
        </tr>
        <tr><td>11:00-12:00</td>
            <td>營地探索 & 帳篷搭建</td>
            <td>溯溪探險</td>
            <td>自然藝術創作</td>
            <td>結業證書 & 拍團體照</td>
        </tr>
        <tr><td>12:00-13:00</td><td colspan="4" style="text-align:center; background-color: lightpink;">午餐時間</td></tr>
        <tr><td>13:00-16:00</td>
            <td>團隊破冰 & 小溪生態觀察</td>
            <td>水上生態 & 團隊越野</td>
            <td>生態任務尋寶 & 創意活動</td>
            <td>回程 & 回顧分享</td>
        </tr>
        <tr><td>16:00-18:00</td>
            <td>自由活動</td>
            <td>野外生存技能</td>
            <td>營火表演 & 篝火晚會</td>
            <td>抵達集合地</td>
        </tr>
        <tr><td>18:00-21:00</td>
            <td>晚餐 & 星空故事會</td>
            <td>晚餐 & 星空攝影</td>
            <td>晚餐 & 篝火音樂晚會</td>
            <td>晚餐 & 回家</td>
        </tr>
        <tr><td>21:00-22:00</td>
            <td colspan="4" style="text-align:center; background-color: lightpink;">就寢準備</td>
        </tr>
    </table>

    <p style="margin-top:30px; text-align:center; font-size:16px;">
        我們將會盡快與您聯絡，期待在野人暑期夏令營見到您！
    </p>
</body>
</html>