$(function (){
    CargarPracticas();

    function CargarPracticas(){
        $.getJSON(site_url+"/OPP",
            function (data, textStatus, jqXHR) {
                console.log(data);
                $("#tbodyPracticas").empty();
                if(data.status != 404){
                    Bitacoras = data.data;
                    var x = "";
                    $.each(data.data, function (i, v) { 
                         x += `<tr><td>${v.Id}</td><td>${v.RutAlumno}</td><td>${v.NombreAlumno}</td><td>${v.Practica}</td><td>${v.FechaInicio}</td><td>${v.FechaFin}</td><td><a class="btn btn-sm btn-primary">Alumno</a><a class="btn btn-sm btn-primary">Profesor</a><a class="btn btn-sm btn-primary">Guia</a></td><td><button id='Detalle' value='${v.Id}' class='btn btn-sm btn-warning' >Detalle</button></td></tr>`;
                    });
                    $("#tbodyPracticas").append(x);
                }
            }
        );
    }

});