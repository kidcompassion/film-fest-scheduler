<?php get_header();
$value = get_metadata( 'screening_details', get_the_ID()); // Returns post metadata value for the field 'featured'
$postMeta = get_post_meta(get_the_ID());
?>



<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>    
        <?php the_title();?>
        <pre>
        <?php print_r($postMeta);?>
    </pre>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer();?>