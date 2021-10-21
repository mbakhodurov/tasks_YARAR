<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function vhod_danniy($name,$phone,$gmail){

    $error_name="";
    $error_phone="";
    $error_message="";
    $error=false;
    $errors="";

    $errs = [];

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

    $errs["resErr"] = $error;
    $errs["resMes"] = $errors;

    return $errs;
}


function send($name="ALEX",$phone='89833080505',$gmail="abc@gmail.com"){
    set_fasad($name,$phone,$gmail);
}

function send_Email($gmail,$enter_Data){

    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $gmail=$_POST['email'];
    $message=$_POST['message'];

    $subject='the subject';

    $res_mes = "Message didn't send";

    $message="Имя: $name"."<br>"."Телефон: $phone"."<br>Сообщение $message";
    // $message="Имя: $name"."<br>Телефон: $phone"."<br>Сообщение: $message";
    if (!$enter_Data['resErr']) {

        if (mail($gmail, $subject, $message)) {

            $res_mes = "Message sent";
        }
        echo $res_mes;
    }else{
        echo $enter_Data['resMes'];
    }
}

function set_fasad($name,$phone,$gmail){
    $enterData = vhod_danniy($name,$phone,$gmail);
    send_Email($gmail,$enterData);
}

send();

?>