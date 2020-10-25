<?php

$text = get_field( 'awesome_text' );

echo '<div class="svjat-block-awesome-block">';
	if( !empty( $text ) )
		echo '<h3 class="example-text">' . $text . '</h3>';
echo '</div>';

?>