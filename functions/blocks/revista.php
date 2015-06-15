<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_revistalist($number = 5){

        // WP_Query arguments
        $args = array (
                'post_type'              => 'revista',                
                'post_status'            => 'publish',
                'posts_per_page'         => $number,
                'order'                  => 'DESC',                
        );

        // The Query
        $the_query = new WP_Query( $args ); 
        // The Loop
        if ( $the_query->have_posts() ) {
            ?><ul><?php
                while ( $the_query->have_posts() ) {
                        $the_query->the_post();                        
                        ?>
                        <li><a href="<?php echo get_permalink();?>"><?php echo the_title();?> </a></li>
                        <?php                                            
                }
            ?></ul><?php
        } else {
            ?><li><a href="">Sin revistas</a></li><?php
        }
        /* Restore original Post Data */
        wp_reset_postdata();
}