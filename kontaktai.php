<?php require_once __DIR__ . '/includes/env.php'; include('assets/header.inc.php'); ?>

<script src="https://www.google.com/recaptcha/api.js"></script>

<div class="contact-page">
    <div class="contact-intro">
        <h3>Kontaktai</h3>
        <p>„Modernistinio Kauno: Optimizmo architektūros, 1919–1939“ vietos valdytojo funkcijas atlieka Kauno miesto savivaldybės administracijos Kultūros paveldo skyrius ir įgaliotas kontaktinis asmuo – skyriaus vedėjas Saulius Rimas.<br><br> Vietos valdytojas užtikrina vertybės valdymo plane numatytų priemonių ir veiklų įgyvendinimą. </p>
        <b>Turite klausimų ar pasiūlymų? Laukiame jūsų žinučių!</b>
        <div>
            <b>Kultūros paveldo skyrius</b>
            <i><a href="mailto:kulturos.paveldo.skyrius@kaunas.lt">kulturos.paveldo.skyrius@kaunas.lt</a></i>
        </div>
    </div>
    <div class="contact-form">
        <form action="form_action.php" id="contact-form" method="post">
            <input type="text" name="vardas" id="vardas" placeholder="Vardas" required>
            <input type="email" name="email" id="email" placeholder="El. Paštas" required>
            <input type="text" name="topic" id="topic" placeholder="Tema" required>
            <textarea name="content" id="content" placeholder="Žinutė" required></textarea>
            <button
                class="g-recaptcha"
                type="submit"
                data-sitekey="<?php echo htmlspecialchars(env_required('RECAPTCHA_SITE_KEY'), ENT_QUOTES, 'UTF-8'); ?>"
                data-callback='onRecaptchaSuccess'
                >Siųsti žinutę</button>
            <?php if(isset($_GET['success'])): ?>
                <span>Jūsų žinutė išsiųsta!</span>
            <?php endif; ?>
        </form>
    </div>
</div>

<script>
    function onRecaptchaSuccess () {
        const form = document.getElementById("contact-form");
        if (form.checkValidity()) {
            form.submit();
        } else {
            grecaptcha.reset();
            form.reportValidity();
        }
    }
</script>

<div class="contact-page alternative" style="padding: 2em 16em;">
    <h3 class="friends">Draugai</h3>
</div>
<div class="contact-urls">
    <div class="block-1 white-bg">
        <img src="src/img/kpd-1.png" alt="www.modernist.kaunas.lt">
        <b>Kultūros paveldo departamentas prie Kultūros ministerijos</b>
        <span>Departamentas įgyvendina nekilnojamojo kultūros paveldo ir kilnojamųjų kultūros vertybių (įrašytų į Kultūros vertybių registrą) apsaugos nacionalinę politiką.</span>
        <a href="https://kpd.lrv.lt/lt/" target="_blank">https://kpd.lrv.lt/lt/</a>
    </div>
    <div class="block-2 black-bg">
        <img src="src/img/unesco-1.png" alt="www.modernist.kaunas.lt">
        <b>Lietuvos nacionalinė UNESCO komisija</b>
        <span>Lietuvos nacionalinės UNESCO komisijos tikslas – laiduoti aktyvų Lietuvos Respublikos dalyvavimą UNESCO veikloje, kuriant, vertinant ir įgyvendinant UNESCO tikslus atitinkančias programas.</span>
        <a href="https://www.unesco.lt/" target="_blank">https://www.unesco.lt/</a>
    </div>
    <div class="block-1 black-bg w-b">
        <img src="src/img/ministerija.png" alt="www.modernist.kaunas.lt">
        <b>Kultūros ministerija</b>
        <span>Lietuvos Respublikos Vyriausybės institucija, atsakinga už valstybės kultūros politiką profesionalaus ir mėgėjų meno, teatro, muzikos, dailės, kino, muziejų, autorių teisių ir gretutinių teisių bei kultūros vertybių apsaugos srityse.</span>
        <a href="https://lrkm.lrv.lt/lt/" target="_blank">https://lrkm.lrv.lt/lt/</a>
    </div>
    <div class="block-2 white-bg b-w">
        <img src="src/img/kaunas_logo.png" alt="www.modernist.kaunas.lt">
        <b>Kauno miesto savivaldybės administracija</b>
        <span>Kauno miesto savivaldybės administracija organizuoja UNESCO pasaulio paveldo vertybės valdymą, finansuoja ir įgyvendina konkrečias miesto planavimo, tvarkymo, aplinkos ir paveldo apsaugos, kultūros ir kitas savivaldos funkcijas.</span>
        <a href="https://www.kaunas.lt/" target="_blank">https://www.kaunas.lt/</a>
    </div>
    <div class="block-1 white-bg">
        <img src="src/img/kaunasin.png" alt="www.modernist.kaunas.lt">
        <b>Kauno turizmo informacijos centras</b>
        <span>Kaunastic naujienos, lankytinos vietos, teminės ekskursijos, apgyvendinimo, maitinimo bei pramogų vietų sąrašas Kauno mieste.</span>
        <a href="https://visit.kaunas.lt/lt/" target="_blank">https://visit.kaunas.lt/lt/</a>
    </div>
    <div class="block-2 black-bg">
        <img src="src/img/EHLB.png" alt="www.modernist.kaunas.lt">
        <b>Europos Paveldo ženklo biuras: EHL- bureau</b>
        <span>Europos Sąjungos iniciatyva, kuria siekiama populiarinti atrinktų paveldo vietų istorinę ir kultūrinę svarbą Europai bei Europos Sąjungai.</span>
        <a href="https://ehl-bureau.eu/en/project/kaunas-of-1919-1940/" target="_blank">https://ehl-bureau.eu/en/project/kaunas-of-1919-1940/</a>
    </div>
</div>

<div class="remejai-list">
    <div class="container">
        <a href="https://www.epaveldas.lt/" target="_blank"><img src="src/img/remejai/ePaveldas.png" alt="www.modernist.kaunas.lt"></a>
        <a href="https://www.atmintiesvietos.lt/" target="_blank"><img src="src/img/remejai/atminties.png" alt="www.modernist.kaunas.lt"></a>
        <a href="https://ekskursas.lt/" target="_blank"><img src="src/img/remejai/ekskursas.png" alt="www.modernist.kaunas.lt"></a>
        <a href="https://kaunodetales.lt/" target="_blank"><img src="src/img/remejai/detales.png" alt="www.modernist.kaunas.lt"></a>
        <a href="https://www.limis.lt/" target="_blank"><img src="src/img/remejai/limis.png" alt="www.modernist.kaunas.lt"></a>
        <a href="https://kaunaspilnas.lt/modernizmas-ateiciai-architektura-kaip-ikvepimas-kinui-sokiui-muzikai-gyvenimui/" target="_blank"><img src="src/img/remejai/kaunaspilnas.png" alt="www.modernist.kaunas.lt"></a>
        <a href="https://kaunas2022.eu/dizainaskaune/kaunas-unesco-dizaino-miestas/index.html" target="_blank"><img src="src/img/remejai/kaunas2022.png" alt="www.modernist.kaunas.lt"></a>
    </div>
</div>

<?php include('assets/footer.inc.php'); ?>