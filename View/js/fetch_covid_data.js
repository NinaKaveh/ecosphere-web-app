const ul = document.getElementById('latest_covid_data');
const countries = ["USA", "France", "Spain", "Germany", "Italy"]
const url = 'https://coronavirus-19-api.herokuapp.com/countries/';

ul.innerHTML=`<thead>
                <tr>
                    <th>Country</th>
                    <th>Total cases</th>
                    <th>Total deaths</th>
                    <th>Total recovered</th>
                </tr>
            </thead>
<tbody>`


countries.forEach(country_name => {
    fetch(url + country_name)
        .then((response) => response.json())

        .then(function (data) {
            ul.innerHTML += `<tr> 
                                <td>${data.country}</td>
                                <td>${data.cases} </td>
                                <td> ${data.deaths} </td>
                                <td>${data.recovered}</td> 
                            </tr>`;
            console.log(data)
        })

        .catch(function (error) {
            console.log(JSON.stringify(error));
        });
});

ul.innerHTML += `</tbody>`
