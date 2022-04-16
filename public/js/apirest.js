function generarTabla(response) {
    respuesta = '<div class="content"><table id="movimientos_table" class="table table-head-fixed text-nowrap table-striped table-bordered">'
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

function api_js_leer_movimientos() {
    // esta rellamada se eliminará, llamando directamente a la función correspndiente
    // se hace porque así pruebo el crud usando el mismo botón en la página; por pereza ;-)
    api_js_index_movimientos();
//    api_js_create_movimiento();
}

/* usando ajax con javascript  w3schools curso Ajax*/
function api_js_index_movimientos() {
    const xhr = new XMLHttpRequest();
    xhr.responseType = 'json';   // parsea la respuesta a formato json

    xhr.onload = function () {
        document.getElementById('respuesta').innerHTML = generarTabla(this.response);
        $('#movimientos_table').DataTable({
            "scrollY": "43vW",
            "scrollCollapse": true,
            "paging": false,
        });
//   también
//        document.getElementById('respuesta').innerHTML=xhr.response;
    };

    xhr.open('GET', '/api/v1/movimientos', true);
    xhr.setRequestHeader('Content-Type', 'application/vnd.api+json');
    xhr.setRequestHeader('Accept', 'application/vnd.api+json');
    xhr.send();
}

/* usando ajax con javascript  w3schools curso Ajax*/
function api_js_create_movimiento() {
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        document.getElementById('respuesta').innerHTML = 'Peito' + xhr.response + "<p>Movimiento creado</p>";
//   también
//        document.getElementById('respuesta').innerHTML=xhr.responseText;
    };

    xhr.open('POST', '/api/v1/movimientos', true);
    xhr.setRequestHeader('Content-Type', 'application/vnd.api+json');
    xhr.setRequestHeader('Accept', 'application/vnd.api+json');
    xhr.send("name=RafaelAndión&apellido=Fernandez"); // {"name": "Rafael Andión"}
}

//  Añadir o eliminar filas en una tabla
// https://programmerclick.com/article/526019720/


// funcion auxiliar para borrar fila de una tabla
// https://es.stackoverflow.com/questions/9141/eliminar-fila-de-tabla-html-con-jquery-o-js
$(function () {
    $(document).on('click', '.borrar', function (event) {
        event.preventDefault();
        $(this).closest('tr').remove();
    });
});

// otra forma
//https://byspel.com/eliminar-fila-de-tabla-html-con-javascript/
function Eliminar(i) {
    document.getElementById('tblProductos').deleteRow(i);
}


//otra forma
// https://foroayuda.es/como-eliminar-una-fila-en-una-tabla-html-usando-el-ejemplo-de-codigo-javascript/
//document.getElementById("myTable").deleteRow(0); 		// First row
//document.getElementById("myTable").deleteRow(-1);		// Last row 

function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("myTable").deleteRow(i);
}
////////////////////////////////

/* usando ajax con javascript  w3schools curso Ajax*/
function api_js_destroy_movimientos() {
    const xhr = new XMLHttpRequest();
    xhr.onload = function () {
        document.getElementById('respuesta').innerHTML = "<p>Movimiento borrado</p>";
//   también
//        document.getElementById('respuesta').innerHTML=xhr.responseText;
    };

    xhr.open('DELETE', '/api/v1/movimientos/3', true);
    xhr.setRequestHeader('Content-Type', 'application/vnd.api+json');
    xhr.setRequestHeader('Accept', 'application/vnd.api+json');
    xhr.send();
}



/* usando fetch  */
function api_fetch_index_movimientos() {
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
                document.getElementById("respuesta").innerHTML = generarTabla(JSON.parse(data));
            })
            .catch(err => {
                console.error("ERROR: ", err.message);
            });
}


/* usando axios */
function api_axios_index_movimientos() {
    axios.get("/api/v1/movimientos", {
        responseType: 'json'
    })
            .then(function (res) {
                if (res.status == 200) {
                    console.log(res.data);
                    document.getElementById("respuesta").innerHTML = generarTabla(res.data);

                }
            })
            .catch(function (err) {
                console.log(err);
            });

}

$(document).ready(function () {
    document.getElementById('movimientos').addEventListener('click', api_js_leer_movimientos);
});


