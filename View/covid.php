<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ecosphere - COVID-19 STATS</title>
    <link rel="icon"
          type="image/png"
          href="img/logo-icon.png">
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

<?php session_start();
if(!empty($_SESSION['name'])) {
?>
<header>
    <div id="header">
        <img id="ecosphere_logo" src="img/logo-paysage.png" alt="logo" width="195"/>
        <img id="isep_logo" src="img/logo-isep.png" alt="logo" width="60"/>

        <div id="banner">
            <nav class="navbar">
                <a href="user/user_homepage.php">Home</a>
                <a href="user/user_profile.php">Profile</a>
                <a href="user/all_articles.php">All articles</a>
                <a href="covid.php">COVID-19</a>
                <span>Hello <?php echo $_SESSION['name'];?></span><button class="//button" onclick="window.location.href='user/logout.php'">Logout</button>
            </nav>

        </div>


    </div>
</header>
<?php } else { ?>
<header>
    <div id="globalHeader">
        <script>addGlobalHeader();</script>
    </div>
</header>
<?php } ?>

<main>
    <section id="description" class="title-covid">
        <h1>Welcome!</h1>
        <h3>This page is a dashboard containing some
            graphs, charts and histogram. You may find here the latest data about the evolution of the pandemic.</h3>
        <h5>Last updates : May 20th, 2020</h5>
    </section>
    <br>

    <h3 class="title-covid">Overview on the situation all over the world:</h3>

    <div class="grid-2">

        <section class="sec_row">
            <h1>Total cases :</h1>
            <h2 id="totalCovid"></h2>
        </section>
        <section class="sec_row">
            <h1>Total deaths :</h1>
            <h2 id="deathCovid"></h2>
        </section>
        <section class="sec_row">
            <h1>Total cured :</h1>
            <h2 id="curedCovid"></h2>
        </section>
    </div>

    <h3 class="title-covid">Details on the principle countries affected:</h3>

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
            <canvas id="frDailyCases"></canvas>
        </section>
    </div>

    <h3 class="title-covid">Details on the situation in the USA (worst-affected country):</h3>

    <div class="grid-2">
        <section class="sec_row">
            <canvas id="usaTotal"></canvas>
        </section>

        <section class="sec_row">
            <canvas id="usaDeath"></canvas>
        </section>

        <section class="sec_row">
        <canvas id="usaDailyCases"></canvas>
        </section>
    </div>


</main>

<footer>
    <div id="globalFooter">
        <script>addGlobalFooter();</script>
    </div>
</footer>

<script type="text/javascript" src="covid/franceData.js"></script>
<script type="text/javascript" src="covid/countriesData.js"></script>
<script type="text/javascript" src="covid/usaData.js"></script>
<script type="text/javascript" src="covid/globalData.js"></script>
</body>
</html>
