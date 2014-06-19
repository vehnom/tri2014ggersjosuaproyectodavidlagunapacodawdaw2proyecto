$(document).ready(function() {
    $('#tabla_avisos').dataTable( {
        "ajax": "../services/avisos/avisos.txt",
        "columns": [
            { "data": "Id_Aviso" },
            { "data": "Nota" },
            { "data": "Quedada_dia" },
            { "data": "Hora" },
            { "data": "Tipo_Trabajo" },
            { "data": "Citado_Por" },
            { "data": "Fecha_Entrada" },
            { "data": "Fecha_Visitado" },
            { "data": "Id_Estado_Aviso"}
        ]
    });

    setTimeout(function(){cambiaEstadosAvisos();},100);

    //Doy color a el estado de los avisos

function cambiaEstadosAvisos(){
    var longitud_avisos = document.getElementById('tabla_avisos').childNodes[5].childNodes.length;
    var filas_estado = document.getElementById('tabla_avisos').childNodes[5].childNodes;

    for(var i = 0; i < longitud_avisos; i++){
        console.log(filas_estado[0].cells[8] + "\n");
        if(filas_estado[i].cells[8].innerText == 1){
            filas_estado[i].cells[8].innerText = "Sigue";
            filas_estado[i].cells[8].style.background = "#F4FA58";
        } else if(filas_estado[i].cells[8].innerText == 0){
            filas_estado[i].cells[8].innerText = "Terminado";
            filas_estado[i].cells[8].style.background = "aqua";
        } else {
            filas_estado[i].cells[8].innerText = "Error";
        }
    }
}
});