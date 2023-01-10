<?php
$tg_bot_token = "5930520831:AAGtuq5KfgiyrKMsFGkkQWnAXUeXng24lgo";

$chat_id = "-812417755";//"-793771477";

$text = '';

// Получаем параметры, посланные с javascript
$name = $_POST['name'];
$phone = $_POST['tel'];
//Собираем в массив то, что будет передаваться боту
$arr = array(
    'Имя ' => $name,
    'Телефон ' => $phone
);
//Настраиваем внешний вид сообщения в телеграме
foreach($arr as $key => $value) {
    $text .= $key.":".$value."\n";
};

$param = [
    "chat_id" => $chat_id,
    "text" => $text
];

$url = "https://api.telegram.org/bot" . $tg_bot_token . "/sendMessage?" . http_build_query($param);

$sendToTelegram = fopen($url,"r");
//Выводим сообщение об успешной отправке
if ($sendToTelegram) {
    alert('Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.');
}

//А здесь сообщение об ошибке при отправке
else {
    alert('Что-то пошло не так. ПОпробуйте отправить форму ещё раз.');
}
