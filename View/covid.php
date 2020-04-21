<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/global.css"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="js/include_header_footer.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>



    <style>
    .first_row {float: left;}
    .first_row section {width: 50%; float: left;}

    </style>
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
        <h3 style="text-align: center; margin-left: 10%; margin-right: 10%">This page is a dashboard containing some graphs, charts and histogram. You may
            find here the latest data about the evolution of the pandemic.</h3>

    </section>

    <section class="first_row" style="width: 500px; height: 300px; position: relative; margin-left: 5%">

        <canvas id="bar-chart" width=10" height="5"></canvas>


        <script>

            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                    labels: ["France", "Spain", "Germany", "Italy"],
                    datasets: [
                        {
                            label: "Total number of contamined (thousands)",
                            backgroundColor: ["#123450", "#123400", "#123000", "#120000"],
                            data: [120000, 130000, 119000, 170000]
                        }
                    ]
                },
                options: {
                    legend: {display: false},
                    title: {
                        display: true,
                        text: 'Total number of contamined (thousands)'
                    },

                    scales: {
                        yAxes: [{
                            ticks: { beginAtZero: true }
                        }]
                    }
                }
            });

        </script>
    </section>

    <section class="first_row" style="width: 500px; height: 300px; position: relative; margin-left: 5%">

        <canvas id="bar-chart2" width=10" height="5"></canvas>


        <script>

            new Chart(document.getElementById("bar-chart2"), {
                type: 'bar',
                data: {
                    labels: ["France", "Spain", "Germany", "Italy"],
                    datasets: [
                        {
                            label: "Total number of death (thousands)",
                            backgroundColor: ["blue", "red", "black", "green"],
                            data: [1, 2, 1.4, 3, 5]
                        }
                    ]
                },
                options: {
                    legend: {display: false},
                    title: {display: true, text: 'Total number of death in Europe (thousands)'},
                    scales: {
                        yAxes: [{
                            ticks: { beginAtZero: true }
                        }]
                    }
                }

            });
        </script>
    </section>

</main>

<footer>
    <div id="globalFooter">
        <script>addGlobalFooter();</script>
        </div>
</footer>

</body>
</html>
