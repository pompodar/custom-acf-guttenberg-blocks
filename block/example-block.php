<?php

$text = get_field( 'text' );

echo '<div class="svjat-block-example">';
	if( !empty( $text ) )
		echo '<h3>' . $text . '</h3>';
echo '</div>';

?>
