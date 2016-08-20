<?php get_header();?>



<?php 
// the query

$args = array(
    'posts_per_page'=>-1,
    'post_type' => 'screening_details',
    'order'=> 'ASC',
    'orderby' => 'meta_value_num',
    'meta_key' => 'fs_screening_date_time'

    );
$prev_date = '';
$the_query = new WP_Query( $args ); 

?>

<?php if ( $the_query->have_posts() ) : ?>

    <!-- pagination here -->

    <!-- the loop -->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <?php 
    $filmTitle = get_post_meta(get_the_ID(),'fs_title');
    $filmLocation = get_post_meta(get_the_ID(),'fs_screening_location');
    $filmTickets = get_post_meta(get_the_ID(),'fs_tickets');
    $filmDateTime = get_post_meta(get_the_ID(), 'fs_screening_date_time');

    $filmDate = date("F j, Y", $filmDateTime[0]);


    ?>


<table>
<tbody>
    <tr>
    


        <td>
        <?php  if ($prev_date != $filmDate):?>
            <?php if (isset($filmDateTime[0])):?>
                <p><?php echo date("F j, Y", $filmDateTime[0]);?></p>
            <?php endif;?>
        <?php endif;?>

        </td>


         <td>

       <?php if (isset($filmDateTime[0])):?>
                <p><?php echo date("g:i A", $filmDateTime[0]);?></p>
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

<?php $prev_date = $filmDate;?>

    <?php endwhile; ?>
    <!-- end of the loop -->

    <!-- pagination here -->

    <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>






<?php get_footer();?>