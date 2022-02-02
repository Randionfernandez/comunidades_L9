function generarTabla(response){
    const datos= JSON.parse(response);
    respuesta='<table class="table table-striped table-bordered"><thead><tr><th>Fecha</th><th>Concepto</th><th>Importe</th></tr></thead><tbody>';
    for(let item of datos){
        respuesta+='<tr><td>' 
                + item.fecha + '</td><td>'
                + item.concepto + '</td><td>' 
                + item.importe + '</td></tr>';
    }
    return respuesta + '</tbody></table>';
}


/* usando ajax con javascript  w3schools curso Ajax*/
function api_js_leer_movimientos() {
    console.log('Entrando en la unción AJAX');
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById('respuesta').innerHTML=generarTabla(this.responseText);
//   también
//        document.getElementById('respuesta').innerHTML=xhttp.responseText;
    };

    xhttp.open('GET', '/api/v1/movimientos', true);
    xhttp.send();
}



/* usando fetch  */
function api_fetch_leer_movimientos() {
    const options = {
        method: "GET",
        headers: {
            "Content-type": "application/vnd.api+json",
            "Accept": "application/vnd.api+json"
        }
    };
    fetch("/api/v1/movimientos", options)
            .then(response => {
                if (response.ok)
                    return response.text();
                else
                    throw new Error(response.status);
            })
            .then(data => {

                document.getElementById("respuesta").innerHTML = generarTabla(data);
            })
            .catch(err => {
                console.error("ERROR: ", err.message);
            });
}


/* usando axios */
function api_axios_leer_movimientos() {
    axios.get("/api/v1/movimientos", {
        responseType: 'json'
    })
            .then(function (res) {
                if (res.status == 200) {
                    console.log(res.data);
                    document.getElementById("respuesta").innerHTML = res.data;

                }
                console.log(res);
            })
            .catch(function (err) {
                console.log(err);
            });

}
