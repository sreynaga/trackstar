<div id="wrapper">
	<div class="container_12">
		<div class="grid_3" id="logo">
			TrackStart
		</div>
		<div class="grid_9" id="menu">
			<div id="content_menu">
				<ul>
					<li <?php echo ($current_page == 'Home') ? 'class="current_page_item"' : '' ?>>
						<?php echo anchor('dashboard', 'Home', array('title' => 'Home')); ?>
					</li>
					<li <?php echo ($current_page == 'My Projects') ? 'class="current_page_item"' : '' ?>>
						<?php echo anchor('projects', 'My Proyects', array('title' => 'My Proyects')); ?>
					</li>
					<li <?php echo ($current_page == 'My Issues') ? 'class="current_page_item"' : '' ?>>
						<?php echo anchor('issues', 'My Issues', array('title' => 'My Issues')); ?>
					</li>
					<li <?php echo ($current_page == 'My Comments') ? 'class="current_page_item"' : '' ?>>
						<?php echo anchor('comments', 'My Comments', array('title' => 'My Comments')); ?>
					</li>
				</ul>
			</div>
		</div>
		<div class="grid_12" id="mision">
			Software para control de proyectos
		</div>
	</div>