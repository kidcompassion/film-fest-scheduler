<?php get_header();?>
<?php 
$args = array(
    'posts_per_page'=>-1, // load all the films to create a grid
    'post_type' => 'screening_details', 
    'order'=> 'ASC',
    'orderby' => 'meta_value_num', // orders the numeric unix values
    'meta_key' => 'fs_screening_date_time' // get unix timestamp to order everything
    );
$prev_date = '';
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
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
                <?php //Compare date with previous date to figure out whether to print the date
                if ($prev_date != $filmDate):?>
                    <tr>
                        <td colspan="3">
                            <?php if (isset($filmDateTime[0])):?>
                                <h2><?php echo date("F j", $filmDateTime[0]);?></h2>
                            <?php endif;?>
                        </td>
                    </tr>
                <?php endif;?>
                <tr>
                    <td>
                        <?php if (isset($filmDateTime[0])):?>
                            <p><?php echo date("g:i A", $filmDateTime[0]);?></p>
                        <?php endif;?>
                    </td>
                    <td>
                        <?php if (isset($filmTitle[0])):?>
                            <strong><a href="<?php the_permalink();?>"><?php echo $filmTitle[0];?></a></strong>
                        <?php endif;?>
                    </td>
                    <td>
                        <?php if (isset($filmLocation[0])):?>
                            <p><?php echo $filmLocation[0];?></p>
                        <?php endif;?>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php //set previous date for comparison
        $prev_date = $filmDate;?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer();?>