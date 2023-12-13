<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$event           = new WPEMS_Event( get_the_ID() );

?>
<div class="entry-countdown">

	<div class="tp_event_counter" data-time="<?php echo esc_attr( wpems_get_time( 'M j, Y H:i:s O', null, false ) ) ?>">

	</div>

</div>

<p style="clear:both"></p>
