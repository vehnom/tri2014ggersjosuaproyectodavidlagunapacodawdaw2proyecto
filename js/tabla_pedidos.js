$(document).ready(function() {
    $('#tabla_pedidos').dataTable( {
        "ajax": "../services/pedidos/pedidos.txt",
        "bFilter": false,
        "scrollX": true,
        "columns": [
            { "data": "Id_Pedido" },
            { "data": "Fecha" },
            { "data": "Seguimiento" },
            { "data": "Hora_Llamada" },
            { "data": "Cantidad" }
            ]
    });
    $("#tabla_pedidos tbody").on("click",function(event){
        var id = event.target.parentNode.cells[0].textContent;
        location.href = "../services/pedidos/SdetallePedido.php?id=" + id; 
    });
});