<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <title>مدير المهام</title>
    </head>
    <body>
        <div class="container">
            <h1 class="header">مهماتي</h1>
            <ul class="tasks">
                <li>
                    <span class="task">وصف مهمة</span>
                    <a href="#" class="don-button">تم الإنجاز</a>
                    <p class="date">آخر تاريخ لإنجاز المهمة</p>
                </li>
            </ul>
            <form action="./app/add.php" method="POST" class="task-add">
                <input type="text" placeholder="أدخل وصف مهمة جديدة" class="input" name="task-name">
                <input type="text" placeholder="أدخل آخر تاريخ لإنجاز المهمة مثال : 1-1-2017" class="input" name="due-date">
                <input type="submit" value="أضف" class="submit">
            </form>
        </div>
    </body>
</html>