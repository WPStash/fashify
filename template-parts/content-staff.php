<?php
/**
 * Template part for displaying staff picks post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fashify
 */
?>
<div class="footer-staff-picks">

	<div class="container">

		<h3><?php esc_html_e( 'Staff Picks', 'fashify' ); ?></h3>

        <div class="staff-inner">
    		<?php
            $i = 1;
            $category = get_theme_mod( 'fashify_staff_picks_cat' );
            $number   = intval( get_theme_mod( 'number_staff_picks', 4 ) );
            $number   = ( 0 != $number ) ? $number : 4;
            $args = array( 'posts_per_page' => $number , 'cat' => $category , 'ignore_sticky_posts' => true );
            $staff_picks = new WP_Query( $args );
            ?>

		    <?php
            if ( $staff_picks->have_posts() ) :
			    while($staff_picks->have_posts()): $staff_picks->the_post(); global $post;
                    if ( $i % 4 == 1 ) echo '<div class="staff-row clear">';
            ?>

			<!-- begin .hentry -->
			<article id="post-<?php the_ID(); ?>-recent" <?php post_class(); ?>>

				<!-- begin .featured-image -->
				<?php if ( has_post_thumbnail() ) { ?>
				<div class="featured-image">
					<?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'fashify-thumb-layout3' ); ?></a><?php endif; ?>
				</div>
				<?php } ?>
				<!-- end .featured-image -->

				<!-- begin .entry-header -->
				<header class="entry-header">

					<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

				</header>
				<!-- end .entry-header -->

			</article>
			<!-- end .hentry -->
            <?php
                if ( $i % 4 == 0 ) echo '</div>';
                $i++;
    			endwhile;
                if ( $i % 4 != 1 ) echo '</div>';
            endif;
            ?>

    		<?php wp_reset_query(); ?>
        </div>
	</div>

</div>
