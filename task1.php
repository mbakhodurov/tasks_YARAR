<?php
function send($name="ALEX",$phone='89833080505',$gmail="abc@gmail.com"){
	$error_name="";
    $error_phone="";
    $error_message="";
    $error=false;
    $errors="";

    if($name==""){
        $error_name=" Введите имя:";
        
        $errors.=$error_name;
        $errors.="<br>";
        
        $error=true;
    }
    
    if(!preg_match("/^[0-9]{11,11}+$/", $phone)){
        // Данная проверка принимает только 10 значные номера (9031234567) состоящие только из цифр,
        // без скобок, дефисов и пробелов
        // {10,10} - показывает диапазон допустимой длинны номера, если нужно проверять номер на 11 знаков,
        // то нужно изменить на {10,11}

        $error_phone=" Введите телефон";

        $errors.=$error_phone;
        $errors.="<br>";

        $error=true;
    }

    $subject='the subject';
    $message="Имя: $name"."<br>"."Телефон: $phone"."<br>Сообщение $message";
    // $message="Имя: $name"."<br>Телефон: $phone"."<br>Сообщение: $message";
    if (!$error) {
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        mail($gmail, $subject, $message);
        echo "Message sent";
    }else{
        echo $errors;
    }

}

if (isset($_POST['ok'])) {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $gmail=$_POST['email'];
    $message=$_POST['message'];
}
send();
?>