$(document).ready(function() {
    $('#tabla_proveedores').dataTable( {
        "ajax": "../services/proveedores/proveedores.txt",
        "bFilter": false,
        "scrollX": true,
        "columns": [
            { "data": "Id_Proveedor" },
            { "data": "Nombre" },
            { "data": "Apellido" },
            { "data": "Apellido2" },
            { "data": "Nombre_Empresa" },
            { "data": "Telefono1" },
            { "data": "NIF" },
            { "data": "Direccion" },
            { "data": "Localidad" }
        ]
    });
    $("#tabla_proveedores tbody").on("click",function(event){
        location.href = "../services/proveedores/SeditarProveedor.php?u=" + event.target.parentNode.cells[0].textContent; 
    });
});