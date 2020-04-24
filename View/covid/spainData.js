var jsonfile = {
    "Spain": [{
        "date": "01-01-2020",
        "tot": 1,
        "death": 2,
        "cured": 0
    }, {
        "date": "01-02-2020",
        "tot": 10,
        "death": 4,
        "cured": 0
    }, {
        "date": "01-03-2020",
        "tot": 14,
        "death": 3,
        "cured": 5
    }, {
        "date": "01-04-2020",
        "tot": 11,
        "death": 5,
        "cured": 1
    }]
};
var labels = jsonfile.Spain.map(function(e) {
    return e.date;
});
var total = jsonfile.Spain.map(function(e) {
    return e.tot;
});
var death = jsonfile.Spain.map(function(e) {
    return e.death;
});
var cured = jsonfile.Spain.map(function(e) {
    return e.cured;
});

var ctx = spainTotal.getContext('2d');
var config = {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total contamined',
            data: total,
            backgroundColor: 'rgba(0, 119, 204, 0.3)'
        }]
    }
};

var ctx2 = spainDeath.getContext('2d');
var config2 = {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total death',
            data: death,
            backgroundColor: 'rgba(0, 119, 204, 0.3)'
        }]
    }
};

var ctx3 = spainCured.getContext('2d');
var config3 = {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total cured',
            data: cured,
            backgroundColor: 'rgba(0, 119, 204, 0.3)'
        }]
    }
};

var chart = new Chart(ctx, config);
var chart2 = new Chart(ctx2, config2);
var chart3 = new Chart(ctx3, config3);
