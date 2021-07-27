<?php

function total_sites( $atts, $content = null ) {

$total_sites_value = get_field( 'total_sites', 'option' );
$total_sites       = !empty( $total_sites_value ) ? $total_sites_value : '';

return '<span>' . $total_sites . '</span>';
}
add_shortcode( 'total_sites', 'total_sites' );

function total_states( $atts, $content = null ) {

$total_states_value = get_field( 'total_states', 'option' );
$total_states       = !empty( $total_states_value ) ? $total_states_value : '';

return '<span>' . $total_states . '</span>';
}
add_shortcode( 'total_states', 'total_states' );
