<?php /*
Plugin Name: Film Schedule
Plugin URI: http://northwestfest.ca
Description: Generates a schedule for film festivals. Created in association with Northwestfest and Rainbow Visions Film Fest in #yeg.
Author: Sally Poulsen
Version: 1.0
Author URI: http://thecreativetemp.com
Dependencies: https://github.com/Automattic/custom-metadata
*/

/* ==== Create custom post type ====*/

class CustomPost{

    public function __construct() {
        add_action( 'init', 'fs_create_screeningdetails' );

        function fs_create_screeningdetails() {
        register_post_type( 'screening_details',
            array(
                'labels' => array(
                'name' => __( 'Screening Details' ),
                'singular_name' => __( 'Screening Details' )
                ),
                'public' => true,
                'has_archive' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => 'dashicons-editor-video',
                'rewrite' => array('slug' => 'screenings'),
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title', 'thumbnail')
                )
            );
        }
    }
}

new CustomPost();


class Taxonomies{

    public function __construct() {
        function fs_screening_genre_taxonomy() {
           register_taxonomy(
            'screening_genre', 'screening_details',
              array(
                  'hierarchical' => true,
                  'label' => 'Screening Genre',
                  'query_var' => true,
                  'rewrite' => array('slug' => 'screening-genre')
              )
          );
        }

        add_action( 'init', 'fs_screening_genre_taxonomy' );


        function fs_screening_location_taxonomy() {
           register_taxonomy(
            'screening_location', 'screening_details',
              array(
                  'hierarchical' => true,
                  'label' => 'Screening Location',
                  'query_var' => true,
                  'rewrite' => array('slug' => 'screening-location')
              )
          );
        }

        add_action( 'init', 'fs_screening_location_taxonomy' );


        function fs_screening_year_taxonomy() {
           register_taxonomy(
            'screening_year', 'screening_details',
              array(
                  'hierarchical' => true,
                  'label' => 'Screening Year',
                  'query_var' => true,
                  'rewrite' => array('slug' => 'screening-year')
              )
          );
        }

        add_action( 'init', 'fs_screening_year_taxonomy' );


        function fs_programming_stream_taxonomy() {
           register_taxonomy(
            'programming_stream', 'screening_details',
              array(
                  'hierarchical' => true,
                  'label' => 'Programming Stream',
                  'query_var' => true,
                  'rewrite' => array('slug' => 'programming-stream')
              )
          );
        }

        add_action( 'init', 'fs_programming_stream_taxonomy' );
    }
}
new Taxonomies();



class Screening {
    public function __construct() {
        //Instantiate the metadata plugin from Automattic
        include_once( plugin_dir_path( __FILE__ ) . 'vendor/custom-metadata-master/custom_metadata.php' );

        add_action( 'custom_metadata_manager_init_metadata', 'fs_init_custom_fields' );
            function fs_init_custom_fields() {
                // adds a new group to the test post type
                x_add_metadata_group( 'x_metaBox1', 'screening_details', array(
                        'label' => 'Screening Details',
                        'priority' => 'high'

                    ) );

                    // adds a text field to the first group
              x_add_metadata_field( 'fs_title', 'screening_details', array(
                      'group' => 'x_metaBox1', // the group name
                      'description' => '', // description for the field
                      'label' => 'Title of Film:', // field label
                      'display_column' => true, // show this field in the column listings

                  ) );

                  // adds a timepicker field to the 1st group
              x_add_metadata_field( 'fs_fieldTimepicker1', 'screening_details', array(
                  'group' => 'x_metaBox1',
                  'field_type' => 'timepicker',
                  'label' => 'Screening Time',
                ) );

              // adds a datepicker field to the 1st group
              x_add_metadata_field( 'fs_fieldDatepicker1', 'screening_details', array(
                  'group' => 'x_metaBox1',
                  'field_type' => 'datepicker',
                  'label' => 'Screening Date',
                ) );

                // adds a taxonomy select field in the first group
                x_add_metadata_field( 'x_field_taxonomy_select', 'screening_details', array(
                        'group' => 'x_metaBox1',
                        'field_type' => 'taxonomy_select',
                        'taxonomy' => 'screening_location',
                        'label' => 'Screening Location',

                    ) );


              // adds a wysiwyg (full editor) field to the 2nd group
              x_add_metadata_field( 'fs_fieldWysiwyg1', 'screening_details', array(
                  'group' => 'x_metaBox1',
                  'field_type' => 'wysiwyg',
                  'label' => 'Description of Film',
                ) );

                // adds a text field to the first group
                x_add_metadata_field( 'fs_runtime', 'screening_details', array(
                        'group' => 'x_metaBox1', // the group name
                        'description' => 'Runtime', // description for the field
                        'label' => 'Runtime', // field label
                        'display_column' => true, // show this field in the column listings

                    ) );

                   // adds a text field to the first group
                x_add_metadata_field( 'fs_production_year', 'screening_details', array(
                        'group' => 'x_metaBox1', // the group name
                        'description' => 'Production Year', // description for the field
                        'label' => 'Production Year', // field label
                        'display_column' => true // show this field in the column listings
                    ) );

                  // adds a text field to the first group
                x_add_metadata_field( 'fs_director', 'screening_details', array(
                        'group' => 'x_metaBox1', // the group name
                        'description' => 'Director', // description for the field
                        'label' => 'Director', // field label
                        'display_column' => true // show this field in the column listings
                    ) );

                  // adds a link field with placeholder
              x_add_metadata_field( 'fs_field_link_placeholder', 'screening_details', array(
                  'group' => 'x_metaBox1',
                  'field_type' => 'link',
                  'label' => 'Link to film website',
                  'placeholder' => 'full website url',
                ) );

                  // adds a text field to the first group
                x_add_metadata_field( 'fs_trailer', 'screening_details', array(
                        'group' => 'x_metaBox1', // the group name
                        'description' => 'Description of how to make this work', // description for the field
                        'label' => 'Link to Trailer', // field label
                        'display_column' => true, // show this field in the column listings

                    ) );

                x_add_metadata_field( 'fs_country', 'screening_details', array(
                        'group' => 'x_metaBox1', // the group name
                        'description' => 'Country', // description for the field
                        'label' => 'Country', // field label
                        'display_column' => true // show this field in the column listings
                    ) );

                      // adds a link field with placeholder
              x_add_metadata_field( 'fs_tickets', 'screening_details', array(
                  'group' => 'x_metaBox1',
                  'field_type' => 'link',
                  'label' => 'Link to purchase advance tickets',
                  'placeholder' => 'Link to tickets',
                ) );
        }
    
    }
}



new Screening();




            function get_custom_post_type_template($single_template) {
            global $post;

            if ($post->post_type == 'screening_details') {
              $single_template = plugin_dir_path( __FILE__ )  . '/screening_details.php';
            }
            return $single_template;
            }
        
add_filter( 'single_template', 'get_custom_post_type_template' );


?>