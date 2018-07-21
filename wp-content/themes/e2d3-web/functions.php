<?php

/** Include scripts  dot-bar-chart-part*/
function e2d3_scripts() {
if ( is_home() ) {
	wp_enqueue_script( 'd3v4', 'https://d3js.org/d3.v4.min.js', array( ), false);
	wp_enqueue_script( 'dotbarchart', get_theme_file_uri( 'scripts/dotbarchart.js' ), array( 'd3v4' ), '20180722', true);
}
}
add_action('wp_enqueue_scripts', 'e2d3_scripts');
