<?php 

	if ( !is_active_sidebar( 'widget_front' ) ){
		return;
	}

 ?>

 	<?php dynamic_sidebar( 'widget_front' ); ?>
