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
            <li><a href="ehl-apie.php" class="">Apie</a></li>
            <li><a href="ehl-pastatai.php" class="">Pastatai</a></li>
            <li><a href="ehl-projektai.php" class="active-ehl">Projektai</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="ehl-projects">
            <div class="content-text">
                <h2>„Re:Union“: Liublinas ir Kaunas – du miestai, bendra Europos kultūros paveldo vizija</h2>

                <span>Iš pirmo žvilgsnio Liublinas ir Kaunas gali atrodyti tolimi – jų skirtingos istorijos, architektūriniai stiliai, skirtingi laikmečiai. Tačiau abu miestus sieja tai, kas, galbūt, nematoma akimis, bet jaučiama širdimi – abiem jiems suteiktas garbingas Europos paveldo ženklo titulas, liudijantis jų išskirtinį indėlį į bendrą Europos kultūrinę ir istorinę tapatybę.</span>

                <span><b>Liublinas: Lenkijos ir Lietuvos valstybės lopšys</b><br>
                Europos paveldo ženklas šiam miestui suteiktas dėl ypatingo vaidmens Liublino unijoje (1569 m.) – istorinėje sąjungoje, kuri negrįžtamai pakeitė visos Europos veidą. Būtent pasirašius šį dokumentą Lenkijos Karalystė ir Lietuvos Didžioji Kunigaikštystė susijungė į Lenkijos ir Lietuvos valstybę – vieną didžiausių ir įtakingiausių to meto Europos valstybių. Tai buvo ne vien politinis susitarimas, bet ir žingsnis į priekį link daugiakultūrės, tolerantiškos, bendradarbiavimu grįstos Europos epochos. Liublinas tapo vienybės, partnerystės ir bendro augimo simboliu – miestu, kuriame praeitis įkvepia ateitį.</span>

                <span><b>Kaunas: šiuolaikiškumo ir tautinės stiprybės simbolis</b><br>
                Kaunui suteiktas Europos paveldo ženklas – tai įvertinimas, už unikalią miesto modernizmo architektūrą, kurtą 1919–1940 m., kai miestas buvo laikinąja Lietuvos sostine. Vos per du dešimtmečius Kaunas tapo klestinčiu kultūriniu, administraciniu ir ekonominiu centru. Modernistiniai miesto pastatai ryškūs ne tik kaip architektūrinės vertybės, bet ir lietuviškos tapatybės, kūrybiškumo bei atgimstančios valstybės simboliai. Tai periodas, kai Lietuva išgyveno politinės įtampos laikotarpį su Lenkija dėl Vilniaus.</span>

                <span><b>„Re:Union“</b><br>
                Nepaisant sudėtingos ir kartais skaudžios istorijos, šiandien Liubliną ir Kauną vienija bendra ateities vizija. Abu miestai ypatingą dėmesį skiria jaunajai kartai – skatindami įsitraukti, ugdyti pagarbą nacionaliniam paveldui, kultūrinei įvairovei bei istorinei atminčiai.</span>

                <span>Globalizacijos paliestame pasaulyje, kuriame vietinis identitetas dažnai nyksta, Liublinas ir Kaunas ryžtingai saugo savo unikalumą, tuo pat metu skatina atvirą dialogą ir tarpkultūrinį supratimą. Švietimo programos, kultūriniai mainai ir tarptautinės partnerystės tampa tiltais, jungiančiais kartas, tautas ir kultūras.</span>

                <span>Bendra iniciatyva „Re:Union“ įkūnija tikrąją Europos paveldo ženklo dvasią. Ši iniciatyva liudija, kad bendras Europos paveldas – tai ne tik mūsų praeitis, bet ir pamatas ateičiai. Bendra Liublino ir Kauno iniciatyva primena, kad gilias tradicijas turintys miestai gali būti inovacijų, daugiakultūriškumo ir tolerancijos lyderiai.</span>

                <span>Įgyvendinant projektą „Re:Union“, visus metus abiejuose miestuose vyks platus spektras veiklų. Tai parodos, koncertai, ekskursijos, kultūriniai renginiai – jie skirti įamžinti bendrą paveldą ir įtraukti tiek vietos gyventojus, tiek miesto svečius. Visus renginius finansuoja Europos Sąjunga per Europos paveldo ženklo biurą, o organizuoja Liublino ir Kauno savivaldybės.</span>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="ehl-projects">
            <div class="content-text">
                <h2>Virtualus pasivaikščiojimas po Kauno parodą:</h2>

                <iframe allowfullscreen="allowfullscreen" allow="clipboard-write" scrolling="no" class="fp-iframe" style="border: 0px; width: 100%; height: 600px;" src="https://heyzine.com/flip-book/a8dc612b8b.html"></iframe>

                <h2>„Re:Union“ projekto uždarymo paroda Liubline:</h2>
                <iframe allowfullscreen="allowfullscreen" allow="clipboard-write" scrolling="no" class="fp-iframe" style="border: 0px; width: 100%; height: 600px;" src="https://heyzine.com/flip-book/e2e064abde.html"></iframe>
            </div>
        </div>
    </div>

    <hr>
    <div class="container">
        <div class="ehl-projects">
            <div class="content-text">
                <span><b>„RE:UNION“ renginiai Kaune:</b></span>

                <span><b>Gegužės 23 d. 11 val.</b> | Parodos „Re:Union: jungtys tarp Liublino ir Kauno“ ties Kauno miesto savivaldybe (Laisvės al. 96)</span>

                <span><b>Gegužės 24 d. 17 val.</b> | Alternatyvaus roko grupės iš Liublino pasirodymas „Mohipisian“ Kauno Santakos parke (Jaunimo scena).</span>

                <span><b>Rugsėjo 22–26 d., nuo 15 val.</b> | Ekskursijos „Nuo Kowno iki Kauno“ (gidas Vykintas Gervė)*</span>

                <span><b>Rugsėjo 23–25 d., nuo 15 val.</b> | Ekskursijos „Pažink Kauno modernizmą“ (gidė Liudmila Vitkienė)</span>

                „RE:UNION“ renginiai Kaune:

                <span>Atradimų kupina kelionė po Kauno senamiestį – sužinosite, kodėl ir kaip Kaunas susijęs su Lenkija, kokius pėdsakus paliko Jogaila, išgirsite pasakojimus apie miesto klestėjimą ir kokias lenkiškas šaknis slepia kasdien mūsų vartojami žodžiai. Tai istorijos, kurios nustebins net puikiai pažįstančius Kauną!</span>

                <span><b>Trukmė:</b> apie 2 val.</span>
                
                <span><b>Rugsėjo 23–25 d., nuo 15 val.</b> | Ekskursijos „Pažink Kauno modernizmą“ (gidė Liudmila Vitkienė)*</span>
                
                <span>Kauno tarpukario modernistinė architektūra – unikalus paveldas, įvertintas Europos paveldo ženklu ir įtrauktas į UNESCO pasaulio paveldo sąrašą. Ekskursijos dalyvių lauks pasakojimai apie Laikinosios sostinės aukso amžių, kai modernizmo idėjos persipynė su lietuvišku tautiškumu.</span>

                <span><b>Trukmė:</b> apie 1.5 val.</span>

                * Ekskursijos skirtos 9-12 klasių moksleiviams. Registracija vykdoma tik el. paštu turizmas@kaunasin.lt.<br><br>
                Laiške turi būti nurodyta:
                <ul>
                    <small><li>pageidaujama ekskursijos tema ir diena;</li></small> 
                    <small><li>mokykla, klasė, moksleivių skaičius (ne daugiau 25–30 asmenų);</li></small>
                    <small><li>lydinčio mokytojo vardas, pavardė, el. paštas ir kontaktinis tel. numeris.</li></small>
                </ul>
                Registracija laikoma patvirtinta tik tuomet, kai gaunate informacinį laišką su patvirtinimu. Kelios dienos prieš ekskursiją mokytojui el. paštu bus atsiųsta visa reikiama informacija

                <!-- <span><b>Birželio 9–20 d.</b> | Startuoja ekskursijų ciklas Kauno mokiniams: klasės bus kviečiamos tyrinėti ir pildyti žinių bagažą apie Laikinąją sostinę, turtingą Kauno architektūrą, Lenkijos pėdsakus mūsų mieste. Registracijos ir platesnė informacija dalyviams: <a href="https://docs.google.com/forms/d/e/1FAIpQLSdTmZ38qAFjH3kf8TKKiYoi4bVlbG1LllmVhN24My3yUtjqHg/viewform" target="_blank"> registracijos formoje.</a></span>

                <span><b>„Pažink Kauno modernizmą“:</b></span>
                <ul><li>Birželio 12 d. 10 val.</li>
                <li>Birželio 13 d. 10 val.</li>
                <li>Birželio 18 d. 10 val.</li>
                <li>Birželio 19 d. 10 val.</li>
                <li>Birželio 20 d. 10 val.</li>
                </ul>
                
                <span><b>„Lenkiški ženklai Kauno senamiestyje“:</b></span>
                <ul><li>Birželio 9 d. 10 val.</li>
                <li>Birželio 10 d. 10 val.</li>
                <li>Birželio 11 d. 10 val.</li>
                <li>Birželio 16 d. 10 val.</li>
                <li>Birželio 17 d. 10 val.</li>
                </ul>    -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="ehl-project-images">
            <img src="src/img/ehl-projektai/paveldas.png" alt="www.modernist.kaunas.lt">
            <img src="src/img/ehl-projektai/ehlb.png" alt="www.modernist.kaunas.lt">
            <img src="src/img/ehl-projektai/es.png" alt="www.modernist.kaunas.lt">
            <img src="src/img/ehl-projektai/kaunas.png" alt="www.modernist.kaunas.lt">
            <img src="src/img/ehl-projektai/tublin.png" alt="www.modernist.kaunas.lt">
        </div>
    </div>
    <div class="ehl-yellow-label">
        <div>
            <span>„Modernisto gidas“ – tavo žemėlapis  savarankiškiems Kauno UNESCO ir Europos paveldo ženklo pastatų tyrinėjimams!</span>
            <a class="btn-ehl" target="_blank" href="gidas_lt.pdf">Modernisto gidas</a>
        </div>
    </div>
    <div class="dark-bg">
        <div class="container">
            <div class="ehl-projects">
                <div class="content-text">
                    <h2>Projekto partneris – Liublinas</h2>

                    <span>Liublinas – devintas pagal dydį Lenkijos miestas ir svarbiausias Rytų Lenkijos centras. Tai Liublino vaivadijos sostinė,  regiono ekonomikos, mokslo ir kultūros centras, aktyviai bendradarbiaujantis tarptautiniu mastu, ypač su kaimynine Ukraina.</span>

                    <span>Lankytojus traukia išskirtinė, gerai išsilaikiusio viduramžių senamiesčio atmosfera, vietiniai patiekalai ir turtinga istorija, juntama kiekviename žingsnyje. 2029 m. Europos kultūros sostine tituluotas miestas kviečia pajusti energingą kultūros pulsą. Titulas miestui suteiktas ne be reikalo: čia verda socialinis gyvenimas, klesti menas, kasmet vyksta daugiau kaip 30 tarptautinių festivalių.</span>

                    <span>Liublinas laikomas vienu didžiausių akademinių centrų šalyje – devyniuose universitetuose studijuoja beveik 10 000 užsienio studentų.</span>

                    <div class="lublin-gallery">
                        <a href="src/img/ehl-projektai/1.jpg" data-lightbox="gallery-lublin" data-title="Vakarinė Liublino miesto panorama."><img src="src/img/ehl-projektai/1.jpg" alt=""></a>
                        <a href="src/img/ehl-projektai/2.jpg" data-lightbox="gallery-lublin" data-title="Liublino pilis - Nacionalinis Liublino muziejus."><img src="src/img/ehl-projektai/2.jpg" alt=""></a>
                        <a href="src/img/ehl-projektai/3.png" data-lightbox="gallery-lublin" data-title="Freskos Šventosios Trejybės koplyčioje Liublino pilyje."><img src="src/img/ehl-projektai/3.png" alt=""></a>
                        <a href="src/img/ehl-projektai/4.jpg" data-lightbox="gallery-lublin" data-title="Freskos Šventosios Trejybės koplyčioje Liublino pilyje."><img src="src/img/ehl-projektai/4.jpg" alt=""></a>
                    </div>

                    <span><b>Istorinė kultūrų ir prekybos kryžkelė</b></span>

                    <span>Liublinas – daugiau kaip 700 metų gyvuojanti istorinė kultūrų, religijų ir tautų kryžkelė. Miesto likimą nulėmė jo ypatinga lokacija. Čia nuo seno driekėsi vienas svarbiausių prekybos kelių, jungusių Juodąją jūrą su Baltijos uostais ir Vakarų Europa.</span>

                    <span>Pirmoji miesto pilis iškilo jau XII a., o XIII a. prie jos pastatyta mūrinė stovi iki šiol. XIV a., valdant Kazimierui Didžiajam, Liublinas virto tikra tvirtove, kurią nuo įsibrovėlių saugojo galingų sienų mūrinė pilis su koplyčia.</span>

                    <span>Dėl strateginės vietos tarp Vilniaus ir Krokuvos, miestas tapo svarbiu Jogailaičių dinastijai, čia dažnai apsistodavo pats karalius Vladislovas Jogaila. Garsaus karaliaus kronikininko Jano Dlugošo (pl. Jan Długosz) rūpesčiu čia buvo auklėjami karaliaus Kazimiero IV sūnūs. Maždaug 1520 metais karalius Žygimantas Senasis, padedamas italų meistrų iš Krokuvos, pradėjo viduramžių pilies pertvarkymą į renesansinę karališkąją rezidenciją.</span>

                    <span>1569 m. liepos 1 dieną pasirašyta Lenkijos Karalystės ir Lietuvos Didžiosios Kunigaikštystės unija, kuri įkūrė Abiejų Tautų Respubliką.</span>

                    
                    <div class="lublin-gallery">
                        <a href="src/img/ehl-projektai/5.jpg" data-lightbox="gallery-lublin2" data-title="LUBLIN"><img src="src/img/ehl-projektai/5.jpg" alt=""></a>
                        <a href="src/img/ehl-projektai/6.jpg" data-lightbox="gallery-lublin2" data-title="LUBLIN"><img src="src/img/ehl-projektai/6.jpg" alt=""></a>
                        <a href="src/img/ehl-projektai/7.jpg" data-lightbox="gallery-lublin2" data-title="LUBLIN"><img src="src/img/ehl-projektai/7.jpg" alt=""></a>
                        <a href="src/img/ehl-projektai/8.jpg" data-lightbox="gallery-lublin2" data-title="LUBLIN"><img src="src/img/ehl-projektai/8.jpg" alt=""></a>
                    </div>

                    <span><b>Paveldo miestas</b></span>

                    <span>2015 metais Liublino unijai suteiktas Europos paveldo ženklas, pripažįstant šį įvykį kaip vieną ryškiausių sąmoningų demokratinės integracijos pavyzdžių tarp dviejų valstybių, kuriose taikiai sugyveno skirtingų tautybių ir religijų žmonės.</span>

                    <span>Unijos atminimą mieste įamžina ne vienas išskirtinis paminklas su garbingu ženklu: Švenčiausiosios Trejybės koplyčia Liublino pilyje, Liublino unijos paminklas Lietuvių (pl. Litewski) aikštėje, Šv. vyskupo ir kankinio Stanislovo bazilika bei šalia esantis dominikonų vienuolynas.</span>

                    <span>Europos paveldo ženklas skiriamas siekiant pabrėžti vietų, turėjusių svarbią reikšmę Europos istorijoje ir kultūroje bei laikomų kertiniais šiandieninės Europos formavimosi taškais, simbolinę vertę. Liublino unijai suteiktas Europos paveldo ženklas padėjo atgaivinti Abiejų Tautų Respublikos – dviejų valstybių federacijos su vienu monarchu, bendru parlamentu ir reikšmingais įstatymų leidybos įgaliojimais – palikimą.</span>

                    <span>Daugiau informacijos <a target="_blank" href="https://www.lublin.eu">www.lublin.eu</a></span>

                    <iframe height="400" src="https://www.youtube.com/embed/WScTFeawDiM?si=LkHnaPBKr0uJCI3n" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.maptiler.com/maptiler-sdk-js/v2.2.2/maptiler-sdk.umd.js"></script>
    <script src="https://cdn.maptiler.com/leaflet-maptilersdk/v2.0.0/leaflet-maptilersdk.js"></script>
    
<?php include('assets/footer.inc.php'); ?>