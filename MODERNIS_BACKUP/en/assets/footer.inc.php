<div class="scroll-text">
    <marquee behavior="scroll" direction="left" scrollamount="10">
    <div>2015–2017: Preparation and submission of the tentative application for Kaunas Modernist Architecture <div class="marq-line"></div> 2018: Official application process begins for the inclusion of Kaunas Modernism in the World Heritage List <div class="marq-line"></div> 2019: International Forum of Modernist Cities. Presentation of the application to foreign experts <div class="marq-line"></div> 2021: Final version of the application submitted to the World Heritage Centre in Paris <div class="marq-line"></div> 2022: The World Heritage Centre provides the state and the World Heritage Centre with an interim evaluation of the nomination file <div class="marq-line"></div> September 18, 2023: Kaunas inscribed on the UNESCO World Heritage List </div></marquee>
</div>
<footer>
    <div class="container">
        <div class="first-block">
            <div>
                <img src="src/img/kaunas_logo_baltas.png" alt="">
                <img src="src/img/unesco_logo_baltas.png" alt="">
            </div>
            <div class="info-b">
                <span>Kauno miesto savivaldybė</span>
                <a href="mailto:kulturos.paveldo.skyrius@kaunas.lt">kulturos.paveldo.skyrius@kaunas.lt</a>
            </div>
        </div>
    </div>
</footer>

<script type="module" src="src/js/cookieconsent-config.js"></script>

<?php if($_SERVER['REQUEST_URI'] == "/gyventojams.php"): ?>
    <!-- <div class="useful-info-footer">
        <div class="container">
            <h2>Naudinga informacija</h2>
            <div class="info-list">
                <div class="info-block">
                    <img src="https://placehold.co/376x212" alt="">
                    <span class="info-title">Stoglangių, pastogių ir antstatų įrengimo Kauno miesto istoriniuose pastatuose rekomendacijos_1</span> 
                    <a href="#">Atsisiųsti</a>
                </div>
                <div class="info-block">
                    <img src="https://placehold.co/376x212" alt="">
                    <span class="info-title">Stoglangių, pastogių ir antstatų įrengimo Kauno miesto istoriniuose pastatuose rekomendacijos_1</span> 
                    <a href="#">Atsisiųsti</a>
                </div>
                <div class="info-block">
                    <img src="https://placehold.co/376x212" alt="">
                    <span class="info-title">Stoglangių, pastogių ir antstatų įrengimo Kauno miesto istoriniuose pastatuose rekomendacijos_1</span> 
                    <a href="#">Atsisiųsti</a>
                </div>
            </div>
        </div>
    </div> -->
<?php endif; ?>

    <script>
        let current = location.pathname.split('/')[1];
        if(current.length > 2) {
            let menuItems = document.querySelectorAll('nav ul li a');
            for (let i = 0, len = menuItems.length; i < len; i++) {
                if (menuItems[i].getAttribute("href").indexOf(current) !== -1) {
                    menuItems[i].className += "active";
                }
            }
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox-plus-jquery.min.js" integrity="sha512-U9dKDqsXAE11UA9kZ0XKFyZ2gQCj+3AwZdBMni7yXSvWqLFEj8C1s7wRmWl9iyij8d5zb4wm56j4z/JVEwS77g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>