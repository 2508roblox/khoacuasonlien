<?php get_header(); ?>
    <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
<?php 
    get_template_part( 'template-parts/social/social' );
    get_footer();
?>