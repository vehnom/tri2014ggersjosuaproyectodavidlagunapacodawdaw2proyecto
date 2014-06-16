$(document).ready(function() {
    $('#tabla_clientes').dataTable( {
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
<<<<<<< HEAD

    setTimeout(function(){cambiaCeldaMorosos();},100);

    $("#tabla_clientes tbody").on("click",function(event){
        location.href = "../services/clientes/SeditarCliente.php?u=" + event.target.parentNode.cells[0].textContent; 
    });



    function cambiaCeldaMorosos(){
    var longitud_avisos = document.getElementById('tabla_clientes').childNodes[5].childNodes.length;
    var filas_estado = document.getElementById('tabla_clientes').childNodes[5].childNodes;

    for(var i = 0; i < longitud_avisos; i++){
        console.log(filas_estado[0].cells[9] + "\n");
        if(filas_estado[i].cells[9].innerText == 1){
            filas_estado[i].cells[9].innerText = "Moroso";
            filas_estado[i].cells[9].style.background = "red";
        } else if(filas_estado[i].cells[9].innerText == 0){
            filas_estado[i].cells[9].innerText = "No moroso";
            filas_estado[i].cells[9].style.background = "aqua";
        } else {
            filas_estado[i].cells[9].innerText = "Error";
        }
    }
}
=======
    $("#tabla_clientes tbody").on("click",function(event){
        location.href = "../services/clientes/SeditarCliente.php?u=" + event.target.parentNode.cells[0].textContent; 
    });
>>>>>>> origin/master
});