<?php
/**
 * Template part for displaying Homepage layout 1.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fashify
 */

?>
<!-- begin .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-grid' ); ?> >

	<!-- begin .featured-image -->
	<?php if ( has_post_thumbnail() ) { ?>
	<div class="featured-image">
		<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'fashify-thumb-layout2' ); ?></a><?php endif; ?>
	</div>
	<?php } ?>
	<!-- end .featured-image -->

	<!-- begin .entry-info -->
	<div class="entry-info">

		<!-- begin .entry-header -->
		<header class="entry-header">
            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

			<div class="entry-meta">
                <?php fashify_posted_on(); ?>
			</div>

		</header>
		<!-- end .entry-header -->

		<!-- begin .entry-content -->
		<section class="entry-content">
            <p><?php  echo wp_trim_words( get_the_content(), apply_filters( 'fashify_content_list_except_lenght', 25 ), '...' ) ?></p>
        </section>
		<!-- end .entry-content -->

	</div>
	<!-- end .entry-info -->

</article>
<!-- end .hentry -->
