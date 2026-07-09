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
            <li><a href="ehl-apie.php" class="active-ehl">Apie</a></li>
            <li><a href="ehl-pastatai.php" class="">Pastatai</a></li>
            <li><a href="ehl-projektai.php" class="">Projektai</a></li>
        </ul>
    </div>

    <div class="ehl-header">
        <div class="container">
            <h3>Europos Paveldo Ženklas</h3>
            <img src="src/img/paveldas.png" alt="">
            <span>
                1919–1939 m. Kaunui tapus laikinąja sostine ir svarbiausiu Lietuvos miestu, čia plūstelėjo Europoje sparčiai plitusi modernizmo idėja, apėmusi miesto kultūrinį, politinį architektūrinį lauką. Dygo nauji pastatai, architektūroje atsispindėjo europietiškos mokyklos bruožai. Laikinosios sostinės fenomenui, pavadintam „1919–1940 m. Kaunas” 2015 metais suteiktas prestižinis Europos paveldo ženklas (ang. European Heritage Label, EHL). <br><br>
            </span>
            <div class="main-ehl-info">
                <div>
                    <img src="src/img/EHL/ehl_1.svg" width="83" alt="www.modernist.kaunas.lt">
                    <p>
                    Europos paveldo ženklas yra Europos Komisijos kuruojama iniciatyva, kuria siekiama populiarinti atrinktų paveldo vietų istorinę ir kultūrinę svarbą Europai bei Europos Sąjungai. Šiuo metu EHL vienija daugiau nei šešias dešimtis Europos paveldo vietovių visoje Europos Sąjungoje. 
                    </p>
                </div>
                <div>
                    <img src="src/img/EHL/ehl_2.svg" width="104" alt="www.modernist.kaunas.lt">
                    <p>
                    Kaunas buvo laikinąja Lietuvos sostine 1919–1940 m. ir per šiuos dešimtmečius išgyveno tikrą statybų bumą, lėmusį unikalios modernizmo architektūros atsiradimą. Kaunas dažnai vadinamas „gyvuoju šio architektūros stiliaus muziejumi“.
                    </p>
                </div>
                <div>
                    <img src="src/img/EHL/ehl_3.svg" width="57" alt="www.modernist.kaunas.lt">
                    <p>
                    Kauno modernizmas atspindi įvairių tarptautinių įtakų, įskaitant Bauhauzą, Art Deco ir konstruktyvizmą, mišinį su ryškiu lietuvišku atspalviu. Kauno architektai nebijojo eksperimentuoti, todėl  čia sukurti vieni novatoriškiausių ir kūrybiškiausių to laikmečio projektų.
                    </p>
                </div>
                <div>
                    <img src="src/img/EHL/ehl_4.svg" width="227" alt="www.modernist.kaunas.lt">
                    <p>
                    Kaune yra daugiau nei 6 tūkst. tarpukario laikotarpio pastatų, todėl tai viena didžiausių modernizmo architektūros kolekcijų Europoje. Pasivaikščiojimas po Kauną – tarsi žingsnis atgal į XX a. pradžią.
                    </p>
                </div>
                <div>
                    <img src="src/img/EHL/ehl_5.svg" width="50" alt="www.modernist.kaunas.lt">
                    <p>
                    Daugelyje Kauno modernistinių pastatų vyrauja Art Deco stiliaus elementai, tačiau jie papildyti tradiciniais lietuviškais motyvais ir simboliais, sukuriama unikali stilių sintezė, kurianti miesto savitumą ir unikalumą.
                    </p>
                </div>
                <div>
                    <img src="src/img/EHL/ehl_6.svg" width="62" alt="www.modernist.kaunas.lt">
                    <p>
                    Kauno modernistinių pastatų architektūrą pamėgo kino kūrėjai: Kauno Naujamiestis ir Žaliakalnis tapo įvairių filmų fonu ar pagrindine filmavimo aikštele.
                    </p>
                </div>
            </div>

            <div class="ehl-link">
                <p>Apsilankykite oficialiame Europos paveldo ženklo puslapyje:</p>
                <a href="https://www.ehl-bureau.eu/en/project/kaunas-of-1919-1940/" target="_blank" class="btn-reverse">Ehl Biuras</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.maptiler.com/maptiler-sdk-js/v2.2.2/maptiler-sdk.umd.js"></script>
    <script src="https://cdn.maptiler.com/leaflet-maptilersdk/v2.0.0/leaflet-maptilersdk.js"></script>
    
<?php include('assets/footer.inc.php'); ?>