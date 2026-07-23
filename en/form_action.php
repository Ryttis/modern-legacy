<?php

require_once __DIR__ . '/../includes/env.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$errors = [];
$errorMessage = '';

$site   = env_required('RECAPTCHA_SITE_KEY');
$secret = env_required('RECAPTCHA_SECRET_KEY');

if (!empty($_POST)) {
    $name = $_POST['vardas'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $message = $_POST['content'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptchaResponse}";
    $verify = json_decode(file_get_contents($recaptchaUrl));

    if (!$verify->success) {
        $errors[] = 'Recaptcha';
    }

    if (empty($name)) {
        $errors[] = 'Vardas';
    }

    if (empty($email)) {
        $errors[] = 'Email';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email';
    }

    if (empty($message)) {
        $errors[] = 'Žinutė';
    }
    
    if (empty($topic)) {
        $errors[] = 'Tema';
    }

    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
        header('Location: kontaktai.php?error');
        exit;
    } else {
        $toEmail = env_value('CONTACT_MAIL_TO', 'kulturos.paveldo.skyrius@kaunas.lt');
        $emailSubject = 'Nauja žinutė iš modernist.kaunas.lt';
        $headers = ['From' => env_value('CONTACT_MAIL_FROM', 'MODERNIST KAUNAS <helpdesk@kaunas.lt>'), 'Reply-To' => $email, 'Content-type' => 'text/html;charset=UTF-8'];

        $bodyParagraphs = ["Vardas: {$name}<br>", "El. Paštas: {$email}<br>", "Tema: {$topic}<br>", "Žinutė:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: kontaktai.php?success');
            exit;
        } else {
            $errorMessage = "<p style='color: red;'>Oops, something went wrong. Please try again later</p>";
        }
    }
}

