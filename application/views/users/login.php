<div class="container_12">
	<div class="grid_12">
		<div id="form_login">
			<?php 
				echo form_open('users/verify_login');
				
				$username = array(
					'name'	=> 	'username',
					'id'	=> 	'lusername',
					'value'	=>	''
				);
				$password = array(
					'name'	=>	'password',
					'id'	=>	'lpassword'
				);
				$submit = array(
					'type' => 'submit',
					'name' => 'submit',
					'value' => 'Login',
					'title' => 'Login'
				);
			?>
			<div class="title_form">
				Acceso a TrackStart
			</div>
			<?php
				echo form_label('Usuario:', 'username');
				echo form_input($username);
				echo form_label('Password:', 'password');
				echo form_password($password);
				echo form_submit($submit);
				
				echo form_close();
			?>
			<div class="options_form">
				<div class="link_register">
					<?php
						echo anchor('users/register', 'Crear nueva cuenta', array('title' => 'Crear nueva cuenta'));
					?>
				</div>
				<div class="link_retry_password">
					<?php
						echo anchor('users/retry-password', 'Recuperar contraseña', array('title' => 'Recuperar contraseña'));
					?>
				</div>
			</div>
		</div>
	</div>
</div>
