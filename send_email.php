<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["textarea"]);

    $to = "info@undetectedtext.com"; // Замените на ваш фактический адрес электронной почты
    $subject = "Новое сообщение с вашей формы обратной связи";
    $email_content = "Имя: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Сообщение:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($to, $subject, $email_content, $email_headers)) {
        // Сообщение отправлено успешно
        header("Location: ваша_страница_успеха.html");
    } else {
        // Сообщение не отправлено
        header("Location: ваша_страница_ошибки.html");
    }
}
?>
