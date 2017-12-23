<?php
require "config.php";
function validate_date($data_string){
    if ($time = strtotime($data_string)){
        return $time;
    }
    else {
        return false;
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // اختبار عدم فراغ حقلي وصف المهمة والتاريخ
    if ((!empty($_POST['task_name'])) and (!empty($_POST['due-date']))){
        // اختبار صحة االتاريخ المدخل
        if ($due_date = validate_date($_POST['due-date'])){
            // تخزين المهمة داخل قاعدة البيانات
            $description = $_POST['task_name'];
            $due_date = date('Y-m-d H:i:s', $due_date);
            $connection->query("INSERT INTO tasks (description, due_date, user_id)
            VALUES ('".$description."', '".$due_date."','".$_SESSION['user_id']."')");
        }
        // التاريخ المدخل غير صحيح
        else {
            // ارسال رسالة خطأ الي المستخدم وتطلب منه اعادة ادخال التاريخ بصورة صحيحة
            
        }
    }
    //أحد الحقلين أو كلاهما فارغين
    else {
        // ارسال رسالة خطأ الي المستخدم
    }
}