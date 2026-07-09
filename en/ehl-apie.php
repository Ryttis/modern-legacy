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
            <li><a href="ehl-apie.php" class="active-ehl">About</a></li>
            <li><a href="ehl-pastatai.php" class="">Buildings</a></li>
            <li><a href="ehl-projektai.php" class="">Projects</a></li>
        </ul>
    </div>

    <div class="ehl-header">
        <div class="container">
            <h3>European Heritage Label</h3>
            <img width="120" src="src/img/paveldas_en.png" alt="">
            <span>
                Between 1919 and 1939, Kaunas was not just the temporary capital of Lithuania, but also a cultural epicenter where modernist architectural ideals from Europe took root. New buildings sprang up, embodying the characteristics of European architectural schools. The phenomenon of the temporary capital, named "Kaunas 1919–1940," was awarded the prestigious European Heritage Label (EHL) in 2015. <br><br>
            </span>
            <div class="main-ehl-info">
                <div>
                    <img src="src/img/EHL/ehl_1.svg" width="83" alt="www.modernist.kaunas.lt">
                    <p>
                    The European Heritage Label is an initiative managed by the European Commission, aimed at promoting the historical and cultural significance of selected heritage sites to Europe and the European Union. Currently, the EHL unites more than sixty heritage sites across the European Union. 
                    </p>
                </div>
                <div>
                    <img src="src/img/EHL/ehl_2.svg" width="104" alt="www.modernist.kaunas.lt">
                    <p>
                    As the provisional capital of Lithuania from 1919 to 1940, the city underwent a construction boom, giving rise to its unique modernist identity that still stands today. Kaunas is often hailed as "the living museum of modernist architecture," a city where history and design blend seamlessly.
                    </p>
                </div>
                <div>
                    <img src="src/img/EHL/ehl_3.svg" width="57" alt="www.modernist.kaunas.lt">
                    <p>
                    Kaunas modernism reflects a mix of various international influences, including Bauhaus, Art Deco, and Constructivism, with a distinctive Lithuanian Flavour. Kaunas architects were fearless in their experimentation, resulting in some of the most innovative and forward-thinking projects of the era.
                    </p>
                </div>
                <div>
                    <img src="src/img/EHL/ehl_4.svg" width="227" alt="www.modernist.kaunas.lt">
                    <p>
                    Kaunas’ modernist architectural collection is one of the largest in Europe, with over 6,000 interwar buildings. Walking through the streets of Kaunas is like stepping into the early 20th century.
                    </p>
                </div>
                <div>
                    <img src="src/img/EHL/ehl_5.svg" width="50" alt="www.modernist.kaunas.lt">
                    <p>
                    Many buildings showcase Art Deco elements, but with a twist – traditional Lithuanian motifs and symbols weave through the designs, creating a unique fusion that sets Kaunas apart from other modernist hubs.
                    </p>
                </div>
                <div>
                    <img src="src/img/EHL/ehl_6.svg" width="62" alt="www.modernist.kaunas.lt">
                    <p>
                    This architectural treasure trove has not gone unnoticed in the film world: Kaunas' Naujamiestis and Žaliakalnis districts have served as the backdrop for numerous films.
                    </p>
                </div>
            </div>

            <div class="ehl-link">
                <p>European Heritage Label Office:</p>
                <a href="https://www.ehl-bureau.eu/en/project/kaunas-of-1919-1940/" target="_blank" class="btn-reverse">EHL-bureau</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.maptiler.com/maptiler-sdk-js/v2.2.2/maptiler-sdk.umd.js"></script>
    <script src="https://cdn.maptiler.com/leaflet-maptilersdk/v2.0.0/leaflet-maptilersdk.js"></script>
    
<?php include('assets/footer.inc.php'); ?>