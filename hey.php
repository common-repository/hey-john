<?php
/**
 * @package Hey_John
 * @version 1.0
 */
/*
Plugin Name: Hey John
Plugin URI: https://wordpress.org/plugins/hey-john/
Description: This is just a simple quote plugin, it motivate us in a funny way. When activated you will randomly see a quote from <cite>Hey, John</cite> in the upper right of your admin screen on every page.
Author: Amit Mehta
Version: 1.0
Author URI: https://codinghand.com/
Text Domain: hey-john
*/

function hey_john_quote(){
/** These are the quotes to Hey John */

$quotes = "
If you think you are too small to make a difference, try sleeping with a mosquito. – Dalai Lama
The elevator to success is out of order. You’ll have to use the stairs… One step at a time. – Joe Girard
I have not failed. I’ve just found 10,000 ways that won’t work. – Thomas A. Edison
Listen, smile, agree, and then do whatever you were gonna do anyway. – Robert Downey Jr.
If you’re going through hell, keep going. – Winston Churchill
If you hang out with chickens, you’re going to cluck and if you hang out with eagles, you’re going to fly. – Steve Maraboli
Life is Absurd Without God - Amit Mehta
Edison failed 10,000 times before he made the electric light. Do not be discouraged if you fail a few times. – Napoleon Hill
People often say that motivation doesn’t last. Well, neither does bathing – that’s why we recommend it daily. – Zig Ziglar
The man who moves a mountain begins by carrying away small stones. – Confucius
People say nothing is impossible, but I do nothing every day. – A.A. Milne
The only time I don’t have any problems in this world is when I am already six feet below the ground. – James Jason
We don’t stop playing because we grow old; we grow old because we stop playing. – George Bernard Shaw
I find television very educational. Every time someone turns it on, I go in the other room and read a book. – Groucho Marx
I didn’t fail the test. I just found 100 ways to do it wrong. – Benjamin Franklin
Whoever said, ‘It’s not whether you win or lose that counts,’ probably lost. – Martina Navratilova
A wise person should have money in their head, but not in their heart. – Jonathan Swift
Consider the postage stamp: its usefulness consists in the ability to stick to one thing ’til it gets there - Josh Billings
A diamond is merely a lump of coal that did well under pressure.
Nothing is impossible, the word itself says ‘I’m possible’! - Audrey Hepburn
Life is like a sewer… what you get out of it depends on what you put into it. - Tom Lehrer
We are all in the gutter, but some of us are looking at the stars. - Oscar Wilde
Learn the rules like a pro, so you can break them like an artist. - Pablo Picasso
";
 

// Here we split it into lines
$quotes = explode( "\n", $quotes );

// And then randomly choose a line
return wptexturize($quotes[ mt_rand( 0, count( $quotes ) - 1 ) ]);

}


function hey_john(){

	$seleted_quote = hey_john_quote(); 
	echo "<p id='quote'>$seleted_quote</p>";

}
// Now we set that function up to execute when the admin_notices action is called
add_action('admin_notices', 'hey_john');


// We need styles to position the quotes
function hey_john_css(){
// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
		<style type='text/css'>
		#quote{
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
		</style>
		";
}

add_action( 'admin_head', 'hey_john_css' );