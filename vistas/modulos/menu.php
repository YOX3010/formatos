<aside class="main-sidebar">

	<section class="sidebar">

		<ul class="sidebar-menu">

			<?php

			if ($_SESSION["perfil"] == "Administrador") {

				echo '<li class="active">
				<a href="inicio">
					<i class="fa fa-home"></i>
					<span>Inicio</span>
				</a>
			</li>

			
			
			';
			}

			// if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			// 	echo '<li>
			// 		<a href="categorias">
			// 			<i class="fa fa-th"></i>
			// 			<span>Categorías</span>
			// 		</a>
			// 	</li>

			// 	<li>
			// 		<a href="productos">
			// 			<i class="fa fa-product-hunt"></i>
			// 			<span>Productos</span>
			// 		</a>
			// 	</li>

			// 	<li>
			// 		<a href="proveedores">
			// 			<i class="fa-solid fa-truck-field"></i>
			// 			&nbsp;
			// 			<span>Proveedores</span>
			// 		</a>
			// 	</li>';

			// }

			if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor") {

				echo '<li>
						<a href="clientes">
							<i class="fa-solid fa-user-tie"></i>
							&nbsp;
							<span>Clientes</span>
						</a>
					</li>';

				// 	<li class="treeview">
				// 		<a href="">
				// 			<i class="fa-solid fa-address-card"></i>
				// 			&nbsp;
				// 			<span>Empleados</span>		
				// 			<span class="pull-right-container">	
				// 				<i class="fa fa-angle-left pull-right"></i>
				// 			</span>
				// 		</a>
				// 		<ul class="treeview-menu">				

				// 			<li>
				// 				<a href="empleados-cargos">
				// 					<i class="fa-solid fa-pen-to-square"></i>
				// 					&nbsp;
				// 					<span>Cargos Empleados</span>
				// 				</a>
				// 			</li>

				// 			<li>
				// 				<a href="empleados">
				// 					<i class="fa-solid fa-address-card"></i>
				// 					&nbsp;
				// 					<span>Empleados</span>
				// 				</a>
				// 			</li>	

				// 		</ul>

				// 	</li>

				// 	<li>
				// 		<a href="ordenes">
				// 			<i class="fa-solid fa-toolbox"></i>
				// 			&nbsp;
				// 			<span>Ordenes de Servicio</span>
				// 		</a>
				// 	</li>		

				// 	<li class="treeview">
				// 		<a href="inicio-vehiculos">
				// 			<i class="fa-solid fa-car"></i>
				// 			&nbsp;
				// 			<span>Vehiculos</span>		
				// 			<span class="pull-right-container">	
				// 				<i class="fa fa-angle-left pull-right"></i>
				// 			</span>
				// 		</a>
				// 		<ul class="treeview-menu">				

				// 			<li>
				// 				<a href="marcas-vehiculos">
				// 					<i class="fa-solid fa-pen-to-square"></i>
				// 					&nbsp;
				// 					<span>Marcas Vehiculos</span>
				// 				</a>
				// 			</li>

				// 			<li>
				// 				<a href="modelos-vehiculos">
				// 					<i class="fa-solid fa-pen-to-square"></i>
				// 					&nbsp;
				// 					<span>Modelos Vehiculos</span>
				// 				</a>
				// 			</li>

				// 			<li>
				// 				<a href="tipos-vehiculos">
				// 					<i class="fa-solid fa-pen-to-square"></i>
				// 					&nbsp;
				// 					<span>Tipos Vehiculos</span>
				// 				</a>
				// 			</li>

				// 			<li>
				// 				<a href="vehiculos">
				// 					<i class="fa-solid fa-car"></i>
				// 					&nbsp;
				// 					<span>Vehiculos</span>
				// 				</a>
				// 			</li>

				// 		</ul>

				// 	</li>';
			}

			// if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			// 	echo '<li class="treeview">
			// 		<a href="#">
			// 			<i class="fa fa-list-ul"></i>
			// 			<span>Ventas</span>		
			// 			<span class="pull-right-container">	
			// 				<i class="fa fa-angle-left pull-right"></i>
			// 			</span>
			// 		</a>
			// 		<ul class="treeview-menu">				

			// 			<li>
			// 				<a href="ventas">		
			// 					<i class="fa fa-circle-o"></i>
			// 					<span>Administrar ventas</span>
			// 				</a>
			// 			</li>

			// 			<li>
			// 				<a href="crear-venta">	
			// 					<i class="fa fa-circle-o"></i>
			// 					<span>Crear venta</span>
			// 				</a>
			// 			</li>

			// 			<li>
			// 				<a href="cuentas-cobrar">	
			// 					<i class="fa-solid fa-money-check-dollar fa-sm"></i>
			// 					&nbsp;
			// 					<span>Cuentas x Cobrar</span>
			// 				</a>
			// 			</li>';

			// 			if($_SESSION["perfil"] == "Administrador"){

			// 			echo '<li>
			// 				<a href="reportes">	
			// 					<i class="fa fa-circle-o"></i>
			// 					<span>Reporte de ventas</span>
			// 				</a>
			// 			</li>';

			// 			}

			// 		echo '</ul>

			// 	</li>

			// 	<li class="treeview">
			// 		<a href="#">
			// 			<i class="fa fa-list-ul"></i>
			// 			<span>Configuraciones</span>		
			// 			<span class="pull-right-container">	
			// 				<i class="fa fa-angle-left pull-right"></i>
			// 			</span>
			// 		</a>
			// 		<ul class="treeview-menu">				

			// 			<li>
			// 				<a href="inspecciones-internas">
			// 					<i class="fa fa-th"></i>
			// 					&nbsp;
			// 					<span>Insp. Interna</span>
			// 				</a>
			// 			</li>

			// 			<li>
			// 				<a href="marcas-baterias">
			// 					<i class="fa fa-th"></i>
			// 					&nbsp;
			// 					<span>Marcas Baterias</span>
			// 				</a>
			// 			</li>

			// 			<li>
			// 				<a href="inspecciones-baterias">
			// 					<i class="fa fa-th"></i>
			// 					&nbsp;
			// 					<span>Insp. Baterias</span>
			// 				</a>
			// 			</li> 

			// 			<li>
			// 				<a href="inspecciones-neumaticos">
			// 					<i class="fa fa-th"></i>
			// 					&nbsp;
			// 					<span>Insp. Neumaticos</span>
			// 				</a>
			// 			</li>

			// 			<li>
			// 				<a href="inspecciones-generales">
			// 					<i class="fa fa-th"></i>
			// 					&nbsp;
			// 					<span>Insp. General</span>
			// 				</a>
			// 			</li>

			// 			<li>
			// 				<a href="inspecciones-accesorios">
			// 					<i class="fa fa-th"></i>
			// 					&nbsp;
			// 					<span>Insp. Accesorios</span>
			// 				</a>
			// 			</li>

			// 			<li>
			// 				<a href="inspecciones-reparaciones">
			// 					<i class="fa fa-th"></i>
			// 					&nbsp;
			// 					<span>Inspeccion Reparacion</span>
			// 				</a>
			// 			</li>

			// 	</ul>

			// </li>';

			// }

			?>

		</ul>

	</section>

</aside>