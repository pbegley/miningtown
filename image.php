<?php
/**
 * The template for displaying image attachments
 *
 * @package miningtown
 * 
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
				// Start the loop.
			while ( have_posts() ) :
				the_post();
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">

						<figure class="entry-attachment wp-block-image">
						<?php
							/**
							 * Filter the default miningtown image attachment size.
							 *
							 * @since Twenty Sixteen 1.0
							 *
							 * @param string $image_size Image size. Default 'large'.
							 */
							$image_size = apply_filters( 'miningtown_attachment_size', 'full' );

							echo wp_get_attachment_image( get_the_ID(), $image_size );
						?>

							<figcaption class="wp-caption-text"><?php the_excerpt(); ?></figcaption>

						</figure><!-- .entry-attachment -->

						<?php
						the_content();
						wp_link_pages(
							array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'miningtown' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'miningtown' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							)
						);
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
					<?php
						// Retrieve attachment metadata.
						$metadata = wp_get_attachment_metadata();
					if ( $metadata ) {
						printf(
							'<span class="full-size-link"><span class="screen-reader-text">%1$s</span><a href="%2$s">%3$s &times; %4$s</a></span>',
							_x( 'Full size', 'Used before full size attachment link.', 'miningtown' ),
							esc_url( wp_get_attachment_url() ),
							absint( $metadata['width'] ),
							absint( $metadata['height'] )
						);
					}
					?>

						<?php miningtown_entry_footer(); ?>

					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->

				<?php
				// Parent post navigation.
				the_post_navigation(
					array(
						'prev_text' => _x( '<span class="meta-nav">Published in</span><br><span class="post-title">%title</span>', 'Parent post link', 'miningtown' ),
					)
				);

				// End the loop.
				endwhile;
			?>

		</main>
	</section>

<?php
get_footer();
