<?php require_once __DIR__ . '/../includes/env.php'; include('assets/header.inc.php'); ?>

<script src="https://www.google.com/recaptcha/api.js"></script>



<div class="contact-page">
    <div class="contact-intro">
        <h3>Contacts</h3>
        <p>The functions of the local manager of 'Modernist Kaunas: The Architecture of Optimism, 1919–1939' are carried out by the Cultural Heritage Division of Kaunas City Municipal Administration, with the designated contact person being the Head of the Division, Saulius Rimas. <br><br> The local manager ensures the implementation of the measures and activities outlined in the site's management plan.</p>
        <b>Have questions or suggestions? We look forward to hearing from you!</b>
        <div>
            <b>Head of Cultural Heritage Division</b>
            <i><a href="mailto:kulturos.paveldo.skyrius@kaunas.lt">kulturos.paveldo.skyrius@kaunas.lt</a></i>
        </div>
    </div>
    <div class="contact-form">
        <form action="form_action.php" id="contact-form" method="post">
            <input type="text" name="vardas" id="vardas" placeholder="Name" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="text" name="topic" id="topic" placeholder="Theme" required>
            <textarea name="content" id="content" placeholder="Message" required></textarea>
            <button
                class="g-recaptcha"
                type="submit"
                data-sitekey="<?php echo htmlspecialchars(env_required('RECAPTCHA_SITE_KEY'), ENT_QUOTES, 'UTF-8'); ?>"
                data-callback='onRecaptchaSuccess'
                >Send message</button>
            <?php if(isset($_GET['success'])): ?>
                <span>Your message has been sent!</span>
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
    <h3 class="friends">Friends</h3>
</div>
<div class="contact-urls">
    <div class="block-1 white-bg">
        <img src="src/img/kpd-1.png" alt="www.modernist.kaunas.lt">
        <b>Department of Cultural Heritage under the Ministry of Culture</b>
        <span>The department implements the national policy for the protection of immovable cultural heritage and movable cultural assets (listed in the Register of Cultural Heritage).</span>
        <a href="https://kpd.lrv.lt/en/" target="_blank">https://kpd.lrv.lt/en/</a>
    </div>
    <div class="block-2 black-bg">
        <img src="src/img/unesco-1.png" alt="www.modernist.kaunas.lt">
        <b>Lithuanian National Commission for UNESCO</b>
        <span>The Commission plays a key role in ensuring Lithuania's active engagement with UNESCO programmes, focusing on the preservation of cultural heritage and the implementation of initiatives aligned with UNESCO's global objectives.</span>
        <a href="https://www.unesco.lt/" target="_blank">https://www.unesco.lt/</a>
    </div>
    <div class="block-1 black-bg w-b">
        <img src="src/img/ministerija.png" alt="www.modernist.kaunas.lt">
        <b>Ministry of Culture</b>
        <span>The governmental institution of the Republic of Lithuania responsible for overseeing Lithuania's national cultural policy, including professional and amateur arts, theatre, music, fine arts, cinema, museums, copyright, and the protection of cultural heritage.</span>
        <a href="https://lrkm.lrv.lt/en/" target="_blank">https://lrkm.lrv.lt/en/</a>
    </div>
    <div class="block-2 white-bg b-w">
        <img src="src/img/kaunas_logo.png" alt="www.modernist.kaunas.lt">
        <b>Kaunas City Municipality Administration</b>
        <span>The Kaunas City Municipality Administration manages the UNESCO World Heritage Site, providing support and consultation for residents and heritage professionals alike. The Cultural Heritage Department implements the assigned measures and activities, and provides consultations to residents.</span>
        <a href="https://en.kaunas.lt/" target="_blank">https://en.kaunas.lt/</a>
    </div>
    <div class="block-1 white-bg">
        <img src="src/img/kaunasin.png" alt="www.modernist.kaunas.lt">
        <b>Kaunas Tourism Information Centre</b>
        <span>Provides up-to-date information on the city’s attractions, from Kaunastic news and themed tours to dining and entertainment recommendations.</span>
        <a href="https://visit.kaunas.lt/en/" target="_blank">https://visit.kaunas.lt/en/</a>
    </div>
    <div class="block-2 black-bg">
        <img src="src/img/EHLB.png" alt="www.modernist.kaunas.lt">
        <b>European Heritage Label Office: EHL-bureau</b>
        <span>As part of the EU’s initiative, the European Heritage Label promotes the cultural significance of exceptional heritage sites across Europe.</span>
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