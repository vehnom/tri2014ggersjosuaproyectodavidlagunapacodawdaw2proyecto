$(document).ready(function() {
    $('#tabla_vehiculos').dataTable( {
        "ajax": "../services/flota/vehiculos.txt",
        "bFilter": false,
        "scrollX": true,
        "columns": [
            { "data": "Id_Vehiculo" },
            { "data": "Id_Operario" },
            { "data": "Matricula" },
            { "data": "Marca" },
            { "data": "Modelo" }
        ]
    });
    /*$("#tabla_vehiculos tbody").on("click",function(event){
        location.href = "../services/operarios/SeditarOperario.php?u=" + event.target.parentNode.cells[0].textContent; 
    });*/
});