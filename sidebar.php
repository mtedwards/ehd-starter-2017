<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ehd-starter
 */

?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php if(has_post_thumbnail()) {
		the_post_thumbnail();
	} ?>
</aside><!-- #secondary -->
