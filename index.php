<?php
require "app/config.php";
$user_id = $_SESSION['user_id'];
$result = $connection->query("SELECT id, description, done, due_date FROM tasks WHERE user_id = $user_id");
$tasks = $result->num_rows > 0 ? $result : [];
?>
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
            <?php if(empty($tasks)):?>
            <p>لم تقم بإضافة مهام جديدة</p>
            <?php else:?>
            <ul class="tasks">
            <?php foreach($tasks as $task):?>
                <li>
                    <span class="task <?php echo $task['done'] ? 'done' : '' ?>"> <?php echo $task['description'] ?></span>
                    <?php if($task['done']):?>
                        <a href="app/delete.php?task_id=<?php echo $task['id']?>" class="done-button">حذف المهمة</a>
                    <?php else:?>
                        <a class="done-button" href="app/mark.php?task_id=<?php echo $task['id']?>">تم الإنجاز</a>
                    <?php endif;?>
                    <?php $task['due_date'] = strtotime($task['due_date']);?>
                    <p class="date">آخر تاريخ لإنجاز المهمة  <?php echo date('Y-m-d',$task['due_date'])?></p>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php endif;?>
            <?php
            if (isset($_SESSION['errors_1'])){
                foreach($_SESSION['errors_1'] as $error){
                    echo "<p class=\"error\">$error</p>";
                }
                $_SESSION['errors_1'] = [];
            }
            ?>
            <form action="./app/add.php" method="POST" class="task-add">
                <input type="text" placeholder="أدخل وصف مهمة جديدة" class="input" name="task_name">
            <?php
            if (isset($_SESSION['errors_2'])){
                foreach($_SESSION['errors_2'] as $error){
                    echo "<p class=\"error\">$error</p>";
                }
                $_SESSION['errors_2'] = [];
            }
            ?>
                <input type="text" placeholder="أدخل آخر تاريخ لإنجاز المهمة مثال : 1-1-2017" class="input" name="due_date">
                <input type="submit" value="أضف" class="submit">
            </form>
        </div>
    </body>
</html>