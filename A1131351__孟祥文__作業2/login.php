<html>
<head>
    <meta charset="UTF-8">
    <title>登入頁面</title>

    <style>
        body {
            margin: 0;
            height: 100vh;

          
            display: flex;
            justify-content: center;  
            align-items: center;      

            background-color: #f0f8ff;
        }

        .login-box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px gray;
            text-align: center;
        }

        input {
            margin: 5px;
            padding: 5px;
        }
    </style>
</head>

<body>

<div class="login-box">
    <h2>請登入</h2>

    <form method="post" action="login.php">
        帳號：<br>
        <input type="text" name="username"><br>

        密碼：<br>
        <input type="password" name="password"><br><br>

        <input type="submit" value="登入">
    </form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST["username"];
    $pass = $_POST["password"];

    if($user == "qwe" && $pass == "qwe"){
        header("Location: HW_2.php");
        exit();
    }else{
        echo "<p style='color:red;'>登入失敗！</p>";
    }
}
?>
</div>

</body>
</html>