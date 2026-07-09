<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modernistinio Kauno namai | modernist.kaunas.lt</title>

    <meta name="description" content="Pasakojimai apie tarpukarinį Kauną, EHL ir UNESCO pasaulio paveldo titulus, atsakymai į jūsų klausimus ir kita aktuali informacija. Apsilankyk ir sužinok!">
    <meta name="keywords" content="kaunas unesco paveldas, tarpukario kaunas, medinis kauno paveldas, kauno paveldas, europos paveldo ženklas, unesco kaunas, lietuvos unesco objektai, kauno modernizmas unesco, unesco lietuva ">

    <link rel="icon" href="src/img/favicon.svg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link href="src/css/style.css?v=30" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/orestbida/cookieconsent@3.0.1/dist/cookieconsent.css">
</head>
<body>
    <header>
        <div class="desktop-nav container">
            <div class="logo">
                <a href="index.php"><b>MODERNIST</b>KAUNAS</a>
            </div>
            <nav>
                <ul>
                    <li><a href="unesco.php">Unesco</a></li>
                    <li><a href="ehl-apie.php">Ehl</a></li>
                    <li><a href="gyventojams.php">Gyventojams</a></li>
                    <li><a href="kontaktai.php">Kontaktai</a></li>
                </ul>
            </nav>
            <div class="socials">
                <a href="/en">EN</a>
                <!-- <a href="#">
                    <svg width="14" height="24" viewBox="0 0 14 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.4497 13.9527V24H3.83432V13.9527H0V9.8787H3.83432V8.39645C3.83432 2.89349 6.13314 0 10.997 0C12.4882 0 12.8609 0.239645 13.6775 0.434911V4.4645C12.7633 4.30473 12.5059 4.21598 11.5562 4.21598C10.429 4.21598 9.82544 4.5355 9.27515 5.16568C8.72485 5.79586 8.4497 6.88757 8.4497 8.4497V9.88757H13.6775L12.2751 13.9615H8.4497V13.9527Z" fill="#231F20"/>
                    </svg>
                </a> -->
                <a href="https://www.youtube.com/@interwararchitecture9735" target="_blank">
                    <svg width="37" height="24" viewBox="0 0 37 24" fill="#000000" xmlns="http://www.w3.org/2000/svg">
                    <path d="M30.4785 24H6.47647C3.26493 24 0.67749 21.1598 0.67749 17.6663V6.33373C0.67749 2.82604 3.27794 0 6.47647 0H30.4785C33.69 0 36.2774 2.84024 36.2774 6.33373V17.6663C36.2904 21.174 33.69 24 30.4785 24Z" fill="#231F20"/>
                    <path d="M24.7745 11.8225L14.6775 6V17.645L24.7745 11.8225Z" fill="white"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="mobile-nav container">
            <div class="logo">
                <a href="index.php"><b>MODERNIST</b><br>KAUNAS</a>
            </div>
            <button class="nav-toggle"><img src="src/img/menu.png" alt=""></button>
        </div>
        <div class="mobile-dropdown">
            <ul>
                <li><a href="unesco.php">Unesco</a></li>
                <li><a href="ehl-apie.php">Ehl</a></li>
                <li><a href="gyventojams.php">Gyventojams</a></li>
                <li><a href="kontaktai.php">Kontaktai</a></li>
                <li><a href="/en">EN</a></li>
            </ul>
        </div>
    </header>

    <script>
        const navToggle = document.querySelector('.nav-toggle');

        navToggle.addEventListener('click', function() {
            const navBar = document.querySelector('.mobile-dropdown');
            if(getComputedStyle(navBar).display == 'none') {
                navBar.style.display = 'block';
                document.querySelector('.nav-toggle img').src = "src/img/close.png";
            } else {
                navBar.style.display = 'none';
                document.querySelector('.nav-toggle img').src = "src/img/menu.png";
            }
        });
    </script>
