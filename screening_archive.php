<?php get_header();




?>

<?php 
// the query

$args = array(
    'post_type' => 'screening_details',

    );
$the_query = new WP_Query( $args ); 

?>

<?php if ( $the_query->have_posts() ) : ?>

    <!-- pagination here -->

    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <pre>          
        <?php


           print_r(get_post_meta(get_the_ID()));
        ?>
</pre>



    <?php endwhile; ?>
    <!-- end of the loop -->

    <!-- pagination here -->

    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>







<?php get_footer();?>