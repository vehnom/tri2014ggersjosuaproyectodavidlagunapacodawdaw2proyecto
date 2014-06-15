$(document).ready(function() {
    $('#tabla_vehiculos').dataTable( {
        "ajax": "../services/clientes/clientes.txt",
        "bFilter": false,
        "scrollX": true,
        "columns": [
            { "data": "Id_Cliente" },
            { "data": "Nombre" },
            { "data": "Apellido1" },
            { "data": "Apellido2" },
            { "data": "Direccion" }, 
			{ "data": "Localidad" }, 
			{ "data": "Telefono1" }, 
			{ "data": "NIF" }, 
			{ "data": "Email" }, 
			{ "data": "Moroso" }, 
        ]
    });
    /*$("#tabla_vehiculos tbody").on("click",function(event){
        location.href = "../services/operarios/SeditarOperario.php?u=" + event.target.parentNode.cells[0].textContent; 
    });*/
});