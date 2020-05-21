var global = {
    "total": 5119004,
    "cured": 2042948,
    "death": 330399
};
var total = global.total;
var cured = global.cured;
var death = global.death;


$(document).ready(function() {
    $('#totalCovid').text(total);
    $('#curedCovid').text(cured);
    $('#deathCovid').text(death);
});
