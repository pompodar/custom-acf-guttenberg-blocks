<?php

$text = get_field( 'text' );

echo '<div class="example-block" style="color: aqua;">';
	if( !empty( $text ) )
		echo '<h3 class="example-text">' . $text . '</h3>';
echo '</div>';

?>
