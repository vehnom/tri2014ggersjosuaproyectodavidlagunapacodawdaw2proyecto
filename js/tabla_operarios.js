$(document).ready(function() {
    $('#tabla_operarios').dataTable( {
        "ajax": "../services/empleados.txt",
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
    } );
} );