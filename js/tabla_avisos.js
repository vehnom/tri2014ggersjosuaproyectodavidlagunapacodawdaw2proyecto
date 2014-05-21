$(document).ready(function() {
    $('#tabla_avisos').dataTable( {
        "ajax": "../services/avisos.txt",
        "columns": [
            { "data": "Id_Aviso" },
            //{ "data": "Id_Pedido" },
            //{ "data": "Id_Factura" },
            { "data": "Nota" },
            { "data": "Quedada_dia" },
            { "data": "Hora" },
            { "data": "Tipo_Trabajo" },
            { "data": "Citado_Por" },
            { "data": "Fecha_Entrada" },
            { "data": "Fecha_Visitado" },
            //{ "data": "Coord_Longitud" },
            //{ "data": "Coord_Latitud" },
            { "data": "Id_Estado_Aviso"}
        ]
    } );
} );