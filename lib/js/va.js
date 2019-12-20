$(function(){
    ComprobarPractica();
    CargarBitacoras();

    function CargarBitacoras(){
        $.getJSON(site_url+"/OBA",
            function (data, textStatus, jqXHR) {
                console.log(data);
                if(data.status != 404){
                    var x = "";
                    $.each(data.data, function (i, v) { 
                         x += `<tr><td>${v.Id}</td><td class='truncatetext'>${v.Texto}</td><td>${v.Fecha}</td><td>Pendiente...</td></tr>`;
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


});