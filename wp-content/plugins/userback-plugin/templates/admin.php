<?php
/**
 * @package  UserbackPlugin
 *
 */
?>

<div class="wrap">
	<h1>Userback Plugin</h1>
    <hr>
	<?php settings_errors(); ?>

	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab-1">Manage Settings</a></li>
		<li><a href="#tab-2">About</a></li>
	</ul>

	<div class="tab-content">
		<div id="tab-1" class="tab-pane active">

			<form method="post" action="options.php">
				<?php 
					settings_fields( 'userback_plugin_settings' );
					do_settings_sections( 'userback_plugin' );
					submit_button();
				?>
			</form>
			
		</div>

		<div id="tab-2" class="tab-pane">
			<h3>About</h3>
            <p>Userback integration plugin</p>
		</div>
	</div>
</div>