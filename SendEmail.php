<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "braunvlad981@gmail.com";
    $subject = "Новое сообщение с сайта";

    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $message = htmlspecialchars($_POST["message"]);

    $headers = "From: no-reply@вашдомен.com\r\n";
    $headers .= "Reply-To: no-reply@вашдомен.com\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

    $body = "Имя: $firstName\nФамилия: $lastName\nСообщение:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Письмо успешно отправлено!";
    } else {
        http_response_code(500);
        echo "Ошибка при отправке письма.";
    }
}
?>