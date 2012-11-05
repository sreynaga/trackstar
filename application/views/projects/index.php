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
					<h1>My Projects</h1>
				</div>
			</div>
		</div>
	</div>
</div>