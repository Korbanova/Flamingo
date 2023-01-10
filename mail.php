<?php
// Проверяем тип запроса, обрабатываем только POST
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Получаем параметры, посланные с javascript
    $name = $_POST['name'];
    $tel = $_POST['tel'];

    // создаем переменную с содержанием письма
    $content = "
    Имя: $name \r\n
    Телефон: $tel";
    
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=utf-8';

    $success = mail("admin@ws-example.site", "Запрос записи на тренировку", $content, implode("\r\n", $headers));
   // mail("admin@ws-example.site", "Запрос на бронирование столика", $content);

    if($success){
        http_response_code(200);
         echo "Письмо отправлено";
    }else{
        http_response_code(500);
        echo "Письмо не отправлено";
    }
}else{
    http_response_code(403);
    echo "Данный метод запроса не поддерживается сервером";
 }
?>