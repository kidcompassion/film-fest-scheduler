<?php get_header();?>

<?php 
// the query

$args = array(
    'post_type' => 'screening_details',
    'order'=> 'ASC',
    'orderby' => 'meta_value_num',
    'meta_key' => 'fs_screening_date'

    );
$the_query = new WP_Query( $args ); 

?>

<?php if ( $the_query->have_posts() ) : ?>

    <!-- pagination here -->

    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <?php 
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


<table>
<tbody>
    <tr>
        <td>

        <?php if (isset($filmTime[0])):?>
            <p><?php $timestamp = $filmTime[0];?><?php //echo gmdate("H:i:s", $timestamp);?></p>
        <?php endif;?>

        </td>

        <td>

        <?php if (isset($filmDate[0])):?>
            <p><?php $datestamp = $filmDate[0];?><?php echo gmdate("F j, Y", $datestamp);?></p>
        <?php endif;?>

        </td>
        <td>

        <?php if (isset($filmTitle[0])):?>
            <p><strong>Title:</strong><?php echo $filmTitle[0];?></p>
        <?php endif;?>

        </td>

    </tr>


</tbody>

</table>


    <?php endwhile; ?>
    <!-- end of the loop -->

    <!-- pagination here -->

    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>







<?php get_footer();?>