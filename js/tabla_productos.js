$(document).ready(function() {
    $('#tabla_operarios').dataTable( {
        "ajax": "../services/productos/productos.txt",
        "bFilter": false,
        "scrollX": true,
        "columns": [
            { "data": "Id_Producto" },
            { "data": "Nombre" },
            { "data": "Cantidad_Unidad" },
            { "data": "Detalle" },
            { "data": "Precio_Unidad" },
            { "data": "Unidades_Existentes" },
            { "data": "Fabricante" }
        ]
    });
    /*$("#tabla_operarios tbody").on("click",function(event){
        location.href = "../services/operarios/SeditarOperario.php?u=" + event.target.parentNode.cells[0].textContent; 
    });*/
});