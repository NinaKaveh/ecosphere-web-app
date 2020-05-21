var countries = {
    "Global": [{
        "name": "USA",
        "tot":1593486,
        "cured": 370971,
        "death": 94963
    }, {
        "name": "Spain",
        "tot": 279524,
        "cured":196958,
        "death": 27888
    }, {
        "name": "Italy",
        "tot": 227364,
        "cured": 134560,
        "death":32330
    }, {
        "name": "Germany",
        "tot": 178531,
        "cured": 158000,
        "death": 8270
    }, {
        "name": "France",
        "tot": 181575,
        "cured": 63354,
        "death": 28132
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
            backgroundColor: [
                'rgba(135,135,135,0.8)',
                'rgba(36,95,135,0.8)',
                'rgba(92,52,135,0.8)',
                'rgba(50,135,135,0.8)',
                'rgba(135,52,83,0.8)',
                'rgba(135,84,35,0.8)'],
        }]
    }
};


var chart = new Chart(ctx, config);
var chart2 = new Chart(ctx2, config2);
var chart3 = new Chart(ctx3, config3);
var chart4 = new Chart(ctx4, config4);

