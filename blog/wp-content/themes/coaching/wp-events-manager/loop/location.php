<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php if ( wpems_event_location() ): ?>
	<div class="entry-location">
		<?php
	if ( function_exists( 'wpems_get_location_map' ) ) {
		wpems_get_location_map();
	}?>
	</div>
<?php endif; ?>