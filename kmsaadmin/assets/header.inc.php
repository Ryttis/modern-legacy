<?php
    require_once('functions.php');
    
    if(!userLogged() && basename($_SERVER['PHP_SELF']) != 'signin.php') {
        header("location: signin.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valdymas</title>

    <!-- BOOTSTRAP CSS INCLUDE -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- FONT INCLUDE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CUSTOM CSS INCLUDE -->
    <link href="src/css/main.css?v=1" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/lt.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
</head>
<body class="bg-body-tertiary">
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center align-items-center py-3 mb-4 border-bottom">
            <a href="/kmsaadmin" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="src/img/logo.png" width="100" alt="modernist.kaunas.lt">
                <b class="fs-4 ms-4"></b>
            </a>
            <?php if(basename($_SERVER['PHP_SELF']) != 'signin.php'): ?>
            <a href="signout.php" class="btn btn-danger">Atsijungti</a>
            <?php endif; ?>
        </header>
        <?php if(basename($_SERVER['PHP_SELF']) != 'signin.php'): ?>
        <div class="user-info d-flex gap-2 align-items-center flex-column flex-md-row">
            <span class="badge d-flex align-items-center p-1 pe-2 text-secondary-emphasis bg-secondary-subtle border border-secondary-subtle rounded-pill"><img class="rounded-circle me-1" width="24" height="24" src="https://vidus.kaunas.lt/sistema/nuotr/<?php echo $_SESSION[SESSION_ID]["username"]; ?>.jpg" onerror="this.src='https://mes.kaunas.lt/wp-content/themes/mes_theme/img/kaunas_logo_color.png'"><?php echo $_SESSION[SESSION_ID]["company_name"]; ?></span> <span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill p-2"><?php echo $_SESSION[SESSION_ID]["skyrius"]; ?></span>
        </div>
        <hr> 
        <?php endif; ?>
    </div>