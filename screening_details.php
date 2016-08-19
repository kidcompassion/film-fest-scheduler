<?php get_header();
$filmRuntime = get_post_meta(get_the_ID(),'fs_run_time'); // Returns post metadata value for the field 'featured'
$filmDescription = get_post_meta(get_the_ID(),'fs_filmdescription');
$filmTitle = get_post_meta(get_the_ID(),'fs_title');
$filmTime = get_post_meta(get_the_ID(),'fs_screening_time');
$filmDate = get_post_meta(get_the_ID(),'fs_screening_date');
$filmLocation = get_post_meta(get_the_ID(),'fs_screening_location');
$filmYear = get_post_meta(get_the_ID(),'fs_production_year');
$filmDirector = get_post_meta(get_the_ID(),'fs_director');
$filmWebsite = get_post_meta(get_the_ID(),'fs_film_website');
$filmTrailer = get_post_meta(get_the_ID(),'fs_trailer');
$filmCountry = get_post_meta(get_the_ID(),'fs_country');
$filmTickets = get_post_meta(get_the_ID(),'fs_tickets');



?>



<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>    
        <?php the_post_thumbnail();?>

        <?php if (isset($filmTitle[0])):?>
            <p><strong>Title:</strong><?php echo $filmTitle[0];?></p>
        <?php endif;?>

        <?php if (isset($filmTime[0])):?>
            <p><strong>Time:</strong><?php echo $filmTime[0];?></p>
        <?php endif;?>

        <?php if (isset($filmDate[0])):?>
            <p><strong>Date:</strong><?php echo $filmDate[0];?></p>
        <?php endif;?>

        <?php if (isset($filmDescription[0])):?>
            <p><strong>Description:</strong><?php echo $filmDescription[0];?></p>
        <?php endif;?>

        <?php if (isset($filmDirector[0])):?>
            <p><strong>Director:</strong><?php echo $filmDirector[0];?></p>
        <?php endif;?>

        <?php if (isset($filmYear[0])):?>
            <p><strong>Year:</strong><?php echo $filmYear[0];?></p>
        <?php endif;?>

        <?php if (isset($filmWebsite[0])):?>
            <p><strong>Website:</strong><?php echo $filmWebsite[0];?></p>
        <?php endif;?>

        <?php if (isset($filmCountry[0])):?>
            <p><strong>Country:</strong><?php echo $filmCountry[0];?></p>
        <?php endif;?>

        <?php if (isset($filmTickets[0])):?>
            <p><strong>Tickets:</strong><?php echo $filmTickets[0];?></p>
        <?php endif;?>

        <?php if (isset($filmLocation[0])):?>
            <p><strong>Location:</strong><?php echo $filmLocation[0];?></p>
        <?php endif;?>



       
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer();?>