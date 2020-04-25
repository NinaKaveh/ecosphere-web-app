var countries = {
    "Global": [{
        "name": "USA",
        "tot": 1,
        "cured": 0,
        "death": 0
    }, {
        "name": "Spain",
        "tot": 10,
        "cured": 10,
        "death": 0
    }, {
        "name": "Italy",
        "tot": 14,
        "cured": 10,
        "death": 5
    }, {
        "name": "Germany",
        "tot": 11,
        "cured": 10,
        "death": 5
    }, {
        "name": "France",
        "tot": 11,
        "cured": 10,
        "death": 7
    }]
};
var labels = countries.Global.map(function(e) {
    return e.name;
});
var total = countries.Global.map(function(e) {
    return e.tot;
});
var death = countries.Global.map(function(e) {
    return e.death;
});
var cured = countries.Global.map(function(e) {
    return e.cured;
});


var ctx = globalTotal.getContext('2d');
var config = {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total contamined',
            data: total,
            backgroundColor: 'rgba(0, 119, 204, 0.3)'
        }]
    }
};

var ctx2 = globalDeath.getContext('2d');
var config2 = {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total death',
            data: death,
            backgroundColor: 'rgba(0, 119, 204, 0.3)'
        }]
    }
};

var ctx3 = globalCured.getContext('2d');
var config3 = {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total cured',
            data: cured,
            backgroundColor: 'rgba(0, 119, 204, 0.3)'
        }]
    }
};


var ctx4 = globalPie.getContext('2d');
var config4 = {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total contamined',
            data: total,
            backgroundColor: ["#123450", "#123400", "#123000", "#120000","#0077cc"],
        }]
    }
};


var chart = new Chart(ctx, config);
var chart2 = new Chart(ctx2, config2);
var chart3 = new Chart(ctx3, config3);
var chart4 = new Chart(ctx4, config4);

