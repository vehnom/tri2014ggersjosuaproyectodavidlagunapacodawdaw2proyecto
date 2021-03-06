$(document).ready(function() {
    $('#tabla_operarios').dataTable( {
        "ajax": "../services/operarios/operarios.txt",
        "bFilter": false,
        "scrollX": true,
        "columns": [
            { "data": "Id_Operario" },
            { "data": "Id_Usuario" },
            { "data": "Nombre" },
            { "data": "Apellido" },
            { "data": "Apellido2" },
            { "data": "Telefono" },
            { "data": "Telefono2" },
            { "data": "Direccion" },
            { "data": "DNI" },
            { "data": "Seg_Social" },
            { "data": "Observacion" },
            { "data": "Foto" },
            { "data": "Fecha_Alta"}
        ]
    });
    $("#tabla_operarios tbody").on("click",function(event){
        location.href = "../services/operarios/SeditarOperario.php?u=" + event.target.parentNode.cells[0].textContent; 
    });
});