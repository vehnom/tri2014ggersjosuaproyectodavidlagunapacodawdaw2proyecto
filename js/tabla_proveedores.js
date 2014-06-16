$(document).ready(function() {
    $('#tabla_proveedores').dataTable( {
        "ajax": "../services/proveedores/proveedores.txt",
        "bFilter": false,
        "scrollX": true,
        "columns": [
            { "data": "Id_Proveedor" },
            { "data": "Nombre" },
            { "data": "Apellido1" },
            { "data": "Apellido2" },
            { "data": "Nombre_Empresa" },
            { "data": "Telefono1" },
            { "data": "Telefono2" },
            { "data": "NIF" },
            { "data": "Direccion" },
            { "data": "Cod_Postal" },
            { "data": "Provincia" },
            { "data": "Referencia" },
            { "data": "Observaciones" },
        ]
    });
    /*$("#tabla_proveedores tbody").on("click",function(event){
        location.href = "../services/proveedores/SeditarProveedor.php?u=" + event.target.parentNode.cells[0].textContent; 
    });*/
});