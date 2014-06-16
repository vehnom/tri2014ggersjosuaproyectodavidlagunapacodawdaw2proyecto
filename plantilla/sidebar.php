<div id="sideBar">
		<div class="tit_sidebar">
			<!-- <h3>Navegador</h3> -->
			<a href="index.php"><img src="../images/logo.jpg"></a>
		</div>
		<div class="nombre_usuario_logeado">Usuario actual: <span><?php echo $_SESSION['usuario'] ?></span></div>
		<div class="salir_usuario"><a href="../services/login/logout_usuario.php">Salir de mi cuenta</a></div>
		<a href="#"><div class="btn_sidebar primer_btn_sidebar desp_inicio">INICIO >></div></a>
		<div class="sub_menu_desplegable sub_inicio">
			<a href="inicio.php">Pagina principal</a>
			<a href="#">Item 2</a>
			<a href="#">Item 3</a>
			<a href="#">Item 4</a>
			<a href="#">Item 5</a>
		</div>
		<a href="#"><div class="btn_sidebar desp_avisos">AVISOS >></div></a>
		<div class="sub_menu_desplegable sub_avisos">
			<a href="avisos.php">Avisos diarios</a>
			<a href="nuevoAviso.php">Nuevo aviso</a>
			<a href="#">Item 3</a>
			<a href="#">Item 4</a>
			<a href="#">Item 5</a>
		</div>
		<a href="operarios.php"><div class="btn_sidebar ultimo_btn_sidebar">OPERARIOS</div></a>
		<a href="proveedores.php"><div class="btn_sidebar ultimo_btn_sidebar">PROVEEDORES</div></a>
		<a href="flota.php"><div class="btn_sidebar ultimo_btn_sidebar">FLOTA VEHICULOS</div></a>
		<a href="clientes.php"><div class="btn_sidebar ultimo_btn_sidebar">CLIENTES</div></a>
		<a href="pedidos.php"><div class="btn_sidebar ultimo_btn_sidebar">PEDIDOS</div></a>
</div>