<?php include('assets/header.inc.php'); ?>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://cdn.maptiler.com/maptiler-sdk-js/v2.2.2/maptiler-sdk.css" rel="stylesheet" />

    <style>
        #map {
            width: 1160px;
            height: 600px;
            margin: -13em auto 0 auto;
        }
        .leaflet-control-container {
            display: none;
        }
        #map a {
            display: none;
        }
        .custom-marker {
            background-color: #fff; 
            color: #000;
            text-align: center;
            width: 20px;
            height: 20px;
            line-height: 20px;
            font-size: 16px;
            border: 2px solid transparent; 
            transition: 0.15s all; 
        }
        .custom-marker:hover {
            color: #fff; 
            background: #000;
        }
        .leaflet-interactive {
            cursor: pointer; 
        }
    </style>

    <div class="ehl-nav">
        <ul>
            <li><a href="ehl-apie.php" class="">About</a></li>
            <li><a href="ehl-pastatai.php" class="">Buildings</a></li>
            <li><a href="ehl-projektai.php" class="active-ehl">Projects</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="ehl-projects">
            <div class="content-text">
                <h2>Re:Union: Lublin and Kaunas – Two Cities, One Shared Vision for Europe’s Cultural Legacy</h2>

                <span>Lublin and Kaunas may seem far apart at first glance: different histories, architectural styles, and periods. Yet both cities have been acknowledged with the prestigious European Heritage Label, recognizing their unique contributions to Europe’s cultural and historical identity.</span>

                <span><b>Lublin: The Birthplace of the Polish-Lithuanian Commonwealth</b><br>
                Lublin earned its European Heritage Label for its role in the historic Union of Lublin (1569) – a moment that forever changed Europe. This act united the Kingdom of Poland and the Grand Duchy of Lithuania into the Polish-Lithuanian Commonwealth, one of Europe’s largest and most powerful states of its time. More than a political agreement, it was a milestone in multiculturalism, tolerance, and cooperation between nations and faiths. Lublin became a symbol of unity, partnership, and shared growth.</span>

                <span><b>Kaunas: A Testament to Modernity and National Resilience</b><br>
                Kaunas received its European Heritage Label for remarkable modernist architecture, developed between 1919 and 1940 when it served as the provisional capital of Lithuania. Within two decades, it transformed into a thriving cultural, administrative, and economic hub. The city’s modernist buildings are powerful expressions of Lithuanian identity, innovation, and rebirth. During this period, Lithuania faced political tension with Poland, especially over Vilnius.</span>

                <span><b>“Re:Union”</b><br>
                Despite Lithuania's and Poland's complex and sometimes painful past, Lublin and Kaunas are united today by a shared commitment to the future. Both cities focus on engaging younger generations: infusing a deep respect for national heritage, cultural diversity, and the importance of historical memory.</span>

                <span>In a globalized world where local identities often fade, Lublin and Kaunas aim to preserve their uniqueness while promoting openness and dialogue. Through educational programs, cultural exchanges, and international partnerships, they are building bridges - between generations, nations, and cultures.</span>

                <span>The joint initiative “Re:Union” embodies the spirit of the European Heritage Label. It shows that our shared European heritage is not just about the past - it’s a foundation for the future. Through cooperation, Lublin and Kaunas remind us that places with deep traditions can also be leaders in innovation, multiculturalism, and tolerance.</span>

                <span>As part of the "Re:Union" project, a diverse program of events will unfold throughout this year. Both cities will host a range of events: exhibitions, concerts, guided tours, and cultural experiences designed to bring their shared heritage to life and engage residents and visitors alike. All events are funded by the European Union via the European Heritage Label Bureau and are organized by the municipalities of Lublin and Kaunas.</span>

                <span>The full program will be announced soon – stay tuned!</span>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="ehl-projects">
            <div class="content-text">
                <span><b>"RE:UNION" Events in Kaunas:</b></span>

                <span><b>May 23 at 11:00 AM</b> | Exhibition “Re:Union: Connections between Lublin and Kaunas” in front of Kaunas City Municipality (Laisvės Ave. 96)</span>

                <span><b>May 24 at 5:00 PM</b> | Performance by “Mohipisian“, an alternative rock band from Lublin, at Santaka Park in Kaunas (Youth Stage)</span>

                <span><b>June</b> | A series of guided tours for students to explor and enrich knowledge about the Temporary Capital, Kaunas' rich architecture, and its residents. Registration – coming soon!</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="ehl-project-images">
            <img src="src/img/ehl-projektai/paveldas.jpg"  width="300" alt="www.modernist.kaunas.lt">
            <img src="src/img/ehl-projektai/ehlb.png" alt="www.modernist.kaunas.lt">
            <img src="src/img/ehl-projektai/es.png" width="200" alt="www.modernist.kaunas.lt">
            <img src="src/img/ehl-projektai/kaunas.png" alt="www.modernist.kaunas.lt">
            <img src="src/img/ehl-projektai/tublin.png" alt="www.modernist.kaunas.lt">
        </div>
    </div>
    <div class="ehl-yellow-label">
        <div>
            <span>"Modernist’s Guide" – your map for independent exploration of Kaunas’ UNESCO and European Heritage Label buildings!</span>
            <div class="label-flex">
                <a class="btn-ehl" target="_blank" href="gidas_en.pdf">Modernist’s guide en</a>
                <a class="btn-ehl" target="_blank" href="gidas_pl.pdf">Modernist’s guide pl</a>
            </div>
        </div>
    </div>
    <div class="dark-bg">
        <div class="container">
            <div class="ehl-projects">
                <div class="content-text">
                    <h2>Project partner – Lublin</h2>

                    <span>Lublin is the ninth-largest city in Poland and the leading city in eastern Poland. It serves as the capital of the Lublin Voivodeship (Province) and is an economic, academic, and cultural hub of the region, with strong international outreach—especially toward neighbouring Ukraine.</span>

                    <span>The city attracts visitors with the unique atmosphere of its well-preserved medieval Old Town, local specialities and a rich history that is palpable around every corner. Lublin also boasts a vibrant cultural scene, contributing to its designation as the European Capital of Culture 2029. The city is bustling with social life and the arts, hosting more than 30 international festivals annually.</span>

                    <span>Lublin is one of the largest academic centres in Poland, with nearly 10,000 international students across nine universities.</span>

                    <div class="lublin-gallery">
                        <a href="src/img/ehl-projektai/1.jpg" data-lightbox="gallery-lublin" data-title="Vakarinė Liublino miesto panorama."><img src="src/img/ehl-projektai/1.jpg" alt=""></a>
                        <a href="src/img/ehl-projektai/2.jpg" data-lightbox="gallery-lublin" data-title="Liublino pilis - Nacionalinis Liublino muziejus."><img src="src/img/ehl-projektai/2.jpg" alt=""></a>
                        <a href="src/img/ehl-projektai/3.png" data-lightbox="gallery-lublin" data-title="Freskos Šventosios Trejybės koplyčioje Liublino pilyje."><img src="src/img/ehl-projektai/3.png" alt=""></a>
                        <a href="src/img/ehl-projektai/4.jpg" data-lightbox="gallery-lublin" data-title="Freskos Šventosios Trejybės koplyčioje Liublino pilyje."><img src="src/img/ehl-projektai/4.jpg" alt=""></a>
                    </div>

                    <span><b>Lublin: A Historic Crossroads of Cultures and Trade</b></span>

                    <span>Lublin, throughout its more than 700-year history, has been a cultural and religious melting pot. The city's development was influenced by its strategic location on a trade route connecting the Black Sea with the Baltic Sea and Western Europe.</span>

                    <span>The city’s first castle was built in the 12th century, with a brick keep added in the 13th century that still stands today. During King Casimir the Great’s reign in the 14th century, the city was fortified with walls and a brick castle with a chapel to protect it from invasions.</span>

                    <span>Located on the route between Vilnius and Krakow, Lublin became a favoured residence of the Jagiellonian dynasty, especially King Władysław Jagiełło.</span>

                    <span>Here, under the care of the famous royal chronicler Jan Długosz, the sons of King Casimir IV were raised. Around 1520, King Sigismund the Old began transforming the medieval castle into a Renaissance royal residence, with the help of Italian artisans from Krakow.</span>

                    <span>On July 1, 1569, the union between the Kingdom of Poland and the Grand Duchy of Lithuania was signed, establishing the Polish–Lithuanian Commonwealth. This event is commemorated by the Union of Lublin Monument, located in Litewski Square.</span>

                    
                    <div class="lublin-gallery">
                        <a href="src/img/ehl-projektai/5.jpg" data-lightbox="gallery-lublin2" data-title="LUBLIN"><img src="src/img/ehl-projektai/5.jpg" alt=""></a>
                        <a href="src/img/ehl-projektai/6.jpg" data-lightbox="gallery-lublin2" data-title="LUBLIN"><img src="src/img/ehl-projektai/6.jpg" alt=""></a>
                        <a href="src/img/ehl-projektai/7.jpg" data-lightbox="gallery-lublin2" data-title="LUBLIN"><img src="src/img/ehl-projektai/7.jpg" alt=""></a>
                        <a href="src/img/ehl-projektai/8.jpg" data-lightbox="gallery-lublin2" data-title="LUBLIN"><img src="src/img/ehl-projektai/8.jpg" alt=""></a>
                    </div>

                    <span><b>Lublin – City of Heritage</b></span>

                    <span>In 2015, the European Heritage Label was awarded to the Union of Lublin as an exceptional example of democratic integration between two states inhabited by people of diverse ethnic backgrounds and religions.</span>

                    <span>The monuments associated with the signing of the Union and marked with the Label include: the Holy Trinity Chapel at Lublin Castle, the Union of Lublin Monument, and the Church of Saint Stanislaus the Bishop and Martyr, along with the Dominican Monastery.</span>

                    <span>The European Heritage Label is awarded to highlight the symbolic value of sites that played a major role in European history and culture and are regarded as milestones in the creation of today's Europe. Granting the label to the Union of Lublin helped revive the legacy of the Polish–Lithuanian Commonwealth—a federation of two countries with one monarch, one parliament, and significant legislative power. The Union of Lublin was the first deliberate act of democratic integration among diverse nations, enabling the coexistence of multiple ethnic and religious groups.</span>

                    <span>More info <a target="_blank" href="https://www.lublin.eu">www.lublin.eu</a></span>

                    <iframe height="400" src="https://www.youtube.com/embed/WScTFeawDiM?si=LkHnaPBKr0uJCI3n" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.maptiler.com/maptiler-sdk-js/v2.2.2/maptiler-sdk.umd.js"></script>
    <script src="https://cdn.maptiler.com/leaflet-maptilersdk/v2.0.0/leaflet-maptilersdk.js"></script>
    
<?php include('assets/footer.inc.php'); ?>