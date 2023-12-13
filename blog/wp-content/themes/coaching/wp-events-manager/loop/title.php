<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php if( ! is_singular( 'tp_event' ) || ! in_the_loop() ): ?>
	<h4 class="title"><a href="<?php the_permalink() ?>">
<?php else: ?>
	<h1 class="title">
<?php endif; ?>
		<?php the_title(); ?>
<?php if( ! is_singular( 'tp_event' ) || ! in_the_loop() ): ?>
	</a></h4>
<?php else: ?>
	</h1>
<?php endif; ?>