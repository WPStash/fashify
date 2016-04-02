<?php
/**
 * Template part for displaying post list Layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fashify
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-list clear' ); ?>>
    <!-- begin .featured-image -->
    <?php if ( has_post_thumbnail() ) { ?>
    <div class="featured-image">
        <?php if ( has_post_thumbnail() ) : ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'fashify-thumb-default' ); ?></a><?php endif; ?>
    </div>
    <?php } ?>
    <!-- end .featured-image -->

    <div class="ft-post-right">
            <!-- begin .entry-header -->
            <div class="entry-header">

                <div class="entry-meta">
                    <?php fashify_posted_on(); ?>
                </div>
                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

            </div>
            <!-- end .entry-header -->

            <div class="entry-content">
                <p><?php  echo wp_trim_words( get_the_content(), apply_filters( 'fashify_content_list_except_lenght', 25 ), '...' ) ?></p>
            </div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->
