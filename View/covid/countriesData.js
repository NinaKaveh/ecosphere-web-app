var countries = {
    "Global": [{
        "name": "USA",
        "tot":200001,
        "cured": 12220,
        "death": 3430
    }, {
        "name": "Spain",
        "tot": 133435,
        "cured":34410,
        "death": 3650
    }, {
        "name": "Italy",
        "tot": 134534,
        "cured": 13430,
        "death":34345
    }, {
        "name": "Germany",
        "tot": 133431,
        "cured": 13430,
        "death": 534
    }, {
        "name": "France",
        "tot": 110000,
        "cured": 13430,
        "death": 7545
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
