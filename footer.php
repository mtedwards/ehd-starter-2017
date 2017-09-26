<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ehd-starter
 */

?>

	</div><!-- #content -->
</div><!-- #page -->
<div class="footer-wrap">
	<footer id="colophon" class="site-footer site" role="contentinfo">
		<div class="show-list">

			<div class="show-list-inner">
				<h2>STUDENT PROFILES</h2>
				<?php the_field('top_text', 'options'); ?>
				<div class="shows">
					<?php
						$showList = get_field('show_list', 'options');
						foreach($showList as $show) { ?>
							<article class="show">
								<img src="<?php echo $show['logo']['sizes']['thumbnail']; ?>" alt="">
								<h2><?php echo $show['show_title']; ?></h2>
								<h5><?php echo $show['producer']; ?></h5>
							</article>
					<?php } ?>
				</div>

				<?php the_field('bottom_text', 'options'); ?>
			</div>
		</div>
		<div class="site-info">
			<div class="contact-button">
				<a href="/schedule-a-lesson-contact/" class="button">
					Schedule a Lesson
				</a>
			</div>
			<div class="links-copy">
				<ul>
					<li><a href="/">Home</a></li>
					<li><a href="/teaching-philosophy/">Teaching Philosphy</a></li>
					<li><a href="/what-to-expect/">What to Expect</a></li>
					<li><a href="/resources/">Resources</a></li>
					<li><a href="/schedule-a-lesson-contact/">Contact</a></li>
				</ul>
				<div class="copy">
					&copy; Copyright <?php echo date('Y'); ?> Heather Fletcher
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div>


<?php wp_footer(); ?>

</body>
</html>
