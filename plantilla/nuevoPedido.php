<?php 
	session_start();
	if(isset($_SESSION['logeado'])){
?>
<!doctype html>
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title>Base de Datos Robles Portillo</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="../js/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="../js/desplegable.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript" src="../js/pedidos.js"></script>
	<link href="../metro/min/iconFont.min.css" rel="stylesheet">
</head>
<body>
	<?php include "sidebar.php" ?>
	<div id="contenido">
		<div id="cont_pedido">
			<div id="cat_productos">
				<?php for($i = 0; $i < count($_SESSION['categorias']); $i++){?>
				<a id="boton_pedidos_desp" href="#" ><div id="cat_<?php echo $_SESSION['categorias'][$i]['Id_Categoria'];?>" class="btn_sidebar desp_cat"><?php echo $_SESSION['categorias'][$i]['Nombre_Categoria'];?></div></a>
				<div id="submenu_cat_<?php echo $_SESSION['categorias'][$i]['Id_Categoria'];?>" class="sub_menu_desplegable sub_inicio sub_container_pedidos">
					<?php for($e = 0; $e < count($_SESSION['productos']); $e++){ 
						if($_SESSION['categorias'][$i]['Id_Categoria'] == $_SESSION['productos'][$e]["Id_Categoria"]){
							$subir = 'subirbajarCantidad("'.$_SESSION['productos'][$e]['Id_Producto'].'","+");';
							$bajar = 'subirbajarCantidad("'.$_SESSION['productos'][$e]['Id_Producto'].'","-");';
							echo "<a class='contenedor_sub_pedido' href='#' id='".$_SESSION['productos'][$e]['Id_Producto']."'>".$_SESSION['productos'][$e]['Nombre']." <div class='cantidad'><button type='button' onclick='$bajar'>-</button><input type='text' value='0' id='cantidad_".$_SESSION['productos'][$e]['Id_Producto']."'/><button type='button' onclick='$subir'>+</button></div><div><button  class='btncomprar' id='btncomprar_".$_SESSION['productos'][$e]['Id_Producto']."' type='button'>Comprar</button></div></a>";
						}			
					}
				echo "</div>";
				}?>

			</div>
			<div id="prod_pedido">
				<div id="carrito_pedido"></div>
				<div id="total_pedido">
					<label>Total precio: </label>
					<input type="text" value="0" disabled>
					<label>Total cantidad: </label>
					<input type="text" value="0" disabled>
				</div>
			</div>
			<div id="btns_pedido">
				<form class="form" id="form_nuevo_pedido" action="../services/pedidos/SinsertPedido.php" method="post">
					<label>Hora: </label>
					<input type="time" name="hora_productos" id="hora_productos"/>
					<label>Seguimiento: </label>
					<input type="text" name="seguimiento_productos" id="seguimiento_productos"/>
					<label>Cantidad: </label>
					<input type="text" name="cantidad_productos" id="cantidad_productos"/>
					<input type="hidden" name="carrito_productos" id="carrito_productos" />
					<button type="submit">Guardar</button>
				</form>
				<button type="button" onclick="$('#carrito_pedido').html('');$('#total_pedido input').eq(1).val('0');">Limpiar</button>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	} else {
		header("Location: ./no_logeado.php");
	}
?>