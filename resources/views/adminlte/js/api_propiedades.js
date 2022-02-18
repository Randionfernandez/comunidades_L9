/* usando axios */
function api_axios_crear_propiedades() {
    axios.post("propiedades", {
        data: {
            denominacion: '1C',
            parte: '15',
            coeficiente: '7.60',
            domiciliada: 'false',
            iban: '12345678901234567890',
            tipo: 'NCN',
        },
        responseType: 'json',
    })
            .then(function (res) {
                if (res.status == 200) {
                    console.log(res.data);
                    document.getElementById("respuesta").innerHTML = console.log(res);
                }
            })
            .catch(function (err) {
                console.log(err);
            });

}