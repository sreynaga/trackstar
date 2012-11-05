<div class="container_12">
	<div class="grid_12">
		<div id="form_register">
			<?php 
				echo form_open('users/create_account');
				
				$name = array(
					'name'	=>	'name',
					'id'	=>	'name',
					'value'	=>	set_value('name')
				);
				$username = array(
					'name'	=> 	'username',
					'id'	=> 	'username',
					'value'	=>	set_value('username')
				);
				$email = array(
					'name'	=>	'email',
					'id'	=>	'email',
					'value'	=>	set_value('email')
				);
				$password = array(
					'name'	=>	'password',
					'id'	=>	'password'
				);
				$re_password = array(
					'name'	=>	're_password',
					'id'	=>	're_password'
				);
				$submit = array(
					'type' => 'submit',
					'name' => 'submit',
					'value' => 'Crear cuenta',
					'title' => 'Crear cuenta'
				);
			?>
			<div class="title_form">
				Crear nueva cuenta
			</div>
			<?php
				echo form_label('Nombre:', 'name');
				echo form_input($name);
				echo form_label('Usuario:', 'username');
				echo form_input($username);
			?>
				<div class="username"></div>
			<?
				echo form_label('Email:', 'email');
				echo form_input($email);
			?>
				<div class="email"></div>
			<?
				echo form_label('Password:', 'password');
				echo form_password($password);
				echo form_label('Confirmar Password:', 're_password');
				echo form_password($re_password);
				echo form_submit($submit);

				echo form_close();
			?>
			<div class="options_form">
				<div class="link_login">
					<?php
						echo anchor('users/login', 'Login');
					?>
				</div>
			</div>
			<div class="errors">
				<?php
					echo validation_errors();
				?>
			</div>
		</div>
	</div>
</div>
