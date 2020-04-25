var jsonfile = {
    "USA": [{
        "date": "01-03",
        "tot": 75,
        "death": 1,
        "daily": 0
    }, {
        "date": "04-03",
        "tot": 158,
        "death": 11,
        "daily": 0
    }, {
        "date": "07-03",
        "tot": 435,
        "death": 19,
        "daily": 0
    }, {
        "date": "10-03",
        "tot": 994,
        "death": 30,
        "daily": 290
    }, {
        "date": "14-03",
        "tot": 2771,
        "death": 58,
        "daily": 588
    }, {
        "date": "17-03",
        "tot": 6357,
        "death": 121,
        "daily": 1753
    }, {
        "date": "20-03",
        "tot": 19551,
        "death": 309,
        "daily": 5653
    }, {
        "date": "24-03",
        "tot": 55398,
        "death": 957,
        "daily": 11209
    }, {
        "date": "27-03",
        "tot": 105217,
        "death": 2110,
        "daily": 18838
    }, {
        "date": "30-03",
        "tot": 168177,
        "death": 4066,
        "daily": 23197
    }, {
        "date": "03-04",
        "tot": 283477,
        "death": 8839,
        "daily": 32769
    }, {
        "date": "07-04",
        "tot": 409225,
        "death": 15526,
        "daily": 33877
    }, {
        "date": "10-04",
        "tot": 509604,
        "death": 22038,
        "daily": 34089
    }, {
        "date": "14-04",
        "tot": 621953,
        "death": 30081,
        "daily": 27260
    }, {
        "date": "17-04",
        "tot": 714822,
        "death": 37448,
        "daily": 32368
    }, {
        "date": "20-04",
        "tot": 798145,
        "death": 42853,
        "daily": 28131
    }, {
        "date": "24-04",
        "tot": 925232,
        "death": 52193,
        "daily": 38958
    }, {
        "date": "27-04",
        "tot": 0,
        "death": 0,
        "daily": 0
    }, {
        "date": "30-04",
        "tot": 0,
        "death": 0,
        "daily": 0
    }, {
        "date": "04-05",
        "tot": 0,
        "death": 0,
        "daily": 0
    }, {
        "date": "07-05",
        "tot": 0,
        "death": 0,
        "daily": 0
    }, {
        "date": "10-05",
        "tot": 0,
        "death": 0,
        "daily": 0
    }, {
        "date": "14-05",
        "tot": 0,
        "death": 0,
        "daily": 0
    }, {
        "date": "17-05",
        "tot": 0,
        "death": 0,
        "daily": 0
    }, {
        "date": "20-05",
        "tot": 0,
        "death": 0,
        "daily": 0
    }]
};
var labels = jsonfile.USA.map(function(e) {
    return e.date;
});
var total = jsonfile.USA.map(function(e) {
    return e.tot;
});
var death = jsonfile.USA.map(function(e) {
    return e.death;
});
var daily = jsonfile.USA.map(function(e) {
    return e.daily;
});

var ctx = usaTotal.getContext('2d');
var config = {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Total contamined',
            data: total,
            backgroundColor: 'rgba(0,119,204,0.3)'
        }]
    }
};

var ctx2 = usaDeath.getContext('2d');
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

var ctx3 = usaDailyCases.getContext('2d');
var config3 = {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Daily cases',
            data: daily,
            backgroundColor: 'rgba(0, 119, 204, 0.3)'
        }]
    }
};

var chart = new Chart(ctx, config);
var chart2 = new Chart(ctx2, config2);
var chart3 = new Chart(ctx3, config3);
