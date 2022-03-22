// Api Rest del CRUD sobre 'propiedades' según especificación JSON:API
// 
// Autenticación: No incluida
// Verbos y cabeceras de la petición son correctas.
// Sin manejo de errores
// Método: XMLHttpRequest, en un futuro se creará una versión con fetch y/o axios
// status: en desarrollo

function generarTablaPropiedades(response) {
    respuesta = '<div class="content"><table id="propiedades" class="table table-head-fixed text-nowrap table-striped table-bordered">'
            + '<thead><tr><th>Siglas</th><th>Fecha</th><th>Cod</th><th>Concepto</th><th>Importe</th><th>Saldo</th></tr></thead><tbody>';
    for (let item of response) {
        respuesta += '<tr><td>'
                + item.siglas + '</td><td>'
                + item.fecha + '</td><td>'
                + item.propiedad + '</td><td>'
                + item.concepto + '</td><td class="text-right">'
                + item.importe + '</td><td class="text-right">'
                + item.saldo + '</td></tr>';
    }
    return respuesta + '</tbody></table></div>';
}

/* usando ajax con javascript  w3schools curso Ajax*/
function api_propiedades_index() {
    const xhr = new XMLHttpRequest();
    xhr.responseType = 'json';   

    xhr.onload = function () {
        document.getElementById('respuesta').innerHTML = generarTablaPropiedades(this.response);
//   también
//        document.getElementById('respuesta').innerHTML=xhr.response;
    };

    xhr.open('GET', '/api/v1/propiedades', true);
    xhr.setRequestHeader('Accept', 'application/vnd.api+json');
    xhr.send();
}

/* usando ajax con javascript  w3schools curso Ajax*/
function api_propiedades_show() {
    const xhr = new XMLHttpRequest();
    xhr.responseType = 'json';   

    xhr.onload = function () {
        document.getElementById('respuesta').innerHTML = 'Peito' + xhr.response + "<p>Movimiento creado</p>";
//   también
//        document.getElementById('respuesta').innerHTML=xhr.responseText;
    };

    xhr.open('GET', '/api/v1/propiedades/1', true);
    xhr.setRequestHeader('Accept', 'application/vnd.api+json');
    xhr.send("name=RafaelAndión&apellido=Fernandez"); // {"name": "Rafael Andiión"}
}

/* usando ajax con javascript  w3schools curso Ajax*/
function api_propiedades_create() {
    const xhr = new XMLHttpRequest();
    xhr.responseType = 'json';   

    xhr.onload = function () {
        document.getElementById('respuesta').innerHTML = 'Peito' + xhr.response + "<p>Movimiento creado</p>";
//   también
//        document.getElementById('respuesta').innerHTML=xhr.responseText;
    };

    xhr.open('POST', '/api/v1/propiedades', true);
    xhr.setRequestHeader('Content-Type', 'application/vnd.api+json');
    xhr.setRequestHeader('Accept', 'application/vnd.api+json');
    xhr.send("name=RafaelAndión&apellido=Fernandez"); // {"name": "Rafael Andiión"}
}


function api_propiedades_update() {
    const xhr = new XMLHttpRequest();
    xhr.responseType = 'json';   

    xhr.onload = function () {
        document.getElementById('respuesta').innerHTML = 'Peito' + xhr.response + "<p>Movimiento creado</p>";
//   también
//        document.getElementById('respuesta').innerHTML=xhr.responseText;
    };

    xhr.open('PATCH', '/api/v1/propiedades', true);
    xhr.setRequestHeader('Content-Type', 'application/vnd.api+json');
    xhr.setRequestHeader('Accept', 'application/vnd.api+json');
    xhr.send("name=RafaelAndión&apellido=Fernandez"); // {"name": "Rafael Andiión"}
}

/* usando ajax con javascript  w3schools curso Ajax*/
function api_propiedades_destroy() {
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        document.getElementById('respuesta').innerHTML = "<p>Movimiento borrado</p>";
//   también
//        document.getElementById('respuesta').innerHTML=xhr.responseText;
    };

    xhr.open('DELETE', '/api/v1/propiedades/3', true);
    xhr.setRequestHeader('Accept', 'application/vnd.api+json');
    xhr.send();
}


$(document).ready(function () {
    $('#propiedades').DataTable({
        "scrollY": "600px",
        "scrollCollapse": true,
        "paging": false
    });
});
