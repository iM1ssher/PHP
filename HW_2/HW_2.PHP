<html>
<head>
    <meta charset="UTF-8">
    <title>野人暑期夏令營報名表</title>
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
    <h1>野人暑期夏令營報名表</h1>
    <form action="thank_you.php" method="post">
        <p class="section-title">四天營隊日程表摘要</p>
        <table border="2" ">
            <tr>
               <th>時間</th><th>Day 1</th><th>Day 2</th><th>Day 3</th><th>Day 4</th></tr>
            </tr>
            <tr>
                <td>7:00-8:00</td>
                <td colspan="4" style="text-align: center; background-color: lightpink;">早餐時間!</td>
            </tr>
            <tr>
                <td>8:00-9:00</td>
                <td>集合報到、分隊認識</td>
                <td>早晨晨跑 & 呼吸森林新鮮空氣</td>
                <td>營地晨光瑜伽 & 自然觀察</td>
                <td>營地整理</td>
            </tr>
            <tr>
                <td>9:00-10:00</td>
                <td>搭乘專車前往台東野外營地</td>
                <td>繩索挑戰課程</td>
                <td>當地部落文化體驗（可選手作、編織和農作）</td>
                <td>營地清潔 & 帳篷拆除</td>
            </tr>
            <tr>
                <td>10:00-11:00</td>
                <td>前往台東野外營地</td>
                <td>小型攀岩體驗</td>
                <td>自然藝術創作（可選葉拓、石頭彩繪、自然素材DIY）</td>  
                <td>營地清潔 & 帳篷拆除</td>
            </tr>
            <tr>    
                <td>11:00-12:00</td>
                <td>營地定向探索 & 帳篷搭建</td>
                <td>溯溪探險</td>
                <td>自然藝術創作（可選葉拓、石頭彩繪、自然素材DIY）</td>
                <td>結業證書頒發 & 拍團體照</td>
            </tr>
            <tr>
                <td>12:00-13:00</td>
                <td colspan="4" style="text-align:center; background-color: lightpink;">午餐時間</td></tr>
            </tr>
            <tr>
                <td>13:00-14:00</td>  
                <td>團隊破冰遊戲 & 安全教育</td>
                <td>水上生態體驗</td>
                <td>小隊競賽：生態任務尋寶</td>
                <td>回程車上分享 & 回顧活動</td>
            </tr>
            <tr>
                <td>14:00-15:00</td> 
                <td>小溪生態觀察</td> 
                <td>團隊定向越野遊戲</td>
                <td>小隊競賽：生態任務尋寶</td>
                <td>回程車上分享 & 回顧活動</td>
            </tr>
            <tr>    
                <td>15:00-16:00</td> 
                <td>森林探索</td> 
                <td>團隊定向越野遊戲</td>
                <td>小隊競賽：生態任務尋寶</td>
                 <td>抵達集合地</td>

            </tr>
            <tr>    
                <td>16:00-17:00</td>  
                <td>自由活動</td>
                <td>野外生存技能教學 生火</td>
                <td>營火表演</td>

            </tr>
            <tr>    
                <td>17:00-18:00</td>
                <td colspan="3" style="text-align: center; background-color: lightpink;">晚餐時間!</td>  
            </tr>
            <tr>    
                <td>18:00-19:00</td>
                <td>自由活動</td>
                <td>野外生存技能教學 帳篷收納</td>
                <td>篝火音樂晚會</td>
            </tr>
            <tr>
                <td>19:00-20:00</td>
                <td>自由活動</td>
                <td>夜間探險 </td>
                <td>篝火音樂晚會</td>
            </tr>   
            <tr>
                <td>20:00-21:00</td>
                <td>星空故事會 & 天文觀測</td>
                <td>星空攝影</td>
                <td>歌唱 & 故事分享</td>
            </tr>
            <tr>
                <td>21:00-22:00</td>
                <td colspan="3" style="text-align: center; background-color: lightpink;">就寢準備</td>  
            </tr>

        </table><br><br>

        <table border="2" ">
            <tr>
                <td><label for="name">姓名:</label></td>
                <td><input type="text" id="name" name="name" required></td>
                <td><label for="id">身分證字號:</label><input type="text" id="id" name="id" required></td>
                <td><label for="age">年級:</label>
                    <select id="age" name="age">
                        <option value="大一">大一</option>
                        <option value="大二">大二</option>
                        <option value="大三">大三</option>
                        <option value="大四">大四</option>
                    </select>
                </td>
            </tr>
        
            <tr>
                <td><label for="birthday">出生年月日:</label></td>
                <td><input type="date" id="birthday" name="birthday" required></td>
                <td><label for="phone">電話:</label><input type="tel" id="phone" name="phone" required></td>
                <td><label for="email">Email:</label><input type="email" id="email" name="email" required></td>
               
            </tr>
    
            <tr>
                <td><label for="name">性別:</label></td>
                <td >
                    <input type="radio" id="male" name="gender" value="男" required>
                    <label for="male">男</label>
                    <input type="radio" id="female" name="gender" value="女" required>
                    <label for="female">女</label></td>
                <td><label for="emergency_name">緊急聯絡人:</label><input type="text" id="emergency_name" name="emergency_name" required></td>
                <td><label for="emergency_phone">緊急聯絡人電話:</label><input type="tel" id="emergency_phone" name="emergency_phone" required></td>
            </tr>
        </table>

        <p>欲報名梯次:</p>  
        <div style="text-align: center;">
            <input type="radio" id="first" name="tired" value="第一梯次" required>
            <label for="first">第一梯次</label> 
            <input type="radio" id="second" name="tired" value="第二梯次" required>
            <label for="second">第二梯次</label>   
            <input type="radio" id="third" name="tired" value="第三梯次" required>
            <label for="third">第三梯次</label> 
            <input type="radio" id="forth" name="tired" value="第四梯次" required>
            <label for="forth">第四梯次</label> 
            <input type="radio" id="fifth" name="tired" value="第五梯次" required>
            <label for="fifth">第五梯次</label> 
            <input type="radio" id="sixth" name="tired" value="第六梯次" required>
            <label for="sixth">第六梯次</label>
        </div><br><br>

        <p>用餐習慣:</p>
            <div style="text-align: center;">
            <input type="checkbox" id="meat" name="food[]" value="葷">
            <label for="meat">葷</label>
            <input type="checkbox" id="vegetarian" name="food[]" value="素">
            <label for="vegetarian">素</label>
        </div><br><br>

        <label for="pay">繳費方式:</label>
        <select id="pay" name="pay">
            <option value="visa">信用卡</option>
            <option value="ibon">超商繳費(ibon)</option>
            <option value="atm">ATM轉帳繳費</option>
        </select><br><br>

        <label for="comment">對於活動的意見:</label><br>
        <textarea id="comment" name="comment" rows="5" cols="50"></textarea><br><br>

        <p style="background-color: lightyellow;">
            活動注意事項!<br>
            1.報名後如因故無法參加，請於活動前 14 天通知，可全額退費。<br>
            2.活動前 7-13 天取消者退費 50%；活動前 3 天內取消恕不退費。<br>
        </p>
        <div style="text-align: center;">
            <input type="submit" value="提交報名表" style="font-size: 20px; padding: 10px 20px;">
        </div>
    </form>
</body>
</html>
