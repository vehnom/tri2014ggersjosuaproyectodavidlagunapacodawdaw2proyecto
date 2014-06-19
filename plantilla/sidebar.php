<script type="text/javascript" src="../js/jquery-2.1.0.js"></script>
<script type="text/javascript" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript">
	function comprobarSalir(){
		var cerrarSesionAlerta = confirm('Vas a salir de tu cuenta, ' +  String.fromCharCode(191) + 'continuar?');
		if(cerrarSesionAlerta == true){
			$("#cerrarSesion").val("1");
			document.formSesion.submit();
		}
	}
</script>
<form name="formSesion" id="formSesion" action="../services/login/logout_usuario.php" method="post">
	<input type="hidden" id="cerrarSesion" name="cerrarSesion" value="0">
</form>

<div id="sideBar">
		<div class="tit_sidebar">
			<a href="inicio.php"><img src="../images/logo.jpg"></a>
		</div>
		<div class="nombre_usuario_logeado">Usuario actual: <span><?php echo $_SESSION['usuario'] ?></span></div>
		<div class="salir_usuario"><a onclick="comprobarSalir()">Salir de mi cuenta</a></div>
		<a href="inicio.php"><div class="btn_sidebar primer_btn_sidebar">INICIO</div></a>
		<a href="#"><div class="btn_sidebar desp_avisos">AVISOS >></div></a>
		<div class="sub_menu_desplegable sub_avisos">
			<a href="avisos.php">Avisos</a>
			<a href="nuevoAviso.php">Nuevo aviso</a>
			<a href="../services/avisos/SavisosMapa.php">Avisos Mapa</a>
		</div>
		<a href="operarios.php"><div class="btn_sidebar">OPERARIOS</div></a>
		<a href="proveedores.php"><div class="btn_sidebar">PROVEEDORES</div></a>
		<a href="flota.php"><div class="btn_sidebar">FLOTA VEHICULOS</div></a>
		<a href="clientes.php"><div class="btn_sidebar">CLIENTES</div></a>
		<a href="pedidos.php"><div class="btn_sidebar ultimo_btn_sidebar">PEDIDOS</div></a>
</div>