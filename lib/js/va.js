$(function(){
    ComprobarPractica();
    CargarBitacoras();

    function CargarBitacoras(){
        $.getJSON(site_url+"/OBA",
            function (data, textStatus, jqXHR) {
                console.log(data);
                $("#tbodyBitacora").empty();
                if(data.status != 404){
                    var x = "";
                    $.each(data.data, function (i, v) { 
                         x += `<tr><td>${v.Id}</td><td class='truncatetext'>${v.Texto}</td><td>${v.Fecha}</td><td><button id='${v.Id}' class='btn btn-sm btn-warning' >Editar</button></td></tr>`;
                    });
                    $("#tbodyBitacora").append(x);
                }
            }
        );
    }

    function ComprobarPractica(){
        $.getJSON(site_url+"/OPA",
            function (data, textStatus, jqXHR) {
                console.log(data);
                console.log(data.status);
                if(data.status == 404){
                    $("#row-txt_btn").addClass("d-none");
                    $("#row-txt_btn").fadeIn();
                    $("#tablaBitacora").addClass("d-none");
                    $("#no_practica").removeClass("d-none");
                }
            }
        );
    }

    $("#formAgregarBitacora").on("submit", function (e) {
        e.preventDefault();
        console.log("Capturado");
        var form = $('#formAgregarBitacora')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        $.ajax({
            url: site_url + "/AEB",
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false
        }).done(function (msg) {
            var msgjson = JSON.parse(msg);
            
            console.log(msg);
            if(msgjson.status == 200){
                CargarBitacoras();
                $("#mdAgregarRegistro").modal("hide");
            }else if(msgjson.status == 404){
                console.warn(msgjson.data);
            }else{
                console.error("Error desconocido");
                
            }
        }).fail(function (jqXHR) {
            var msg = "Ha ocurrido un error al enviar los datos, intentelo de nuevo mas tarde. \n [";
            failmessage(msg, jqXHR);
        });
    });
    

    function failmessage(msg, jqXHR) {
		if (jqXHR.status === 0) {
			msg += "Sin conexion con el servidor]";
		} else if (jqXHR.status == 404) {
			msg += "No se ha encontrado la solicitud en el servidor (404)]";
		} else if (jqXHR.status == 500) {
			msg += "Error interno del servidor (500)]";
		} else if (textStatus === 'parsererror') {
			msg += "Hay un problema en la solicitud al servidor (fallo JSON parse)]";
		} else if (textStatus === 'timeout') {
			msg += "Se acabo el tiempo de espera (Time out error)]";
		} else if (textStatus === 'abort') {
			msg += "Se aborto la solicitud (peticion ajax abortada)]";
		} else {
			msg += "Error desconocido]";
			console.warn(jqXHR.responseText);
		}
        console.warn(msg);
	}

});