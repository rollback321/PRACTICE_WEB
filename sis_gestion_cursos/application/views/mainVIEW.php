

	<div id="body">
		<p>Menu</p>

		<br>
       
        <?php   ?> 
		<div align="right"> 
		    Administrador:  <?= $_SESSION['nombre']; ?>
			<?= $_SESSION['apellidos']; ?><br> <br>
			<a href="http://localhost/sistemaDeGestionDeCursos/index.php/Cmain/cerrarSesion" >Cerrar sesion</a>  
		</div>
		<code>

		<a href="<?= $url_Cmain ?>/index.php/Cmain/programas">Programas</a>

		<a href="<?= $url_Cmain ?>/index.php/Cparticipantes/elijaPrograma">| Participantes</a>

		<a href="<?= $url_Cmain ?>/index.php/Cmain/administrador">| Administrador</a>

		
		</code>

		
		

		
	</div>


