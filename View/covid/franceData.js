var jsonfile = {
    "France": [{
        "date": "01-03",
        "tot": 130,
        "death": 2,
        "daily": 0
    }, {
        "date": "04-03",
        "tot": 285,
        "death": 4,
        "daily": 138
    }, {
        "date": "07-03",
        "tot": 949,
        "death": 16,
        "daily": 300
    }, {
        "date": "10-03",
        "tot": 1784,
        "death": 33,
        "daily": 374
    }, {
        "date": "14-03",
        "tot": 4499,
        "death": 91,
        "daily": 785
    }, {
        "date": "17-03",
        "tot": 7730,
        "death": 175,
        "daily": 1097
    }, {
        "date": "20-03",
        "tot": 12612,
        "death": 450,
        "daily": 1617
    }, {
        "date": "24-03",
        "tot": 22304,
        "death": 1100,
        "daily": 2448
    }, {
        "date": "27-03",
        "tot": 32964,
        "death": 1995,
        "daily": 3809
    }, {
        "date": "30-03",
        "tot": 44550,
        "death": 3024,
        "daily": 7578
    }, {
        "date": "03-04",
        "tot": 76460,
        "death": 6507,
        "daily": 2116
    }, {
        "date": "07-04",
        "tot": 99180,
        "death": 10328,
        "daily": 8728
    }, {
        "date": "10-04",
        "tot": 113927,
        "death": 13197,
        "daily": 6231
    }, {
        "date": "14-04",
        "tot": 130253,
        "death": 15729,
        "daily": 5955
    }, {
        "date": "17-04",
        "tot": 143116,
        "death": 18681,
        "daily": 7128
    }, {
        "date": "20-04",
        "tot": 150278,
        "death": 20265,
        "daily": 2434
    }, {
        "date": "24-04",
        "tot": 159828,
        "death": 22245,
        "daily": 1645
    }, {
        "date": "27-04",
        "tot": 163273,
        "death": 23293,
        "daily": 1173
    }, {
        "date": "30-04",
        "tot": 167178,
        "death": 24376,
        "daily": 758
    }, {
        "date": "04-05",
        "tot": 169462,
        "death": 25201,
        "daily": 769
    }, {
        "date": "07-05",
        "tot": 174791,
        "death": 25987,
        "daily": 600
    }, {
        "date": "10-05",
        "tot": 176970,
        "death": 26380,
        "daily": 312
    }, {
        "date": "14-05",
        "tot": 178870,
        "death": 27425,
        "daily": 810
    }, {
        "date": "17-05",
        "tot": 179569,
        "death": 28108,
        "daily": 204
    }, {
        "date": "20-05",
        "tot": 181575,
        "death": 28132,
        "daily": 766
    }]
};
var labels = jsonfile.France.map(function(e) {
    return e.date;
});
var total = jsonfile.France.map(function(e) {
    return e.tot;
});
var death = jsonfile.France.map(function(e) {
    return e.death;
});
var daily = jsonfile.France.map(function(e) {
    return e.daily;
});

var ctx = frTotal.getContext('2d');
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

var ctx2 = frDeath.getContext('2d');
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

var ctx3 = frDailyCases.getContext('2d');
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
