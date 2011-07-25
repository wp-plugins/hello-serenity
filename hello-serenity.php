<?php
/**
 * @package Hello_Serenity
 * @version 1.0
 */
/*
Plugin Name: Hello Serenity
Plugin URI: http://wordpress.org/extend/plugins/hello-serenity/
Description: Random quotes from Serenity and Firefly.
Author: Ian Mitchell
Version: 1.0
Author URI: http://teaandbiscuits.tk
*/

function hello_serenity_get_lyric() {
	/** These are quotes from Serenity and Firefly */
	$lyrics = "We are just too pretty for God to let us die.
Ah, curse your sudden but inevitable betrayal!
Well, you were right about this being a bad idea.
Time for some thrilling heroics.
We're all doomed! Who's flying this thing!? Oh, that would be me.
Big damn heroes
Also? I can kill you with my brain.
I aim to misbehave.
I'm a leaf on the wind...watch how I soar.
Ain't all buttons and charts, little albatross.
Can't do somethin' smart, do somethin' right.
My food is problematic.
She is starting to damage my calm.
Pretty cunning, don'tchya think?
We may experience some slight turbulence and then...explode.
So here's us, on the raggedy edge.
A man walks down the street in that hat, people know he's not afraid of anything.
I swallowed a bug.";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_serenity() {
	$chosen = hello_serenity_get_lyric();
	echo "<p id='serenity'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_serenity' );

// We need some CSS to position the paragraph
function serenity_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#serenity {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'serenity_css' );

?>
