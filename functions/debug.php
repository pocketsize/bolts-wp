<?php

/**
 * Print stuff formatted
 */

function pad($val) {
	echo '<pre>';
	print_r($val);
	echo '</pre>';
} 

/**
 * Print stuff formatted and die
 */

function dad($val) {
	pad($val);
	die;
}