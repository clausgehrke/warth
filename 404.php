<?php

get_header();

?>
<div class="grid main">
	<div class="col-1-1">
		<div class="border_left">
			<div class="border_right">
        		<div class="content">
						<h1>
							<?php _e('Fehler 404', 'warth'); ?>
						</h1>
						<p>
							<?php _e('Diese Seite ich leider nicht verfügbar.', 'warth'); ?></p>
						<p style="line-height: 1.5;">
							<?php echo '» <a href="' . HOME . '" class="red caps">' .__('Weiter zur Startseite', 'warth') . '</a>';?>
						</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

get_footer();