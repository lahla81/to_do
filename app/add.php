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
    if ((!empty($_POST['task_name'])) && (!empty($_POST['due_date']))){
        // اختبار صحة االتاريخ المدخل
        if ($due_date = validate_date($_POST['due_date'])){
            // تخزين المهمة داخل قاعدة البيانات
            $description = $_POST['task_name'];
            $due_date = date('Y-m-d H:i:s', $due_date);
            $connection->query("INSERT INTO tasks (description, due_date, user_id)
            VALUES ('".$description."', '".$due_date."','".$_SESSION['user_id']."')");
        }
        // التاريخ المدخل غير صحيح
        else {
            // ارسال رسالة خطأ الي المستخدم وتطلب منه اعادة ادخال التاريخ بصورة صحيحة
           $errors2['not_valid_date'] = "يجب كتابة التاريخ بشكل صحيح مثال 20-1-2018";
           $_SESSION['errors_2']= $errors2;
        }
    }
    //أحد الحقلين أو كلاهما فارغين
    else {
        // ارسال رسالة خطأ الي المستخدم
        if(empty($_POST['task_name'])){
            $errors1['required_name'] = "حقل وصف المهة فارغ";
            $_SESSION['errors_1']= $errors1;
        }
        
        if(empty($_POST['due_dat'])){
            $errors2['required_date'] = "حقل التاريخ فارغ";
            $_SESSION['errors_2']= $errors2;
        }

       
        
    }
    header('Location: ../index.php');
}