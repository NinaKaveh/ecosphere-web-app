var global = {
    "total": 1343535,
    "cured": 34340,
    "death": 0
};
var total = global.total;
var cured = global.cured;
var death = global.death;


$(document).ready(function() {
    $('#totalCovid').text(total);
    $('#curedCovid').text(cured);
    $('#deathCovid').text(death);
});
