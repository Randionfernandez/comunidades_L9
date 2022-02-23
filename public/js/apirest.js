function generarTabla(response) {
    respuesta = '<div class="content"><table id="movimientos" class="table table-head-fixed text-nowrap table-striped table-bordered">'
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
    api_js_index_movimientos();
//    api_js_create_movimiento();
}

/* usando ajax con javascript  w3schools curso Ajax*/
function api_js_index_movimientos() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById('respuesta').innerHTML = generarTabla(JSON.parse(this.responseText));
//   también
//        document.getElementById('respuesta').innerHTML=xhttp.responseText;
        $(document).ready(function () {
            $('#movimientos').DataTable({
                "scrollY": "550px",
                "scrollCollapse": true,
                "paging": false
            });
        });
    };

    xhttp.open('GET', '/api/v1/movimientos', true);
    xhttp.setRequestHeader('Content-Type', 'application/vnd.api+json');
    xhttp.setRequestHeader('Accept', 'application/vnd.api+json');
    xhttp.send();
}

/* usando ajax con javascript  w3schools curso Ajax*/
function api_js_create_movimiento() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById('respuesta').innerHTML = "<p>Movimiento creado</p>";
//   también
//        document.getElementById('respuesta').innerHTML=xhttp.responseText;
    };

    xhttp.open('POST', '/api/v1/movimientos', true);
    xhttp.setRequestHeader('Content-Type', 'application/vnd.api+json');
    xhttp.setRequestHeader('Accept', 'application/vnd.api+json');
    xhttp.send("name=Observador&guard_name=web");
}

//  Añadir o eliminar filar en una tabla
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
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById('respuesta').innerHTML = "<p>Movimiento borrado</p>";
//   también
//        document.getElementById('respuesta').innerHTML=xhttp.responseText;
    };

    xhttp.open('DELETE', '/api/v1/movimientos/3', true);
    xhttp.setRequestHeader('Content-Type', 'application/vnd.api+json');
    xhttp.setRequestHeader('Accept', 'application/vnd.api+json');
    xhttp.send();
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
