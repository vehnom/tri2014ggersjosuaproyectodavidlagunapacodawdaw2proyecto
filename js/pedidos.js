$(document).ready(function(){
	$(".btncomprar").click(function(){
		var id = this.id;
		id = id.split("_")[1];
		var nombre = this.parentNode.parentNode.childNodes[0].textContent;
		var cantidad = $("#cantidad_"+id).val();
		$("<div class='caja_producto' id='"+id+"'><span class='id_producto'><b>Id:</b> "+id+"</span><span class='nombre_producto'> <b>Nombre:</b> "+nombre+" </span><span class='cantidad_producto'> <b>Cantidad:</b> "+cantidad+"</span></div>").appendTo($("#carrito_pedido"));
		var total_cantidad = $("#total_pedido input").eq(1).val();
		total_cantidad = parseInt(total_cantidad) + parseInt(cantidad);
		$("#total_pedido input").eq(1).val(total_cantidad);
		var carrito = $("#carrito_productos").val();
		carrito += id+"-"+cantidad+" ";
		$("#carrito_productos").val(carrito);
	});
});