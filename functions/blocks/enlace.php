<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function get_enlacebox($number = 1){

        // WP_Query arguments
        $args = array (
                'post_type'              => 'enlace',                
                'posts_per_page'         => $number,
                'orderby'                => 'rand',
        );

        // The Query
        $the_query = new WP_Query( $args ); 
        // The Loop
        if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                            <div class="media">
                              <div class="media-body">
                                  <a href="<?php echo get_field('url');?>" target="_blank">
                                    <h4 class="media-heading"><?php echo the_title();?> </h4>
                                    <?php echo get_field('url');?>
                                </a>
                              </div>                               
                            </div>  
                            <hr>
                        <?php                                            
                }
        } else {
                // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
}
function get_allenlaces($number = -1){

        // WP_Query arguments
        $args = array (
                'post_type'              => 'enlace',
                'post_status'            => 'publish',
                'posts_per_page'         => $number,
                'order'                  => 'DESC',
        );

        // The Query
        $the_query = new WP_Query( $args ); 
        // The Loop
        if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                            <div class="autor-box">
                                <div class="media">
                                  <div class="media-body">
                                      <a href="<?php echo get_field('url');?>" target="_blank">
                                        <h4 class="media-heading"><?php echo the_title();?> </h4>
                                        <?php echo get_field('url');?>
                                    </a>
                                  </div>                               
                                </div>  
                            </div>
                            
                        <?php                                            
                }
        } else {
                // no posts found
        }
        /* Restore original Post Data */
        wp_reset_postdata();
}
function get_singleenlace($enlace){
    ?>
                            <div class="media">
                              <div class="media-body">
                                <a href="<?php echo get_field('url',$enlace);?>">
                                    <h4 class="media-heading"><?php echo the_title();?> </h4>
                                    <?php echo get_field('url',$enlace);?>
                                </a>
                              </div>                               
                            </div>  
    <?php 
}