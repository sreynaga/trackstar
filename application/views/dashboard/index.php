	<div class="container_12">
		<div class="grid_12 page_content">
			<div class="content">
				<div class="user_info">
					<div id="welcome">
						Bienvenido <span><?php echo $this->session->userdata('name'); ?></span>
					</div>
					<div id="logout">
						<?php
							echo anchor('users/logout', 'Logout', array('title' => 'Logout'));
						?>
					</div>
				</div>
				<div class="title">
					<h1>Que es TrackStart?</h1>
				</div>
				<div class="text">
					<p>
						TrackStart es un software que funciona bajo <span>PHP</span> y <span>MySQL</span> que nos permite poder tener un seguimiento sobre nuestros desarrollos de software, <span>TrackStart</span> nos permite crear nuevos proyectos, crear nuevas tareas para los proyectos asi como asignar usuarios a los mismos, es una herramienta que nos permite tener organizados nuestros proyectos.
					</p>
					<p>
						A <span>diferencia</span> de otros software que cumplen con las mismas especificaciones <span>TrackStart</span> se caracteriza por ser <span>Agil</span>, <span>Seguro</span> y <span>Robusto</span>, posicionandose como una muy buena eleccion a la hora de tener un software que permita organizar el trabajo con otros proyectos de desarrollo de software.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>