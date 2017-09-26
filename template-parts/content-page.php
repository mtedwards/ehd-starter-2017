<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ehd-starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php  if(! is_front_page() ) { ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<?php } ?>

	<div class="entry-content <?php if(has_post_thumbnail()) { echo 'with-sidebar'; }?>">
		<div class="main-content">
			<?php the_content(); ?>

		<?php
			if( is_page( 'resources' ) ) {
				get_template_part( 'template-parts/content', 'resources' );
			} elseif( is_front_page() ) {
				get_template_part( 'template-parts/content', 'home' );
			}
		?>
		</div>
		<?php if(has_post_thumbnail()) { ?>
			<aside class="sidebar">
				<?php the_post_thumbnail('large'); ?>
			</aside>

		<?php } ?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'ehd-starter' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
