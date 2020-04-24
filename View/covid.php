<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/global.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="js/include_header_footer.js"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
</head>
<body>
<header>
    <div id="globalHeader">
        <script>addGlobalHeader();</script>
    </div>
</header>

<main>
    <section id="description">
        <h1 style="text-align: center">Welcome!</h1>
        <h3 style="text-align: center; margin-left: 10%; margin-right: 10%">This page is a dashboard containing some
            graphs, charts and histogram. You may find here the latest data about the evolution of the pandemic.</h3>
    </section>
    <br>

    <h3 class="title-covid">Overview on the situation all over the world:</h3>
    <div class="grid">
        <div class="first_row">
            <canvas id="globalTotal"></canvas>
        </div>
        <div class="first_row">
            <canvas id="globalPie"></canvas>
        </div>
        <div class="first_row">
            <canvas id="globalCured"></canvas>
        </div>
        <div class="first_row">
            <canvas id="globalDeath"></canvas>
        </div>
    </div>


    <h3 class="title-covid">Details on the situation in France:</h3>
    <div class="grid-2">
        <section class="sec_row">
            <canvas id="frTotal"></canvas>
        </section>

        <section class="sec_row">
            <canvas id="frDeath"></canvas>
        </section>

        <section class="sec_row">
            <canvas id="frCured"></canvas>
        </section>
    </div>

    <h3 class="title-covid">Details on the situation in the USA (worst-affected country):</h3>

    <div class ="grid-2">
        <section class="sec_row">
            <canvas id="usaTotal"></canvas>
        </section>

        <section class="sec_row">
            <canvas id="usaDeath"></canvas>
        </section>

        <section class="sec_row"">
            <canvas id="usaCured"></canvas>
        </section>
    </div>


    <h3 class="title-covid">Details on the situation in Spain:</h3>

    <div class ="grid-2">
        <section class="sec_row">
            <canvas id="spainTotal"></canvas>
        </section>

        <section class="sec_row">
            <canvas id="spainDeath"></canvas>
        </section>

        <section class="sec_row"">
            <canvas id="spainCured"></canvas>
        </section>
    </div>


</main>




<footer>
    <div id="globalFooter">
        <script>addGlobalFooter();</script>
    </div>
</footer>

<script type="text/javascript" src="covid/franceData.js"></script>
<script type="text/javascript" src="covid/globalData.js"></script>
<script type="text/javascript" src="covid/usaData.js"></script>
<script type="text/javascript" src="covid/spainData.js"></script>
</body>
</html>
